<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Episode
 *
 * @ORM\Table(name="episode", indexes={@ORM\Index(name="lkSerieEpisode", columns={"id_serie"})})
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
     * @var \AppBundle\Entity\Serie
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Serie")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_serie", referencedColumnName="id")
     * })
     */
    private $idSerie;

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

    /**
     * @return Serie
     */
    public function getIdSerie()
    {
        return $this->idSerie;
    }

    /**
     * @param Serie $idSerie
     */
    public function setIdSerie($idSerie)
    {
        $this->idSerie = $idSerie;
    }

}

