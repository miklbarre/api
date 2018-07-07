<?php
/**
 * Created by PhpStorm.
 * User: mickael
 * Date: 01/09/17
 * Time: 14:23
 */

namespace MusicBundle\Controller;
use AppBundle\Entity\Artiste;
use AppBundle\Repository\ArtisteRepository;
use Doctrine\DBAL\Exception\DatabaseObjectNotFoundException;
use Nelmio\ApiDocBundle\Annotation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class MusicsController extends Controller {

    /**
     * @Annotation\ApiDoc(
     *     section="Musique",
     *     description="get All Artiste with album",
     *     resource=true,
     *     statusCodes={
     *          200="Good",
     *          400="Bad request"
     *     }
     * )
     */
    public function getAllAlbumByArtistAction () {
        $musicManager = $this->getDoctrine()->getManager('music');
        $musics = $musicManager->getRepository(Artiste::class)->getAllAlbumByArtist();
        $tabMusics = array();
        foreach ($musics as $music) {
            $tabMusics [] = $music;
        }
        return new JsonResponse(array('data' => $tabMusics, 'draw' => 1, 'recordsTotal' => count($tabMusics), 'recordsFiltered' => count($tabMusics)),200);
    }

    /**
     * @Annotation\ApiDoc(
     *     section="Musique",
     *     description="search musics",
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
        $tabMusics = array();
        try {
            /**
             * @var $repo ArtisteRepository
             */
            $repo = $this->getDoctrine()->getManager('music')->getRepository(Artiste::class);
            $musics = $repo->searchMusics($search);
        }
        catch (DatabaseObjectNotFoundException $e) {
            return new JsonResponse("Error Request",400);
        }
        foreach ($musics as $music) {
            $tabMusics [] = $music;
        }
        return new JsonResponse(["data" => $tabMusics,"draw" => 1, "recordsTotal" => count($tabMusics),"recordsFiltered" => count($tabMusics)],200);
    }
}
