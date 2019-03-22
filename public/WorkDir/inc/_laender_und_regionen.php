<?php

use Symfony\Component\Debug\Debug;

error_reporting(E_ALL);

function ClearLaenderUndRegionen(){
    DB::query("Delete from paesse_icons");
    DB::query("Delete from paesse WHERE id > 0");
    DB::query("Delete from regionen WHERE id > 0");
    DB::query("Delete from laender WHERE id > 0");
}


function prepareLaenderUndRegionen($isdebug = false){
    ClearLaenderUndRegionen();
    $sql = "Select distinct nations_landcode, nations_land from nations";
    $res = DB::query($sql);


    for ($x=0;$x<count($res);$x++){
        $insertSQL = "Insert INTO laender (land_kurz, land, allowed, aktiv_ab_saison, aktiv_bis_saison) VALUES (%s,%s,1,2013,2099)";
        DB::query($insertSQL,$res[$x]['nations_landcode'],$res[$x]['nations_land']);
        $data = array(
            'land_kurz' => $res[$x]['nations_landcode'],
            'land'      => $res[$x]['nations_land'],
            'allowed'   => 1,
            'aktiv_ab_saison' => 2012,
            'aktiv_bis_saison' => 2099
        );
//        DebugOut($data);

        DB::insertIgnore('laender',$data);
        $landID = DB::queryFirstField("Select id from laender WHERE land_kurz LIKE %s",$res[$x]['nations_landcode']);
                if($landID >0){
                        $landKurz = $res[$x]['nations_landcode'];
                        if($isdebug) DebugOut("Land $landKurz eingefügt" .LineEnd() . "Beginne die Regionen einzufügen");
                        $regcount = prepareRegionen($landID,$landKurz);
                        if($isdebug) DebugOut("$regcount Regionen for $landKurz eingefügt");        
                }
    }



}
function prepareRegionen($landid, $land){
    if($land == 'FRA' ){
        $sql = "select distinct nations_kanton as reg , nations_kantoncode  as regcode from nations WHERE nations_landcode LIKE %s";
    }else{
        $sql = "select distinct nations_region as reg , nations_regioncode  as regcode from nations WHERE nations_landcode LIKE %s";
    }
    $regionen = DB::query($sql,$land);
    for($x=0;$x<count($regionen);$x++){
        $region = $regionen[$x];
        $data = array(
                'land_id'   => $landid,	
                'region'    =>$region['reg'],
                'region_kurz' => $region['regcode']
                );
        DB::insert('regionen',$data);
    }
    return count($regionen);
}



/*

		SQL="select distinct CONCAT($CIDC , $TRENN1 ,  nations_kanton , $TRENN2 , nations_kantoncode , $TRENN3 ) as MYDATA from nations WHERE nations_landcode LIKE 'FRA'";
	else
		SQL="select distinct CONCAT($CIDC , $TRENN1 , nations_region , $TRENN2 , nations_regioncode , $TRENN3) as MYDATA from nations WHERE nations_landcode LIKE '$COUNTRY'";

*/