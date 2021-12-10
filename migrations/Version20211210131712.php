<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211210131712 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE customer (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL)');
        $this->addSql('CREATE TABLE menu (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL)');
        $this->addSql('CREATE TABLE menu_recipe (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, recipe_id INTEGER DEFAULT NULL, menu_id INTEGER DEFAULT NULL, quantity INTEGER NOT NULL)');
        $this->addSql('CREATE INDEX IDX_9CFE9EF59D8A214 ON menu_recipe (recipe_id)');
        $this->addSql('CREATE INDEX IDX_9CFE9EFCCD7E912 ON menu_recipe (menu_id)');
        $this->addSql('CREATE TABLE orderr (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, customer_id INTEGER DEFAULT NULL)');
        $this->addSql('CREATE INDEX IDX_9228CD789395C3F3 ON orderr (customer_id)');
        $this->addSql('CREATE TABLE orderr_menu (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, orderr_id INTEGER DEFAULT NULL, menu_id INTEGER DEFAULT NULL, quantity INTEGER NOT NULL)');
        $this->addSql('CREATE INDEX IDX_188C289D7742FDB3 ON orderr_menu (orderr_id)');
        $this->addSql('CREATE INDEX IDX_188C289DCCD7E912 ON orderr_menu (menu_id)');
        $this->addSql('CREATE TABLE product (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL)');
        $this->addSql('CREATE TABLE recipe (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, customer_id INTEGER DEFAULT NULL, name VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE INDEX IDX_DA88B1379395C3F3 ON recipe (customer_id)');
        $this->addSql('CREATE TABLE recipe_product (recipe_id INTEGER NOT NULL, product_id INTEGER NOT NULL, PRIMARY KEY(recipe_id, product_id))');
        $this->addSql('CREATE INDEX IDX_9FAE0AED59D8A214 ON recipe_product (recipe_id)');
        $this->addSql('CREATE INDEX IDX_9FAE0AED4584665A ON recipe_product (product_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE customer');
        $this->addSql('DROP TABLE menu');
        $this->addSql('DROP TABLE menu_recipe');
        $this->addSql('DROP TABLE orderr');
        $this->addSql('DROP TABLE orderr_menu');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE recipe');
        $this->addSql('DROP TABLE recipe_product');
    }
}
