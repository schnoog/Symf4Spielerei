#!/bin/bash

PKPASS=$(cat /pk/pkdbpw.txt)
PKNAME=$(cat /pk/pkname.txt)
PKHOST=$(cat /pk/pkhost.txt)
PKDB=$(cat /pk/pkdb.txt)


bash -c 'mysqldump -u'"$PKNAME"' -p"'"$PKPASS"'" -h'"$PKHOST"' '"$PKDB"' paesse' | sed -e 's/`paesse`/`paesseold`/g' | mysql -uroot mysymfony
bash -c 'mysqldump -u'"$PKNAME"' -p"'"$PKPASS"'" -h'"$PKHOST"' '"$PKDB"' nations' | mysql -uroot mysymfony
