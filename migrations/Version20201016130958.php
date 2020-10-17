<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201016130958 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE minervalpayment DROP FOREIGN KEY FK_6E8DEC1A5DAC5993');
        $this->addSql('DROP INDEX IDX_6E8DEC1A5DAC5993 ON minervalpayment');
        $this->addSql('ALTER TABLE minervalpayment CHANGE inscription_id registration_id INT NOT NULL');
        $this->addSql('ALTER TABLE minervalpayment ADD CONSTRAINT FK_6E8DEC1A833D8F43 FOREIGN KEY (registration_id) REFERENCES registration (id)');
        $this->addSql('CREATE INDEX IDX_6E8DEC1A833D8F43 ON minervalpayment (registration_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE minervalpayment DROP FOREIGN KEY FK_6E8DEC1A833D8F43');
        $this->addSql('DROP INDEX IDX_6E8DEC1A833D8F43 ON minervalpayment');
        $this->addSql('ALTER TABLE minervalpayment CHANGE registration_id inscription_id INT NOT NULL');
        $this->addSql('ALTER TABLE minervalpayment ADD CONSTRAINT FK_6E8DEC1A5DAC5993 FOREIGN KEY (inscription_id) REFERENCES registration (id)');
        $this->addSql('CREATE INDEX IDX_6E8DEC1A5DAC5993 ON minervalpayment (inscription_id)');
    }
}
