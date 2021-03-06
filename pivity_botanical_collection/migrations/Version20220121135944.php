<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220121135944 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE sample (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, species_id INT NOT NULL, location_id INT NOT NULL, project_id INT NOT NULL, subproject_id INT DEFAULT NULL, collection_id INT DEFAULT NULL, field_id INT DEFAULT NULL, collector_name VARCHAR(255) NOT NULL, taxonomist_name VARCHAR(255) NOT NULL, data_collect DATETIME NOT NULL, extra_informmation VARCHAR(255) DEFAULT NULL, image LONGBLOB DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE sample');
    }
}
