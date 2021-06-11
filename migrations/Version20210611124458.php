<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210611124458 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE info_admin_client DROP FOREIGN KEY FK_B751E20BDC2902E0');
        $this->addSql('ALTER TABLE info_admin_client ADD CONSTRAINT FK_B751E20BDC2902E0 FOREIGN KEY (client_id_id) REFERENCES client (id) ON DELETE SET NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE info_admin_client DROP FOREIGN KEY FK_B751E20BDC2902E0');
        $this->addSql('ALTER TABLE info_admin_client ADD CONSTRAINT FK_B751E20BDC2902E0 FOREIGN KEY (client_id_id) REFERENCES client (id) ON DELETE CASCADE');
    }
}
