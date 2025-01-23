<?php

namespace App\Entity;

use App\Repository\SiafSectoresInstitucionalesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SiafSectoresInstitucionalesRepository::class)]
class SiafSectoresInstitucionales
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $codSectorInstitucional = null;

    #[ORM\Column(length: 180, nullable: true)]
    private ?string $sectorInstitucional = null;

    #[ORM\Column(nullable: true)]
    private ?int $nivel = null;

    #[ORM\ManyToOne(inversedBy: 'SiafSectoresInstitucionales')]
    private ?SiafEjercicios $siafEjercicios = null;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'siafSectoresInstitucionales')]
    private ?self $idPadre = null;

    /**
     * @var Collection<int, self>
     */
    #[ORM\OneToMany(targetEntity: self::class, mappedBy: 'idPadre')]
    private Collection $siafSectoresInstitucionales;

    public function __construct()
    {
        $this->siafSectoresInstitucionales = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodSectorInstitucional(): ?string
    {
        return $this->codSectorInstitucional;
    }

    public function setCodSectorInstitucional(?string $codSectorInstitucional): static
    {
        $this->codSectorInstitucional = $codSectorInstitucional;

        return $this;
    }

    public function getSectorInstitucional(): ?string
    {
        return $this->sectorInstitucional;
    }

    public function setSectorInstitucional(?string $sectorInstitucional): static
    {
        $this->sectorInstitucional = $sectorInstitucional;

        return $this;
    }

    public function getNivel(): ?int
    {
        return $this->nivel;
    }

    public function setNivel(?int $nivel): static
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
    public function getSiafSectoresInstitucionales(): Collection
    {
        return $this->siafSectoresInstitucionales;
    }

    public function addSiafSectoresInstitucionale(self $siafSectoresInstitucionale): static
    {
        if (!$this->siafSectoresInstitucionales->contains($siafSectoresInstitucionale)) {
            $this->siafSectoresInstitucionales->add($siafSectoresInstitucionale);
            $siafSectoresInstitucionale->setIdPadre($this);
        }

        return $this;
    }

    public function removeSiafSectoresInstitucionale(self $siafSectoresInstitucionale): static
    {
        if ($this->siafSectoresInstitucionales->removeElement($siafSectoresInstitucionale)) {
            // set the owning side to null (unless already changed)
            if ($siafSectoresInstitucionale->getIdPadre() === $this) {
                $siafSectoresInstitucionale->setIdPadre(null);
            }
        }

        return $this;
    }
}
