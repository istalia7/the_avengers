<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240909081649 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE contact_entreprise (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, num_tel VARCHAR(255) NOT NULL, nom_entreprise VARCHAR(255) NOT NULL, raison VARCHAR(255) NOT NULL, message VARCHAR(800) NOT NULL, date_envoi DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE infos_contact (id INT AUTO_INCREMENT NOT NULL, adresse VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, adresse_mail VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE contact CHANGE num_tel num_tel VARCHAR(255) NOT NULL, CHANGE motif raison VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE seminaire ADD description_structure VARCHAR(800) NOT NULL, ADD description_equipement VARCHAR(800) NOT NULL, ADD image_equipement VARCHAR(255) DEFAULT NULL, ADD image_equipement_size INT DEFAULT NULL, ADD equipement_updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', DROP description, CHANGE image_name image_structure VARCHAR(255) DEFAULT NULL, CHANGE image_size image_structure_size INT DEFAULT NULL, CHANGE updated_at structure_updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE contact_entreprise');
        $this->addSql('DROP TABLE infos_contact');
        $this->addSql('ALTER TABLE contact CHANGE num_tel num_tel INT NOT NULL, CHANGE raison motif VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE seminaire ADD description VARCHAR(255) NOT NULL, ADD image_name VARCHAR(255) DEFAULT NULL, ADD image_size INT DEFAULT NULL, ADD updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', DROP description_structure, DROP description_equipement, DROP image_structure, DROP image_structure_size, DROP structure_updated_at, DROP image_equipement, DROP image_equipement_size, DROP equipement_updated_at');
    }
}
