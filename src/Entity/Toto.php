<?php

namespace App\Entity;

use App\Entity\Toto;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DemoController
{
    /**
     * @return Response
     *
     * @Route "/demo/{id}"
     */
    #[Route(path:"/demo/{id})")]
    public function demo(int $id)
    {
        $t = new Toto($id,'titi');
        return new Response('Voilà la réponse est '.$t->getAge(), Response::HTTP_OK);
    }
}