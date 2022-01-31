<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220131092524 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE location CHANGE user_id institution_id INT NOT NULL');
        $this->addSql('ALTER TABLE project ADD institution_id INT NOT NULL');
        $this->addSql('ALTER TABLE sample CHANGE user_id institution_id INT NOT NULL');
        $this->addSql('ALTER TABLE subproject ADD institution_id INT NOT NULL');
        $this->addSql('ALTER TABLE user ADD institution_id INT NOT NULL, DROP instituition');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE location CHANGE institution_id user_id INT NOT NULL');
        $this->addSql('ALTER TABLE project DROP institution_id');
        $this->addSql('ALTER TABLE sample CHANGE institution_id user_id INT NOT NULL');
        $this->addSql('ALTER TABLE subproject DROP institution_id');
        $this->addSql('ALTER TABLE user ADD instituition VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP institution_id');
    }
}
