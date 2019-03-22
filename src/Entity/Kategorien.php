<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\KategorienRepository")
 */
class Kategorien
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $Kategorie;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getKategorie(): ?string
    {
        return $this->Kategorie;
    }

    public function setKategorie(string $Kategorie): self
    {
        $this->Kategorie = $Kategorie;

        return $this;
    }
}
