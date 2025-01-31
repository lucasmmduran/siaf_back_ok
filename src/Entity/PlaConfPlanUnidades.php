<?php

namespace App\Entity;

use App\Repository\PlaConfPlanUnidadesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlaConfPlanUnidadesRepository::class)]
class PlaConfPlanUnidades
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: false)]
    private ?\DateTimeInterface $fechaVigenciaDesde;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $fechaVigenciaHasta = null;

    #[ORM\ManyToOne(inversedBy: 'plaConfPlanUnidades')]
    #[ORM\JoinColumn(nullable: false)]
    private ?SiafUnidades $SiafUnidades;

    #[ORM\ManyToOne(inversedBy: 'plaConfPlanUnidades')]
    #[ORM\JoinColumn(nullable: false)]
    private ?PlaConfTipoPlanes $PlaConfTipoPlanes;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFechaVigenciaDesde(): ?\DateTimeInterface
    {
        return $this->fechaVigenciaDesde;
    }

    public function setFechaVigenciaDesde(?\DateTimeInterface $fechaVigenciaDesde): static
    {
        $this->fechaVigenciaDesde = $fechaVigenciaDesde;

        return $this;
    }

    public function getFechaVigenciaHasta(): ?\DateTimeInterface
    {
        return $this->fechaVigenciaHasta;
    }

    public function setFechaVigenciaHasta(\DateTimeInterface $fechaVigenciaHasta): static
    {
        $this->fechaVigenciaHasta = $fechaVigenciaHasta;

        return $this;
    }

    public function getSiafUnidades(): ?SiafUnidades
    {
        return $this->SiafUnidades;
    }

    public function setSiafUnidades(?SiafUnidades $SiafUnidades): static
    {
        $this->SiafUnidades = $SiafUnidades;

        return $this;
    }

    public function getPlaConfTipoPlanes(): ?PlaConfTipoPlanes
    {
        return $this->PlaConfTipoPlanes;
    }

    public function setPlaConfTipoPlanes(?PlaConfTipoPlanes $PlaConfTipoPlanes): static
    {
        $this->PlaConfTipoPlanes = $PlaConfTipoPlanes;

        return $this;
    }
}
