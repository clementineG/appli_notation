<?php

namespace App\NotationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StudentClassCourse
 *
 * @ORM\Table(name="student_class_course", indexes={@ORM\Index(name="fk_student_class_course_course1_idx", columns={"course_id"}), @ORM\Index(name="fk_student_class_course_student_class1_idx", columns={"student_class_id"}), @ORM\Index(name="fk_student_class_course_user1_idx", columns={"user_id"})})
 * @ORM\Entity
 */
class StudentClassCourse
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
     * @ORM\Column(name="student_class_coursecol", type="string", length=45, nullable=true)
     */
    private $studentClassCoursecol;

    /**
     * @var \StudentClass
     *
     * @ORM\ManyToOne(targetEntity="StudentClass")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="student_class_id", referencedColumnName="id")
     * })
     */
    private $studentClass;

    /**
     * @var \Course
     *
     * @ORM\ManyToOne(targetEntity="Course")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="course_id", referencedColumnName="id")
     * })
     */
    private $course;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;



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
     * Set studentClassCoursecol
     *
     * @param string $studentClassCoursecol
     * @return StudentClassCourse
     */
    public function setStudentClassCoursecol($studentClassCoursecol)
    {
        $this->studentClassCoursecol = $studentClassCoursecol;

        return $this;
    }

    /**
     * Get studentClassCoursecol
     *
     * @return string 
     */
    public function getStudentClassCoursecol()
    {
        return $this->studentClassCoursecol;
    }

    /**
     * Set studentClass
     *
     * @param \App\NotationBundle\Entity\StudentClass $studentClass
     * @return StudentClassCourse
     */
    public function setStudentClass(\App\NotationBundle\Entity\StudentClass $studentClass = null)
    {
        $this->studentClass = $studentClass;

        return $this;
    }

    /**
     * Get studentClass
     *
     * @return \App\NotationBundle\Entity\StudentClass 
     */
    public function getStudentClass()
    {
        return $this->studentClass;
    }

    /**
     * Set course
     *
     * @param \App\NotationBundle\Entity\Course $course
     * @return StudentClassCourse
     */
    public function setCourse(\App\NotationBundle\Entity\Course $course = null)
    {
        $this->course = $course;

        return $this;
    }

    /**
     * Get course
     *
     * @return \App\NotationBundle\Entity\Course 
     */
    public function getCourse()
    {
        return $this->course;
    }

    /**
     * Set user
     *
     * @param \App\NotationBundle\Entity\User $user
     * @return StudentClassCourse
     */
    public function setUser(\App\NotationBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \App\NotationBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}
