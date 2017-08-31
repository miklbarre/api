<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Episode
 *
 * @ORM\Table(name="episode")
 * @ORM\Entity
 */
class Episode
{
    /**
     * @var integer
     *
     * @ORM\Column(name="num_saison", type="integer", nullable=false)
     */
    private $numSaison;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_serie", type="integer", nullable=false)
     */
    private $idSerie;

    /**
     * @var integer
     *
     * @ORM\Column(name="num_episode", type="integer", nullable=false)
     */
    private $numEpisode;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_episode", type="string", length=255, nullable=false)
     */
    private $nomEpisode;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @return int
     */
    public function getNumSaison()
    {
        return $this->numSaison;
    }

    /**
     * @param int $numSaison
     */
    public function setNumSaison($numSaison)
    {
        $this->numSaison = $numSaison;
    }

    /**
     * @return int
     */
    public function getIdSerie()
    {
        return $this->idSerie;
    }

    /**
     * @param int $idSerie
     */
    public function setIdSerie($idSerie)
    {
        $this->idSerie = $idSerie;
    }

    /**
     * @return int
     */
    public function getNumEpisode()
    {
        return $this->numEpisode;
    }

    /**
     * @param int $numEpisode
     */
    public function setNumEpisode($numEpisode)
    {
        $this->numEpisode = $numEpisode;
    }

    /**
     * @return string
     */
    public function getNomEpisode()
    {
        return $this->nomEpisode;
    }

    /**
     * @param string $nomEpisode
     */
    public function setNomEpisode($nomEpisode)
    {
        $this->nomEpisode = $nomEpisode;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }



}

