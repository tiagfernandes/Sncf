<?php

namespace TrainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ville
 *
 * @ORM\Table(name="ville")
 * @ORM\Entity(repositoryClass="TrainBundle\Repository\VilleRepository")
 */
class Ville
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
     * @ORM\Column(name="city", type="string", length=255)
     */
    private $city;


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
     * Set city
     *
     * @param string $city
     *
     * @return Ville
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->gare = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add gare
     *
     * @param \TrainBundle\Entity\Gare $gare
     *
     * @return Ville
     */
    public function addGare(\TrainBundle\Entity\Gare $gare)
    {
        $this->gare[] = $gare;

        return $this;
    }

    /**
     * Remove gare
     *
     * @param \TrainBundle\Entity\Gare $gare
     */
    public function removeGare(\TrainBundle\Entity\Gare $gare)
    {
        $this->gare->removeElement($gare);
    }

    /**
     * Get gare
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGare()
    {
        return $this->gare;
    }
}
