<?php

namespace App\Controller;

use App\Entity\Base2019;
use App\Form\NewMembreType;
//use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
//use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\AbstractQuery;

class ListAccidentsController extends AbstractController
{
    /**
     * @Route("/list/accidents", name="list_accidents")
     */
    public function index()
    {
        $accidents = $this->getDoctrine()
                        ->getRepository(Base2019::class)
                        ->findBy(array(), array('dateAccident' => 'DESC'));


        return $this->render('list_accidents/index.html.twig', array('ls' => $accidents)
        );
    }

    /**
     * @Route("/list/accidents/2019", name="list_accidents2019")
     */
    public function l2019()
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository(Base2019::class);

        $list2019 = $repository->createQueryBuilder('a')
            ->where('a.dateAccident Like :date')
            ->setParameter('date', '2019%')
            ->getQuery()
            ->execute();

            return $this->render('list_accidents/index.html.twig', array('ls' => $list2019)
        );
    }

    /**
     * @Route("/list/accidents/2020", name="list_accidents2020")
     */
    public function l2020()
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository(Base2019::class);

        $list2020 = $repository->createQueryBuilder('a')
            ->where('a.dateAccident Like :date')
            ->setParameter('date', '2020%')
            ->getQuery()
            ->execute();

            return $this->render('list_accidents/index.html.twig', array('ls' => $list2020)
        );
    }


    /**
     * @Route("/delete/{nPrevensiss}", methods={"DELETE"})
     */
    public function delete(Request $request, $nPrevensiss){

        $entityManager = $this->getDoctrine()->getManager();
        $NPrevensiss = $entityManager->getRepository(Base2019::class)
                                    ->findOneBy(array('nPrevensiss'=>$nPrevensiss));


        $entityManager->remove($NPrevensiss);
        $entityManager->flush();

        $response = new Response();
        $response->send();

        //redirige la page
        //return $this->redirectToRoute('list_accidents');
    }

}
