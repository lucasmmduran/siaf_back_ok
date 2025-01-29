<?php

namespace App\Entity;

use App\Repository\PlaPlanesCabeceraRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlaPlanesCabeceraRepository::class)]
class PlaPlanesCabecera
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $fechaIngreso = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $fechaUltActualizacion = null;

    #[ORM\Column]
    private ?int $nroPlan = null;

    #[ORM\Column(length: 20)]
    private ?string $identificacionPlan = null;

    #[ORM\Column]
    private ?int $version = null;

    /**
     * @var Collection<int, PlaPlanesProcesos>
     */
    #[ORM\OneToMany(targetEntity: PlaPlanesProcesos::class, mappedBy: 'plaPlanesCabecera')]
    private Collection $planesProcesos;

    #[ORM\ManyToOne(inversedBy: 'PlaPlanesCabecera')]
    #[ORM\JoinColumn(nullable: false)]
    private ?PlaConfPlanes $plaConfPlanes = null;

    #[ORM\ManyToOne(inversedBy: 'plaPlanesCabeceras')]
    private ?SiafAperturasProgramaticas $SiafAperturasProgramaticas = null;

    #[ORM\ManyToOne(inversedBy: 'plaPlanesCabeceras')]
    #[ORM\JoinColumn(nullable: false)]
    private ?SiafEjercicios $SiafEjercicios = null;

    #[ORM\ManyToOne(inversedBy: 'plaPlanesCabeceras')]
    #[ORM\JoinColumn(nullable: false)]
    private ?SiafUnidades $SiafUnidades = null;

    public function __construct()
    {
        $this->planesProcesos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFechaIngreso(): ?\DateTimeInterface
    {
        return $this->fechaIngreso;
    }

    public function setFechaIngreso(\DateTimeInterface $fechaIngreso): static
    {
        $this->fechaIngreso = $fechaIngreso;

        return $this;
    }

    public function getFechaUltActualizacion(): ?\DateTimeInterface
    {
        return $this->fechaUltActualizacion;
    }

    public function setFechaUltActualizacion(\DateTimeInterface $fechaUltActualizacion): static
    {
        $this->fechaUltActualizacion = $fechaUltActualizacion;

        return $this;
    }

    public function getNroPlan(): ?int
    {
        return $this->nroPlan;
    }

    public function setNroPlan(int $nroPlan): static
    {
        $this->nroPlan = $nroPlan;

        return $this;
    }

    public function getIdentificacionPlan(): ?string
    {
        return $this->identificacionPlan;
    }

    public function setIdentificacionPlan(string $identificacionPlan): static
    {
        $this->identificacionPlan = $identificacionPlan;

        return $this;
    }

    public function getVersion(): ?int
    {
        return $this->version;
    }

    public function setVersion(int $version): static
    {
        $this->version = $version;

        return $this;
    }

    /**
     * @return Collection<int, PlaPlanesProcesos>
     */
    public function getPlanesProcesos(): Collection
    {
        return $this->planesProcesos;
    }

    public function addPlanesProceso(PlaPlanesProcesos $planesProceso): static
    {
        if (!$this->planesProcesos->contains($planesProceso)) {
            $this->planesProcesos->add($planesProceso);
            $planesProceso->setPlaPlanesCabecera($this);
        }

        return $this;
    }

    public function removePlanesProceso(PlaPlanesProcesos $planesProceso): static
    {
        if ($this->planesProcesos->removeElement($planesProceso)) {
            // set the owning side to null (unless already changed)
            if ($planesProceso->getPlaPlanesCabecera() === $this) {
                $planesProceso->setPlaPlanesCabecera(null);
            }
        }

        return $this;
    }

    public function getPlaConfPlanes(): ?PlaConfPlanes
    {
        return $this->plaConfPlanes;
    }

    public function setPlaConfPlanes(?PlaConfPlanes $plaConfPlanes): static
    {
        $this->plaConfPlanes = $plaConfPlanes;

        return $this;
    }

    public function getSiafAperturasProgramaticas(): ?SiafAperturasProgramaticas
    {
        return $this->SiafAperturasProgramaticas;
    }

    public function setSiafAperturasProgramaticas(?SiafAperturasProgramaticas $SiafAperturasProgramaticas): static
    {
        $this->SiafAperturasProgramaticas = $SiafAperturasProgramaticas;

        return $this;
    }

    public function getSiafEjercicios(): ?SiafEjercicios
    {
        return $this->SiafEjercicios;
    }

    public function setSiafEjercicios(?SiafEjercicios $SiafEjercicios): static
    {
        $this->SiafEjercicios = $SiafEjercicios;

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
}
