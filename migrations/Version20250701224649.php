<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20250701225359 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Migration initiale PostgreSQL pour le projet';
    }

    public function up(Schema $schema): void
    {
        // Table form_contact
        $this->addSql('CREATE TABLE form_contact (
            id SERIAL PRIMARY KEY,
            prenom VARCHAR(25) NOT NULL,
            nom VARCHAR(25) NOT NULL,
            email VARCHAR(50) NOT NULL,
            nom_institution VARCHAR(50) NOT NULL,
            nom_session VARCHAR(50) NOT NULL,
            nom_module VARCHAR(50) NOT NULL,
            dates VARCHAR(25) NOT NULL,
            offre VARCHAR(25) NOT NULL,
            message TEXT DEFAULT NULL
        )');

        // Table institution
        $this->addSql('CREATE TABLE institution (
            id SERIAL PRIMARY KEY,
            nom VARCHAR(255) NOT NULL,
            adresse VARCHAR(255) NOT NULL,
            telephone BIGINT NOT NULL,
            courriel VARCHAR(255) NOT NULL,
            cree_par_id INT DEFAULT NULL
        )');
        $this->addSql('CREATE INDEX idx_institution_nom ON institution (nom)');
        $this->addSql('CREATE INDEX idx_institution_adresse ON institution (adresse)');
        $this->addSql('CREATE INDEX idx_institution_telephone ON institution (telephone)');
        $this->addSql('CREATE INDEX idx_institution_courriel ON institution (courriel)');

        // Table invitation
        $this->addSql('CREATE TABLE invitation (
            id SERIAL PRIMARY KEY,
            institution_id INT NOT NULL,
            invited_by_id INT NOT NULL,
            email VARCHAR(255) NOT NULL,
            token VARCHAR(32) NOT NULL,
            expires_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
            created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL
        )');
        $this->addSql('CREATE UNIQUE INDEX uniq_invitation_token ON invitation (token)');
        $this->addSql('CREATE INDEX idx_invitation_institution ON invitation (institution_id)');
        $this->addSql('CREATE INDEX idx_invitation_invited_by ON invitation (invited_by_id)');

        // Table jour_horaire
        $this->addSql('CREATE TABLE jour_horaire (
            id SERIAL PRIMARY KEY,
            session_module_id INT NOT NULL,
            jour VARCHAR(10) DEFAULT NULL,
            date_precise DATE DEFAULT NULL,
            heure_debut TIME NOT NULL,
            heure_fin TIME NOT NULL
        )');
        $this->addSql('CREATE INDEX idx_jour_horaire_session_module ON jour_horaire (session_module_id)');

        // Table module
        $this->addSql('CREATE TABLE module (
            id SERIAL PRIMARY KEY,
            nom VARCHAR(255) NOT NULL,
            description VARCHAR(255) NOT NULL,
            commentaire VARCHAR(255) NOT NULL,
            date_debut DATE NOT NULL,
            date_fin DATE NOT NULL
        )');
        $this->addSql('CREATE INDEX idx_module_nom ON module (nom)');
        $this->addSql('CREATE INDEX idx_module_description ON module (description)');
        $this->addSql('CREATE INDEX idx_module_commentaire ON module (commentaire)');
        $this->addSql('CREATE INDEX idx_module_date_debut ON module (date_debut)');
        $this->addSql('CREATE INDEX idx_module_date_fin ON module (date_fin)');

        // Table session
        $this->addSql('CREATE TABLE session (
            id SERIAL PRIMARY KEY,
            nom VARCHAR(255) NOT NULL,
            type VARCHAR(255) NOT NULL,
            date_debut DATE NOT NULL,
            date_fin DATE NOT NULL,
            description VARCHAR(255) NOT NULL
        )');
        $this->addSql('CREATE INDEX idx_session_nom ON session (nom)');
        $this->addSql('CREATE INDEX idx_session_type ON session (type)');
        $this->addSql('CREATE INDEX idx_session_date_debut ON session (date_debut)');
        $this->addSql('CREATE INDEX idx_session_date_fin ON session (date_fin)');
        $this->addSql('CREATE INDEX idx_session_description ON session (description)');

        // Table session_module
        $this->addSql('CREATE TABLE session_module (
            id SERIAL PRIMARY KEY,
            module_id INT DEFAULT NULL,
            session_id INT DEFAULT NULL,
            institution_id INT NOT NULL
        )');
        $this->addSql('CREATE INDEX idx_session_module_module ON session_module (module_id)');
        $this->addSql('CREATE INDEX idx_session_module_session ON session_module (session_id)');
        $this->addSql('CREATE INDEX idx_session_module_institution ON session_module (institution_id)');

        // Table stripe_payment
        $this->addSql('CREATE TABLE stripe_payment (
            id SERIAL PRIMARY KEY,
            payment_intent_id VARCHAR(255) NOT NULL,
            amount INT NOT NULL,
            currency VARCHAR(255) NOT NULL,
            status VARCHAR(255) NOT NULL,
            created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL
        )');

        // Table utilisateur
        $this->addSql('CREATE TABLE utilisateur (
            id SERIAL PRIMARY KEY,
            institution_id INT DEFAULT NULL,
            prenom VARCHAR(255) NOT NULL,
            nom VARCHAR(255) NOT NULL,
            courriel VARCHAR(255) NOT NULL,
            motdepasse VARCHAR(255) NOT NULL,
            roles JSON NOT NULL,
            commentaire VARCHAR(255) NOT NULL,
            note NUMERIC(5, 2) DEFAULT NULL,
            telephone VARCHAR(20) DEFAULT NULL,
            date_naissance DATE DEFAULT NULL,
            abonnement_id VARCHAR(255) DEFAULT NULL,
            subscription_count INT NOT NULL,
            trial_ends_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL,
            invitations INT DEFAULT 0 NOT NULL,
            nombre_institutions INT NOT NULL,
            stripe_customer_id VARCHAR(255) DEFAULT NULL,
            subscription_type VARCHAR(255) DEFAULT NULL
        )');
        $this->addSql('CREATE UNIQUE INDEX uniq_utilisateur_courriel ON utilisateur (courriel)');
        $this->addSql('CREATE INDEX idx_utilisateur_institution ON utilisateur (institution_id)');
        $this->addSql('CREATE INDEX idx_utilisateur_prenom ON utilisateur (prenom)');
        $this->addSql('CREATE INDEX idx_utilisateur_nom ON utilisateur (nom)');
        $this->addSql('CREATE INDEX idx_utilisateur_courriel ON utilisateur (courriel)');
        $this->addSql('CREATE INDEX idx_utilisateur_commentaire ON utilisateur (commentaire)');
        $this->addSql('CREATE INDEX idx_utilisateur_note ON utilisateur (note)');
        $this->addSql('CREATE INDEX idx_utilisateur_telephone ON utilisateur (telephone)');
        $this->addSql('CREATE INDEX idx_utilisateur_date_naissance ON utilisateur (date_naissance)');

        // Table utilisateur_institution_session_module
        $this->addSql('CREATE TABLE utilisateur_institution_session_module (
            id SERIAL PRIMARY KEY,
            utilisateur_id INT DEFAULT NULL,
            session_module_id INT DEFAULT NULL,
            commentaire_module VARCHAR(255) DEFAULT NULL,
            note_module DOUBLE PRECISION DEFAULT NULL
        )');
        $this->addSql('CREATE INDEX idx_uism_commentaire ON utilisateur_institution_session_module (commentaire_module)');
        $this->addSql('CREATE INDEX idx_uism_note ON utilisateur_institution_session_module (note_module)');
        $this->addSql('CREATE INDEX idx_uism_utilisateur ON utilisateur_institution_session_module (utilisateur_id)');
        $this->addSql('CREATE INDEX idx_uism_session_module ON utilisateur_institution_session_module (session_module_id)');

        // Table messenger_messages
        $this->addSql('CREATE TABLE messenger_messages (
            id BIGSERIAL PRIMARY KEY,
            body TEXT NOT NULL,
            headers TEXT NOT NULL,
            queue_name VARCHAR(190) NOT NULL,
            created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
            available_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
            delivered_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL
        )');
        $this->addSql('CREATE INDEX idx_messenger_messages_queue ON messenger_messages (queue_name)');
        $this->addSql('CREATE INDEX idx_messenger_messages_available ON messenger_messages (available_at)');
        $this->addSql('CREATE INDEX idx_messenger_messages_delivered ON messenger_messages (delivered_at)');

        // Clés étrangères
        $this->addSql('ALTER TABLE invitation ADD CONSTRAINT fk_invitation_institution 
            FOREIGN KEY (institution_id) REFERENCES institution (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE invitation ADD CONSTRAINT fk_invitation_invited_by 
            FOREIGN KEY (invited_by_id) REFERENCES utilisateur (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE jour_horaire ADD CONSTRAINT fk_jour_horaire_session_module 
            FOREIGN KEY (session_module_id) REFERENCES utilisateur_institution_session_module (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE session_module ADD CONSTRAINT fk_session_module_module 
            FOREIGN KEY (module_id) REFERENCES module (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE session_module ADD CONSTRAINT fk_session_module_session 
            FOREIGN KEY (session_id) REFERENCES session (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE session_module ADD CONSTRAINT fk_session_module_institution 
            FOREIGN KEY (institution_id) REFERENCES institution (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT fk_utilisateur_institution 
            FOREIGN KEY (institution_id) REFERENCES institution (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE utilisateur_institution_session_module ADD CONSTRAINT fk_uism_utilisateur 
            FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE utilisateur_institution_session_module ADD CONSTRAINT fk_uism_session_module 
            FOREIGN KEY (session_module_id) REFERENCES session_module (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE form_contact');
        $this->addSql('DROP TABLE institution');
        $this->addSql('DROP TABLE invitation');
        $this->addSql('DROP TABLE jour_horaire');
        $this->addSql('DROP TABLE module');
        $this->addSql('DROP TABLE session');
        $this->addSql('DROP TABLE session_module');
        $this->addSql('DROP TABLE stripe_payment');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('DROP TABLE utilisateur_institution_session_module');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
