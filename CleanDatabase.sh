#!/bin/bash
MYIFS=$IFS 
IFS="
"

if [ "$1" == "" ]
then
echo "Datenbanktabellen (ausser fos_user) wirklich löschen? j/y/J/Y"
read anlegen
else
anlegen="$1"
fi

if [ $(echo 'y/Y/j/J' | grep "$anlegen" | wc -l) -gt 0 ]
then
###DATEN BANK BEREINIGEN
echo 'SET FOREIGN_KEY_CHECKS = 0;' > DropStatements.sql
mysqldump -uroot --add-drop-table --no-data mysymfony | grep ^DROP | grep -v 'fos_user' >> DropStatements.sql
echo 'SET FOREIGN_KEY_CHECKS = 1;' >> DropStatements.sql
bash -c "cat DropStatements.sql | mysql -uroot mysymfony"
rm DropStatements.sql
echo "Gelöscht. Folgende Tabellen gibt es noch:"
bash -c "mysql -uroot mysymfony -BNe 'Show tables;'"

### MIGRATIONEN ERSTELLEN
echo "Soll eine neue Migration erstellt werden? j/y/J/Y"
read migrate
	if [ $(echo 'y/Y/j/J' | grep "$migrate" | wc -l) -gt 0 ]
	then
		echo "Erstelle Migration mit 'php bin/console make:migration'"
		php bin/console make:migration
	fi

echo "Sollen die Migrationen eingespielt werden? j/y/J/Y"
read migratedo
	if [ $(echo 'y/Y/j/J' | grep "$migratedo" | wc -l) -gt 0 ]
	then
		echo "Spiele Migrationen mit 'php bin/console doctrine:migrations:migrate'"
		php bin/console doctrine:migrations:migrate
	fi
	
#php bin/console make:migration && php bin/console doctrine:migrations:migrate
fi
IFS=$MYIFS
