<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PaesseRepository")
 */
class Paesse
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $Name;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Typen")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Typ;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Regionen")
     * @ORM\JoinColumn(nullable=false)
     */
    private $LandesRegion;

    /**
     * @ORM\Column(type="integer")
     */
    private $Hoehe;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Kategorien")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Kategorie;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $Ausbauart;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Belaege", inversedBy="passbelaege")
     */
    private $Belag;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Icons")
     */
    private $Icon;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Stati")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Status;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $VonOrt;

    /**
     * @ORM\Column(type="integer")
     */
    private $VonHoehe;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Richtungen")
     */
    private $VonRichtung;

    /**
     * @ORM\Column(type="decimal", scale=1 , precision=4, nullable=true)
     */
    private $VonDistanz;

    /**
     * @ORM\Column(type="integer")
     */
    private $VonKehren;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $NachOrt;

    /**
     * @ORM\Column(type="integer")
     */
    private $NachHoehe;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Richtungen")
     */
    private $NachRichtung;

    /**
     * @ORM\Column(type="decimal", scale=1 , precision=4, nullable=true)
     */
    private $NachDistanz;

    /**
     * @ORM\Column(type="integer")
     */
    private $NachKehren;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Schwierigkeiten")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Schwierigkeit;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Fahrbahnbreiten")
     */
    private $Fahrbahnbreite;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Wintersperren")
     */
    private $Wintersperre;

    /**
     * @ORM\Column(type="text", length=2048, nullable=true)
     */
    private $Maut;

    /**
     * @ORM\Column(type="text", length=9192, nullable=true)
     */
    private $Besonderes;

    /**
     * @ORM\Column(type="text", length=9192, nullable=true)
     */
    private $Sehenswuerdigkeit;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Fototip;

    /**
     * @ORM\Column(type="decimal", scale=8 , precision=11)
     */
    private $GeoLat;

    /**
     * @ORM\Column(type="decimal", scale=8 , precision=11)
     */
    private $GeoLon;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Laenderkategorien")
     */
    private $Laenderkategorie;

    /**
     * @ORM\Column(type="integer", nullable=true, unique=true)
     */
    private $AlteID;

    public function __construct()
    {
        $this->Belag = new ArrayCollection();
        $this->Icon = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getTyp(): ?Typen
    {
        return $this->Typ;
    }

    public function setTyp(?Typen $Typ): self
    {
        $this->Typ = $Typ;

        return $this;
    }

    public function getLandesRegion(): ?Regionen
    {
        return $this->LandesRegion;
    }

    public function setLandesRegion(?Regionen $LandesRegion): self
    {
        $this->LandesRegion = $LandesRegion;

        return $this;
    }

    public function getHoehe(): ?float
    {
        return $this->Hoehe;
    }

    public function setHoehe(float $Hoehe): self
    {
        $this->Hoehe = $Hoehe;

        return $this;
    }

    public function getKategorie(): ?Kategorien
    {
        return $this->Kategorie;
    }

    public function setKategorie(?Kategorien $Kategorie): self
    {
        $this->Kategorie = $Kategorie;

        return $this;
    }

    public function getAusbauart(): ?Ausbauarten
    {
        return $this->Ausbauart;
    }

    public function setAusbauart(?Ausbauarten $Ausbauart): self
    {
        $this->Ausbauart = $Ausbauart;

        return $this;
    }

    /**
     * @return Collection|Belaege[]
     */
    public function getBelag(): Collection
    {
        return $this->Belag;
    }

    public function addBelag(Belaege $belag): self
    {
        if (!$this->Belag->contains($belag)) {
            $this->Belag[] = $belag;
        }

        return $this;
    }

    public function removeBelag(Belaege $belag): self
    {
        if ($this->Belag->contains($belag)) {
            $this->Belag->removeElement($belag);
        }

        return $this;
    }

    /**
     * @return Collection|Icons[]
     */
    public function getIcon(): Collection
    {
        return $this->Icon;
    }

    public function addIcon(Icons $icon): self
    {
        if (!$this->Icon->contains($icon)) {
            $this->Icon[] = $icon;
        }

        return $this;
    }

    public function removeIcon(Icons $icon): self
    {
        if ($this->Icon->contains($icon)) {
            $this->Icon->removeElement($icon);
        }

        return $this;
    }

    public function getStatus(): ?Stati
    {
        return $this->Status;
    }

    public function setStatus(?Stati $Status): self
    {
        $this->Status = $Status;

        return $this;
    }

    public function getVonOrt(): ?string
    {
        return $this->VonOrt;
    }

    public function setVonOrt(?string $VonOrt): self
    {
        $this->VonOrt = $VonOrt;

        return $this;
    }

    public function getVonHoehe(): ?float
    {
        return $this->VonHoehe;
    }

    public function setVonHoehe(float $VonHoehe): self
    {
        $this->VonHoehe = $VonHoehe;

        return $this;
    }

    public function getVonRichtung(): ?Richtungen
    {
        return $this->VonRichtung;
    }

    public function setVonRichtung(?Richtungen $VonRichtung): self
    {
        $this->VonRichtung = $VonRichtung;

        return $this;
    }

    public function getVonDistanz(): ?float
    {
        return $this->VonDistanz;
    }

    public function setVonDistanz(?float $VonDistanz): self
    {
        $this->VonDistanz = $VonDistanz;

        return $this;
    }

    public function getVonKehren(): ?int
    {
        return $this->VonKehren;
    }

    public function setVonKehren(?int $VonKehren): self
    {
        $this->VonKehren = $VonKehren;

        return $this;
    }

    public function getNachOrt(): ?string
    {
        return $this->NachOrt;
    }

    public function setNachOrt(?string $NachOrt): self
    {
        $this->NachOrt = $NachOrt;

        return $this;
    }

    public function getNachHoehe(): ?float
    {
        return $this->NachHoehe;
    }

    public function setNachHoehe(float $NachHoehe): self
    {
        $this->NachHoehe = $NachHoehe;

        return $this;
    }

    public function getNachRichtung(): ?Richtungen
    {
        return $this->NachRichtung;
    }

    public function setNachRichtung(?Richtungen $NachRichtung): self
    {
        $this->NachRichtung = $NachRichtung;

        return $this;
    }

    public function getNachDistanz(): ?float
    {
        return $this->NachDistanz;
    }

    public function setNachDistanz(?float $NachDistanz): self
    {
        $this->NachDistanz = $NachDistanz;

        return $this;
    }

    public function getNachKehren(): ?int
    {
        return $this->NachKehren;
    }

    public function setNachKehren(int $NachKehren): self
    {
        $this->NachKehren = $NachKehren;

        return $this;
    }

    public function getSchwierigkeit(): ?Schwierigkeiten
    {
        return $this->Schwierigkeit;
    }

    public function setSchwierigkeit(?Schwierigkeiten $Schwierigkeit): self
    {
        $this->Schwierigkeit = $Schwierigkeit;

        return $this;
    }

    public function getFahrbahnbreite(): ?Fahrbahnbreiten
    {
        return $this->Fahrbahnbreite;
    }

    public function setFahrbahnbreite(?Fahrbahnbreiten $Fahrbahnbreite): self
    {
        $this->Fahrbahnbreite = $Fahrbahnbreite;

        return $this;
    }

    public function getWintersperre(): ?Wintersperren
    {
        return $this->Wintersperre;
    }

    public function setWintersperre(?Wintersperren $Wintersperre): self
    {
        $this->Wintersperre = $Wintersperre;

        return $this;
    }

    public function getMaut(): ?string
    {
        return $this->Maut;
    }

    public function setMaut(?string $Maut): self
    {
        $this->Maut = $Maut;

        return $this;
    }

    public function getBesonderes(): ?string
    {
        return $this->Besonderes;
    }

    public function setBesonderes(?string $Besonderes): self
    {
        $this->Besonderes = $Besonderes;

        return $this;
    }

    public function getSehenswuerdigkeit(): ?string
    {
        return $this->Sehenswuerdigkeit;
    }

    public function setSehenswuerdigkeit(?string $Sehenswuerdigkeit): self
    {
        $this->Sehenswuerdigkeit = $Sehenswuerdigkeit;

        return $this;
    }

    public function getFototip(): ?string
    {
        return $this->Fototip;
    }

    public function setFototip(?string $Fototip): self
    {
        $this->Fototip = $Fototip;

        return $this;
    }

    public function getGeoLat(): ?float
    {
        return $this->GeoLat;
    }

    public function setGeoLat(float $GeoLat): self
    {
        $this->GeoLat = $GeoLat;

        return $this;
    }

    public function getGeoLon(): ?float
    {
        return $this->GeoLon;
    }

    public function setGeoLon(float $GeoLon): self
    {
        $this->GeoLon = $GeoLon;

        return $this;
    }

    public function getLaenderkategorie(): ?Laenderkategorien
    {
        return $this->Laenderkategorie;
    }

    public function setLaenderkategorie(?Laenderkategorien $Laenderkategorie): self
    {
        $this->Laenderkategorie = $Laenderkategorie;

        return $this;
    }

    public function getAlteID(): ?int
    {
        return $this->AlteID;
    }

    public function setAlteID(?int $AlteID): self
    {
        $this->AlteID = $AlteID;

        return $this;
    }

}
