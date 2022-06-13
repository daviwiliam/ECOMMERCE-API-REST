<?php

namespace App\Entity;

use App\Repository\PedidosRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PedidosRepository::class)
 */
class Pedidos
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $numero_pedido;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $status_pedido;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $produto_pedido;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $descricao_produto_pedido;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $usuario_comprador;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroPedido(): ?int
    {
        return $this->numero_pedido;
    }

    public function setNumeroPedido(int $numero_pedido): self
    {
        $this->numero_pedido = $numero_pedido;

        return $this;
    }

    public function getStatusPedido(): ?string
    {
        return $this->status_pedido;
    }

    public function setStatusPedido(string $status_pedido): self
    {
        $this->status_pedido = $status_pedido;

        return $this;
    }

    public function getProdutoPedido(): ?string
    {
        return $this->produto_pedido;
    }

    public function setProdutoPedido(string $produto_pedido): self
    {
        $this->produto_pedido = $produto_pedido;

        return $this;
    }

    public function getDescricaoProdutoPedido(): ?string
    {
        return $this->descricao_produto_pedido;
    }

    public function setDescricaoProdutoPedido(string $descricao_produto_pedido): self
    {
        $this->descricao_produto_pedido = $descricao_produto_pedido;

        return $this;
    }

    public function getUsuarioComprador(): ?string
    {
        return $this->usuario_comprador;
    }

    public function setUsuarioComprador(string $usuario_comprador): self
    {
        $this->usuario_comprador = $usuario_comprador;

        return $this;
    }
}
