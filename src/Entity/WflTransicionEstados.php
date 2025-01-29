<?php

namespace App\Entity;

use App\Repository\WflTransicionEstadosRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WflTransicionEstadosRepository::class)]
class WflTransicionEstados
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'wflTransicionEstados')]
    private ?ConfEntidades $confEntidad = null;

    #[ORM\Column(length: 80)]
    private ?string $codTransicion = null;

    #[ORM\Column(length: 80)]
    private ?string $transicion = null;

    #[ORM\Column(length: 250)]
    private ?string $descripcion = null;

    #[ORM\ManyToOne(inversedBy: 'wflTransicionEstados')]
    private ?WflEstadosEntidad $wflEstadoInicial = null;

    #[ORM\ManyToOne(inversedBy: 'wflTransicionEstados')]
    private ?WflEstadosEntidad $wflEstadoFinal = null;
    
    #[ORM\Column(type: Types::ARRAY)]
    private array $tipoTrancision = [];

    #[ORM\ManyToOne(inversedBy: 'wflTransicionEstados')]
    #[ORM\JoinColumn(nullable: false)]
    private ?ConfRoles $confRol = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodTransicion(): ?string
    {
        return $this->codTransicion;
    }

    public function setCodTransicion(string $codTransicion): static
    {
        $this->codTransicion = $codTransicion;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): static
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getTipoTrancision(): array
    {
        return $this->tipoTrancision;
    }

    public function setTipoTrancision(array $tipoTrancision): static
    {
        $this->tipoTrancision = $tipoTrancision;

        return $this;
    }

    public function getConfRol(): ?ConfRoles
    {
        return $this->confRol;
    }

    public function setConfRol(?ConfRoles $confRol): static
    {
        $this->confRol = $confRol;

        return $this;
    }

    public function getConfEntidad(): ?ConfEntidades
    {
        return $this->confEntidad;
    }

    public function setConfEntidad(?ConfEntidades $confEntidad): static
    {
        $this->confEntidad = $confEntidad;

        return $this;
    }

    public function getWflEstadoInicial(): ?WflEstadosEntidad
    {
        return $this->wflEstadoInicial;
    }

    public function setWflEstadoInicial(?WflEstadosEntidad $wflEstadoInicial): static
    {
        $this->wflEstadoInicial = $wflEstadoInicial;

        return $this;
    }

    public function getWflEstadoFinal(): ?WflEstadosEntidad
    {
        return $this->wflEstadoFinal;
    }

    public function setWflEstadoFinal(?WflEstadosEntidad $wflEstadoFinal): static
    {
        $this->wflEstadoFinal = $wflEstadoFinal;

        return $this;
    }

    public function getTransicion(): ?string
    {
        return $this->transicion;
    }

    public function setTransicion(string $transicion): static
    {
        $this->transicion = $transicion;

        return $this;
    }
}
