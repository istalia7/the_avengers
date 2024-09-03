<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240903064106 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, motif VARCHAR(255) NOT NULL, num_tel INT NOT NULL, message VARCHAR(800) NOT NULL, date_envoi DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entreprise (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, nbr_pers INT NOT NULL, image_name VARCHAR(255) DEFAULT NULL, image_size INT DEFAULT NULL, updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entreprise_seminaire (entreprise_id INT NOT NULL, seminaire_id INT NOT NULL, INDEX IDX_2D79B639A4AEAFEA (entreprise_id), INDEX IDX_2D79B639CEA14D8 (seminaire_id), PRIMARY KEY(entreprise_id, seminaire_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE entreprise_seminaire ADD CONSTRAINT FK_2D79B639A4AEAFEA FOREIGN KEY (entreprise_id) REFERENCES entreprise (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE entreprise_seminaire ADD CONSTRAINT FK_2D79B639CEA14D8 FOREIGN KEY (seminaire_id) REFERENCES seminaire (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE seminaire DROP date');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE entreprise_seminaire DROP FOREIGN KEY FK_2D79B639A4AEAFEA');
        $this->addSql('ALTER TABLE entreprise_seminaire DROP FOREIGN KEY FK_2D79B639CEA14D8');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE entreprise');
        $this->addSql('DROP TABLE entreprise_seminaire');
        $this->addSql('ALTER TABLE seminaire ADD date DATETIME NOT NULL');
    }
}
