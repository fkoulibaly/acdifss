<?php

namespace ProjetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProjetBailleur
 *
 * @ORM\Table(name="projet_bailleur")
 * @ORM\Entity(repositoryClass="ProjetBundle\Repository\ProjetBailleurRepository")
 */
class ProjetBailleur
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
     * @ORM\ManyToOne(targetEntity="ProjetBundle\Entity\Bailleur")
     * @ORM\JoinColumn(nullable=false)
     */
    private $bailleur;


    /**
     * @ORM\ManyToOne(targetEntity="ProjetBundle\Entity\Projet")
     * @ORM\JoinColumn(nullable=false)
     */
    private $projet;


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
     * @return ProjetBailleur
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
     * @return ProjetBailleur
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
     * Set bailleur
     *
     * @param \ProjetBundle\Entity\Bailleur $bailleur
     *
     * @return ProjetBailleur
     */
    public function setBailleur(\ProjetBundle\Entity\Bailleur $bailleur)
    {
        $this->bailleur = $bailleur;

        return $this;
    }

    /**
     * Get bailleur
     *
     * @return \ProjetBundle\Entity\Bailleur
     */
    public function getBailleur()
    {
        return $this->bailleur;
    }

    /**
     * Set projet
     *
     * @param \ProjetBundle\Entity\Projet $projet
     *
     * @return ProjetBailleur
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
}
