<?php

namespace App\Entity;

use App\Repository\SiafEstadosComprobantesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SiafEstadosComprobantesRepository::class)]
class SiafEstadosComprobantes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 45)]
    private ?string $estado = null;

    #[ORM\Column(length: 180)]
    private ?string $descEstado = null;

    #[ORM\ManyToOne(inversedBy: 'siafEstadosComprobantes')]
    private ?SiafTiposComporbantes $SiafTiposComporbantes = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEstado(): ?string
    {
        return $this->estado;
    }

    public function setEstado(string $estado): static
    {
        $this->estado = $estado;

        return $this;
    }

    public function getDescEstado(): ?string
    {
        return $this->descEstado;
    }

    public function setDescEstado(string $descEstado): static
    {
        $this->descEstado = $descEstado;

        return $this;
    }

    public function getSiafTiposComporbantes(): ?SiafTiposComporbantes
    {
        return $this->SiafTiposComporbantes;
    }

    public function setSiafTiposComporbantes(?SiafTiposComporbantes $SiafTiposComporbantes): static
    {
        $this->SiafTiposComporbantes = $SiafTiposComporbantes;

        return $this;
    }
}
