<?php

namespace ProjetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Projet
 *
 * @ORM\Table(name="projet")
 * @ORM\Entity(repositoryClass="ProjetBundle\Repository\ProjetRepository")
 */
class Projet
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
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="debut", type="datetime")
     */
    private $debut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fin", type="datetime")
     */
    private $fin;

    /**
     * @var string
     *
     * @ORM\Column(name="devise_financement", type="string", length=50)
     */
    private $deviseFinancement;

    /**
     * @var int
     *
     * @ORM\Column(name="montant_total", type="bigint")
     */
    private $montantTotal;

    /**
     * @var int
     *
     * @ORM\Column(name="contribution_monetaire_etat_gnf", type="bigint")
     */
    private $contributionMonetaireEtatGnf;

    /**
     * @var int
     *
     * @ORM\Column(name="contribution_monetaire_etat_usd", type="bigint")
     */
    private $contributionMonetaireEtatUsd;

    /**
     * @var bool
     *
     * @ORM\Column(name="contribution_pnds", type="boolean")
     */
    private $contributionPnds;

    /**
     * @var bool
     *
     * @ORM\Column(name="contribution_ptss", type="boolean")
     */
    private $contributionPtss;

    /**
     * @var bool
     *
     * @ORM\Column(name="contribution_di_pnds", type="boolean")
     */
    private $contributionDiPnds;

    /**
     * @var string
     *
     * @ORM\Column(name="objectif_general", type="text")
     */
    private $objectifGeneral;

    /**
     * @var bool
     *
     * @ORM\Column(name="leadership_gouvernance_sanitaire", type="boolean")
     */
    private $leadershipGouvernanceSanitaire;

    /**
     * @var bool
     *
     * @ORM\Column(name="financement_rhs_qualite", type="boolean")
     */
    private $financementRhsQualite;

    /**
     * @var bool
     *
     * @ORM\Column(name="prestations_services", type="boolean")
     */
    private $prestationsServices;

    /**
     * @var bool
     *
     * @ORM\Column(name="produit_ss_eit", type="boolean")
     */
    private $produitSsEit;

    /**
     * @var bool
     *
     * @ORM\Column(name="sisr_sante", type="boolean")
     */
    private $sisrSante;


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
     * Set titre
     *
     * @param string $titre
     *
     * @return Projet
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set debut
     *
     * @param \DateTime $debut
     *
     * @return Projet
     */
    public function setDebut($debut)
    {
        $this->debut = $debut;

        return $this;
    }

    /**
     * Get debut
     *
     * @return \DateTime
     */
    public function getDebut()
    {
        return $this->debut;
    }

    /**
     * Set fin
     *
     * @param \DateTime $fin
     *
     * @return Projet
     */
    public function setFin($fin)
    {
        $this->fin = $fin;

        return $this;
    }

    /**
     * Get fin
     *
     * @return \DateTime
     */
    public function getFin()
    {
        return $this->fin;
    }

    /**
     * Set deviseFinancement
     *
     * @param string $deviseFinancement
     *
     * @return Projet
     */
    public function setDeviseFinancement($deviseFinancement)
    {
        $this->deviseFinancement = $deviseFinancement;

        return $this;
    }

    /**
     * Get deviseFinancement
     *
     * @return string
     */
    public function getDeviseFinancement()
    {
        return $this->deviseFinancement;
    }

    /**
     * Set montantTotal
     *
     * @param integer $montantTotal
     *
     * @return Projet
     */
    public function setMontantTotal($montantTotal)
    {
        $this->montantTotal = $montantTotal;

        return $this;
    }

    /**
     * Get montantTotal
     *
     * @return int
     */
    public function getMontantTotal()
    {
        return $this->montantTotal;
    }

    /**
     * Set contributionMonetaireEtatGnf
     *
     * @param integer $contributionMonetaireEtatGnf
     *
     * @return Projet
     */
    public function setContributionMonetaireEtatGnf($contributionMonetaireEtatGnf)
    {
        $this->contributionMonetaireEtatGnf = $contributionMonetaireEtatGnf;

        return $this;
    }

    /**
     * Get contributionMonetaireEtatGnf
     *
     * @return int
     */
    public function getContributionMonetaireEtatGnf()
    {
        return $this->contributionMonetaireEtatGnf;
    }

    /**
     * Set contributionMonetaireEtatUsd
     *
     * @param integer $contributionMonetaireEtatUsd
     *
     * @return Projet
     */
    public function setContributionMonetaireEtatUsd($contributionMonetaireEtatUsd)
    {
        $this->contributionMonetaireEtatUsd = $contributionMonetaireEtatUsd;

        return $this;
    }

    /**
     * Get contributionMonetaireEtatUsd
     *
     * @return int
     */
    public function getContributionMonetaireEtatUsd()
    {
        return $this->contributionMonetaireEtatUsd;
    }

    /**
     * Set contributionPnds
     *
     * @param boolean $contributionPnds
     *
     * @return Projet
     */
    public function setContributionPnds($contributionPnds)
    {
        $this->contributionPnds = $contributionPnds;

        return $this;
    }

    /**
     * Get contributionPnds
     *
     * @return bool
     */
    public function getContributionPnds()
    {
        return $this->contributionPnds;
    }

    /**
     * Set contributionPtss
     *
     * @param boolean $contributionPtss
     *
     * @return Projet
     */
    public function setContributionPtss($contributionPtss)
    {
        $this->contributionPtss = $contributionPtss;

        return $this;
    }

    /**
     * Get contributionPtss
     *
     * @return bool
     */
    public function getContributionPtss()
    {
        return $this->contributionPtss;
    }

    /**
     * Set contributionDiPnds
     *
     * @param boolean $contributionDiPnds
     *
     * @return Projet
     */
    public function setContributionDiPnds($contributionDiPnds)
    {
        $this->contributionDiPnds = $contributionDiPnds;

        return $this;
    }

    /**
     * Get contributionDiPnds
     *
     * @return bool
     */
    public function getContributionDiPnds()
    {
        return $this->contributionDiPnds;
    }

    /**
     * Set objectifGeneral
     *
     * @param string $objectifGeneral
     *
     * @return Projet
     */
    public function setObjectifGeneral($objectifGeneral)
    {
        $this->objectifGeneral = $objectifGeneral;

        return $this;
    }

    /**
     * Get objectifGeneral
     *
     * @return string
     */
    public function getObjectifGeneral()
    {
        return $this->objectifGeneral;
    }

    /**
     * Set leadershipGouvernanceSanitaire
     *
     * @param boolean $leadershipGouvernanceSanitaire
     *
     * @return Projet
     */
    public function setLeadershipGouvernanceSanitaire($leadershipGouvernanceSanitaire)
    {
        $this->leadershipGouvernanceSanitaire = $leadershipGouvernanceSanitaire;

        return $this;
    }

    /**
     * Get leadershipGouvernanceSanitaire
     *
     * @return bool
     */
    public function getLeadershipGouvernanceSanitaire()
    {
        return $this->leadershipGouvernanceSanitaire;
    }

    /**
     * Set financementRhsQualite
     *
     * @param boolean $financementRhsQualite
     *
     * @return Projet
     */
    public function setFinancementRhsQualite($financementRhsQualite)
    {
        $this->financementRhsQualite = $financementRhsQualite;

        return $this;
    }

    /**
     * Get financementRhsQualite
     *
     * @return bool
     */
    public function getFinancementRhsQualite()
    {
        return $this->financementRhsQualite;
    }

    /**
     * Set prestationsServices
     *
     * @param boolean $prestationsServices
     *
     * @return Projet
     */
    public function setPrestationsServices($prestationsServices)
    {
        $this->prestationsServices = $prestationsServices;

        return $this;
    }

    /**
     * Get prestationsServices
     *
     * @return bool
     */
    public function getPrestationsServices()
    {
        return $this->prestationsServices;
    }

    /**
     * Set produitSsEit
     *
     * @param boolean $produitSsEit
     *
     * @return Projet
     */
    public function setProduitSsEit($produitSsEit)
    {
        $this->produitSsEit = $produitSsEit;

        return $this;
    }

    /**
     * Get produitSsEit
     *
     * @return bool
     */
    public function getProduitSsEit()
    {
        return $this->produitSsEit;
    }

    /**
     * Set sisrSante
     *
     * @param boolean $sisrSante
     *
     * @return Projet
     */
    public function setSisrSante($sisrSante)
    {
        $this->sisrSante = $sisrSante;

        return $this;
    }

    /**
     * Get sisrSante
     *
     * @return bool
     */
    public function getSisrSante()
    {
        return $this->sisrSante;
    }

    public function  __toString()
    {
        // TODO: Implement __toString() method.
        return $this->getId().' '.$this->getTitre();
    }
}
