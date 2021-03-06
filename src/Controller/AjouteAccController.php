<?php

namespace App\Controller;

use App\Entity\Base2019;
use App\Form\NewMembreType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;


class AjouteAccController extends Controller
{
    /**
     * @Route("/ajoute/acc", name="ajoute_acc")
     */
    public function ajoute(Request $request)
    {
        $accident = new Base2019();
       // $accidents = array();

        $form = $this->createForm(NewMembreType::class);

            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $accident = $form->getData();
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($accident);
                $entityManager->flush();

               // return new Response("Accident Ajoute");
               return $this->redirectToRoute('list_accidents');
            }


        return $this->render('ajoute_acc/index.html.twig', array('form' => $form->createView())
        );
    }

    /**
     * @Route("/edit/{nPrevensiss}", name="_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, $nPrevensiss) {

        $accident = new Base2019();
        $accident = $this->getDoctrine()
            ->getRepository(Base2019::class)
            ->find($nPrevensiss);

            
        $form = $this->createFormBuilder($accident)
            ->add('nChrono', TextType::class, array('label' => 'Numero Chrono'))
            ->add('nPrevensiss', TextType::class, array('label' => 'Numero Prevensiss'))
            ->add('dateAccident', DateType::class, array('label' => 'Date Accident',
                'widget'=>'single_text'
                ))
            ->add('heure', TextType::class, array('label' => 'Heure', 'required' => false))
            ->add('typeAccident', ChoiceType::class, [
                'choices' => [
                    'B??nin' => 'B??nin',
                    'Sans arr??t' => 'Sans arr??t',
                    'Avec arr??t' => 'Avec arr??t',
                    'PA' => 'PA',
                    'SD' => 'SD',
                    'Mortel' => 'Mortel',
                    'Refuse CPAM' => 'Refus CPAM',
                ],
            ])
            ->add('trajetService', ChoiceType::class, array (
                'label' => 'Service/Trajet',
                'choices' =>[
                    'Service' => 'Service',
                    'Trajet' => 'Trajet',
                    'Null' => null,
                ],
            ))
            ->add('siegeLesions', ChoiceType::class, [
                'choices' =>[
                    'Buste' => 'Buste',
                    'Main' => 'Main',
                    'Membre inf??rieur' => 'Membre inf??rieur',
                    'Membre sup??rieur' => 'Membre sup??rieur',
                    'Pied' => 'Pied',
                    'Si??ge interne' => 'Si??ge interne',
                    'T??te' => 'T??te',
                    'Yeux' => 'Yeux',
                    'Divers:multiples' => 'Divers:multiples',
                ],
            ])
            ->add('typologieEmr', ChoiceType::class, array(
                'label' => 'Typologie EMR',
                'choices' =>[
                    'Accident de plain-pied' => 'Accident de plain-pied',
                    'Chute avec d??nivellation' => 'Chute avec d??nivellation',
                    'Objet en cours de manipulation' => 'Objet en cours de manipulation',
                    'Objet en cours de transport manuel' => 'Objet en cours de transport manuel',
                    'Objet, particule en mvt accidentel' => 'Objet, particule en mvt accidentel',
                    'Appareil, engin de levage, manut.' => 'Appareil, engin de levage, manut.',
                    "Accessoires de levage & d'amarrage" => "Accessoires de levage & d'amarrage",
                    'Vehicule en circulation' => 'Vehicule en circulation',
                    'Mach. Prod. & transform. ??nergie' => 'Mach. Prod. & transform. ??nergie',
                    'Organe de transmission' => 'Organe de transmission',
                    'Machine et mat??riel ?? souder' => 'Machine et mat??riel ?? souder',
                    'Mat??riel ou engin de terrassement' => 'Mat??riel ou engin de terrassement',
                    'Machine-outil' => 'Machine-outil',
                    'Outil port. tenu, guid?? ?? la main' => 'Outil port. tenu, guid?? ?? la main',
                    'Outil individuel ?? main' => 'Outil individuel ?? main',
                    'Pression, appareil ?? pression' => 'Pression, appareil ?? pression',
                    'Chaleur, produits chauds' => 'Chaleur, produits chauds',
                    'Froid, produits froids' => 'Froid, produits froids',
                    'Produits chimiques dangereux' => 'Produits chimiques dangereux',
                    'Vapeur, gaz, poussi??re' => 'Vapeur, gaz, poussi??re',
                    'Mati??re combustible en flamme' => 'Mati??re combustible en flamme',
                    'Mati??re explosive' => 'Mati??re explosive',
                    'Electricit??' => 'Electricit??',
                    'Rayonnment ionisants' => 'Rayonnment ionisants',
                    'Divers: incendie rixe malaise???' => 'Divers: incendie rixe malaise???',
                    'D??claration non class??e' => 'D??claration non class??e',

                ],
            ))
            ->add('typologieEms', ChoiceType::class, array(
                'label' => 'Typologie EMS',
                'choices' =>[
                    '*********************  Accident de plain-pied  *********************' =>[
                        'PLAIN_PIED' =>[
                            'Non classifi??' => 'Non classifi??',
                            'Faux mouvement' => 'Faux mouvement',
                            'Glissade (autre)' => 'Glissade (autre)',
                            'Obstacle' => 'Obstacle',
                            'Circulation' => 'Circulation',
                            'Glissade neige, verglas' => 'Glissade neige, verglas',
                            'Glissade sol mouill??' => 'Glissade sol mouill??',
                            'Glissade sol souill?? (huile, caf??, etc)' => 'Glissade sol souill?? (huile, caf??, etc)',
                            'Obstacle bordure de trottoir' => 'Obstacle bordure de trottoir',
                            'Obstacle porte' => 'Obstacle porte',
                            'Obstacle personne' => 'Obstacle personne',
                        ],
                    ],

                    '*********************  Chute avec d??nivellation  *********************' => [
                        'DENIVELLATION' =>[
                            'Non classifi??' => 'Non classifi??',
                            'Escalier, marche, bordure de trottoir, caniveau' => 'Escalier, marche, bordure de trottoir, caniveau',
                            'Echelle, escabeau (autre)' => 'Echelle, escabeau (autre)',
                            'Echafaudage' => 'Echafaudage',
                            'Toiture' => 'Toiture',
                            'Trou, fouille, tranch??e (sans pr??cision)' => 'Trou, fouille, tranch??e (sans pr??cision)',
                            'Depuis un v??hicule' => 'Depuis un v??hicule',
                            'Depuis un v??hicule, plateforme ??l??vatrice' => 'Depuis un v??hicule, plateforme ??l??vatrice',
                            'Echelle fixe' => 'Echelle fixe',
                            'Echelle mobile' => 'Echelle mobile',
                            'Escabeau' => 'Escabeau',
                            'Plateforme individuelle roulante' => 'Plateforme individuelle roulante',
                            'Travaux sur corde' => 'Travaux sur corde',
                            'Poteau' => 'Poteau',
                            'Pyl??nes' => 'Pyl??nes',
                            'Escaliers, marches' => 'Escaliers, marches',
                            'Chute bordure de trottoir' => 'Chute bordure de trottoir',
                            'Fouille' => 'Fouille',
                            'Fouille' => 'Fouille',
                            'Talus' => 'Talus',
                        ],
                    ],

                    '*********************  Objet en cours de manipulation  *********************' =>[
                        'MANIPULATION'=>[
                            'Objet en cours de manipulation'=>'Objet en cours de manipulation',
                        ],
                    ],
                    '*********************  Objet en cours de transport manuel  *********************' =>[
                        'TRANSPORT_MANUEL'=>[
                            'Objet en cours de transport manuel'=>'Objet en cours de transport manuel',
                        ],
                    ],

                    '*********************  Objet, particule en mvt accidentel  *********************' => [
                        'OBJET_PARTICULE'=>[
                            'Non classifi??'=>'Non classifi??',
                            "Chute d'objet"=>"Chute d'objet",
                            'Particule imput machines (copeau, limaille,???)'=>'Particule imput machines (copeau, limaille,???)',
                            'Poussi??re atmosph??rique'=>'Poussi??re atmosph??rique',
                        ],
                    ],

                    '*********************  Appareil, engin de levage, manut.  *********************' =>[
                        'LEVAGE_MANUT'=>[
                            'Non classifi??'=>'Non classifi??',
                            'Treuil, palan, cric, pont roulant, v??rins,???'=>'Treuil, palan, cric, pont roulant, v??rins,???',
                            'Transpalette, diable,???'=>'Transpalette, diable,???',
                            'Chariot ??l??vateur,???'=>'Chariot ??l??vateur,???',
                            'Plateforme ??l??vatrice de personnel'=>'Plateforme ??l??vatrice de personnel',
                        ],
                    ],

                    "*********************  Accessoires de levage & d'amarrage  *********************" => [
                        'AMARRAGE'=>[
                            'Elingue, grappin, hauban'=>'Elingue, grappin, hauban',
                        ],
                    ],
                    '*********************  Vehicule en circulation  *********************' => [
                        "VEHICULE"=>[
                            "Non classifi??"=>"Non classifi??",
                            "Deux roues (auttre)"=>"Deux roues (auttre)",
                            "Quatre roues < 3,5 t"=>"Quatre roues < 3,5 t",
                            "Quatre roues > 3,5 t"=>"Quatre roues > 3,5 t",
                            "Deux roues ?? moteur"=>"Deux roues ?? moteur",
                            "Deux roues v??lo"=>"Deux roues v??lo",
                            "Engin"=>"Engin",
                        ]
                    ],

                    '*********************  Mach. Prod. & transform. ??nergie  *********************' => [
                        'PROD_ENERGIE'=>[
                            'Accu, batterie, turbine, moteur,???' => 'Accu, batterie, turbine, moteur,???',
                        ],
                    ],
                    '*********************  Organe de transmission  *********************' => [
                        'TRANSMISSION'=>[
                            'Chaine, courroie, engrenage'=>'Chaine, courroie, engrenage',
                        ],
                    ],
                    '*********************  Machine et mat??riel ?? souder  *********************' => [
                        'MATERIEL_SOUDER'=>[
                            'Non classifi??'=>'Non classifi??',
                            'Fer, lampe ?? souder'=>'Fer, lampe ?? souder',
                            'Poste soudure oxy. (Poste autog??ne)'=>'Poste soudure oxy. (Poste autog??ne)',
                            "Poste soudure arc (Coup d'arc)"=>"Poste soudure arc (Coup d'arc)",
                        ],
                    ],

                    '*********************  Mat??riel ou engin de terrassement  *********************' => [
                        "TERRASSEMENT"=>[
                            'Mat??riel ou engin de terrassement'=>'Mat??riel ou engin de terrassement',
                        ],
                    ],
                    '*********************  Machine-outil  *********************' => [
                        "MACHINE_OUTIL"=>[
                            "Machine outil d'atelier"=>"Machine outil d'atelier",
                        ],
                    ],

                    '*********************  Outil port. tenu, guid?? ?? la main  *********************' => [
                        'OUTIL_PORTATIF'=>[
                            'Non classifi??'=>'Non classifi??',
                            'Meuleuse, ponceuse,???'=>'Meuleuse, ponceuse,???',
                            'Perceuse, brise b??ton,???'=>'Perceuse, brise b??ton,???',
                            'Riveteuse, sertisseuse,???'=>'Riveteuse, sertisseuse,???',
                            'Scie, tron??onneuse,???'=>'Scie, tron??onneuse,???',
                        ],
                    ],
                    '*********************  Outil individuel ?? main  *********************' => [
                        'OUTIL_MAIN'=>[
                            'Non classifi??'=>'Non classifi??',
                            'Couteau, cutter, grattoir, ciseau,???'=>'Couteau, cutter, grattoir, ciseau,???',
                            'Marteau, tournevis, cl??, pinces,???'=>'Marteau, tournevis, cl??, pinces,???',
                        ],
                    ],

                    '*********************  Pression, appareil ?? pression  *********************' =>[
                        'PRESSION'=>[
                            'Bouteille, autoclave'=>'Bouteille, autoclave',
                            'Canalisation, vanne, joint, flexible'=>'Canalisation, vanne, joint, flexible',
                            'Ambiance : pression ou d??pression'=>'Ambiance : pression ou d??pression',
                        ],
                    ],
                    '*********************  Chaleur, produits chauds  *********************' =>[
                        'CHALEUR'=>[
                            'Four, radiateur, canalisation de vapeur,???'=>'Four, radiateur, canalisation de vapeur,???',
                            'Ambiance thermique chaude'=>'Ambiance thermique chaude',
                        ],
                    ],

                    '*********************  Froid, produits froids  *********************' =>[
                        'FROID'=>[
                            'Non pr??cis??'=>'Non pr??cis??',
                            'Ambiance thermique froide'=>'Ambiance thermique froide',
                        ],
                    ],
                    '*********************  Produits chimiques dangereux  *********************' =>[
                        'CHIMIQUE'=>[
                            'Acide, solvant, trichlore,???'=>'Acide, solvant, trichlore,???',
                        ],
                    ],
                    '*********************  Vapeur, gaz, poussi??re  *********************' =>[
                        'VAPEUR'=>[
                            'Gaz ??chappement, r??seau'=>'Gaz ??chappement, r??seau',
                            'Non classifi??'=>'Non classifi??',
                            'Oxyprive'=>'Oxyprive',
                            'Amiante'=>'Amiante',
                            'Autres fibres et poussi??res canc??rog??nes'=>'Autres fibres et poussi??res canc??rog??nes',
                            'Autres fibres et poussio??res non canc??rog??nes'=>'Autres fibres et poussio??res non canc??rog??nes',
                        ],
                    ],

                    '*********************  Mati??re combustible en flamme  *********************' =>[
                        'MATIERE_COMBUSTIBLE'=>[
                            'Mati??re en flamme'=>'Mati??re en flamme',
                        ],
                    ],
                    '*********************  Mati??re explosive  *********************' =>[
                        'EXPLOSION'=>[
                            'Tout m??lange explosif'=>'Tout m??lange explosif',
                        ],
                    ],

                    '*********************  Electricit??  *********************' =>[
                        'ELECTRICITE'=>[
                            'Non classifi??'=>'Non classifi??',
                            'Canal. A??rienne BT (non pr??cis??)'=>'Canal. A??rienne BT (non pr??cis??)',
                            'Canal. A??rienne > BT (non pr??cis??)'=>'Canal. A??rienne > BT (non pr??cis??)',
                            'Canal. Souterraine BT'=>'Canal. Souterraine BT',
                            'Canal. Souterraine > BT'=>'Canal. Souterraine > BT',
                            'Coffret, tableau de comptage (non pr??cis??)'=>'Coffret, tableau de comptage (non pr??cis??)',
                            'Poste transfo. HTA/BT (prop. EDF:cabine)'=>'Poste transfo. HTA/BT (prop. EDF:cabine)',
                            'Poste transfo. HTA/BT (prop. EDF:poteau)'=>'Poste transfo. HTA/BT (prop. EDF:poteau)',
                            'Poste client'=>'Poste client',
                            'Filerie, relayage, armoire ??lec. (non pr??cis??)'=>'Filerie, relayage, armoire ??lec. (non pr??cis??)',
                            'Canal. A??rienne BT nue'=>'Canal. A??rienne BT nue',
                            'Canal. A??rienne BT isol??e'=>'Canal. A??rienne BT isol??e',
                            'Canal. A??rienne > BT nue'=>'Canal. A??rienne > BT nue',
                            'Canal. A??rienne > BT isol??e'=>'Canal. A??rienne > BT isol??e',
                            'Coffret'=>'Coffret',
                            'R??partiteur'=>'R??partiteur',
                            'Tableau de comptage'=>'Tableau de comptage',
                            'Circuit de contr??le commande'=>'Circuit de contr??le commande',
                            'Circuit de puissance'=>'Circuit de puissance',
                            "Circuit d'??clairage"=>"Circuit d'??clairage",
                            'Circuit auxiliaire (batterie)'=>'Circuit auxiliaire (batterie)',
                            'Champs ??lectromagn??tiques'=>'Champs ??lectromagn??tiques',
                        ],
                    ],
                    '*********************  Rayonnment ionisants  *********************' => [
                        'RAYONNEMENT'=>[
                            'Non classifi??'=>'Non classifi??',
                            'Rayonnement ionisants "alpha"'=>'Rayonnement ionisants "alpha"',
                            'Rayonnement ionisants "b??ta"'=>'Rayonnement ionisants "b??ta"',
                            'Rayonnement ionisants "gamma"'=>'Rayonnement ionisants "gamma"',
                            'Rayonnement ionisants "neutrons"'=>'Rayonnement ionisants "neutrons"',
                            'Rayonnement ionisants "X"'=>'Rayonnement ionisants "X"',
                        ],
                    ],

                    '*********************  Divers: incendie rixe malaise???  *********************' => [
                        'DIVERS'=>[
                            'Non classifi??'=>'Non classifi??',
                            'Jeu, sport'=>'Jeu, sport',
                            'Chien'=>'Chien',
                            'Insecte'=>'Insecte',
                            'Autre animal'=>'Autre animal',
                            'Malaise, mort subite'=>'Malaise, mort subite',
                            'Violence interne, rixe'=>'Violence interne, rixe',
                            'Agression externe'=>'Agression externe',
                            'Attentat'=>'Attentat',
                            'Choc psychologique'=>'Choc psychologique',
                            'Onde sonore, bruit, ultrasons'=>'Onde sonore, bruit, ultrasons',
                            'Agents biologiques, infectieux ou pathog??nes'=>'Agents biologiques, infectieux ou pathog??nes',
                            'Conditions m??t??o, forte chaleur'=>'Conditions m??t??o, forte chaleur',
                            'Conditions m??t??o, grand froid'=>'Conditions m??t??o, grand froid',
                            'Vent violent, temp??te, inondation, foudre'=>'Vent violent, temp??te, inondation, foudre',
                            'Rayonnements optiques artificiels (UV, IR, laser)'=>'Rayonnements optiques artificiels (UV, IR, laser)',
                            'Rythme de travail, sce continu, astreinte (EvRP)'=>'Rythme de travail, sce continu, astreinte (EvRP)',
                            'TMS, effort soutenu, r??p??t??, posture contrainte (EvRP)'=>'TMS, effort soutenu, r??p??t??, posture contrainte (EvRP)',
                        ],
                    ],
                    '*********************  D??claration non class??e  *********************' =>[
                        'NON_CLASSEE'=>[
                            'Non pr??cis??'=>'Non pr??cis??',
                        ],
                    ],
                ],
            ))
            ->add('natureLesions', TextType::class, array('label' => 'Nature lesions', 'required' => false))
            ->add('recitSuccinct', TextareaType::class, array('label' => 'Recit Succinct', 'required' => false))
            ->add('comptabiliseCnpe', ChoiceType::class, array(
                'label' => 'Comptabilise CNPE',
                'choices' => [
                    'OUI' => 'OUI',
                    'NON' => 'NON',
                ],
            ))
            ->add('service', ChoiceType::class, [
                'choices' =>[
                    'APS' => 'APS',
                    'CDT' => 'CDT',
                    'DIR' => 'DIR',
                    'ECT' => 'ECT',
                    'FIA' => 'FIA',
                    'GNU' => 'GNU',
                    'ISI' => 'ISI',
                    'MCE' => 'MCE',
                    'MRH' => 'MRH',
                    'MSR' => 'MSR',
                    'MTE' => 'MTE',
                    'PMO' => 'PMO',
                    'SAU' => 'SAU',
                    'SCF' => 'SCF',
                    'SIR' => 'SIR',
                    'SMP' => 'SMP',
                    'SPR' => 'SPR',
                    'SST' => 'SST',
                    'AMT' => 'AMT',
                ],
            ])
            ->add('employeur', TextType::class, array('label' => 'Employeur', 'required' => false))
            ->add('entrepriseUtilisatrice', TextType::class, array('label' => 'Entreprise Utilisatrice', 'required' => false))
            ->add('tranche', ChoiceType::class, [
                'choices' => [
                    '0' => '0',
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                    '8' => '8',
                    '9' => '9',
                    'Site' => 'Site',
                    'Hors site' => 'Hors site',
                ],
            ])
            ->add('lieu', ChoiceType::class, [
                'choices' => [
                    'Hors Zone' => [
                        'Autre HZ-Ancienne cantine' => 'Autre HZ-Ancienne cantine',
                        'Autre HZ-Atelier B' => 'Autre HZ-Atelier B',
                        'Autre HZ-Atelier central A' => 'Autre HZ-Atelier central A',
                        'Autre HZ-Atelier m??ca GNU' => 'Autre HZ-Atelier m??ca GNU',
                        'Autre HZ-Atelier Nord' => 'Autre HZ-Atelier Nord',
                        'Autre HZ-autre' => 'Autre HZ-autre',
                        'Autre HZ-BAM' => 'Autre HZ-BAM',
                        'Autre HZ-Base incendie' => 'Autre HZ-Base incendie',
                        'Autre HZ-BDS' => 'Autre HZ-BDS',
                        'Autre HZ-Bengalow' => 'Autre HZ-Bengalow',
                        'Autre HZ-BLE' => 'Autre HZ-BLE',
                        'Autre HZ-Bulle 2' => 'Autre HZ-Bulle 2',
                        'Autre HZ-D??mine' => 'Autre HZ-D??mine',
                        'Autre HZ-DIESEL' => 'Autre HZ-DIESEL',
                        'Autre HZ-Galerie' => 'Autre HZ-Galerie',
                        'Autre HZ-GEV' => 'Autre HZ-GEV',
                        'Autre HZ-Hors site' => 'Autre HZ-Hors site',
                        'Autre HZ-Magasin g??n??ral' => 'Autre HZ-Magasin g??n??ral',
                        'Autre HZ-m??dical' => 'Autre HZ-m??dical',
                        'Autre HZ-Parc ??chaf' => 'Autre HZ-Parc ??chaf',
                        'Autre HZ-Portail' => 'Autre HZ-Portail',
                        'Autre HZ-Restaurant CCAS' => 'Autre HZ-Restaurant CCAS',
                        'Autre HZ-Restaurant inter-entreprise' => 'Autre HZ-Restaurant inter-entreprise',
                        'Autre HZ-RRI' => 'Autre HZ-RRI',
                        'Autre HZ-Salle secourisme' => 'Autre HZ-Salle secourisme',
                        'Autre HZ-SDP' => 'Autre HZ-SDP',
                        'Autre HZ-SEK' => 'Autre HZ-SEK',
                        'Autre HZ-Station de transit' => 'Autre HZ-Station de transit',
                        'Autre HZ-TER' => 'Autre HZ-TER',
                        'Autre HZ-trav??e centrale' => 'Autre HZ-trav??e centrale',
                        'Autre HZ-Vestiaire entreprise' => 'Autre HZ-Vestiaire entreprise',
                        'Autre HZ-Vestiaire froid' => 'Autre HZ-Vestiaire froid',
                    ],
                    'Zone' => [
                        'Autre Zone-Atelier broche' => 'Autre Zone-Atelier broche',
                        'Autre Zone-Atelier chaud' => 'Autre Zone-Atelier chaud',
                        'Autre Zone-BAC' => 'Autre Zone-BAC',
                        'Autre Zone-Bulle 1' => 'Autre Zone-Bulle 1',
                        'Autre Zone-Bulle 3' => 'Autre Zone-Bulle 3',
                        'Autre Zone-labo chaud' => 'Autre Zone-labo chaud',
                        'Autre Zone-laverie' => 'Autre Zone-laverie',
                        'Autre Zone-Verrue' => 'Autre Zone-Verrue',
                    ],
                    'BAN et BAM' =>[
                        'BAM' => 'BAM',
                        'BAN - BAN8' => 'BAN - BAN8',
                        'BAN - BAN9' => 'BAN - BAN9',
                        'BAN - P??riph??riques' => 'BAN - P??riph??riques',
                        'BAN - Vestiaire chaud' => 'BAN - Vestiaire chaud',
                    ],
                    'B??t administratif' => [
                        'B??t administratif A' => 'B??t administratif A',
                        'B??t administratif B' => 'B??t administratif B',
                        'B??t administratif C' => 'B??t administratif C',
                        'B??t administratif Nord' => 'B??t administratif Nord',
                        'B??t administratif Sud' => 'B??t administratif Sud',
                        'B??timent E' => 'B??timent E',
                    ],
                    'BK' => [
                        'BK - BK1' => 'BK - BK1',
                        'BK - BK2' => 'BK - BK2',
                        'BK - BK3' => 'BK - BK3',
                        'BK - BK4' => 'BK - BK4',
                    ],
                    'BR' => [
                        'BR - BR1' => 'BR - BR1',
                        'BR - BR2' => 'BR - BR2',
                        'BR - BR3' => 'BR - BR3',
                        'BR - BR4' => 'BR - BR4',
                    ],
                    'Divers' => [
                        'Divers-Autre' => 'Divers-Autre',
                        'Divers-Hors site' => 'Divers-Hors site',
                    ],
                    'SDM' => [
                        'SDM' => 'SDM',
                        'SDM-TN1' => 'SDM-TN1',
                        'SDM-TN2' => 'SDM-TN2',
                        'SDM-TN3' => 'SDM-TN3',
                        'SDM-TN4' => 'SDM-TN4',
                    ],
                    'Voirie' => [
                        'Voirie-Gu??rite gardien' => 'Voirie-Gu??rite gardien',
                        'Voirie-Parking' => 'Voirie-Parking',
                        'Voirie-R??seau routier' => 'Voirie-R??seau routier',
                        'Voirie-Trav??e centrale' => 'Voirie-Trav??e centrale',
                        'Voirie-ZPR' => 'Voirie-ZPR',
                        'Voirie-ZAC' => 'Voirie-ZAC',
                    ],
                ],
            ])
            ->add('zcHzc', ChoiceType::class, array(
                'label' => 'ZC/HZC',
                'choices' => [
                    'ZC' => 'ZC',
                    'HZC' => 'HZC',
                    'Hors site' => 'Hore site',
                ],
            ))
            ->add('projet', ChoiceType::class, [
                'choices' => [
                    '*********** 2019 ***********' =>[
                        'TEM' => 'TEM',
                        '2P3519' => '2P3519',
                        '4R3519' => '4R3519',
                        '1D3619' => '1D3619',
                        'Hors process' => 'Hors process',
                    ],
                    '*********** 2020 ***********' =>[
                        'TEM' => 'TEM',
                        '1R3720' => '1R3720',
                        '2R3620' => '2R3620',
                        '3P3620' => '3P3620',
                        '4P3620' => '4P3620',
                        'Hors process' => 'Hors process',
                    ],
                ],
            ])
            ->add('donneurDorder', TextType::class, array('label' => 'Donneur dorder', 'required' => false))
            ->add('aseRealise', ChoiceType::class, array(
                'label' => 'ASE Realise',
                'choices'=>[
                    'NON'=>'NON', 'OUI'=>'OUI',],
                ))
        /* ->add('etatAse', ChoiceType::class, [
                'choices' => [
                    'En cours' => 'En cours',
                    'En retard' => 'En retard',
                    'Fini' => 'Fini',
                ],
            ])
            ->add('dateLimiteAse', DateType::class, array ('label' => 'Date Limite ASE',
                'widget'=>'single_text'
                )) */
            ->add('avancementAse', TextType::class, array('label' => 'Avancement ASE', 'required' => false))
            //->add('dateRelanceAse', DateType::class, array('label' => 'Date Relance ASE',
            //   'widget'=>'single_text'
            //   ))
            //->add('nCsAseP15', TextType::class, array('label' => 'N CS ASE > 15j'))
            ->add('dateMajPrevensiss', DateType::class, array('label' => 'Date Maj Prevensiss',
                'widget'=>'single_text',
                'required'=>false,
                ))
            ->add('lienAse', TextType::class, array('label' => 'Lien ASE', 'required' => false))
            ->add('recueilRealise', TextType::class, array('label' => 'Recueil Realise', 'required' => false))
            ->add('visiteLieu', TextType::class, array('label' => 'Visite Lieu', 'required' => false))
            ->add('dateChangementEtat', DateType::class, array('label' => 'Date Changement Etat',
                'widget'=>'single_text',
                'required' => false,
                ))
            ->add('vigilancePartagee', TextType::class, array('label' => 'Vigilance partag??e', 'required' => false))
            ->add('observation', TextType::class, array('label' => 'Observation', 'required' => false))
            ->add('suiviDaction', TextType::class, array('label' => "Suivi d'Action", 'required' => false))
            


            ->add('save', SubmitType::class, array('label' => 'Enregister'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();

            $entityManager->flush();

           // return new Response("Accident modifie");
           return $this->redirectToRoute('list_accidents');
        }

        $formView = $form->createView();

        return $this->render('ajoute_acc/edit.html.twig', array(
            'form' => $formView
        ));

    }
}
