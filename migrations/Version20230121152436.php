<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230121152436 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cars (id INT AUTO_INCREMENT NOT NULL, brand VARCHAR(255) NOT NULL, model VARCHAR(255) NOT NULL, horses_power INT NOT NULL, max_speed INT NOT NULL, price INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pilotes (id INT AUTO_INCREMENT NOT NULL, cars_id INT NOT NULL, name VARCHAR(255) NOT NULL, nickname VARCHAR(255) NOT NULL, nationality VARCHAR(255) NOT NULL, furious_skill INT NOT NULL, budget INT NOT NULL, UNIQUE INDEX UNIQ_E30653368702F506 (cars_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE pilotes ADD CONSTRAINT FK_E30653368702F506 FOREIGN KEY (cars_id) REFERENCES cars (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pilotes DROP FOREIGN KEY FK_E30653368702F506');
        $this->addSql('DROP TABLE cars');
        $this->addSql('DROP TABLE pilotes');
    }
}
