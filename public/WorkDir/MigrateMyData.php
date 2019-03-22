
<?php

require_once 'inc/db.class.php';
require_once 'inc/dbconf.php';
require_once 'inc/_definition.php';
require_once 'inc/_helper.php';
require_once "inc/_prepare.php";
require_once 'inc/_paesse.php';
require_once 'inc/_laender_und_regionen.php';
require_once 'inc/_smallfixes.php';




$stufen[0] = "Installiert paesse_conv";
$stufen[1] = "Befüllt die Tabellen laender und regionen";
$stufen[2] = "Befüllt kleinere einfache Lookups";
$stufen[3] = "Befüllt komplexere Lookups";
$stufen[4] = "Zauber, zauber. Aus paesseold wird paesse";

$sel="";


/*

$PKIDs = DB::queryFirstColumn("Select paesse_nr from paesseold");
$PIDs = DB::queryFirstColumn("Select alte_id from paesse");

for($x=0;$x<count($PKIDs);$x++){
     if(!in_array($PKIDs[$x],$PIDs)){
         DebugOut("Pass missing:" . $PKIDs[$x]);
         $pass = DB::queryFirstRow("Select * from paesseold WHERE paesse_nr like %s",$PKIDs[$x]);
         ParsePass($pass,$errfield,true);
     }

}


exit;
*/

















BuildSelect();
function BuildSelect(){
    $firstsel = false;
    global $sel, $stufen;
        foreach($stufen as $stufe => $label){
            $done=false;
            if(PreReqsCheck($stufe, $done)){
                if($done){
                    $label = "ERLEDIGT: " . $label;
                    $sl="";
                    $dis=' disabled ';
                }else{
                    $dis='';
                    if(!$firstsel){
                        $firstsel = true;
                        $sl = " selected='selected' ";
                    }

                }
                $sel .= "<option $sl $dis value='$stufe'>$label</option>";

            }

        }
}


function PreReqsCheck($level = 0, &$done){
    global $errors;
    $done = false;
    switch($level){
        case 0:
                    $reqTbl = array('belaege','fahrbahnbreiten','icons','kategorien','laender','laenderkategorien','nations','paesse','paesse_icons','paesseold','regionen','richtungen','schwierigkeiten','stati','typen','wintersperren');
                    $dbTbl = DB::tableList();
                    if(in_array('paesse_conv',$dbTbl))$done = true;
                    $ok = true;
                    for($x=0;$x<count($reqTbl);$x++){
                        if(!in_array($reqTbl[$x],$dbTbl)){
                            $errors[] = "Tabelle " . $reqTbl[$x] . " wird benötigt, ist jedoch nicht vorhanden";
                            $ok = false;
                        }
                    }
                    return $ok;

            break;
        case 1:
                    $res = DB::query("Select id from regionen"); //regionen und laender
                    if(count($res) > 800) $done = true;
                    PreReqsCheck(0,$dump);
                    return $dump;   
            break;
        case 2:
                    $done = true;
                    $tbls = array('typen','kategorien','belaege','fahrbahnbreiten','stati','wintersperren');
                    for ($x=0;$x<count($tbls);$x++){
                        $res = DB::queryFirstField("Select count(id) from " . $tbls[$x]);
                        if($res < 1) $done = false;    
                    }
                    $ck0 = PreReqsCheck(0,$ck0done);
                    $ck1 = PreReqsCheck(1,$ck1done);

                        //kleineTabellen
                    return $ck1done && $ck0done;
            break;
        case 3:
                    $tbls = array('icons','laenderkategorien','richtungen','schwierigkeiten'); 
                    $done = true;

                    for ($x=0;$x<count($tbls);$x++){
                        $res = DB::queryFirstField("Select count(id) from " . $tbls[$x]);
                        //DebugOut( "Select count(id) from " . $tbls[$x] . "----" . $res);
                        if($res < 1) $done = false;    
                    }
                    $ck0 = PreReqsCheck(0,$ck0done);
                    $ck1 = PreReqsCheck(1,$ck1done);                    
                    $ck2 = PreReqsCheck(2,$ck2done);

                    return $ck1done && $ck0done && $ck2done;
            break;
        case 4:
                        //durch wenn count(paesseold.paesse_nr) == count(paesse.id)
                    $num1 = DB::queryFirstField('Select count(id) from paesse;');
                    $num2 = DB::queryFirstField('Select count(paesse_nr) from paesseold;');
                   // $errors[] = "Num1 $num1 : Num2 $num2";
                    if($num1 == $num2)$done = true;
                    $ck0 = PreReqsCheck(0,$ck0done);
                    $ck1 = PreReqsCheck(1,$ck1done);                    
                    $ck2 = PreReqsCheck(2,$ck2done);
                    $ck3 = PreReqsCheck(3,$ck3done);        
                    return $ck0done && $ck1done && $ck2done && $ck3done;
            break;

    }
}












$head ='<h3>Hiermit wird die paesse - Tabelle von passknacker in die lokale DB geparst</h3><h3>Zusätzlich werden noch die benötigten Hilfstabellen gefüttert</h3><h4>Was es dafür braucht</h4><h3>passknacker.paesse exportierten und als mysymfony.<font size="6"><u>paesseold</u></font> importieren </h3><h3>passknacker.nations exportieren und als mysymfony.nations importieren </h3>';


$btn = "<button type='submit'>LOS GEHT's</button>";
if(isset($_REQUEST['stufe'])){
    
        Migrate($_REQUEST['stufe']);
        $btn = "</form><form><button type='submit'>Seite aktualisieren</button>";
        $sel = "";
        $head = "<h1>Bearbeitung</h1><h3>Momentan wird der Schritt</h3><h1><font color='red'>" . $stufen[$_REQUEST['stufe']] . "</font></h1><h3>bearbeitet</h3>";
    
}
    $head = "<form><button type='submit'>Seite aktualisieren</button></form><br />" . $head;




?>

<html>
<head></head>
<body>
<center>
<?php

if(count($errors)>0){
    echo "<h1><font color='red'>Stufe 0 - Probleme, da geht leider nix</font></h1>";
    for($x=0;$x<count($errors);$x++) echo "<h2><font color='red'>" . $errors[$x] . "</font></h2>";
    $btn = "";
}
?>
<?php echo $head; ?>
<form method="POST">
<select name="stufe" size="1"><?php echo $sel;?></select>
<input type="hidden" name="doit" value="1">
<?php echo $btn; ?>
</form>
</center>



<?php



function Migrate($step = 0){
    $maxsteps = 6;
            DebugOut("Migrate Step $step " .LineEnd() );
            //0
            if($step == 0){ prepareTable(true); }  //// 0 - läuft
            //1
            if($step == 1){ prepareLaenderUndRegionen(true); }  //// 1 - läuft
            //2
            if($step == 2){ fFillSomeSmallTables(true); } //// 2 - läuft
            //3
            if($step == 3){ fFillSomeMultiTables(true);  } //// 3 - läuft
            //4
            if($step == 4){ ParsePasses(true);  }
            //5
            if($step == 5){  }
            //6
            if($step == 6){  }
    
}

if(count($debugdata)>0){
    for($x=0;$x<count($debugdata);$x++){
        echo $debugdata[$x];
    }
}



?>

</body>
</html>