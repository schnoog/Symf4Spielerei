<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Z_Tablefill extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Befüllen einiger Grundtabellen';
    }

    public function up(Schema $schema) : void
    {
/*
---Belaege
---Fahrbahnbreiten
---Icons
---Kategorien
Laender
Laenderkategrien
Paesse
Regionen
---Richtungen
Schwierigkeiten
Stati
---Typen
Wintersperren

 */

        // this up() migration is auto-generated, please modify it to your needs
        $SD['typen']['field'] = 'typ';
        $SD['typen']['data'] = array("Pass","Wasserscheide","Knackpunkt");
        $SD['kategorien']['field'] = 'kategorie';
        $SD['kategorien']['data'] = array('Touring','Enduro');
        $SD['belaege']['field'] = 'belag';
        $SD['belaege']['data'] = array('Asphalt','Asphalt(schlechter Zustand)','Beton','Betonplatten','Bitumenflicke','Erde','Felsen','Hochmoor','Kopfstein','Kopfsteinpflaster','Lehm','Sand','Sand(festgefahren)','Schotter','Schotter(nach Regen kaum passierbar)','Schotter(schlechter Zustand)','Steinplatten');
        $SD['fahrbahnbreiten']['field'] = 'fahrbahnbreite';
        $SD['fahrbahnbreiten']['data']= array('2-3m','2-4m','2-5m','2-6m','2-7m','2m','3-4m','3-5m','3-6m','3-7m','3-8m','3m','4-5m','4-6m','4-7m','4m','5-6m','5-7m','5-8m','5m','6-7m','6-8m','6m','7-8m','7m','8m(und breiter)');

        $MD['richtungen'][0]['field'] = 'richtung_kurz';
        $MD['richtungen'][0]['data'] = array ('N','NO','O','SO','S','SW','W','NW');
        $MD['richtungen'][1]['field'] = 'richtung';
        $MD['richtungen'][1]['data'] = array ('Nord','Nordost','Ost','Südost','Süd','Südwest','West','Nordwest');

        $MD['icons'][0]['field'] = 'icon';
        $MD['icons'][0]['data'] = array ('Bett','Bodenwellen','Kaffee','Schotter','Eng','Essen','Fahrzeiten','Gefährlich','Kurvenreich','Maut','Regeln','Sackgasse','Schwierig','Spezial','Splitter','Steigung','Steil','Steinschlag','Tunnel','Verbot','Vieh','Aussichtpunkt','Wintersperre','Zoll');
        $MD['icons'][1]['field'] = 'icon_bild_ident';
        $MD['icons'][1]['data'] = array ('bett','bodenwelle','caffee','schotter','eng','essen','fahrzeiten','gefaehrlich','kurvenreich','maut','regeln','sackgasse','schwer','spezial','splitter','steigung','steil','steinschlag','tunnel','verbot','vieh','viewpoint','wintersperre','zoll');        

        $MD['schwierigkeiten'][0]['field'] = 'schwierigkeit';
        $MD['schwierigkeiten'][0]['data'] = array ('1','2','3','4','5');
        $MD['schwierigkeiten'][1]['field'] = 'schwierigkeitsgrad';
        $MD['schwierigkeiten'][1]['data'] = array ('SG 1:Sehr leicht zu befahrende Bergstrecke, auch für Anfänger.','SG 2:Strecke ohne nennenswerte Anforderungen, auch von vorwiegend Bergungewohnten leicht zu befahren.','SG 3:Strecke erfordert Praxis und sichere Fahrtechnik auf Bergstraßen.','SG 4:Auch für Berggewohnte schwierige Strecke, erfordert ein weit über den Durchschnitt herausragendes fahrerisches Können.','SG 5:Sehr schwierige und gefährliche Strecke, Benutzung auf eigene Gefahr!');        

        //---------------------------------
        foreach( $MD as $tablename => $tableset){
            $fields = array();
            for($x=0;$x<count($tableset);$x++){
                    $fields[] = $tableset[$x]['field'];
            }

            for($x=0;$x<count($tableset[0]['data']);$x++){
                $values = array();
                    for($y=0;$y<count($tableset);$y++){
                        $values[]=$tableset[$y]['data'][$x];
                    }
                    $baseSQL = "Insert into $tablename ( ".  implode(",",$fields)  . " ) values (" .'"' . implode('","',$values).'"'   . ")";
                    $this->addSql($baseSQL);
            }
        }


        foreach ($SD as $tablename => $tableset){
            for($x=0;$x<count($tableset['data']);$x++){
            $SQL = "Insert into $tablename (" .$tableset['field'] . ") values (" .'"' . $tableset['data'][$x] . '"' . ")";
                    $this->addSql($SQL);
            }
        }
        //---------------------------------


    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
