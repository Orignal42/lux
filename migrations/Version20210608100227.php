<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210608100227 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidate DROP INDEX UNIQ_C8B28E4450E81DB, ADD INDEX IDX_C8B28E4450E81DB (job_category_id_id)');
        $this->addSql('ALTER TABLE candidate DROP INDEX UNIQ_C8B28E4435BCF31B, ADD INDEX IDX_C8B28E4435BCF31B (info_admin_candidat_id_id)');
        $this->addSql('ALTER TABLE candidature DROP INDEX UNIQ_E33BD3B810C22675, ADD INDEX IDX_E33BD3B810C22675 (id_candidat_id)');
        $this->addSql('ALTER TABLE candidature DROP INDEX UNIQ_E33BD3B831D987B, ADD INDEX IDX_E33BD3B831D987B (id_offer_id)');
        $this->addSql('ALTER TABLE info_admin_client DROP INDEX UNIQ_B751E20BDC2902E0, ADD INDEX IDX_B751E20BDC2902E0 (client_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidate DROP INDEX IDX_C8B28E4435BCF31B, ADD UNIQUE INDEX UNIQ_C8B28E4435BCF31B (info_admin_candidat_id_id)');
        $this->addSql('ALTER TABLE candidate DROP INDEX IDX_C8B28E4450E81DB, ADD UNIQUE INDEX UNIQ_C8B28E4450E81DB (job_category_id_id)');
        $this->addSql('ALTER TABLE candidature DROP INDEX IDX_E33BD3B810C22675, ADD UNIQUE INDEX UNIQ_E33BD3B810C22675 (id_candidat_id)');
        $this->addSql('ALTER TABLE candidature DROP INDEX IDX_E33BD3B831D987B, ADD UNIQUE INDEX UNIQ_E33BD3B831D987B (id_offer_id)');
        $this->addSql('ALTER TABLE info_admin_client DROP INDEX IDX_B751E20BDC2902E0, ADD UNIQUE INDEX UNIQ_B751E20BDC2902E0 (client_id_id)');
    }
}
