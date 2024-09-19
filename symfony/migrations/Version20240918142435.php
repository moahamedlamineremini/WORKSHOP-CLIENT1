<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240918142435 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE configuration_accessoire ADD CONSTRAINT FK_F4CE8E3AE1455882 FOREIGN KEY (configuration_id_id) REFERENCES produit_configuration (id)');
        $this->addSql('ALTER TABLE configuration_accessoire ADD CONSTRAINT FK_F4CE8E3A5CCC9255 FOREIGN KEY (accessoire_id_id) REFERENCES accessoire (id)');
        $this->addSql('ALTER TABLE coque_couleur ADD CONSTRAINT FK_F2D4BD9E220CEEF5 FOREIGN KEY (coque_id) REFERENCES coque (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE coque_couleur ADD CONSTRAINT FK_F2D4BD9EC31BA576 FOREIGN KEY (couleur_id) REFERENCES couleur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045F4FD8F9C3 FOREIGN KEY (produit_id_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045F6F285051 FOREIGN KEY (couleur_id_id) REFERENCES couleur (id)');
        $this->addSql('ALTER TABLE produit_configuration ADD CONSTRAINT FK_8BBC03094FD8F9C3 FOREIGN KEY (produit_id_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE produit_configuration ADD CONSTRAINT FK_8BBC03096A8EDBCF FOREIGN KEY (coque_avant_id_id) REFERENCES coque (id)');
        $this->addSql('ALTER TABLE produit_configuration ADD CONSTRAINT FK_8BBC0309B0746CEA FOREIGN KEY (coque_arriere_id_id) REFERENCES coque (id)');
        $this->addSql('ALTER TABLE produit_configuration ADD CONSTRAINT FK_8BBC0309B09A649F FOREIGN KEY (ecran_ips_id_id) REFERENCES couleur (id)');
        $this->addSql('ALTER TABLE produit_configuration ADD CONSTRAINT FK_8BBC0309F4D82BB5 FOREIGN KEY (button_id_id) REFERENCES couleur (id)');
        $this->addSql('ALTER TABLE produit_configuration ADD CONSTRAINT FK_8BBC030931ACCCC0 FOREIGN KEY (pad_id_id) REFERENCES couleur (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045F4FD8F9C3');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045F6F285051');
        $this->addSql('ALTER TABLE configuration_accessoire DROP FOREIGN KEY FK_F4CE8E3AE1455882');
        $this->addSql('ALTER TABLE configuration_accessoire DROP FOREIGN KEY FK_F4CE8E3A5CCC9255');
        $this->addSql('ALTER TABLE coque_couleur DROP FOREIGN KEY FK_F2D4BD9E220CEEF5');
        $this->addSql('ALTER TABLE coque_couleur DROP FOREIGN KEY FK_F2D4BD9EC31BA576');
        $this->addSql('ALTER TABLE produit_configuration DROP FOREIGN KEY FK_8BBC03094FD8F9C3');
        $this->addSql('ALTER TABLE produit_configuration DROP FOREIGN KEY FK_8BBC03096A8EDBCF');
        $this->addSql('ALTER TABLE produit_configuration DROP FOREIGN KEY FK_8BBC0309B0746CEA');
        $this->addSql('ALTER TABLE produit_configuration DROP FOREIGN KEY FK_8BBC0309B09A649F');
        $this->addSql('ALTER TABLE produit_configuration DROP FOREIGN KEY FK_8BBC0309F4D82BB5');
        $this->addSql('ALTER TABLE produit_configuration DROP FOREIGN KEY FK_8BBC030931ACCCC0');
    }
}
