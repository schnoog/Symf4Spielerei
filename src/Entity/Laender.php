<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LaenderRepository")
 */
class Laender
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=3)
     */
    private $LandKurz;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Land;

    /**
     * @ORM\Column(type="boolean")
     */
    private $Allowed;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Regionen", mappedBy="Land")
     */
    private $regionen;

    /**
     * @ORM\Column(type="integer")
     */
    private $AktivAbSaison;

    /**
     * @ORM\Column(type="integer")
     */
    private $AktivBisSaison;

    public function __construct()
    {
        $this->regionen = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLandKurz(): ?string
    {
        return $this->LandKurz;
    }

    public function setLandKurz(string $LandKurz): self
    {
        $this->LandKurz = $LandKurz;

        return $this;
    }

    public function getLand(): ?string
    {
        return $this->Land;
    }

    public function setLand(string $Land): self
    {
        $this->Land = $Land;

        return $this;
    }

    public function getAllowed(): ?bool
    {
        return $this->Allowed;
    }

    public function setAllowed(bool $Allowed): self
    {
        $this->Allowed = $Allowed;

        return $this;
    }

    /**
     * @return Collection|Regionen[]
     */
    public function getRegionen(): Collection
    {
        return $this->regionen;
    }

    public function addRegionen(Regionen $regionen): self
    {
        if (!$this->regionen->contains($regionen)) {
            $this->regionen[] = $regionen;
            $regionen->setLand($this);
        }

        return $this;
    }

    public function removeRegionen(Regionen $regionen): self
    {
        if ($this->regionen->contains($regionen)) {
            $this->regionen->removeElement($regionen);
            // set the owning side to null (unless already changed)
            if ($regionen->getLand() === $this) {
                $regionen->setLand(null);
            }
        }

        return $this;
    }

    public function getAktivAbSaison(): ?int
    {
        return $this->AktivAbSaison;
    }

    public function setAktivAbSaison(int $AktivAbSaison): self
    {
        $this->AktivAbSaison = $AktivAbSaison;

        return $this;
    }

    public function getAktivBisSaison(): ?int
    {
        return $this->AktivBisSaison;
    }

    public function setAktivBisSaison(int $AktivBisSaison): self
    {
        $this->AktivBisSaison = $AktivBisSaison;

        return $this;
    }
}
