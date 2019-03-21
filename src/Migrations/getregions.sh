#!/bin/bash

#function fGetRegionArray(){
#    global $SETTINGS;
#$ret=array();

#if ($SETTINGS['myselectcountry'] != "FRA"){
#$all=DB::query("select distinct nations_region AS paesse_region from nations WHERE nations_landcode LIKE %s",$SETTINGS['myselectcountry']);		
#}else{
#$all=DB::query("select distinct nations_kanton AS paesse_region from nations WHERE nations_landcode LIKE 'FRA'");
#}
#    for ($x=0;$x < count($all);$x++){
#        if (strlen($all[$x]['paesse_region'])>0) $ret[] = $all[$x]['paesse_region'];
#    }
#	return $ret;
#}
function getCountryID {
	CCODE="$1"
	SSQL="Select id from laender WHERE land_kurz LIKE '$CCODE';"
	bash -c "mysql -uroot mysymfony -BNe \"$SSQL\"" > tmpidfile
	CID=$(cat tmpidfile | sed 's/\r//g' | sed 's/\n//g')
	rm tmpidfile
	echo $CID
}

#getCountryID "CHE"
echo "//MySQL-Queries für Regionen" > REGIONENARRAY

bash -c "mysql -uroot passknac_passknacker -BNe 'Select distinct nations_landcode from nations;'" > tmpfile
COUNTRIES=$(cat tmpfile | sed 's/\r//g')
rm tmpfile
for COUNTRY in $COUNTRIES
do
	CIDC=$(getCountryID $COUNTRY)
	echo "// ---"$COUNTRY"---"$CIDC"---" >> REGIONENARRAY
	TRENN1="'|'"
	TRENN2=$TRENN1
	TRENN3=$TRENN1
	if [ "$COUNTRY" == "FRA" ]
	then
		SQL="select distinct CONCAT($CIDC , $TRENN1 ,  nations_kanton , $TRENN2 , nations_kantoncode , $TRENN3 ) as MYDATA from nations WHERE nations_landcode LIKE 'FRA'";
	else
		SQL="select distinct CONCAT($CIDC , $TRENN1 , nations_region , $TRENN2 , nations_regioncode , $TRENN3) as MYDATA from nations WHERE nations_landcode LIKE '$COUNTRY'";

	fi
	echo $SQL
	bash -c "mysql --default-character-set=utf8 -uroot passknac_passknacker -BNe \"$SQL\"" > tmpregions
	
	MYIFS=$IFS
	IFS="
	"
	
	
	REGIONS=$(cat tmpregions | sed 's/\r//g')
	rm tmpregions
	for REGION in $REGIONS
	do
		LANDID=$(echo "$REGION" | sed 's/\n//g' | cut -d '|' -f1)
		REGIONNAME=$(echo "$REGION" | sed 's/\n//g' | cut -d '|' -f2 | base64)
		REGIONKURZ=$(echo "$REGION" | sed 's/\n//g' | cut -d '|' -f3)

		SQL='INSERT INTO regionen (land_id,region,region_kurz) values ('$LANDID',FROM_BASE64("'"$REGIONNAME"'"),"'"$REGIONKURZ"'");'

		
		echo "			\$regionSQL[] = '$SQL'"  >> REGIONENARRAY
		
	done
	IFS=$MYIFS
	
#    echo $SQL


done
