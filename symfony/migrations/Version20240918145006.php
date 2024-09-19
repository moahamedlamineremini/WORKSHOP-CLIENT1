<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240918145006 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE accessoire (id INT AUTO_INCREMENT NOT NULL, accessoire_id INT NOT NULL, nom VARCHAR(255) NOT NULL, prix INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE admin (id INT AUTO_INCREMENT NOT NULL, admin_id INT NOT NULL, username VARCHAR(50) NOT NULL, password VARCHAR(255) NOT NULL, role VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE configuration_accessoire (id INT AUTO_INCREMENT NOT NULL, configuration_id_id INT NOT NULL, accessoire_id_id INT NOT NULL, INDEX IDX_F4CE8E3AE1455882 (configuration_id_id), INDEX IDX_F4CE8E3A5CCC9255 (accessoire_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE coque (id INT AUTO_INCREMENT NOT NULL, coque_id INT NOT NULL, type VARCHAR(255) NOT NULL, prix INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE coque_couleur (coque_id INT NOT NULL, couleur_id INT NOT NULL, INDEX IDX_F2D4BD9E220CEEF5 (coque_id), INDEX IDX_F2D4BD9EC31BA576 (couleur_id), PRIMARY KEY(coque_id, couleur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE couleur (id INT AUTO_INCREMENT NOT NULL, couleur_id INT NOT NULL, nom VARCHAR(255) NOT NULL, code_hex VARCHAR(8) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, image_id INT NOT NULL, type_element VARCHAR(255) NOT NULL, vue VARCHAR(255) NOT NULL, url_image VARCHAR(255) NOT NULL, image_file VARCHAR(255) NOT NULL, produit_id_id INT DEFAULT NULL, couleur_id_id INT NOT NULL, INDEX IDX_C53D045F4FD8F9C3 (produit_id_id), INDEX IDX_C53D045F6F285051 (couleur_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, produit_id INT NOT NULL, nom VARCHAR(255) NOT NULL, prix_base INT NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE produit_configuration (id INT AUTO_INCREMENT NOT NULL, configuration_id INT NOT NULL, installation_batterie TINYINT(1) NOT NULL, accn TINYINT(1) NOT NULL, produit_id_id INT NOT NULL, coque_avant_id_id INT NOT NULL, coque_arriere_id_id INT DEFAULT NULL, ecran_ips_id_id INT DEFAULT NULL, button_id_id INT DEFAULT NULL, pad_id_id INT DEFAULT NULL, INDEX IDX_8BBC03094FD8F9C3 (produit_id_id), INDEX IDX_8BBC03096A8EDBCF (coque_avant_id_id), INDEX IDX_8BBC0309B0746CEA (coque_arriere_id_id), INDEX IDX_8BBC0309B09A649F (ecran_ips_id_id), INDEX IDX_8BBC0309F4D82BB5 (button_id_id), INDEX IDX_8BBC030931ACCCC0 (pad_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
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

        $this->addSql('ALTER TABLE configuration_accessoire DROP FOREIGN KEY FK_F4CE8E3AE1455882');
        $this->addSql('ALTER TABLE configuration_accessoire DROP FOREIGN KEY FK_F4CE8E3A5CCC9255');
        $this->addSql('ALTER TABLE coque_couleur DROP FOREIGN KEY FK_F2D4BD9E220CEEF5');
        $this->addSql('ALTER TABLE coque_couleur DROP FOREIGN KEY FK_F2D4BD9EC31BA576');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045F4FD8F9C3');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045F6F285051');
        $this->addSql('ALTER TABLE produit_configuration DROP FOREIGN KEY FK_8BBC03094FD8F9C3');
        $this->addSql('ALTER TABLE produit_configuration DROP FOREIGN KEY FK_8BBC03096A8EDBCF');
        $this->addSql('ALTER TABLE produit_configuration DROP FOREIGN KEY FK_8BBC0309B0746CEA');
        $this->addSql('ALTER TABLE produit_configuration DROP FOREIGN KEY FK_8BBC0309B09A649F');
        $this->addSql('ALTER TABLE produit_configuration DROP FOREIGN KEY FK_8BBC0309F4D82BB5');
        $this->addSql('ALTER TABLE produit_configuration DROP FOREIGN KEY FK_8BBC030931ACCCC0');
        $this->addSql('DROP TABLE accessoire');
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE configuration_accessoire');
        $this->addSql('DROP TABLE coque');
        $this->addSql('DROP TABLE coque_couleur');
        $this->addSql('DROP TABLE couleur');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE produit_configuration');
        $this->addSql('DROP TABLE messenger_messages');
        
    }
}
