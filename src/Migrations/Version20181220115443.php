<?php

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20181220115443 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE adress (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, first_name VARCHAR(255) DEFAULT NULL, phone VARCHAR(255) DEFAULT NULL, postal_code VARCHAR(255) DEFAULT NULL, country VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, adress VARCHAR(255) NOT NULL, additionnal VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category_media (category_id INT NOT NULL, media_id INT NOT NULL, INDEX IDX_821FEE4512469DE2 (category_id), INDEX IDX_821FEE45EA9FDD75 (media_id), PRIMARY KEY(category_id, media_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media (id INT AUTO_INCREMENT NOT NULL, path VARCHAR(255) NOT NULL, alt VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `order` (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, status INT NOT NULL, reference VARCHAR(255) DEFAULT NULL, products LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', INDEX IDX_F5299398A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE page (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, content LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, catgory_id INT NOT NULL, store_id INT NOT NULL, vat_id INT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, available TINYINT(1) NOT NULL, price DOUBLE PRECISION NOT NULL, INDEX IDX_D34A04AD1CE52F7 (catgory_id), INDEX IDX_D34A04ADB092A811 (store_id), UNIQUE INDEX UNIQ_D34A04ADB5B63A6B (vat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_media (product_id INT NOT NULL, media_id INT NOT NULL, INDEX IDX_CB70DA504584665A (product_id), INDEX IDX_CB70DA50EA9FDD75 (media_id), PRIMARY KEY(product_id, media_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE store (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE store_media (store_id INT NOT NULL, media_id INT NOT NULL, INDEX IDX_1612F715B092A811 (store_id), INDEX IDX_1612F715EA9FDD75 (media_id), PRIMARY KEY(store_id, media_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vat (id INT AUTO_INCREMENT NOT NULL, multiplicate DOUBLE PRECISION NOT NULL, name VARCHAR(255) NOT NULL, value DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE category_media ADD CONSTRAINT FK_821FEE4512469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE category_media ADD CONSTRAINT FK_821FEE45EA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F5299398A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD1CE52F7 FOREIGN KEY (catgory_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04ADB092A811 FOREIGN KEY (store_id) REFERENCES store (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04ADB5B63A6B FOREIGN KEY (vat_id) REFERENCES vat (id)');
        $this->addSql('ALTER TABLE product_media ADD CONSTRAINT FK_CB70DA504584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_media ADD CONSTRAINT FK_CB70DA50EA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE store_media ADD CONSTRAINT FK_1612F715B092A811 FOREIGN KEY (store_id) REFERENCES store (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE store_media ADD CONSTRAINT FK_1612F715EA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id) ON DELETE CASCADE');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE category_media DROP FOREIGN KEY FK_821FEE4512469DE2');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD1CE52F7');
        $this->addSql('ALTER TABLE category_media DROP FOREIGN KEY FK_821FEE45EA9FDD75');
        $this->addSql('ALTER TABLE product_media DROP FOREIGN KEY FK_CB70DA50EA9FDD75');
        $this->addSql('ALTER TABLE store_media DROP FOREIGN KEY FK_1612F715EA9FDD75');
        $this->addSql('ALTER TABLE product_media DROP FOREIGN KEY FK_CB70DA504584665A');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04ADB092A811');
        $this->addSql('ALTER TABLE store_media DROP FOREIGN KEY FK_1612F715B092A811');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F5299398A76ED395');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04ADB5B63A6B');
        $this->addSql('DROP TABLE adress');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE category_media');
        $this->addSql('DROP TABLE media');
        $this->addSql('DROP TABLE `order`');
        $this->addSql('DROP TABLE page');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE product_media');
        $this->addSql('DROP TABLE store');
        $this->addSql('DROP TABLE store_media');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE vat');
    }
}
