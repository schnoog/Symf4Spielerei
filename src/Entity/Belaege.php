<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BelaegeRepository")
 */
class Belaege
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $Belag;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Paesse", mappedBy="Belag")
     */
    private $passbelaege;

    public function __construct()
    {
        $this->passbelaege = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBelag(): ?string
    {
        return $this->Belag;
    }

    public function setBelag(string $Belag): self
    {
        $this->Belag = $Belag;

        return $this;
    }

    /**
     * @return Collection|Paesse[]
     */
    public function getPassbelaege(): Collection
    {
        return $this->passbelaege;
    }

    public function addPassbelaege(Paesse $passbelaege): self
    {
        if (!$this->passbelaege->contains($passbelaege)) {
            $this->passbelaege[] = $passbelaege;
            $passbelaege->addBelag($this);
        }

        return $this;
    }

    public function removePassbelaege(Paesse $passbelaege): self
    {
        if ($this->passbelaege->contains($passbelaege)) {
            $this->passbelaege->removeElement($passbelaege);
            $passbelaege->removeBelag($this);
        }

        return $this;
    }
}
