<?php

namespace App\NotationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StudentClass
 *
 * @ORM\Table(name="student_class", indexes={@ORM\Index(name="fk_student_class_degree1_idx", columns={"degree_id"})})
 * @ORM\Entity
 */
class StudentClass
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
     * @ORM\Column(name="name", type="string", length=25, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="name_abbrev", type="string", length=10, nullable=false)
     */
    private $nameAbbrev;

    /**
     * @var \Degree
     *
     * @ORM\ManyToOne(targetEntity="Degree")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="degree_id", referencedColumnName="id")
     * })
     */
    private $degree;



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
     * @return StudentClass
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
     * @return StudentClass
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
     * Set degree
     *
     * @param \App\NotationBundle\Entity\Degree $degree
     * @return StudentClass
     */
    public function setDegree(\App\NotationBundle\Entity\Degree $degree = null)
    {
        $this->degree = $degree;

        return $this;
    }

    /**
     * Get degree
     *
     * @return \App\NotationBundle\Entity\Degree 
     */
    public function getDegree()
    {
        return $this->degree;
    }
}
