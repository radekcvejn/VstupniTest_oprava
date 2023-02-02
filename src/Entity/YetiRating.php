<?php

namespace App\Entity;

use App\Entity\Yeti;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\YetiRatingRepository")
 */
class YetiRating
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var Yeti
     *
     * @ORM\ManyToOne(targetEntity="Yeti", inversedBy="ratings")
     * @ORM\JoinColumn(nullable=false)
     */
    private $yeti;

    /**
     * @ORM\Column(type="smallint")
     */
    private $value;

    /**
     * @var \DateTime
     *
     * @ORM\Column (name="rated_at", type="datetime")
     */
    private $ratedAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getYeti(): ?Yeti
    {
        return $this->yeti;
    }

    public function setYeti(Yeti $yeti): self
    {
        $this->yeti = $yeti;

        return $this;
    }

    public function getValue(): ?int
    {
        return $this->value;
    }

    public function setValue(int $value): self
    {
        $this->value = $value;

        return $this;
    }
    public function getRatedAt(): ?\DateTimeInterface
    {
        return $this ->ratedAt;
    }

    /**
     * @param \DateTime $ratedAt
     */
    public function setRatedAt(\DateTimeInterface $ratedAt): self
    {
        $this -> ratedAt = $ratedAt;
        return $this;
    }
}
