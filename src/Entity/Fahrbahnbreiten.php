<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FahrbahnbreitenRepository")
 */
class Fahrbahnbreiten
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20, unique=true)
     */
    private $Fahrbahnbreite;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFahrbahnbreite(): ?string
    {
        return $this->Fahrbahnbreite;
    }

    public function setFahrbahnbreite(string $Fahrbahnbreite): self
    {
        $this->Fahrbahnbreite = $Fahrbahnbreite;

        return $this;
    }
}
