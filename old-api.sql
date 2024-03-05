CREATE TABLE agence (id INT AUTO_INCREMENT NOT NULL, partenaire_de_id INT DEFAULT NULL, nom VARCHAR(100) NOT NULL, adresse VARCHAR(150) DEFAULT NULL, code_agence VARCHAR(50) NOT NULL, telephone VARCHAR(100) NOT NULL, email VARCHAR(50) DEFAULT NULL, est_partenaire TINYINT(1) NOT NULL, cree_le DATETIME NOT NULL, pays VARCHAR(50) NOT NULL, ville VARCHAR(50) NOT NULL, INDEX IDX_64C19AA9F68B7C39 (partenaire_de_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;
CREATE TABLE destinataire (id INT AUTO_INCREMENT NOT NULL, expediteur_id INT NOT NULL, code VARCHAR(30) DEFAULT NULL, nom VARCHAR(255) DEFAULT NULL, prenom VARCHAR(255) NOT NULL, adresse VARCHAR(255) DEFAULT NULL, boit_postal VARCHAR(30) DEFAULT NULL, ville VARCHAR(100) DEFAULT NULL, pays VARCHAR(100) DEFAULT NULL, telephone VARCHAR(100) DEFAULT NULL, creele DATETIME NOT NULL, INDEX IDX_FEA9FF9210335F61 (expediteur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;
CREATE TABLE devise (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(100) DEFAULT NULL, code VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;
CREATE TABLE devise_pays (devise_id INT NOT NULL, pays_id INT NOT NULL, INDEX IDX_DA78755AF4445056 (devise_id), INDEX IDX_DA78755AA6E44244 (pays_id), PRIMARY KEY(devise_id, pays_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;
CREATE TABLE expediteur (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(30) DEFAULT NULL, nom VARCHAR(255) DEFAULT NULL, prenom VARCHAR(255) NOT NULL, adresse VARCHAR(255) DEFAULT NULL, boit_postal VARCHAR(30) DEFAULT NULL, ville VARCHAR(100) DEFAULT NULL, pays VARCHAR(100) DEFAULT NULL, telephone VARCHAR(100) DEFAULT NULL, creele DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;
CREATE TABLE operation (id INT NOT NULL, code_agence VARCHAR(30) NOT NULL, montant DOUBLE PRECISION NOT NULL, devise VARCHAR(20) NOT NULL, type_operation VARCHAR(50) NOT NULL, cree_le DATETIME NOT NULL, recharge VARCHAR(30) NOT NULL, libelle_operation VARCHAR(220) DEFAULT NULL, code_transaction VARCHAR(100) NOT NULL, provenance VARCHAR(50) DEFAULT NULL, uuid BINARY(16) NOT NULL COMMENT '(DC2Type:uuid)', UNIQUE INDEX UNIQ_1981A66DD17F50A6 (uuid), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;
CREATE TABLE parametrage (id INT AUTO_INCREMENT NOT NULL, code_agence VARCHAR(30) NOT NULL, commission_envoie DOUBLE PRECISION DEFAULT NULL, commission_remise DOUBLE PRECISION DEFAULT NULL, frai_envoie DOUBLE PRECISION DEFAULT NULL, rattacher_a VARCHAR(30) DEFAULT NULL, creer_le DATETIME NOT NULL, maj_le DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;
CREATE TABLE pays (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(30) NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;
CREATE TABLE solde (id INT AUTO_INCREMENT NOT NULL, code_agence VARCHAR(30) NOT NULL, montant DOUBLE PRECISION NOT NULL, devise VARCHAR(20) NOT NULL, cree_le DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;
CREATE TABLE taux_echange (id INT AUTO_INCREMENT NOT NULL, devise_source VARCHAR(30) NOT NULL, devise_cible VARCHAR(30) NOT NULL, taux DOUBLE PRECISION NOT NULL, cree_le DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;
CREATE TABLE transaction (id INT AUTO_INCREMENT NOT NULL, expediteur_id INT NOT NULL, destinataire_id INT NOT NULL, statut VARCHAR(50) NOT NULL, cree_le DATETIME NOT NULL, modifie_le DATETIME DEFAULT NULL, montant_envoie DOUBLE PRECISION NOT NULL, devise_envoie VARCHAR(20) NOT NULL, code VARCHAR(50) NOT NULL, montant_remis DOUBLE PRECISION NOT NULL, devise_remis VARCHAR(20) NOT NULL, effectuer_par VARCHAR(30) NOT NULL, payer_par VARCHAR(30) NOT NULL, payer_le DATETIME DEFAULT NULL, INDEX IDX_723705D110335F61 (expediteur_id), INDEX IDX_723705D1A4F84F6E (destinataire_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;
CREATE TABLE user (id INT NOT NULL, agence_id INT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT '(DC2Type:json)', password VARCHAR(255) NOT NULL, username VARCHAR(100) NOT NULL, nom VARCHAR(100) NOT NULL, prenom VARCHAR(100) NOT NULL, uuid BINARY(16) NOT NULL COMMENT '(DC2Type:uuid)', mobile_number VARCHAR(100) DEFAULT NULL, cree_le DATETIME NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), UNIQUE INDEX UNIQ_8D93D649D17F50A6 (uuid), INDEX IDX_8D93D649D725330D (agence_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;
CREATE TABLE ville (id INT AUTO_INCREMENT NOT NULL, pays_id INT NOT NULL, code VARCHAR(30) NOT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_43C3D9C3A6E44244 (pays_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;
ALTER TABLE agence ADD CONSTRAINT FK_64C19AA9F68B7C39 FOREIGN KEY (partenaire_de_id) REFERENCES agence (id);
ALTER TABLE destinataire ADD CONSTRAINT FK_FEA9FF9210335F61 FOREIGN KEY (expediteur_id) REFERENCES expediteur (id);
ALTER TABLE devise_pays ADD CONSTRAINT FK_DA78755AF4445056 FOREIGN KEY (devise_id) REFERENCES devise (id) ON DELETE CASCADE;
ALTER TABLE devise_pays ADD CONSTRAINT FK_DA78755AA6E44244 FOREIGN KEY (pays_id) REFERENCES pays (id) ON DELETE CASCADE;
ALTER TABLE transaction ADD CONSTRAINT FK_723705D110335F61 FOREIGN KEY (expediteur_id) REFERENCES expediteur (id);
ALTER TABLE transaction ADD CONSTRAINT FK_723705D1A4F84F6E FOREIGN KEY (destinataire_id) REFERENCES destinataire (id);
ALTER TABLE user ADD CONSTRAINT FK_8D93D649D725330D FOREIGN KEY (agence_id) REFERENCES agence (id);
ALTER TABLE ville ADD CONSTRAINT FK_43C3D9C3A6E44244 FOREIGN KEY (pays_id) REFERENCES pays (id);