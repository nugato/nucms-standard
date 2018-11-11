<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181111161529 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE nucms_settings (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) NOT NULL, type VARCHAR(250) NOT NULL, UNIQUE INDEX search_idx (code), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE UTF8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nucms_locale (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(12) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_A53F365E77153098 (code), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE UTF8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nucms_blog_post_translation (id INT AUTO_INCREMENT NOT NULL, translatable_id INT NOT NULL, title VARCHAR(255) NOT NULL, content LONGTEXT DEFAULT NULL, slug VARCHAR(255) NOT NULL, short_description LONGTEXT DEFAULT NULL, meta_title VARCHAR(255) DEFAULT NULL, meta_description LONGTEXT DEFAULT NULL, locale VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_2840C2AF989D9B62 (slug), INDEX IDX_2840C2AF2C2AC5D3 (translatable_id), INDEX search_idx (title, slug, locale), UNIQUE INDEX nucms_blog_post_translation_uniq_trans (translatable_id, locale), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE UTF8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nucms_user_oauth (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, provider VARCHAR(255) NOT NULL, identifier VARCHAR(255) NOT NULL, access_token VARCHAR(255) DEFAULT NULL, refresh_token VARCHAR(255) DEFAULT NULL, INDEX IDX_C4C0D580A76ED395 (user_id), UNIQUE INDEX user_provider (user_id, provider), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE UTF8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nucms_page (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, template VARCHAR(255) DEFAULT NULL, UNIQUE INDEX search_idx (code), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE UTF8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nucms_file (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) DEFAULT NULL, extension VARCHAR(100) DEFAULT NULL, path VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE UTF8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nucms_navigation (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, code VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, UNIQUE INDEX search_idx (code, name), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE UTF8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nucms_navigation_item_translation (id INT AUTO_INCREMENT NOT NULL, translatable_id INT NOT NULL, name VARCHAR(255) NOT NULL, url VARCHAR(255) NOT NULL, locale VARCHAR(255) NOT NULL, INDEX IDX_7431D6062C2AC5D3 (translatable_id), INDEX search_idx (name), UNIQUE INDEX nucms_navigation_item_translation_uniq_trans (translatable_id, locale), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE UTF8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nucms_page_translation (id INT AUTO_INCREMENT NOT NULL, translatable_id INT NOT NULL, title VARCHAR(255) NOT NULL, content LONGTEXT DEFAULT NULL, slug VARCHAR(255) NOT NULL, meta_title VARCHAR(255) DEFAULT NULL, meta_description LONGTEXT DEFAULT NULL, locale VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_B8BBE06E989D9B62 (slug), INDEX IDX_B8BBE06E2C2AC5D3 (translatable_id), INDEX search_idx (title, slug, locale), UNIQUE INDEX nucms_page_translation_uniq_trans (translatable_id, locale), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE UTF8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nucms_taxon (id INT AUTO_INCREMENT NOT NULL, tree_root INT DEFAULT NULL, parent_id INT DEFAULT NULL, code VARCHAR(255) NOT NULL, tree_left INT NOT NULL, tree_right INT NOT NULL, tree_level INT NOT NULL, position INT NOT NULL, UNIQUE INDEX UNIQ_EA58EE2777153098 (code), INDEX IDX_EA58EE27A977936C (tree_root), INDEX IDX_EA58EE27727ACA70 (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE UTF8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nucms_user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) DEFAULT NULL, username_canonical VARCHAR(255) DEFAULT NULL, enabled TINYINT(1) NOT NULL, salt VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, last_login DATETIME DEFAULT NULL, password_reset_token VARCHAR(255) DEFAULT NULL, password_requested_at DATETIME DEFAULT NULL, email_verification_token VARCHAR(255) DEFAULT NULL, verified_at DATETIME DEFAULT NULL, locked TINYINT(1) NOT NULL, expires_at DATETIME DEFAULT NULL, credentials_expire_at DATETIME DEFAULT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', email VARCHAR(255) DEFAULT NULL, email_canonical VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, first_name VARCHAR(255) DEFAULT NULL, last_name VARCHAR(255) DEFAULT NULL, locale_code VARCHAR(12) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE UTF8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nucms_navigation_item (id INT AUTO_INCREMENT NOT NULL, tree_root INT DEFAULT NULL, parent_id INT DEFAULT NULL, navigation_id INT DEFAULT NULL, tree_left INT NOT NULL, tree_right INT NOT NULL, tree_level INT NOT NULL, INDEX IDX_47C5F839A977936C (tree_root), INDEX IDX_47C5F839727ACA70 (parent_id), INDEX IDX_47C5F83939F79D6D (navigation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE UTF8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nucms_taxon_translation (id INT AUTO_INCREMENT NOT NULL, translatable_id INT NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, locale VARCHAR(255) NOT NULL, INDEX IDX_F6E5808E2C2AC5D3 (translatable_id), UNIQUE INDEX slug_uidx (locale, slug), UNIQUE INDEX nucms_taxon_translation_uniq_trans (translatable_id, locale), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE UTF8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nucms_blog_post (id INT AUTO_INCREMENT NOT NULL, main_taxon INT DEFAULT NULL, image INT DEFAULT NULL, code VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_601A45ABF83B90ED (main_taxon), INDEX IDX_601A45ABC53D045F (image), UNIQUE INDEX search_idx (code), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE UTF8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nucms_blog_post_taxon (blog_post_id INT NOT NULL, taxon_id INT NOT NULL, INDEX IDX_45E485F8A77FBEAF (blog_post_id), INDEX IDX_45E485F8DE13F470 (taxon_id), PRIMARY KEY(blog_post_id, taxon_id)) DEFAULT CHARACTER SET UTF8 COLLATE UTF8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nucms_settings_translation (id INT AUTO_INCREMENT NOT NULL, translatable_id INT NOT NULL, content LONGTEXT DEFAULT NULL, locale VARCHAR(255) NOT NULL, INDEX IDX_6A9CF61F2C2AC5D3 (translatable_id), UNIQUE INDEX nucms_settings_translation_uniq_trans (translatable_id, locale), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE UTF8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE nucms_blog_post_translation ADD CONSTRAINT FK_2840C2AF2C2AC5D3 FOREIGN KEY (translatable_id) REFERENCES nucms_blog_post (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE nucms_user_oauth ADD CONSTRAINT FK_C4C0D580A76ED395 FOREIGN KEY (user_id) REFERENCES nucms_user (id)');
        $this->addSql('ALTER TABLE nucms_navigation_item_translation ADD CONSTRAINT FK_7431D6062C2AC5D3 FOREIGN KEY (translatable_id) REFERENCES nucms_navigation_item (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE nucms_page_translation ADD CONSTRAINT FK_B8BBE06E2C2AC5D3 FOREIGN KEY (translatable_id) REFERENCES nucms_page (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE nucms_taxon ADD CONSTRAINT FK_EA58EE27A977936C FOREIGN KEY (tree_root) REFERENCES nucms_taxon (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE nucms_taxon ADD CONSTRAINT FK_EA58EE27727ACA70 FOREIGN KEY (parent_id) REFERENCES nucms_taxon (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE nucms_navigation_item ADD CONSTRAINT FK_47C5F839A977936C FOREIGN KEY (tree_root) REFERENCES nucms_navigation_item (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE nucms_navigation_item ADD CONSTRAINT FK_47C5F839727ACA70 FOREIGN KEY (parent_id) REFERENCES nucms_navigation_item (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE nucms_navigation_item ADD CONSTRAINT FK_47C5F83939F79D6D FOREIGN KEY (navigation_id) REFERENCES nucms_navigation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE nucms_taxon_translation ADD CONSTRAINT FK_F6E5808E2C2AC5D3 FOREIGN KEY (translatable_id) REFERENCES nucms_taxon (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE nucms_blog_post ADD CONSTRAINT FK_601A45ABF83B90ED FOREIGN KEY (main_taxon) REFERENCES nucms_taxon (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE nucms_blog_post ADD CONSTRAINT FK_601A45ABC53D045F FOREIGN KEY (image) REFERENCES nucms_file (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE nucms_blog_post_taxon ADD CONSTRAINT FK_45E485F8A77FBEAF FOREIGN KEY (blog_post_id) REFERENCES nucms_blog_post (id)');
        $this->addSql('ALTER TABLE nucms_blog_post_taxon ADD CONSTRAINT FK_45E485F8DE13F470 FOREIGN KEY (taxon_id) REFERENCES nucms_taxon (id)');
        $this->addSql('ALTER TABLE nucms_settings_translation ADD CONSTRAINT FK_6A9CF61F2C2AC5D3 FOREIGN KEY (translatable_id) REFERENCES nucms_settings (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE nucms_settings_translation DROP FOREIGN KEY FK_6A9CF61F2C2AC5D3');
        $this->addSql('ALTER TABLE nucms_page_translation DROP FOREIGN KEY FK_B8BBE06E2C2AC5D3');
        $this->addSql('ALTER TABLE nucms_blog_post DROP FOREIGN KEY FK_601A45ABC53D045F');
        $this->addSql('ALTER TABLE nucms_navigation_item DROP FOREIGN KEY FK_47C5F83939F79D6D');
        $this->addSql('ALTER TABLE nucms_taxon DROP FOREIGN KEY FK_EA58EE27A977936C');
        $this->addSql('ALTER TABLE nucms_taxon DROP FOREIGN KEY FK_EA58EE27727ACA70');
        $this->addSql('ALTER TABLE nucms_taxon_translation DROP FOREIGN KEY FK_F6E5808E2C2AC5D3');
        $this->addSql('ALTER TABLE nucms_blog_post DROP FOREIGN KEY FK_601A45ABF83B90ED');
        $this->addSql('ALTER TABLE nucms_blog_post_taxon DROP FOREIGN KEY FK_45E485F8DE13F470');
        $this->addSql('ALTER TABLE nucms_user_oauth DROP FOREIGN KEY FK_C4C0D580A76ED395');
        $this->addSql('ALTER TABLE nucms_navigation_item_translation DROP FOREIGN KEY FK_7431D6062C2AC5D3');
        $this->addSql('ALTER TABLE nucms_navigation_item DROP FOREIGN KEY FK_47C5F839A977936C');
        $this->addSql('ALTER TABLE nucms_navigation_item DROP FOREIGN KEY FK_47C5F839727ACA70');
        $this->addSql('ALTER TABLE nucms_blog_post_translation DROP FOREIGN KEY FK_2840C2AF2C2AC5D3');
        $this->addSql('ALTER TABLE nucms_blog_post_taxon DROP FOREIGN KEY FK_45E485F8A77FBEAF');
        $this->addSql('DROP TABLE nucms_settings');
        $this->addSql('DROP TABLE nucms_locale');
        $this->addSql('DROP TABLE nucms_blog_post_translation');
        $this->addSql('DROP TABLE nucms_user_oauth');
        $this->addSql('DROP TABLE nucms_page');
        $this->addSql('DROP TABLE nucms_file');
        $this->addSql('DROP TABLE nucms_navigation');
        $this->addSql('DROP TABLE nucms_navigation_item_translation');
        $this->addSql('DROP TABLE nucms_page_translation');
        $this->addSql('DROP TABLE nucms_taxon');
        $this->addSql('DROP TABLE nucms_user');
        $this->addSql('DROP TABLE nucms_navigation_item');
        $this->addSql('DROP TABLE nucms_taxon_translation');
        $this->addSql('DROP TABLE nucms_blog_post');
        $this->addSql('DROP TABLE nucms_blog_post_taxon');
        $this->addSql('DROP TABLE nucms_settings_translation');
    }
}
