<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TypenRepository")
 */
class Typen
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=25, unique=true)
     */
    private $Typ;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTyp(): ?string
    {
        return $this->Typ;
    }

    public function setTyp(string $Typ): self
    {
        $this->Typ = $Typ;

        return $this;
    }
}
