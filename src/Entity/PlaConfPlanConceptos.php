<?php

namespace App\Entity;

use App\Repository\PlaConfPlanConceptosRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlaConfPlanConceptosRepository::class)]
class PlaConfPlanConceptos
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'plaConfPlanConceptos')]
    #[ORM\JoinColumn(nullable: false)]
    private ?PlaConfPlanes $PlaConfPlanes;

    #[ORM\Column(length: 6)]
    private ?string $codPlanConcepto = null;

    #[ORM\Column(length: 45)]
    private ?string $planConcepto = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: false)]
    private ?\DateTimeInterface $fechaVigenciaDesde;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $fechaVigenciaHasta = null;

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

    public function getPlaConfPlanes(): ?PlaConfPlanes
    {
        return $this->PlaConfPlanes;
    }

    public function setPlaConfPlanes(?PlaConfPlanes $PlaConfPlanes): static
    {
        $this->PlaConfPlanes = $PlaConfPlanes;

        return $this;
    }

    public function getCodPlanConcepto(): ?string
    {
        return $this->codPlanConcepto;
    }

    public function setCodPlanConcepto(string $codPlanConcepto): static
    {
        $this->codPlanConcepto = $codPlanConcepto;

        return $this;
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
}
