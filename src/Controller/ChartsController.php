<?php

namespace App\Controller;

use App\Entity\Base2019;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\AbstractQuery;

class ChartsController extends AbstractController
{
    /**
     * @Route("/charts", name="charts")
     */
    public function AccidentParTypeAB()
    {
        $em = $this->getDoctrine()->getManager();
       
        $repository = $em->getRepository(Base2019::class);


//-------------------------------------------------------------------------------
// ******************************* Premier Charts********************************
//-------------------------------------------------------------------------------


        $queryAB = $repository->createQueryBuilder('a')
            ->select("count(a.typeAccident)")
            ->where("a.typeAccident = :type")
            ->setParameter('type', 'Bénin')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;
            
        $queryPA = $repository->createQueryBuilder('a')
            ->select("count(a.typeAccident)")
            ->where("a.typeAccident = :type")
            ->setParameter('type', 'PA')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryAAA = $repository->createQueryBuilder('a')
            ->select("count(a.typeAccident)")
            ->where("a.typeAccident = :type")
            ->setParameter('type', 'Avec arrêt')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryASA = $repository->createQueryBuilder('a')
            ->select("count(a.typeAccident)")
            ->where("a.typeAccident = :type")
            ->setParameter('type', 'Sans arrêt')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querySD = $repository->createQueryBuilder('a')
            ->select("count(a.typeAccident)")
            ->where("a.typeAccident = :type")
            ->setParameter('type', 'SD')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;
       
        $queryM = $repository->createQueryBuilder('a')
            ->select("count(a.typeAccident)")
            ->where("a.typeAccident = :type")
            ->setParameter('type', 'Mortel')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;
            
        $queryR = $repository->createQueryBuilder('a')
            ->select("count(a.typeAccident)")
            ->where("a.typeAccident = :type")
            ->setParameter('type', 'Refus CPAM')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->setMaxResults(1)
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;
            //->getSingleScalarResult();


        $queryAB7 = $repository->createQueryBuilder('a')
            ->select("count(a.typeAccident)")
            ->where("a.typeAccident = :type and a.dateAccident >= :date")
            ->setParameter('type', 'Bénin')
			->setParameter('date', new \DateTime('-7 day'))
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;
            
        $queryPA7 = $repository->createQueryBuilder('a')
            ->select("count(a.typeAccident)")
            ->where("a.typeAccident = :type and a.dateAccident >= :date")
            ->setParameter('type', 'PA')
            ->setParameter('date', new \DateTime('-7 day'))
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryAAA7 = $repository->createQueryBuilder('a')
            ->select("count(a.typeAccident)")
            ->where("a.typeAccident = :type and a.dateAccident >= :date")
            ->setParameter('type', 'Avec arrêt')
			->setParameter('date', new \DateTime('-7 day'))
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryASA7 = $repository->createQueryBuilder('a')
            ->select("count(a.typeAccident)")
            ->where("a.typeAccident = :type and a.dateAccident >= :date")
            ->setParameter('type', 'Sans arrêt')
			->setParameter('date', new \DateTime('-7 day'))
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querySD7 = $repository->createQueryBuilder('a')
            ->select("count(a.typeAccident)")
            ->where("a.typeAccident = :type and a.dateAccident >= :date")
            ->setParameter('type', 'SD')
			->setParameter('date', new \DateTime('-7 day'))
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;
       
        $queryM7 = $repository->createQueryBuilder('a')
            ->select("count(a.typeAccident)")
            ->where("a.typeAccident = :type and a.dateAccident >= :date")
            ->setParameter('type', 'Mortel')
			->setParameter('date', new \DateTime('-7 day'))
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;
            
        $queryR7 = $repository->createQueryBuilder('a')
            ->select("count(a.typeAccident)")
            ->where("a.typeAccident = :type and a.dateAccident >= :date")
            ->setParameter('type', 'Refus CPAM')
			->setParameter('date', new \DateTime('-7 day'))
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->setMaxResults(1)
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;



//---------------------------------------------------------------------------------
// ********************************2eme Chart *************************************
//---------------------------------------------------------------------------------


        $queryTypo1 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo")
            ->setParameter("typo", "Accident de plain-pied")
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryTypo2 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo")
            ->setParameter("typo", "Chute avec dénivellation")
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryTypo3 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo")
            ->setParameter("typo", "Objet en cours de manipulation")
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryTypo4 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo")
            ->setParameter("typo", "Objet en cours de transport manuel")
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryTypo5 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo")
            ->setParameter("typo", "Objet, particule en mvt accidentel")
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryTypo6 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo")
            ->setParameter("typo", "Appareil, engin de levage, manut.")
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryTypo7 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo")
            ->setParameter("typo", "Accessoires de levage & d'amarrage")
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryTypo8 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo")
            ->setParameter("typo", "Vehicule en circulation")
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryTypo9 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo")
            ->setParameter("typo", "Mach. Prod. & transform. Énergie")
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryTypo10 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo")
            ->setParameter("typo", "Organe de transmission")
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryTypo11 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo")
            ->setParameter("typo", "Machine et matériel à souder")
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryTypo12 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo")
            ->setParameter("typo", "Matériel ou engin de terrassement")
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryTypo13 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo")
            ->setParameter("typo", "Machine-outil")
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryTypo14 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo")
            ->setParameter("typo", "Outil port. tenu, guidé à la main")
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryTypo15 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo")
            ->setParameter("typo", "Outil individuel à main")
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryTypo16 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo")
            ->setParameter("typo", "Pression, appareil à pression")
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryTypo17 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo")
            ->setParameter("typo", "Chaleur, produits chauds")
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryTypo18 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo")
            ->setParameter("typo", "Froid, produits froids")
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryTypo19 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo")
            ->setParameter("typo", "Produits chimiques dangereux")
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryTypo20 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo")
            ->setParameter("typo", "Vapeur, gaz, poussière")
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryTypo21 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo")
            ->setParameter("typo", "Matière combustible en flamme")
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryTypo22 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo")
            ->setParameter("typo", "Matière explosive")
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryTypo23 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo")
            ->setParameter("typo", "Electricité")
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryTypo24 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo")
            ->setParameter("typo", "Rayonnment ionisants")
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryTypo25 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo")
            ->setParameter("typo", "Divers: incendie rixe malaise…")
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryTypo26 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo")
            ->setParameter("typo", "Déclaration non classée")
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;




//-------------------------------------------------------------------------------
// ***************************** 3eme chart *************************************
//--------------------------------------------------------------------------------


        $querytSiege = $repository->createQueryBuilder('b')
            ->select("count(b.siegeLesions)")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR);

        $querySiege1 = $repository->createQueryBuilder('a')
            ->select("count(a.siegeLesions)*100")
            ->where("a.siegeLesions = :siege")
            ->setParameter('siege', 'Buste')
            ->groupBy("a.siegeLesions")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR);

        $querySiege2 = $repository->createQueryBuilder('a')
            ->select("count(a.siegeLesions)*100")
            ->where("a.siegeLesions = :siege")
            ->setParameter('siege', 'Main')
            ->groupBy("a.siegeLesions")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR);

        $querySiege3 = $repository->createQueryBuilder('a')
            ->select("count(a.siegeLesions)*100")
            ->where("a.siegeLesions = :siege")
            ->setParameter('siege', 'Membre inférieur')
            ->groupBy("a.siegeLesions")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR);

        $querySiege4 = $repository->createQueryBuilder('a')
            ->select("count(a.siegeLesions)*100")
            ->where("a.siegeLesions = :siege")
            ->setParameter('siege', 'Membre supérieur')
            ->groupBy("a.siegeLesions")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR);

        $querySiege5 = $repository->createQueryBuilder('a')
            ->select("count(a.siegeLesions)*100")
            ->where("a.siegeLesions = :siege")
            ->setParameter('siege', 'Pied')
            ->groupBy("a.siegeLesions")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR);

        $querySiege6 = $repository->createQueryBuilder('a')
            ->select("count(a.siegeLesions)*100")
            ->where("a.siegeLesions = :siege")
            ->setParameter('siege', 'Siège interne')
            ->groupBy("a.siegeLesions")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR);

        $querySiege7 = $repository->createQueryBuilder('a')
            ->select("count(a.siegeLesions)*100")
            ->where("a.siegeLesions = :siege")
            ->setParameter('siege', 'Tête')
            ->groupBy("a.siegeLesions")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR);

        $querySiege8 = $repository->createQueryBuilder('a')
            ->select("count(a.siegeLesions)*100")
            ->where("a.siegeLesions = :siege")
            ->setParameter('siege', 'Yeux')
            ->groupBy("a.siegeLesions")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR);

        $querySiege9 = $repository->createQueryBuilder('a')
            ->select("count(a.siegeLesions)*100")
            ->where("a.siegeLesions = :siege")
            ->setParameter('siege', 'Divers:multiples')
            ->groupBy("a.siegeLesions")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR);




//-----------------------------------------------------------------------------
// ************************************ 4eme Chart ********************************
//-------------------------------------------------------------------------------

    // ********************************** total accident par service **************************

        $queryService1 = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service")
            ->setParameter('service', 'APS')
            ->groupBy("a.service")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryService2 = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service")
            ->setParameter('service', 'CDT')
            ->groupBy("a.service")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryService3 = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service")
            ->setParameter('service', 'DIR')
            ->groupBy("a.service")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryService4 = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service")
            ->setParameter('service', 'ECT')
            ->groupBy("a.service")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryService5 = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service")
            ->setParameter('service', 'FIA')
            ->groupBy("a.service")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryService6 = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service")
            ->setParameter('service', 'GNU')
            ->groupBy("a.service")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryService7 = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service")
            ->setParameter('service', 'ISI')
            ->groupBy("a.service")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryService8 = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service")
            ->setParameter('service', 'MCE')
            ->groupBy("a.service")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryService9 = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service")
            ->setParameter('service', 'MRH')
            ->groupBy("a.service")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryService10 = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service")
            ->setParameter('service', 'MSR')
            ->groupBy("a.service")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryService11 = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service")
            ->setParameter('service', 'MTE')
            ->groupBy("a.service")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryService12 = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service")
            ->setParameter('service', 'PMO')
            ->groupBy("a.service")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryService13 = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service")
            ->setParameter('service', 'SAU')
            ->groupBy("a.service")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryService14 = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service")
            ->setParameter('service', 'SCF')
            ->groupBy("a.service")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryService15 = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service")
            ->setParameter('service', 'SIR')
            ->groupBy("a.service")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryService16 = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service")
            ->setParameter('service', 'SMP')
            ->groupBy("a.service")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryService17 = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service")
            ->setParameter('service', 'SPR')
            ->groupBy("a.service")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryService18 = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service")
            ->setParameter('service', 'SST')
            ->groupBy("a.service")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        /*$queryService19 = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service")
            ->setParameter('service', 'AMT')
            ->groupBy("a.service")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;*/

    // ********************************** COUNT APS BY TYPE ACCIDENT **************************

        $queryS1AAA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'APS')
            ->setParameter('type', 'Avec arrêt')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS1ASA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'APS')
            ->setParameter('type', 'Sans arrêt')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS1AB = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'APS')
            ->setParameter('type', 'Bénin')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS1PA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'APS')
            ->setParameter('type', 'PA')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS1SD = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'APS')
            ->setParameter('type', 'SD')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS1M = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'APS')
            ->setParameter('type', 'Mortel')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS1R = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'APS')
            ->setParameter('type', 'Refus CPAM')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

    // ********************************** COUNT CDT BY TYPE ACCIDENT **************************

        $queryS2AAA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'CDT')
			->setParameter('type', 'Avec arrêt')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS2ASA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'CDT')
			->setParameter('type', 'Sans arrêt')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS2AB = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'CDT')
			->setParameter('type', 'Bénin')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS2PA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'CDT')
			->setParameter('type', 'PA')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS2SD = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'CDT')
			->setParameter('type', 'SD')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS2M = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'CDT')
			->setParameter('type', 'Mortel')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS2R = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'CDT')
			->setParameter('type', 'Refus CPAM')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

    // ********************************** COUNT DIR BY TYPE ACCIDENT **************************

        $queryS3AAA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'DIR')
			->setParameter('type', 'Avec arrêt')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS3ASA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'DIR')
			->setParameter('type', 'Sans arrêt')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS3AB = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'DIR')
			->setParameter('type', 'Bénin')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS3PA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'DIR')
			->setParameter('type', 'PA')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS3SD = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'DIR')
			->setParameter('type', 'SD')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS3M = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'DIR')
			->setParameter('type', 'Mortel')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS3R = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'DIR')
			->setParameter('type', 'Refus CPAM')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;


    // ********************************** COUNT ECT BY TYPE ACCIDENT **************************

        $queryS4AAA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'ECT')
			->setParameter('type', 'Avec arrêt')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS4ASA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'ECT')
			->setParameter('type', 'Sans arrêt')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS4AB = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'ECT')
			->setParameter('type', 'Bénin')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS4PA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'ECT')
			->setParameter('type', 'PA')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS4SD = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'ECT')
			->setParameter('type', 'SD')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS4M = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'ECT')
			->setParameter('type', 'Mortel')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS4R = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'ECT')
			->setParameter('type', 'Refus CPAM')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;


    // ********************************** COUNT FIA BY TYPE ACCIDENT **************************

        $queryS5AAA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'FIA')
			->setParameter('type', 'Avec arrêt')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS5ASA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'FIA')
			->setParameter('type', 'Sans arrêt')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS5AB = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'FIA')
			->setParameter('type', 'Bénin')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS5PA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'FIA')
			->setParameter('type', 'PA')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS5SD = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'FIA')
			->setParameter('type', 'SD')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS5M = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'FIA')
			->setParameter('type', 'Mortel')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS5R = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'FIA')
			->setParameter('type', 'Refus CPAM')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

    // ********************************** COUNT GNU BY TYPE ACCIDENT **************************
        
        $queryS6AAA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'GNU')
			->setParameter('type', 'Avec arrêt')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS6ASA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'GNU')
			->setParameter('type', 'Sans arrêt')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS6AB = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'GNU')
			->setParameter('type', 'Bénin')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS6PA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'GNU')
			->setParameter('type', 'PA')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS6SD = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'GNU')
			->setParameter('type', 'SD')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS6M = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'GNU')
			->setParameter('type', 'Mortel')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS6R = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'GNU')
			->setParameter('type', 'Refus CPAM')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;


    // ********************************** COUNT ISI BY TYPE ACCIDENT **************************
        
        $queryS7AAA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'ISI')
			->setParameter('type', 'Avec arrêt')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS7ASA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'ISI')
			->setParameter('type', 'Sans arrêt')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS7AB = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'ISI')
			->setParameter('type', 'Bénin')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS7PA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'ISI')
			->setParameter('type', 'PA')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS7SD = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'ISI')
			->setParameter('type', 'SD')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS7M = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'ISI')
			->setParameter('type', 'Mortel')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS7R = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'ISI')
			->setParameter('type', 'Refus CPAM')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;



    // ********************************** COUNT MCE BY TYPE ACCIDENT **************************
        
        $queryS8AAA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'MCE')
            ->setParameter('type', 'Avec arrêt')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS8ASA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'MCE')
            ->setParameter('type', 'Sans arrêt')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS8AB = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'MCE')
            ->setParameter('type', 'Bénin')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS8PA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'MCE')
            ->setParameter('type', 'PA')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS8SD = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'MCE')
            ->setParameter('type', 'SD')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS8M = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'MCE')
            ->setParameter('type', 'Mortel')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS8R = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'MCE')
            ->setParameter('type', 'Refus CPAM')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;


    // ********************************** COUNT MRH BY TYPE ACCIDENT **************************

        $queryS9AAA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'MRH')
            ->setParameter('type', 'Avec arrêt')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS9ASA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'MRH')
            ->setParameter('type', 'Sans arrêt')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS9AB = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'MRH')
            ->setParameter('type', 'Bénin')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS9PA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'MRH')
            ->setParameter('type', 'PA')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS9SD = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'MRH')
            ->setParameter('type', 'SD')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS9M = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'MRH')
            ->setParameter('type', 'Mortel')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS9R = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'MRH')
            ->setParameter('type', 'Refus CPAM')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;


    // ********************************** COUNT MSR BY TYPE ACCIDENT **************************
       
        $queryS10AAA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'MSR')
            ->setParameter('type', 'Avec arrêt')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS10ASA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'MSR')
            ->setParameter('type', 'Sans arrêt')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS10AB = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'MSR')
            ->setParameter('type', 'Bénin')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS10PA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'MSR')
            ->setParameter('type', 'PA')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS10SD = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'MSR')
            ->setParameter('type', 'SD')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS10M = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'MSR')
            ->setParameter('type', 'Mortel')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS10R = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'MSR')
            ->setParameter('type', 'Refus CPAM')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;


    // ********************************** COUNT MTE BY TYPE ACCIDENT **************************
        
        $queryS11AAA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'MTE')
            ->setParameter('type', 'Avec arrêt')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS11ASA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'MTE')
            ->setParameter('type', 'Sans arrêt')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS11AB = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'MTE')
            ->setParameter('type', 'Bénin')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS11PA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'MTE')
            ->setParameter('type', 'PA')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS11SD = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'MTE')
            ->setParameter('type', 'SD')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS11M = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'MTE')
            ->setParameter('type', 'Mortel')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS11R = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'MTE')
            ->setParameter('type', 'Refus CPAM')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;


    // ********************************** COUNT PMO BY TYPE ACCIDENT **************************

        $queryS12AAA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'PMO')
            ->setParameter('type', 'Avec arrêt')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS12ASA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'PMO')
            ->setParameter('type', 'Sans arrêt')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS12AB = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'PMO')
            ->setParameter('type', 'Bénin')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS12PA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'PMO')
            ->setParameter('type', 'PA')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS12SD = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'PMO')
            ->setParameter('type', 'SD')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS12M = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'PMO')
            ->setParameter('type', 'Mortel')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS12R = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'PMO')
            ->setParameter('type', 'Refus CPAM')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;


    // ********************************** COUNT SAU BY TYPE ACCIDENT **************************

        $queryS13AAA = $repository->createQueryBuilder('a')
			->select("count(a.service)")
			->where("a.service = :service AND a.typeAccident = :type")
			->setParameter('service', 'SAU')
			->setParameter('type', 'Avec arrêt')
			->groupBy("a.typeAccident")
			->getQuery()
			->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

		$queryS13ASA = $repository->createQueryBuilder('a')
			->select("count(a.service)")
			->where("a.service = :service AND a.typeAccident = :type")
			->setParameter('service', 'SAU')
			->setParameter('type', 'Sans arrêt')
			->groupBy("a.typeAccident")
			->getQuery()
			->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

		$queryS13AB = $repository->createQueryBuilder('a')
			->select("count(a.service)")
			->where("a.service = :service AND a.typeAccident = :type")
			->setParameter('service', 'SAU')
			->setParameter('type', 'Bénin')
            ->groupBy("a.typeAccident")
		    ->getQuery()
		    ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

		$queryS13PA = $repository->createQueryBuilder('a')
		    ->select("count(a.service)")
		    ->where("a.service = :service AND a.typeAccident = :type")
		    ->setParameter('service', 'SAU')
			->setParameter('type', 'PA')
		    ->groupBy("a.typeAccident")
		    ->getQuery()
		    ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

		$queryS13SD = $repository->createQueryBuilder('a')
		    ->select("count(a.service)")
		    ->where("a.service = :service AND a.typeAccident = :type")
		    ->setParameter('service', 'SAU')
		    ->setParameter('type', 'SD')
			->groupBy("a.typeAccident")
			->getQuery()
			->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

		$queryS13M = $repository->createQueryBuilder('a')
			->select("count(a.service)")
			->where("a.service = :service AND a.typeAccident = :type")
			->setParameter('service', 'SAU')
			->setParameter('type', 'Mortel')
			->groupBy("a.typeAccident")
			->getQuery()
			->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

		$queryS13R = $repository->createQueryBuilder('a')
			->select("count(a.service)")
			->where("a.service = :service AND a.typeAccident = :type")
			->setParameter('service', 'SAU')
			->setParameter('type', 'Refus CPAM')
			->groupBy("a.typeAccident")
			->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;
            

    // ********************************** COUNT SCF BY TYPE ACCIDENT **************************

        $queryS14AAA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'SCF')
            ->setParameter('type', 'Avec arrêt')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS14ASA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'SCF')
            ->setParameter('type', 'Sans arrêt')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS14AB = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'SCF')
            ->setParameter('type', 'Bénin')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS14PA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'SCF')
            ->setParameter('type', 'PA')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS14SD = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'SCF')
            ->setParameter('type', 'SD')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS14M = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'SCF')
            ->setParameter('type', 'Mortel')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS14R = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'SCF')
            ->setParameter('type', 'Refus CPAM')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;


    // ********************************** COUNT SIR BY TYPE ACCIDENT **************************
        
        $queryS15AAA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'SIR')
            ->setParameter('type', 'Avec arrêt')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS15ASA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'SIR')
            ->setParameter('type', 'Sans arrêt')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS15AB = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'SIR')
            ->setParameter('type', 'Bénin')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS15PA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'SIR')
            ->setParameter('type', 'PA')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS15SD = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'SIR')
            ->setParameter('type', 'SD')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS15M = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'SIR')
            ->setParameter('type', 'Mortel')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS15R = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'SIR')
            ->setParameter('type', 'Refus CPAM')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;


    // ********************************** COUNT SMP BY TYPE ACCIDENT **************************

        $queryS16AAA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'SMP')
            ->setParameter('type', 'Avec arrêt')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS16ASA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'SMP')
            ->setParameter('type', 'Sans arrêt')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS16AB = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'SMP')
            ->setParameter('type', 'Bénin')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS16PA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'SMP')
            ->setParameter('type', 'PA')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS16SD = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'SMP')
            ->setParameter('type', 'SD')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS16M = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'SMP')
            ->setParameter('type', 'Mortel')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS16R = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'SMP')
            ->setParameter('type', 'Refus CPAM')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;


    // ********************************** COUNT SPR BY TYPE ACCIDENT **************************

        $queryS17AAA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'SPR')
            ->setParameter('type', 'Avec arrêt')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS17ASA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'SPR')
            ->setParameter('type', 'Sans arrêt')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS17AB = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'SPR')
            ->setParameter('type', 'Bénin')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS17PA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'SPR')
            ->setParameter('type', 'PA')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS17SD = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'SPR')
            ->setParameter('type', 'SD')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS17M = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'SPR')
            ->setParameter('type', 'Mortel')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS17R = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'SPR')
            ->setParameter('type', 'Refus CPAM')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;


    // ********************************** COUNT SST BY TYPE ACCIDENT **************************

        $queryS18AAA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'SST')
            ->setParameter('type', 'Avec arrêt')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS18ASA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'SST')
            ->setParameter('type', 'Sans arrêt')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS18AB = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'SST')
            ->setParameter('type', 'Bénin')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS18PA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'SST')
            ->setParameter('type', 'PA')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS18SD = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'SST')
            ->setParameter('type', 'SD')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS18M = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'SST')
            ->setParameter('type', 'Mortel')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS18R = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'SST')
            ->setParameter('type', 'Refus CPAM')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;


    // ********************************** COUNT AMT BY TYPE ACCIDENT **************************

        $queryS19AAA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'AMT')
            ->setParameter('type', 'Avec arrêt')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS19ASA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'AMT')
            ->setParameter('type', 'Sans arrêt')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS19AB = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'AMT')
            ->setParameter('type', 'Bénin')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS19PA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'AMT')
            ->setParameter('type', 'PA')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS19SD = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'AMT')
            ->setParameter('type', 'SD')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS19M = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'AMT')
            ->setParameter('type', 'Mortel')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryS19R = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type")
            ->setParameter('service', 'AMT')
            ->setParameter('type', 'Refus CPAM')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;



//---------------------------------------------------------------------------------
// ***************************************** 5eme Chart ***************************
//--------------------------------------------------------------------------------

    //---------------------- PROJET TEM -----------------------------------

        $queryP1AAA = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.projet = :pro AND a.typeAccident = :type")
            ->setParameter('pro', 'TEM')
            ->setParameter('type', 'Avec arrêt')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryP1ASA = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.projet = :pro AND a.typeAccident = :type")
            ->setParameter('pro', 'TEM')
            ->setParameter('type', 'Sans arrêt')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryP1AB = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.projet = :pro AND a.typeAccident = :type")
            ->setParameter('pro', 'TEM')
            ->setParameter('type', 'Bénin')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryP1PA = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.projet = :pro AND a.typeAccident = :type")
            ->setParameter('pro', 'TEM')
            ->setParameter('type', 'PA')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryP1SD = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.projet = :pro AND a.typeAccident = :type")
            ->setParameter('pro', 'TEM')
            ->setParameter('type', 'SD')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryP1M = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.projet = :pro AND a.typeAccident = :type")
            ->setParameter('pro', 'TEM')
            ->setParameter('type', 'Mortel')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryP1R = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.projet = :pro AND a.typeAccident = :type")
            ->setParameter('pro', 'TEM')
            ->setParameter('type', 'Refus CPAM')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

    //---------------------- PROJET 2P3519 ---------------------------------------

        $queryP2AAA = $repository->createQueryBuilder('a')
			->select("count(a.projet)")
            ->where("a.projet = :pro AND a.typeAccident = :type")
            ->setParameter('pro', '2P3519')
			->setParameter('type', 'Avec arrêt')
			->groupBy("a.typeAccident")
			->getQuery()
			->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

		$queryP2ASA = $repository->createQueryBuilder('a')
			->select("count(a.projet)")
            ->where("a.projet = :pro AND a.typeAccident = :type")
            ->setParameter('pro', '2P3519')
			->setParameter('type', 'Sans arrêt')
			->groupBy("a.typeAccident")
			->getQuery()
			->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

		$queryP2AB = $repository->createQueryBuilder('a')
			->select("count(a.projet)")
            ->where("a.projet = :pro AND a.typeAccident = :type")
            ->setParameter('pro', '2P3519')
			->setParameter('type', 'Bénin')
			->groupBy("a.typeAccident")
			->getQuery()
			->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

		$queryP2PA = $repository->createQueryBuilder('a')
			->select("count(a.projet)")
            ->where("a.projet = :pro AND a.typeAccident = :type")
            ->setParameter('pro', '2P3519')
			->setParameter('type', 'PA')
			->groupBy("a.typeAccident")
			->getQuery()
			->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

		$queryP2SD = $repository->createQueryBuilder('a')
			->select("count(a.projet)")
            ->where("a.projet = :pro AND a.typeAccident = :type")
            ->setParameter('pro', '2P3519')
			->setParameter('type', 'SD')
			->groupBy("a.typeAccident")
			->getQuery()
			->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

		$queryP2M = $repository->createQueryBuilder('a')
			->select("count(a.projet)")
            ->where("a.projet = :pro AND a.typeAccident = :type")
            ->setParameter('pro', '2P3519')
			->setParameter('type', 'Mortel')
			->groupBy("a.typeAccident")
			->getQuery()
			->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

		$queryP2R = $repository->createQueryBuilder('a')
			->select("count(a.projet)")
            ->where("a.projet = :pro AND a.typeAccident = :type")
            ->setParameter('pro', '2P3519')
			->setParameter('type', 'Refus CPAM')
			->groupBy("a.typeAccident")
			->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;
            

    // --------------------- PROJET 3P3518 ---------------------------------

        $queryP3AAA = $repository->createQueryBuilder('a')
			->select("count(a.projet)")
            ->where("a.projet = :pro AND a.typeAccident = :type")
            ->setParameter('pro', '3P3518')
			->setParameter('type', 'Avec arrêt')
			->groupBy("a.typeAccident")
			->getQuery()
			->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

		$queryP3ASA = $repository->createQueryBuilder('a')
			->select("count(a.projet)")
            ->where("a.projet = :pro AND a.typeAccident = :type")
            ->setParameter('pro', '3P3518')
			->setParameter('type', 'Sans arrêt')
			->groupBy("a.typeAccident")
			->getQuery()
			->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

		$queryP3AB = $repository->createQueryBuilder('a')
			->select("count(a.projet)")
            ->where("a.projet = :pro AND a.typeAccident = :type")
            ->setParameter('pro', '3P3518')
			->setParameter('type', 'Bénin')
			->groupBy("a.typeAccident")
			->getQuery()
			->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

		$queryP3PA = $repository->createQueryBuilder('a')
			->select("count(a.projet)")
            ->where("a.projet = :pro AND a.typeAccident = :type")
            ->setParameter('pro', '3P3518')
			->setParameter('type', 'PA')
			->groupBy("a.typeAccident")
			->getQuery()
			->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

		$queryP3SD = $repository->createQueryBuilder('a')
			->select("count(a.projet)")
            ->where("a.projet = :pro AND a.typeAccident = :type")
            ->setParameter('pro', '3P3518')
			->setParameter('type', 'SD')
			->groupBy("a.typeAccident")
			->getQuery()
			->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

		$queryP3M = $repository->createQueryBuilder('a')
			->select("count(a.projet)")
            ->where("a.projet = :pro AND a.typeAccident = :type")
            ->setParameter('pro', '3P3518')
			->setParameter('type', 'Mortel')
			->groupBy("a.typeAccident")
			->getQuery()
			->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

		$queryP3R = $repository->createQueryBuilder('a')
			->select("count(a.projet)")
            ->where("a.projet = :pro AND a.typeAccident = :type")
            ->setParameter('pro', '3P3518')
			->setParameter('type', 'Refus CPAM')
			->groupBy("a.typeAccident")
			->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;
            
    //------------------------- PROJET 4R3519 ------------------------------------

        $queryP4AAA = $repository->createQueryBuilder('a')
			->select("count(a.projet)")
            ->where("a.projet = :pro AND a.typeAccident = :type")
            ->setParameter('pro', '4R3519')
			->setParameter('type', 'Avec arrêt')
			->groupBy("a.typeAccident")
			->getQuery()
			->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

		$queryP4ASA = $repository->createQueryBuilder('a')
			->select("count(a.projet)")
            ->where("a.projet = :pro AND a.typeAccident = :type")
            ->setParameter('pro', '4R3519')
			->setParameter('type', 'Sans arrêt')
			->groupBy("a.typeAccident")
			->getQuery()
			->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

		$queryP4AB = $repository->createQueryBuilder('a')
			->select("count(a.projet)")
            ->where("a.projet = :pro AND a.typeAccident = :type")
            ->setParameter('pro', '4R3519')
			->setParameter('type', 'Bénin')
			->groupBy("a.typeAccident")
			->getQuery()
			->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

		$queryP4PA = $repository->createQueryBuilder('a')
			->select("count(a.projet)")
            ->where("a.projet = :pro AND a.typeAccident = :type")
            ->setParameter('pro', '4R3519')
			->setParameter('type', 'PA')
			->groupBy("a.typeAccident")
			->getQuery()
			->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

		$queryP4SD = $repository->createQueryBuilder('a')
			->select("count(a.projet)")
            ->where("a.projet = :pro AND a.typeAccident = :type")
            ->setParameter('pro', '4R3519')
			->setParameter('type', 'SD')
			->groupBy("a.typeAccident")
			->getQuery()
			->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

		$queryP4M = $repository->createQueryBuilder('a')
			->select("count(a.projet)")
            ->where("a.projet = :pro AND a.typeAccident = :type")
            ->setParameter('pro', '4R3519')
			->setParameter('type', 'Mortel')
			->groupBy("a.typeAccident")
			->getQuery()
			->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

		$queryP4R = $repository->createQueryBuilder('a')
			->select("count(a.projet)")
            ->where("a.projet = :pro AND a.typeAccident = :type")
            ->setParameter('pro', '4R3519')
			->setParameter('type', 'Refus CPAM')
			->groupBy("a.typeAccident")
			->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;
            
    //-------------------- PROJET HORS ZONE -----------------------------

        $queryP5AAA = $repository->createQueryBuilder('a')
			->select("count(a.projet)")
            ->where("a.projet = :pro AND a.typeAccident = :type")
            ->setParameter('pro', 'Hors process')
			->setParameter('type', 'Avec arrêt')
			->groupBy("a.typeAccident")
			->getQuery()
			->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

		$queryP5ASA = $repository->createQueryBuilder('a')
			->select("count(a.projet)")
            ->where("a.projet = :pro AND a.typeAccident = :type")
            ->setParameter('pro', 'Hors process')
			->setParameter('type', 'Sans arrêt')
			->groupBy("a.typeAccident")
			->getQuery()
			->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

		$queryP5AB = $repository->createQueryBuilder('a')
			->select("count(a.projet)")
            ->where("a.projet = :pro AND a.typeAccident = :type")
            ->setParameter('pro', 'Hors process')
			->setParameter('type', 'Bénin')
			->groupBy("a.typeAccident")
			->getQuery()
			->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

		$queryP5PA = $repository->createQueryBuilder('a')
			->select("count(a.projet)")
            ->where("a.projet = :pro AND a.typeAccident = :type")
            ->setParameter('pro', 'Hors process')
			->setParameter('type', 'PA')
			->groupBy("a.typeAccident")
			->getQuery()
			->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

		$queryP5SD = $repository->createQueryBuilder('a')
			->select("count(a.projet)")
            ->where("a.projet = :pro AND a.typeAccident = :type")
            ->setParameter('pro', 'Hors process')
			->setParameter('type', 'SD')
			->groupBy("a.typeAccident")
			->getQuery()
			->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

		$queryP5M = $repository->createQueryBuilder('a')
			->select("count(a.projet)")
            ->where("a.projet = :pro AND a.typeAccident = :type")
            ->setParameter('pro', 'Hors process')
			->setParameter('type', 'Mortel')
			->groupBy("a.typeAccident")
			->getQuery()
			->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

		$queryP5R = $repository->createQueryBuilder('a')
			->select("count(a.projet)")
            ->where("a.projet = :pro AND a.typeAccident = :type")
            ->setParameter('pro', 'Hors process')
			->setParameter('type', 'Refus CPAM')
			->groupBy("a.typeAccident")
			->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;
            

//---------------------------------------------------------------------------------
// ************************************ 6eme Chart ********************************
//--------------------------------------------------------------------------------

    // *************************** AAA par mois *********************************
        $queryM01AAA = $repository->createQueryBuilder('a')
			->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-01%')
			->setParameter('type', 'Avec arrêt')
			->groupBy("a.typeAccident")
			->getQuery()
			->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

		$queryM02AAA = $repository->createQueryBuilder('a')
			->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-02%')
			->setParameter('type', 'Avec arrêt')
			->groupBy("a.typeAccident")
			->getQuery()
			->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

		$queryM03AAA = $repository->createQueryBuilder('a')
			->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-03%')
			->setParameter('type', 'Avec arrêt')
			->groupBy("a.typeAccident")
			->getQuery()
			->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

		$queryM04AAA = $repository->createQueryBuilder('a')
			->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-04%')
			->setParameter('type', 'Avec arrêt')
			->groupBy("a.typeAccident")
			->getQuery()
			->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

		$queryM05AAA = $repository->createQueryBuilder('a')
			->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-05%')
			->setParameter('type', 'Avec arrêt')
			->groupBy("a.typeAccident")
			->getQuery()
			->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

		$queryM06AAA = $repository->createQueryBuilder('a')
			->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-06%')
			->setParameter('type', 'Avec arrêt')
			->groupBy("a.typeAccident")
			->getQuery()
			->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

		$queryM07AAA = $repository->createQueryBuilder('a')
			->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-07%')
			->setParameter('type', 'Avec arrêt')
			->groupBy("a.typeAccident")
			->getQuery()
			->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

		$queryM08AAA = $repository->createQueryBuilder('a')
			->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-08%')
			->setParameter('type', 'Avec arrêt')
			->groupBy("a.typeAccident")
			->getQuery()
			->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

		$queryM09AAA = $repository->createQueryBuilder('a')
			->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-09%')
			->setParameter('type', 'Avec arrêt')
			->groupBy("a.typeAccident")
			->getQuery()
			->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

		$queryM10AAA = $repository->createQueryBuilder('a')
			->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-10%')
			->setParameter('type', 'Avec arrêt')
			->groupBy("a.typeAccident")
			->getQuery()
			->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

		$queryM11AAA = $repository->createQueryBuilder('a')
			->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-11%')
			->setParameter('type', 'Avec arrêt')
			->groupBy("a.typeAccident")
			->getQuery()
			->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

		$queryM12AAA = $repository->createQueryBuilder('a')
			->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-12%')
			->setParameter('type', 'Avec arrêt')
			->groupBy("a.typeAccident")
			->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

    // *************************** ASA par mois *********************************
        $queryM01ASA = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-01%')
            ->setParameter('type', 'Sans arrêt')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryM02ASA = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-02%')
            ->setParameter('type', 'Sans arrêt')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryM03ASA = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-03%')
            ->setParameter('type', 'Sans arrêt')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryM04ASA = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-04%')
            ->setParameter('type', 'Sans arrêt')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryM05ASA = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-05%')
            ->setParameter('type', 'Sans arrêt')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryM06ASA = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-06%')
            ->setParameter('type', 'Sans arrêt')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryM07ASA = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-07%')
            ->setParameter('type', 'Sans arrêt')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryM08ASA = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-08%')
            ->setParameter('type', 'Sans arrêt')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryM09ASA = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-09%')
            ->setParameter('type', 'Sans arrêt')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryM10ASA = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-10%')
            ->setParameter('type', 'Sans arrêt')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryM11ASA = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-11%')
            ->setParameter('type', 'Sans arrêt')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryM12ASA = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-12%')
            ->setParameter('type', 'Sans arrêt')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

    // *************************** AB par mois **********************************
        $queryM01AB = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-01%')
            ->setParameter('type', 'Bénin')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryM02AB = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-02%')
            ->setParameter('type', 'Bénin')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryM03AB = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-03%')
            ->setParameter('type', 'Bénin')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryM04AB = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-04%')
            ->setParameter('type', 'Bénin')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryM05AB = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-05%')
            ->setParameter('type', 'Bénin')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryM06AB = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-06%')
            ->setParameter('type', 'Bénin')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryM07AB = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-07%')
            ->setParameter('type', 'Bénin')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryM08AB = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-08%')
            ->setParameter('type', 'Bénin')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryM09AB = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-09%')
            ->setParameter('type', 'Bénin')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryM10AB = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-10%')
            ->setParameter('type', 'Bénin')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryM11AB = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-11%')
            ->setParameter('type', 'Bénin')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryM12AB = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-12%')
            ->setParameter('type', 'Bénin')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

    // *************************** PA par mois **********************************
        $queryM01PA = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-01%')
            ->setParameter('type', 'PA')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryM02PA = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-02%')
            ->setParameter('type', 'PA')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryM03PA = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-03%')
            ->setParameter('type', 'PA')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryM04PA = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-04%')
            ->setParameter('type', 'PA')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryM05PA = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-05%')
            ->setParameter('type', 'PA')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryM06PA = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-06%')
            ->setParameter('type', 'PA')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryM07PA = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-07%')
            ->setParameter('type', 'PA')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryM08PA = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-08%')
            ->setParameter('type', 'PA')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryM09PA = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-09%')
            ->setParameter('type', 'PA')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryM10PA = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-10%')
            ->setParameter('type', 'PA')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryM11PA = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-11%')
            ->setParameter('type', 'PA')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryM12PA = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-12%')
            ->setParameter('type', 'PA')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

    // *************************** SD par mois **********************************
        $queryM01SD = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-01%')
            ->setParameter('type', 'SD')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryM02SD = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-02%')
            ->setParameter('type', 'SD')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryM03SD = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-03%')
            ->setParameter('type', 'SD')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryM04SD = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-04%')
            ->setParameter('type', 'SD')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryM05SD = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-05%')
            ->setParameter('type', 'SD')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryM06SD = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-06%')
            ->setParameter('type', 'SD')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryM07SD = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-07%')
            ->setParameter('type', 'SD')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryM08SD = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-08%')
            ->setParameter('type', 'SD')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryM09SD = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-09%')
            ->setParameter('type', 'SD')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryM10SD = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-10%')
            ->setParameter('type', 'SD')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryM11SD = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-11%')
            ->setParameter('type', 'SD')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryM12SD = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-12%')
            ->setParameter('type', 'SD')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

    // *************************** Mortel par mois ******************************
        $queryM01M = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-01%')
            ->setParameter('type', 'Mortel')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryM02M = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-02%')
            ->setParameter('type', 'Mortel')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryM03M = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-03%')
            ->setParameter('type', 'Mortel')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryM04M = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-04%')
            ->setParameter('type', 'Mortel')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryM05M = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-05%')
            ->setParameter('type', 'Mortel')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryM06M = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-06%')
            ->setParameter('type', 'Mortel')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryM07M = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-07%')
            ->setParameter('type', 'Mortel')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryM08M = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-08%')
            ->setParameter('type', 'Mortel')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryM09M = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-09%')
            ->setParameter('type', 'Mortel')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryM10M = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-10%')
            ->setParameter('type', 'Mortel')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryM11M = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-11%')
            ->setParameter('type', 'Mortel')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryM12M = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-12%')
            ->setParameter('type', 'Mortel')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

    // *************************** Refus CPAM par mois **************************
        $queryM01R = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-01%')
            ->setParameter('type', 'Refus CPAM')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryM02R = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-02%')
            ->setParameter('type', 'Refus CPAM')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryM03R = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-03%')
            ->setParameter('type', 'Refus CPAM')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryM04R = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-04%')
            ->setParameter('type', 'Refus CPAM')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryM05R = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-05%')
            ->setParameter('type', 'Refus CPAM')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryM06R = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-06%')
            ->setParameter('type', 'Refus CPAM')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryM07R = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-07%')
            ->setParameter('type', 'Refus CPAM')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryM08R = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-08%')
            ->setParameter('type', 'Refus CPAM')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryM09R = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-09%')
            ->setParameter('type', 'Refus CPAM')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryM10R = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-10%')
            ->setParameter('type', 'Refus CPAM')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryM11R = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-11%')
            ->setParameter('type', 'Refus CPAM')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryM12R = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.dateAccident Like :date AND a.typeAccident = :type")
            ->setParameter('date', '2019-12%')
            ->setParameter('type', 'Refus CPAM')
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;


        
                    

//---------------------------------------------------------------------------------
// ************************************* 7eme chart *******************************
//---------------------------------------------------------------------------------

            
        $querydate = $repository->createQueryBuilder('a')
            ->select("a.nPrevensiss, a.dateAccident, a.typeAccident")
            ->where("a.dateAccident >= :date and a.aseRealise = :ase")
            ->setParameter('date', new \DateTime('-16 day'))
            ->setParameter('ase', 'NON')
            ->orderBy("a.dateAccident" , "DESC")
            ->getQuery()
            ->execute();


// ******************************** test ****************************************

// ********************** return le donnees ********************************************
        
        return $this->render('charts/index.html.twig', [
            'countAB'=>$queryAB,
            'countPA'=>$queryPA,
            'countAAA'=>$queryAAA,
            'countASA'=>$queryASA,
            'countSD'=>$querySD,
            'countM'=>$queryM,
            'countR'=>$queryR,

            'countAB7'=>$queryAB7,
            'countPA7'=>$queryPA7,
            'countAAA7'=>$queryAAA7,
            'countASA7'=>$queryASA7,
            'countSD7'=>$querySD7,
            'countM7'=>$queryM7,
            'countR7'=>$queryR7,



            'lscountbytypo1'=>$queryTypo1,
            'lscountbytypo2'=>$queryTypo2,
            'lscountbytypo3'=>$queryTypo3,
            'lscountbytypo4'=>$queryTypo4,
            'lscountbytypo5'=>$queryTypo5,
            'lscountbytypo6'=>$queryTypo6,
            'lscountbytypo7'=>$queryTypo7,
            'lscountbytypo8'=>$queryTypo8,
            'lscountbytypo9'=>$queryTypo9,
            'lscountbytypo10'=>$queryTypo10,
            'lscountbytypo11'=>$queryTypo11,
            'lscountbytypo12'=>$queryTypo12,
            'lscountbytypo13'=>$queryTypo13,
            'lscountbytypo14'=>$queryTypo14,
            'lscountbytypo15'=>$queryTypo15,
            'lscountbytypo16'=>$queryTypo16,
            'lscountbytypo17'=>$queryTypo17,
            'lscountbytypo18'=>$queryTypo18,
            'lscountbytypo19'=>$queryTypo19,
            'lscountbytypo20'=>$queryTypo20,
            'lscountbytypo21'=>$queryTypo21,
            'lscountbytypo22'=>$queryTypo22,
            'lscountbytypo23'=>$queryTypo23,
            'lscountbytypo24'=>$queryTypo24,
            'lscountbytypo25'=>$queryTypo25,
            'lscountbytypo26'=>$queryTypo26,

            'cbysiege'=>$querytSiege,
            'cbysiege1'=>$querySiege1,
            'cbysiege2'=>$querySiege2,
            'cbysiege3'=>$querySiege3,
            'cbysiege4'=>$querySiege4,
            'cbysiege5'=>$querySiege5,
            'cbysiege6'=>$querySiege6,
            'cbysiege7'=>$querySiege7,
            'cbysiege8'=>$querySiege8,
            'cbysiege9'=>$querySiege9,

        //------------------------ 4eme Chart -------------------------------

            'lscountbyService1'=>$queryService1,
            'lscountbyService2'=>$queryService2,
            'lscountbyService3'=>$queryService3,
            'lscountbyService4'=>$queryService4,
            'lscountbyService5'=>$queryService5,
            'lscountbyService6'=>$queryService6,
            'lscountbyService7'=>$queryService7,
            'lscountbyService8'=>$queryService8,
            'lscountbyService9'=>$queryService9,
            'lscountbyService10'=>$queryService10,
            'lscountbyService11'=>$queryService11,
            'lscountbyService12'=>$queryService12,
            'lscountbyService13'=>$queryService13,
            'lscountbyService14'=>$queryService14,
            'lscountbyService15'=>$queryService15,
            'lscountbyService16'=>$queryService16,
            'lscountbyService17'=>$queryService17,
            'lscountbyService18'=>$queryService18,

            'lscountapsaaa'=>$queryS1AAA,
            'lscountapsasa'=>$queryS1ASA,
            'lscountapsab'=>$queryS1AB,
            'lscountapspa'=>$queryS1PA,
            'lscountapssd'=>$queryS1SD,
            'lscountapsm'=>$queryS1M,
            'lscountapsr'=>$queryS1R,

            'lscountcdtaaa'=>$queryS2AAA,
            'lscountcdtasa'=>$queryS2ASA,
            'lscountcdtab'=>$queryS2AB,
            'lscountcdtpa'=>$queryS2PA,
            'lscountcdtsd'=>$queryS2SD,
            'lscountcdtm'=>$queryS2M,
            'lscountcdtr'=>$queryS2R,

            'lscountdiraaa'=>$queryS3AAA,
            'lscountdirasa'=>$queryS3ASA,
            'lscountdirab'=>$queryS3AB,
            'lscountdirpa'=>$queryS3PA,
            'lscountdirsd'=>$queryS3SD,
            'lscountdirm'=>$queryS3M,
            'lscountdirr'=>$queryS3R,

            'lscountectaaa'=>$queryS4AAA,
            'lscountectasa'=>$queryS4ASA,
            'lscountectab'=>$queryS4AB,
            'lscountectpa'=>$queryS4PA,
            'lscountectsd'=>$queryS4SD,
            'lscountectm'=>$queryS4M,
            'lscountectr'=>$queryS4R,

            'lscountfiaaaa'=>$queryS5AAA,
            'lscountfiaasa'=>$queryS5ASA,
            'lscountfiaab'=>$queryS5AB,
            'lscountfiapa'=>$queryS5PA,
            'lscountfiasd'=>$queryS5SD,
            'lscountfiam'=>$queryS5M,
            'lscountfiar'=>$queryS5R,

            'lscountgnuaaa'=>$queryS6AAA,
            'lscountgnuasa'=>$queryS6ASA,
            'lscountgnuab'=>$queryS6AB,
            'lscountgnupa'=>$queryS6PA,
            'lscountgnusd'=>$queryS6SD,
            'lscountgnum'=>$queryS6M,
            'lscountgnur'=>$queryS6R,

            'lscountisiaaa'=>$queryS7AAA,
            'lscountisiasa'=>$queryS7ASA,
            'lscountisiab'=>$queryS7AB,
            'lscountisipa'=>$queryS7PA,
            'lscountisisd'=>$queryS7SD,
            'lscountisim'=>$queryS7M,
            'lscountisir'=>$queryS7R,

            'lscountmceaaa'=>$queryS8AAA,
            'lscountmceasa'=>$queryS8ASA,
            'lscountmceab'=>$queryS8AB,
            'lscountmcepa'=>$queryS8PA,
            'lscountmcesd'=>$queryS8SD,
            'lscountmcem'=>$queryS8M,
            'lscountmcer'=>$queryS8R,

            'lscountmrhaaa'=>$queryS9AAA,
            'lscountmrhasa'=>$queryS9ASA,
            'lscountmrhab'=>$queryS9AB,
            'lscountmrhpa'=>$queryS9PA,
            'lscountmrhsd'=>$queryS9SD,
            'lscountmrhm'=>$queryS9M,
            'lscountmrhr'=>$queryS9R,

            'lscountmsraaa'=>$queryS10AAA,
            'lscountmsrasa'=>$queryS10ASA,
            'lscountmsrab'=>$queryS10AB,
            'lscountmsrpa'=>$queryS10PA,
            'lscountmsrsd'=>$queryS10SD,
            'lscountmsrm'=>$queryS10M,
            'lscountmsrr'=>$queryS10R,

            'lscountmteaaa'=>$queryS11AAA,
            'lscountmteasa'=>$queryS11ASA,
            'lscountmteab'=>$queryS11AB,
            'lscountmtepa'=>$queryS11PA,
            'lscountmtesd'=>$queryS11SD,
            'lscountmtem'=>$queryS11M,
            'lscountmter'=>$queryS11R,

            'lscountpmoaaa'=>$queryS12AAA,
            'lscountpmoasa'=>$queryS12ASA,
            'lscountpmoab'=>$queryS12AB,
            'lscountpmopa'=>$queryS12PA,
            'lscountpmosd'=>$queryS12SD,
            'lscountpmom'=>$queryS12M,
            'lscountpmor'=>$queryS12R,

            'lscountsauaaa'=>$queryS13AAA,
            'lscountsauasa'=>$queryS13ASA,
            'lscountsauab'=>$queryS13AB,
            'lscountsaupa'=>$queryS13PA,
            'lscountsausd'=>$queryS13SD,
            'lscountsaum'=>$queryS13M,
            'lscountsaur'=>$queryS13R,

            'lscountscfaaa'=>$queryS14AAA,
            'lscountscfasa'=>$queryS14ASA,
            'lscountscfab'=>$queryS14AB,
            'lscountscfpa'=>$queryS14PA,
            'lscountscfsd'=>$queryS14SD,
            'lscountscfm'=>$queryS14M,
            'lscountscfr'=>$queryS14R,

            'lscountsiraaa'=>$queryS15AAA,
            'lscountsirasa'=>$queryS15ASA,
            'lscountsirab'=>$queryS15AB,
            'lscountsirpa'=>$queryS15PA,
            'lscountsirsd'=>$queryS15SD,
            'lscountsirm'=>$queryS15M,
            'lscountsirr'=>$queryS15R,

            'lscountsmpaaa'=>$queryS16AAA,
            'lscountsmpasa'=>$queryS16ASA,
            'lscountsmpab'=>$queryS16AB,
            'lscountsmppa'=>$queryS16PA,
            'lscountsmpsd'=>$queryS16SD,
            'lscountsmpm'=>$queryS16M,
            'lscountsmpr'=>$queryS16R,

            'lscountspraaa'=>$queryS17AAA,
            'lscountsprasa'=>$queryS17ASA,
            'lscountsprab'=>$queryS17AB,
            'lscountsprpa'=>$queryS17PA,
            'lscountsprsd'=>$queryS17SD,
            'lscountsprm'=>$queryS17M,
            'lscountsprr'=>$queryS17R,

            'lscountsstaaa'=>$queryS18AAA,
            'lscountsstasa'=>$queryS18ASA,
            'lscountsstab'=>$queryS18AB,
            'lscountsstpa'=>$queryS18PA,
            'lscountsstsd'=>$queryS18SD,
            'lscountsstm'=>$queryS18M,
            'lscountsstr'=>$queryS18R,

            'lscountamtaaa'=>$queryS19AAA,
            'lscountamtasa'=>$queryS19ASA,
            'lscountamtab'=>$queryS19AB,
            'lscountamtpa'=>$queryS19PA,
            'lscountamtsd'=>$queryS19SD,
            'lscountamtm'=>$queryS19M,
            'lscountamtr'=>$queryS19R,

        //------------------------ 5eme chart -------------------------------

            'lscounttemaaa'=>$queryP1AAA,
            'lscounttemasa'=>$queryP1ASA,
            'lscounttemab'=>$queryP1AB,
            'lscounttempa'=>$queryP1PA,
            'lscounttemsd'=>$queryP1SD,
            'lscounttemm'=>$queryP1M,
            'lscounttemr'=>$queryP1R,

            'lscount2P35aaa'=>$queryP2AAA,
            'lscount2P35asa'=>$queryP2ASA,
            'lscount2P35ab'=>$queryP2AB,
            'lscount2P35pa'=>$queryP2PA,
            'lscount2P35sd'=>$queryP2SD,
            'lscount2P35m'=>$queryP2M,
            'lscount2P35r'=>$queryP2R,

            'lscount3P35aaa'=>$queryP3AAA,
            'lscount3P35asa'=>$queryP3ASA,
            'lscount3P35ab'=>$queryP3AB,
            'lscount3P35pa'=>$queryP3PA,
            'lscount3P35sd'=>$queryP3SD,
            'lscount3P35m'=>$queryP3M,
            'lscount3P35r'=>$queryP3R,

            'lscount4R35aaa'=>$queryP4AAA,
            'lscount4R35asa'=>$queryP4ASA,
            'lscount4R35ab'=>$queryP4AB,
            'lscount4R35pa'=>$queryP4PA,
            'lscount4R35sd'=>$queryP4SD,
            'lscount4R35m'=>$queryP4M,
            'lscount4R35r'=>$queryP4R,

            'lscounthorsaaa'=>$queryP5AAA,
            'lscounthorsasa'=>$queryP5ASA,
            'lscounthorsab'=>$queryP5AB,
            'lscounthorspa'=>$queryP5PA,
            'lscounthorssd'=>$queryP5SD,
            'lscounthorsm'=>$queryP5M,
            'lscounthorsr'=>$queryP5R,

        //------------------------ 6eme chart -------------------------------

            'lscount01aaa'=>$queryM01AAA,
            'lscount02aaa'=>$queryM02AAA,
            'lscount03aaa'=>$queryM03AAA,
            'lscount04aaa'=>$queryM04AAA,
            'lscount05aaa'=>$queryM05AAA,
            'lscount06aaa'=>$queryM06AAA,
            'lscount07aaa'=>$queryM07AAA,
            'lscount08aaa'=>$queryM08AAA,
            'lscount09aaa'=>$queryM09AAA,
            'lscount10aaa'=>$queryM10AAA,
            'lscount11aaa'=>$queryM11AAA,
            'lscount12aaa'=>$queryM12AAA,

            'lscount01asa'=>$queryM01ASA,
            'lscount02asa'=>$queryM02ASA,
            'lscount03asa'=>$queryM03ASA,
            'lscount04asa'=>$queryM04ASA,
            'lscount05asa'=>$queryM05ASA,
            'lscount06asa'=>$queryM06ASA,
            'lscount07asa'=>$queryM07ASA,
            'lscount08asa'=>$queryM08ASA,
            'lscount09asa'=>$queryM09ASA,
            'lscount10asa'=>$queryM10ASA,
            'lscount11asa'=>$queryM11ASA,
            'lscount12asa'=>$queryM12ASA,

            'lscount01ab'=>$queryM01AB,
            'lscount02ab'=>$queryM02AB,
            'lscount03ab'=>$queryM03AB,
            'lscount04ab'=>$queryM04AB,
            'lscount05ab'=>$queryM05AB,
            'lscount06ab'=>$queryM06AB,
            'lscount07ab'=>$queryM07AB,
            'lscount08ab'=>$queryM08AB,
            'lscount09ab'=>$queryM09AB,
            'lscount10ab'=>$queryM10AB,
            'lscount11ab'=>$queryM11AB,
            'lscount12ab'=>$queryM12AB,

            'lscount01pa'=>$queryM01PA,
            'lscount02pa'=>$queryM02PA,
            'lscount03pa'=>$queryM03PA,
            'lscount04pa'=>$queryM04PA,
            'lscount05pa'=>$queryM05PA,
            'lscount06pa'=>$queryM06PA,
            'lscount07pa'=>$queryM07PA,
            'lscount08pa'=>$queryM08PA,
            'lscount09pa'=>$queryM09PA,
            'lscount10pa'=>$queryM10PA,
            'lscount11pa'=>$queryM11PA,
            'lscount12pa'=>$queryM12PA,

            'lscount01sd'=>$queryM01SD,
            'lscount02sd'=>$queryM02SD,
            'lscount03sd'=>$queryM03SD,
            'lscount04sd'=>$queryM04SD,
            'lscount05sd'=>$queryM05SD,
            'lscount06sd'=>$queryM06SD,
            'lscount07sd'=>$queryM07SD,
            'lscount08sd'=>$queryM08SD,
            'lscount09sd'=>$queryM09SD,
            'lscount10sd'=>$queryM10SD,
            'lscount11sd'=>$queryM11SD,
            'lscount12sd'=>$queryM12SD,

            'lscount01m'=>$queryM01M,
            'lscount02m'=>$queryM02M,
            'lscount03m'=>$queryM03M,
            'lscount04m'=>$queryM04M,
            'lscount05m'=>$queryM05M,
            'lscount06m'=>$queryM06M,
            'lscount07m'=>$queryM07M,
            'lscount08m'=>$queryM08M,
            'lscount09m'=>$queryM09M,
            'lscount10m'=>$queryM10M,
            'lscount11m'=>$queryM11M,
            'lscount12m'=>$queryM12M,

            'lscount01r'=>$queryM01R,
            'lscount02r'=>$queryM02R,
            'lscount03r'=>$queryM03R,
            'lscount04r'=>$queryM04R,
            'lscount05r'=>$queryM05R,
            'lscount06r'=>$queryM06R,
            'lscount07r'=>$queryM07R,
            'lscount08r'=>$queryM08R,
            'lscount09r'=>$queryM09R,
            'lscount10r'=>$queryM10R,
            'lscount11r'=>$queryM11R,
            'lscount12r'=>$queryM12R,




        //------------------------ 7eme chart ------------------------------

            //'nPre'=>$queryprev,
            'nPre'=>$querydate,

        
        ]);
        
        //return new Response($query);  
    }

//----------------------------------------------------------------------------------
// ********************************** CHARTS PAR DATE *******************************
//-----------------------------------------------------------------------------------


    /**
     * @Route("/charts/{datedebut}/{dateAccident}", name="charts_dateAccident")
     */
    public function accident($datedebut, $dateAccident) {

        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository(Base2019::class);




//-----------------------------------------------------------------------------
// ************************** Premier Chart par date **************************
//-----------------------------------------------------------------------------

        $querydateAB = $repository->createQueryBuilder('a')
            ->select("count(a.typeAccident)")
            ->where("a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('type', 'Bénin')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            //->getResult();
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;
                
        $querydateASA = $repository->createQueryBuilder('a')
            ->select("count(a.typeAccident)")
            ->where("a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('type', 'Sans arrêt')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            //->getResult();
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateAAA = $repository->createQueryBuilder('a')
            ->select("count(a.typeAccident)")
            ->where("a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('type', 'Avec arrêt')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            //->getResult();
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;



        
        $querydateAB7 = $repository->createQueryBuilder('a')
            ->select("count(a.typeAccident)")
            ->where("a.typeAccident = :type and a.dateAccident between DATE_SUB(:date, 7, 'DAY') and :date")
            ->setParameter('type', 'Bénin')
            ->setParameter('date', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;
            

        $querydateAAA7 = $repository->createQueryBuilder('a')
            ->select("count(a.typeAccident)")
            ->where("a.typeAccident = :type and a.dateAccident between DATE_SUB(:date, 7, 'DAY') and :date")
            ->setParameter('type', 'Avec arrêt')
            ->setParameter('date', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateASA7 = $repository->createQueryBuilder('a')
            ->select("count(a.typeAccident)")
            ->where("a.typeAccident = :type and a.dateAccident between DATE_SUB(:date, 7, 'DAY') and :date")
            ->setParameter('type', 'Sans arrêt')
            ->setParameter('date', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

//-------------------------------------------------------------------------------
// ******************************* 2eme par date ********************************
//-------------------------------------------------------------------------------

        $querydateTypo1 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo and a.dateAccident between :date1 and :date2")
            ->setParameter("typo", "Accident de plain-pied")
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateTypo2 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo and a.dateAccident between :date1 and :date2")
            ->setParameter("typo", "Chute avec dénivellation")
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateTypo3 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo and a.dateAccident between :date1 and :date2")
            ->setParameter("typo", "Objet en cours de manipulation")
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateTypo4 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo and a.dateAccident between :date1 and :date2")
            ->setParameter("typo", "Objet en cours de transport manuel")
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateTypo5 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo and a.dateAccident between :date1 and :date2")
            ->setParameter("typo", "Objet, particule en mvt accidentel")
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateTypo6 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo and a.dateAccident between :date1 and :date2")
            ->setParameter("typo", "Appareil, engin de levage, manut.")
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateTypo7 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo and a.dateAccident between :date1 and :date2")
            ->setParameter("typo", "Accessoires de levage & d'amarrage")
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateTypo8 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo and a.dateAccident between :date1 and :date2")
            ->setParameter("typo", "Vehicule en circulation")
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateTypo9 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo and a.dateAccident between :date1 and :date2")
            ->setParameter("typo", "Mach. Prod. & transform. Énergie")
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateTypo10 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo and a.dateAccident between :date1 and :date2")
            ->setParameter("typo", "Organe de transmission")
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateTypo11 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo and a.dateAccident between :date1 and :date2")
            ->setParameter("typo", "Machine et matériel à souder")
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateTypo12 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo and a.dateAccident between :date1 and :date2")
            ->setParameter("typo", "Matériel ou engin de terrassement")
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateTypo13 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo and a.dateAccident between :date1 and :date2")
            ->setParameter("typo", "Machine-outil")
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateTypo14 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo and a.dateAccident between :date1 and :date2")
            ->setParameter("typo", "Outil port. tenu, guidé à la main")
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateTypo15 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo and a.dateAccident between :date1 and :date2")
            ->setParameter("typo", "Outil individuel à main")
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateTypo16 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo and a.dateAccident between :date1 and :date2")
            ->setParameter("typo", "Pression, appareil à pression")
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateTypo17 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo and a.dateAccident between :date1 and :date2")
            ->setParameter("typo", "Chaleur, produits chauds")
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateTypo18 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo and a.dateAccident between :date1 and :date2")
            ->setParameter("typo", "Froid, produits froids")
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateTypo19 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo and a.dateAccident between :date1 and :date2")
            ->setParameter("typo", "Produits chimiques dangereux")
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateTypo20 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo and a.dateAccident between :date1 and :date2")
            ->setParameter("typo", "Vapeur, gaz, poussière")
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateTypo21 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo and a.dateAccident between :date1 and :date2")
            ->setParameter("typo", "Matière combustible en flamme")
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateTypo22 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo and a.dateAccident between :date1 and :date2")
            ->setParameter("typo", "Matière explosive")
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateTypo23 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo and a.dateAccident between :date1 and :date2")
            ->setParameter("typo", "Electricité")
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateTypo24 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo and a.dateAccident between :date1 and :date2")
            ->setParameter("typo", "Rayonnment ionisants")
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateTypo25 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo and a.dateAccident between :date1 and :date2")
            ->setParameter("typo", "Divers: incendie rixe malaise…")
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateTypo26 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo and a.dateAccident between :date1 and :date2")
            ->setParameter("typo", "Déclaration non classée")
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;


//---------------------------------------------------------------------------------
// ******************************* 3eme CHART PAR DATE ****************************
//---------------------------------------------------------------------------------
        $querytdateSiege = $repository->createQueryBuilder('b')
            ->select("count(b.siegeLesions)")
            ->where("b.dateAccident between :date1 and :date2")
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateSiege1 = $repository->createQueryBuilder('a')
            ->select("count(a.siegeLesions)*100")
            ->where("a.siegeLesions = :siege and a.dateAccident between :date1 and :date2")
            ->setParameter('siege', 'Buste')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.siegeLesions")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateSiege2 = $repository->createQueryBuilder('a')
            ->select("count(a.siegeLesions)*100")
            ->where("a.siegeLesions = :siege and a.dateAccident between :date1 and :date2")
            ->setParameter('siege', 'Main')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.siegeLesions")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateSiege3 = $repository->createQueryBuilder('a')
            ->select("count(a.siegeLesions)*100")
            ->where("a.siegeLesions = :siege and a.dateAccident between :date1 and :date2")
            ->setParameter('siege', 'Membre inférieur')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.siegeLesions")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateSiege4 = $repository->createQueryBuilder('a')
            ->select("count(a.siegeLesions)*100")
            ->where("a.siegeLesions = :siege and a.dateAccident between :date1 and :date2")
            ->setParameter('siege', 'Membre supérieur')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.siegeLesions")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateSiege5 = $repository->createQueryBuilder('a')
            ->select("count(a.siegeLesions)*100")
            ->where("a.siegeLesions = :siege and a.dateAccident between :date1 and :date2")
            ->setParameter('siege', 'Pied')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.siegeLesions")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateSiege6 = $repository->createQueryBuilder('a')
            ->select("count(a.siegeLesions)*100")
            ->where("a.siegeLesions = :siege and a.dateAccident between :date1 and :date2")
            ->setParameter('siege', 'Siège interne')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.siegeLesions")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateSiege7 = $repository->createQueryBuilder('a')
            ->select("count(a.siegeLesions)*100")
            ->where("a.siegeLesions = :siege and a.dateAccident between :date1 and :date2")
            ->setParameter('siege', 'Tête')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.siegeLesions")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateSiege8 = $repository->createQueryBuilder('a')
            ->select("count(a.siegeLesions)*100")
            ->where("a.siegeLesions = :siege and a.dateAccident between :date1 and :date2")
            ->setParameter('siege', 'Yeux')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.siegeLesions")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateSiege9 = $repository->createQueryBuilder('a')
            ->select("count(a.siegeLesions)*100")
            ->where("a.siegeLesions = :siege and a.dateAccident between :date1 and :date2")
            ->setParameter('siege', 'Divers:multiples')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.siegeLesions")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

//---------------------------------------------------------------------------------
// ******************************** 4eme Chart par date************************************
//--------------------------------------------------------------------------------

    //--------------------------- Total par service ------------------------
        $querydateService1 = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'APS')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.service")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateService2 = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'CDT')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.service")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateService3 = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'DIR')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.service")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateService4 = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'ECT')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.service")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateService5 = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'FIA')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.service")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateService6 = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'GNU')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.service")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateService7 = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'ISI')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.service")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateService8 = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'MCE')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.service")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateService9 = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'MRH')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.service")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateService10 = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'MSR')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.service")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateService11 = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'MTE')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.service")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateService12 = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'PMO')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.service")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateService13 = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'SAU')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.service")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateService14 = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'SCF')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.service")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateService15 = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'SIR')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.service")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateService16 = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'SMP')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.service")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateService17 = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'SPR')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.service")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateService18 = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'SST')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.service")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

    //------------------- COUNT APS BY DATE AND TYPE ACCIDENT -----------------

        
        $querydateS1AAA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'APS')
            ->setParameter('type', 'Avec arrêt')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS1ASA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'APS')
            ->setParameter('type', 'Sans arrêt')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS1AB = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'APS')
            ->setParameter('type', 'Bénin')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS1PA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'APS')
            ->setParameter('type', 'PA')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS1SD = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'APS')
            ->setParameter('type', 'SD')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS1M = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'APS')
            ->setParameter('type', 'Mortel')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS1R = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'APS')
            ->setParameter('type', 'Refus CPAM')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

    //------------------- COUNT CDT BY DATE AND TYPE ACCIDENT -----------------

        $querydateS2AAA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'CDT')
            ->setParameter('type', 'Avec arrêt')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS2ASA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'CDT')
            ->setParameter('type', 'Sans arrêt')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS2AB = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'CDT')
            ->setParameter('type', 'Bénin')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS2PA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'CDT')
            ->setParameter('type', 'PA')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS2SD = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'CDT')
            ->setParameter('type', 'SD')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS2M = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'CDT')
            ->setParameter('type', 'Mortel')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS2R = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'CDT')
            ->setParameter('type', 'Refus CPAM')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

    //------------------- COUNT DIR BY DATE AND TYPE ACCIDENT -----------------

        $querydateS3AAA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'DIR')
            ->setParameter('type', 'Avec arrêt')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS3ASA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'DIR')
            ->setParameter('type', 'Sans arrêt')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS3AB = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'DIR')
            ->setParameter('type', 'Bénin')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS3PA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'DIR')
            ->setParameter('type', 'PA')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS3SD = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'DIR')
            ->setParameter('type', 'SD')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS3M = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'DIR')
            ->setParameter('type', 'Mortel')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS3R = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'DIR')
            ->setParameter('type', 'Refus CPAM')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

    //------------------- COUNT ECT BY DATE AND TYPE ACCIDENT -----------------
    
        $querydateS4AAA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'ECT')
            ->setParameter('type', 'Avec arrêt')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS4ASA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'ECT')
            ->setParameter('type', 'Sans arrêt')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS4AB = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'ECT')
            ->setParameter('type', 'Bénin')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS4PA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'ECT')
            ->setParameter('type', 'PA')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS4SD = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'ECT')
            ->setParameter('type', 'SD')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS4M = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'ECT')
            ->setParameter('type', 'Mortel')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS4R = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'ECT')
            ->setParameter('type', 'Refus CPAM')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

    //------------------- COUNT FIA BY DATE AND TYPE ACCIDENT -----------------

        $querydateS5AAA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'FIA')
            ->setParameter('type', 'Avec arrêt')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS5ASA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'FIA')
            ->setParameter('type', 'Sans arrêt')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS5AB = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'FIA')
            ->setParameter('type', 'Bénin')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS5PA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'FIA')
            ->setParameter('type', 'PA')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS5SD = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'FIA')
            ->setParameter('type', 'SD')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS5M = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'FIA')
            ->setParameter('type', 'Mortel')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS5R = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'FIA')
            ->setParameter('type', 'Refus CPAM')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

    //------------------- COUNT GNU BY DATE AND TYPE ACCIDENT -----------------

        $querydateS6AAA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'GNU')
            ->setParameter('type', 'Avec arrêt')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS6ASA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'GNU')
            ->setParameter('type', 'Sans arrêt')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS6AB = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'GNU')
            ->setParameter('type', 'Bénin')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS6PA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'GNU')
            ->setParameter('type', 'PA')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS6SD = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'GNU')
            ->setParameter('type', 'SD')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS6M = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'GNU')
            ->setParameter('type', 'Mortel')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS6R = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'GNU')
            ->setParameter('type', 'Refus CPAM')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;


    //------------------- COUNT ISI BY DATE AND TYPE ACCIDENT -----------------
                    
        $querydateS7AAA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'ISI')
            ->setParameter('type', 'Avec arrêt')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS7ASA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'ISI')
            ->setParameter('type', 'Sans arrêt')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS7AB = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'ISI')
            ->setParameter('type', 'Bénin')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS7PA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'ISI')
            ->setParameter('type', 'PA')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS7SD = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'ISI')
            ->setParameter('type', 'SD')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS7M = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'ISI')
            ->setParameter('type', 'Mortel')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS7R = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'ISI')
            ->setParameter('type', 'Refus CPAM')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;


    //------------------- COUNT MCE BY DATE AND TYPE ACCIDENT -----------------
                    
        $querydateS8AAA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'MCE')
            ->setParameter('type', 'Avec arrêt')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS8ASA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'MCE')
            ->setParameter('type', 'Sans arrêt')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS8AB = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'MCE')
            ->setParameter('type', 'Bénin')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS8PA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'MCE')
            ->setParameter('type', 'PA')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS8SD = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'MCE')
            ->setParameter('type', 'SD')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS8M = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'MCE')
            ->setParameter('type', 'Mortel')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS8R = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'MCE')
            ->setParameter('type', 'Refus CPAM')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;


    //------------------- COUNT MRH BY DATE AND TYPE ACCIDENT -----------------

        $querydateS9AAA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'MRH')
            ->setParameter('type', 'Avec arrêt')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS9ASA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'MRH')
            ->setParameter('type', 'Sans arrêt')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS9AB = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'MRH')
            ->setParameter('type', 'Bénin')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS9PA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'MRH')
            ->setParameter('type', 'PA')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS9SD = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'MRH')
            ->setParameter('type', 'SD')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS9M = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'MRH')
            ->setParameter('type', 'Mortel')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS9R = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'MRH')
            ->setParameter('type', 'Refus CPAM')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

    //------------------- COUNT MSR BY DATE AND TYPE ACCIDENT -----------------
                   
        $querydateS10AAA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'MSR')
            ->setParameter('type', 'Avec arrêt')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS10ASA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'MSR')
            ->setParameter('type', 'Sans arrêt')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS10AB = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'MSR')
            ->setParameter('type', 'Bénin')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS10PA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'MSR')
            ->setParameter('type', 'PA')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS10SD = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'MSR')
            ->setParameter('type', 'SD')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS10M = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'MSR')
            ->setParameter('type', 'Mortel')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS10R = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'MSR')
            ->setParameter('type', 'Refus CPAM')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;


    //------------------- COUNT MTE BY DATE AND TYPE ACCIDENT -----------------
                    
        $querydateS11AAA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'MTE')
            ->setParameter('type', 'Avec arrêt')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS11ASA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'MTE')
            ->setParameter('type', 'Sans arrêt')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS11AB = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'MTE')
            ->setParameter('type', 'Bénin')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS11PA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'MTE')
            ->setParameter('type', 'PA')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS11SD = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'MTE')
            ->setParameter('type', 'SD')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS11M = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'MTE')
            ->setParameter('type', 'Mortel')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS11R = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'MTE')
            ->setParameter('type', 'Refus CPAM')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;


    //------------------- COUNT PMO BY DATE AND TYPE ACCIDENT -----------------

        $querydateS12AAA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'PMO')
            ->setParameter('type', 'Avec arrêt')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS12ASA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'PMO')
            ->setParameter('type', 'Sans arrêt')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS12AB = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'PMO')
            ->setParameter('type', 'Bénin')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS12PA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'PMO')
            ->setParameter('type', 'PA')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS12SD = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'PMO')
            ->setParameter('type', 'SD')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS12M = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'PMO')
            ->setParameter('type', 'Mortel')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS12R = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'PMO')
            ->setParameter('type', 'Refus CPAM')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;


    //------------------- COUNT SAU BY DATE AND TYPE ACCIDENT -----------------

        $querydateS13AAA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'SAU')
            ->setParameter('type', 'Avec arrêt')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS13ASA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'SAU')
            ->setParameter('type', 'Sans arrêt')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS13AB = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'SAU')
            ->setParameter('type', 'Bénin')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS13PA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'SAU')
            ->setParameter('type', 'PA')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS13SD = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'SAU')
            ->setParameter('type', 'SD')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS13M = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'SAU')
            ->setParameter('type', 'Mortel')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS13R = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'SAU')
            ->setParameter('type', 'Refus CPAM')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;
            

    //------------------- COUNT SCF BY DATE AND TYPE ACCIDENT -----------------

        $querydateS14AAA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'SCF')
            ->setParameter('type', 'Avec arrêt')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS14ASA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'SCF')
            ->setParameter('type', 'Sans arrêt')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS14AB = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'SCF')
            ->setParameter('type', 'Bénin')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS14PA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'SCF')
            ->setParameter('type', 'PA')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS14SD = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'SCF')
            ->setParameter('type', 'SD')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS14M = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'SCF')
            ->setParameter('type', 'Mortel')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS14R = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'SCF')
            ->setParameter('type', 'Refus CPAM')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;


    //------------------- COUNT SIR BY DATE AND TYPE ACCIDENT -----------------
                    
        $querydateS15AAA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'SIR')
            ->setParameter('type', 'Avec arrêt')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS15ASA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'SIR')
            ->setParameter('type', 'Sans arrêt')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS15AB = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'SIR')
            ->setParameter('type', 'Bénin')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS15PA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'SIR')
            ->setParameter('type', 'PA')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS15SD = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'SIR')
            ->setParameter('type', 'SD')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS15M = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'SIR')
            ->setParameter('type', 'Mortel')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS15R = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'SIR')
            ->setParameter('type', 'Refus CPAM')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;


    //------------------- COUNT SMP BY DATE AND TYPE ACCIDENT -----------------

        $querydateS16AAA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'SMP')
            ->setParameter('type', 'Avec arrêt')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS16ASA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'SMP')
            ->setParameter('type', 'Sans arrêt')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS16AB = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'SMP')
            ->setParameter('type', 'Bénin')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS16PA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'SMP')
            ->setParameter('type', 'PA')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS16SD = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'SMP')
            ->setParameter('type', 'SD')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS16M = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'SMP')
            ->setParameter('type', 'Mortel')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS16R = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'SMP')
            ->setParameter('type', 'Refus CPAM')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

    //------------------- COUNT SPR BY DATE AND TYPE ACCIDENT -----------------

        $querydateS17AAA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'SPR')
            ->setParameter('type', 'Avec arrêt')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS17ASA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'SPR')
            ->setParameter('type', 'Sans arrêt')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS17AB = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'SPR')
            ->setParameter('type', 'Bénin')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS17PA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'SPR')
            ->setParameter('type', 'PA')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS17SD = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'SPR')
            ->setParameter('type', 'SD')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS17M = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'SPR')
            ->setParameter('type', 'Mortel')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS17R = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'SPR')
            ->setParameter('type', 'Refus CPAM')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

    //------------------- COUNT SST BY DATE AND TYPE ACCIDENT -----------------

        $querydateS18AAA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'SST')
            ->setParameter('type', 'Avec arrêt')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS18ASA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'SST')
            ->setParameter('type', 'Sans arrêt')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS18AB = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'SST')
            ->setParameter('type', 'Bénin')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS18PA = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'SST')
            ->setParameter('type', 'PA')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS18SD = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'SST')
            ->setParameter('type', 'SD')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS18M = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'SST')
            ->setParameter('type', 'Mortel')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateS18R = $repository->createQueryBuilder('a')
            ->select("count(a.service)")
            ->where("a.service = :service AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('service', 'SST')
            ->setParameter('type', 'Refus CPAM')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

//---------------------------------------------------------------------------------
// ******************************** 5eme chart par date *********************************
//--------------------------------------------------------------------------------

    //---------------------- PROJET TEM -----------------------------------

        $querydateP1AAA = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.projet = :pro AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('pro', 'TEM')
            ->setParameter('type', 'Avec arrêt')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateP1ASA = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.projet = :pro AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('pro', 'TEM')
            ->setParameter('type', 'Sans arrêt')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateP1AB = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.projet = :pro AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('pro', 'TEM')
            ->setParameter('type', 'Bénin')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateP1PA = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.projet = :pro AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('pro', 'TEM')
            ->setParameter('type', 'PA')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateP1SD = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.projet = :pro AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('pro', 'TEM')
            ->setParameter('type', 'SD')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateP1M = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.projet = :pro AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('pro', 'TEM')
            ->setParameter('type', 'Mortel')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateP1R = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.projet = :pro AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('pro', 'TEM')
            ->setParameter('type', 'Refus CPAM')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

    //----------------------- PROJET 2P3519 -------------------------------

        $querydateP2AAA = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.projet = :pro AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('pro', '2P3519')
            ->setParameter('type', 'Avec arrêt')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateP2ASA = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.projet = :pro AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('pro', '2P3519')
            ->setParameter('type', 'Sans arrêt')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateP2AB = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.projet = :pro AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('pro', '2P3519')
            ->setParameter('type', 'Bénin')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateP2PA = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.projet = :pro AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('pro', '2P3519')
            ->setParameter('type', 'PA')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateP2SD = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.projet = :pro AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('pro', '2P3519')
            ->setParameter('type', 'SD')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateP2M = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.projet = :pro AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('pro', '2P3519')
            ->setParameter('type', 'Mortel')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateP2R = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.projet = :pro AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('pro', '2P3519')
            ->setParameter('type', 'Refus CPAM')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

    // --------------------- PROJET 4R3519 ---------------------------------
            
        $querydateP4AAA = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.projet = :pro AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('pro', '4R3519')
            ->setParameter('type', 'Avec arrêt')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateP4ASA = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.projet = :pro AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('pro', '4R3519')
            ->setParameter('type', 'Sans arrêt')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateP4AB = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.projet = :pro AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('pro', '4R3519')
            ->setParameter('type', 'Bénin')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateP4PA = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.projet = :pro AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('pro', '4R3519')
            ->setParameter('type', 'PA')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateP4SD = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.projet = :pro AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('pro', '4R3519')
            ->setParameter('type', 'SD')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateP4M = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.projet = :pro AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('pro', '4R3519')
            ->setParameter('type', 'Mortel')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateP4R = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.projet = :pro AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('pro', '4R3519')
            ->setParameter('type', 'Refus CPAM')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

    //-------------------- PROJET HORS ZONE -----------------------------
            
        $querydateP5AAA = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.projet = :pro AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('pro', 'Hors process')
            ->setParameter('type', 'Avec arrêt')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateP5ASA = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.projet = :pro AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('pro', 'Hors process')
            ->setParameter('type', 'Sans arrêt')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateP5AB = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.projet = :pro AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('pro', 'Hors process')
            ->setParameter('type', 'Bénin')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateP5PA = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.projet = :pro AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('pro', 'Hors process')
            ->setParameter('type', 'PA')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateP5SD = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.projet = :pro AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('pro', 'Hors process')
            ->setParameter('type', 'SD')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateP5M = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.projet = :pro AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('pro', 'Hors process')
            ->setParameter('type', 'Mortel')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $querydateP5R = $repository->createQueryBuilder('a')
            ->select("count(a.projet)")
            ->where("a.projet = :pro AND a.typeAccident = :type and a.dateAccident between :date1 and :date2")
            ->setParameter('pro', 'Hors process')
            ->setParameter('type', 'Refus CPAM')
            ->setParameter('date1', $datedebut)
            ->setParameter('date2', $dateAccident)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;
            


        

// ************************************** return ****************************************************

        return $this->render('charts/chart.html.twig', [

        //-----  premier chart ------------
            'countAB'=>$querydateAB,
            'countAAA'=>$querydateAAA,
            'countASA'=>$querydateASA,

            'countAB7'=>$querydateAB7,
            'countAAA7'=>$querydateAAA7,
            'countASA7'=>$querydateASA7,
        //-------- 2eme chart -----------------
            'lscountbytypo1'=>$querydateTypo1,
            'lscountbytypo2'=>$querydateTypo2,
            'lscountbytypo3'=>$querydateTypo3,
            'lscountbytypo4'=>$querydateTypo4,
            'lscountbytypo5'=>$querydateTypo5,
            'lscountbytypo6'=>$querydateTypo6,
            'lscountbytypo7'=>$querydateTypo7,
            'lscountbytypo8'=>$querydateTypo8,
            'lscountbytypo9'=>$querydateTypo9,
            'lscountbytypo10'=>$querydateTypo10,
            'lscountbytypo11'=>$querydateTypo11,
            'lscountbytypo12'=>$querydateTypo12,
            'lscountbytypo13'=>$querydateTypo13,
            'lscountbytypo14'=>$querydateTypo14,
            'lscountbytypo15'=>$querydateTypo15,
            'lscountbytypo16'=>$querydateTypo16,
            'lscountbytypo17'=>$querydateTypo17,
            'lscountbytypo18'=>$querydateTypo18,
            'lscountbytypo19'=>$querydateTypo19,
            'lscountbytypo20'=>$querydateTypo20,
            'lscountbytypo21'=>$querydateTypo21,
            'lscountbytypo22'=>$querydateTypo22,
            'lscountbytypo23'=>$querydateTypo23,
            'lscountbytypo24'=>$querydateTypo24,
            'lscountbytypo25'=>$querydateTypo25,
            'lscountbytypo26'=>$querydateTypo26,

        //------------ 3eme chart ----------------

            'cbysiege'=>$querytdateSiege,
            'cbysiege1'=>$querydateSiege1,
            'cbysiege2'=>$querydateSiege2,
            'cbysiege3'=>$querydateSiege3,
            'cbysiege4'=>$querydateSiege4,
            'cbysiege5'=>$querydateSiege5,
            'cbysiege6'=>$querydateSiege6,
            'cbysiege7'=>$querydateSiege7,
            'cbysiege8'=>$querydateSiege8,
            'cbysiege9'=>$querydateSiege9,

        //------------- 4eme chart ----------------
            'lscountbyService1'=>$querydateService1,
            'lscountbyService2'=>$querydateService2,
            'lscountbyService3'=>$querydateService3,
            'lscountbyService4'=>$querydateService4,
            'lscountbyService5'=>$querydateService5,
            'lscountbyService6'=>$querydateService6,
            'lscountbyService7'=>$querydateService7,
            'lscountbyService8'=>$querydateService8,
            'lscountbyService9'=>$querydateService9,
            'lscountbyService10'=>$querydateService10,
            'lscountbyService11'=>$querydateService11,
            'lscountbyService12'=>$querydateService12,
            'lscountbyService13'=>$querydateService13,
            'lscountbyService14'=>$querydateService14,
            'lscountbyService15'=>$querydateService15,
            'lscountbyService16'=>$querydateService16,
            'lscountbyService17'=>$querydateService17,
            'lscountbyService18'=>$querydateService18,

            'lscountapsaaa'=>$querydateS1AAA,
            'lscountapsasa'=>$querydateS1ASA,
            'lscountapsab'=>$querydateS1AB,
            'lscountapspa'=>$querydateS1PA,
            'lscountapssd'=>$querydateS1SD,
            'lscountapsm'=>$querydateS1M,
            'lscountapsr'=>$querydateS1R,

            'lscountcdtaaa'=>$querydateS2AAA,
            'lscountcdtasa'=>$querydateS2ASA,
            'lscountcdtab'=>$querydateS2AB,
            'lscountcdtpa'=>$querydateS2PA,
            'lscountcdtsd'=>$querydateS2SD,
            'lscountcdtm'=>$querydateS2M,
            'lscountcdtr'=>$querydateS2R,

            'lscountdiraaa'=>$querydateS3AAA,
            'lscountdirasa'=>$querydateS3ASA,
            'lscountdirab'=>$querydateS3AB,
            'lscountdirpa'=>$querydateS3PA,
            'lscountdirsd'=>$querydateS3SD,
            'lscountdirm'=>$querydateS3M,
            'lscountdirr'=>$querydateS3R,

            'lscountectaaa'=>$querydateS4AAA,
            'lscountectasa'=>$querydateS4ASA,
            'lscountectab'=>$querydateS4AB,
            'lscountectpa'=>$querydateS4PA,
            'lscountectsd'=>$querydateS4SD,
            'lscountectm'=>$querydateS4M,
            'lscountectr'=>$querydateS4R,

            'lscountfiaaaa'=>$querydateS5AAA,
            'lscountfiaasa'=>$querydateS5ASA,
            'lscountfiaab'=>$querydateS5AB,
            'lscountfiapa'=>$querydateS5PA,
            'lscountfiasd'=>$querydateS5SD,
            'lscountfiam'=>$querydateS5M,
            'lscountfiar'=>$querydateS5R,

            'lscountgnuaaa'=>$querydateS6AAA,
            'lscountgnuasa'=>$querydateS6ASA,
            'lscountgnuab'=>$querydateS6AB,
            'lscountgnupa'=>$querydateS6PA,
            'lscountgnusd'=>$querydateS6SD,
            'lscountgnum'=>$querydateS6M,
            'lscountgnur'=>$querydateS6R,

            'lscountisiaaa'=>$querydateS7AAA,
            'lscountisiasa'=>$querydateS7ASA,
            'lscountisiab'=>$querydateS7AB,
            'lscountisipa'=>$querydateS7PA,
            'lscountisisd'=>$querydateS7SD,
            'lscountisim'=>$querydateS7M,
            'lscountisir'=>$querydateS7R,

            'lscountmceaaa'=>$querydateS8AAA,
            'lscountmceasa'=>$querydateS8ASA,
            'lscountmceab'=>$querydateS8AB,
            'lscountmcepa'=>$querydateS8PA,
            'lscountmcesd'=>$querydateS8SD,
            'lscountmcem'=>$querydateS8M,
            'lscountmcer'=>$querydateS8R,

            'lscountmrhaaa'=>$querydateS9AAA,
            'lscountmrhasa'=>$querydateS9ASA,
            'lscountmrhab'=>$querydateS9AB,
            'lscountmrhpa'=>$querydateS9PA,
            'lscountmrhsd'=>$querydateS9SD,
            'lscountmrhm'=>$querydateS9M,
            'lscountmrhr'=>$querydateS9R,

            'lscountmsraaa'=>$querydateS10AAA,
            'lscountmsrasa'=>$querydateS10ASA,
            'lscountmsrab'=>$querydateS10AB,
            'lscountmsrpa'=>$querydateS10PA,
            'lscountmsrsd'=>$querydateS10SD,
            'lscountmsrm'=>$querydateS10M,
            'lscountmsrr'=>$querydateS10R,

            'lscountmteaaa'=>$querydateS11AAA,
            'lscountmteasa'=>$querydateS11ASA,
            'lscountmteab'=>$querydateS11AB,
            'lscountmtepa'=>$querydateS11PA,
            'lscountmtesd'=>$querydateS11SD,
            'lscountmtem'=>$querydateS11M,
            'lscountmter'=>$querydateS11R,

            'lscountpmoaaa'=>$querydateS12AAA,
            'lscountpmoasa'=>$querydateS12ASA,
            'lscountpmoab'=>$querydateS12AB,
            'lscountpmopa'=>$querydateS12PA,
            'lscountpmosd'=>$querydateS12SD,
            'lscountpmom'=>$querydateS12M,
            'lscountpmor'=>$querydateS12R,

            'lscountsauaaa'=>$querydateS13AAA,
            'lscountsauasa'=>$querydateS13ASA,
            'lscountsauab'=>$querydateS13AB,
            'lscountsaupa'=>$querydateS13PA,
            'lscountsausd'=>$querydateS13SD,
            'lscountsaum'=>$querydateS13M,
            'lscountsaur'=>$querydateS13R,

            'lscountscfaaa'=>$querydateS14AAA,
            'lscountscfasa'=>$querydateS14ASA,
            'lscountscfab'=>$querydateS14AB,
            'lscountscfpa'=>$querydateS14PA,
            'lscountscfsd'=>$querydateS14SD,
            'lscountscfm'=>$querydateS14M,
            'lscountscfr'=>$querydateS14R,

            'lscountsiraaa'=>$querydateS15AAA,
            'lscountsirasa'=>$querydateS15ASA,
            'lscountsirab'=>$querydateS15AB,
            'lscountsirpa'=>$querydateS15PA,
            'lscountsirsd'=>$querydateS15SD,
            'lscountsirm'=>$querydateS15M,
            'lscountsirr'=>$querydateS15R,

            'lscountsmpaaa'=>$querydateS16AAA,
            'lscountsmpasa'=>$querydateS16ASA,
            'lscountsmpab'=>$querydateS16AB,
            'lscountsmppa'=>$querydateS16PA,
            'lscountsmpsd'=>$querydateS16SD,
            'lscountsmpm'=>$querydateS16M,
            'lscountsmpr'=>$querydateS16R,

            'lscountspraaa'=>$querydateS17AAA,
            'lscountsprasa'=>$querydateS17ASA,
            'lscountsprab'=>$querydateS17AB,
            'lscountsprpa'=>$querydateS17PA,
            'lscountsprsd'=>$querydateS17SD,
            'lscountsprm'=>$querydateS17M,
            'lscountsprr'=>$querydateS17R,

            'lscountsstaaa'=>$querydateS18AAA,
            'lscountsstasa'=>$querydateS18ASA,
            'lscountsstab'=>$querydateS18AB,
            'lscountsstpa'=>$querydateS18PA,
            'lscountsstsd'=>$querydateS18SD,
            'lscountsstm'=>$querydateS18M,
            'lscountsstr'=>$querydateS18R,

        //-------------- 5eme chart --------------
            'lscounttemaaa'=>$querydateP1AAA,
            'lscounttemasa'=>$querydateP1ASA,
            'lscounttemab'=>$querydateP1AB,
            'lscounttempa'=>$querydateP1PA,
            'lscounttemsd'=>$querydateP1SD,
            'lscounttemm'=>$querydateP1M,
            'lscounttemr'=>$querydateP1R,

            'lscount2P35aaa'=>$querydateP2AAA,
            'lscount2P35asa'=>$querydateP2ASA,
            'lscount2P35ab'=>$querydateP2AB,
            'lscount2P35pa'=>$querydateP2PA,
            'lscount2P35sd'=>$querydateP2SD,
            'lscount2P35m'=>$querydateP2M,
            'lscount2P35r'=>$querydateP2R,

            'lscount4R35aaa'=>$querydateP4AAA,
            'lscount4R35asa'=>$querydateP4ASA,
            'lscount4R35ab'=>$querydateP4AB,
            'lscount4R35pa'=>$querydateP4PA,
            'lscount4R35sd'=>$querydateP4SD,
            'lscount4R35m'=>$querydateP4M,
            'lscount4R35r'=>$querydateP4R,

            'lscounthorsaaa'=>$querydateP5AAA,
            'lscounthorsasa'=>$querydateP5ASA,
            'lscounthorsab'=>$querydateP5AB,
            'lscounthorspa'=>$querydateP5PA,
            'lscounthorssd'=>$querydateP5SD,
            'lscounthorsm'=>$querydateP5M,
            'lscounthorsr'=>$querydateP5R,
                
            
        ]);

    }

//---------------------------------------------------------------------------------------------
// **************************************** CHARTS PAR SERVICE ************************************
//----------------------------------------------------------------------------------------------

    /**
     * @Route("/charts/{service}", name="charts_service")
     */
    public function AccParService($service){

        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository(Base2019::class);

    //----------------------------------------------------------------------------------
    // ********************** PREMIERE CHART PAR SERVICE *******************************
    //----------------------------------------------------------------------------------
        $queryserviceAB = $repository->createQueryBuilder('a')
            ->select("count(a.typeAccident)")
            ->where("a.typeAccident = :type and a.service = :service")
            ->setParameter('type', 'Bénin')
            ->setParameter('service', $service)
            ->groupBy("a.typeAccident")
            ->getQuery()
            //->getResult();
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;
                
        $queryserviceASA = $repository->createQueryBuilder('a')
            ->select("count(a.typeAccident)")
            ->where("a.typeAccident = :type and a.service = :service")
            ->setParameter('type', 'Sans arrêt')
            ->setParameter('service', $service)
            ->groupBy("a.typeAccident")
            ->getQuery()
            //->getResult();
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryserviceAAA = $repository->createQueryBuilder('a')
            ->select("count(a.typeAccident)")
            ->where("a.typeAccident = :type and a.service = :service")
            ->setParameter('type', 'Avec arrêt')
            ->setParameter('service', $service)
            ->groupBy("a.typeAccident")
            ->getQuery()
            //->getResult();
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        
        $queryserviceAB7 = $repository->createQueryBuilder('a')
            ->select("count(a.typeAccident)")
            ->where("a.typeAccident = :type and a.dateAccident >= :date and a.service = :service")
            ->setParameter('type', 'Bénin')
            ->setParameter('date', new \DateTime('-7 day'))
            ->setParameter('service', $service)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;
            

        $queryserviceAAA7 = $repository->createQueryBuilder('a')
            ->select("count(a.typeAccident)")
            ->where("a.typeAccident = :type and a.dateAccident >= :date and a.service = :service")
            ->setParameter('type', 'Avec arrêt')
            ->setParameter('date', new \DateTime('-7 day'))
            ->setParameter('service', $service)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryserviceASA7 = $repository->createQueryBuilder('a')
            ->select("count(a.typeAccident)")
            ->where("a.typeAccident = :type and a.dateAccident >= :date and a.service = :service")
            ->setParameter('type', 'Sans arrêt')
			->setParameter('date', new \DateTime('-7 day'))
			->setParameter('service', $service)
            ->groupBy("a.typeAccident")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

    //-----------------------------------------------------------------------------------
    // ************************** 2eme CHART PAR SERVICE *************************************
    //----------------------------------------------------------------------------------
        $queryserviceTypo1 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo and a.service = :service")
            ->setParameter("typo", "Accident de plain-pied")
            ->setParameter('service', $service)
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryserviceTypo2 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo and a.service = :service")
            ->setParameter("typo", "Chute avec dénivellation")
            ->setParameter('service', $service)
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryserviceTypo3 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo and a.service = :service")
            ->setParameter("typo", "Objet en cours de manipulation")
            ->setParameter('service', $service)
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryserviceTypo4 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo and a.service = :service")
            ->setParameter("typo", "Objet en cours de transport manuel")
            ->setParameter('service', $service)
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryserviceTypo5 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo and a.service = :service")
            ->setParameter("typo", "Objet, particule en mvt accidentel")
            ->setParameter('service', $service)
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryserviceTypo6 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo and a.service = :service")
            ->setParameter("typo", "Appareil, engin de levage, manut.")
            ->setParameter('service', $service)
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryserviceTypo7 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo and a.service = :service")
            ->setParameter("typo", "Accessoires de levage & d'amarrage")
            ->setParameter('service', $service)
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryserviceTypo8 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo and a.service = :service")
            ->setParameter("typo", "Vehicule en circulation")
            ->setParameter('service', $service)
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryserviceTypo9 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo and a.service = :service")
            ->setParameter("typo", "Mach. Prod. & transform. Énergie")
            ->setParameter('service', $service)
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryserviceTypo10 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo and a.service = :service")
            ->setParameter("typo", "Organe de transmission")
            ->setParameter('service', $service)
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryserviceTypo11 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo and a.service = :service")
            ->setParameter("typo", "Machine et matériel à souder")
            ->setParameter('service', $service)
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryserviceTypo12 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo and a.service = :service")
            ->setParameter("typo", "Matériel ou engin de terrassement")
            ->setParameter('service', $service)
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryserviceTypo13 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo and a.service = :service")
            ->setParameter("typo", "Machine-outil")
            ->setParameter('service', $service)
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryserviceTypo14 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo and a.service = :service")
            ->setParameter("typo", "Outil port. tenu, guidé à la main")
            ->setParameter('service', $service)
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryserviceTypo15 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo and a.service = :service")
            ->setParameter("typo", "Outil individuel à main")
            ->setParameter('service', $service)
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryserviceTypo16 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo and a.service = :service")
            ->setParameter("typo", "Pression, appareil à pression")
            ->setParameter('service', $service)
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryserviceTypo17 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo and a.service = :service")
            ->setParameter("typo", "Chaleur, produits chauds")
            ->setParameter('service', $service)
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryserviceTypo18 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo and a.service = :service")
            ->setParameter("typo", "Froid, produits froids")
            ->setParameter('service', $service)
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryserviceTypo19 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo and a.service = :service")
            ->setParameter("typo", "Produits chimiques dangereux")
            ->setParameter('service', $service)
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryserviceTypo20 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo and a.service = :service")
            ->setParameter("typo", "Vapeur, gaz, poussière")
            ->setParameter('service', $service)
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryserviceTypo21 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo and a.service = :service")
            ->setParameter("typo", "Matière combustible en flamme")
            ->setParameter('service', $service)
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryserviceTypo22 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo and a.service = :service")
            ->setParameter("typo", "Matière explosive")
            ->setParameter('service', $service)
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryserviceTypo23 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo and a.service = :service")
            ->setParameter("typo", "Electricité")
            ->setParameter('service', $service)
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryserviceTypo24 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo and a.service = :service")
            ->setParameter("typo", "Rayonnment ionisants")
            ->setParameter('service', $service)
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryserviceTypo25 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo and a.service = :service")
            ->setParameter("typo", "Divers: incendie rixe malaise…")
            ->setParameter('service', $service)
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryserviceTypo26 = $repository->createQueryBuilder('a')
            ->select("count(a.typologieEmr)")
            ->where("a.typologieEmr = :typo and a.service = :service")
            ->setParameter("typo", "Déclaration non classée")
            ->setParameter('service', $service)
            ->groupBy ("a.typologieEmr")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

    //-----------------------------------------------------------------------------------
    // **************************** 3eme CHART PAR SERVICE ********************************
    //----------------------------------------------------------------------------------
        $querytdateSiege = $repository->createQueryBuilder('b')
            ->select("count(b.siegeLesions)")
            ->where("b.service = :service")
            ->setParameter('service', $service)
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryserviceSiege1 = $repository->createQueryBuilder('a')
            ->select("count(a.siegeLesions)*100")
            ->where("a.siegeLesions = :siege and a.service = :service")
            ->setParameter('siege', 'Buste')
            ->setParameter('service', $service)
            ->groupBy("a.siegeLesions")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryserviceSiege2 = $repository->createQueryBuilder('a')
            ->select("count(a.siegeLesions)*100")
            ->where("a.siegeLesions = :siege and a.service = :service")
            ->setParameter('siege', 'Main')
            ->setParameter('service', $service)
            ->groupBy("a.siegeLesions")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryserviceSiege3 = $repository->createQueryBuilder('a')
            ->select("count(a.siegeLesions)*100")
            ->where("a.siegeLesions = :siege and a.service = :service")
            ->setParameter('siege', 'Membre inférieur')
            ->setParameter('service', $service)
            ->groupBy("a.siegeLesions")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryserviceSiege4 = $repository->createQueryBuilder('a')
            ->select("count(a.siegeLesions)*100")
            ->where("a.siegeLesions = :siege and a.service = :service")
            ->setParameter('siege', 'Membre supérieur')
            ->setParameter('service', $service)
            ->groupBy("a.siegeLesions")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryserviceSiege5 = $repository->createQueryBuilder('a')
            ->select("count(a.siegeLesions)*100")
            ->where("a.siegeLesions = :siege and a.service = :service")
            ->setParameter('siege', 'Pied')
            ->setParameter('service', $service)
            ->groupBy("a.siegeLesions")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryserviceSiege6 = $repository->createQueryBuilder('a')
            ->select("count(a.siegeLesions)*100")
            ->where("a.siegeLesions = :siege and a.service = :service")
            ->setParameter('siege', 'Siège interne')
            ->setParameter('service', $service)
            ->groupBy("a.siegeLesions")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryserviceSiege7 = $repository->createQueryBuilder('a')
            ->select("count(a.siegeLesions)*100")
            ->where("a.siegeLesions = :siege and a.service = :service")
            ->setParameter('siege', 'Tête')
            ->setParameter('service', $service)
            ->groupBy("a.siegeLesions")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryserviceSiege8 = $repository->createQueryBuilder('a')
            ->select("count(a.siegeLesions)*100")
            ->where("a.siegeLesions = :siege and a.service = :service")
            ->setParameter('siege', 'Yeux')
            ->setParameter('service', $service)
            ->groupBy("a.siegeLesions")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        $queryserviceSiege9 = $repository->createQueryBuilder('a')
            ->select("count(a.siegeLesions)*100")
            ->where("a.siegeLesions = :siege and a.service = :service")
            ->setParameter('siege', 'Divers:multiples')
            ->setParameter('service', $service)
            ->groupBy("a.siegeLesions")
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

    //-----------------------------------------------------------------------------------
    // **************************** 4eme CHART PAR SERVICE ********************************
    //----------------------------------------------------------------------------------
        //---------------------- PROJET TEM -----------------------------------
            $queryserviceP1AAA = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.projet = :pro AND a.typeAccident = :type and a.service = :service")
                ->setParameter('pro', 'TEM')
                ->setParameter('type', 'Avec arrêt')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceP1ASA = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.projet = :pro AND a.typeAccident = :type and a.service = :service")
                ->setParameter('pro', 'TEM')
                ->setParameter('type', 'Sans arrêt')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceP1AB = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.projet = :pro AND a.typeAccident = :type and a.service = :service")
                ->setParameter('pro', 'TEM')
                ->setParameter('type', 'Bénin')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceP1PA = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.projet = :pro AND a.typeAccident = :type and a.service = :service")
                ->setParameter('pro', 'TEM')
                ->setParameter('type', 'PA')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceP1SD = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.projet = :pro AND a.typeAccident = :type and a.service = :service")
                ->setParameter('pro', 'TEM')
                ->setParameter('type', 'SD')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceP1M = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.projet = :pro AND a.typeAccident = :type and a.service = :service")
                ->setParameter('pro', 'TEM')
                ->setParameter('type', 'Mortel')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceP1R = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.projet = :pro AND a.typeAccident = :type and a.service = :service")
                ->setParameter('pro', 'TEM')
                ->setParameter('type', 'Refus CPAM')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        //----------------------- PROJET 2P3519 -------------------------------

            $queryserviceP2AAA = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.projet = :pro AND a.typeAccident = :type and a.service = :service")
                ->setParameter('pro', '2P3519')
                ->setParameter('type', 'Avec arrêt')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceP2ASA = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.projet = :pro AND a.typeAccident = :type and a.service = :service")
                ->setParameter('pro', '2P3519')
                ->setParameter('type', 'Sans arrêt')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceP2AB = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.projet = :pro AND a.typeAccident = :type and a.service = :service")
                ->setParameter('pro', '2P3519')
                ->setParameter('type', 'Bénin')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceP2PA = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.projet = :pro AND a.typeAccident = :type and a.service = :service")
                ->setParameter('pro', '2P3519')
                ->setParameter('type', 'PA')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceP2SD = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.projet = :pro AND a.typeAccident = :type and a.service = :service")
                ->setParameter('pro', '2P3519')
                ->setParameter('type', 'SD')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceP2M = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.projet = :pro AND a.typeAccident = :type and a.service = :service")
                ->setParameter('pro', '2P3519')
                ->setParameter('type', 'Mortel')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceP2R = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.projet = :pro AND a.typeAccident = :type and a.service = :service")
                ->setParameter('pro', '2P3519')
                ->setParameter('type', 'Refus CPAM')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        // --------------------- PROJET 4R3519 ---------------------------------
                
            $queryserviceP4AAA = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.projet = :pro AND a.typeAccident = :type and a.service = :service")
                ->setParameter('pro', '4R3519')
                ->setParameter('type', 'Avec arrêt')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceP4ASA = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.projet = :pro AND a.typeAccident = :type and a.service = :service")
                ->setParameter('pro', '4R3519')
                ->setParameter('type', 'Sans arrêt')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceP4AB = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.projet = :pro AND a.typeAccident = :type and a.service = :service")
                ->setParameter('pro', '4R3519')
                ->setParameter('type', 'Bénin')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceP4PA = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.projet = :pro AND a.typeAccident = :type and a.service = :service")
                ->setParameter('pro', '4R3519')
                ->setParameter('type', 'PA')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceP4SD = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.projet = :pro AND a.typeAccident = :type and a.service = :service")
                ->setParameter('pro', '4R3519')
                ->setParameter('type', 'SD')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceP4M = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.projet = :pro AND a.typeAccident = :type and a.service = :service")
                ->setParameter('pro', '4R3519')
                ->setParameter('type', 'Mortel')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceP4R = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.projet = :pro AND a.typeAccident = :type and a.service = :service")
                ->setParameter('pro', '4R3519')
                ->setParameter('type', 'Refus CPAM')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        //-------------------- PROJET HORS ZONE -----------------------------
                
            $queryserviceP5AAA = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.projet = :pro AND a.typeAccident = :type and a.service = :service")
                ->setParameter('pro', 'Hors process')
                ->setParameter('type', 'Avec arrêt')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceP5ASA = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.projet = :pro AND a.typeAccident = :type and a.service = :service")
                ->setParameter('pro', 'Hors process')
                ->setParameter('type', 'Sans arrêt')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceP5AB = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.projet = :pro AND a.typeAccident = :type and a.service = :service")
                ->setParameter('pro', 'Hors process')
                ->setParameter('type', 'Bénin')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceP5PA = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.projet = :pro AND a.typeAccident = :type and a.service = :service")
                ->setParameter('pro', 'Hors process')
                ->setParameter('type', 'PA')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceP5SD = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.projet = :pro AND a.typeAccident = :type and a.service = :service")
                ->setParameter('pro', 'Hors process')
                ->setParameter('type', 'SD')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceP5M = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.projet = :pro AND a.typeAccident = :type and a.service = :service")
                ->setParameter('pro', 'Hors process')
                ->setParameter('type', 'Mortel')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceP5R = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.projet = :pro AND a.typeAccident = :type and a.service = :service")
                ->setParameter('pro', 'Hors process')
                ->setParameter('type', 'Refus CPAM')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;


    //-----------------------------------------------------------------------------------
    // **************************** 5eme CHART PAR SERVICE ********************************
    //----------------------------------------------------------------------------------
        // *************************** AAA par mois *********************************
            $queryserviceM01AAA = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-01%')
                ->setParameter('type', 'Avec arrêt')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceM02AAA = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-02%')
                ->setParameter('type', 'Avec arrêt')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceM03AAA = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-03%')
                ->setParameter('type', 'Avec arrêt')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceM04AAA = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-04%')
                ->setParameter('type', 'Avec arrêt')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceM05AAA = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-05%')
                ->setParameter('type', 'Avec arrêt')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceM06AAA = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-06%')
                ->setParameter('type', 'Avec arrêt')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceM07AAA = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-07%')
                ->setParameter('type', 'Avec arrêt')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceM08AAA = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-08%')
                ->setParameter('type', 'Avec arrêt')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceM09AAA = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-09%')
                ->setParameter('type', 'Avec arrêt')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceM10AAA = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-10%')
                ->setParameter('type', 'Avec arrêt')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceM11AAA = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-11%')
                ->setParameter('type', 'Avec arrêt')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceM12AAA = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-12%')
                ->setParameter('type', 'Avec arrêt')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        // *************************** ASA par mois *********************************
            $queryserviceM01ASA = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-01%')
                ->setParameter('type', 'Sans arrêt')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceM02ASA = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-02%')
                ->setParameter('type', 'Sans arrêt')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceM03ASA = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-03%')
                ->setParameter('type', 'Sans arrêt')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceM04ASA = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-04%')
                ->setParameter('type', 'Sans arrêt')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceM05ASA = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-05%')
                ->setParameter('type', 'Sans arrêt')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceM06ASA = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-06%')
                ->setParameter('type', 'Sans arrêt')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceM07ASA = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-07%')
                ->setParameter('type', 'Sans arrêt')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceM08ASA = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-08%')
                ->setParameter('type', 'Sans arrêt')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceM09ASA = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-09%')
                ->setParameter('type', 'Sans arrêt')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceM10ASA = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-10%')
                ->setParameter('type', 'Sans arrêt')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceM11ASA = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-11%')
                ->setParameter('type', 'Sans arrêt')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceM12ASA = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-12%')
                ->setParameter('type', 'Sans arrêt')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        // *************************** AB par mois **********************************
            $queryserviceM01AB = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-01%')
                ->setParameter('type', 'Bénin')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceM02AB = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-02%')
                ->setParameter('type', 'Bénin')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceM03AB = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-03%')
                ->setParameter('type', 'Bénin')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceM04AB = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-04%')
                ->setParameter('type', 'Bénin')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceM05AB = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-05%')
                ->setParameter('type', 'Bénin')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceM06AB = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-06%')
                ->setParameter('type', 'Bénin')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceM07AB = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-07%')
                ->setParameter('type', 'Bénin')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceM08AB = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-08%')
                ->setParameter('type', 'Bénin')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceM09AB = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-09%')
                ->setParameter('type', 'Bénin')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceM10AB = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-10%')
                ->setParameter('type', 'Bénin')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceM11AB = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-11%')
                ->setParameter('type', 'Bénin')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceM12AB = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-12%')
                ->setParameter('type', 'Bénin')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        // *************************** PA par mois **********************************
            $queryserviceM01PA = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-01%')
                ->setParameter('type', 'PA')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceM02PA = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-02%')
                ->setParameter('type', 'PA')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceM03PA = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-03%')
                ->setParameter('type', 'PA')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceM04PA = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-04%')
                ->setParameter('type', 'PA')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceM05PA = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-05%')
                ->setParameter('type', 'PA')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceM06PA = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-06%')
                ->setParameter('type', 'PA')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceM07PA = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-07%')
                ->setParameter('type', 'PA')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceM08PA = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-08%')
                ->setParameter('type', 'PA')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceM09PA = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-09%')
                ->setParameter('type', 'PA')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceM10PA = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-10%')
                ->setParameter('type', 'PA')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceM11PA = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-11%')
                ->setParameter('type', 'PA')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceM12PA = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-12%')
                ->setParameter('type', 'PA')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        // *************************** SD par mois **********************************
            $queryserviceM01SD = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-01%')
                ->setParameter('type', 'SD')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceM02SD = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-02%')
                ->setParameter('type', 'SD')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceM03SD = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-03%')
                ->setParameter('type', 'SD')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceM04SD = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-04%')
                ->setParameter('type', 'SD')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceM05SD = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-05%')
                ->setParameter('type', 'SD')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceM06SD = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-06%')
                ->setParameter('type', 'SD')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceM07SD = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-07%')
                ->setParameter('type', 'SD')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceM08SD = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-08%')
                ->setParameter('type', 'SD')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceM09SD = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-09%')
                ->setParameter('type', 'SD')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceM10SD = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-10%')
                ->setParameter('type', 'SD')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceM11SD = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-11%')
                ->setParameter('type', 'SD')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceM12SD = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-12%')
                ->setParameter('type', 'SD')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        // *************************** Mortel par mois ******************************
            $queryserviceM01M = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-01%')
                ->setParameter('type', 'Mortel')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceM02M = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-02%')
                ->setParameter('type', 'Mortel')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceM03M = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-03%')
                ->setParameter('type', 'Mortel')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceM04M = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-04%')
                ->setParameter('type', 'Mortel')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceM05M = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-05%')
                ->setParameter('type', 'Mortel')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceM06M = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-06%')
                ->setParameter('type', 'Mortel')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceM07M = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-07%')
                ->setParameter('type', 'Mortel')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceM08M = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-08%')
                ->setParameter('type', 'Mortel')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceM09M = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-09%')
                ->setParameter('type', 'Mortel')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceM10M = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-10%')
                ->setParameter('type', 'Mortel')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceM11M = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-11%')
                ->setParameter('type', 'Mortel')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceM12M = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-12%')
                ->setParameter('type', 'Mortel')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

        // *************************** Refus CPAM par mois **************************
            $queryserviceM01R = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-01%')
                ->setParameter('type', 'Refus CPAM')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceM02R = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-02%')
                ->setParameter('type', 'Refus CPAM')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceM03R = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-03%')
                ->setParameter('type', 'Refus CPAM')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceM04R = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-04%')
                ->setParameter('type', 'Refus CPAM')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceM05R = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-05%')
                ->setParameter('type', 'Refus CPAM')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceM06R = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-06%')
                ->setParameter('type', 'Refus CPAM')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceM07R = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-07%')
                ->setParameter('type', 'Refus CPAM')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceM08R = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-08%')
                ->setParameter('type', 'Refus CPAM')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceM09R = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-09%')
                ->setParameter('type', 'Refus CPAM')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceM10R = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-10%')
                ->setParameter('type', 'Refus CPAM')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceM11R = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-11%')
                ->setParameter('type', 'Refus CPAM')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

            $queryserviceM12R = $repository->createQueryBuilder('a')
                ->select("count(a.projet)")
                ->where("a.dateAccident Like :date AND a.typeAccident = :type and a.service = :service")
                ->setParameter('date', '2019-12%')
                ->setParameter('type', 'Refus CPAM')
                ->setParameter('service', $service)
                ->groupBy("a.typeAccident")
                ->getQuery()
                ->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR) ?? 0;

    //-----------------------------------------------------------------------------------
    // **************************** 6eme CHART PAR SERVICE ********************************
    //----------------------------------------------------------------------------------
        $queryservicedate = $repository->createQueryBuilder('a')
            ->select("a.nPrevensiss, a.dateAccident, a.typeAccident")
            ->where("a.dateAccident >= :date and a.aseRealise = :ase and a.service = :service")
            ->setParameter('date', new \DateTime('-16 day'))
            ->setParameter('ase', 'NON')
            ->setParameter('service', $service)
            ->orderBy("a.dateAccident" , "DESC")
            ->getQuery()
            ->execute();



                
        
    // ****************************** RETURNE ***************************************    
        return $this->render('charts/chartservice.html.twig', [

        //---------- PREMIER CHART --------------
            'countAB'=>$queryserviceAB,
            'countAAA'=>$queryserviceAAA,
            'countASA'=>$queryserviceASA,

            'countAB7'=>$queryserviceAB7,
            'countAAA7'=>$queryserviceAAA7,
            'countASA7'=>$queryserviceASA7,
        //---------- 2eme chart ------------------
            'lscountbytypo1'=>$queryserviceTypo1,
            'lscountbytypo2'=>$queryserviceTypo2,
            'lscountbytypo3'=>$queryserviceTypo3,
            'lscountbytypo4'=>$queryserviceTypo4,
            'lscountbytypo5'=>$queryserviceTypo5,
            'lscountbytypo6'=>$queryserviceTypo6,
            'lscountbytypo7'=>$queryserviceTypo7,
            'lscountbytypo8'=>$queryserviceTypo8,
            'lscountbytypo9'=>$queryserviceTypo9,
            'lscountbytypo10'=>$queryserviceTypo10,
            'lscountbytypo11'=>$queryserviceTypo11,
            'lscountbytypo12'=>$queryserviceTypo12,
            'lscountbytypo13'=>$queryserviceTypo13,
            'lscountbytypo14'=>$queryserviceTypo14,
            'lscountbytypo15'=>$queryserviceTypo15,
            'lscountbytypo16'=>$queryserviceTypo16,
            'lscountbytypo17'=>$queryserviceTypo17,
            'lscountbytypo18'=>$queryserviceTypo18,
            'lscountbytypo19'=>$queryserviceTypo19,
            'lscountbytypo20'=>$queryserviceTypo20,
            'lscountbytypo21'=>$queryserviceTypo21,
            'lscountbytypo22'=>$queryserviceTypo22,
            'lscountbytypo23'=>$queryserviceTypo23,
            'lscountbytypo24'=>$queryserviceTypo24,
            'lscountbytypo25'=>$queryserviceTypo25,
            'lscountbytypo26'=>$queryserviceTypo26,

        //-------------- 3eme chart --------------
            'cbysiege'=>$querytdateSiege,
            'cbysiege1'=>$queryserviceSiege1,
            'cbysiege2'=>$queryserviceSiege2,
            'cbysiege3'=>$queryserviceSiege3,
            'cbysiege4'=>$queryserviceSiege4,
            'cbysiege5'=>$queryserviceSiege5,
            'cbysiege6'=>$queryserviceSiege6,
            'cbysiege7'=>$queryserviceSiege7,
            'cbysiege8'=>$queryserviceSiege8,
            'cbysiege9'=>$queryserviceSiege9,

        //------------- 4eme chart --------------
            'lscounttemaaa'=>$queryserviceP1AAA,
            'lscounttemasa'=>$queryserviceP1ASA,
            'lscounttemab'=>$queryserviceP1AB,
            'lscounttempa'=>$queryserviceP1PA,
            'lscounttemsd'=>$queryserviceP1SD,
            'lscounttemm'=>$queryserviceP1M,
            'lscounttemr'=>$queryserviceP1R,

            'lscount2P35aaa'=>$queryserviceP2AAA,
            'lscount2P35asa'=>$queryserviceP2ASA,
            'lscount2P35ab'=>$queryserviceP2AB,
            'lscount2P35pa'=>$queryserviceP2PA,
            'lscount2P35sd'=>$queryserviceP2SD,
            'lscount2P35m'=>$queryserviceP2M,
            'lscount2P35r'=>$queryserviceP2R,

            'lscount4R35aaa'=>$queryserviceP4AAA,
            'lscount4R35asa'=>$queryserviceP4ASA,
            'lscount4R35ab'=>$queryserviceP4AB,
            'lscount4R35pa'=>$queryserviceP4PA,
            'lscount4R35sd'=>$queryserviceP4SD,
            'lscount4R35m'=>$queryserviceP4M,
            'lscount4R35r'=>$queryserviceP4R,

            'lscounthorsaaa'=>$queryserviceP5AAA,
            'lscounthorsasa'=>$queryserviceP5ASA,
            'lscounthorsab'=>$queryserviceP5AB,
            'lscounthorspa'=>$queryserviceP5PA,
            'lscounthorssd'=>$queryserviceP5SD,
            'lscounthorsm'=>$queryserviceP5M,
            'lscounthorsr'=>$queryserviceP5R,

        //--------------- 5eme chart --------------
            'lscount01aaa'=>$queryserviceM01AAA,
            'lscount02aaa'=>$queryserviceM02AAA,
            'lscount03aaa'=>$queryserviceM03AAA,
            'lscount04aaa'=>$queryserviceM04AAA,
            'lscount05aaa'=>$queryserviceM05AAA,
            'lscount06aaa'=>$queryserviceM06AAA,
            'lscount07aaa'=>$queryserviceM07AAA,
            'lscount08aaa'=>$queryserviceM08AAA,
            'lscount09aaa'=>$queryserviceM09AAA,
            'lscount10aaa'=>$queryserviceM10AAA,
            'lscount11aaa'=>$queryserviceM11AAA,
            'lscount12aaa'=>$queryserviceM12AAA,

            'lscount01asa'=>$queryserviceM01ASA,
            'lscount02asa'=>$queryserviceM02ASA,
            'lscount03asa'=>$queryserviceM03ASA,
            'lscount04asa'=>$queryserviceM04ASA,
            'lscount05asa'=>$queryserviceM05ASA,
            'lscount06asa'=>$queryserviceM06ASA,
            'lscount07asa'=>$queryserviceM07ASA,
            'lscount08asa'=>$queryserviceM08ASA,
            'lscount09asa'=>$queryserviceM09ASA,
            'lscount10asa'=>$queryserviceM10ASA,
            'lscount11asa'=>$queryserviceM11ASA,
            'lscount12asa'=>$queryserviceM12ASA,

            'lscount01ab'=>$queryserviceM01AB,
            'lscount02ab'=>$queryserviceM02AB,
            'lscount03ab'=>$queryserviceM03AB,
            'lscount04ab'=>$queryserviceM04AB,
            'lscount05ab'=>$queryserviceM05AB,
            'lscount06ab'=>$queryserviceM06AB,
            'lscount07ab'=>$queryserviceM07AB,
            'lscount08ab'=>$queryserviceM08AB,
            'lscount09ab'=>$queryserviceM09AB,
            'lscount10ab'=>$queryserviceM10AB,
            'lscount11ab'=>$queryserviceM11AB,
            'lscount12ab'=>$queryserviceM12AB,

            'lscount01pa'=>$queryserviceM01PA,
            'lscount02pa'=>$queryserviceM02PA,
            'lscount03pa'=>$queryserviceM03PA,
            'lscount04pa'=>$queryserviceM04PA,
            'lscount05pa'=>$queryserviceM05PA,
            'lscount06pa'=>$queryserviceM06PA,
            'lscount07pa'=>$queryserviceM07PA,
            'lscount08pa'=>$queryserviceM08PA,
            'lscount09pa'=>$queryserviceM09PA,
            'lscount10pa'=>$queryserviceM10PA,
            'lscount11pa'=>$queryserviceM11PA,
            'lscount12pa'=>$queryserviceM12PA,

            'lscount01sd'=>$queryserviceM01SD,
            'lscount02sd'=>$queryserviceM02SD,
            'lscount03sd'=>$queryserviceM03SD,
            'lscount04sd'=>$queryserviceM04SD,
            'lscount05sd'=>$queryserviceM05SD,
            'lscount06sd'=>$queryserviceM06SD,
            'lscount07sd'=>$queryserviceM07SD,
            'lscount08sd'=>$queryserviceM08SD,
            'lscount09sd'=>$queryserviceM09SD,
            'lscount10sd'=>$queryserviceM10SD,
            'lscount11sd'=>$queryserviceM11SD,
            'lscount12sd'=>$queryserviceM12SD,

            'lscount01m'=>$queryserviceM01M,
            'lscount02m'=>$queryserviceM02M,
            'lscount03m'=>$queryserviceM03M,
            'lscount04m'=>$queryserviceM04M,
            'lscount05m'=>$queryserviceM05M,
            'lscount06m'=>$queryserviceM06M,
            'lscount07m'=>$queryserviceM07M,
            'lscount08m'=>$queryserviceM08M,
            'lscount09m'=>$queryserviceM09M,
            'lscount10m'=>$queryserviceM10M,
            'lscount11m'=>$queryserviceM11M,
            'lscount12m'=>$queryserviceM12M,

            'lscount01r'=>$queryserviceM01R,
            'lscount02r'=>$queryserviceM02R,
            'lscount03r'=>$queryserviceM03R,
            'lscount04r'=>$queryserviceM04R,
            'lscount05r'=>$queryserviceM05R,
            'lscount06r'=>$queryserviceM06R,
            'lscount07r'=>$queryserviceM07R,
            'lscount08r'=>$queryserviceM08R,
            'lscount09r'=>$queryserviceM09R,
            'lscount10r'=>$queryserviceM10R,
            'lscount11r'=>$queryserviceM11R,
            'lscount12r'=>$queryserviceM12R,

        //-------------- 6eme chart ---------------
            'nPre'=>$queryservicedate,


        ]);

    }


}
