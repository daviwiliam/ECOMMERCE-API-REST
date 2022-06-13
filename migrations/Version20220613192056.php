<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220613192056 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE pedidos (id INT AUTO_INCREMENT NOT NULL, numero_pedido INT NOT NULL, status_pedido VARCHAR(255) NOT NULL, produto_pedido VARCHAR(255) NOT NULL, descricao_produto_pedido VARCHAR(255) NOT NULL, usuario_comprador VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produtos (id INT AUTO_INCREMENT NOT NULL, nome_produto VARCHAR(255) NOT NULL, descricao_produto VARCHAR(255) NOT NULL, preco VARCHAR(255) NOT NULL, status_produto VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE usuarios (id INT AUTO_INCREMENT NOT NULL, nome_usuario VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, status_usuario VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE pedidos');
        $this->addSql('DROP TABLE produtos');
        $this->addSql('DROP TABLE usuarios');
    }
}
