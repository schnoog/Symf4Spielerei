<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190321121256 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE belaege (id INT AUTO_INCREMENT NOT NULL, belag VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_5F5C770DC7D54858 (belag), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fahrbahnbreiten (id INT AUTO_INCREMENT NOT NULL, fahrbahnbreite VARCHAR(20) NOT NULL, UNIQUE INDEX UNIQ_824499F04307411E (fahrbahnbreite), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE icons (id INT AUTO_INCREMENT NOT NULL, icon VARCHAR(40) NOT NULL, icon_bild_ident VARCHAR(50) NOT NULL, UNIQUE INDEX UNIQ_A6A507E659429DB (icon), UNIQUE INDEX UNIQ_A6A507EF25E693B (icon_bild_ident), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE kategorien (id INT AUTO_INCREMENT NOT NULL, kategorie VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE laender (id INT AUTO_INCREMENT NOT NULL, land_kurz VARCHAR(3) NOT NULL, land VARCHAR(255) NOT NULL, allowed TINYINT(1) NOT NULL, aktiv_ab_saison INT NOT NULL, aktiv_bis_saison INT NOT NULL, UNIQUE INDEX UNIQ_71A6B113A174BD3A (land_kurz), UNIQUE INDEX UNIQ_71A6B113A800D5D8 (land), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE laenderkategorien (id INT AUTO_INCREMENT NOT NULL, laenderkategorie_kurz VARCHAR(3) NOT NULL, laenderkategorie VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_FF99B1E4BEC18B53 (laenderkategorie_kurz), UNIQUE INDEX UNIQ_FF99B1E499B1E491 (laenderkategorie), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE paesse (id INT AUTO_INCREMENT NOT NULL, typ_id INT NOT NULL, landes_region_id INT NOT NULL, kategorie_id INT NOT NULL, status_id INT NOT NULL, von_richtung_id INT DEFAULT NULL, nach_richtung_id INT DEFAULT NULL, schwierigkeit_id INT NOT NULL, fahrbahnbreite_id INT DEFAULT NULL, wintersperre_id INT DEFAULT NULL, laenderkategorie_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, hoehe INT NOT NULL, ausbauart VARCHAR(255) NOT NULL, von_ort VARCHAR(255) DEFAULT NULL, von_hoehe INT NOT NULL, von_distanz NUMERIC(4, 1) DEFAULT NULL, von_kehren INT NOT NULL, nach_ort VARCHAR(255) DEFAULT NULL, nach_hoehe INT NOT NULL, nach_distanz NUMERIC(4, 1) DEFAULT NULL, nach_kehren INT NOT NULL, maut TEXT DEFAULT NULL, besonderes TEXT DEFAULT NULL, sehenswuerdigkeit TEXT DEFAULT NULL, fototip VARCHAR(255) DEFAULT NULL, geo_lat NUMERIC(11, 8) NOT NULL, geo_lon NUMERIC(11, 8) NOT NULL, alte_id INT DEFAULT NULL, INDEX IDX_7D379C451CE4A29C (laenderkategorie_id), INDEX IDX_7D379C457FFA0EE (fahrbahnbreite_id), INDEX IDX_7D379C45537978D7 (nach_richtung_id), INDEX IDX_7D379C456BF700BD (status_id), INDEX IDX_7D379C45E11006A4 (landes_region_id), INDEX IDX_7D379C458493AC36 (wintersperre_id), INDEX IDX_7D379C45458897DF (schwierigkeit_id), INDEX IDX_7D379C4524A195EC (von_richtung_id), INDEX IDX_7D379C45BAF991D3 (kategorie_id), INDEX IDX_7D379C45278CD074 (typ_id), UNIQUE INDEX UNIQ_7D379C4556310A12 (alte_id), UNIQUE INDEX UNIQ_7D379C455E237E06 (name), UNIQUE INDEX UNIQ_7D379C452ADA7B4F (ausbauart), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE paesse_belaege (paesse_id INT NOT NULL, belaege_id INT NOT NULL, INDEX IDX_7A3C55DA7559EA7F (paesse_id), INDEX IDX_7A3C55DA6C3AA4D2 (belaege_id), PRIMARY KEY(paesse_id, belaege_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE paesse_icons (paesse_id INT NOT NULL, icons_id INT NOT NULL, INDEX IDX_FAE4D6377559EA7F (paesse_id), INDEX IDX_FAE4D6372FF25572 (icons_id), PRIMARY KEY(paesse_id, icons_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE regionen (id INT AUTO_INCREMENT NOT NULL, land_id INT DEFAULT NULL, region VARCHAR(255) NOT NULL, region_kurz VARCHAR(10) NOT NULL, INDEX IDX_4086D2DA1994904A (land_id), UNIQUE INDEX UniqueCountryRegion (land_id, region, region_kurz), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE richtungen (id INT AUTO_INCREMENT NOT NULL, richtung_kurz VARCHAR(3) NOT NULL, richtung VARCHAR(20) NOT NULL, UNIQUE INDEX UNIQ_82AB01B6452169EB (richtung_kurz), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE schwierigkeiten (id INT AUTO_INCREMENT NOT NULL, schwierigkeit INT NOT NULL, schwierigkeitsgrad VARCHAR(2048) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stati (id INT AUTO_INCREMENT NOT NULL, status VARCHAR(20) NOT NULL, UNIQUE INDEX UNIQ_AA259ED07B00651C (status), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE typen (id INT AUTO_INCREMENT NOT NULL, typ VARCHAR(25) NOT NULL, UNIQUE INDEX UNIQ_3A36E5E9241AA1D (typ), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wintersperren (id INT AUTO_INCREMENT NOT NULL, wintersperre VARCHAR(100) NOT NULL, UNIQUE INDEX UNIQ_DB3A98C38E3B6562 (wintersperre), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE paesse ADD CONSTRAINT FK_7D379C45278CD074 FOREIGN KEY (typ_id) REFERENCES typen (id)');
        $this->addSql('ALTER TABLE paesse ADD CONSTRAINT FK_7D379C45E11006A4 FOREIGN KEY (landes_region_id) REFERENCES regionen (id)');
        $this->addSql('ALTER TABLE paesse ADD CONSTRAINT FK_7D379C45BAF991D3 FOREIGN KEY (kategorie_id) REFERENCES kategorien (id)');
        $this->addSql('ALTER TABLE paesse ADD CONSTRAINT FK_7D379C456BF700BD FOREIGN KEY (status_id) REFERENCES stati (id)');
        $this->addSql('ALTER TABLE paesse ADD CONSTRAINT FK_7D379C4524A195EC FOREIGN KEY (von_richtung_id) REFERENCES richtungen (id)');
        $this->addSql('ALTER TABLE paesse ADD CONSTRAINT FK_7D379C45537978D7 FOREIGN KEY (nach_richtung_id) REFERENCES richtungen (id)');
        $this->addSql('ALTER TABLE paesse ADD CONSTRAINT FK_7D379C45458897DF FOREIGN KEY (schwierigkeit_id) REFERENCES schwierigkeiten (id)');
        $this->addSql('ALTER TABLE paesse ADD CONSTRAINT FK_7D379C457FFA0EE FOREIGN KEY (fahrbahnbreite_id) REFERENCES fahrbahnbreiten (id)');
        $this->addSql('ALTER TABLE paesse ADD CONSTRAINT FK_7D379C458493AC36 FOREIGN KEY (wintersperre_id) REFERENCES wintersperren (id)');
        $this->addSql('ALTER TABLE paesse ADD CONSTRAINT FK_7D379C451CE4A29C FOREIGN KEY (laenderkategorie_id) REFERENCES laenderkategorien (id)');
        $this->addSql('ALTER TABLE paesse_belaege ADD CONSTRAINT FK_7A3C55DA7559EA7F FOREIGN KEY (paesse_id) REFERENCES paesse (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE paesse_belaege ADD CONSTRAINT FK_7A3C55DA6C3AA4D2 FOREIGN KEY (belaege_id) REFERENCES belaege (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE paesse_icons ADD CONSTRAINT FK_FAE4D6377559EA7F FOREIGN KEY (paesse_id) REFERENCES paesse (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE paesse_icons ADD CONSTRAINT FK_FAE4D6372FF25572 FOREIGN KEY (icons_id) REFERENCES icons (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE regionen ADD CONSTRAINT FK_4086D2DA1994904A FOREIGN KEY (land_id) REFERENCES laender (id)');
        $this->addSql('DROP TABLE paesse_conv');
        $this->addSql('ALTER TABLE fos_user CHANGE salt salt VARCHAR(255) DEFAULT NULL, CHANGE last_login last_login DATETIME DEFAULT NULL, CHANGE confirmation_token confirmation_token VARCHAR(180) DEFAULT NULL, CHANGE password_requested_at password_requested_at DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE paesse_belaege DROP FOREIGN KEY FK_7A3C55DA6C3AA4D2');
        $this->addSql('ALTER TABLE paesse DROP FOREIGN KEY FK_7D379C457FFA0EE');
        $this->addSql('ALTER TABLE paesse_icons DROP FOREIGN KEY FK_FAE4D6372FF25572');
        $this->addSql('ALTER TABLE paesse DROP FOREIGN KEY FK_7D379C45BAF991D3');
        $this->addSql('ALTER TABLE regionen DROP FOREIGN KEY FK_4086D2DA1994904A');
        $this->addSql('ALTER TABLE paesse DROP FOREIGN KEY FK_7D379C451CE4A29C');
        $this->addSql('ALTER TABLE paesse_belaege DROP FOREIGN KEY FK_7A3C55DA7559EA7F');
        $this->addSql('ALTER TABLE paesse_icons DROP FOREIGN KEY FK_FAE4D6377559EA7F');
        $this->addSql('ALTER TABLE paesse DROP FOREIGN KEY FK_7D379C45E11006A4');
        $this->addSql('ALTER TABLE paesse DROP FOREIGN KEY FK_7D379C4524A195EC');
        $this->addSql('ALTER TABLE paesse DROP FOREIGN KEY FK_7D379C45537978D7');
        $this->addSql('ALTER TABLE paesse DROP FOREIGN KEY FK_7D379C45458897DF');
        $this->addSql('ALTER TABLE paesse DROP FOREIGN KEY FK_7D379C456BF700BD');
        $this->addSql('ALTER TABLE paesse DROP FOREIGN KEY FK_7D379C45278CD074');
        $this->addSql('ALTER TABLE paesse DROP FOREIGN KEY FK_7D379C458493AC36');
        $this->addSql('CREATE TABLE paesse_conv (id INT DEFAULT NULL, paesse_nr INT NOT NULL, done INT DEFAULT 0 NOT NULL, problem INT DEFAULT 0 NOT NULL, problemfield TEXT NOT NULL COLLATE utf8mb4_general_ci, UNIQUE INDEX pid (paesse_nr)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE belaege');
        $this->addSql('DROP TABLE fahrbahnbreiten');
        $this->addSql('DROP TABLE icons');
        $this->addSql('DROP TABLE kategorien');
        $this->addSql('DROP TABLE laender');
        $this->addSql('DROP TABLE laenderkategorien');
        $this->addSql('DROP TABLE paesse');
        $this->addSql('DROP TABLE paesse_belaege');
        $this->addSql('DROP TABLE paesse_icons');
        $this->addSql('DROP TABLE regionen');
        $this->addSql('DROP TABLE richtungen');
        $this->addSql('DROP TABLE schwierigkeiten');
        $this->addSql('DROP TABLE stati');
        $this->addSql('DROP TABLE typen');
        $this->addSql('DROP TABLE wintersperren');
        $this->addSql('ALTER TABLE fos_user CHANGE salt salt VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE last_login last_login DATETIME DEFAULT \'NULL\', CHANGE confirmation_token confirmation_token VARCHAR(180) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE password_requested_at password_requested_at DATETIME DEFAULT \'NULL\'');
    }
}
