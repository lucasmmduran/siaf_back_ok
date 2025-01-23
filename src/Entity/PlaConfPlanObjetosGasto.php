<?php

namespace App\Entity;

use App\Repository\PlaConfPlanObjetosGastoRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlaConfPlanObjetosGastoRepository::class)]
class PlaConfPlanObjetosGasto
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $fechaVigenciaDesde = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $fechaVigenciaHasta = null;

    #[ORM\ManyToOne(inversedBy: 'plaConfPlanObjetosGastos')]
    private ?PlaConfTipoPlanes $PlaConfTipoPlan = null;

    #[ORM\ManyToOne(inversedBy: 'plaConfPlanObjetosGastos')]
    private ?SiafObjetosGasto $SiafObjetosGasto = null;

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

    public function setFechaVigenciaHasta(?\DateTimeInterface $fechaVigenciaHasta): static
    {
        $this->fechaVigenciaHasta = $fechaVigenciaHasta;

        return $this;
    }

    public function getPlaConfTipoPlan(): ?PlaConfTipoPlanes
    {
        return $this->PlaConfTipoPlan;
    }

    public function setPlaConfTipoPlan(?PlaConfTipoPlanes $PlaConfTipoPlan): static
    {
        $this->PlaConfTipoPlan = $PlaConfTipoPlan;

        return $this;
    }

    public function getSiafObjetosGasto(): ?SiafObjetosGasto
    {
        return $this->SiafObjetosGasto;
    }

    public function setSiafObjetosGasto(?SiafObjetosGasto $SiafObjetosGasto): static
    {
        $this->SiafObjetosGasto = $SiafObjetosGasto;

        return $this;
    }
}
