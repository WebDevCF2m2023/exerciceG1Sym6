<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240928112631 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66A76ED395');
        $this->addSql('DROP INDEX IDX_23A0E66A76ED395 ON article');
        $this->addSql('ALTER TABLE article DROP article_created_by, CHANGE article_date_created article_date_created DATETIME DEFAULT NULL, CHANGE article_visible article_visible TINYINT(1) DEFAULT NULL, CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66642B8210 FOREIGN KEY (admin_id) REFERENCES `admin` (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66A76ED395 FOREIGN KEY (user_id) REFERENCES `admin` (id)');
        $this->addSql('CREATE INDEX IDX_23A0E66642B8210 ON article (admin_id)');
        $this->addSql('CREATE INDEX IDX_23A0E66A76ED395 ON article (user_id)');
        $this->addSql('ALTER TABLE comment CHANGE comment_date comment_date DATETIME DEFAULT NULL, CHANGE comment_visible comment_visible TINYINT(1) DEFAULT 1 NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comment CHANGE comment_date comment_date DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, CHANGE comment_visible comment_visible TINYINT(1) DEFAULT 1');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66642B8210');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66A76ED395');
        $this->addSql('DROP INDEX IDX_23A0E66642B8210 ON article');
        $this->addSql('DROP INDEX IDX_23A0E66A76ED395 ON article');
        $this->addSql('ALTER TABLE article ADD article_created_by INT UNSIGNED DEFAULT 1 NOT NULL, CHANGE user_id user_id INT NOT NULL, CHANGE article_date_created article_date_created DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, CHANGE article_visible article_visible TINYINT(1) DEFAULT 0 NOT NULL');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66A76ED395 FOREIGN KEY (admin_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_23A0E66A76ED395 ON article (admin_id)');
    }
}
