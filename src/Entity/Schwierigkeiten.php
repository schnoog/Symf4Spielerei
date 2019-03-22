<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SchwierigkeitenRepository")
 */
class Schwierigkeiten
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $Schwierigkeit;

    /**
     * @ORM\Column(type="string", length=2048, nullable=true)
     */
    private $Schwierigkeitsgrad;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSchwierigkeit(): ?int
    {
        return $this->Schwierigkeit;
    }

    public function setSchwierigkeit(int $Schwierigkeit): self
    {
        $this->Schwierigkeit = $Schwierigkeit;

        return $this;
    }

    public function getSchwierigkeitsgrad(): ?string
    {
        return $this->Schwierigkeitsgrad;
    }

    public function setSchwierigkeitsgrad(?string $Schwierigkeitsgrad): self
    {
        $this->Schwierigkeitsgrad = $Schwierigkeitsgrad;

        return $this;
    }
}
