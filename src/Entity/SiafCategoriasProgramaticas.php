<?php

namespace App\Entity;

use App\Repository\SiafCategoriasProgramaticasRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SiafCategoriasProgramaticasRepository::class)]
class SiafCategoriasProgramaticas
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 3)]
    private ?string $CodCategoriaProgramatica = null;

    #[ORM\Column(length: 120)]
    private ?string $categoriaProgramatica = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $fechaVigenciaDesde = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $fechaVigenciaHasta = null;

    /**
     * @var Collection<int, SiafAperturasProgramaticas>
     */
    #[ORM\OneToMany(targetEntity: SiafAperturasProgramaticas::class, mappedBy: 'SiafCategoriasProgramaticas')]
    private Collection $siafAperturasProgramaticas;

    public function __construct()
    {
        $this->siafAperturasProgramaticas = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodCategoriaProgramatica(): ?string
    {
        return $this->CodCategoriaProgramatica;
    }

    public function setCodCategoriaProgramatica(string $CodCategoriaProgramatica): static
    {
        $this->CodCategoriaProgramatica = $CodCategoriaProgramatica;

        return $this;
    }

    public function getCategoriaProgramatica(): ?string
    {
        return $this->categoriaProgramatica;
    }

    public function setCategoriaProgramatica(string $categoriaProgramatica): static
    {
        $this->categoriaProgramatica = $categoriaProgramatica;

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
            $siafAperturasProgramatica->setSiafCategoriasProgramaticas($this);
        }

        return $this;
    }

    public function removeSiafAperturasProgramatica(SiafAperturasProgramaticas $siafAperturasProgramatica): static
    {
        if ($this->siafAperturasProgramaticas->removeElement($siafAperturasProgramatica)) {
            // set the owning side to null (unless already changed)
            if ($siafAperturasProgramatica->getSiafCategoriasProgramaticas() === $this) {
                $siafAperturasProgramatica->setSiafCategoriasProgramaticas(null);
            }
        }

        return $this;
    }
}
