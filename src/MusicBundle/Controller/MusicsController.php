<?php
/**
 * Created by PhpStorm.
 * User: mickael
 * Date: 01/09/17
 * Time: 14:23
 */

namespace MusicBundle\Controller;
use AppBundle\Entity\Artiste;
use Nelmio\ApiDocBundle\Annotation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class MusicsController extends Controller {

    /**
     * @Annotation\ApiDoc(
     *     section="Musique",
     *     description="get All Artiste with album",
     *     resource=true,
     *     statusCodes={
                200="Good",
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
        return new JsonResponse($tabMusics,200);
    }
}