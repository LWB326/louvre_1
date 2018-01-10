<?php
//src/AppBundle/Entity/Commande.php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Commande
 *
 * @ORM\Table(name="commande")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CommandeRepository")
 *
 */
class Commande
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    // liaison bi-directionnelle, commande est du côté inverse : une commande est liée à plusieurs billets
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Billet", mappedBy="commande")
     *
     */
    private $billets;



    /**
     * toString
     * @return string
     */
  /*  public function __toString()
    {
        return $this;
    }

*/
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateVisite", type="date")
     */
    private $dateVisite;

    /**
     * @var bool
     *
     * @ORM\Column(name="demieJournee", type="boolean")
     */
    private $demieJournee;

    /**
     * @var string
     *
     * @ORM\Column(name="nomClient", type="string", length=255)
     */
    private $nomClient;

    /**
     * @var string
     *
     * @ORM\Column(name="prenomClient", type="string", length=255)
     */
    private $prenomClient;



    /**
     * Constructor
     */
    public function __construct()
    {
        $this->billets = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set dateVisite
     *
     * @param \DateTime $dateVisite
     *
     * @return Commande
     */
    public function setDateVisite($dateVisite)
    {
        $this->dateVisite = $dateVisite;

        return $this;
    }

    /**
     * Get dateVisite
     *
     * @return \DateTime
     */
    public function getDateVisite()
    {
        return $this->dateVisite;
    }

    /**
     * Set demieJournee
     *
     * @param boolean $demieJournee
     *
     * @return Commande
     */
    public function setDemieJournee($demieJournee)
    {
        $this->demieJournee = $demieJournee;

        return $this;
    }

    /**
     * Get demieJournee
     *
     * @return boolean
     */
    public function getDemieJournee()
    {
        return $this->demieJournee;
    }

    /**
     * Set nomClient
     *
     * @param string $nomClient
     *
     * @return Commande
     */
    public function setNomClient($nomClient)
    {
        $this->nomClient = $nomClient;

        return $this;
    }

    /**
     * Get nomClient
     *
     * @return string
     */
    public function getNomClient()
    {
        return $this->nomClient;
    }

    /**
     * Set prenomClient
     *
     * @param string $prenomClient
     *
     * @return Commande
     */
    public function setPrenomClient($prenomClient)
    {
        $this->prenomClient = $prenomClient;

        return $this;
    }

    /**
     * Get prenomClient
     *
     * @return string
     */
    public function getPrenomClient()
    {
        return $this->prenomClient;
    }





    /**
     * Add billet
     *
     * @param \AppBundle\Entity\Billet $billet
     *
     * @return Commande
     */
    public function addBillet(\AppBundle\Entity\Billet $billet)
    {
        $this->billets[] = $billet;

        // on lie la commande au billet
        $billet->setCommande($this);

        return $this;
    }

    /**
     * Remove billet
     *
     * @param \AppBundle\Entity\Billet $billet
     */
    public function removeBillet(\AppBundle\Entity\Billet $billet)
    {
        $this->billets->removeElement($billet);
    }

    /**
     * Get billets
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBillets()
    {
        return $this->billets;
    }
}
