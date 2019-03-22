<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RichtungenRepository")
 */
class Richtungen
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
    private $RichtungKurz;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $Richtung;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRichtungKurz(): ?string
    {
        return $this->RichtungKurz;
    }

    public function setRichtungKurz(string $RichtungKurz): self
    {
        $this->RichtungKurz = $RichtungKurz;

        return $this;
    }

    public function getRichtung(): ?string
    {
        return $this->Richtung;
    }

    public function setRichtung(string $Richtung): self
    {
        $this->Richtung = $Richtung;

        return $this;
    }
}
