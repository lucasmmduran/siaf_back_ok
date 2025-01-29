<?php

namespace App\Entity;

use App\Repository\SiafTiposComprobantesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SiafTiposComprobantesRepository::class)]
class SiafTiposComprobantes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 5)]
    private ?string $codTipoComprobantes = null;

    #[ORM\Column(length: 45)]
    private ?string $tipoComporbante = null;

    #[ORM\Column(length: 180)]
    private ?string $descTipoComprobante = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $fechaVigenciaDesde = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $fechaVigenciaHasta = null;

    /**
     * @var Collection<int, SiafEstadosComprobantes>
     */
    #[ORM\OneToMany(targetEntity: SiafEstadosComprobantes::class, mappedBy: 'SiafTiposComprobantes')]
    private Collection $siafEstadosComprobantes;

    public function __construct()
    {
        $this->siafEstadosComprobantes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodTipoComprobantes(): ?string
    {
        return $this->codTipoComprobantes;
    }

    public function setCodTipoComprobantes(string $codTipoComprobantes): static
    {
        $this->codTipoComprobantes = $codTipoComprobantes;

        return $this;
    }

    public function getTipoComporbante(): ?string
    {
        return $this->tipoComporbante;
    }

    public function setTipoComporbante(string $tipoComporbante): static
    {
        $this->tipoComporbante = $tipoComporbante;

        return $this;
    }

    public function getDescTipoComprobante(): ?string
    {
        return $this->descTipoComprobante;
    }

    public function setDescTipoComprobante(string $descTipoComprobante): static
    {
        $this->descTipoComprobante = $descTipoComprobante;

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
     * @return Collection<int, SiafEstadosComprobantes>
     */
    public function getSiafEstadosComprobantes(): Collection
    {
        return $this->siafEstadosComprobantes;
    }

    public function addSiafEstadosComprobante(SiafEstadosComprobantes $siafEstadosComprobante): static
    {
        if (!$this->siafEstadosComprobantes->contains($siafEstadosComprobante)) {
            $this->siafEstadosComprobantes->add($siafEstadosComprobante);
            $siafEstadosComprobante->setSiafTiposComprobantes($this);
        }

        return $this;
    }

    public function removeSiafEstadosComprobante(SiafEstadosComprobantes $siafEstadosComprobante): static
    {
        if ($this->siafEstadosComprobantes->removeElement($siafEstadosComprobante)) {
            // set the owning side to null (unless already changed)
            if ($siafEstadosComprobante->getSiafTiposComprobantes() === $this) {
                $siafEstadosComprobante->setSiafTiposComprobantes(null);
            }
        }

        return $this;
    }
}
