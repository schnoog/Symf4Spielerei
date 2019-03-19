<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RegionenRepository")
 */
class Regionen
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Laender", inversedBy="regionen")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Land;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Region;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLand(): ?Laender
    {
        return $this->Land;
    }

    public function setLand(?Laender $Land): self
    {
        $this->Land = $Land;

        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->Region;
    }

    public function setRegion(string $Region): self
    {
        $this->Region = $Region;

        return $this;
    }
}
