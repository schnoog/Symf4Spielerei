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
git push
git push  --tags
echo "Add,Commit,Push done"
fi
