<?php

namespace TrainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Trajet
 *
 * @ORM\Table(name="trajet")
 * @ORM\Entity(repositoryClass="TrainBundle\Repository\TrajetRepository")
 */
class Trajet
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
     * @ORM\ManyToOne(targetEntity="TrainBundle\Entity\Train")
     * @ORM\JoinColumn(nullable=false)
     */
    private $train;

    /**
     * @ORM\OneToMany(targetEntity="TrainBundle\Entity\GareDeservi", mappedBy="trajet")
     * @ORM\JoinColumn(nullable=false)
     */
    private $gareDeservis;

    /**
     * @ORM\OneToOne(targetEntity="TrainBundle\Entity\Gare")
     * @ORM\JoinColumn(nullable=false)
     */
    private $gareDepart;

    /**
     * @ORM\OneToOne(targetEntity="TrainBundle\Entity\Gare")
     * @ORM\JoinColumn(nullable=false)
     */
    private $gareArrive;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heureDepart", type="datetime")
     */
    private $heureDepart;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heureArrive", type="datetime")
     */
    private $heureArrive;


    /**
     * @var integer*
     *
     * @ORM\Column(name="tarif", type="integer")
     */
    private $tarif;

    /**
     * @var string
     *
     * @ORM\Column(name="devise", type="string", length=3)
     */
    private $devise;

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
     * Set gareDepart
     *
     * @param string $gareDepart
     *
     * @return Trajet
     */
    public function setGareDepart($gareDepart)
    {
        $this->gareDepart = $gareDepart;

        return $this;
    }

    /**
     * Get gareDepart
     *
     * @return string
     */
    public function getGareDepart()
    {
        return $this->gareDepart;
    }

    /**
     * Set gareArrive
     *
     * @param string $gareArrive
     *
     * @return Trajet
     */
    public function setGareArrive($gareArrive)
    {
        $this->gareArrive = $gareArrive;

        return $this;
    }

    /**
     * Get gareArrive
     *
     * @return string
     */
    public function getGareArrive()
    {
        return $this->gareArrive;
    }

    /**
     * Set heureDepart
     *
     * @param \DateTime $heureDepart
     *
     * @return Trajet
     */
    public function setHeureDepart($heureDepart)
    {
        $this->heureDepart = $heureDepart;

        return $this;
    }

    /**
     * Get heureDepart
     *
     * @return \DateTime
     */
    public function getHeureDepart()
    {
        return $this->heureDepart;
    }

    /**
     * Set heureArrive
     *
     * @param \DateTime $heureArrive
     *
     * @return Trajet
     */
    public function setHeureArrive($heureArrive)
    {
        $this->heureArrive = $heureArrive;

        return $this;
    }

    /**
     * Get heureArrive
     *
     * @return \DateTime
     */
    public function getHeureArrive()
    {
        return $this->heureArrive;
    }

    /**
     * Set train
     *
     * @param \TrainBundle\Entity\Train $train
     *
     * @return Trajet
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
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->gareDeservis = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add gareDeservi
     *
     * @param \TrainBundle\Entity\GareDeservi $gareDeservi
     *
     * @return Trajet
     */
    public function addGareDeservi(\TrainBundle\Entity\GareDeservi $gareDeservi)
    {
        $this->gareDeservis[] = $gareDeservi;

        return $this;
    }

    /**
     * Remove gareDeservi
     *
     * @param \TrainBundle\Entity\GareDeservi $gareDeservi
     */
    public function removeGareDeservi(\TrainBundle\Entity\GareDeservi $gareDeservi)
    {
        $this->gareDeservis->removeElement($gareDeservi);
    }

    /**
     * Get gareDeservis
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGareDeservis()
    {
        return $this->gareDeservis;
    }

    /**
     * Set tarif
     *
     * @param integer $tarif
     *
     * @return Trajet
     */
    public function setTarif($tarif)
    {
        $this->tarif = $tarif;

        return $this;
    }

    /**
     * Get tarif
     *
     * @return integer
     */
    public function getTarif()
    {
        return $this->tarif;
    }

    /**
     * Set devise
     *
     * @param string $devise
     *
     * @return Trajet
     */
    public function setDevise($devise)
    {
        $this->devise = $devise;

        return $this;
    }

    /**
     * Get devise
     *
     * @return string
     */
    public function getDevise()
    {
        return $this->devise;
    }
}
