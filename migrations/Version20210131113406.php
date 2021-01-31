<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210131113406 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rmaorder_rule DROP CONSTRAINT fk_1ad855fe48f90a48');
        $this->addSql('DROP INDEX idx_1ad855fe48f90a48');
        $this->addSql('ALTER TABLE rmaorder_rule RENAME COLUMN rma_order_id_id TO rmaorder_id_id');
        $this->addSql('ALTER TABLE rmaorder_rule ADD CONSTRAINT FK_1AD855FEB7CFCF2E FOREIGN KEY (rmaorder_id_id) REFERENCES rmaorder (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_1AD855FEB7CFCF2E ON rmaorder_rule (rmaorder_id_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE rmaorder_rule DROP CONSTRAINT FK_1AD855FEB7CFCF2E');
        $this->addSql('DROP INDEX IDX_1AD855FEB7CFCF2E');
        $this->addSql('ALTER TABLE rmaorder_rule RENAME COLUMN rmaorder_id_id TO rma_order_id_id');
        $this->addSql('ALTER TABLE rmaorder_rule ADD CONSTRAINT fk_1ad855fe48f90a48 FOREIGN KEY (rma_order_id_id) REFERENCES rmaorder (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_1ad855fe48f90a48 ON rmaorder_rule (rma_order_id_id)');
    }
}
