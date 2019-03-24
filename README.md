## MySymfony
Meine ersten Versuche mit Symfony 4.

Dies beinhaltet
- FOSUserBundle
- EasyAdmin
- Menü mittel pd-menu
- BootStrap 4 Templates für FOSUserBundle
- Bootstrap4, JQuery, Propper, Fontsawesome als lokale Version

Bisher ist (ausser die Templates), alles nur zusammen ge-Guttenbergt. (V0.0.3)


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

Datenbank-Tabellen erstellen
`php bin/console doctrine:schema:create`

Benutzer anlegen
`php bin/console fos:user:create`

Benutzer zum Admin machen
`php bin/console fos:user:promote`
und dabei dem eben angelegten Benutzer die Rolle **ROLE_ADMIN** zuweisen



## Los geht's ##



(Würde ich ggf. ändern.)

