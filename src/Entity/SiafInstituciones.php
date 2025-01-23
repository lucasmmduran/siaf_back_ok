<?php

namespace App\Entity;

use App\Repository\SiafInstitucionesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SiafInstitucionesRepository::class)]
class SiafInstituciones
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 9)]
    private ?string $codInstitucion = null;

    #[ORM\Column(length: 180)]
    private ?string $institucion = null;

    #[ORM\Column]
    private ?int $nivel = null;

    #[ORM\ManyToOne(inversedBy: 'SiafInstituciones')]
    private ?SiafEjercicios $siafEjercicios = null;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'siafInstituciones')]
    private ?self $idPadre = null;

    /**
     * @var Collection<int, self>
     */
    #[ORM\OneToMany(targetEntity: self::class, mappedBy: 'idPadre')]
    private Collection $siafInstituciones;

    public function __construct()
    {
        $this->siafInstituciones = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodInstitucion(): ?string
    {
        return $this->codInstitucion;
    }

    public function setCodInstitucion(string $codInstitucion): static
    {
        $this->codInstitucion = $codInstitucion;

        return $this;
    }

    public function getInstitucion(): ?string
    {
        return $this->institucion;
    }

    public function setInstitucion(string $institucion): static
    {
        $this->institucion = $institucion;

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
    public function getSiafInstituciones(): Collection
    {
        return $this->siafInstituciones;
    }

    public function addSiafInstitucione(self $siafInstitucione): static
    {
        if (!$this->siafInstituciones->contains($siafInstitucione)) {
            $this->siafInstituciones->add($siafInstitucione);
            $siafInstitucione->setIdPadre($this);
        }

        return $this;
    }

    public function removeSiafInstitucione(self $siafInstitucione): static
    {
        if ($this->siafInstituciones->removeElement($siafInstitucione)) {
            // set the owning side to null (unless already changed)
            if ($siafInstitucione->getIdPadre() === $this) {
                $siafInstitucione->setIdPadre(null);
            }
        }

        return $this;
    }
}
