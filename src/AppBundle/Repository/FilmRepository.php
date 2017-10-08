<?php
/**
 * Created by PhpStorm.
 * User: mickael
 * Date: 31/08/17
 * Time: 14:41
 */

namespace AppBundle\Repository;


use Doctrine\ORM\EntityRepository;

class FilmRepository extends EntityRepository
{
    public function searchMovies($search) {
        return $this->getEntityManager()
            ->createQueryBuilder()
            ->select('f')
            ->from('AppBundle:Film', 'f')
            ->where('f.titre LIKE :search')
            ->setParameter('search', '%'.$search.'%')
            ->getQuery()->getResult();
    }

    public function getAllMovies(){
        return $this->getEntityManager()
            ->createQueryBuilder()
            ->select('f')
            ->from('AppBundle:Film', 'f')
            ->orderBy('f.titre','ASC')
            ->getQuery()->getResult();
    }
}