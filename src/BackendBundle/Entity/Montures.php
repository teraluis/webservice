<?php

namespace BackendBundle\Entity;

/**
 * Montures
 */
class Montures
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
    private $cible;

    /**
     * @var string
     */
    private $prix;

    /**
     * @var string
     */
    private $shoote;

    /**
     * @var string
     */
    private $pola;

    /**
     * @var string
     */
    private $matiere;

    /**
     * @var string
     */
    private $couleur;

    /**
     * @var string
     */
    private $fitingbox;

    /**
     * @var string
     */
    private $forme;

    /**
     * @var \DateTime
     */
    private $date;


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
     * @return Montures
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
     * Set cible
     *
     * @param string $cible
     *
     * @return Montures
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
     * Set prix
     *
     * @param string $prix
     *
     * @return Montures
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return string
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set shoote
     *
     * @param string $shoote
     *
     * @return Montures
     */
    public function setShoote($shoote)
    {
        $this->shoote = $shoote;

        return $this;
    }

    /**
     * Get shoote
     *
     * @return string
     */
    public function getShoote()
    {
        return $this->shoote;
    }

    /**
     * Set pola
     *
     * @param string $pola
     *
     * @return Montures
     */
    public function setPola($pola)
    {
        $this->pola = $pola;

        return $this;
    }

    /**
     * Get pola
     *
     * @return string
     */
    public function getPola()
    {
        return $this->pola;
    }

    /**
     * Set matiere
     *
     * @param string $matiere
     *
     * @return Montures
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
     * @return Montures
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
     * Set fitingbox
     *
     * @param string $fitingbox
     *
     * @return Montures
     */
    public function setFitingbox($fitingbox)
    {
        $this->fitingbox = $fitingbox;

        return $this;
    }

    /**
     * Get fitingbox
     *
     * @return string
     */
    public function getFitingbox()
    {
        return $this->fitingbox;
    }

    /**
     * Set forme
     *
     * @param string $forme
     *
     * @return Montures
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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Montures
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
     * @var string
     */
    private $ref;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $sousfamille;

    /**
     * @var string
     */
    private $taille;

    /**
     * @var \DateTime
     */
    private $entreecollection;

    /**
     * @var string
     */
    private $monturescol;


    /**
     * Set ref
     *
     * @param string $ref
     *
     * @return Montures
     */
    public function setRef($ref)
    {
        $this->ref = $ref;

        return $this;
    }

    /**
     * Get ref
     *
     * @return string
     */
    public function getRef()
    {
        return $this->ref;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Montures
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set sousfamille
     *
     * @param string $sousfamille
     *
     * @return Montures
     */
    public function setSousfamille($sousfamille)
    {
        $this->sousfamille = $sousfamille;

        return $this;
    }

    /**
     * Get sousfamille
     *
     * @return string
     */
    public function getSousfamille()
    {
        return $this->sousfamille;
    }

    /**
     * Set taille
     *
     * @param string $taille
     *
     * @return Montures
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
     * Set entreecollection
     *
     * @param \DateTime $entreecollection
     *
     * @return Montures
     */
    public function setEntreecollection($entreecollection)
    {
        $this->entreecollection = $entreecollection;

        return $this;
    }

    /**
     * Get entreecollection
     *
     * @return \DateTime
     */
    public function getEntreecollection()
    {
        return $this->entreecollection;
    }

    /**
     * Set monturescol
     *
     * @param string $monturescol
     *
     * @return Montures
     */
    public function setMonturescol($monturescol)
    {
        $this->monturescol = $monturescol;

        return $this;
    }

    /**
     * Get monturescol
     *
     * @return string
     */
    public function getMonturescol()
    {
        return $this->monturescol;
    }
}
