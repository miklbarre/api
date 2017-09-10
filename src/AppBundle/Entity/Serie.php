<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Serie
 *
 * @ORM\Table(name="serie")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SeriesRepository")
 */
class Serie
{
    /**
     * @var string
     *
     * @ORM\Column(name="nom_serie", type="string", length=255, nullable=false)
     */
    private $nomSerie;

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
    public function getNomSerie()
    {
        return $this->nomSerie;
    }

    /**
     * @param string $nomSerie
     */
    public function setNomSerie($nomSerie)
    {
        $this->nomSerie = $nomSerie;
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

