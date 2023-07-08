<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class VersionAvantfin extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Drops coupons and couponstypes tables';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE couponstypes DROP FOREIGN KEY coupons_types_id');
        $this->addSql('DROP TABLE coupons');
        $this->addSql('DROP TABLE couponstypes');
    }

    public function down(Schema $schema): void
    {
       
    }
}
