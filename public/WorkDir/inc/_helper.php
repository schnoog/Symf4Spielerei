<?php

DB::$user = $dbuser;
DB::$password = $dbpass;
DB::$dbName = $dbname;
DB::$host = $dbhost;
DB::$port = $dbport;
DB::$encoding  = $dbenc;
$tabelle = "paesseold";






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
function DebugOut($data){
    if(php_sapi_name() === 'cli'){
        echo "#############################################" . PHP_EOL;
        print_r($data);
        return true;
    }
    echo "<hr><pre>" . print_r($data,true) . "</pre>";
}