<?php

namespace Wiki\WikiMaireBundle\Entity;

/**
 * Projet
 */
class Projet
{
    public function __toString()
    {
        return $this->nomprojet;
    }

    public $file;

    protected function getUploadDir()
    {
        return 'uploads';
    }

    protected function getUploadRootDir()
    {
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    public function getWebPath()
    {
        return null === $this->photo ? null : $this->getUploadDir().'/'.$this->photo;
    }

    public function getAbsolutePath()
    {
        return null === $this->photo ? null : $this->getUploadRootDir().'/'.$this->photo;
    }


    public function preUpload()
    {
        if (null !== $this->file) {
            // do whatever you want to generate a unique name
            $this->photo = uniqid() . '.' . $this->file->guessExtension();
        }
    }


    public function upload()
    {
        if (null === $this->file) {
            return;
        }

        // if there is an error when moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error
        $this->file->move($this->getUploadRootDir(), $this->photo);

        unset($this->file);
    }


    public function removeUpload()
    {
        if ($file = $this->getAbsolutePath()) {
            unlink($file);
        }
    }


    // GENERATED CODE
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nomprojet;

    /**
     * @var string
     */
    private $description;

    /**
     * @var \DateTime
     */
    private $daterealisation;

    /**
     * @var string
     */
    private $difficulte;

    /**
     * @var float
     */
    private $cout;

    /**
     * @var string
     */
    private $tailleprojet;

    /**
     * @var integer
     */
    private $bassinPopulation;


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
     * Set nomprojet
     *
     * @param string $nomprojet
     *
     * @return Projet
     */
    public function setNomprojet($nomprojet)
    {
        $this->nomprojet = $nomprojet;

        return $this;
    }

    /**
     * Get nomprojet
     *
     * @return string
     */
    public function getNomprojet()
    {
        return $this->nomprojet;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Projet
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
     * Set daterealisation
     *
     * @param \DateTime $daterealisation
     *
     * @return Projet
     */
    public function setDaterealisation($daterealisation)
    {
        $this->daterealisation = $daterealisation;

        return $this;
    }

    /**
     * Get daterealisation
     *
     * @return \DateTime
     */
    public function getDaterealisation()
    {
        return $this->daterealisation;
    }

    /**
     * Set difficulte
     *
     * @param string $difficulte
     *
     * @return Projet
     */
    public function setDifficulte($difficulte)
    {
        $this->difficulte = $difficulte;

        return $this;
    }

    /**
     * Get difficulte
     *
     * @return string
     */
    public function getDifficulte()
    {
        return $this->difficulte;
    }

    /**
     * Set cout
     *
     * @param float $cout
     *
     * @return Projet
     */
    public function setCout($cout)
    {
        $this->cout = $cout;

        return $this;
    }

    /**
     * Get cout
     *
     * @return float
     */
    public function getCout()
    {
        return $this->cout;
    }

    /**
     * Set tailleprojet
     *
     * @param string $tailleprojet
     *
     * @return Projet
     */
    public function setTailleprojet($tailleprojet)
    {
        $this->tailleprojet = $tailleprojet;

        return $this;
    }

    /**
     * Get tailleprojet
     *
     * @return string
     */
    public function getTailleprojet()
    {
        return $this->tailleprojet;
    }

    /**
     * Set bassinPopulation
     *
     * @param integer $bassinPopulation
     *
     * @return Projet
     */
    public function setBassinPopulation($bassinPopulation)
    {
        $this->bassinPopulation = $bassinPopulation;

        return $this;
    }

    /**
     * Get bassinPopulation
     *
     * @return integer
     */
    public function getBassinPopulation()
    {
        return $this->bassinPopulation;
    }
    /**
     * @var \Application\Sonata\UserBundle\Entity\User
     */
    private $user;


    /**
     * Set user
     *
     * @param \Application\Sonata\UserBundle\Entity\User $user
     *
     * @return Projet
     */
    public function setUser(\Application\Sonata\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Application\Sonata\UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
    /**
     * @var string
     */
    private $tags;


    /**
     * Set tags
     *
     * @param string $tags
     *
     * @return Projet
     */
    public function setTags($tags)
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * Get tags
     *
     * @return string
     */
    public function getTags()
    {
        return $this->tags;
    }
    /**
     * @var string
     */
    private $photo;


    /**
     * Set photo
     *
     * @param string $photo
     *
     * @return Projet
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }



}
