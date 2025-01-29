<?php

namespace App\Entity;

use App\Repository\WflEstadosEntidadRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WflEstadosEntidadRepository::class)]
class WflEstadosEntidad
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $estado = null;

    #[ORM\Column(length: 200)]
    private ?string $descripcion = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $esFinal = null;

    #[ORM\ManyToOne(inversedBy: 'wflEstadosEntidads')]
    #[ORM\JoinColumn(nullable: false)]
    private ?ConfEntidades $confEntidad = null;

    /**
     * @var Collection<int, WflTransicionEstados>
     */
    #[ORM\OneToMany(targetEntity: WflTransicionEstados::class, mappedBy: 'wflEstadoInicial')]
    private Collection $wflTransicionEstados;

    public function __construct()
    {
        $this->wflTransicionEstados = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEstado(): ?string
    {
        return $this->estado;
    }

    public function setEstado(?string $estado): static
    {
        $this->estado = $estado;

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

    public function getEsFinal(): ?int
    {
        return $this->esFinal;
    }

    public function setEsFinal(int $esFinal): static
    {
        $this->esFinal = $esFinal;

        return $this;
    }

    public function getConfEntidad(): ?ConfEntidades
    {
        return $this->confEntidad;
    }

    public function setConfEntidad(?ConfEntidades $confEntidad): static
    {
        $this->confEntidad = $confEntidad;

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
            $wflTransicionEstado->setWflEstadoInicial($this);
        }

        return $this;
    }

    public function removeWflTransicionEstado(WflTransicionEstados $wflTransicionEstado): static
    {
        if ($this->wflTransicionEstados->removeElement($wflTransicionEstado)) {
            // set the owning side to null (unless already changed)
            if ($wflTransicionEstado->getWflEstadoInicial() === $this) {
                $wflTransicionEstado->setWflEstadoInicial(null);
            }
        }

        return $this;
    }
}
