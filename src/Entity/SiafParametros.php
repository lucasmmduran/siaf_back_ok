<?php

namespace App\Entity;

use App\Repository\SiafParametrosRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SiafParametrosRepository::class)]
class SiafParametros
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 25)]
    private ?string $codParametro = null;

    #[ORM\Column(type: Types::ARRAY)]
    private array $tipoValor = [];

    #[ORM\Column(length: 45)]
    private ?string $parametro = null;

    #[ORM\Column(length: 45)]
    private ?string $usoParametro = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 24, scale: 6, nullable: true)]
    private ?string $valorNum = null;

    #[ORM\Column(length: 200, nullable: true)]
    private ?string $valorChar = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $valorFecha = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodParametro(): ?string
    {
        return $this->codParametro;
    }

    public function setCodParametro(string $codParametro): static
    {
        $this->codParametro = $codParametro;

        return $this;
    }

    public function getTipoValor(): array
    {
        return $this->tipoValor;
    }

    public function setTipoValor(array $tipoValor): static
    {
        $this->tipoValor = $tipoValor;

        return $this;
    }

    public function getParametro(): ?string
    {
        return $this->parametro;
    }

    public function setParametro(string $parametro): static
    {
        $this->parametro = $parametro;

        return $this;
    }

    public function getUsoParametro(): ?string
    {
        return $this->usoParametro;
    }

    public function setUsoParametro(string $usoParametro): static
    {
        $this->usoParametro = $usoParametro;

        return $this;
    }

    public function getValorNum(): ?string
    {
        return $this->valorNum;
    }

    public function setValorNum(?string $valorNum): static
    {
        $this->valorNum = $valorNum;

        return $this;
    }

    public function getValorChar(): ?string
    {
        return $this->valorChar;
    }

    public function setValorChar(?string $valorChar): static
    {
        $this->valorChar = $valorChar;

        return $this;
    }

    public function getValorFecha(): ?\DateTimeInterface
    {
        return $this->valorFecha;
    }

    public function setValorFecha(?\DateTimeInterface $valorFecha): static
    {
        $this->valorFecha = $valorFecha;

        return $this;
    }
}
