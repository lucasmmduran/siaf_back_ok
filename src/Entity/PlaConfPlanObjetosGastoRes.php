<?php

namespace App\Entity;

use App\Repository\PlaConfPlanObjetosGastoResRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlaConfPlanObjetosGastoResRepository::class)]
class PlaConfPlanObjetosGastoRes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::ARRAY, nullable: false)]
    private ?array $nivelPlanificacion = null;

    #[ORM\Column(length: 120)]
    private ?string $listaObjetosGasto = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $fechaVigenciaDesde = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: false)]
    private ?\DateTimeInterface $fechaVigenciaHasta;

    #[ORM\ManyToOne(inversedBy: 'plaConfPlanObjetosGastoRes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?PlaConfTipoPlanes $PlaConfTipoPlanes;

    #[ORM\ManyToOne(inversedBy: 'plaConfPlanObjetosGastoRes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?SiafObjetosGasto $SiafObjetosGasto;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNivelPlanificacion(): ?array
    {
        return $this->nivelPlanificacion;
    }

    public function setNivelPlanificacion(?array $nivelPlanificacion): static
    {
        $this->nivelPlanificacion = $nivelPlanificacion;

        return $this;
    }

    public function getListaObjetosGasto(): ?string
    {
        return $this->listaObjetosGasto;
    }

    public function setListaObjetosGasto(string $listaObjetosGasto): static
    {
        $this->listaObjetosGasto = $listaObjetosGasto;

        return $this;
    }

    public function getFechaVigenciaDesde(): ?\DateTimeInterface
    {
        return $this->fechaVigenciaDesde;
    }

    public function setFechaVigenciaDesde(?\DateTimeInterface $fechaVigenciaDesde): static
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

    public function getPlaConfTipoPlanes(): ?PlaConfTipoPlanes
    {
        return $this->PlaConfTipoPlanes;
    }

    public function setPlaConfTipoPlanes(?PlaConfTipoPlanes $PlaConfTipoPlanes): static
    {
        $this->PlaConfTipoPlanes = $PlaConfTipoPlanes;

        return $this;
    }

    public function getSiafObjetosGasto(): ?SiafObjetosGasto
    {
        return $this->SiafObjetosGasto;
    }

    public function setSiafObjetosGasto(?SiafObjetosGasto $SiafObjetosGasto): static
    {
        $this->SiafObjetosGasto = $SiafObjetosGasto;

        return $this;
    }
}
