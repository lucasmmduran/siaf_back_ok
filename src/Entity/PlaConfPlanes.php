<?php

namespace App\Entity;

use App\Repository\PlaConfPlanesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlaConfPlanesRepository::class)]
class PlaConfPlanes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 5)]
    private ?string $codPlan = null;

    #[ORM\Column(length: 60)]
    private ?string $plan = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $fechaVigenciaDesde = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $fechaVigenciaHasta = null;

    #[ORM\Column(length: 20)]
    private ?string $abrTipoPlan = null;

    #[ORM\Column(length: 250)]
    private ?string $descripcion = null;

    /**
     * @var Collection<int, PlaConfPlanConceptos>
     */
    #[ORM\OneToMany(targetEntity: PlaConfPlanConceptos::class, mappedBy: 'PlaConfPlanes')]
    private Collection $plaConfPlanConceptos;

    #[ORM\ManyToOne(inversedBy: 'plaConfPlanes')]
    private ?PlaConfTipoPlanes $PlaConfTipoPlan = null;

    /**
     * @var Collection<int, PlaPlanesCabecera>
     */
    #[ORM\OneToMany(targetEntity: PlaPlanesCabecera::class, mappedBy: 'plaConfPlanes')]
    private Collection $PlaPlanesCabecera;

    public function __construct()
    {
        $this->plaConfPlanConceptos = new ArrayCollection();
        $this->PlaPlanesCabecera = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodPlan(): ?string
    {
        return $this->codPlan;
    }

    public function setCodPlan(string $codPlan): static
    {
        $this->codPlan = $codPlan;

        return $this;
    }

    public function getPlan(): ?string
    {
        return $this->plan;
    }

    public function setPlan(string $plan): static
    {
        $this->plan = $plan;

        return $this;
    }

    public function getFechaVigenciaDesde(): ?\DateTimeInterface
    {
        return $this->fechaVigenciaDesde;
    }

    public function setFechaVigenciaDesde(\DateTimeInterface $fechaVigenciaDesde): static
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

    public function getAbrTipoPlan(): ?string
    {
        return $this->abrTipoPlan;
    }

    public function setAbrTipoPlan(string $abrTipoPlan): static
    {
        $this->abrTipoPlan = $abrTipoPlan;

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

    /**
     * @return Collection<int, PlaConfPlanConceptos>
     */
    public function getPlaConfPlanConceptos(): Collection
    {
        return $this->plaConfPlanConceptos;
    }

    public function addPlaConfPlanConcepto(PlaConfPlanConceptos $plaConfPlanConcepto): static
    {
        if (!$this->plaConfPlanConceptos->contains($plaConfPlanConcepto)) {
            $this->plaConfPlanConceptos->add($plaConfPlanConcepto);
            $plaConfPlanConcepto->setPlaConfPlanes($this);
        }

        return $this;
    }

    public function removePlaConfPlanConcepto(PlaConfPlanConceptos $plaConfPlanConcepto): static
    {
        if ($this->plaConfPlanConceptos->removeElement($plaConfPlanConcepto)) {
            // set the owning side to null (unless already changed)
            if ($plaConfPlanConcepto->getPlaConfPlanes() === $this) {
                $plaConfPlanConcepto->setPlaConfPlanes(null);
            }
        }

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

    /**
     * @return Collection<int, PlaPlanesCabecera>
     */
    public function getPlaPlanesCabecera(): Collection
    {
        return $this->PlaPlanesCabecera;
    }

    public function addPlaPlanesCabecera(PlaPlanesCabecera $plaPlanesCabecera): static
    {
        if (!$this->PlaPlanesCabecera->contains($plaPlanesCabecera)) {
            $this->PlaPlanesCabecera->add($plaPlanesCabecera);
            $plaPlanesCabecera->setPlaConfPlanes($this);
        }

        return $this;
    }

    public function removePlaPlanesCabecera(PlaPlanesCabecera $plaPlanesCabecera): static
    {
        if ($this->PlaPlanesCabecera->removeElement($plaPlanesCabecera)) {
            // set the owning side to null (unless already changed)
            if ($plaPlanesCabecera->getPlaConfPlanes() === $this) {
                $plaPlanesCabecera->setPlaConfPlanes(null);
            }
        }

        return $this;
    }
}
