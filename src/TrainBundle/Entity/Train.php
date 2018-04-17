<?php

namespace TrainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Train
 *
 * @ORM\Table(name="train")
 * @ORM\Entity(repositoryClass="TrainBundle\Repository\TrainRepository")
 */
class Train
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="TrainBundle\Entity\Wagon", mappedBy="train")
     * @ORM\JoinColumn(nullable=false)
     */
    private $wagons;


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
     * Set name
     *
     * @param string $name
     *
     * @return Train
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
     * Constructor
     */
    public function __construct()
    {
        $this->wagons = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add wagon
     *
     * @param \TrainBundle\Entity\Wagon $wagon
     *
     * @return Train
     */
    public function addWagon(\TrainBundle\Entity\Wagon $wagon)
    {
        $this->wagons[] = $wagon;

        return $this;
    }

    /**
     * Remove wagon
     *
     * @param \TrainBundle\Entity\Wagon $wagon
     */
    public function removeWagon(\TrainBundle\Entity\Wagon $wagon)
    {
        $this->wagons->removeElement($wagon);
    }

    /**
     * Get wagons
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getWagons()
    {
        return $this->wagons;
    }
}
