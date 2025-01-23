<?php

namespace App\Entity;

use App\Repository\SiafOrganigramaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SiafOrganigramaRepository::class)]
class SiafOrganigrama
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 10)]
    private ?string $codUnidadOrganizacional = null;

    #[ORM\Column(length: 45)]
    private ?string $unidadOrganizacional = null;

    #[ORM\Column(length: 15)]
    private ?string $abrUnidadOrganizacional = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $fechaVigenciaDesde = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $fechaVigenciaHasta = null;

    /**
     * @var Collection<int, SiafUnidades>
     */
    #[ORM\OneToMany(targetEntity: SiafUnidades::class, mappedBy: 'siafOrganigrama')]
    private Collection $SiafUnidades;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'siafOrganigramas')]
    private ?self $idPadre = null;

    /**
     * @var Collection<int, self>
     */
    #[ORM\OneToMany(targetEntity: self::class, mappedBy: 'idPadre')]
    private Collection $siafOrganigramas;

    public function __construct()
    {
        $this->SiafUnidades = new ArrayCollection();
        $this->siafOrganigramas = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodUnidadOrganizacional(): ?string
    {
        return $this->codUnidadOrganizacional;
    }

    public function setCodUnidadOrganizacional(string $codUnidadOrganizacional): static
    {
        $this->codUnidadOrganizacional = $codUnidadOrganizacional;

        return $this;
    }

    public function getUnidadOrganizacional(): ?string
    {
        return $this->unidadOrganizacional;
    }

    public function setUnidadOrganizacional(string $unidadOrganizacional): static
    {
        $this->unidadOrganizacional = $unidadOrganizacional;

        return $this;
    }

    public function getAbrUnidadOrganizacional(): ?string
    {
        return $this->abrUnidadOrganizacional;
    }

    public function setAbrUnidadOrganizacional(string $abrUnidadOrganizacional): static
    {
        $this->abrUnidadOrganizacional = $abrUnidadOrganizacional;

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
     * @return Collection<int, SiafUnidades>
     */
    public function getSiafUnidades(): Collection
    {
        return $this->SiafUnidades;
    }

    public function addSiaUnidade(SiafUnidades $siaUnidade): static
    {
        if (!$this->SiafUnidades->contains($siaUnidade)) {
            $this->SiafUnidades->add($siaUnidade);
            $siaUnidade->setSiafOrganigrama($this);
        }

        return $this;
    }

    public function removeSiaUnidade(SiafUnidades $siaUnidade): static
    {
        if ($this->SiafUnidades->removeElement($siaUnidade)) {
            // set the owning side to null (unless already changed)
            if ($siaUnidade->getSiafOrganigrama() === $this) {
                $siaUnidade->setSiafOrganigrama(null);
            }
        }

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
    public function getSiafOrganigramas(): Collection
    {
        return $this->siafOrganigramas;
    }

    public function addSiafOrganigrama(self $siafOrganigrama): static
    {
        if (!$this->siafOrganigramas->contains($siafOrganigrama)) {
            $this->siafOrganigramas->add($siafOrganigrama);
            $siafOrganigrama->setIdPadre($this);
        }

        return $this;
    }

    public function removeSiafOrganigrama(self $siafOrganigrama): static
    {
        if ($this->siafOrganigramas->removeElement($siafOrganigrama)) {
            // set the owning side to null (unless already changed)
            if ($siafOrganigrama->getIdPadre() === $this) {
                $siafOrganigrama->setIdPadre(null);
            }
        }

        return $this;
    }
}
