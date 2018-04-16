<?php

namespace TrainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Siege
 *
 * @ORM\Table(name="siege")
 * @ORM\Entity(repositoryClass="TrainBundle\Repository\SiegeRepository")
 */
class Siege
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
     * @ORM\Column(name="number", type="string", length=5)
     */
    private $number;

    /**
     * @var string
     *
     * @ORM\Column(name="classe", type="string", length=255)
     */
    private $classe;

    /**
     * @ORM\ManyToOne(targetEntity="TrainBundle\Entity\Wagon")
     * @ORM\JoinColumn(nullable=false)
     */
    private $wagon;


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
     * Set number
     *
     * @param string $number
     *
     * @return Siege
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set classe
     *
     * @param string $classe
     *
     * @return Siege
     */
    public function setClasse($classe)
    {
        $this->classe = $classe;

        return $this;
    }

    /**
     * Get classe
     *
     * @return string
     */
    public function getClasse()
    {
        return $this->classe;
    }

    /**
     * Set wagon
     *
     * @param \TrainBundle\Entity\Wagon $wagon
     *
     * @return Siege
     */
    public function setWagon(\TrainBundle\Entity\Wagon $wagon)
    {
        $this->wagon = $wagon;

        return $this;
    }

    /**
     * Get wagon
     *
     * @return \TrainBundle\Entity\Wagon
     */
    public function getWagon()
    {
        return $this->wagon;
    }
}
