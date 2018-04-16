<?php

namespace TrainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Wagon
 *
 * @ORM\Table(name="wagon")
 * @ORM\Entity(repositoryClass="TrainBundle\Repository\WagonRepository")
 */
class Wagon
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="letter", type="string", length=3)
     */
    private $letter;

    /**
     * @ORM\ManyToOne(targetEntity="TrainBundle\Entity\Train")
     * @ORM\JoinColumn(nullable=false)
     */
    private $train;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set letter
     *
     * @param string $letter
     *
     * @return Wagon
     */
    public function setLetter($letter)
    {
        $this->letter = $letter;

        return $this;
    }

    /**
     * Get letter
     *
     * @return string
     */
    public function getLetter()
    {
        return $this->letter;
    }

    /**
     * Set train
     *
     * @param \TrainBundle\Entity\Train $train
     *
     * @return Wagon
     */
    public function setTrain(\TrainBundle\Entity\Train $train)
    {
        $this->train = $train;

        return $this;
    }

    /**
     * Get train
     *
     * @return \TrainBundle\Entity\Train
     */
    public function getTrain()
    {
        return $this->train;
    }
}
