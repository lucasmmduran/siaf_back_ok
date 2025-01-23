<?php

namespace App\Entity;

use App\Repository\SiafFinalidadFuncionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SiafFinalidadFuncionRepository::class)]
class SiafFinalidadFuncion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 3)]
    private ?string $codFinalidadFuncion = null;

    #[ORM\Column(length: 80, nullable: true)]
    private ?string $funcional = null;

    #[ORM\Column]
    private ?int $nivel = null;

    /**
     * @var Collection<int, SiafAperturasProgramaticas>
     */
    #[ORM\OneToMany(targetEntity: SiafAperturasProgramaticas::class, mappedBy: 'SiafFinalidadFuncion')]
    private Collection $siafAperturasProgramaticas;

    #[ORM\ManyToOne(inversedBy: 'SiafFinalidadFuncion')]
    private ?SiafEjercicios $siafEjercicios = null;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'siafFinalidadFuncions')]
    private ?self $idPadre = null;

    /**
     * @var Collection<int, self>
     */
    #[ORM\OneToMany(targetEntity: self::class, mappedBy: 'idPadre')]
    private Collection $siafFinalidadFuncions;

    public function __construct()
    {
        $this->siafAperturasProgramaticas = new ArrayCollection();
        $this->siafFinalidadFuncions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodFinalidadFuncion(): ?string
    {
        return $this->codFinalidadFuncion;
    }

    public function setCodFinalidadFuncion(string $codFinalidadFuncion): static
    {
        $this->codFinalidadFuncion = $codFinalidadFuncion;

        return $this;
    }

    public function getFuncional(): ?string
    {
        return $this->funcional;
    }

    public function setFuncional(?string $funcional): static
    {
        $this->funcional = $funcional;

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
            $siafAperturasProgramatica->setSiafFinalidadFuncion($this);
        }

        return $this;
    }

    public function removeSiafAperturasProgramatica(SiafAperturasProgramaticas $siafAperturasProgramatica): static
    {
        if ($this->siafAperturasProgramaticas->removeElement($siafAperturasProgramatica)) {
            // set the owning side to null (unless already changed)
            if ($siafAperturasProgramatica->getSiafFinalidadFuncion() === $this) {
                $siafAperturasProgramatica->setSiafFinalidadFuncion(null);
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
    public function getSiafFinalidadFuncions(): Collection
    {
        return $this->siafFinalidadFuncions;
    }

    public function addSiafFinalidadFuncion(self $siafFinalidadFuncion): static
    {
        if (!$this->siafFinalidadFuncions->contains($siafFinalidadFuncion)) {
            $this->siafFinalidadFuncions->add($siafFinalidadFuncion);
            $siafFinalidadFuncion->setIdPadre($this);
        }

        return $this;
    }

    public function removeSiafFinalidadFuncion(self $siafFinalidadFuncion): static
    {
        if ($this->siafFinalidadFuncions->removeElement($siafFinalidadFuncion)) {
            // set the owning side to null (unless already changed)
            if ($siafFinalidadFuncion->getIdPadre() === $this) {
                $siafFinalidadFuncion->setIdPadre(null);
            }
        }

        return $this;
    }
}
