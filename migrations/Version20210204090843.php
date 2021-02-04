<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210204090843 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE project DROP FOREIGN KEY FK_2FB3D0EEB6EC9B9');
        $this->addSql('DROP INDEX UNIQ_2FB3D0EEB6EC9B9 ON project');
        $this->addSql('ALTER TABLE project CHANGE type_project_id type_of_project_id INT NOT NULL');
        $this->addSql('ALTER TABLE project ADD CONSTRAINT FK_2FB3D0EE8FD4693C FOREIGN KEY (type_of_project_id) REFERENCES type_project (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2FB3D0EE8FD4693C ON project (type_of_project_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE project DROP FOREIGN KEY FK_2FB3D0EE8FD4693C');
        $this->addSql('DROP INDEX UNIQ_2FB3D0EE8FD4693C ON project');
        $this->addSql('ALTER TABLE project CHANGE type_of_project_id type_project_id INT NOT NULL');
        $this->addSql('ALTER TABLE project ADD CONSTRAINT FK_2FB3D0EEB6EC9B9 FOREIGN KEY (type_project_id) REFERENCES type_project (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2FB3D0EEB6EC9B9 ON project (type_project_id)');
    }
}
