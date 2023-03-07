<?php

namespace App\Entity;

use App\Repository\HistoryRaceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HistoryRaceRepository::class)]
class HistoryRace
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private array $pilotesList = [];

    #[ORM\Column(nullable: true)]
    private array $carsList = [];

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $winner = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $circuit = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPilotesList(): array
    {
        return $this->pilotesList;
    }

    public function setPilotesList(?array $pilotesList): self
    {
        $this->pilotesList = $pilotesList;

        return $this;
    }

    public function getCarsList(): array
    {
        return $this->carsList;
    }

    public function setCarsList(?array $carsList): self
    {
        $this->carsList = $carsList;

        return $this;
    }

    public function getWinner(): ?string
    {
        return $this->winner;
    }

    public function setWinner(?string $winner): self
    {
        $this->winner = $winner;

        return $this;
    }

    public function getCircuit(): ?string
    {
        return $this->circuit;
    }

    public function setCircuit(?string $circuit): self
    {
        $this->circuit = $circuit;

        return $this;
    }
}
