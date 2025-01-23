<?php

namespace App\Entity;

use App\Repository\SiafMonedaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SiafMonedaRepository::class)]
class SiafMoneda
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 4)]
    private ?string $codMoneda = null;

    #[ORM\Column(length: 45)]
    private ?string $moneda = null;

    #[ORM\Column(length: 5)]
    private ?string $signo = null;

    /**
     * @var Collection<int, PlaPlanesProcesos>
     */
    #[ORM\OneToMany(targetEntity: PlaPlanesProcesos::class, mappedBy: 'SiafMoneda')]
    private Collection $plaPlanesProcesos;

    public function __construct()
    {
        $this->plaPlanesProcesos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodMoneda(): ?string
    {
        return $this->codMoneda;
    }

    public function setCodMoneda(string $codMoneda): static
    {
        $this->codMoneda = $codMoneda;

        return $this;
    }

    public function getMoneda(): ?string
    {
        return $this->moneda;
    }

    public function setMoneda(string $moneda): static
    {
        $this->moneda = $moneda;

        return $this;
    }

    public function getSigno(): ?string
    {
        return $this->signo;
    }

    public function setSigno(string $signo): static
    {
        $this->signo = $signo;

        return $this;
    }

    /**
     * @return Collection<int, PlaPlanesProcesos>
     */
    public function getPlaPlanesProcesos(): Collection
    {
        return $this->plaPlanesProcesos;
    }

    public function addPlaPlanesProceso(PlaPlanesProcesos $plaPlanesProceso): static
    {
        if (!$this->plaPlanesProcesos->contains($plaPlanesProceso)) {
            $this->plaPlanesProcesos->add($plaPlanesProceso);
            $plaPlanesProceso->setSiafMoneda($this);
        }

        return $this;
    }

    public function removePlaPlanesProceso(PlaPlanesProcesos $plaPlanesProceso): static
    {
        if ($this->plaPlanesProcesos->removeElement($plaPlanesProceso)) {
            // set the owning side to null (unless already changed)
            if ($plaPlanesProceso->getSiafMoneda() === $this) {
                $plaPlanesProceso->setSiafMoneda(null);
            }
        }

        return $this;
    }
}
