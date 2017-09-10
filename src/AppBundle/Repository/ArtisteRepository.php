<?php
/**
 * Created by PhpStorm.
 * User: mickael
 * Date: 01/09/17
 * Time: 16:03
 */

namespace AppBundle\Repository;


use Doctrine\ORM\EntityRepository;

class ArtisteRepository extends EntityRepository
{
    public function  getAllAlbumByArtist () {
        return $this->_em->createQuery("SELECT a.id as idArtiste, a.nomArtiste as Artiste,
              al.nomAlbum as Album, al.id as idAlbum
            FROM AppBundle:Artiste a, AppBundle:Album al
            WHERE a.id = al.idArtiste")->getResult();
    }

}