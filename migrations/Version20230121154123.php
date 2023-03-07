<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230121154123 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cars ADD pilotes_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cars ADD CONSTRAINT FK_95C71D143E52F753 FOREIGN KEY (pilotes_id) REFERENCES pilotes (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_95C71D143E52F753 ON cars (pilotes_id)');
        $this->addSql('ALTER TABLE pilotes CHANGE cars_id cars_id INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cars DROP FOREIGN KEY FK_95C71D143E52F753');
        $this->addSql('DROP INDEX UNIQ_95C71D143E52F753 ON cars');
        $this->addSql('ALTER TABLE cars DROP pilotes_id');
        $this->addSql('ALTER TABLE pilotes CHANGE cars_id cars_id INT NOT NULL');
    }
}
