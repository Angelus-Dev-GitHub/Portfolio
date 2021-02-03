<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210203144936 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE content_management_system (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, icon VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE customer (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE design_pattern (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE framework (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, icon VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE language (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, icon VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE librairie (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, icon VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE method (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE project (id INT AUTO_INCREMENT NOT NULL, type_of_project_id INT NOT NULL, customers_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, web_link VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_2FB3D0EE8FD4693C (type_of_project_id), INDEX IDX_2FB3D0EEC3568B40 (customers_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE project_language (project_id INT NOT NULL, language_id INT NOT NULL, INDEX IDX_E995FA6E166D1F9C (project_id), INDEX IDX_E995FA6E82F1BAF4 (language_id), PRIMARY KEY(project_id, language_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE project_librairie (project_id INT NOT NULL, librairie_id INT NOT NULL, INDEX IDX_E4EB762C166D1F9C (project_id), INDEX IDX_E4EB762C330C7BB3 (librairie_id), PRIMARY KEY(project_id, librairie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE project_framework (project_id INT NOT NULL, framework_id INT NOT NULL, INDEX IDX_8C4A2BCE166D1F9C (project_id), INDEX IDX_8C4A2BCE37AECF72 (framework_id), PRIMARY KEY(project_id, framework_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE project_design_pattern (project_id INT NOT NULL, design_pattern_id INT NOT NULL, INDEX IDX_D3A05806166D1F9C (project_id), INDEX IDX_D3A05806F2AB91DA (design_pattern_id), PRIMARY KEY(project_id, design_pattern_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE project_software (project_id INT NOT NULL, software_id INT NOT NULL, INDEX IDX_4A9EE314166D1F9C (project_id), INDEX IDX_4A9EE314D7452741 (software_id), PRIMARY KEY(project_id, software_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE project_method (project_id INT NOT NULL, method_id INT NOT NULL, INDEX IDX_49FDD12A166D1F9C (project_id), INDEX IDX_49FDD12A19883967 (method_id), PRIMARY KEY(project_id, method_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE project_content_management_system (project_id INT NOT NULL, content_management_system_id INT NOT NULL, INDEX IDX_D4CC08D5166D1F9C (project_id), INDEX IDX_D4CC08D583BFCFCB (content_management_system_id), PRIMARY KEY(project_id, content_management_system_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE software (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, icon VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_project (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE project ADD CONSTRAINT FK_2FB3D0EE8FD4693C FOREIGN KEY (type_of_project_id) REFERENCES type_project (id)');
        $this->addSql('ALTER TABLE project ADD CONSTRAINT FK_2FB3D0EEC3568B40 FOREIGN KEY (customers_id) REFERENCES customer (id)');
        $this->addSql('ALTER TABLE project_language ADD CONSTRAINT FK_E995FA6E166D1F9C FOREIGN KEY (project_id) REFERENCES project (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE project_language ADD CONSTRAINT FK_E995FA6E82F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE project_librairie ADD CONSTRAINT FK_E4EB762C166D1F9C FOREIGN KEY (project_id) REFERENCES project (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE project_librairie ADD CONSTRAINT FK_E4EB762C330C7BB3 FOREIGN KEY (librairie_id) REFERENCES librairie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE project_framework ADD CONSTRAINT FK_8C4A2BCE166D1F9C FOREIGN KEY (project_id) REFERENCES project (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE project_framework ADD CONSTRAINT FK_8C4A2BCE37AECF72 FOREIGN KEY (framework_id) REFERENCES framework (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE project_design_pattern ADD CONSTRAINT FK_D3A05806166D1F9C FOREIGN KEY (project_id) REFERENCES project (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE project_design_pattern ADD CONSTRAINT FK_D3A05806F2AB91DA FOREIGN KEY (design_pattern_id) REFERENCES design_pattern (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE project_software ADD CONSTRAINT FK_4A9EE314166D1F9C FOREIGN KEY (project_id) REFERENCES project (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE project_software ADD CONSTRAINT FK_4A9EE314D7452741 FOREIGN KEY (software_id) REFERENCES software (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE project_method ADD CONSTRAINT FK_49FDD12A166D1F9C FOREIGN KEY (project_id) REFERENCES project (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE project_method ADD CONSTRAINT FK_49FDD12A19883967 FOREIGN KEY (method_id) REFERENCES method (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE project_content_management_system ADD CONSTRAINT FK_D4CC08D5166D1F9C FOREIGN KEY (project_id) REFERENCES project (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE project_content_management_system ADD CONSTRAINT FK_D4CC08D583BFCFCB FOREIGN KEY (content_management_system_id) REFERENCES content_management_system (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE project_content_management_system DROP FOREIGN KEY FK_D4CC08D583BFCFCB');
        $this->addSql('ALTER TABLE project DROP FOREIGN KEY FK_2FB3D0EEC3568B40');
        $this->addSql('ALTER TABLE project_design_pattern DROP FOREIGN KEY FK_D3A05806F2AB91DA');
        $this->addSql('ALTER TABLE project_framework DROP FOREIGN KEY FK_8C4A2BCE37AECF72');
        $this->addSql('ALTER TABLE project_language DROP FOREIGN KEY FK_E995FA6E82F1BAF4');
        $this->addSql('ALTER TABLE project_librairie DROP FOREIGN KEY FK_E4EB762C330C7BB3');
        $this->addSql('ALTER TABLE project_method DROP FOREIGN KEY FK_49FDD12A19883967');
        $this->addSql('ALTER TABLE project_language DROP FOREIGN KEY FK_E995FA6E166D1F9C');
        $this->addSql('ALTER TABLE project_librairie DROP FOREIGN KEY FK_E4EB762C166D1F9C');
        $this->addSql('ALTER TABLE project_framework DROP FOREIGN KEY FK_8C4A2BCE166D1F9C');
        $this->addSql('ALTER TABLE project_design_pattern DROP FOREIGN KEY FK_D3A05806166D1F9C');
        $this->addSql('ALTER TABLE project_software DROP FOREIGN KEY FK_4A9EE314166D1F9C');
        $this->addSql('ALTER TABLE project_method DROP FOREIGN KEY FK_49FDD12A166D1F9C');
        $this->addSql('ALTER TABLE project_content_management_system DROP FOREIGN KEY FK_D4CC08D5166D1F9C');
        $this->addSql('ALTER TABLE project_software DROP FOREIGN KEY FK_4A9EE314D7452741');
        $this->addSql('ALTER TABLE project DROP FOREIGN KEY FK_2FB3D0EE8FD4693C');
        $this->addSql('DROP TABLE content_management_system');
        $this->addSql('DROP TABLE customer');
        $this->addSql('DROP TABLE design_pattern');
        $this->addSql('DROP TABLE framework');
        $this->addSql('DROP TABLE language');
        $this->addSql('DROP TABLE librairie');
        $this->addSql('DROP TABLE method');
        $this->addSql('DROP TABLE project');
        $this->addSql('DROP TABLE project_language');
        $this->addSql('DROP TABLE project_librairie');
        $this->addSql('DROP TABLE project_framework');
        $this->addSql('DROP TABLE project_design_pattern');
        $this->addSql('DROP TABLE project_software');
        $this->addSql('DROP TABLE project_method');
        $this->addSql('DROP TABLE project_content_management_system');
        $this->addSql('DROP TABLE software');
        $this->addSql('DROP TABLE type_project');
    }
}
