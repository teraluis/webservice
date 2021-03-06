<?php

namespace BackendBundle\Entity;

/**
 * Vfmonture
 */
class Vfmonture
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nom;

    /**
     * @var string
     */
    private $itemcode;

    /**
     * @var string
     */
    private $cible = 'F';

    /**
     * @var boolean
     */
    private $shootee = '1';

    /**
     * @var boolean
     */
    private $virtualreality = '1';

    /**
     * @var boolean
     */
    private $polarise = '0';

    /**
     * @var string
     */
    private $matiere = 'AT';

    /**
     * @var string
     */
    private $couleur = 'NOIR';

    /**
     * @var string
     */
    private $forme = 'CARRE';

    /**
     * @var string
     */
    private $usage = 'OPTIQUE';

    /**
     * @var \DateTime
     */
    private $sortieCollection;

    /**
     * @var \DateTime
     */
    private $dateCreation;


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
     * Set nom
     *
     * @param string $nom
     *
     * @return Vfmonture
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set itemcode
     *
     * @param string $itemcode
     *
     * @return Vfmonture
     */
    public function setItemcode($itemcode)
    {
        $this->itemcode = $itemcode;

        return $this;
    }

    /**
     * Get itemcode
     *
     * @return string
     */
    public function getItemcode()
    {
        return $this->itemcode;
    }

    /**
     * Set cible
     *
     * @param string $cible
     *
     * @return Vfmonture
     */
    public function setCible($cible)
    {
        $this->cible = $cible;

        return $this;
    }

    /**
     * Get cible
     *
     * @return string
     */
    public function getCible()
    {
        return $this->cible;
    }

    /**
     * Set shootee
     *
     * @param boolean $shootee
     *
     * @return Vfmonture
     */
    public function setShootee($shootee)
    {
        $this->shootee = $shootee;

        return $this;
    }

    /**
     * Get shootee
     *
     * @return boolean
     */
    public function getShootee()
    {
        return $this->shootee;
    }

    /**
     * Set virtualreality
     *
     * @param boolean $virtualreality
     *
     * @return Vfmonture
     */
    public function setVirtualreality($virtualreality)
    {
        $this->virtualreality = $virtualreality;

        return $this;
    }

    /**
     * Get virtualreality
     *
     * @return boolean
     */
    public function getVirtualreality()
    {
        return $this->virtualreality;
    }

    /**
     * Set polarise
     *
     * @param boolean $polarise
     *
     * @return Vfmonture
     */
    public function setPolarise($polarise)
    {
        $this->polarise = $polarise;

        return $this;
    }

    /**
     * Get polarise
     *
     * @return boolean
     */
    public function getPolarise()
    {
        return $this->polarise;
    }

    /**
     * Set matiere
     *
     * @param string $matiere
     *
     * @return Vfmonture
     */
    public function setMatiere($matiere)
    {
        $this->matiere = $matiere;

        return $this;
    }

    /**
     * Get matiere
     *
     * @return string
     */
    public function getMatiere()
    {
        return $this->matiere;
    }

    /**
     * Set couleur
     *
     * @param string $couleur
     *
     * @return Vfmonture
     */
    public function setCouleur($couleur)
    {
        $this->couleur = $couleur;

        return $this;
    }

    /**
     * Get couleur
     *
     * @return string
     */
    public function getCouleur()
    {
        return $this->couleur;
    }

    /**
     * Set forme
     *
     * @param string $forme
     *
     * @return Vfmonture
     */
    public function setForme($forme)
    {
        $this->forme = $forme;

        return $this;
    }

    /**
     * Get forme
     *
     * @return string
     */
    public function getForme()
    {
        return $this->forme;
    }

    /**
     * Set usage
     *
     * @param string $usage
     *
     * @return Vfmonture
     */
    public function setUsage($usage)
    {
        $this->usage = $usage;

        return $this;
    }

    /**
     * Get usage
     *
     * @return string
     */
    public function getUsage()
    {
        return $this->usage;
    }

    /**
     * Set sortieCollection
     *
     * @param \DateTime $sortieCollection
     *
     * @return Vfmonture
     */
    public function setSortieCollection($sortieCollection)
    {
        $this->sortieCollection = $sortieCollection;

        return $this;
    }

    /**
     * Get sortieCollection
     *
     * @return \DateTime
     */
    public function getSortieCollection()
    {
        return $this->sortieCollection;
    }

    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     *
     * @return Vfmonture
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get dateCreation
     *
     * @return \DateTime
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }
    /**
     * @var string
     */
    private $taille;

    /**
     * @var string
     */
    private $collection;


    /**
     * Set taille
     *
     * @param string $taille
     *
     * @return Vfmonture
     */
    public function setTaille($taille)
    {
        $this->taille = $taille;

        return $this;
    }

    /**
     * Get taille
     *
     * @return string
     */
    public function getTaille()
    {
        return $this->taille;
    }

    /**
     * Set collection
     *
     * @param string $collection
     *
     * @return Vfmonture
     */
    public function setCollection($collection)
    {
        $this->collection = $collection;

        return $this;
    }

    /**
     * Get collection
     *
     * @return string
     */
    public function getCollection()
    {
        return $this->collection;
    }
}
