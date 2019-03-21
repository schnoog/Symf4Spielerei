<?php


/**
 * 
 * 
 */
function fGetNextPass(){
    $lastpass = fGetLastConved();
    $nextid = fGetPassIDBiggerThan($lastpass);
    $sql = "Select * from paesseold WHERE paesse_nr like %s";
    return DB::queryFirstRow($sql,$nextid);
}
/**
 * 
 * 
 */
function fGetLastConved(){
    $sql = "Select MAX(paesse_nr) from paesseold";
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

