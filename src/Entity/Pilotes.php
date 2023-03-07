<?php

namespace App\Entity;

use App\Entity\Cars;
use App\Repository\PilotesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PilotesRepository::class)]
class Pilotes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn]
    private ?cars $cars = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $nickname = null;

    #[ORM\Column(length: 255)]
    private ?string $nationality = null;

    #[ORM\Column]
    private ?int $furious_skill = null;

    #[ORM\Column]
    private ?int $budget = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $roles = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $password = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCars(): ?cars
    {
        return $this->cars;
    }

    public function setCars(cars $cars): self
    {
        $this->cars = $cars;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getNickname(): ?string
    {
        return $this->nickname;
    }

    public function setNickname(string $nickname): self
    {
        $this->nickname = $nickname;

        return $this;
    }

    public function getNationality(): ?string
    {
        return $this->nationality;
    }

    public function setNationality(string $nationality): self
    {
        $this->nationality = $nationality;

        return $this;
    }

    public function getFuriousSkill(): ?int
    {
        return $this->furious_skill;
    }

    public function setFuriousSkill(int $furious_skill): self
    {
        $this->furious_skill = $furious_skill;

        return $this;
    }

    public function getBudget(): ?int
    {
        return $this->budget;
    }

    public function setBudget(int $budget): self
    {
        $this->budget = $budget;

        return $this;
    }

    public function __toString()
    {
        return  $this->cars. ' '.$this->budget;
    }

    public function getRoles(): ?string
    {
        return $this->roles;
    }

    public function setRoles(?string $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): self
    {
        $this->password = $password;

        return $this;
    }
}
