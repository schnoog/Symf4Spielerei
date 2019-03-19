<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LaenderkategrienRepository")
 */
class Laenderkategrien
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
    private $LaenderkategrieKurz;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Laenderkategrie;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLaenderkategrieKurz(): ?string
    {
        return $this->LaenderkategrieKurz;
    }

    public function setLaenderkategrieKurz(string $LaenderkategrieKurz): self
    {
        $this->LaenderkategrieKurz = $LaenderkategrieKurz;

        return $this;
    }

    public function getLaenderkategrie(): ?string
    {
        return $this->Laenderkategrie;
    }

    public function setLaenderkategrie(string $Laenderkategrie): self
    {
        $this->Laenderkategrie = $Laenderkategrie;

        return $this;
    }
}
