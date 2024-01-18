<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240118114405 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE customer ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE customer ADD CONSTRAINT FK_81398E09A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_81398E09A76ED395 ON customer (user_id)');
        $this->addSql('ALTER TABLE meet ADD pet_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE meet ADD CONSTRAINT FK_E9F6D3CE966F7FB6 FOREIGN KEY (pet_id) REFERENCES pet (id)');
        $this->addSql('CREATE INDEX IDX_E9F6D3CE966F7FB6 ON meet (pet_id)');
        $this->addSql('ALTER TABLE pet ADD customer_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE pet ADD CONSTRAINT FK_E4529B859395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id)');
        $this->addSql('CREATE INDEX IDX_E4529B859395C3F3 ON pet (customer_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE customer DROP FOREIGN KEY FK_81398E09A76ED395');
        $this->addSql('DROP INDEX IDX_81398E09A76ED395 ON customer');
        $this->addSql('ALTER TABLE customer DROP user_id');
        $this->addSql('ALTER TABLE pet DROP FOREIGN KEY FK_E4529B859395C3F3');
        $this->addSql('DROP INDEX IDX_E4529B859395C3F3 ON pet');
        $this->addSql('ALTER TABLE pet DROP customer_id');
        $this->addSql('ALTER TABLE meet DROP FOREIGN KEY FK_E9F6D3CE966F7FB6');
        $this->addSql('DROP INDEX IDX_E9F6D3CE966F7FB6 ON meet');
        $this->addSql('ALTER TABLE meet DROP pet_id');
    }
}
