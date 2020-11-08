<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201106103404 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE "order_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE "order" (id INT NOT NULL, payment_type VARCHAR(255) DEFAULT NULL, delivery_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE order_menu (order_id INT NOT NULL, menu_id INT NOT NULL, PRIMARY KEY(order_id, menu_id))');
        $this->addSql('CREATE INDEX IDX_30F400848D9F6D38 ON order_menu (order_id)');
        $this->addSql('CREATE INDEX IDX_30F40084CCD7E912 ON order_menu (menu_id)');
        $this->addSql('ALTER TABLE order_menu ADD CONSTRAINT FK_30F400848D9F6D38 FOREIGN KEY (order_id) REFERENCES "order" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE order_menu ADD CONSTRAINT FK_30F40084CCD7E912 FOREIGN KEY (menu_id) REFERENCES menu (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE order_menu DROP CONSTRAINT FK_30F400848D9F6D38');
        $this->addSql('DROP SEQUENCE "order_id_seq" CASCADE');
        $this->addSql('DROP TABLE "order"');
        $this->addSql('DROP TABLE order_menu');
    }
}
