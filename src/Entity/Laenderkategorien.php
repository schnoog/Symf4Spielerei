<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LaenderkategrienRepository")
 */
class Laenderkategorien
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=3, unique=true)
     */
    private $LaenderkategorieKurz;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $Laenderkategorie;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLaenderkategorieKurz(): ?string
    {
        return $this->LaenderkategorieKurz;
    }

    public function setLaenderkategorieKurz(string $LaenderkategorieKurz): self
    {
        $this->LaenderkategorieKurz = $LaenderkategorieKurz;

        return $this;
    }

    public function getLaenderkategorie(): ?string
    {
        return $this->Laenderkategorie;
    }

    public function setLaenderkategorie(string $Laenderkategorie): self
    {
        $this->Laenderkategorie = $Laenderkategorie;

        return $this;
    }
}
