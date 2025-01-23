<?php

namespace App\Entity;

use App\Repository\PlaPlanesProcesosRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlaPlanesProcesosRepository::class)]
class PlaPlanesProcesos
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $nroLinea = null;

    #[ORM\Column(length: 180)]
    private ?string $descripcion = null;

    #[ORM\Column(length: 60)]
    private ?string $nombre = null;

    #[ORM\Column(length: 45, nullable: true)]
    private ?string $identificacion = null;

    #[ORM\Column]
    private ?bool $esPlurianual = null;

    #[ORM\Column]
    private ?bool $esMonedaExtranjera = null;

    #[ORM\Column(nullable: true)]
    private ?bool $estaPresupuestado = null;

    #[ORM\Column(type: Types::ARRAY, nullable: true)]
    private ?array $tipoTasa = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 18, scale: 6, nullable: true)]
    private ?string $tasaConversion = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 18, scale: 2)]
    private ?string $importeTotal = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 18, scale: 2)]
    private ?string $importeTotalOrig = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 18, scale: 2)]
    private ?string $importeEjercicio = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 18, scale: 2)]
    private ?string $importeEjercicioOrig = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 18, scale: 2)]
    private ?string $importeAnteriorOrig = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 18, scale: 2)]
    private ?string $importeProximoEjercicioOrig = null;

    #[ORM\Column(length: 45)]
    private ?string $expedienteImpulso = null;

    #[ORM\Column(type: Types::ARRAY)]
    private array $tipoRegistro = [];

    #[ORM\Column(length: 45)]
    private ?string $referenciaLineaProceso = null;

    #[ORM\ManyToOne(inversedBy: 'planesProcesos')]
    private ?PlaPlanesCabecera $plaPlanesCabecera = null;

    /**
     * @var Collection<int, PlaPlanesPartidas>
     */
    #[ORM\OneToMany(targetEntity: PlaPlanesPartidas::class, mappedBy: 'plaPlanesProcesos')]
    private Collection $PlaPlanesPartidas;

    #[ORM\ManyToOne(inversedBy: 'PlaPlanesProcesos')]
    private ?PlaConfTipoPlanes $plaConfTipoPlanes = null;

    #[ORM\ManyToOne(inversedBy: 'plaPlanesProcesos')]
    private ?SiafMoneda $SiafMoneda = null;

    public function __construct()
    {
        $this->PlaPlanesPartidas = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNroLinea(): ?int
    {
        return $this->nroLinea;
    }

    public function setNroLinea(int $nroLinea): static
    {
        $this->nroLinea = $nroLinea;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): static
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): static
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getIdentificacion(): ?string
    {
        return $this->identificacion;
    }

    public function setIdentificacion(?string $identificacion): static
    {
        $this->identificacion = $identificacion;

        return $this;
    }

    public function isEsPlurianual(): ?bool
    {
        return $this->esPlurianual;
    }

    public function setEsPlurianual(bool $esPlurianual): static
    {
        $this->esPlurianual = $esPlurianual;

        return $this;
    }

    public function isEsMonedaExtranjera(): ?bool
    {
        return $this->esMonedaExtranjera;
    }

    public function setEsMonedaExtranjera(bool $esMonedaExtranjera): static
    {
        $this->esMonedaExtranjera = $esMonedaExtranjera;

        return $this;
    }

    public function isEstaPresupuestado(): ?bool
    {
        return $this->estaPresupuestado;
    }

    public function setEstaPresupuestado(?bool $estaPresupuestado): static
    {
        $this->estaPresupuestado = $estaPresupuestado;

        return $this;
    }

    public function getTipoTasa(): ?array
    {
        return $this->tipoTasa;
    }

    public function setTipoTasa(?array $tipoTasa): static
    {
        $this->tipoTasa = $tipoTasa;

        return $this;
    }

    public function getTasaConversion(): ?string
    {
        return $this->tasaConversion;
    }

    public function setTasaConversion(?string $tasaConversion): static
    {
        $this->tasaConversion = $tasaConversion;

        return $this;
    }

    public function getImporteTotal(): ?string
    {
        return $this->importeTotal;
    }

    public function setImporteTotal(string $importeTotal): static
    {
        $this->importeTotal = $importeTotal;

        return $this;
    }

    public function getImporteTotalOrig(): ?string
    {
        return $this->importeTotalOrig;
    }

    public function setImporteTotalOrig(string $importeTotalOrig): static
    {
        $this->importeTotalOrig = $importeTotalOrig;

        return $this;
    }

    public function getImporteEjercicio(): ?string
    {
        return $this->importeEjercicio;
    }

    public function setImporteEjercicio(string $importeEjercicio): static
    {
        $this->importeEjercicio = $importeEjercicio;

        return $this;
    }

    public function getImporteEjercicioOrig(): ?string
    {
        return $this->importeEjercicioOrig;
    }

    public function setImporteEjercicioOrig(string $importeEjercicioOrig): static
    {
        $this->importeEjercicioOrig = $importeEjercicioOrig;

        return $this;
    }

    public function getImporteAnteriorOrig(): ?string
    {
        return $this->importeAnteriorOrig;
    }

    public function setImporteAnteriorOrig(string $importeAnteriorOrig): static
    {
        $this->importeAnteriorOrig = $importeAnteriorOrig;

        return $this;
    }

    public function getImporteProximoEjercicioOrig(): ?string
    {
        return $this->importeProximoEjercicioOrig;
    }

    public function setImporteProximoEjercicioOrig(string $importeProximoEjercicioOrig): static
    {
        $this->importeProximoEjercicioOrig = $importeProximoEjercicioOrig;

        return $this;
    }

    public function getExpedienteImpulso(): ?string
    {
        return $this->expedienteImpulso;
    }

    public function setExpedienteImpulso(string $expedienteImpulso): static
    {
        $this->expedienteImpulso = $expedienteImpulso;

        return $this;
    }

    public function getTipoRegistro(): array
    {
        return $this->tipoRegistro;
    }

    public function setTipoRegistro(array $tipoRegistro): static
    {
        $this->tipoRegistro = $tipoRegistro;

        return $this;
    }

    public function getReferenciaLineaProceso(): ?string
    {
        return $this->referenciaLineaProceso;
    }

    public function setReferenciaLineaProceso(string $referenciaLineaProceso): static
    {
        $this->referenciaLineaProceso = $referenciaLineaProceso;

        return $this;
    }

    public function getPlaPlanesCabecera(): ?PlaPlanesCabecera
    {
        return $this->plaPlanesCabecera;
    }

    public function setPlaPlanesCabecera(?PlaPlanesCabecera $plaPlanesCabecera): static
    {
        $this->plaPlanesCabecera = $plaPlanesCabecera;

        return $this;
    }

    /**
     * @return Collection<int, PlaPlanesPartidas>
     */
    public function getPlaPlanesPartidas(): Collection
    {
        return $this->PlaPlanesPartidas;
    }

    public function addPlaPlanesPartida(PlaPlanesPartidas $plaPlanesPartida): static
    {
        if (!$this->PlaPlanesPartidas->contains($plaPlanesPartida)) {
            $this->PlaPlanesPartidas->add($plaPlanesPartida);
            $plaPlanesPartida->setPlaPlanesProcesos($this);
        }

        return $this;
    }

    public function removePlaPlanesPartida(PlaPlanesPartidas $plaPlanesPartida): static
    {
        if ($this->PlaPlanesPartidas->removeElement($plaPlanesPartida)) {
            // set the owning side to null (unless already changed)
            if ($plaPlanesPartida->getPlaPlanesProcesos() === $this) {
                $plaPlanesPartida->setPlaPlanesProcesos(null);
            }
        }

        return $this;
    }

    public function getPlaConfTipoPlanes(): ?PlaConfTipoPlanes
    {
        return $this->plaConfTipoPlanes;
    }

    public function setPlaConfTipoPlanes(?PlaConfTipoPlanes $plaConfTipoPlanes): static
    {
        $this->plaConfTipoPlanes = $plaConfTipoPlanes;

        return $this;
    }

    public function getSiafMoneda(): ?SiafMoneda
    {
        return $this->SiafMoneda;
    }

    public function setSiafMoneda(?SiafMoneda $SiafMoneda): static
    {
        $this->SiafMoneda = $SiafMoneda;

        return $this;
    }
}
