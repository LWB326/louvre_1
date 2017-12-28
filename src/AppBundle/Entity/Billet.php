<?php
//src/AppBundle/Entity/Billet.php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Billet
 *
 * @ORM\Table(name="billet")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BilletRepository")
 *
 */
class Billet
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
     private $id;


    //liaison bi-directionnelle, billet est propriétaire : plusieurs billets correspondent à une commande

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Commande", inversedBy="billets")
     * @ORM\JoinColumn(name="commande_Id", referencedColumnName="id", nullable=false)
     */
     private $commandes;



    /**
     * @var string
     *
     * @ORM\Column(name="nomDuVisiteur", type="string", length=255)
     */
    private $nomDuVisiteur;
	
    /**
     * @var string
     *
     * @ORM\Column(name="prenomDuVisiteur", type="string", length=255)
     */
    private $prenomDuVisiteur;

    /**
     * @var bool
     *
     * @ORM\Column(name="tarifReduit", type="boolean")
     */
    private $tarifReduit;

	/**
     * @var \DateTime
     *
     * @ORM\Column(name="dateNaissanceVisiteur", type="date")
     */
    private $dateNaissanceVisiteur;


    /**
     * @var string
     *
     * @ORM\Column(name="prixBillet", type="decimal", nullable=true)
     */
    private $prixBillet;

    /**
     * @var string
     *
     * @ORM\Column(name="paysVisiteur", type="string", length=255)
     */
    private $paysVisiteur;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateVisite", type="date",  nullable=true)
     */
    private $dateVisite;






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
     * Set nomDuVisiteur
     *
     * @param string $nomDuVisiteur
     *
     * @return Billet
     */
    public function setNomDuVisiteur($nomDuVisiteur)
    {
        $this->nomDuVisiteur = $nomDuVisiteur;

        return $this;
    }

    /**
     * Get nomDuVisiteur
     *
     * @return string
     */
    public function getNomDuVisiteur()
    {
        return $this->nomDuVisiteur;
    }

    /**
     * Set prenomDuVisiteur
     *
     * @param string $prenomDuVisiteur
     *
     * @return Billet
     */
    public function setPrenomDuVisiteur($prenomDuVisiteur)
    {
        $this->prenomDuVisiteur = $prenomDuVisiteur;

        return $this;
    }

    /**
     * Get prenomDuVisiteur
     *
     * @return string
     */
    public function getPrenomDuVisiteur()
    {
        return $this->prenomDuVisiteur;
    }

    /**
     * Set tarifReduit
     *
     * @param boolean $tarifReduit
     *
     * @return Billet
     */
    public function setTarifReduit($tarifReduit)
    {
        $this->tarifReduit = $tarifReduit;

        return $this;
    }

    /**
     * Get tarifReduit
     *
     * @return boolean
     */
    public function getTarifReduit()
    {
        return $this->tarifReduit;
    }

    /**
     * Set dateNaissanceVisiteur
     *
     * @param \DateTime $dateNaissanceVisiteur
     *
     * @return Billet
     */
    public function setDateNaissanceVisiteur($dateNaissanceVisiteur)
    {
        $this->dateNaissanceVisiteur = $dateNaissanceVisiteur;

        return $this;
    }

    /**
     * Get dateNaissanceVisiteur
     *
     * @return \DateTime
     */
    public function getDateNaissanceVisiteur()
    {
        return $this->dateNaissanceVisiteur;
    }

    /**
     * Set commande
     *
     * @param \AppBundle\Entity\Commande $commande
     *
     * @return Billet
     */
    public function setCommande(\AppBundle\Entity\Commande $commande)
    {
        $this->commande = $commande;

        return $this;
    }

    /**
     * Get commande
     *
     * @return \AppBundle\Entity\Commande
     */
    public function getCommande()
    {
        return $this->commande;
    }

    /**
     * Set prixBillet
     *
     * @param string $prixBillet
     *
     * @return Billet
     */
    public function setPrixBillet($prixBillet)
    {
        $this->prixBillet = $prixBillet;

        return $this;
    }

    /**
     * Get prixBillet
     *
     * @return string
     */
    public function getPrixBillet()
    {
        return $this->prixBillet;
    }

    /**
     * Set paysVisiteur
     *
     * @param string $paysVisiteur
     *
     * @return Billet
     */
    public function setPaysVisiteur($paysVisiteur)
    {
        $this->paysVisiteur = $paysVisiteur;

        return $this;
    }

    /**
     * Get paysVisiteur
     *
     * @return string
     */
    public function getPaysVisiteur()
    {
        return $this->paysVisiteur;
    }

    /**
     * Set dateVisite
     *
     * @param \DateTime $dateVisite
     *
     * @return Billet
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
}
