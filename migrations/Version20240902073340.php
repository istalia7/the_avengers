<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240902073340 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE entreprise (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, nbr_pers INT NOT NULL, date_seminaire DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE seminaire_entreprise (seminaire_id INT NOT NULL, entreprise_id INT NOT NULL, INDEX IDX_938AB2FCCEA14D8 (seminaire_id), INDEX IDX_938AB2FCA4AEAFEA (entreprise_id), PRIMARY KEY(seminaire_id, entreprise_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE seminaire_entreprise ADD CONSTRAINT FK_938AB2FCCEA14D8 FOREIGN KEY (seminaire_id) REFERENCES seminaire (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE seminaire_entreprise ADD CONSTRAINT FK_938AB2FCA4AEAFEA FOREIGN KEY (entreprise_id) REFERENCES entreprise (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE seminaire_entreprise DROP FOREIGN KEY FK_938AB2FCCEA14D8');
        $this->addSql('ALTER TABLE seminaire_entreprise DROP FOREIGN KEY FK_938AB2FCA4AEAFEA');
        $this->addSql('DROP TABLE entreprise');
        $this->addSql('DROP TABLE seminaire_entreprise');
    }
}
