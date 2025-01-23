<?php

namespace App\Entity;

use App\Repository\PlaPlanesPartidasRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlaPlanesPartidasRepository::class)]
class PlaPlanesPartidas
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 18, scale: 2)]
    private ?string $compromisoMes1 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 18, scale: 2)]
    private ?string $compromisoOrigMes1 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 18, scale: 2)]
    private ?string $importeNoProgramadoOrig = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 18, scale: 2)]
    private ?string $importeNoProgramado = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 18, scale: 2)]
    private ?string $compromisoMes2 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 18, scale: 2)]
    private ?string $compromisoOrigMes2 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 18, scale: 2)]
    private ?string $compromisoMes3 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 18, scale: 2)]
    private ?string $compromisoOrigMes3 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 18, scale: 2)]
    private ?string $compromisoMes4 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 18, scale: 2)]
    private ?string $compromisoOrigMes4 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 18, scale: 2)]
    private ?string $compromisoMes5 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 18, scale: 2)]
    private ?string $compromisoOrigMes5 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 18, scale: 2)]
    private ?string $compromisoMes6 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 18, scale: 2)]
    private ?string $compromisoOrigMes6 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 18, scale: 2)]
    private ?string $compromisoMes7 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 18, scale: 2)]
    private ?string $compromisoOrigMes7 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 18, scale: 2)]
    private ?string $compromisoMes8 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 18, scale: 2)]
    private ?string $compromisoOrigMes8 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 18, scale: 2)]
    private ?string $compromisoMes9 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 18, scale: 2)]
    private ?string $compromisoOrigMes9 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 18, scale: 2)]
    private ?string $compromisoMes10 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 18, scale: 2)]
    private ?string $compromisoOrigMes10 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 18, scale: 2)]
    private ?string $compromisoMes11 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 18, scale: 2)]
    private ?string $compromisoOrigMes11 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 18, scale: 2)]
    private ?string $compromisoMes12 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 18, scale: 2)]
    private ?string $compromisoOrigMes12 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 18, scale: 2)]
    private ?string $devengadoMes1 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 18, scale: 2)]
    private ?string $devengadoOrigMes1 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 18, scale: 2)]
    private ?string $devengadoMes2 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 18, scale: 2)]
    private ?string $devengadoOrigMes2 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 18, scale: 2)]
    private ?string $devengadoMes3 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 18, scale: 2)]
    private ?string $devengadoOrigMes3 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 18, scale: 2)]
    private ?string $devengadoMes4 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 18, scale: 2)]
    private ?string $devengadoOrigMes4 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 18, scale: 2)]
    private ?string $devengadoMes5 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 18, scale: 2)]
    private ?string $devengadoOrigMes5 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 18, scale: 2)]
    private ?string $devengadoMes6 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 18, scale: 2)]
    private ?string $devengadoOrigMes6 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 18, scale: 2)]
    private ?string $devengadoMes7 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 18, scale: 2)]
    private ?string $devengadoOrigMe7 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 18, scale: 2)]
    private ?string $devengadoMes8 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 18, scale: 2)]
    private ?string $devengadoOrigMe8 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 18, scale: 2)]
    private ?string $devengadoMes9 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 18, scale: 2)]
    private ?string $devengadoOrigMe9 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 18, scale: 2)]
    private ?string $devengadoMes10 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 18, scale: 2)]
    private ?string $devengadoOrigMe10 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 18, scale: 2)]
    private ?string $devengadoMes11 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 18, scale: 2)]
    private ?string $devengadoOrigMe11 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 18, scale: 2)]
    private ?string $devengadoMes12 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 18, scale: 2)]
    private ?string $devengadoOrigMe12 = null;

    #[ORM\Column(nullable: true)]
    private ?int $subClase = null;

    #[ORM\ManyToOne(inversedBy: 'PlaPlanesPartidas')]
    private ?PlaPlanesProcesos $plaPlanesProcesos = null;

    #[ORM\ManyToOne(inversedBy: 'plaPlanesPartidas')]
    private ?SiafFuentesFinanciamiento $SiafFuentesFinanciamiento = null;

    #[ORM\ManyToOne(inversedBy: 'plaPlanesPartidas')]
    private ?SiafAperturasProgramaticas $SiafAperturasProgramaticas = null;

    #[ORM\ManyToOne(inversedBy: 'plaPlanesPartidas')]
    private ?SiafObjetosGasto $SiafObjetosGasto = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCompromisoMes1(): ?string
    {
        return $this->compromisoMes1;
    }

    public function setCompromisoMes1(string $compromisoMes1): static
    {
        $this->compromisoMes1 = $compromisoMes1;

        return $this;
    }

    public function getCompromisoOrigMes1(): ?string
    {
        return $this->compromisoOrigMes1;
    }

    public function setCompromisoOrigMes1(string $compromisoOrigMes1): static
    {
        $this->compromisoOrigMes1 = $compromisoOrigMes1;

        return $this;
    }

    public function getImporteNoProgramadoOrig(): ?string
    {
        return $this->importeNoProgramadoOrig;
    }

    public function setImporteNoProgramadoOrig(string $importeNoProgramadoOrig): static
    {
        $this->importeNoProgramadoOrig = $importeNoProgramadoOrig;

        return $this;
    }

    public function getImporteNoProgramado(): ?string
    {
        return $this->importeNoProgramado;
    }

    public function setImporteNoProgramado(string $importeNoProgramado): static
    {
        $this->importeNoProgramado = $importeNoProgramado;

        return $this;
    }

    public function getCompromisoMes2(): ?string
    {
        return $this->compromisoMes2;
    }

    public function setCompromisoMes2(string $compromisoMes2): static
    {
        $this->compromisoMes2 = $compromisoMes2;

        return $this;
    }

    public function getCompromisoOrigMes2(): ?string
    {
        return $this->compromisoOrigMes2;
    }

    public function setCompromisoOrigMes2(string $compromisoOrigMes2): static
    {
        $this->compromisoOrigMes2 = $compromisoOrigMes2;

        return $this;
    }

    public function getCompromisoMes3(): ?string
    {
        return $this->compromisoMes3;
    }

    public function setCompromisoMes3(string $compromisoMes3): static
    {
        $this->compromisoMes3 = $compromisoMes3;

        return $this;
    }

    public function getCompromisoOrigMes3(): ?string
    {
        return $this->compromisoOrigMes3;
    }

    public function setCompromisoOrigMes3(string $compromisoOrigMes3): static
    {
        $this->compromisoOrigMes3 = $compromisoOrigMes3;

        return $this;
    }

    public function getCompromisoMes4(): ?string
    {
        return $this->compromisoMes4;
    }

    public function setCompromisoMes4(string $compromisoMes4): static
    {
        $this->compromisoMes4 = $compromisoMes4;

        return $this;
    }

    public function getCompromisoOrigMes4(): ?string
    {
        return $this->compromisoOrigMes4;
    }

    public function setCompromisoOrigMes4(string $compromisoOrigMes4): static
    {
        $this->compromisoOrigMes4 = $compromisoOrigMes4;

        return $this;
    }

    public function getCompromisoMes5(): ?string
    {
        return $this->compromisoMes5;
    }

    public function setCompromisoMes5(string $compromisoMes5): static
    {
        $this->compromisoMes5 = $compromisoMes5;

        return $this;
    }

    public function getCompromisoOrigMes5(): ?string
    {
        return $this->compromisoOrigMes5;
    }

    public function setCompromisoOrigMes5(string $compromisoOrigMes5): static
    {
        $this->compromisoOrigMes5 = $compromisoOrigMes5;

        return $this;
    }

    public function getCompromisoMes6(): ?string
    {
        return $this->compromisoMes6;
    }

    public function setCompromisoMes6(string $compromisoMes6): static
    {
        $this->compromisoMes6 = $compromisoMes6;

        return $this;
    }

    public function getCompromisoOrigMes6(): ?string
    {
        return $this->compromisoOrigMes6;
    }

    public function setCompromisoOrigMes6(string $compromisoOrigMes6): static
    {
        $this->compromisoOrigMes6 = $compromisoOrigMes6;

        return $this;
    }

    public function getCompromisoMes7(): ?string
    {
        return $this->compromisoMes7;
    }

    public function setCompromisoMes7(string $compromisoMes7): static
    {
        $this->compromisoMes7 = $compromisoMes7;

        return $this;
    }

    public function getCompromisoOrigMes7(): ?string
    {
        return $this->compromisoOrigMes7;
    }

    public function setCompromisoOrigMes7(string $compromisoOrigMes7): static
    {
        $this->compromisoOrigMes7 = $compromisoOrigMes7;

        return $this;
    }

    public function getCompromisoMes8(): ?string
    {
        return $this->compromisoMes8;
    }

    public function setCompromisoMes8(string $compromisoMes8): static
    {
        $this->compromisoMes8 = $compromisoMes8;

        return $this;
    }

    public function getCompromisoOrigMes8(): ?string
    {
        return $this->compromisoOrigMes8;
    }

    public function setCompromisoOrigMes8(string $compromisoOrigMes8): static
    {
        $this->compromisoOrigMes8 = $compromisoOrigMes8;

        return $this;
    }

    public function getCompromisoMes9(): ?string
    {
        return $this->compromisoMes9;
    }

    public function setCompromisoMes9(string $compromisoMes9): static
    {
        $this->compromisoMes9 = $compromisoMes9;

        return $this;
    }

    public function getCompromisoOrigMes9(): ?string
    {
        return $this->compromisoOrigMes9;
    }

    public function setCompromisoOrigMes9(string $compromisoOrigMes9): static
    {
        $this->compromisoOrigMes9 = $compromisoOrigMes9;

        return $this;
    }

    public function getCompromisoMes10(): ?string
    {
        return $this->compromisoMes10;
    }

    public function setCompromisoMes10(string $compromisoMes10): static
    {
        $this->compromisoMes10 = $compromisoMes10;

        return $this;
    }

    public function getCompromisoOrigMes10(): ?string
    {
        return $this->compromisoOrigMes10;
    }

    public function setCompromisoOrigMes10(string $compromisoOrigMes10): static
    {
        $this->compromisoOrigMes10 = $compromisoOrigMes10;

        return $this;
    }

    public function getCompromisoMes11(): ?string
    {
        return $this->compromisoMes11;
    }

    public function setCompromisoMes11(string $compromisoMes11): static
    {
        $this->compromisoMes11 = $compromisoMes11;

        return $this;
    }

    public function getCompromisoOrigMes11(): ?string
    {
        return $this->compromisoOrigMes11;
    }

    public function setCompromisoOrigMes11(string $compromisoOrigMes11): static
    {
        $this->compromisoOrigMes11 = $compromisoOrigMes11;

        return $this;
    }

    public function getCompromisoMes12(): ?string
    {
        return $this->compromisoMes12;
    }

    public function setCompromisoMes12(string $compromisoMes12): static
    {
        $this->compromisoMes12 = $compromisoMes12;

        return $this;
    }

    public function getCompromisoOrigMes12(): ?string
    {
        return $this->compromisoOrigMes12;
    }

    public function setCompromisoOrigMes12(string $compromisoOrigMes12): static
    {
        $this->compromisoOrigMes12 = $compromisoOrigMes12;

        return $this;
    }

    public function getDevengadoMes1(): ?string
    {
        return $this->devengadoMes1;
    }

    public function setDevengadoMes1(string $devengadoMes1): static
    {
        $this->devengadoMes1 = $devengadoMes1;

        return $this;
    }

    public function getDevengadoOrigMes1(): ?string
    {
        return $this->devengadoOrigMes1;
    }

    public function setDevengadoOrigMes1(string $devengadoOrigMes1): static
    {
        $this->devengadoOrigMes1 = $devengadoOrigMes1;

        return $this;
    }

    public function getDevengadoMes2(): ?string
    {
        return $this->devengadoMes2;
    }

    public function setDevengadoMes2(string $devengadoMes2): static
    {
        $this->devengadoMes2 = $devengadoMes2;

        return $this;
    }

    public function getDevengadoOrigMes2(): ?string
    {
        return $this->devengadoOrigMes2;
    }

    public function setDevengadoOrigMes2(string $devengadoOrigMes2): static
    {
        $this->devengadoOrigMes2 = $devengadoOrigMes2;

        return $this;
    }

    public function getDevengadoMes3(): ?string
    {
        return $this->devengadoMes3;
    }

    public function setDevengadoMes3(string $devengadoMes3): static
    {
        $this->devengadoMes3 = $devengadoMes3;

        return $this;
    }

    public function getDevengadoOrigMes3(): ?string
    {
        return $this->devengadoOrigMes3;
    }

    public function setDevengadoOrigMes3(string $devengadoOrigMes3): static
    {
        $this->devengadoOrigMes3 = $devengadoOrigMes3;

        return $this;
    }

    public function getDevengadoMes4(): ?string
    {
        return $this->devengadoMes4;
    }

    public function setDevengadoMes4(string $devengadoMes4): static
    {
        $this->devengadoMes4 = $devengadoMes4;

        return $this;
    }

    public function getDevengadoOrigMes4(): ?string
    {
        return $this->devengadoOrigMes4;
    }

    public function setDevengadoOrigMes4(string $devengadoOrigMes4): static
    {
        $this->devengadoOrigMes4 = $devengadoOrigMes4;

        return $this;
    }

    public function getDevengadoMes5(): ?string
    {
        return $this->devengadoMes5;
    }

    public function setDevengadoMes5(string $devengadoMes5): static
    {
        $this->devengadoMes5 = $devengadoMes5;

        return $this;
    }

    public function getDevengadoOrigMes5(): ?string
    {
        return $this->devengadoOrigMes5;
    }

    public function setDevengadoOrigMes5(string $devengadoOrigMes5): static
    {
        $this->devengadoOrigMes5 = $devengadoOrigMes5;

        return $this;
    }

    public function getDevengadoMes6(): ?string
    {
        return $this->devengadoMes6;
    }

    public function setDevengadoMes6(string $devengadoMes6): static
    {
        $this->devengadoMes6 = $devengadoMes6;

        return $this;
    }

    public function getDevengadoOrigMes6(): ?string
    {
        return $this->devengadoOrigMes6;
    }

    public function setDevengadoOrigMes6(string $devengadoOrigMes6): static
    {
        $this->devengadoOrigMes6 = $devengadoOrigMes6;

        return $this;
    }

    public function getDevengadoMes7(): ?string
    {
        return $this->devengadoMes7;
    }

    public function setDevengadoMes7(string $devengadoMes7): static
    {
        $this->devengadoMes7 = $devengadoMes7;

        return $this;
    }

    public function getDevengadoOrigMe7(): ?string
    {
        return $this->devengadoOrigMe7;
    }

    public function setDevengadoOrigMe7(string $devengadoOrigMe7): static
    {
        $this->devengadoOrigMe7 = $devengadoOrigMe7;

        return $this;
    }

    public function getDevengadoMes8(): ?string
    {
        return $this->devengadoMes8;
    }

    public function setDevengadoMes8(string $devengadoMes8): static
    {
        $this->devengadoMes8 = $devengadoMes8;

        return $this;
    }

    public function getDevengadoOrigMe8(): ?string
    {
        return $this->devengadoOrigMe8;
    }

    public function setDevengadoOrigMe8(string $devengadoOrigMe8): static
    {
        $this->devengadoOrigMe8 = $devengadoOrigMe8;

        return $this;
    }

    public function getDevengadoMes9(): ?string
    {
        return $this->devengadoMes9;
    }

    public function setDevengadoMes9(string $devengadoMes9): static
    {
        $this->devengadoMes9 = $devengadoMes9;

        return $this;
    }

    public function getDevengadoOrigMe9(): ?string
    {
        return $this->devengadoOrigMe9;
    }

    public function setDevengadoOrigMe9(string $devengadoOrigMe9): static
    {
        $this->devengadoOrigMe9 = $devengadoOrigMe9;

        return $this;
    }

    public function getDevengadoMes10(): ?string
    {
        return $this->devengadoMes10;
    }

    public function setDevengadoMes10(string $devengadoMes10): static
    {
        $this->devengadoMes10 = $devengadoMes10;

        return $this;
    }

    public function getDevengadoOrigMe10(): ?string
    {
        return $this->devengadoOrigMe10;
    }

    public function setDevengadoOrigMe10(string $devengadoOrigMe10): static
    {
        $this->devengadoOrigMe10 = $devengadoOrigMe10;

        return $this;
    }

    public function getDevengadoMes11(): ?string
    {
        return $this->devengadoMes11;
    }

    public function setDevengadoMes11(string $devengadoMes11): static
    {
        $this->devengadoMes11 = $devengadoMes11;

        return $this;
    }

    public function getDevengadoOrigMe11(): ?string
    {
        return $this->devengadoOrigMe11;
    }

    public function setDevengadoOrigMe11(string $devengadoOrigMe11): static
    {
        $this->devengadoOrigMe11 = $devengadoOrigMe11;

        return $this;
    }

    public function getDevengadoMes12(): ?string
    {
        return $this->devengadoMes12;
    }

    public function setDevengadoMes12(string $devengadoMes12): static
    {
        $this->devengadoMes12 = $devengadoMes12;

        return $this;
    }

    public function getDevengadoOrigMe12(): ?string
    {
        return $this->devengadoOrigMe12;
    }

    public function setDevengadoOrigMe12(string $devengadoOrigMe12): static
    {
        $this->devengadoOrigMe12 = $devengadoOrigMe12;

        return $this;
    }

    public function getSubClase(): ?int
    {
        return $this->subClase;
    }

    public function setSubClase(?int $subClase): static
    {
        $this->subClase = $subClase;

        return $this;
    }

    public function getPlaPlanesProcesos(): ?PlaPlanesProcesos
    {
        return $this->plaPlanesProcesos;
    }

    public function setPlaPlanesProcesos(?PlaPlanesProcesos $plaPlanesProcesos): static
    {
        $this->plaPlanesProcesos = $plaPlanesProcesos;

        return $this;
    }

    public function getSiafFuentesFinanciamiento(): ?SiafFuentesFinanciamiento
    {
        return $this->SiafFuentesFinanciamiento;
    }

    public function setSiafFuentesFinanciamiento(?SiafFuentesFinanciamiento $SiafFuentesFinanciamiento): static
    {
        $this->SiafFuentesFinanciamiento = $SiafFuentesFinanciamiento;

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
