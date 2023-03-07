<?php

namespace App\Entity;

use App\Entity\Pilotes;
use App\Repository\CarsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CarsRepository::class)]
class Cars
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn]
    private ?pilotes $pilotes = null;

    #[ORM\Column(length: 255)]
    private ?string $brand = null;

    #[ORM\Column(length: 255)]
    private ?string $model = null;

    #[ORM\Column]
    private ?int $horses_power = null;

    #[ORM\Column]
    private ?int $max_speed = null;

    #[ORM\Column]
    private ?int $price = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function getHorsesPower(): ?int
    {
        return $this->horses_power;
    }

    public function setHorsesPower(int $horses_power): self
    {
        $this->horses_power = $horses_power;

        return $this;
    }

    public function getPilotes(): ?pilotes
    {
        return $this->pilotes;
    }

    public function setPilotes(pilotes $pilotes): self
    {
        $this->pilotes = $pilotes;

        return $this;
    }

    public function getMaxSpeed(): ?int
    {
        return $this->max_speed;
    }

    public function setMaxSpeed(int $max_speed): self
    {
        $this->max_speed = $max_speed;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function __toString()
    {
        return  $this->brand . ' ' . $this->price;
    }
}
