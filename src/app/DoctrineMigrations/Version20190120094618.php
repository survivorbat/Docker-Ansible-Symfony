<?php declare(strict_types=1);

namespace Application\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190120094618 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE to_do_item (id VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(1024) NOT NULL, status VARCHAR(32) NOT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE UTF8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE to_do_item_to_do_item (to_do_item_source VARCHAR(255) NOT NULL, to_do_item_target VARCHAR(255) NOT NULL, INDEX IDX_511810F1F300A467 (to_do_item_source), INDEX IDX_511810F1EAE5F4E8 (to_do_item_target), PRIMARY KEY(to_do_item_source, to_do_item_target)) DEFAULT CHARACTER SET UTF8 COLLATE UTF8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE to_do_item_to_do_item ADD CONSTRAINT FK_511810F1F300A467 FOREIGN KEY (to_do_item_source) REFERENCES to_do_item (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE to_do_item_to_do_item ADD CONSTRAINT FK_511810F1EAE5F4E8 FOREIGN KEY (to_do_item_target) REFERENCES to_do_item (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE to_do_item_to_do_item DROP FOREIGN KEY FK_511810F1F300A467');
        $this->addSql('ALTER TABLE to_do_item_to_do_item DROP FOREIGN KEY FK_511810F1EAE5F4E8');
        $this->addSql('DROP TABLE to_do_item');
        $this->addSql('DROP TABLE to_do_item_to_do_item');
    }
}
