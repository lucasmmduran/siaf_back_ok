<?php

namespace App\Entity;

use App\Repository\SiafUnidadesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SiafUnidadesRepository::class)]
class SiafUnidades
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 10)]
    private ?string $codUnidad = null;

    #[ORM\Column(length: 45)]
    private ?string $unidad = null;

    #[ORM\Column(length: 15)]
    private ?string $abrUnidad = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $fechaVigenciaDesde = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $fechaVigenciaHasta = null;

    /**
     * @var Collection<int, PlaConfPlanUnidades>
     */
    #[ORM\OneToMany(targetEntity: PlaConfPlanUnidades::class, mappedBy: 'SiafUnidades')]
    private Collection $plaConfPlanUnidades;

    /**
     * @var Collection<int, PlaConfUnidadesProgramatica>
     */
    #[ORM\OneToMany(targetEntity: PlaConfUnidadesProgramatica::class, mappedBy: 'SiafUnidades')]
    private Collection $plaConfUnidadesProgramaticas;

    /**
     * @var Collection<int, PlaPlanesCabecera>
     */
    #[ORM\OneToMany(targetEntity: PlaPlanesCabecera::class, mappedBy: 'SiafUnidades')]
    private Collection $plaPlanesCabeceras;

    #[ORM\ManyToOne(inversedBy: 'SiafUnidades')]
    private ?SiafOrganigrama $siafOrganigrama = null;

    #[ORM\ManyToOne(inversedBy: 'SiafUnidades')]
    private ?SiafServicios $SiafServicios = null;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'siafUnidades')]
    private ?self $idPadre = null;

    /**
     * @var Collection<int, self>
     */
    #[ORM\OneToMany(targetEntity: self::class, mappedBy: 'idPadre')]
    private Collection $siafUnidades;

    public function __construct()
    {
        $this->plaConfPlanUnidades = new ArrayCollection();
        $this->plaConfUnidadesProgramaticas = new ArrayCollection();
        $this->plaPlanesCabeceras = new ArrayCollection();
        $this->siafUnidades = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodUnidad(): ?string
    {
        return $this->codUnidad;
    }

    public function setCodUnidad(string $codUnidad): static
    {
        $this->codUnidad = $codUnidad;

        return $this;
    }

    public function getUnidad(): ?string
    {
        return $this->unidad;
    }

    public function setUnidad(string $unidad): static
    {
        $this->unidad = $unidad;

        return $this;
    }

    public function getAbrUnidad(): ?string
    {
        return $this->abrUnidad;
    }

    public function setAbrUnidad(string $abrUnidad): static
    {
        $this->abrUnidad = $abrUnidad;

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
            $plaConfPlanUnidade->setSiafUnidades($this);
        }

        return $this;
    }

    public function removePlaConfPlanUnidade(PlaConfPlanUnidades $plaConfPlanUnidade): static
    {
        if ($this->plaConfPlanUnidades->removeElement($plaConfPlanUnidade)) {
            // set the owning side to null (unless already changed)
            if ($plaConfPlanUnidade->getSiafUnidades() === $this) {
                $plaConfPlanUnidade->setSiafUnidades(null);
            }
        }

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
            $plaConfUnidadesProgramatica->setSiafUnidades($this);
        }

        return $this;
    }

    public function removePlaConfUnidadesProgramatica(PlaConfUnidadesProgramatica $plaConfUnidadesProgramatica): static
    {
        if ($this->plaConfUnidadesProgramaticas->removeElement($plaConfUnidadesProgramatica)) {
            // set the owning side to null (unless already changed)
            if ($plaConfUnidadesProgramatica->getSiafUnidades() === $this) {
                $plaConfUnidadesProgramatica->setSiafUnidades(null);
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
            $plaPlanesCabecera->setSiafUnidades($this);
        }

        return $this;
    }

    public function removePlaPlanesCabecera(PlaPlanesCabecera $plaPlanesCabecera): static
    {
        if ($this->plaPlanesCabeceras->removeElement($plaPlanesCabecera)) {
            // set the owning side to null (unless already changed)
            if ($plaPlanesCabecera->getSiafUnidades() === $this) {
                $plaPlanesCabecera->setSiafUnidades(null);
            }
        }

        return $this;
    }

    public function getSiafOrganigrama(): ?SiafOrganigrama
    {
        return $this->siafOrganigrama;
    }

    public function setSiafOrganigrama(?SiafOrganigrama $siafOrganigrama): static
    {
        $this->siafOrganigrama = $siafOrganigrama;

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
    public function getSiafUnidades(): Collection
    {
        return $this->siafUnidades;
    }

    public function addSiafUnidade(self $siafUnidade): static
    {
        if (!$this->siafUnidades->contains($siafUnidade)) {
            $this->siafUnidades->add($siafUnidade);
            $siafUnidade->setIdPadre($this);
        }

        return $this;
    }

    public function removeSiafUnidade(self $siafUnidade): static
    {
        if ($this->siafUnidades->removeElement($siafUnidade)) {
            // set the owning side to null (unless already changed)
            if ($siafUnidade->getIdPadre() === $this) {
                $siafUnidade->setIdPadre(null);
            }
        }

        return $this;
    }
}
