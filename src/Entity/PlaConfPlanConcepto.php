<?php

namespace App\Entity;

use App\Repository\PlaConfPlanConceptoRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlaConfPlanConceptoRepository::class)]
class PlaConfPlanConcepto
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 45)]
    private ?string $planConcepto = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $fechaVigenciaDesde = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $fechaVigenciaHasta = null;

    #[ORM\ManyToOne(inversedBy: 'plaConfPlanConceptos')]
    private ?PlaConfPlanes $PlaConfPlanes = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPlanConcepto(): ?string
    {
        return $this->planConcepto;
    }

    public function setPlanConcepto(string $planConcepto): static
    {
        $this->planConcepto = $planConcepto;

        return $this;
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

    public function getPlaConfPlanes(): ?PlaConfPlanes
    {
        return $this->PlaConfPlanes;
    }

    public function setPlaConfPlanes(?PlaConfPlanes $PlaConfPlanes): static
    {
        $this->PlaConfPlanes = $PlaConfPlanes;

        return $this;
    }
}
