## MySymfony
Meine ersten Versuche mit Symfony 4.

Dies beinhaltet
- FOSUserBundle
- EasyAdmin
- Menü mittel pd-menu
- BootStrap 4 Templates für FOSUserBundle
- Bootstrap4, JQuery, Propper, Fontsawesome als lokale Version

Bisher ist (ausser die Templates), alles nur zusammen ge-Guttenbergt. (V0.0.1)


## Installation

**Composer wird benötigt**

Git Repo [runterladen](http://https://github.com/schnoog/Symf4Spielerei/archive/master.zip) oder clonen
https://github.com/schnoog/Symf4Spielerei.git
`git clone https://github.com/schnoog/Symf4Spielerei.git **ZielVerzeichnis**`

Mit der Konsole ins Zielverzeichnis wechseln
`composer install`


Datenbank erstellen
.env Datei kopieren
`cp .env .env.local`
und mitgültigen Daten füttern (Datenbank und Mailserver)

mysymfony.sql in die Datenbank importieren
`mysql -uDatenbankNutzer -pPasswort DatenbankName < mysymfony.sql`

## Los geht's ##
Anmeldung:
User: **admin**
Passwort: **password**


(Würde ich ggf. ändern.)

