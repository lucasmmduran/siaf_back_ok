<?php

namespace App\Entity;

use App\Repository\SiafAperturasProgramaticasRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SiafAperturasProgramaticasRepository::class)]
class SiafAperturasProgramaticas
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 14)]
    private ?string $codAperturaProgramatica = null;

    /**
     * @var Collection<int, PlaConfUnidadesProgramatica>
     */
    #[ORM\OneToMany(targetEntity: PlaConfUnidadesProgramatica::class, mappedBy: 'SiafAperturasProgramaticas')]
    private Collection $plaConfUnidadesProgramaticas;

    /**
     * @var Collection<int, PlaPlanesCabecera>
     */
    #[ORM\OneToMany(targetEntity: PlaPlanesCabecera::class, mappedBy: 'SiafAperturasProgramaticas')]
    private Collection $plaPlanesCabeceras;

    /**
     * @var Collection<int, PlaPlanesPartidas>
     */
    #[ORM\OneToMany(targetEntity: PlaPlanesPartidas::class, mappedBy: 'SiafAperturasProgramaticas')]
    private Collection $plaPlanesPartidas;

    #[ORM\ManyToOne(inversedBy: 'siafAperturasProgramaticas')]
    private ?SiafFinalidadFuncion $SiafFinalidadFuncion = null;

    #[ORM\ManyToOne(inversedBy: 'siafAperturasProgramaticas')]
    #[ORM\JoinColumn(nullable: false)]
    private ?SiafServicios $SiafServicios;

    #[ORM\ManyToOne(inversedBy: 'siafAperturasProgramaticas')]
    #[ORM\JoinColumn(nullable: false)]
    private ?SiafEjercicios $SiafEjercicios;

    #[ORM\ManyToOne(inversedBy: 'siafAperturasProgramaticas')]
    private ?SiafCategoriasProgramaticas $SiafCategoriasProgramaticas = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $aperturaProgramatica = null;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'siafAperturasProgramaticas')]
    private ?self $siafAperturaProgramaticaPadre = null;

    /**
     * @var Collection<int, self>
     */
    #[ORM\OneToMany(targetEntity: self::class, mappedBy: 'siafAperturaProgramaticaPadre')]
    private Collection $siafAperturasProgramaticas;

    public function __construct()
    {
        $this->plaConfUnidadesProgramaticas = new ArrayCollection();
        $this->plaPlanesCabeceras = new ArrayCollection();
        $this->plaPlanesPartidas = new ArrayCollection();
        $this->siafAperturasProgramaticas = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodAperturaProgramatica(): ?string
    {
        return $this->codAperturaProgramatica;
    }

    public function setCodAperturaProgramatica(string $codAperturaProgramatica): static
    {
        $this->codAperturaProgramatica = $codAperturaProgramatica;

        return $this;
    }

    /**
     * @return Collection<int, PlaConfUnidadesProgramatica>
     */
    public function getPlaConfUnidadesProgramaticas(): Collection
    {
        return $this->plaConfUnidadesProgramaticas;
    }

    public function addPlaConfUnidadesProgramatica(PlaConfUnidadesProgramatica $plaConfUnidadesProgramatica): static
    {
        if (!$this->plaConfUnidadesProgramaticas->contains($plaConfUnidadesProgramatica)) {
            $this->plaConfUnidadesProgramaticas->add($plaConfUnidadesProgramatica);
            $plaConfUnidadesProgramatica->setSiafAperturasProgramaticas($this);
        }

        return $this;
    }

    public function removePlaConfUnidadesProgramatica(PlaConfUnidadesProgramatica $plaConfUnidadesProgramatica): static
    {
        if ($this->plaConfUnidadesProgramaticas->removeElement($plaConfUnidadesProgramatica)) {
            // set the owning side to null (unless already changed)
            if ($plaConfUnidadesProgramatica->getSiafAperturasProgramaticas() === $this) {
                $plaConfUnidadesProgramatica->setSiafAperturasProgramaticas(null);
            }
        }

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
            $plaPlanesCabecera->setSiafAperturasProgramaticas($this);
        }

        return $this;
    }

    public function removePlaPlanesCabecera(PlaPlanesCabecera $plaPlanesCabecera): static
    {
        if ($this->plaPlanesCabeceras->removeElement($plaPlanesCabecera)) {
            // set the owning side to null (unless already changed)
            if ($plaPlanesCabecera->getSiafAperturasProgramaticas() === $this) {
                $plaPlanesCabecera->setSiafAperturasProgramaticas(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, PlaPlanesPartidas>
     */
    public function getPlaPlanesPartidas(): Collection
    {
        return $this->plaPlanesPartidas;
    }

    public function addPlaPlanesPartida(PlaPlanesPartidas $plaPlanesPartida): static
    {
        if (!$this->plaPlanesPartidas->contains($plaPlanesPartida)) {
            $this->plaPlanesPartidas->add($plaPlanesPartida);
            $plaPlanesPartida->setSiafAperturasProgramaticas($this);
        }

        return $this;
    }

    public function removePlaPlanesPartida(PlaPlanesPartidas $plaPlanesPartida): static
    {
        if ($this->plaPlanesPartidas->removeElement($plaPlanesPartida)) {
            // set the owning side to null (unless already changed)
            if ($plaPlanesPartida->getSiafAperturasProgramaticas() === $this) {
                $plaPlanesPartida->setSiafAperturasProgramaticas(null);
            }
        }

        return $this;
    }

    public function getSiafFinalidadFuncion(): ?SiafFinalidadFuncion
    {
        return $this->SiafFinalidadFuncion;
    }

    public function setSiafFinalidadFuncion(?SiafFinalidadFuncion $SiafFinalidadFuncion): static
    {
        $this->SiafFinalidadFuncion = $SiafFinalidadFuncion;

        return $this;
    }

    public function getSiafServicios(): ?SiafServicios
    {
        return $this->SiafServicios;
    }

    public function setSiafServicios(?SiafServicios $SiafServicios): static
    {
        $this->SiafServicios = $SiafServicios;

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

    public function getSiafCategoriasProgramaticas(): ?SiafCategoriasProgramaticas
    {
        return $this->SiafCategoriasProgramaticas;
    }

    public function setSiafCategoriasProgramaticas(?SiafCategoriasProgramaticas $SiafCategoriasProgramaticas): static
    {
        $this->SiafCategoriasProgramaticas = $SiafCategoriasProgramaticas;

        return $this;
    }

    public function getAperturaProgramatica(): ?string
    {
        return $this->aperturaProgramatica;
    }

    public function setAperturaProgramatica(?string $aperturaProgramatica): static
    {
        $this->aperturaProgramatica = $aperturaProgramatica;

        return $this;
    }

    public function getSiafAperturaProgramaticaPadre(): ?self
    {
        return $this->siafAperturaProgramaticaPadre;
    }

    public function setSiafAperturaProgramaticaPadre(?self $siafAperturaProgramaticaPadre): static
    {
        $this->siafAperturaProgramaticaPadre = $siafAperturaProgramaticaPadre;

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getSiafAperturasProgramaticas(): Collection
    {
        return $this->siafAperturasProgramaticas;
    }

    public function addSiafAperturasProgramatica(self $siafAperturasProgramatica): static
    {
        if (!$this->siafAperturasProgramaticas->contains($siafAperturasProgramatica)) {
            $this->siafAperturasProgramaticas->add($siafAperturasProgramatica);
            $siafAperturasProgramatica->setSiafAperturaProgramaticaPadre($this);
        }

        return $this;
    }

    public function removeSiafAperturasProgramatica(self $siafAperturasProgramatica): static
    {
        if ($this->siafAperturasProgramaticas->removeElement($siafAperturasProgramatica)) {
            // set the owning side to null (unless already changed)
            if ($siafAperturasProgramatica->getSiafAperturaProgramaticaPadre() === $this) {
                $siafAperturasProgramatica->setSiafAperturaProgramaticaPadre(null);
            }
        }

        return $this;
    }
}
