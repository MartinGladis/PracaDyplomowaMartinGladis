<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220222171733 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category ADD image VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE category ADD slug VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE product ADD description VARCHAR(65025) NOT NULL');
        $this->addSql('ALTER TABLE product ADD created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL');
        $this->addSql('ALTER TABLE product ADD slug VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE product DROP image_filename');
        $this->addSql('ALTER TABLE product ALTER price DROP NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE category DROP image');
        $this->addSql('ALTER TABLE category DROP slug');
        $this->addSql('ALTER TABLE product ADD image_filename VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE product DROP description');
        $this->addSql('ALTER TABLE product DROP created_at');
        $this->addSql('ALTER TABLE product DROP slug');
        $this->addSql('ALTER TABLE product ALTER price SET NOT NULL');
    }
}
