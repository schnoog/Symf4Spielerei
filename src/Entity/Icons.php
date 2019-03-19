<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\IconsRepository")
 */
class Icons
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=40, unique=true)
     */
    private $Icon;

    /**
     * @ORM\Column(type="string", length=50, unique=true)
     */
    private $IconBildIdent;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIcon(): ?string
    {
        return $this->Icon;
    }

    public function setIcon(string $Icon): self
    {
        $this->Icon = $Icon;

        return $this;
    }

    public function getIconBildIdent(): ?string
    {
        return $this->IconBildIdent;
    }

    public function setIconBildIdent(string $IconBildIdent): self
    {
        $this->IconBildIdent = $IconBildIdent;

        return $this;
    }
}
