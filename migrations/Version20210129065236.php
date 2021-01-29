<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210129065236 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE equipment_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE parts_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE production_log_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE rmaorder_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE rmaorder_rule_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE equipment (id INT NOT NULL, type TEXT NOT NULL, production_date DATE NOT NULL, model TEXT NOT NULL, revision TEXT NOT NULL, serial_number TEXT NOT NULL, statusstatus TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE parts (id INT NOT NULL, name TEXT NOT NULL, price INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE production_log (id INT NOT NULL, equipment_id_id INT NOT NULL, log TEXT NOT NULL, successfull_produced BOOLEAN NOT NULL, mac_adress TEXT NOT NULL, production_location INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_24BDAAEF961DBFB3 ON production_log (equipment_id_id)');
        $this->addSql('CREATE TABLE rmaorder (id INT NOT NULL, date DATE NOT NULL, customer TEXT NOT NULL, handled_by TEXT NOT NULL, status TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE rmaorder_rule (id INT NOT NULL, rma_order_id_id INT NOT NULL, part_id_id INT NOT NULL, price INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_1AD855FE48F90A48 ON rmaorder_rule (rma_order_id_id)');
        $this->addSql('CREATE INDEX IDX_1AD855FEEC37C9B4 ON rmaorder_rule (part_id_id)');
        $this->addSql('CREATE TABLE rmaorder_rule_equipment (rmaorder_rule_id INT NOT NULL, equipment_id INT NOT NULL, PRIMARY KEY(rmaorder_rule_id, equipment_id))');
        $this->addSql('CREATE INDEX IDX_BEB262A496DF6807 ON rmaorder_rule_equipment (rmaorder_rule_id)');
        $this->addSql('CREATE INDEX IDX_BEB262A4517FE9FE ON rmaorder_rule_equipment (equipment_id)');
        $this->addSql('ALTER TABLE production_log ADD CONSTRAINT FK_24BDAAEF961DBFB3 FOREIGN KEY (equipment_id_id) REFERENCES equipment (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE rmaorder_rule ADD CONSTRAINT FK_1AD855FE48F90A48 FOREIGN KEY (rma_order_id_id) REFERENCES rmaorder (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE rmaorder_rule ADD CONSTRAINT FK_1AD855FEEC37C9B4 FOREIGN KEY (part_id_id) REFERENCES parts (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE rmaorder_rule_equipment ADD CONSTRAINT FK_BEB262A496DF6807 FOREIGN KEY (rmaorder_rule_id) REFERENCES rmaorder_rule (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE rmaorder_rule_equipment ADD CONSTRAINT FK_BEB262A4517FE9FE FOREIGN KEY (equipment_id) REFERENCES equipment (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE production_log DROP CONSTRAINT FK_24BDAAEF961DBFB3');
        $this->addSql('ALTER TABLE rmaorder_rule_equipment DROP CONSTRAINT FK_BEB262A4517FE9FE');
        $this->addSql('ALTER TABLE rmaorder_rule DROP CONSTRAINT FK_1AD855FEEC37C9B4');
        $this->addSql('ALTER TABLE rmaorder_rule DROP CONSTRAINT FK_1AD855FE48F90A48');
        $this->addSql('ALTER TABLE rmaorder_rule_equipment DROP CONSTRAINT FK_BEB262A496DF6807');
        $this->addSql('DROP SEQUENCE equipment_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE parts_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE production_log_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE rmaorder_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE rmaorder_rule_id_seq CASCADE');
        $this->addSql('DROP TABLE equipment');
        $this->addSql('DROP TABLE parts');
        $this->addSql('DROP TABLE production_log');
        $this->addSql('DROP TABLE rmaorder');
        $this->addSql('DROP TABLE rmaorder_rule');
        $this->addSql('DROP TABLE rmaorder_rule_equipment');
    }
}
