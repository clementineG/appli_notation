<?php

namespace App\NotationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GradingDetail
 *
 * @ORM\Table(name="grading_detail", indexes={@ORM\Index(name="fk_grading_detail_grading1_idx", columns={"grading_id"}), @ORM\Index(name="fk_grading_detail_criterion1_idx", columns={"criterion_id"})})
 * @ORM\Entity
 */
class GradingDetail
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
     * @ORM\Column(name="percentage", type="decimal", precision=5, scale=2, nullable=false)
     */
    private $percentage;

    /**
     * @var \Grading
     *
     * @ORM\ManyToOne(targetEntity="Grading")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="grading_id", referencedColumnName="id")
     * })
     */
    private $grading;

    /**
     * @var \Criterion
     *
     * @ORM\ManyToOne(targetEntity="Criterion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="criterion_id", referencedColumnName="id")
     * })
     */
    private $criterion;



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
     * Set percentage
     *
     * @param string $percentage
     * @return GradingDetail
     */
    public function setPercentage($percentage)
    {
        $this->percentage = $percentage;

        return $this;
    }

    /**
     * Get percentage
     *
     * @return string 
     */
    public function getPercentage()
    {
        return $this->percentage;
    }

    /**
     * Set grading
     *
     * @param \App\NotationBundle\Entity\Grading $grading
     * @return GradingDetail
     */
    public function setGrading(\App\NotationBundle\Entity\Grading $grading = null)
    {
        $this->grading = $grading;

        return $this;
    }

    /**
     * Get grading
     *
     * @return \App\NotationBundle\Entity\Grading 
     */
    public function getGrading()
    {
        return $this->grading;
    }

    /**
     * Set criterion
     *
     * @param \App\NotationBundle\Entity\Criterion $criterion
     * @return GradingDetail
     */
    public function setCriterion(\App\NotationBundle\Entity\Criterion $criterion = null)
    {
        $this->criterion = $criterion;

        return $this;
    }

    /**
     * Get criterion
     *
     * @return \App\NotationBundle\Entity\Criterion 
     */
    public function getCriterion()
    {
        return $this->criterion;
    }
}
