<?php

namespace App\NotationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Grading
 *
 * @ORM\Table(name="grading", indexes={@ORM\Index(name="fk_grading_user1_idx", columns={"user_id"}), @ORM\Index(name="fk_grading_examination_session1_idx", columns={"examination_session_id"})})
 * @ORM\Entity
 */
class Grading
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
     * @ORM\Column(name="comment", type="string", length=3000, nullable=true)
     */
    private $comment;

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
     * @var \ExaminationSession
     *
     * @ORM\ManyToOne(targetEntity="ExaminationSession")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="examination_session_id", referencedColumnName="id")
     * })
     */
    private $examinationSession;



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
     * Set comment
     *
     * @param string $comment
     * @return Grading
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string 
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set user
     *
     * @param \App\NotationBundle\Entity\User $user
     * @return Grading
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

    /**
     * Set examinationSession
     *
     * @param \App\NotationBundle\Entity\ExaminationSession $examinationSession
     * @return Grading
     */
    public function setExaminationSession(\App\NotationBundle\Entity\ExaminationSession $examinationSession = null)
    {
        $this->examinationSession = $examinationSession;

        return $this;
    }

    /**
     * Get examinationSession
     *
     * @return \App\NotationBundle\Entity\ExaminationSession 
     */
    public function getExaminationSession()
    {
        return $this->examinationSession;
    }
}
