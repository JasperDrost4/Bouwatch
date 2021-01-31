<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210131110134 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE rmaorder_rule_equipment');
        $this->addSql('ALTER TABLE rmaorder_rule ADD equipment_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE rmaorder_rule ADD CONSTRAINT FK_1AD855FE961DBFB3 FOREIGN KEY (equipment_id_id) REFERENCES equipment (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_1AD855FE961DBFB3 ON rmaorder_rule (equipment_id_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE TABLE rmaorder_rule_equipment (rmaorder_rule_id INT NOT NULL, equipment_id INT NOT NULL, PRIMARY KEY(rmaorder_rule_id, equipment_id))');
        $this->addSql('CREATE INDEX idx_beb262a4517fe9fe ON rmaorder_rule_equipment (equipment_id)');
        $this->addSql('CREATE INDEX idx_beb262a496df6807 ON rmaorder_rule_equipment (rmaorder_rule_id)');
        $this->addSql('ALTER TABLE rmaorder_rule_equipment ADD CONSTRAINT fk_beb262a496df6807 FOREIGN KEY (rmaorder_rule_id) REFERENCES rmaorder_rule (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE rmaorder_rule_equipment ADD CONSTRAINT fk_beb262a4517fe9fe FOREIGN KEY (equipment_id) REFERENCES equipment (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE rmaorder_rule DROP CONSTRAINT FK_1AD855FE961DBFB3');
        $this->addSql('DROP INDEX IDX_1AD855FE961DBFB3');
        $this->addSql('ALTER TABLE rmaorder_rule DROP equipment_id_id');
    }
}
