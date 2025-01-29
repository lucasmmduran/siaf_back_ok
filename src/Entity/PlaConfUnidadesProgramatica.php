<?php

namespace App\Entity;

use App\Repository\PlaConfUnidadesProgramaticaRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlaConfUnidadesProgramaticaRepository::class)]
class PlaConfUnidadesProgramatica
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $fechaVigenciaDesde = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $fechaVigenciaHasta = null;

    #[ORM\ManyToOne(inversedBy: 'plaConfUnidadesProgramaticas')]
    #[ORM\JoinColumn(nullable: false)]
    private ?SiafUnidades $SiafUnidades = null;

    #[ORM\ManyToOne(inversedBy: 'plaConfUnidadesProgramaticas')]
    #[ORM\JoinColumn(nullable: false)]
    private ?SiafAperturasProgramaticas $SiafAperturasProgramaticas = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getSiafUnidades(): ?SiafUnidades
    {
        return $this->SiafUnidades;
    }

    public function setSiafUnidades(?SiafUnidades $SiafUnidades): static
    {
        $this->SiafUnidades = $SiafUnidades;

        return $this;
    }

    public function getSiafAperturasProgramaticas(): ?SiafAperturasProgramaticas
    {
        return $this->SiafAperturasProgramaticas;
    }

    public function setSiafAperturasProgramaticas(?SiafAperturasProgramaticas $SiafAperturasProgramaticas): static
    {
        $this->SiafAperturasProgramaticas = $SiafAperturasProgramaticas;

        return $this;
    }
}
