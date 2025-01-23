<?php

namespace App\Entity;

use App\Repository\PersonaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PersonaRepository::class)]
class Persona
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 2)]
    private ?string $tipoPersona = null;

    #[ORM\Column(length: 3)]
    private ?string $tipoDocumento = null;

    #[ORM\Column(length: 15)]
    private ?string $nroDocumento = null;

    #[ORM\Column(length: 45)]
    private ?string $nombre = null;

    #[ORM\Column(length: 45)]
    private ?string $apellido = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTipoPersona(): ?string
    {
        return $this->tipoPersona;
    }

    public function setTipoPersona(string $tipoPersona): static
    {
        $this->tipoPersona = $tipoPersona;

        return $this;
    }

    public function getTipoDocumento(): ?string
    {
        return $this->tipoDocumento;
    }

    public function setTipoDocumento(string $tipoDocumento): static
    {
        $this->tipoDocumento = $tipoDocumento;

        return $this;
    }

    public function getNroDocumento(): ?string
    {
        return $this->nroDocumento;
    }

    public function setNroDocumento(string $nroDocumento): static
    {
        $this->nroDocumento = $nroDocumento;

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

    public function getApellido(): ?string
    {
        return $this->apellido;
    }

    public function setApellido(string $apellido): static
    {
        $this->apellido = $apellido;

        return $this;
    }
}
