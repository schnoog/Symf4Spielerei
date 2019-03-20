<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Regionen
 *
 * @ORM\Table(name="regionen", uniqueConstraints={@ORM\UniqueConstraint(name="UniqueCountryRegion", columns={"land_id", "region"})}, indexes={@ORM\Index(name="IDX_4086D2DA1994904A", columns={"land_id"})})
 * @ORM\Entity
 */
class Regionen
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="region", type="string", length=255, nullable=false)
     */
    private $region;

    /**
     * @var \Laender
     *
     * @ORM\ManyToOne(targetEntity="Laender")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="land_id", referencedColumnName="id")
     * })
     */
    private $land;


}
