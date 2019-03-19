<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AusbauartenRepository")
 */
class Ausbauarten
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50, unique=true)
     */
    private $Ausbauart;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAusbauart(): ?string
    {
        return $this->Ausbauart;
    }

    public function setAusbauart(string $Ausbauart): self
    {
        $this->Ausbauart = $Ausbauart;

        return $this;
    }
}
