<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20131211110538 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
        
        $this->addSql("CREATE TABLE group_sections (id INT AUTO_INCREMENT NOT NULL, group_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, INDEX IDX_22A60FE7FE54D947 (group_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE groupsection_user (groupsection_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_7328977D550C1E86 (groupsection_id), INDEX IDX_7328977DA76ED395 (user_id), PRIMARY KEY(groupsection_id, user_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("ALTER TABLE group_sections ADD CONSTRAINT FK_22A60FE7FE54D947 FOREIGN KEY (group_id) REFERENCES groups (id) ON DELETE CASCADE");
        $this->addSql("ALTER TABLE groupsection_user ADD CONSTRAINT FK_7328977D550C1E86 FOREIGN KEY (groupsection_id) REFERENCES group_sections (id) ON DELETE CASCADE");
        $this->addSql("ALTER TABLE groupsection_user ADD CONSTRAINT FK_7328977DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE");
    }

    public function down(Schema $schema)
    {
        // this down() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
        
        $this->addSql("ALTER TABLE groupsection_user DROP FOREIGN KEY FK_7328977D550C1E86");
        $this->addSql("DROP TABLE group_sections");
        $this->addSql("DROP TABLE groupsection_user");
    }
}