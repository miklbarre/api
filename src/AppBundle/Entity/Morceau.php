<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Morceau
 *
 * @ORM\Table(name="Morceau", indexes={@ORM\Index(name="AlbumMorceau", columns={"id_album"})})
 * @ORM\Entity
 */
class Morceau
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
     * @ORM\Column(name="nom_chanson", type="string", length=255, nullable=false)
     */
    private $nomChanson;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Album
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Album")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_album", referencedColumnName="id")
     * })
     */
    private $idAlbum;

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
    public function getNomChanson()
    {
        return $this->nomChanson;
    }

    /**
     * @param string $nomChanson
     */
    public function setNomChanson($nomChanson)
    {
        $this->nomChanson = $nomChanson;
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
     * @return Album
     */
    public function getIdAlbum()
    {
        return $this->idAlbum;
    }

    /**
     * @param Album $idAlbum
     */
    public function setIdAlbum($idAlbum)
    {
        $this->idAlbum = $idAlbum;
    }




}

