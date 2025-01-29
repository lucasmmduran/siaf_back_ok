<?php

namespace App\Entity;

use App\Repository\ConfEntidadesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConfEntidadesRepository::class)]
class ConfEntidades
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $codEntidad = null;

    #[ORM\Column(length: 180)]
    private ?string $entidad = null;

    /**
     * @var Collection<int, WflEstadosEntidad>
     */
    #[ORM\OneToMany(targetEntity: WflEstadosEntidad::class, mappedBy: 'confEntidad')]
    private Collection $wflEstadosEntidads;

    /**
     * @var Collection<int, WflTransicionEstados>
     */
    #[ORM\OneToMany(targetEntity: WflTransicionEstados::class, mappedBy: 'confEntidad')]
    private Collection $wflTransicionEstados;

    public function __construct()
    {
        $this->wflEstadosEntidads = new ArrayCollection();
        $this->wflTransicionEstados = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodEntidad(): ?string
    {
        return $this->codEntidad;
    }

    public function setCodEntidad(string $codEntidad): static
    {
        $this->codEntidad = $codEntidad;

        return $this;
    }

    public function getEntidad(): ?string
    {
        return $this->entidad;
    }

    public function setEntidad(string $entidad): static
    {
        $this->entidad = $entidad;

        return $this;
    }

    /**
     * @return Collection<int, WflEstadosEntidad>
     */
    public function getWflEstadosEntidads(): Collection
    {
        return $this->wflEstadosEntidads;
    }

    public function addWflEstadosEntidad(WflEstadosEntidad $wflEstadosEntidad): static
    {
        if (!$this->wflEstadosEntidads->contains($wflEstadosEntidad)) {
            $this->wflEstadosEntidads->add($wflEstadosEntidad);
            $wflEstadosEntidad->setConfEntidad($this);
        }

        return $this;
    }

    public function removeWflEstadosEntidad(WflEstadosEntidad $wflEstadosEntidad): static
    {
        if ($this->wflEstadosEntidads->removeElement($wflEstadosEntidad)) {
            // set the owning side to null (unless already changed)
            if ($wflEstadosEntidad->getConfEntidad() === $this) {
                $wflEstadosEntidad->setConfEntidad(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, WflTransicionEstados>
     */
    public function getWflTransicionEstados(): Collection
    {
        return $this->wflTransicionEstados;
    }

    public function addWflTransicionEstado(WflTransicionEstados $wflTransicionEstado): static
    {
        if (!$this->wflTransicionEstados->contains($wflTransicionEstado)) {
            $this->wflTransicionEstados->add($wflTransicionEstado);
            $wflTransicionEstado->setConfEntidad($this);
        }

        return $this;
    }

    public function removeWflTransicionEstado(WflTransicionEstados $wflTransicionEstado): static
    {
        if ($this->wflTransicionEstados->removeElement($wflTransicionEstado)) {
            // set the owning side to null (unless already changed)
            if ($wflTransicionEstado->getConfEntidad() === $this) {
                $wflTransicionEstado->setConfEntidad(null);
            }
        }

        return $this;
    }
}
