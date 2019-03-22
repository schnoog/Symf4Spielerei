<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\WintersperrenRepository")
 */
class Wintersperren
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100, unique=true)
     */
    private $Wintersperre;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getWintersperre(): ?string
    {
        return $this->Wintersperre;
    }

    public function setWintersperre(string $Wintersperre): self
    {
        $this->Wintersperre = $Wintersperre;

        return $this;
    }
}
