<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241215173353 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE soutenance DROP INDEX IDX_4D59FF6E35A49D7F, ADD UNIQUE INDEX UNIQ_4D59FF6E35A49D7F (etudiantt_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE soutenance DROP INDEX UNIQ_4D59FF6E35A49D7F, ADD INDEX IDX_4D59FF6E35A49D7F (etudiantt_id)');
    }
}
