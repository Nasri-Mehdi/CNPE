<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\AbstractQuery;

class ListMembreController extends AbstractController
{
    /**
     * @Route("/list/membre", name="list_membre")
     */
    public function index()
    {
        /*$em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository(User::class);*/

        $Membres = $this->getDoctrine()
                        ->getRepository(User::class)
                        ->findBy(array(), array('role' => 'DESC'));

        /*$Membres = $repository->createQueryBuilder('a')
            ->where("a.role = :role")
            ->setParameter('role', 'Membre')
            ->getQuery()
            ->execute();*/

        return $this->render('list_membre/index.html.twig', array('mem'=>$Membres)
        );
    }

    /**
     * @Route("/membre/delete/{id}", methods={"DELETE"})
     */
    public function delete(Request $request, $id){

        $entityManager = $this->getDoctrine()->getManager();
        $repository = $entityManager->getRepository(User::class)
                                    ->findOneBy(array('id'=>$id));


        $entityManager->remove($repository);
        $entityManager->flush();

        $response = new Response();
        $response->send();

        //redirige la page
        //return $this->redirectToRoute('list_accidents');
    }
}
