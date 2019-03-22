<?php


/*
* paesse_conv Tabelle....
*
*/

function prepareTable($isdebug = false){
    $tl =DB::tableList();
    if (!in_array("paesse_conv",$tl)){
    if($isdebug) DebugOut( "Erstelle Tabelle paesse_conv." );
    $SQL[]="CREATE TABLE paesse_conv (id int(11) DEFAULT NULL,paesse_nr int(11) NOT NULL,done int(11) NOT NULL DEFAULT 0,problem int(11) NOT NULL DEFAULT 0,problemfield text NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
    $SQL[]="ALTER TABLE paesse_conv ADD UNIQUE KEY pid (paesse_nr);";
    for($x=0;$x<count($SQL);$x++) DB::query($SQL[$x]);
    }else{
        if($isdebug) DebugOut( "Tabelle paesse_conv existiert bereits." );
    }
}
/*
*
*
*/
