<?php

namespace App\Entity;

use App\Repository\SiafFuentesFinanciamientoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SiafFuentesFinanciamientoRepository::class)]
class SiafFuentesFinanciamiento
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 2)]
    private ?string $codFuenteFinanciamiento = null;

    #[ORM\Column(length: 180)]
    private ?string $fuenteFinanciamiento = null;

    #[ORM\Column]
    private ?int $nivel = null;

    /**
     * @var Collection<int, PlaPlanesPartidas>
     */
    #[ORM\OneToMany(targetEntity: PlaPlanesPartidas::class, mappedBy: 'SiafFuentesFinanciamiento')]
    private Collection $plaPlanesPartidas;

    #[ORM\ManyToOne(inversedBy: 'SiafFuentesFinanciamiento')]
    #[ORM\JoinColumn(nullable: false)]
    private ?SiafEjercicios $siafEjercicios = null;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'siafFuentesFinanciamientos')]
    private ?self $idPadre = null;

    /**
     * @var Collection<int, self>
     */
    #[ORM\OneToMany(targetEntity: self::class, mappedBy: 'idPadre')]
    private Collection $siafFuentesFinanciamientos;

    public function __construct()
    {
        $this->plaPlanesPartidas = new ArrayCollection();
        $this->siafFuentesFinanciamientos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodFuenteFinanciamiento(): ?string
    {
        return $this->codFuenteFinanciamiento;
    }

    public function setCodFuenteFinanciamiento(string $codFuenteFinanciamiento): static
    {
        $this->codFuenteFinanciamiento = $codFuenteFinanciamiento;

        return $this;
    }

    public function getFuenteFinanciamiento(): ?string
    {
        return $this->fuenteFinanciamiento;
    }

    public function setFuenteFinanciamiento(string $fuenteFinanciamiento): static
    {
        $this->fuenteFinanciamiento = $fuenteFinanciamiento;

        return $this;
    }

    public function getNivel(): ?int
    {
        return $this->nivel;
    }

    public function setNivel(int $nivel): static
    {
        $this->nivel = $nivel;

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
            $plaPlanesPartida->setSiafFuentesFinanciamiento($this);
        }

        return $this;
    }

    public function removePlaPlanesPartida(PlaPlanesPartidas $plaPlanesPartida): static
    {
        if ($this->plaPlanesPartidas->removeElement($plaPlanesPartida)) {
            // set the owning side to null (unless already changed)
            if ($plaPlanesPartida->getSiafFuentesFinanciamiento() === $this) {
                $plaPlanesPartida->setSiafFuentesFinanciamiento(null);
            }
        }

        return $this;
    }

    public function getSiafEjercicios(): ?SiafEjercicios
    {
        return $this->siafEjercicios;
    }

    public function setSiafEjercicios(?SiafEjercicios $siafEjercicios): static
    {
        $this->siafEjercicios = $siafEjercicios;

        return $this;
    }

    public function getIdPadre(): ?self
    {
        return $this->idPadre;
    }

    public function setIdPadre(?self $idPadre): static
    {
        $this->idPadre = $idPadre;

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getSiafFuentesFinanciamientos(): Collection
    {
        return $this->siafFuentesFinanciamientos;
    }

    public function addSiafFuentesFinanciamiento(self $siafFuentesFinanciamiento): static
    {
        if (!$this->siafFuentesFinanciamientos->contains($siafFuentesFinanciamiento)) {
            $this->siafFuentesFinanciamientos->add($siafFuentesFinanciamiento);
            $siafFuentesFinanciamiento->setIdPadre($this);
        }

        return $this;
    }

    public function removeSiafFuentesFinanciamiento(self $siafFuentesFinanciamiento): static
    {
        if ($this->siafFuentesFinanciamientos->removeElement($siafFuentesFinanciamiento)) {
            // set the owning side to null (unless already changed)
            if ($siafFuentesFinanciamiento->getIdPadre() === $this) {
                $siafFuentesFinanciamiento->setIdPadre(null);
            }
        }

        return $this;
    }
}
