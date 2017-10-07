<?php
/**
 * Created by PhpStorm.
 * User: mickael
 * Date: 10/09/17
 * Time: 10:32
 */

namespace SeriesBundle\Controller;


use AppBundle\Entity\Serie;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\VarDumper\VarDumper;
use Nelmio\ApiDocBundle\Annotation;

class SeriesController extends Controller {

    /**
     * @Annotation\ApiDoc(
     *     section="Séries",
     *     description="get all series",
     *     resource=true,
     *     statusCodes={
                200="Good",
     *          400="Bad request"
     *     }
     * )
     */
    public function getSeriesAction () {
        $seriesManager = $this->getDoctrine()->getManager('serie');
        $series = $seriesManager->getRepository(Serie::class)->getSeries();
        $allSeries = [];
        /**
         * @var $serie Serie
         */
        foreach ($series as $serie) {
            $allSeries [] = array('id' => $serie->getId(), 'name' => $serie->getNomSerie());
        }
        return new JsonResponse($allSeries,200);
    }
}