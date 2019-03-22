#!/bin/bash

function DelTable {
MYIFS=$IFS
IFS="
"

TABLISTE="paesse_icons
paesse
regionen
belaege
fahrbahnbreiten
icons
kategorien
laender
laenderkategorien
migration_versions
nations
paesseold
richtungen
schwierigkeiten
stati
typen
wintersperren
paesse_conv"

for TABLE in $TABLISTE
do
	SQL="Drop table $TABLE ;"
	echo $SQL | mysql -uroot mysymfony 2>/dev/null
done
IFS=$MYIFS

}

DelTable


