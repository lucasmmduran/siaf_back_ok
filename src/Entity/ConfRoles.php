<?php

namespace App\Entity;

use App\Repository\ConfRolesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConfRolesRepository::class)]
class ConfRoles
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $codRol = null;

    #[ORM\Column(length: 80)]
    private ?string $rol = null;

    #[ORM\Column(length: 250, nullable: true)]
    private ?string $descripcion = null;

    /**
     * @var Collection<int, WflTransicionEstados>
     */
    #[ORM\OneToMany(targetEntity: WflTransicionEstados::class, mappedBy: 'confRol')]
    private Collection $wflTransicionEstados;

    public function __construct()
    {
        $this->wflTransicionEstados = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodRol(): ?string
    {
        return $this->codRol;
    }

    public function setCodRol(string $codRol): static
    {
        $this->codRol = $codRol;

        return $this;
    }

    public function getRol(): ?string
    {
        return $this->rol;
    }

    public function setRol(string $rol): static
    {
        $this->rol = $rol;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(?string $descripcion): static
    {
        $this->descripcion = $descripcion;

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
            $wflTransicionEstado->setConfRol($this);
        }

        return $this;
    }

    public function removeWflTransicionEstado(WflTransicionEstados $wflTransicionEstado): static
    {
        if ($this->wflTransicionEstados->removeElement($wflTransicionEstado)) {
            // set the owning side to null (unless already changed)
            if ($wflTransicionEstado->getConfRol() === $this) {
                $wflTransicionEstado->setConfRol(null);
            }
        }

        return $this;
    }
}
