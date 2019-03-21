<?php

$tt = array("DEU","FRA","ITA","AUT","CHE","SVN","SIC","SVK","ROM","MNE","BIH","NOR","ESP","HRV","COR",'ISL','FRO','POL','LUX','GRC','GBR','BEL','CZE',"XXX");
$tt = array('ALB','AND','AUT','BEL','BGR','BIH','CHE','CYP','CZE','DEU','DNK','ESP','EST','FIN','FRA','GBR','GRC','HRV','HUN','IRL','ISL','ITA','LIE','LTU','LUX','LVA','MKD','MAR','MNE','NLD','NOR','POL','PRT','ROM','SMR','KOS','SRB','SVK','SVN','SWE','TUR','RUS','PPP','FRO');

echo "HALLO \n";

$lang= array(
'ALL' => 'Alle Pässe',
'AND' => 'Andorra',
'POL' => 'Polen - Polska',
'UKR' => 'Ukraine - Ukrajina',
'BEL' => 'Belgien - België',
'ISL' => 'Island - Ísland',
'CZE'  => 'Tschechien - Česká',
'FRO' => 'Färöer - Føroyar',
'AUT' => 'Österreich',
'BIH' => 'Bosnien und Herzegowina - Bosne i Hercegovine',
'CHE' => 'Schweiz - Suisse - Svizzera - Svizra',
'COR' => 'Korsika - Corse',
'DEU' => 'Deutschland',
'ESP' => 'Spanien - Espagna',
'FRA' => 'Frankreich - France',
'GER' => '',
'GRC' => 'Griechenland - Elláda',
'GBR' => 'Vereinigtes Königreich - United Kingdom',
'LUX' => 'Luxemburg - Lëtzebuerg',
'HRV' => 'Kroatien - Croatia - Hrvatska',
'ITA' => 'Italien - Italia',
'LIE' => 'Liechtenstein',
'MNE' => 'Montenegro',
'NOR' => 'Norwegen - Norge',
'ROM' => 'Rümänien - Romania',
'SIC' => 'Sizilien - Sicilia',
'SLO' => '',
'SRD' => 'Sardinien - Sardegna',
'SVK' => 'Slowakei - Slovakia',
'SVN' => 'Slowenien - Slovenjia',
'XXX' => 'Heavy Offroad',
'GPX' => 'GPX',
'CSV' => 'CSV (Excel)',
'KML' => 'KML',
'DRIVEN' => 'gefahrene',
'UNDRIVEN' => 'ungefahrene',
'ALLP' => 'Alle ohne XXX',
'XXXP' => 'XXX',
'ALLXXXP' => 'Alle mit XXX',
'NXXX' => 'Alle',
'NORMAL' => 'Ohne XXX',
'_' => ' ', 
'Tirol A' => 'Tirol', 
'EmiliaRomagna' => 'Emilia Romagna', 
'SuedSchwarzwald' => 'Sued Schwarzwald', 
'NordSchwarzwald' => 'Nord Schwarzwald',
);

for($x=0;$x<count($tt);$x++){
		//$tmp[] = $lang[$tt[$x]];
		$XX = $x +1;
		$tmp[] = $XX;
}

$out = "= array('" . implode("','" , $tmp) . "');";

echo $out;
//echo count($tt);



	