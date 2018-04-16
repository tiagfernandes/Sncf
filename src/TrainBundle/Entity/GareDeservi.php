<?php

namespace TrainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GareDeservi
 *
 * @ORM\Table(name="gare_deservi")
 * @ORM\Entity(repositoryClass="TrainBundle\Repository\GareDeserviRepository")
 */
class GareDeservi
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
     * @ORM\OneToOne(targetEntity="TrainBundle\Entity\Gare")
     */
    private $gare;

    /**
     * @var string
     *
     * @ORM\Column(name="heurePassage", type="string", length=255)
     */
    private $heurePassage;

    /**
     * @ORM\ManyToOne(targetEntity="TrainBundle\Entity\Trajet", inversedBy="gareDeservis")
     * @ORM\JoinColumn(nullable=false)
     */
    private $trajet;


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
     * Set heurePassage
     *
     * @param string $heurePassage
     *
     * @return GareDeservi
     */
    public function setHeurePassage($heurePassage)
    {
        $this->heurePassage = $heurePassage;

        return $this;
    }

    /**
     * Get heurePassage
     *
     * @return string
     */
    public function getHeurePassage()
    {
        return $this->heurePassage;
    }

    /**
     * Set gare
     *
     * @param \TrainBundle\Entity\Gare $gare
     *
     * @return GareDeservi
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
     * Set trajet
     *
     * @param \TrainBundle\Entity\GareDeservi $trajet
     *
     * @return GareDeservi
     */
    public function setTrajet(\TrainBundle\Entity\GareDeservi $trajet)
    {
        $this->trajet = $trajet;

        return $this;
    }

    /**
     * Get trajet
     *
     * @return \TrainBundle\Entity\GareDeservi
     */
    public function getTrajet()
    {
        return $this->trajet;
    }
}
