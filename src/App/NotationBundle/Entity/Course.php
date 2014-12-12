<?php

namespace App\NotationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Course
 *
 * @ORM\Table(name="course", indexes={@ORM\Index(name="fk_course_levels_scale1_idx", columns={"levels_scale_id"})})
 * @ORM\Entity
 */
class Course
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
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="full_name", type="string", length=255, nullable=true)
     */
    private $fullName;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=3000, nullable=false)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="coefficient", type="integer", nullable=true)
     */
    private $coefficient;

    /**
     * @var \LevelsScale
     *
     * @ORM\ManyToOne(targetEntity="LevelsScale")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="levels_scale_id", referencedColumnName="id")
     * })
     */
    private $levelsScale;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Degree", inversedBy="course")
     * @ORM\JoinTable(name="course_degree",
     *   joinColumns={
     *     @ORM\JoinColumn(name="course_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="degree_id", referencedColumnName="id")
     *   }
     * )
     */
    private $degree;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Criterion", mappedBy="course")
     */
    private $criterion;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->degree = new \Doctrine\Common\Collections\ArrayCollection();
        $this->criterion = new \Doctrine\Common\Collections\ArrayCollection();
    }


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
     * @return Course
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
     * Set fullName
     *
     * @param string $fullName
     * @return Course
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;

        return $this;
    }

    /**
     * Get fullName
     *
     * @return string 
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Course
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set coefficient
     *
     * @param integer $coefficient
     * @return Course
     */
    public function setCoefficient($coefficient)
    {
        $this->coefficient = $coefficient;

        return $this;
    }

    /**
     * Get coefficient
     *
     * @return integer 
     */
    public function getCoefficient()
    {
        return $this->coefficient;
    }

    /**
     * Set levelsScale
     *
     * @param \App\NotationBundle\Entity\LevelsScale $levelsScale
     * @return Course
     */
    public function setLevelsScale(\App\NotationBundle\Entity\LevelsScale $levelsScale = null)
    {
        $this->levelsScale = $levelsScale;

        return $this;
    }

    /**
     * Get levelsScale
     *
     * @return \App\NotationBundle\Entity\LevelsScale 
     */
    public function getLevelsScale()
    {
        return $this->levelsScale;
    }

    /**
     * Add degree
     *
     * @param \App\NotationBundle\Entity\Degree $degree
     * @return Course
     */
    public function addDegree(\App\NotationBundle\Entity\Degree $degree)
    {
        $this->degree[] = $degree;

        return $this;
    }

    /**
     * Remove degree
     *
     * @param \App\NotationBundle\Entity\Degree $degree
     */
    public function removeDegree(\App\NotationBundle\Entity\Degree $degree)
    {
        $this->degree->removeElement($degree);
    }

    /**
     * Get degree
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDegree()
    {
        return $this->degree;
    }

    /**
     * Add criterion
     *
     * @param \App\NotationBundle\Entity\Criterion $criterion
     * @return Course
     */
    public function addCriterion(\App\NotationBundle\Entity\Criterion $criterion)
    {
        $this->criterion[] = $criterion;

        return $this;
    }

    /**
     * Remove criterion
     *
     * @param \App\NotationBundle\Entity\Criterion $criterion
     */
    public function removeCriterion(\App\NotationBundle\Entity\Criterion $criterion)
    {
        $this->criterion->removeElement($criterion);
    }

    /**
     * Get criterion
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCriterion()
    {
        return $this->criterion;
    }
}
