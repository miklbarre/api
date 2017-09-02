<?php
/**
 * Created by PhpStorm.
 * User: mickael
 * Date: 31/08/17
 * Time: 14:02
 */
namespace MovieBundle\Controller;
use AppBundle\Entity\Film;
use Doctrine\DBAL\Exception\DatabaseObjectNotFoundException;
use Nelmio\ApiDocBundle\Annotation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class MovieController
 * @package MovieBundle\Controller
 */
class MovieController extends Controller {
    /**
    * @Annotation\ApiDoc(
    *     section="Film",
    *     description="get All Movies",
    *     resource=true,
    *     statusCodes={
                200="Good",
    *          400="Bad request"
    *     }
    * )
    */
    public function getAllAction () {
        $tabMovies = array();
        try {
            $movies = $this->getDoctrine()->getManager('film')->getRepository('AppBundle:Film')->findAll();
        }
        catch (DatabaseObjectNotFoundException $e) {
            return new JsonResponse("Error Request",400);
        }
        foreach ($movies as $movie) {
            /**
             * @var $movie Film
             */
            $tabMovies [$movie->getId()] = $movie->getTitre();
        }
        return new JsonResponse($tabMovies,200);
    }

}