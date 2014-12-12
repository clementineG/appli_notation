<?php

namespace App\NotationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ExaminationSession
 *
 * @ORM\Table(name="examination_session", indexes={@ORM\Index(name="fk_examination_session_period1_idx", columns={"period_id"}), @ORM\Index(name="fk_examination_session_student_class_course1_idx", columns={"student_class_course_id"})})
 * @ORM\Entity
 */
class ExaminationSession
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
     * @ORM\Column(name="title", type="string", length=150, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=3000, nullable=true)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="coefficient", type="integer", nullable=false)
     */
    private $coefficient;

    /**
     * @var \Period
     *
     * @ORM\ManyToOne(targetEntity="Period")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="period_id", referencedColumnName="id")
     * })
     */
    private $period;

    /**
     * @var \StudentClassCourse
     *
     * @ORM\ManyToOne(targetEntity="StudentClassCourse")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="student_class_course_id", referencedColumnName="id")
     * })
     */
    private $studentClassCourse;



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
     * Set title
     *
     * @param string $title
     * @return ExaminationSession
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return ExaminationSession
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
     * @return ExaminationSession
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
     * Set period
     *
     * @param \App\NotationBundle\Entity\Period $period
     * @return ExaminationSession
     */
    public function setPeriod(\App\NotationBundle\Entity\Period $period = null)
    {
        $this->period = $period;

        return $this;
    }

    /**
     * Get period
     *
     * @return \App\NotationBundle\Entity\Period 
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * Set studentClassCourse
     *
     * @param \App\NotationBundle\Entity\StudentClassCourse $studentClassCourse
     * @return ExaminationSession
     */
    public function setStudentClassCourse(\App\NotationBundle\Entity\StudentClassCourse $studentClassCourse = null)
    {
        $this->studentClassCourse = $studentClassCourse;

        return $this;
    }

    /**
     * Get studentClassCourse
     *
     * @return \App\NotationBundle\Entity\StudentClassCourse 
     */
    public function getStudentClassCourse()
    {
        return $this->studentClassCourse;
    }
}
