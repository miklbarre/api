<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Artiste
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ArtisteRepository")
 * @ORM\Table(name="Artiste")
 */
class Artiste
{
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

}

