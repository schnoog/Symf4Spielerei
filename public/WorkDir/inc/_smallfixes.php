<?php

function fGetPassDistincts($fieldname){
    return DB::queryFirstColumn("Select Distinct $fieldname from paesseold WHERE length($fieldname) > 0");
}



function fFillSomeMultiTables($isdebug=false){
    $MD['richtungen'][0]['field'] = 'richtung_kurz';
    $MD['richtungen'][0]['data'] = array ('N','NO','O','SO','S','SW','W','NW');
    $MD['richtungen'][1]['field'] = 'richtung';
    $MD['richtungen'][1]['data'] = array ('Nord','Nordost','Ost','Südost','Süd','Südwest','West','Nordwest');

    $MD['laenderkategorien'][0]['field'] = 'laenderkategorie_kurz';
    $MD['laenderkategorien'][0]['data']  = array("DEU","FRA","ITA","AUT","CHE","SVN","SIC","SVK","ROM","MNE","BIH","NOR","ESP","HRV","COR",'ISL','FRO','POL','LUX','GRC','GBR','BEL','CZE',"XXX");
    $MD['laenderkategorien'][1]['field'] = 'laenderkategorie';
    $MD['laenderkategorien'][1]['data']  = array('Deutschland','Frankreich - France','Italien - Italia','Österreich','Schweiz - Suisse - Svizzera - Svizra','Slowenien - Slovenjia','Sizilien - Sicilia','Slowakei - Slovakia','Rümänien - Romania','Montenegro','Bosnien und Herzegowina - Bosne i Hercegovine','Norwegen - Norge','Spanien - Espagna','Kroatien - Croatia - Hrvatska','Korsika - Corse','Island - Ísland','Färöer - Føroyar','Polen - Polska','Luxemburg - Lëtzebuerg','Griechenland - Elláda','Vereinigtes Königreich - United Kingdom','Belgien - België','Tschechien - Česká','Heavy Offroad');

    $MD['icons'][0]['field'] = 'icon';
    $MD['icons'][0]['data'] = array ('Bett','Bodenwellen','Kaffee','Schotter','Eng','Essen','Fahrzeiten','Gefährlich','Kurvenreich','Maut','Regeln','Sackgasse','Schwierig','Spezial','Splitter','Steigung','Steil','Steinschlag','Tunnel','Verbot','Vieh','Aussichtpunkt','Wintersperre','Zoll');
    $MD['icons'][1]['field'] = 'icon_bild_ident';
    $MD['icons'][1]['data'] = array ('bett','bodenwelle','caffee','schotter','eng','essen','fahrzeiten','gefaehrlich','kurvenreich','maut','regeln','sackgasse','schwer','spezial','splitter','steigung','steil','steinschlag','tunnel','verbot','vieh','viewpoint','wintersperre','zoll');        

    $MD['schwierigkeiten'][0]['field'] = 'schwierigkeit';
    $MD['schwierigkeiten'][0]['data'] = array ('1','2','3','4','5');
    $MD['schwierigkeiten'][1]['field'] = 'schwierigkeitsgrad';
    $MD['schwierigkeiten'][1]['data'] = array ('SG 1:Sehr leicht zu befahrende Bergstrecke, auch für Anfänger.','SG 2:Strecke ohne nennenswerte Anforderungen, auch von vorwiegend Bergungewohnten leicht zu befahren.','SG 3:Strecke erfordert Praxis und sichere Fahrtechnik auf Bergstraßen.','SG 4:Auch für Berggewohnte schwierige Strecke, erfordert ein weit über den Durchschnitt herausragendes fahrerisches Können.','SG 5:Sehr schwierige und gefährliche Strecke, Benutzung auf eigene Gefahr!');        

    foreach( $MD as $tablename => $tableset){
        DB::query("Delete from $tablename WHERE id > 0");
        $fields = array();
        for($x=0;$x<count($tableset);$x++){
                $fields[] = $tableset[$x]['field'];
        }

        for($x=0;$x<count($tableset[0]['data']);$x++){
            $values = array();
                for($y=0;$y<count($tableset);$y++){
                    $values[]=$tableset[$y]['data'][$x];
                }
                if($isdebug) DebugOut( "Füge in die Felder" . implode(",",$fields) . " die Werte " . implode('","',$values) ." ein ");
                $baseSQL = "Insert into $tablename ( ".  implode(",",$fields)  . " ) values (" .'"' . implode('","',$values).'"'   . ")";
                DB::query($baseSQL);
        }
    }




}




/**
 * 
 * 
 * 
 */
function fFillSomeSmallTables($isdebug=false){
    $config[] = array(
        'table' => 'typen',
        'field' => 'typ',
        'source' => 'paesse_typ',
        'default' => 'Pass'
    );
    $config[] = array(
        'table' => 'kategorien',
        'field' => 'kategorie',
        'source' => 'paesse_kategorie',
        'default' => 'touring'
    );                    
    $config[] = array(
        'table' => 'belaege',
        'field' => 'belag',
        'source' => 'paesse_belag',
    );                    
    $config[] = array(
        'table' => 'fahrbahnbreiten',
        'field' => 'fahrbahnbreite',
        'source' => 'paesse_fahrbahnbreite',
    ); 
    $config[] = array(
        'table' => 'stati',
        'field' => 'status',
        'source' => 'paesse_status',
    ); 
    $config[] = array(
        'table' => 'wintersperren',
        'field' => 'wintersperre',
        'source' => 'paesse_wintersperre',
    ); 

    for($x=0;$x<count($config);$x++){
        $cfg = $config[$x];
        DB::query("Delete from " . $cfg['table'] . " WHERE id > 0" );
        $uniquevals = fGetPassDistincts($cfg['source']);
        for($y=0;$y<count($uniquevals);$y++){
            $row = array ($cfg['field'] => $uniquevals[$y] );
            DB::insert($cfg['table'],$row);
            DebugOut("Füge " . $uniquevals[$y] . " der Tabelle " . $cfg['table'] . " hinzu");    
        }
    }
}
/**
 * 
 * 
 * 
 */


