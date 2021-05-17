<?php

namespace App\Controller;

use App\Entity\Base2019;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class ListaccByidController extends AbstractController
{
    /**
     * @Route("/listacc/byid/{nPrevensiss}", name="listacc_byid")
     */
    public function index($nPrevensiss)
    {
        $accbyid = $this->getDoctrine()
                        ->getRepository(Base2019::class)
                        ->findBy(array('nPrevensiss'=>$nPrevensiss));

        return $this->render('listacc_byid/index.html.twig', array('lsbyid'=>$accbyid));
    }
}
