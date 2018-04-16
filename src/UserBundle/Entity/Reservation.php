<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reservation
 *
 * @ORM\Table(name="reservation")
 * @ORM\Entity(repositoryClass="UserBundle\Repository\ReservationRepository")
 */
class Reservation
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
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="TrainBundle\Entity\Trajet")
     * @ORM\JoinColumn(nullable=false)
     */
    private $trajet;

    /**
     * @var int
     *
     * @ORM\Column(name="siege", type="integer")
     */
    private $siege;

    /**
     * @var bool
     *
     * @ORM\Column(name="isPay", type="boolean")
     */
    private $isPay;

    /**
     * @var int
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="gareDepart", type="string", length=255)
     */
    private $gareDepart;

    /**
     * @var string
     *
     * @ORM\Column(name="gareArrive", type="string", length=255)
     */
    private $gareArrive;


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
     * Set siege
     *
     * @param string $siege
     *
     * @return Reservation
     */
    public function setSiege($siege)
    {
        $this->siege = $siege;

        return $this;
    }

    /**
     * Get siege
     *
     * @return string
     */
    public function getSiege()
    {
        return $this->siege;
    }

    /**
     * Set isPay
     *
     * @param boolean $isPay
     *
     * @return Reservation
     */
    public function setIsPay($isPay)
    {
        $this->isPay = $isPay;

        return $this;
    }

    /**
     * Get isPay
     *
     * @return bool
     */
    public function getIsPay()
    {
        return $this->isPay;
    }

    /**
     * Set tarif
     *
     * @param integer $tarif
     *
     * @return Reservation
     */
    public function setTarif($tarif)
    {
        $this->tarif = $tarif;

        return $this;
    }

    /**
     * Get tarif
     *
     * @return int
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
     * @return Reservation
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

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Reservation
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set gareDepart
     *
     * @param string $gareDepart
     *
     * @return Reservation
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
     * @return Reservation
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
     * Set user
     *
     * @param \UserBundle\Entity\User $user
     *
     * @return Reservation
     */
    public function setUser(\UserBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set trajet
     *
     * @param \TrainBundle\Entity\Trajet $trajet
     *
     * @return Reservation
     */
    public function setTrajet(\TrainBundle\Entity\Trajet $trajet)
    {
        $this->trajet = $trajet;

        return $this;
    }

    /**
     * Get trajet
     *
     * @return \TrainBundle\Entity\Trajet
     */
    public function getTrajet()
    {
        return $this->trajet;
    }
}
