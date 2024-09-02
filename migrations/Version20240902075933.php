<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240902075933 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE entreprise_seminaire (entreprise_id INT NOT NULL, seminaire_id INT NOT NULL, INDEX IDX_2D79B639A4AEAFEA (entreprise_id), INDEX IDX_2D79B639CEA14D8 (seminaire_id), PRIMARY KEY(entreprise_id, seminaire_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE entreprise_seminaire ADD CONSTRAINT FK_2D79B639A4AEAFEA FOREIGN KEY (entreprise_id) REFERENCES entreprise (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE entreprise_seminaire ADD CONSTRAINT FK_2D79B639CEA14D8 FOREIGN KEY (seminaire_id) REFERENCES seminaire (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE seminaire_entreprise DROP FOREIGN KEY FK_938AB2FCA4AEAFEA');
        $this->addSql('ALTER TABLE seminaire_entreprise DROP FOREIGN KEY FK_938AB2FCCEA14D8');
        $this->addSql('DROP TABLE seminaire_entreprise');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE seminaire_entreprise (seminaire_id INT NOT NULL, entreprise_id INT NOT NULL, INDEX IDX_938AB2FCA4AEAFEA (entreprise_id), INDEX IDX_938AB2FCCEA14D8 (seminaire_id), PRIMARY KEY(seminaire_id, entreprise_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE seminaire_entreprise ADD CONSTRAINT FK_938AB2FCA4AEAFEA FOREIGN KEY (entreprise_id) REFERENCES entreprise (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE seminaire_entreprise ADD CONSTRAINT FK_938AB2FCCEA14D8 FOREIGN KEY (seminaire_id) REFERENCES seminaire (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE entreprise_seminaire DROP FOREIGN KEY FK_2D79B639A4AEAFEA');
        $this->addSql('ALTER TABLE entreprise_seminaire DROP FOREIGN KEY FK_2D79B639CEA14D8');
        $this->addSql('DROP TABLE entreprise_seminaire');
    }
}
