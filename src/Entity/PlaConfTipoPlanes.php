<?php

namespace App\Entity;

use App\Repository\PlaConfTipoPlanesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlaConfTipoPlanesRepository::class)]
class PlaConfTipoPlanes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 3)]
    private ?string $CodTipoPlan = null;

    #[ORM\Column(length: 60)]
    private ?string $TipoPlan = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $fechaVigenciaDesde = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $fechaVigenciaHasta = null;

    #[ORM\Column(length: 20)]
    private ?string $AbrTipoPlan = null;

    #[ORM\Column(length: 250)]
    private ?string $descripcion = null;

    /**
     * @var Collection<int, PlaConfPlanes>
     */
    #[ORM\OneToMany(targetEntity: PlaConfPlanes::class, mappedBy: 'PlaConfTipoPlan')]
    private Collection $plaConfPlanes;

    /**
     * @var Collection<int, PlaConfPlanObjetosGasto>
     */
    #[ORM\OneToMany(targetEntity: PlaConfPlanObjetosGasto::class, mappedBy: 'PlaConfTipoPlan')]
    private Collection $plaConfPlanObjetosGastos;

    /**
     * @var Collection<int, PlaConfPlanObjetosGastoRes>
     */
    #[ORM\OneToMany(targetEntity: PlaConfPlanObjetosGastoRes::class, mappedBy: 'PlaConfTipoPlanes')]
    private Collection $plaConfPlanObjetosGastoRes;

    /**
     * @var Collection<int, PlaConfPlanUnidades>
     */
    #[ORM\OneToMany(targetEntity: PlaConfPlanUnidades::class, mappedBy: 'PlaConfTipoPlanes')]
    private Collection $plaConfPlanUnidades;

    /**
     * @var Collection<int, PlaPlanesProcesos>
     */
    #[ORM\OneToMany(targetEntity: PlaPlanesProcesos::class, mappedBy: 'plaConfTipoPlanes')]
    private Collection $PlaPlanesProcesos;

    public function __construct()
    {
        $this->plaConfPlanes = new ArrayCollection();
        $this->plaConfPlanObjetosGastos = new ArrayCollection();
        $this->plaConfPlanObjetosGastoRes = new ArrayCollection();
        $this->plaConfPlanUnidades = new ArrayCollection();
        $this->PlaPlanesProcesos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodTipoPlan(): ?string
    {
        return $this->CodTipoPlan;
    }

    public function setCodTipoPlan(string $CodTipoPlan): static
    {
        $this->CodTipoPlan = $CodTipoPlan;

        return $this;
    }

    public function getTipoPlan(): ?string
    {
        return $this->TipoPlan;
    }

    public function setTipoPlan(string $TipoPlan): static
    {
        $this->TipoPlan = $TipoPlan;

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

    public function setFechaVigenciaHasta(?\DateTimeInterface $fechaVigenciaHasta): static
    {
        $this->fechaVigenciaHasta = $fechaVigenciaHasta;

        return $this;
    }

    public function getAbrTipoPlan(): ?string
    {
        return $this->AbrTipoPlan;
    }

    public function setAbrTipoPlan(string $AbrTipoPlan): static
    {
        $this->AbrTipoPlan = $AbrTipoPlan;

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
     * @return Collection<int, PlaConfPlanes>
     */
    public function getPlaConfPlanes(): Collection
    {
        return $this->plaConfPlanes;
    }

    public function addPlaConfPlane(PlaConfPlanes $plaConfPlane): static
    {
        if (!$this->plaConfPlanes->contains($plaConfPlane)) {
            $this->plaConfPlanes->add($plaConfPlane);
            $plaConfPlane->setPlaConfTipoPlan($this);
        }

        return $this;
    }

    public function removePlaConfPlane(PlaConfPlanes $plaConfPlane): static
    {
        if ($this->plaConfPlanes->removeElement($plaConfPlane)) {
            // set the owning side to null (unless already changed)
            if ($plaConfPlane->getPlaConfTipoPlan() === $this) {
                $plaConfPlane->setPlaConfTipoPlan(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, PlaConfPlanObjetosGasto>
     */
    public function getPlaConfPlanObjetosGastos(): Collection
    {
        return $this->plaConfPlanObjetosGastos;
    }

    public function addPlaConfPlanObjetosGasto(PlaConfPlanObjetosGasto $plaConfPlanObjetosGasto): static
    {
        if (!$this->plaConfPlanObjetosGastos->contains($plaConfPlanObjetosGasto)) {
            $this->plaConfPlanObjetosGastos->add($plaConfPlanObjetosGasto);
            $plaConfPlanObjetosGasto->setPlaConfTipoPlan($this);
        }

        return $this;
    }

    public function removePlaConfPlanObjetosGasto(PlaConfPlanObjetosGasto $plaConfPlanObjetosGasto): static
    {
        if ($this->plaConfPlanObjetosGastos->removeElement($plaConfPlanObjetosGasto)) {
            // set the owning side to null (unless already changed)
            if ($plaConfPlanObjetosGasto->getPlaConfTipoPlan() === $this) {
                $plaConfPlanObjetosGasto->setPlaConfTipoPlan(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, PlaConfPlanObjetosGastoRes>
     */
    public function getPlaConfPlanObjetosGastoRes(): Collection
    {
        return $this->plaConfPlanObjetosGastoRes;
    }

    public function addPlaConfPlanObjetosGastoRe(PlaConfPlanObjetosGastoRes $plaConfPlanObjetosGastoRe): static
    {
        if (!$this->plaConfPlanObjetosGastoRes->contains($plaConfPlanObjetosGastoRe)) {
            $this->plaConfPlanObjetosGastoRes->add($plaConfPlanObjetosGastoRe);
            $plaConfPlanObjetosGastoRe->setPlaConfTipoPlanes($this);
        }

        return $this;
    }

    public function removePlaConfPlanObjetosGastoRe(PlaConfPlanObjetosGastoRes $plaConfPlanObjetosGastoRe): static
    {
        if ($this->plaConfPlanObjetosGastoRes->removeElement($plaConfPlanObjetosGastoRe)) {
            // set the owning side to null (unless already changed)
            if ($plaConfPlanObjetosGastoRe->getPlaConfTipoPlanes() === $this) {
                $plaConfPlanObjetosGastoRe->setPlaConfTipoPlanes(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, PlaConfPlanUnidades>
     */
    public function getPlaConfPlanUnidades(): Collection
    {
        return $this->plaConfPlanUnidades;
    }

    public function addPlaConfPlanUnidade(PlaConfPlanUnidades $plaConfPlanUnidade): static
    {
        if (!$this->plaConfPlanUnidades->contains($plaConfPlanUnidade)) {
            $this->plaConfPlanUnidades->add($plaConfPlanUnidade);
            $plaConfPlanUnidade->setPlaConfTipoPlanes($this);
        }

        return $this;
    }

    public function removePlaConfPlanUnidade(PlaConfPlanUnidades $plaConfPlanUnidade): static
    {
        if ($this->plaConfPlanUnidades->removeElement($plaConfPlanUnidade)) {
            // set the owning side to null (unless already changed)
            if ($plaConfPlanUnidade->getPlaConfTipoPlanes() === $this) {
                $plaConfPlanUnidade->setPlaConfTipoPlanes(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, PlaPlanesProcesos>
     */
    public function getPlaPlanesProcesos(): Collection
    {
        return $this->PlaPlanesProcesos;
    }

    public function addPlaPlanesProceso(PlaPlanesProcesos $plaPlanesProceso): static
    {
        if (!$this->PlaPlanesProcesos->contains($plaPlanesProceso)) {
            $this->PlaPlanesProcesos->add($plaPlanesProceso);
            $plaPlanesProceso->setPlaConfTipoPlanes($this);
        }

        return $this;
    }

    public function removePlaPlanesProceso(PlaPlanesProcesos $plaPlanesProceso): static
    {
        if ($this->PlaPlanesProcesos->removeElement($plaPlanesProceso)) {
            // set the owning side to null (unless already changed)
            if ($plaPlanesProceso->getPlaConfTipoPlanes() === $this) {
                $plaPlanesProceso->setPlaConfTipoPlanes(null);
            }
        }

        return $this;
    }
}
