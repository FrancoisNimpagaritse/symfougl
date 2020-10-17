<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201015130827 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE academicyear (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, registration_fees INT NOT NULL, insurance_fees INT NOT NULL, year_status VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, unitemeasure_id INT NOT NULL, categoryarticle_id INT NOT NULL, name VARCHAR(255) NOT NULL, quantity_in_stock DOUBLE PRECISION DEFAULT NULL, stock_min DOUBLE PRECISION DEFAULT NULL, INDEX IDX_23A0E6694CEF858 (unitemeasure_id), INDEX IDX_23A0E66F868F5B1 (categoryarticle_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE asset (id INT AUTO_INCREMENT NOT NULL, assetgroup_id INT NOT NULL, reference VARCHAR(50) NOT NULL, description VARCHAR(255) NOT NULL, date_purchase DATE NOT NULL, date_sold DATE DEFAULT NULL, active TINYINT(1) NOT NULL, deprecbalancesheetaccount VARCHAR(20) NOT NULL, assetaccount VARCHAR(20) NOT NULL, profitlossaccount VARCHAR(20) NOT NULL, deprec_rate DOUBLE PRECISION NOT NULL, purchase_price DOUBLE PRECISION NOT NULL, book_value DOUBLE PRECISION NOT NULL, date_last_deprec DATE DEFAULT NULL, INDEX IDX_2AF5A5CE9F2796C (assetgroup_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE asset_group (id INT AUTO_INCREMENT NOT NULL, groupe_name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE campus (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, adress VARCHAR(255) NOT NULL, date_open DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category_article (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, description VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category_expense (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE coursesperiod (id INT AUTO_INCREMENT NOT NULL, academicyear_id INT NOT NULL, trimestre VARCHAR(255) NOT NULL, date_sart DATE NOT NULL, date_end DATE NOT NULL, due_amount DOUBLE PRECISION NOT NULL, enum_niveau VARCHAR(50) NOT NULL, INDEX IDX_639D8C6B52086776 (academicyear_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cursus (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, typedivision VARCHAR(255) NOT NULL, appelationdivision VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE depreciation (id INT AUTO_INCREMENT NOT NULL, asset_id INT NOT NULL, user_id INT NOT NULL, date_deprec DATE NOT NULL, deprec_amount DOUBLE PRECISION NOT NULL, book_value DOUBLE PRECISION NOT NULL, INDEX IDX_1BD6C1325DA1941 (asset_id), INDEX IDX_1BD6C132A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE echeance (id INT AUTO_INCREMENT NOT NULL, asset_id INT NOT NULL, libelle_echeance VARCHAR(255) NOT NULL, date_next_echeance DATE NOT NULL, INDEX IDX_40D9893B5DA1941 (asset_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE employee (id INT AUTO_INCREMENT NOT NULL, firstname VARCHAR(50) DEFAULT NULL, lastname VARCHAR(50) NOT NULL, date_birth DATE NOT NULL, address_birth VARCHAR(255) DEFAULT NULL, current_address VARCHAR(255) NOT NULL, matricule VARCHAR(50) DEFAULT NULL, date_hired DATE NOT NULL, date_ended_hire DATE DEFAULT NULL, type_contrat VARCHAR(50) NOT NULL, poste VARCHAR(255) NOT NULL, niveau_qualification VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE enum_niveau (id INT AUTO_INCREMENT NOT NULL, appelation VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE expense (id INT AUTO_INCREMENT NOT NULL, category_expense_id INT NOT NULL, user_id INT NOT NULL, date_expense DATE NOT NULL, description VARCHAR(255) NOT NULL, amount DOUBLE PRECISION NOT NULL, INDEX IDX_2D3A8DA6D58B8B05 (category_expense_id), INDEX IDX_2D3A8DA6A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE minervalpayment (id INT AUTO_INCREMENT NOT NULL, coursesperiod_id INT NOT NULL, inscription_id INT NOT NULL, user_id INT NOT NULL, date_paid DATE NOT NULL, paid_amount INT NOT NULL, voucher VARCHAR(255) NOT NULL, libelle VARCHAR(255) DEFAULT NULL, INDEX IDX_6E8DEC1A3B4BD92C (coursesperiod_id), INDEX IDX_6E8DEC1A5DAC5993 (inscription_id), INDEX IDX_6E8DEC1AA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE purchase (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, date_purchase DATE NOT NULL, description VARCHAR(255) NOT NULL, INDEX IDX_6117D13BA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE purchase_detail (id INT AUTO_INCREMENT NOT NULL, article_id INT NOT NULL, purchase_id INT NOT NULL, unity_price DOUBLE PRECISION NOT NULL, quantity DOUBLE PRECISION NOT NULL, INDEX IDX_F5697DC67294869C (article_id), INDEX IDX_F5697DC6558FBEB9 (purchase_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE registration (id INT AUTO_INCREMENT NOT NULL, university_id INT NOT NULL, student_id INT NOT NULL, campus_id INT NOT NULL, cursus_id INT NOT NULL, academicyear_id INT NOT NULL, user_id INT NOT NULL, niveau_id INT NOT NULL, has_choice_info TINYINT(1) NOT NULL, choice_externe_interne VARCHAR(20) NOT NULL, date_registration DATE NOT NULL, INDEX IDX_62A8A7A7309D1878 (university_id), INDEX IDX_62A8A7A7CB944F1A (student_id), INDEX IDX_62A8A7A7AF5D55E1 (campus_id), INDEX IDX_62A8A7A740AEF4B9 (cursus_id), INDEX IDX_62A8A7A752086776 (academicyear_id), INDEX IDX_62A8A7A7A76ED395 (user_id), INDEX IDX_62A8A7A7B3E9C81 (niveau_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE registrationfeespayment (id INT AUTO_INCREMENT NOT NULL, registration_id INT NOT NULL, user_id INT NOT NULL, date_paid DATE NOT NULL, paid_amount INT NOT NULL, voucher VARCHAR(255) NOT NULL, libelle VARCHAR(255) DEFAULT NULL, INDEX IDX_7E371219833D8F43 (registration_id), INDEX IDX_7E371219A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sortie_stock (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, date_sortie DATE NOT NULL, description VARCHAR(255) NOT NULL, receiver VARCHAR(50) DEFAULT NULL, INDEX IDX_D238F364A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sortie_stock_detail (id INT AUTO_INCREMENT NOT NULL, article_id INT NOT NULL, sortiestock_id INT NOT NULL, quantity DOUBLE PRECISION NOT NULL, INDEX IDX_26C619047294869C (article_id), INDEX IDX_26C61904BB558B00 (sortiestock_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stock_transfer (id INT AUTO_INCREMENT NOT NULL, campusorigin_id INT NOT NULL, campusdestination_id INT NOT NULL, date_transfer DATE NOT NULL, description VARCHAR(255) NOT NULL, INDEX IDX_FF2F782DA77DEBE (campusorigin_id), INDEX IDX_FF2F782A10B33AB (campusdestination_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stock_transfer_detail (id INT AUTO_INCREMENT NOT NULL, article_id INT NOT NULL, stocktransfer_id INT NOT NULL, quantity DOUBLE PRECISION NOT NULL, INDEX IDX_AABC59017294869C (article_id), INDEX IDX_AABC59019E724F7B (stocktransfer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE student (id INT AUTO_INCREMENT NOT NULL, firstname VARCHAR(50) DEFAULT NULL, lastname VARCHAR(50) NOT NULL, date_birth DATE NOT NULL, place_birth VARCHAR(50) NOT NULL, commune_birth VARCHAR(50) NOT NULL, province_birth VARCHAR(50) NOT NULL, etat_civil VARCHAR(50) NOT NULL, country VARCHAR(50) NOT NULL, gender VARCHAR(20) NOT NULL, nationality VARCHAR(50) NOT NULL, address VARCHAR(255) NOT NULL, parent_address VARCHAR(255) DEFAULT NULL, tutor_lastname VARCHAR(50) DEFAULT NULL, tutor_firstname VARCHAR(50) DEFAULT NULL, tutor_phone VARCHAR(50) DEFAULT NULL, national_id_number VARCHAR(50) NOT NULL, father_firstname VARCHAR(50) DEFAULT NULL, father_lastname VARCHAR(50) NOT NULL, mother_firstname VARCHAR(50) DEFAULT NULL, mother_lastname VARCHAR(50) NOT NULL, father_profession VARCHAR(50) NOT NULL, mother_profession VARCHAR(50) DEFAULT NULL, student_conjoint VARCHAR(100) DEFAULT NULL, has_secondary_certificate TINYINT(1) NOT NULL, is_homologue TINYINT(1) NOT NULL, secondary_certificate_type VARCHAR(50) NOT NULL, secondary_school VARCHAR(255) NOT NULL, date_issued DATE DEFAULT NULL, year_obtention VARCHAR(10) DEFAULT NULL, mention VARCHAR(50) DEFAULT NULL, grade_percentage DOUBLE PRECISION DEFAULT NULL, dpe VARCHAR(50) DEFAULT NULL, has_post_secondary_certificate TINYINT(1) DEFAULT NULL, instute VARCHAR(50) DEFAULT NULL, diploma_certificate VARCHAR(255) DEFAULT NULL, year_obtention_univ VARCHAR(10) DEFAULT NULL, has_attestation_frequentation TINYINT(1) DEFAULT NULL, interruption_period VARCHAR(50) DEFAULT NULL, interruption_occupation VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE unity_measure (id INT AUTO_INCREMENT NOT NULL, unity_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE university (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, adress VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E6694CEF858 FOREIGN KEY (unitemeasure_id) REFERENCES unity_measure (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66F868F5B1 FOREIGN KEY (categoryarticle_id) REFERENCES category_article (id)');
        $this->addSql('ALTER TABLE asset ADD CONSTRAINT FK_2AF5A5CE9F2796C FOREIGN KEY (assetgroup_id) REFERENCES asset_group (id)');
        $this->addSql('ALTER TABLE coursesperiod ADD CONSTRAINT FK_639D8C6B52086776 FOREIGN KEY (academicyear_id) REFERENCES academicyear (id)');
        $this->addSql('ALTER TABLE depreciation ADD CONSTRAINT FK_1BD6C1325DA1941 FOREIGN KEY (asset_id) REFERENCES asset (id)');
        $this->addSql('ALTER TABLE depreciation ADD CONSTRAINT FK_1BD6C132A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE echeance ADD CONSTRAINT FK_40D9893B5DA1941 FOREIGN KEY (asset_id) REFERENCES asset (id)');
        $this->addSql('ALTER TABLE expense ADD CONSTRAINT FK_2D3A8DA6D58B8B05 FOREIGN KEY (category_expense_id) REFERENCES category_expense (id)');
        $this->addSql('ALTER TABLE expense ADD CONSTRAINT FK_2D3A8DA6A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE minervalpayment ADD CONSTRAINT FK_6E8DEC1A3B4BD92C FOREIGN KEY (coursesperiod_id) REFERENCES coursesperiod (id)');
        $this->addSql('ALTER TABLE minervalpayment ADD CONSTRAINT FK_6E8DEC1A5DAC5993 FOREIGN KEY (inscription_id) REFERENCES registration (id)');
        $this->addSql('ALTER TABLE minervalpayment ADD CONSTRAINT FK_6E8DEC1AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE purchase ADD CONSTRAINT FK_6117D13BA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE purchase_detail ADD CONSTRAINT FK_F5697DC67294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE purchase_detail ADD CONSTRAINT FK_F5697DC6558FBEB9 FOREIGN KEY (purchase_id) REFERENCES purchase (id)');
        $this->addSql('ALTER TABLE registration ADD CONSTRAINT FK_62A8A7A7309D1878 FOREIGN KEY (university_id) REFERENCES university (id)');
        $this->addSql('ALTER TABLE registration ADD CONSTRAINT FK_62A8A7A7CB944F1A FOREIGN KEY (student_id) REFERENCES student (id)');
        $this->addSql('ALTER TABLE registration ADD CONSTRAINT FK_62A8A7A7AF5D55E1 FOREIGN KEY (campus_id) REFERENCES campus (id)');
        $this->addSql('ALTER TABLE registration ADD CONSTRAINT FK_62A8A7A740AEF4B9 FOREIGN KEY (cursus_id) REFERENCES cursus (id)');
        $this->addSql('ALTER TABLE registration ADD CONSTRAINT FK_62A8A7A752086776 FOREIGN KEY (academicyear_id) REFERENCES academicyear (id)');
        $this->addSql('ALTER TABLE registration ADD CONSTRAINT FK_62A8A7A7A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE registration ADD CONSTRAINT FK_62A8A7A7B3E9C81 FOREIGN KEY (niveau_id) REFERENCES enum_niveau (id)');
        $this->addSql('ALTER TABLE registrationfeespayment ADD CONSTRAINT FK_7E371219833D8F43 FOREIGN KEY (registration_id) REFERENCES registration (id)');
        $this->addSql('ALTER TABLE registrationfeespayment ADD CONSTRAINT FK_7E371219A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE sortie_stock ADD CONSTRAINT FK_D238F364A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE sortie_stock_detail ADD CONSTRAINT FK_26C619047294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE sortie_stock_detail ADD CONSTRAINT FK_26C61904BB558B00 FOREIGN KEY (sortiestock_id) REFERENCES sortie_stock (id)');
        $this->addSql('ALTER TABLE stock_transfer ADD CONSTRAINT FK_FF2F782DA77DEBE FOREIGN KEY (campusorigin_id) REFERENCES campus (id)');
        $this->addSql('ALTER TABLE stock_transfer ADD CONSTRAINT FK_FF2F782A10B33AB FOREIGN KEY (campusdestination_id) REFERENCES campus (id)');
        $this->addSql('ALTER TABLE stock_transfer_detail ADD CONSTRAINT FK_AABC59017294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE stock_transfer_detail ADD CONSTRAINT FK_AABC59019E724F7B FOREIGN KEY (stocktransfer_id) REFERENCES stock_transfer (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE coursesperiod DROP FOREIGN KEY FK_639D8C6B52086776');
        $this->addSql('ALTER TABLE registration DROP FOREIGN KEY FK_62A8A7A752086776');
        $this->addSql('ALTER TABLE purchase_detail DROP FOREIGN KEY FK_F5697DC67294869C');
        $this->addSql('ALTER TABLE sortie_stock_detail DROP FOREIGN KEY FK_26C619047294869C');
        $this->addSql('ALTER TABLE stock_transfer_detail DROP FOREIGN KEY FK_AABC59017294869C');
        $this->addSql('ALTER TABLE depreciation DROP FOREIGN KEY FK_1BD6C1325DA1941');
        $this->addSql('ALTER TABLE echeance DROP FOREIGN KEY FK_40D9893B5DA1941');
        $this->addSql('ALTER TABLE asset DROP FOREIGN KEY FK_2AF5A5CE9F2796C');
        $this->addSql('ALTER TABLE registration DROP FOREIGN KEY FK_62A8A7A7AF5D55E1');
        $this->addSql('ALTER TABLE stock_transfer DROP FOREIGN KEY FK_FF2F782DA77DEBE');
        $this->addSql('ALTER TABLE stock_transfer DROP FOREIGN KEY FK_FF2F782A10B33AB');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66F868F5B1');
        $this->addSql('ALTER TABLE expense DROP FOREIGN KEY FK_2D3A8DA6D58B8B05');
        $this->addSql('ALTER TABLE minervalpayment DROP FOREIGN KEY FK_6E8DEC1A3B4BD92C');
        $this->addSql('ALTER TABLE registration DROP FOREIGN KEY FK_62A8A7A740AEF4B9');
        $this->addSql('ALTER TABLE registration DROP FOREIGN KEY FK_62A8A7A7B3E9C81');
        $this->addSql('ALTER TABLE purchase_detail DROP FOREIGN KEY FK_F5697DC6558FBEB9');
        $this->addSql('ALTER TABLE minervalpayment DROP FOREIGN KEY FK_6E8DEC1A5DAC5993');
        $this->addSql('ALTER TABLE registrationfeespayment DROP FOREIGN KEY FK_7E371219833D8F43');
        $this->addSql('ALTER TABLE sortie_stock_detail DROP FOREIGN KEY FK_26C61904BB558B00');
        $this->addSql('ALTER TABLE stock_transfer_detail DROP FOREIGN KEY FK_AABC59019E724F7B');
        $this->addSql('ALTER TABLE registration DROP FOREIGN KEY FK_62A8A7A7CB944F1A');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E6694CEF858');
        $this->addSql('ALTER TABLE registration DROP FOREIGN KEY FK_62A8A7A7309D1878');
        $this->addSql('DROP TABLE academicyear');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE asset');
        $this->addSql('DROP TABLE asset_group');
        $this->addSql('DROP TABLE campus');
        $this->addSql('DROP TABLE category_article');
        $this->addSql('DROP TABLE category_expense');
        $this->addSql('DROP TABLE coursesperiod');
        $this->addSql('DROP TABLE cursus');
        $this->addSql('DROP TABLE depreciation');
        $this->addSql('DROP TABLE echeance');
        $this->addSql('DROP TABLE employee');
        $this->addSql('DROP TABLE enum_niveau');
        $this->addSql('DROP TABLE expense');
        $this->addSql('DROP TABLE minervalpayment');
        $this->addSql('DROP TABLE purchase');
        $this->addSql('DROP TABLE purchase_detail');
        $this->addSql('DROP TABLE registration');
        $this->addSql('DROP TABLE registrationfeespayment');
        $this->addSql('DROP TABLE sortie_stock');
        $this->addSql('DROP TABLE sortie_stock_detail');
        $this->addSql('DROP TABLE stock_transfer');
        $this->addSql('DROP TABLE stock_transfer_detail');
        $this->addSql('DROP TABLE student');
        $this->addSql('DROP TABLE unity_measure');
        $this->addSql('DROP TABLE university');
    }
}
