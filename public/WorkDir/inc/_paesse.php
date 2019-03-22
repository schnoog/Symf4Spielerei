<?php

$devid = 3071; // ist die > 0 , wird nur Pass mit paesse_nr = $devid geparst
$devid = 9519;
$devid=0;
if(isset($_GET['devid'])) $devid = intval($_GET['devid']);

// ausbauart //  // maut // besonderes // sehenswuerdigkeit
// fototip // geo_lat // geo_lon // alte_id


function ParsePass($pass,&$errfield,$isdebug=true){
    global $LUD, $lastOK;
    if(count($LUD)<2) fFillLUDs();
    //if($isdebug)DebugOut($pass);
    $typ = $pass['paesse_typ'];
//    DebugOut($typ);
    if(strlen($typ)<4) $typ = "Pass";
    $ps['typ_id'] = fGetLUD('typen',$typ);
    $kat = $pass['paesse_kategorie'];
    if(strlen($kat) < 2) $kat = "touring";
    $ps['kategorie_id'] = fGetLUD('kategorien',$kat);
    $ps['status_id'] = fGetLUD('stati',$pass['paesse_status']);
    $ps['belag_id'] = fGetLUD('belaege',$pass['paesse_belag']);
    $ps['fahrbahnbreite_id'] = fGetLUD('fahrbahnbreiten',$pass['paesse_fahrbahnbreite']);
    $ps['land'] = $pass['paesse_land'];
    $ps['lk'] = $pass['paesse_laenderkategorie'];

        $tmp = $pass['paesse_schwierigkeitsgrad'];
        if(strlen($tmp)<1) $tmp = 1;
    $ps['schwierigkeit_id']  = fGetLUD('schwierigkeiten',$tmp);
    $ps['fahrbahnbreite_id'] = fGetLUD('fahrbahnbreiten',$pass['paesse_fahrbahnbreite']);
    $ps['wintersperre_id'] = fGetLUD('wintersperren',$pass['paesse_wintersperre']);
    $ps['laenderkategorie_id'] = fGetLUD('laenderkategorien',$pass['paesse_laenderkategorie']);
    
    $regid = fGetRegionsID($pass['paesse_land'],$pass['paesse_region']);
    if(!$regid) $regid = DB::queryFirstList("Select id from regionen WHERE region LIKE %s AND land_id = %i",$pass['paesse_region'],fGetLUD('laender',$pass['paesse_region']));

    if(!$regid) DebugOut([$pass['paesse_land'],$pass['paesse_region']]);
    $ps['landes_region_id'] = $regid;
    //TRICKY: landes_region_id


    $ps['name'] = $pass['paesse_name'];
    $ps['hoehe'] = $pass['paesse_hoehe'];
    $ps['kehren'] = $pass['paesse_kehrentotal'];
   
    $ps['von_richtung_id'] = fGetLUD('richtungen',$pass['paesse_rampevon']);
    $ps['von_ort'] = $pass['paesse_von'];
    $ps['von_hoehe'] = $pass['paesse_hoehe2'];
    $ps['von_distanz'] = $pass['paesse_distanz2'];
    if(strlen($pass['paesse_distanz2'])<1) $ps['von_distanz'] = NULL;

    $ps['nach_richtung_id'] = fGetLUD('richtungen',$pass['paesse_rampenach']);
    $ps['nach_ort'] = $pass['paesse_nach'];
    $ps['nach_hoehe'] = $pass['paesse_hoehe3'];
    $ps['nach_distanz'] = $pass['paesse_distanz3'];
    if(strlen($pass['paesse_distanz3'])<1) $ps['nach_distanz'] = NULL;

    $ps['ausbauart'] = $pass['paesse_artundausbau'];
    $ps['maut'] = $pass['paesse_maut'];
    $ps['besonderes'] = $pass['paesse_besonderes'];
    $ps['sehenswuerdigkeit'] = $pass['paesse_sehenswuerdigkeiten'];
    $ps['fototip'] = $pass['paesse_fototip'];
    $ps['geo_lat'] = $pass['paesse_GPS_lat_dec'];
    $ps['geo_lon'] = $pass['paesse_GPS_lon_dec'];
    $ps['alte_id'] = $pass['paesse_nr'];

   // DebugOut([ $ps , $pass  ]);

    DB::$error_handler = 'my_error_handler';
    $lastOK = true;
    DB::insert('paesse',$ps);
    if(!$lastOK){
        $errfield = implode("|||||",$pass);
    }

//    DB::insertIgnore('paesse',$ps);
    $myid = DB::queryFirstField("Select id from paesse WHERE alte_id = %i",$pass['paesse_nr']);
    if($myid > 0){
        $iconstring= $pass['paesse_icons'];
        $icons = explode(";",$iconstring);
        for($x=0;$x<count($icons);$x++){
            $icon = $icons[$x];
            $iconid = fGetLUD('icons',$icon);
            $data = array (
                'paesse_id' => $myid,
                'icons_id' => $iconid
            );       
            DB::insertIgnore('paesse_icons',$data);
        }
    }



    DebugOut($pass['paesse_nr'] . " " . $pass['paesse_name'],false);
}
/**
 * 
 * 
 * 
 * 
 */

function my_error_handler($params) {
    global $lastOK, $debugdata;
    echo "Error: " . $params['error'] . "<br>\n";
    echo "Query: " . $params['query'] . "<br>\n";
    $lastOK = false;
  }


/**
 *  
 */
function ParsePasses($isdebug = false){
$DEBUGCOUNTER=0;
$DEBUGBREAK=8;    
    global $devid;
    fFillLUDs();
    if ($devid < 1){
    set_time_limit(300);
        $PID = fGetNextPass();
        while(count($PID) > 0){
            
            if($isdebug)DebugOut($PID['paesse_name']);
            $errfield = "";
            ParsePass($PID,$errfield,$isdebug);
            $errstate = false;
            if(strlen($errfield)>0){
                    $errstate = true;
            }
            AddConfirmation($PID['paesse_nr'],true,$errstate,$errfield);
            $DEBUGCOUNTER++;

            $PID = fGetNextPass();
//if($DEBUGCOUNTER > $DEBUGBREAK) break;
        }
    set_time_limit(300);    
    }else{
        $PID= DB::queryFirstRow( "Select * from paesseold WHERE paesse_nr like %s",$devid);
        ParsePass($PID,$errfield,$isdebug);
    }
}
/**
 * 
 * 
 */
function AddConfirmation($passid,$bolDone = true,$bolError = false,$strErrorField = ""){
    $err = 0;
    $done = 0;
    if($bolDone) $done = 1;
    if($bolError) $err = 1;
    DB::query("Insert into paesse_conv (paesse_nr,done,problem,problemfield) values (%i,%i,%i,%s)",$passid,$done,$err,$strErrorField);
}
/**
 * 
 * 
 */

