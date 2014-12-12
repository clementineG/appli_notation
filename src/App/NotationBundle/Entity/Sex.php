<?php

namespace App\NotationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sex
 *
 * @ORM\Table(name="sex")
 * @ORM\Entity
 */
class Sex
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
     * @ORM\Column(name="gender", type="string", length=1, nullable=false)
     */
    private $gender;

    /**
     * @var boolean
     *
     * @ORM\Column(name="code", type="boolean", nullable=false)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="social_title", type="string", length=15, nullable=false)
     */
    private $socialTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="social_title_abbrev", type="string", length=5, nullable=true)
     */
    private $socialTitleAbbrev;



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
     * Set gender
     *
     * @param string $gender
     * @return Sex
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return string 
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set code
     *
     * @param boolean $code
     * @return Sex
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return boolean 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set socialTitle
     *
     * @param string $socialTitle
     * @return Sex
     */
    public function setSocialTitle($socialTitle)
    {
        $this->socialTitle = $socialTitle;

        return $this;
    }

    /**
     * Get socialTitle
     *
     * @return string 
     */
    public function getSocialTitle()
    {
        return $this->socialTitle;
    }

    /**
     * Set socialTitleAbbrev
     *
     * @param string $socialTitleAbbrev
     * @return Sex
     */
    public function setSocialTitleAbbrev($socialTitleAbbrev)
    {
        $this->socialTitleAbbrev = $socialTitleAbbrev;

        return $this;
    }

    /**
     * Get socialTitleAbbrev
     *
     * @return string 
     */
    public function getSocialTitleAbbrev()
    {
        return $this->socialTitleAbbrev;
    }
}
