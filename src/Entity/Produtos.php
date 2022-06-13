<?php

namespace App\Entity;

use App\Repository\ProdutosRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProdutosRepository::class)
 */
class Produtos
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nome_produto;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $descricao_produto;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $preco;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $status_produto;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomeProduto(): ?string
    {
        return $this->nome_produto;
    }

    public function setNomeProduto(string $nome_produto): self
    {
        $this->nome_produto = $nome_produto;

        return $this;
    }

    public function getDescricaoProduto(): ?string
    {
        return $this->descricao_produto;
    }

    public function setDescricaoProduto(string $descricao_produto): self
    {
        $this->descricao_produto = $descricao_produto;

        return $this;
    }

    public function getPreco(): ?string
    {
        return $this->preco;
    }

    public function setPreco(string $preco): self
    {
        $this->preco = $preco;

        return $this;
    }

    public function getStatusProduto(): ?string
    {
        return $this->status_produto;
    }

    public function setStatusProduto(string $status_produto): self
    {
        $this->status_produto = $status_produto;

        return $this;
    }
}
