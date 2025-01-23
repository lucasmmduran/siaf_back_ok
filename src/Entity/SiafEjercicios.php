<?php

namespace App\Entity;

use App\Repository\SiafEjerciciosRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SiafEjerciciosRepository::class)]
class SiafEjercicios
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $activoPlanificacion = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $activoFormulacion = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $activoEjecucion = null;

    /**
     * @var Collection<int, PlaPlanesCabecera>
     */
    #[ORM\OneToMany(targetEntity: PlaPlanesCabecera::class, mappedBy: 'SiafEjercicios')]
    private Collection $plaPlanesCabeceras;

    /**
     * @var Collection<int, SiafAperturasProgramaticas>
     */
    #[ORM\OneToMany(targetEntity: SiafAperturasProgramaticas::class, mappedBy: 'SiafEjercicios')]
    private Collection $siafAperturasProgramaticas;

    /**
     * @var Collection<int, SiafFinalidadFuncion>
     */
    #[ORM\OneToMany(targetEntity: SiafFinalidadFuncion::class, mappedBy: 'siafEjercicios')]
    private Collection $SiafFinalidadFuncion;

    /**
     * @var Collection<int, SiafObjetosGasto>
     */
    #[ORM\OneToMany(targetEntity: SiafObjetosGasto::class, mappedBy: 'siafEjercicios')]
    private Collection $SiafObjetosGasto;

    /**
     * @var Collection<int, SiafSectoresInstitucionales>
     */
    #[ORM\OneToMany(targetEntity: SiafSectoresInstitucionales::class, mappedBy: 'siafEjercicios')]
    private Collection $SiafSectoresInstitucionales;

    /**
     * @var Collection<int, SiafInstituciones>
     */
    #[ORM\OneToMany(targetEntity: SiafInstituciones::class, mappedBy: 'siafEjercicios')]
    private Collection $SiafInstituciones;

    /**
     * @var Collection<int, SiafFuentesFinanciamiento>
     */
    #[ORM\OneToMany(targetEntity: SiafFuentesFinanciamiento::class, mappedBy: 'siafEjercicios')]
    private Collection $SiafFuentesFinanciamiento;

    /**
     * @var Collection<int, SiafServicios>
     */
    #[ORM\OneToMany(targetEntity: SiafServicios::class, mappedBy: 'siafEjercicios')]
    private Collection $SiafServicios;

    public function __construct()
    {
        $this->plaPlanesCabeceras = new ArrayCollection();
        $this->siafAperturasProgramaticas = new ArrayCollection();
        $this->SiafFinalidadFuncion = new ArrayCollection();
        $this->SiafObjetosGasto = new ArrayCollection();
        $this->SiafSectoresInstitucionales = new ArrayCollection();
        $this->SiafInstituciones = new ArrayCollection();
        $this->SiafFuentesFinanciamiento = new ArrayCollection();
        $this->SiafServicios = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getActivoPlanificacion(): ?int
    {
        return $this->activoPlanificacion;
    }

    public function setActivoPlanificacion(int $activoPlanificacion): static
    {
        $this->activoPlanificacion = $activoPlanificacion;

        return $this;
    }

    public function getActivoFormulacion(): ?int
    {
        return $this->activoFormulacion;
    }

    public function setActivoFormulacion(int $activoFormulacion): static
    {
        $this->activoFormulacion = $activoFormulacion;

        return $this;
    }

    public function getActivoEjecucion(): ?int
    {
        return $this->activoEjecucion;
    }

    public function setActivoEjecucion(int $activoEjecucion): static
    {
        $this->activoEjecucion = $activoEjecucion;

        return $this;
    }

    /**
     * @return Collection<int, PlaPlanesCabecera>
     */
    public function getPlaPlanesCabeceras(): Collection
    {
        return $this->plaPlanesCabeceras;
    }

    public function addPlaPlanesCabecera(PlaPlanesCabecera $plaPlanesCabecera): static
    {
        if (!$this->plaPlanesCabeceras->contains($plaPlanesCabecera)) {
            $this->plaPlanesCabeceras->add($plaPlanesCabecera);
            $plaPlanesCabecera->setSiafEjercicios($this);
        }

        return $this;
    }

    public function removePlaPlanesCabecera(PlaPlanesCabecera $plaPlanesCabecera): static
    {
        if ($this->plaPlanesCabeceras->removeElement($plaPlanesCabecera)) {
            // set the owning side to null (unless already changed)
            if ($plaPlanesCabecera->getSiafEjercicios() === $this) {
                $plaPlanesCabecera->setSiafEjercicios(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, SiafAperturasProgramaticas>
     */
    public function getSiafAperturasProgramaticas(): Collection
    {
        return $this->siafAperturasProgramaticas;
    }

    public function addSiafAperturasProgramatica(SiafAperturasProgramaticas $siafAperturasProgramatica): static
    {
        if (!$this->siafAperturasProgramaticas->contains($siafAperturasProgramatica)) {
            $this->siafAperturasProgramaticas->add($siafAperturasProgramatica);
            $siafAperturasProgramatica->setSiafEjercicios($this);
        }

        return $this;
    }

    public function removeSiafAperturasProgramatica(SiafAperturasProgramaticas $siafAperturasProgramatica): static
    {
        if ($this->siafAperturasProgramaticas->removeElement($siafAperturasProgramatica)) {
            // set the owning side to null (unless already changed)
            if ($siafAperturasProgramatica->getSiafEjercicios() === $this) {
                $siafAperturasProgramatica->setSiafEjercicios(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, SiafFinalidadFuncion>
     */
    public function getSiafFinalidadFuncion(): Collection
    {
        return $this->SiafFinalidadFuncion;
    }

    public function addSiafFinalidadFuncion(SiafFinalidadFuncion $siafFinalidadFuncion): static
    {
        if (!$this->SiafFinalidadFuncion->contains($siafFinalidadFuncion)) {
            $this->SiafFinalidadFuncion->add($siafFinalidadFuncion);
            $siafFinalidadFuncion->setSiafEjercicios($this);
        }

        return $this;
    }

    public function removeSiafFinalidadFuncion(SiafFinalidadFuncion $siafFinalidadFuncion): static
    {
        if ($this->SiafFinalidadFuncion->removeElement($siafFinalidadFuncion)) {
            // set the owning side to null (unless already changed)
            if ($siafFinalidadFuncion->getSiafEjercicios() === $this) {
                $siafFinalidadFuncion->setSiafEjercicios(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, SiafObjetosGasto>
     */
    public function getSiafObjetosGasto(): Collection
    {
        return $this->SiafObjetosGasto;
    }

    public function addSiafObjetosGasto(SiafObjetosGasto $siafObjetosGasto): static
    {
        if (!$this->SiafObjetosGasto->contains($siafObjetosGasto)) {
            $this->SiafObjetosGasto->add($siafObjetosGasto);
            $siafObjetosGasto->setSiafEjercicios($this);
        }

        return $this;
    }

    public function removeSiafObjetosGasto(SiafObjetosGasto $siafObjetosGasto): static
    {
        if ($this->SiafObjetosGasto->removeElement($siafObjetosGasto)) {
            // set the owning side to null (unless already changed)
            if ($siafObjetosGasto->getSiafEjercicios() === $this) {
                $siafObjetosGasto->setSiafEjercicios(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, SiafSectoresInstitucionales>
     */
    public function getSiafSectoresInstitucionales(): Collection
    {
        return $this->SiafSectoresInstitucionales;
    }

    public function addSiafSectoresInstitucionale(SiafSectoresInstitucionales $siafSectoresInstitucionale): static
    {
        if (!$this->SiafSectoresInstitucionales->contains($siafSectoresInstitucionale)) {
            $this->SiafSectoresInstitucionales->add($siafSectoresInstitucionale);
            $siafSectoresInstitucionale->setSiafEjercicios($this);
        }

        return $this;
    }

    public function removeSiafSectoresInstitucionale(SiafSectoresInstitucionales $siafSectoresInstitucionale): static
    {
        if ($this->SiafSectoresInstitucionales->removeElement($siafSectoresInstitucionale)) {
            // set the owning side to null (unless already changed)
            if ($siafSectoresInstitucionale->getSiafEjercicios() === $this) {
                $siafSectoresInstitucionale->setSiafEjercicios(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, SiafInstituciones>
     */
    public function getSiafInstituciones(): Collection
    {
        return $this->SiafInstituciones;
    }

    public function addSiafInstitucione(SiafInstituciones $siafInstitucione): static
    {
        if (!$this->SiafInstituciones->contains($siafInstitucione)) {
            $this->SiafInstituciones->add($siafInstitucione);
            $siafInstitucione->setSiafEjercicios($this);
        }

        return $this;
    }

    public function removeSiafInstitucione(SiafInstituciones $siafInstitucione): static
    {
        if ($this->SiafInstituciones->removeElement($siafInstitucione)) {
            // set the owning side to null (unless already changed)
            if ($siafInstitucione->getSiafEjercicios() === $this) {
                $siafInstitucione->setSiafEjercicios(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, SiafFuentesFinanciamiento>
     */
    public function getSiafFuentesFinanciamiento(): Collection
    {
        return $this->SiafFuentesFinanciamiento;
    }

    public function addSiafFuentesFinanciamiento(SiafFuentesFinanciamiento $siafFuentesFinanciamiento): static
    {
        if (!$this->SiafFuentesFinanciamiento->contains($siafFuentesFinanciamiento)) {
            $this->SiafFuentesFinanciamiento->add($siafFuentesFinanciamiento);
            $siafFuentesFinanciamiento->setSiafEjercicios($this);
        }

        return $this;
    }

    public function removeSiafFuentesFinanciamiento(SiafFuentesFinanciamiento $siafFuentesFinanciamiento): static
    {
        if ($this->SiafFuentesFinanciamiento->removeElement($siafFuentesFinanciamiento)) {
            // set the owning side to null (unless already changed)
            if ($siafFuentesFinanciamiento->getSiafEjercicios() === $this) {
                $siafFuentesFinanciamiento->setSiafEjercicios(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, SiafServicios>
     */
    public function getSiafServicios(): Collection
    {
        return $this->SiafServicios;
    }

    public function addSiafServicio(SiafServicios $siafServicio): static
    {
        if (!$this->SiafServicios->contains($siafServicio)) {
            $this->SiafServicios->add($siafServicio);
            $siafServicio->setSiafEjercicios($this);
        }

        return $this;
    }

    public function removeSiafServicio(SiafServicios $siafServicio): static
    {
        if ($this->SiafServicios->removeElement($siafServicio)) {
            // set the owning side to null (unless already changed)
            if ($siafServicio->getSiafEjercicios() === $this) {
                $siafServicio->setSiafEjercicios(null);
            }
        }

        return $this;
    }
}
