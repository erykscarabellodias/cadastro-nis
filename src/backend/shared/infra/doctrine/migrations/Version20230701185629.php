<?php

declare(strict_types=1);

namespace CadastroNis\backend\shared\infra\doctrine\migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230701185629 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Cria a o banco de dados cadstro_nis';
    }

    public function up(Schema $schema): void
    {
        $this->addSql(
            '
            CREATE TABLE IF NOT EXISTS cidadao (
                id INT AUTO_INCREMENT NOT NULL,
                nome_completo VARCHAR(255) NOT NULL,
                codigo_nis VARCHAR(11) NOT NULL UNIQUE,
                PRIMARY KEY(id)
            );'
        );
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE cidadao;');
    }
}
