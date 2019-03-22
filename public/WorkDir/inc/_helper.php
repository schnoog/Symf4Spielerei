<?php

DB::$user = $dbuser;
DB::$password = $dbpass;
DB::$dbName = $dbname;
DB::$host = $dbhost;
DB::$port = $dbport;
DB::$encoding  = $dbenc;
$tabelle = "paesseold";

$LUD = array();

/**
 * 
 *  LUD - LookUpData auffüllen
 * 
 */
function fFillLUD($table,$datafield){
    global $LUD;
    if(!isset( $LUD[$table]  )){
        $res = DB::query("Select id, $datafield from $table");
        for($x=0;$x<count($res);$x++){
            $data = base64_encode( strtoupper( $res[$x][$datafield]) );

            $id = $res[$x]['id'];
            $LUD[$table][$data] = $id;
        }
    }
}
/**
 * 
 * 
 * 
 */
function fFillLUDs(){
        global $LUD;
        $data = array(
            'belaege' => 'belag',
            'fahrbahnbreiten' => 'fahrbahnbreite',
            'kategorien' => 'kategorie',
            'laenderkategorien' => 'laenderkategorie_kurz',
            'regionen' => 'region',
            'richtungen' => 'richtung_kurz',
            'schwierigkeiten' => 'schwierigkeit',
            'stati' => 'status',
            'typen' => 'typ',
            'wintersperren' => 'wintersperre',
            'icons' => 'icon_bild_ident'

        );
        foreach ($data as $table => $field) fFillLUD($table,$field);
}

/**
 * 
 * 
 * 
 */
function fGetLUD($table,$idenifier){
    global $LUD;
    $idf = base64_encode(strtoupper($idenifier));
    if(isset($LUD[$table][$idf])) return $LUD[$table][$idf]; 
    return NULL;
}
/**
 * 
 * 
 * 
 */
function fGetRegionsID($land,$region){
    $landid = DB::queryFirstField("Select id from laender WHERE land_kurz LIKE %s",$land);
    $sql = "Select id from regionen WHERE land_id = %i AND region LIKE %s";
    return DB::queryFirstField($sql,$landid,$region);
}

/***
 * 
 * 
 * 
 * 
 */


/**
 * 
 * 
 */
function fGetNextPass($offset = 0){
    $lastpass = fGetLastConved();
    $nextid = fGetPassIDBiggerThan($lastpass);
    if ($offset > $nextid) $nextid = $offset;

    $sql = "Select * from paesseold WHERE paesse_nr like %s";
    return DB::queryFirstRow($sql,$nextid);
}
/**
 * 
 * 
 */
function fGetLastConved(){
    $sql = "Select MAX(paesse_nr) from paesse_conv";
    return DB::queryFirstField($sql);
}
/**
 * 
 * 
 */
function fGetPassIDBiggerThan($offset = 0){
    $sql = "Select CAST(paesse_nr as int) from paesseold WHERE CAST(paesse_nr as int) > %i ORDER by CAST(paesse_nr as int) ASC LIMIT 0,1";
    return DB::queryFirstField($sql,$offset);
}



/**
 * 
 *  
 * 
 */



/**
 * 
 * 
 */
function LineEnd(){
    if(php_sapi_name() === 'cli') return PHP_EOL;
    return "<br />";
}
/**
 * 
 * 
 */
function DebugOut($data,$asreturn=true){
    global $debugdata;
    if(php_sapi_name() === 'cli'){
        echo "#############################################" . PHP_EOL;
        print_r($data);
        return true;
    }
    if($asreturn){
        $debugdata[] = "<hr><pre>" . print_r($data,true) . "</pre>";
    }else{
        echo "<hr><pre>" . print_r($data,true) . "</pre>";
    }
}