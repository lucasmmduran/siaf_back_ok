<?php

namespace App\Entity;

use App\Repository\SiafServiciosRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SiafServiciosRepository::class)]
class SiafServicios
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 10)]
    private ?string $codServicio = null;

    #[ORM\Column(length: 120, nullable: true)]
    private ?string $servicio = null;

    #[ORM\Column(length: 15)]
    private ?string $abrServicio = null;

    /**
     * @var Collection<int, SiafAperturasProgramaticas>
     */
    #[ORM\OneToMany(targetEntity: SiafAperturasProgramaticas::class, mappedBy: 'SiafServicios')]
    private Collection $siafAperturasProgramaticas;

    #[ORM\ManyToOne(inversedBy: 'SiafServicios')]
    #[ORM\JoinColumn(nullable: false)]
    private ?SiafEjercicios $siafEjercicios = null;

    /**
     * @var Collection<int, SiafUnidades>
     */
    #[ORM\OneToMany(targetEntity: SiafUnidades::class, mappedBy: 'SiafServicios')]
    private Collection $SiafUnidades;

    public function __construct()
    {
        $this->siafAperturasProgramaticas = new ArrayCollection();
        $this->SiafUnidades = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodServicio(): ?string
    {
        return $this->codServicio;
    }

    public function setCodServicio(string $codServicio): static
    {
        $this->codServicio = $codServicio;

        return $this;
    }

    public function getServicio(): ?string
    {
        return $this->servicio;
    }

    public function setServicio(?string $servicio): static
    {
        $this->servicio = $servicio;

        return $this;
    }

    public function getAbrServicio(): ?string
    {
        return $this->abrServicio;
    }

    public function setAbrServicio(string $abrServicio): static
    {
        $this->abrServicio = $abrServicio;

        return $this;
    }

    /**
     * @return Collection<int, SiafAperturasProgramaticas>
     */
    public function getSiafAperturasProgramaticas(): Collection
    {
        return $this->siafAperturasProgramaticas;
    }

    public function addSiafAperturasProgramatica(SiafAperturasProgramaticas $siafAperturasProgramatica): static
    {
        if (!$this->siafAperturasProgramaticas->contains($siafAperturasProgramatica)) {
            $this->siafAperturasProgramaticas->add($siafAperturasProgramatica);
            $siafAperturasProgramatica->setSiafServicios($this);
        }

        return $this;
    }

    public function removeSiafAperturasProgramatica(SiafAperturasProgramaticas $siafAperturasProgramatica): static
    {
        if ($this->siafAperturasProgramaticas->removeElement($siafAperturasProgramatica)) {
            // set the owning side to null (unless already changed)
            if ($siafAperturasProgramatica->getSiafServicios() === $this) {
                $siafAperturasProgramatica->setSiafServicios(null);
            }
        }

        return $this;
    }

    public function getSiafEjercicios(): ?SiafEjercicios
    {
        return $this->siafEjercicios;
    }

    public function setSiafEjercicios(?SiafEjercicios $siafEjercicios): static
    {
        $this->siafEjercicios = $siafEjercicios;

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
            $siaUnidade->setSiafServicios($this);
        }

        return $this;
    }

    public function removeSiaUnidade(SiafUnidades $siaUnidade): static
    {
        if ($this->SiafUnidades->removeElement($siaUnidade)) {
            // set the owning side to null (unless already changed)
            if ($siaUnidade->getSiafServicios() === $this) {
                $siaUnidade->setSiafServicios(null);
            }
        }

        return $this;
    }
}
