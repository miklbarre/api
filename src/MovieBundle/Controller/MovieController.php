<?php
/**
 * Created by PhpStorm.
 * User: mickael
 * Date: 31/08/17
 * Time: 14:02
 */
namespace MovieBundle\Controller;
use AppBundle\Entity\Film;
use AppBundle\Repository\FilmRepository;
use Doctrine\DBAL\Exception\DatabaseObjectNotFoundException;
use Nelmio\ApiDocBundle\Annotation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

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
    *          200="Good",
    *          400="Bad request"
    *     }
    * )
    */
    public function getAllAction () {
        $tabMovies = array();
        try {
            /**
             * @var $repo FilmRepository
             */
            $repo = $this->getDoctrine()->getManager('film')->getRepository(Film::class);
            $movies = $repo->getAllMovies();
        }
        catch (DatabaseObjectNotFoundException $e) {
            return new JsonResponse("Error Request",400);
        }
        foreach ($movies as $movie) {
            /**
             * @var $movie Film
             */
            $tabMovies [] = array('id' => $movie->getId(), 'title' => $movie->getTitre());
        }
        return new JsonResponse(["data" => $tabMovies,"draw" => 1, "recordsTotal" => count($tabMovies),"recordsFiltered" => count($tabMovies)],200);
    }

    /**
     * @Annotation\ApiDoc(
     *     section="Film",
     *     description="search Movies",
     *     resource=true,
     *     requirements={
     *      {
     *          "name"="search",
     *          "dataType"="text",
     *          "description"="value to search"
     *      }
     *  },
     *     statusCodes={
     *          200="Good",
     *          400="Bad request"
     *     }
     * )
     * @param Request $request
     * @return JsonResponse
     */
    public function searchAction (Request $request) {
        $search = $request->get('search');
        $tabMovies = array();
        try {
            /**
             * @var $repo FilmRepository
             */
            $repo = $this->getDoctrine()->getManager('film')->getRepository(Film::class);
            $movies = $repo->searchMovies($search);
        }
        catch (DatabaseObjectNotFoundException $e) {
            return new JsonResponse("Error Request",400);
        }
        foreach ($movies as $movie) {
            /**
             * @var $movie Film
             */
            $tabMovies [] = array('id' => $movie->getId(), 'title' => $movie->getTitre());
        }
        return new JsonResponse(["data" => $tabMovies,"draw" => 1, "recordsTotal" => count($tabMovies),"recordsFiltered" => count($tabMovies)],200);
    }
}
