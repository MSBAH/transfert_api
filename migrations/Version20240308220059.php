<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240308220059 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE agence (id INT AUTO_INCREMENT NOT NULL, partenaier_de_id INT DEFAULT NULL, nom VARCHAR(150) NOT NULL, adresse VARCHAR(150) DEFAULT NULL, code_agence VARCHAR(50) NOT NULL, telephone VARCHAR(150) NOT NULL, email VARCHAR(100) DEFAULT NULL, est_partenaire TINYINT(1) NOT NULL, cree_le DATETIME NOT NULL, pays VARCHAR(100) NOT NULL, ville VARCHAR(100) NOT NULL, INDEX IDX_64C19AA9228CE64B (partenaier_de_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE destinataire (id INT AUTO_INCREMENT NOT NULL, expediteur_id INT NOT NULL, iid INT NOT NULL, code VARCHAR(50) NOT NULL, nom VARCHAR(150) NOT NULL, prenom VARCHAR(150) NOT NULL, adresse VARCHAR(150) DEFAULT NULL, code_postale VARCHAR(50) DEFAULT NULL, pays VARCHAR(100) NOT NULL, ville VARCHAR(100) DEFAULT NULL, telephone VARCHAR(100) NOT NULL, cree_le DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_FEA9FF9210335F61 (expediteur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE devise (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(30) NOT NULL, libelle VARCHAR(70) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE expediteur (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(50) NOT NULL, nom VARCHAR(150) NOT NULL, prenom VARCHAR(150) NOT NULL, adresse VARCHAR(150) DEFAULT NULL, code_postal VARCHAR(10) DEFAULT NULL, ville VARCHAR(100) DEFAULT NULL, pays VARCHAR(100) NOT NULL, telephone VARCHAR(100) NOT NULL, cree_le DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE operation_uv (id INT AUTO_INCREMENT NOT NULL, code_agence VARCHAR(50) NOT NULL, montant DOUBLE PRECISION NOT NULL, devise VARCHAR(50) NOT NULL, type_operation VARCHAR(50) NOT NULL, cree_le DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', libelle_operation VARCHAR(200) DEFAULT NULL, recharge VARCHAR(100) DEFAULT NULL, code_transaction VARCHAR(50) DEFAULT NULL, provenance VARCHAR(100) DEFAULT NULL, realise_par VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE parametrage (id INT AUTO_INCREMENT NOT NULL, code_agence VARCHAR(50) NOT NULL, commission_envoie DOUBLE PRECISION DEFAULT NULL, commission_remise DOUBLE PRECISION DEFAULT NULL, fraie_envoie DOUBLE PRECISION DEFAULT NULL, rattacher_a VARCHAR(50) DEFAULT NULL, creer_le DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pays (id INT AUTO_INCREMENT NOT NULL, devise_principal_id INT DEFAULT NULL, code VARCHAR(50) NOT NULL, nom VARCHAR(100) NOT NULL, devise_pays VARCHAR(50) DEFAULT NULL, INDEX IDX_349F3CAE715F0870 (devise_principal_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE solde (id INT AUTO_INCREMENT NOT NULL, code_agence VARCHAR(50) NOT NULL, montant DOUBLE PRECISION NOT NULL, devise VARCHAR(50) NOT NULL, cree_le DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE taux_echange (id INT AUTO_INCREMENT NOT NULL, devise_source VARCHAR(50) NOT NULL, devise_cible VARCHAR(50) NOT NULL, taux DOUBLE PRECISION NOT NULL, cree_le DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE transaction (id INT AUTO_INCREMENT NOT NULL, expediteur_id INT NOT NULL, destinataire_id INT NOT NULL, statut VARCHAR(50) NOT NULL, cree_le DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', modifie_le DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', montant_envoyer DOUBLE PRECISION NOT NULL, devise_envoie VARCHAR(50) NOT NULL, code VARCHAR(50) NOT NULL, montant_reception DOUBLE PRECISION NOT NULL, devise_reception VARCHAR(50) NOT NULL, effectuer_par VARCHAR(50) NOT NULL, agence_effectuer_par VARCHAR(50) NOT NULL, payer_par VARCHAR(50) NOT NULL, agence_payer_par VARCHAR(50) NOT NULL, payer_le DATETIME DEFAULT NULL, pays_depart VARCHAR(50) NOT NULL, ville_depart VARCHAR(50) NOT NULL, pays_destination VARCHAR(50) NOT NULL, ville_destination VARCHAR(50) NOT NULL, INDEX IDX_723705D110335F61 (expediteur_id), INDEX IDX_723705D1A4F84F6E (destinataire_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, agence_id INT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, email VARCHAR(100) DEFAULT NULL, nom VARCHAR(100) NOT NULL, prenom VARCHAR(100) NOT NULL, uuid CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', telephone VARCHAR(100) DEFAULT NULL, cree_le DATETIME NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), INDEX IDX_8D93D649D725330D (agence_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ville (id INT AUTO_INCREMENT NOT NULL, pays_id INT NOT NULL, code VARCHAR(50) NOT NULL, nom VARCHAR(100) NOT NULL, INDEX IDX_43C3D9C3A6E44244 (pays_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE agence ADD CONSTRAINT FK_64C19AA9228CE64B FOREIGN KEY (partenaier_de_id) REFERENCES agence (id)');
        $this->addSql('ALTER TABLE destinataire ADD CONSTRAINT FK_FEA9FF9210335F61 FOREIGN KEY (expediteur_id) REFERENCES expediteur (id)');
        $this->addSql('ALTER TABLE pays ADD CONSTRAINT FK_349F3CAE715F0870 FOREIGN KEY (devise_principal_id) REFERENCES devise (id)');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D110335F61 FOREIGN KEY (expediteur_id) REFERENCES expediteur (id)');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D1A4F84F6E FOREIGN KEY (destinataire_id) REFERENCES destinataire (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649D725330D FOREIGN KEY (agence_id) REFERENCES agence (id)');
        $this->addSql('ALTER TABLE ville ADD CONSTRAINT FK_43C3D9C3A6E44244 FOREIGN KEY (pays_id) REFERENCES pays (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE agence DROP FOREIGN KEY FK_64C19AA9228CE64B');
        $this->addSql('ALTER TABLE destinataire DROP FOREIGN KEY FK_FEA9FF9210335F61');
        $this->addSql('ALTER TABLE pays DROP FOREIGN KEY FK_349F3CAE715F0870');
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D110335F61');
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D1A4F84F6E');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649D725330D');
        $this->addSql('ALTER TABLE ville DROP FOREIGN KEY FK_43C3D9C3A6E44244');
        $this->addSql('DROP TABLE agence');
        $this->addSql('DROP TABLE destinataire');
        $this->addSql('DROP TABLE devise');
        $this->addSql('DROP TABLE expediteur');
        $this->addSql('DROP TABLE operation_uv');
        $this->addSql('DROP TABLE parametrage');
        $this->addSql('DROP TABLE pays');
        $this->addSql('DROP TABLE solde');
        $this->addSql('DROP TABLE taux_echange');
        $this->addSql('DROP TABLE transaction');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE ville');
    }
}
