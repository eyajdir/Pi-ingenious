<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210304222618 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE admin (id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE blog (id INT AUTO_INCREMENT NOT NULL, user INT NOT NULL, cat VARCHAR(255) NOT NULL, date DATE NOT NULL, contenu VARCHAR(255) NOT NULL, titre VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE candidate (id INT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, tel INT NOT NULL, pays VARCHAR(255) NOT NULL, gouvernorat VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, code_postal INT NOT NULL, birthday DATE NOT NULL, profile_pic VARCHAR(255) DEFAULT NULL, cv VARCHAR(255) DEFAULT NULL, about_you LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commentaire (id INT AUTO_INCREMENT NOT NULL, user INT NOT NULL, nom VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, subject VARCHAR(255) NOT NULL, mobile INT NOT NULL, commentaire VARCHAR(255) NOT NULL, date DATE NOT NULL, rate INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entreprise (id INT NOT NULL, nom VARCHAR(255) NOT NULL, about LONGTEXT NOT NULL, adresse VARCHAR(255) NOT NULL, tel INT NOT NULL, siteweb VARCHAR(255) DEFAULT NULL, twitter VARCHAR(255) DEFAULT NULL, linkdin VARCHAR(255) DEFAULT NULL, facebook VARCHAR(255) DEFAULT NULL, profil_pic VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, type TINYINT(1) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', typeC VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE admin ADD CONSTRAINT FK_880E0D76BF396750 FOREIGN KEY (id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE candidate ADD CONSTRAINT FK_C8B28E44BF396750 FOREIGN KEY (id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE entreprise ADD CONSTRAINT FK_D19FA60BF396750 FOREIGN KEY (id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE participant CHANGE id_user user INT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE admin DROP FOREIGN KEY FK_880E0D76BF396750');
        $this->addSql('ALTER TABLE candidate DROP FOREIGN KEY FK_C8B28E44BF396750');
        $this->addSql('ALTER TABLE entreprise DROP FOREIGN KEY FK_D19FA60BF396750');
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE blog');
        $this->addSql('DROP TABLE candidate');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE entreprise');
        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE participant CHANGE user id_user INT NOT NULL');
    }
}
