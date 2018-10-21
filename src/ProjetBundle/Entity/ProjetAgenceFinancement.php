<?php

namespace ProjetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProjetAgenceFinancement
 *
 * @ORM\Table(name="projet_agence_financement")
 * @ORM\Entity(repositoryClass="ProjetBundle\Repository\ProjetAgenceFinancementRepository")
 */
class ProjetAgenceFinancement
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
     * @ORM\Column(name="nom_point_focal", type="string", length=100)
     */
    private $nomPointFocal;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse_point_focal", type="string", length=255)
     */
    private $adressePointFocal;

    /**
     * @ORM\ManyToOne(targetEntity="ProjetBundle\Entity\Projet")
     * @ORM\JoinColumn(nullable=false)
     */
    private $projet;


    /**
     * @ORM\ManyToOne(targetEntity="ProjetBundle\Entity\AgenceFinancement")
     * @ORM\JoinColumn(nullable=false)
     */
    private $agencefinancement;


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
     * Set nomPointFocal
     *
     * @param string $nomPointFocal
     *
     * @return ProjetAgenceFinancement
     */
    public function setNomPointFocal($nomPointFocal)
    {
        $this->nomPointFocal = $nomPointFocal;

        return $this;
    }

    /**
     * Get nomPointFocal
     *
     * @return string
     */
    public function getNomPointFocal()
    {
        return $this->nomPointFocal;
    }

    /**
     * Set adressePointFocal
     *
     * @param string $adressePointFocal
     *
     * @return ProjetAgenceFinancement
     */
    public function setAdressePointFocal($adressePointFocal)
    {
        $this->adressePointFocal = $adressePointFocal;

        return $this;
    }

    /**
     * Get adressePointFocal
     *
     * @return string
     */
    public function getAdressePointFocal()
    {
        return $this->adressePointFocal;
    }

    /**
     * Set projet
     *
     * @param \ProjetBundle\Entity\Projet $projet
     *
     * @return ProjetAgenceFinancement
     */
    public function setProjet(\ProjetBundle\Entity\Projet $projet)
    {
        $this->projet = $projet;

        return $this;
    }

    /**
     * Get projet
     *
     * @return \ProjetBundle\Entity\Projet
     */
    public function getProjet()
    {
        return $this->projet;
    }

    /**
     * Set agencefinancement
     *
     * @param \ProjetBundle\Entity\AgenceFinancement $agencefinancement
     *
     * @return ProjetAgenceFinancement
     */
    public function setAgencefinancement(\ProjetBundle\Entity\AgenceFinancement $agencefinancement)
    {
        $this->agencefinancement = $agencefinancement;

        return $this;
    }

    /**
     * Get agencefinancement
     *
     * @return \ProjetBundle\Entity\AgenceFinancement
     */
    public function getAgencefinancement()
    {
        return $this->agencefinancement;
    }
}
