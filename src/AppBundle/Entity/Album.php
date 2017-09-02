<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Album
 *
 * @ORM\Table(name="album", indexes={@ORM\Index(name="artisteAlbum", columns={"id_artiste"})})
 * @ORM\Entity
 */
class Album
{
    /**
     * @var string
     *
     * @ORM\Column(name="nom_album", type="string", length=255, nullable=false)
     */
    private $nomAlbum;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_artiste", type="string", length=255, nullable=false)
     */
    private $nomArtiste;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Artiste
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Artiste")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_artiste", referencedColumnName="id")
     * })
     */
    private $idArtiste;

    /**
     * @return string
     */
    public function getNomAlbum()
    {
        return $this->nomAlbum;
    }

    /**
     * @param string $nomAlbum
     */
    public function setNomAlbum($nomAlbum)
    {
        $this->nomAlbum = $nomAlbum;
    }

    /**
     * @return string
     */
    public function getNomArtiste()
    {
        return $this->nomArtiste;
    }

    /**
     * @param string $nomArtiste
     */
    public function setNomArtiste($nomArtiste)
    {
        $this->nomArtiste = $nomArtiste;
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
     * @return Artiste
     */
    public function getIdArtiste()
    {
        return $this->idArtiste;
    }

    /**
     * @param Artiste $idArtiste
     */
    public function setIdArtiste($idArtiste)
    {
        $this->idArtiste = $idArtiste;
    }



}

