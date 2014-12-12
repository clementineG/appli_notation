<?php

namespace App\NotationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Level
 *
 * @ORM\Table(name="level", indexes={@ORM\Index(name="fk_level_level_set1_idx", columns={"level_set_id"})})
 * @ORM\Entity
 */
class Level
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="name_abbrev", type="string", length=10, nullable=false)
     */
    private $nameAbbrev;

    /**
     * @var \LevelsScale
     *
     * @ORM\ManyToOne(targetEntity="LevelsScale")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="level_set_id", referencedColumnName="id")
     * })
     */
    private $levelSet;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Level
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set nameAbbrev
     *
     * @param string $nameAbbrev
     * @return Level
     */
    public function setNameAbbrev($nameAbbrev)
    {
        $this->nameAbbrev = $nameAbbrev;

        return $this;
    }

    /**
     * Get nameAbbrev
     *
     * @return string 
     */
    public function getNameAbbrev()
    {
        return $this->nameAbbrev;
    }

    /**
     * Set levelSet
     *
     * @param \App\NotationBundle\Entity\LevelsScale $levelSet
     * @return Level
     */
    public function setLevelSet(\App\NotationBundle\Entity\LevelsScale $levelSet = null)
    {
        $this->levelSet = $levelSet;

        return $this;
    }

    /**
     * Get levelSet
     *
     * @return \App\NotationBundle\Entity\LevelsScale 
     */
    public function getLevelSet()
    {
        return $this->levelSet;
    }
}
