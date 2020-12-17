<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201215215003 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE blog ADD blogreplys_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE blog ADD CONSTRAINT FK_C01551437DDCBE81 FOREIGN KEY (blogreplys_id) REFERENCES blogreply (id)');
        $this->addSql('CREATE INDEX IDX_C01551437DDCBE81 ON blog (blogreplys_id)');
        $this->addSql('ALTER TABLE blogcat ADD blog_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE blogcat ADD CONSTRAINT FK_22FFF80FDAE07E97 FOREIGN KEY (blog_id) REFERENCES blog (id)');
        $this->addSql('CREATE INDEX IDX_22FFF80FDAE07E97 ON blogcat (blog_id)');
        $this->addSql('ALTER TABLE catfood ADD menus_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE catfood ADD CONSTRAINT FK_1DB4E51D14041B84 FOREIGN KEY (menus_id) REFERENCES menu (id)');
        $this->addSql('CREATE INDEX IDX_1DB4E51D14041B84 ON catfood (menus_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE blog DROP FOREIGN KEY FK_C01551437DDCBE81');
        $this->addSql('DROP INDEX IDX_C01551437DDCBE81 ON blog');
        $this->addSql('ALTER TABLE blog DROP blogreplys_id');
        $this->addSql('ALTER TABLE blogcat DROP FOREIGN KEY FK_22FFF80FDAE07E97');
        $this->addSql('DROP INDEX IDX_22FFF80FDAE07E97 ON blogcat');
        $this->addSql('ALTER TABLE blogcat DROP blog_id');
        $this->addSql('ALTER TABLE catfood DROP FOREIGN KEY FK_1DB4E51D14041B84');
        $this->addSql('DROP INDEX IDX_1DB4E51D14041B84 ON catfood');
        $this->addSql('ALTER TABLE catfood DROP menus_id');
    }
}

