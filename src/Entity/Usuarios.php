<?php

namespace App\Entity;

use App\Repository\UsuariosRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UsuariosRepository::class)
 */
class Usuarios
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
    private $nome_usuario;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $status_usuario;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomeUsuario(): ?string
    {
        return $this->nome_usuario;
    }

    public function setNomeUsuario(string $nome_usuario): self
    {
        $this->nome_usuario = $nome_usuario;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getStatusUsuario(): ?string
    {
        return $this->status_usuario;
    }

    public function setStatusUsuario(string $status_usuario): self
    {
        $this->status_usuario = $status_usuario;

        return $this;
    }
}
