#!/bin/bash


comm="$*"
if [ "$comm" != "" ]
then
echo "Commit Kommentar"
echo "$comm"
TestEingabe=$comm
else
echo "Commit Kommentar"
read TestEingabe
fi

if [ "$TestEingabe" == "" ]
then
echo "Kein Kommentar,da geht nichts"
else

mysqldump -uroot mysymfony > mysymfony.sql

git add .
git commit -m "$TestEingabe"
sleep 1
git push  --tags
git push
echo "Add,Commit,Push done"
fi
