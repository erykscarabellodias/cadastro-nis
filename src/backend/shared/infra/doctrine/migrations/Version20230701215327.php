<?php

declare(strict_types=1);

namespace CadastroNis\backend\shared\infra\doctrine\migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230701215327 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Adicionando campos created_at e updated_at na tabela cidadao';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE cidadao ADD CONSTRAINT DEFAULT GETDATE()')

    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
