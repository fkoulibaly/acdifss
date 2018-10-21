<?php

namespace ProjetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProjetInstitution
 *
 * @ORM\Table(name="projet_institution")
 * @ORM\Entity(repositoryClass="ProjetBundle\Repository\ProjetInstitutionRepository")
 */
class ProjetInstitution
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
     * @ORM\ManyToOne(targetEntity="ProjetBundle\Entity\Institution")
     * @ORM\JoinColumn(nullable=false)
     */
    private $institution;


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
     * @return ProjetInstitution
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
     * @return ProjetInstitution
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
     * @return ProjetInstitution
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
     * Set institution
     *
     * @param \ProjetBundle\Entity\Institution $institution
     *
     * @return ProjetInstitution
     */
    public function setInstitution(\ProjetBundle\Entity\Institution $institution)
    {
        $this->institution = $institution;

        return $this;
    }

    /**
     * Get institution
     *
     * @return \ProjetBundle\Entity\Institution
     */
    public function getInstitution()
    {
        return $this->institution;
    }
}
