<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240823141559 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE race (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE race_traits (id INT AUTO_INCREMENT NOT NULL, human VARCHAR(300) DEFAULT NULL, halfling VARCHAR(255) NOT NULL, dwarf VARCHAR(255) NOT NULL, elf VARCHAR(255) NOT NULL, dragonborn VARCHAR(255) NOT NULL, tiefling VARCHAR(255) NOT NULL, half_elf VARCHAR(255) NOT NULL, half_orc VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE racial_traits (id INT AUTO_INCREMENT NOT NULL, race_id INT NOT NULL, size VARCHAR(50) NOT NULL, speed VARCHAR(50) NOT NULL, extra_language VARCHAR(255) NOT NULL, ability_bonus VARCHAR(70) NOT NULL, racial_ability VARCHAR(255) DEFAULT NULL, INDEX IDX_CE4CC9216E59D40D (race_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE racial_traits ADD CONSTRAINT FK_CE4CC9216E59D40D FOREIGN KEY (race_id) REFERENCES race (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE racial_traits DROP FOREIGN KEY FK_CE4CC9216E59D40D');
        $this->addSql('DROP TABLE race');
        $this->addSql('DROP TABLE race_traits');
        $this->addSql('DROP TABLE racial_traits');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
