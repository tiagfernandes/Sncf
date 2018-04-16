<?php

namespace TrainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Gare
 *
 * @ORM\Table(name="gare")
 * @ORM\Entity(repositoryClass="TrainBundle\Repository\GareRepository")
 */
class Gare
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
     * @ORM\ManyToOne(targetEntity="TrainBundle\Entity\Ville")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ville;

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
     * @return Gare
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
     * Set gare
     *
     * @param \TrainBundle\Entity\Gare $gare
     *
     * @return Gare
     */
    public function setGare(\TrainBundle\Entity\Gare $gare)
    {
        $this->gare = $gare;

        return $this;
    }

    /**
     * Get gare
     *
     * @return \TrainBundle\Entity\Gare
     */
    public function getGare()
    {
        return $this->gare;
    }

    /**
     * Set ville
     *
     * @param \TrainBundle\Entity\Gare $ville
     *
     * @return Gare
     */
    public function setVille(\TrainBundle\Entity\Gare $ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return \TrainBundle\Entity\Gare
     */
    public function getVille()
    {
        return $this->ville;
    }
}
