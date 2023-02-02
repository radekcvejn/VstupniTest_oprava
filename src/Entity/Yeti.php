<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\YetiRepository")
 */
class Yeti
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Assert\Length(min=3)
     */
    private $name;

    /**
     * @ORM\Column(type="float")
     * @Assert\NotBlank
     */
    private $height;

    /**
     * @ORM\Column(type="float")
     * @Assert\NotBlank
     */
    private $weight;

    /**
     * @ORM\Column(type="integer")
     */
    private $age;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private  $location;
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\YetiRating", mappedBy="yeti")
     */
    private $ratings;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $averageRating;


    public function getId(): ?int
    {
        return $this->id;
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

    public function getHeight(): ?float
    {
        return $this->height;
    }

    public function setHeight(float $height): self
    {
        $this->height = $height;

        return $this;
    }

    public function getWeight(): ?float
    {
        return $this->weight;
    }

    public function setWeight(float $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this -> location;
    }


    public function setLocation(string $location): self
    {
        $this->location = $location;
        return $this;
    }

    /**
     * @return Collection|YetiRating[]
     */
    public function getRatings(): Collection
    {
        return $this->ratings;
    }

    public function getAverageRating(): float
    {
        return $this->averageRating;
    }
}
