<?php

namespace App\Entity;

use App\Repository\SiafObjetosGastoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SiafObjetosGastoRepository::class)]
class SiafObjetosGasto
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 45, nullable: false)]
    private ?string $abrObjetoGasto = null;

    #[ORM\Column]
    private ?int $nivel = null;

    #[ORM\Column(type: Types::ARRAY, nullable: true)]
    private ?array $tipo = null;

    /**
     * @var Collection<int, PlaConfPlanObjetosGasto>
     */
    #[ORM\OneToMany(targetEntity: PlaConfPlanObjetosGasto::class, mappedBy: 'SiafObjetosGasto')]
    private Collection $plaConfPlanObjetosGastos;

    /**
     * @var Collection<int, PlaConfPlanObjetosGastoRes>
     */
    #[ORM\OneToMany(targetEntity: PlaConfPlanObjetosGastoRes::class, mappedBy: 'SiafObjetosGasto')]
    private Collection $plaConfPlanObjetosGastoRes;

    /**
     * @var Collection<int, PlaPlanesPartidas>
     */
    #[ORM\OneToMany(targetEntity: PlaPlanesPartidas::class, mappedBy: 'SiafObjetosGasto')]
    private Collection $plaPlanesPartidas;

    #[ORM\ManyToOne(inversedBy: 'SiafObjetosGasto')]
    #[ORM\JoinColumn(nullable: false)]
    private ?SiafEjercicios $siafEjercicios = null;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'siafObjetosGastos')]
    private ?self $idPadre = null;

    /**
     * @var Collection<int, self>
     */
    #[ORM\OneToMany(targetEntity: self::class, mappedBy: 'idPadre')]
    private Collection $siafObjetosGastos;

    #[ORM\Column(length: 80)]
    private ?string $objetoGasto = null;

    #[ORM\Column(length: 9)]
    private ?string $codObjetoGasto = null;

    public function __construct()
    {
        $this->plaConfPlanObjetosGastos = new ArrayCollection();
        $this->plaConfPlanObjetosGastoRes = new ArrayCollection();
        $this->plaPlanesPartidas = new ArrayCollection();
        $this->siafObjetosGastos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAbrObjetoGasto(): ?string
    {
        return $this->abrObjetoGasto;
    }

    public function setAbrObjetoGasto(?string $abrObjetoGasto): static
    {
        $this->abrObjetoGasto = $abrObjetoGasto;

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

    public function getTipo(): ?array
    {
        return $this->tipo;
    }

    public function setTipo(?array $tipo): static
    {
        $this->tipo = $tipo;

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
            $plaConfPlanObjetosGasto->setSiafObjetosGasto($this);
        }

        return $this;
    }

    public function removePlaConfPlanObjetosGasto(PlaConfPlanObjetosGasto $plaConfPlanObjetosGasto): static
    {
        if ($this->plaConfPlanObjetosGastos->removeElement($plaConfPlanObjetosGasto)) {
            // set the owning side to null (unless already changed)
            if ($plaConfPlanObjetosGasto->getSiafObjetosGasto() === $this) {
                $plaConfPlanObjetosGasto->setSiafObjetosGasto(null);
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
            $plaConfPlanObjetosGastoRe->setSiafObjetosGasto($this);
        }

        return $this;
    }

    public function removePlaConfPlanObjetosGastoRe(PlaConfPlanObjetosGastoRes $plaConfPlanObjetosGastoRe): static
    {
        if ($this->plaConfPlanObjetosGastoRes->removeElement($plaConfPlanObjetosGastoRe)) {
            // set the owning side to null (unless already changed)
            if ($plaConfPlanObjetosGastoRe->getSiafObjetosGasto() === $this) {
                $plaConfPlanObjetosGastoRe->setSiafObjetosGasto(null);
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
            $plaPlanesPartida->setSiafObjetosGasto($this);
        }

        return $this;
    }

    public function removePlaPlanesPartida(PlaPlanesPartidas $plaPlanesPartida): static
    {
        if ($this->plaPlanesPartidas->removeElement($plaPlanesPartida)) {
            // set the owning side to null (unless already changed)
            if ($plaPlanesPartida->getSiafObjetosGasto() === $this) {
                $plaPlanesPartida->setSiafObjetosGasto(null);
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
    public function getSiafObjetosGastos(): Collection
    {
        return $this->siafObjetosGastos;
    }

    public function addSiafObjetosGasto(self $siafObjetosGasto): static
    {
        if (!$this->siafObjetosGastos->contains($siafObjetosGasto)) {
            $this->siafObjetosGastos->add($siafObjetosGasto);
            $siafObjetosGasto->setIdPadre($this);
        }

        return $this;
    }

    public function removeSiafObjetosGasto(self $siafObjetosGasto): static
    {
        if ($this->siafObjetosGastos->removeElement($siafObjetosGasto)) {
            // set the owning side to null (unless already changed)
            if ($siafObjetosGasto->getIdPadre() === $this) {
                $siafObjetosGasto->setIdPadre(null);
            }
        }

        return $this;
    }

    public function getObjetoGasto(): ?string
    {
        return $this->objetoGasto;
    }

    public function setObjetoGasto(string $objetoGasto): static
    {
        $this->objetoGasto = $objetoGasto;

        return $this;
    }

    public function getCodObjetoGasto(): ?string
    {
        return $this->codObjetoGasto;
    }

    public function setCodObjetoGasto(string $codObjetoGasto): static
    {
        $this->codObjetoGasto = $codObjetoGasto;

        return $this;
    }
}
