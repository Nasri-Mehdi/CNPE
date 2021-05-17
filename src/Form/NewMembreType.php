<?php

namespace App\Form;

use App\Entity\Base2019;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;

class NewMembreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('nChrono', TextType::class, array('label' => 'Numero Chrono'))
        ->add('nPrevensiss', TextType::class, array('label' => 'Numero Prevensiss'))
        ->add('dateAccident', DateType::class, array('label' => 'Date Accident',
            'widget'=>'single_text'
            ))
        ->add('heure', TextType::class, array('label' => 'Heure', 'required' => false))
        ->add('typeAccident', ChoiceType::class, [
            'choices' => [
                'Bénin' => 'Bénin',
                'Sans arrêt' => 'Sans arrêt',
                'Avec arrêt' => 'Avec arrêt',
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
                'Membre inférieur' => 'Membre inférieur',
                'Membre supérieur' => 'Membre supérieur',
                'Pied' => 'Pied',
                'Siège interne' => 'Siège interne',
                'Tête' => 'Tête',
                'Yeux' => 'Yeux',
                'Divers:multiples' => 'Divers:multiples',
            ],
        ])
        ->add('typologieEmr', ChoiceType::class, array(
            'label' => 'Typologie EMR',
            'choices' =>[
                'Accident de plain-pied' => 'Accident de plain-pied',
                'Chute avec dénivellation' => 'Chute avec dénivellation',
                'Objet en cours de manipulation' => 'Objet en cours de manipulation',
                'Objet en cours de transport manuel' => 'Objet en cours de transport manuel',
                'Objet, particule en mvt accidentel' => 'Objet, particule en mvt accidentel',
                'Appareil, engin de levage, manut.' => 'Appareil, engin de levage, manut.',
                "Accessoires de levage & d'amarrage" => "Accessoires de levage & d'amarrage",
                'Vehicule en circulation' => 'Vehicule en circulation',
                'Mach. Prod. & transform. Énergie' => 'Mach. Prod. & transform. Énergie',
                'Organe de transmission' => 'Organe de transmission',
                'Machine et matériel à souder' => 'Machine et matériel à souder',
                'Matériel ou engin de terrassement' => 'Matériel ou engin de terrassement',
                'Machine-outil' => 'Machine-outil',
                'Outil port. tenu, guidé à la main' => 'Outil port. tenu, guidé à la main',
                'Outil individuel à main' => 'Outil individuel à main',
                'Pression, appareil à pression' => 'Pression, appareil à pression',
                'Chaleur, produits chauds' => 'Chaleur, produits chauds',
                'Froid, produits froids' => 'Froid, produits froids',
                'Produits chimiques dangereux' => 'Produits chimiques dangereux',
                'Vapeur, gaz, poussière' => 'Vapeur, gaz, poussière',
                'Matière combustible en flamme' => 'Matière combustible en flamme',
                'Matière explosive' => 'Matière explosive',
                'Electricité' => 'Electricité',
                'Rayonnment ionisants' => 'Rayonnment ionisants',
                'Divers: incendie rixe malaise…' => 'Divers: incendie rixe malaise…',
                'Déclaration non classée' => 'Déclaration non classée',

            ],
        ))
        ->add('typologieEms', ChoiceType::class, array(
            'label' => 'Typologie EMS',
            'choices' =>[
                '*********************  Accident de plain-pied  *********************' =>[
                    'PLAIN_PIED' =>[
                        'Non classifié' => 'Non classifié',
                        'Faux mouvement' => 'Faux mouvement',
                        'Glissade (autre)' => 'Glissade (autre)',
                        'Obstacle' => 'Obstacle',
                        'Circulation' => 'Circulation',
                        'Glissade neige, verglas' => 'Glissade neige, verglas',
                        'Glissade sol mouillé' => 'Glissade sol mouillé',
                        'Glissade sol souillé (huile, café, etc)' => 'Glissade sol souillé (huile, café, etc)',
                        'Obstacle bordure de trottoir' => 'Obstacle bordure de trottoir',
                        'Obstacle porte' => 'Obstacle porte',
                        'Obstacle personne' => 'Obstacle personne',
                    ],
                ],

                '*********************  Chute avec dénivellation  *********************' => [
                    'DENIVELLATION' =>[
                        'Non classifié' => 'Non classifié',
                        'Escalier, marche, bordure de trottoir, caniveau' => 'Escalier, marche, bordure de trottoir, caniveau',
                        'Echelle, escabeau (autre)' => 'Echelle, escabeau (autre)',
                        'Echafaudage' => 'Echafaudage',
                        'Toiture' => 'Toiture',
                        'Trou, fouille, tranchée (sans précision)' => 'Trou, fouille, tranchée (sans précision)',
                        'Depuis un véhicule' => 'Depuis un véhicule',
                        'Depuis un véhicule, plateforme élévatrice' => 'Depuis un véhicule, plateforme élévatrice',
                        'Echelle fixe' => 'Echelle fixe',
                        'Echelle mobile' => 'Echelle mobile',
                        'Escabeau' => 'Escabeau',
                        'Plateforme individuelle roulante' => 'Plateforme individuelle roulante',
                        'Travaux sur corde' => 'Travaux sur corde',
                        'Poteau' => 'Poteau',
                        'Pylônes' => 'Pylônes',
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
                        'Non classifié'=>'Non classifié',
                        "Chute d'objet"=>"Chute d'objet",
                        'Particule imput machines (copeau, limaille,…)'=>'Particule imput machines (copeau, limaille,…)',
                        'Poussière atmosphérique'=>'Poussière atmosphérique',
                    ],
                ],

                '*********************  Appareil, engin de levage, manut.  *********************' =>[
                    'LEVAGE_MANUT'=>[
                        'Non classifié'=>'Non classifié',
                        'Treuil, palan, cric, pont roulant, vérins,…'=>'Treuil, palan, cric, pont roulant, vérins,…',
                        'Transpalette, diable,…'=>'Transpalette, diable,…',
                        'Chariot élévateur,…'=>'Chariot élévateur,…',
                        'Plateforme élévatrice de personnel'=>'Plateforme élévatrice de personnel',
                    ],
                ],

                "*********************  Accessoires de levage & d'amarrage  *********************" => [
                    'AMARRAGE'=>[
                        'Elingue, grappin, hauban'=>'Elingue, grappin, hauban',
                    ],
                ],
                '*********************  Vehicule en circulation  *********************' => [
                    "VEHICULE"=>[
                        "Non classifié"=>"Non classifié",
                        "Deux roues (auttre)"=>"Deux roues (auttre)",
                        "Quatre roues < 3,5 t"=>"Quatre roues < 3,5 t",
                        "Quatre roues > 3,5 t"=>"Quatre roues > 3,5 t",
                        "Deux roues à moteur"=>"Deux roues à moteur",
                        "Deux roues vélo"=>"Deux roues vélo",
                        "Engin"=>"Engin",
                    ]
                ],

                '*********************  Mach. Prod. & transform. Énergie  *********************' => [
                    'PROD_ENERGIE'=>[
                        'Accu, batterie, turbine, moteur,…' => 'Accu, batterie, turbine, moteur,…',
                    ],
                ],
                '*********************  Organe de transmission  *********************' => [
                    'TRANSMISSION'=>[
                        'Chaine, courroie, engrenage'=>'Chaine, courroie, engrenage',
                    ],
                ],
                '*********************  Machine et matériel à souder  *********************' => [
                    'MATERIEL_SOUDER'=>[
                        'Non classifié'=>'Non classifié',
                        'Fer, lampe à souder'=>'Fer, lampe à souder',
                        'Poste soudure oxy. (Poste autogène)'=>'Poste soudure oxy. (Poste autogène)',
                        "Poste soudure arc (Coup d'arc)"=>"Poste soudure arc (Coup d'arc)",
                    ],
                ],

                '*********************  Matériel ou engin de terrassement  *********************' => [
                    "TERRASSEMENT"=>[
                        'Matériel ou engin de terrassement'=>'Matériel ou engin de terrassement',
                    ],
                ],
                '*********************  Machine-outil  *********************' => [
                    "MACHINE_OUTIL"=>[
                        "Machine outil d'atelier"=>"Machine outil d'atelier",
                    ],
                ],

                '*********************  Outil port. tenu, guidé à la main  *********************' => [
                    'OUTIL_PORTATIF'=>[
                        'Non classifié'=>'Non classifié',
                        'Meuleuse, ponceuse,…'=>'Meuleuse, ponceuse,…',
                        'Perceuse, brise béton,…'=>'Perceuse, brise béton,…',
                        'Riveteuse, sertisseuse,…'=>'Riveteuse, sertisseuse,…',
                        'Scie, tronçonneuse,…'=>'Scie, tronçonneuse,…',
                    ],
                ],
                '*********************  Outil individuel à main  *********************' => [
                    'OUTIL_MAIN'=>[
                        'Non classifié'=>'Non classifié',
                        'Couteau, cutter, grattoir, ciseau,…'=>'Couteau, cutter, grattoir, ciseau,…',
                        'Marteau, tournevis, clé, pinces,…'=>'Marteau, tournevis, clé, pinces,…',
                    ],
                ],

                '*********************  Pression, appareil à pression  *********************' =>[
                    'PRESSION'=>[
                        'Bouteille, autoclave'=>'Bouteille, autoclave',
                        'Canalisation, vanne, joint, flexible'=>'Canalisation, vanne, joint, flexible',
                        'Ambiance : pression ou dépression'=>'Ambiance : pression ou dépression',
                    ],
                ],
                '*********************  Chaleur, produits chauds  *********************' =>[
                    'CHALEUR'=>[
                        'Four, radiateur, canalisation de vapeur,…'=>'Four, radiateur, canalisation de vapeur,…',
                        'Ambiance thermique chaude'=>'Ambiance thermique chaude',
                    ],
                ],

                '*********************  Froid, produits froids  *********************' =>[
                    'FROID'=>[
                        'Non précisé'=>'Non précisé',
                        'Ambiance thermique froide'=>'Ambiance thermique froide',
                    ],
                ],
                '*********************  Produits chimiques dangereux  *********************' =>[
                    'CHIMIQUE'=>[
                        'Acide, solvant, trichlore,…'=>'Acide, solvant, trichlore,…',
                    ],
                ],
                '*********************  Vapeur, gaz, poussière  *********************' =>[
                    'VAPEUR'=>[
                        'Gaz échappement, réseau'=>'Gaz échappement, réseau',
                        'Non classifié'=>'Non classifié',
                        'Oxyprive'=>'Oxyprive',
                        'Amiante'=>'Amiante',
                        'Autres fibres et poussières cancérogènes'=>'Autres fibres et poussières cancérogènes',
                        'Autres fibres et poussioères non cancérogènes'=>'Autres fibres et poussioères non cancérogènes',
                    ],
                ],

                '*********************  Matière combustible en flamme  *********************' =>[
                    'MATIERE_COMBUSTIBLE'=>[
                        'Matière en flamme'=>'Matière en flamme',
                    ],
                ],
                '*********************  Matière explosive  *********************' =>[
                    'EXPLOSION'=>[
                        'Tout mélange explosif'=>'Tout mélange explosif',
                    ],
                ],

                '*********************  Electricité  *********************' =>[
                    'ELECTRICITE'=>[
                        'Non classifié'=>'Non classifié',
                        'Canal. Aérienne BT (non précisé)'=>'Canal. Aérienne BT (non précisé)',
                        'Canal. Aérienne > BT (non précisé)'=>'Canal. Aérienne > BT (non précisé)',
                        'Canal. Souterraine BT'=>'Canal. Souterraine BT',
                        'Canal. Souterraine > BT'=>'Canal. Souterraine > BT',
                        'Coffret, tableau de comptage (non précisé)'=>'Coffret, tableau de comptage (non précisé)',
                        'Poste transfo. HTA/BT (prop. EDF:cabine)'=>'Poste transfo. HTA/BT (prop. EDF:cabine)',
                        'Poste transfo. HTA/BT (prop. EDF:poteau)'=>'Poste transfo. HTA/BT (prop. EDF:poteau)',
                        'Poste client'=>'Poste client',
                        'Filerie, relayage, armoire élec. (non précisé)'=>'Filerie, relayage, armoire élec. (non précisé)',
                        'Canal. Aérienne BT nue'=>'Canal. Aérienne BT nue',
                        'Canal. Aérienne BT isolée'=>'Canal. Aérienne BT isolée',
                        'Canal. Aérienne > BT nue'=>'Canal. Aérienne > BT nue',
                        'Canal. Aérienne > BT isolée'=>'Canal. Aérienne > BT isolée',
                        'Coffret'=>'Coffret',
                        'Répartiteur'=>'Répartiteur',
                        'Tableau de comptage'=>'Tableau de comptage',
                        'Circuit de contrôle commande'=>'Circuit de contrôle commande',
                        'Circuit de puissance'=>'Circuit de puissance',
                        "Circuit d'éclairage"=>"Circuit d'éclairage",
                        'Circuit auxiliaire (batterie)'=>'Circuit auxiliaire (batterie)',
                        'Champs électromagnétiques'=>'Champs électromagnétiques',
                    ],
                ],
                '*********************  Rayonnment ionisants  *********************' => [
                    'RAYONNEMENT'=>[
                        'Non classifié'=>'Non classifié',
                        'Rayonnement ionisants "alpha"'=>'Rayonnement ionisants "alpha"',
                        'Rayonnement ionisants "bêta"'=>'Rayonnement ionisants "bêta"',
                        'Rayonnement ionisants "gamma"'=>'Rayonnement ionisants "gamma"',
                        'Rayonnement ionisants "neutrons"'=>'Rayonnement ionisants "neutrons"',
                        'Rayonnement ionisants "X"'=>'Rayonnement ionisants "X"',
                    ],
                ],

                '*********************  Divers: incendie rixe malaise…  *********************' => [
                    'DIVERS'=>[
                        'Non classifié'=>'Non classifié',
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
                        'Agents biologiques, infectieux ou pathogènes'=>'Agents biologiques, infectieux ou pathogènes',
                        'Conditions météo, forte chaleur'=>'Conditions météo, forte chaleur',
                        'Conditions météo, grand froid'=>'Conditions météo, grand froid',
                        'Vent violent, tempête, inondation, foudre'=>'Vent violent, tempête, inondation, foudre',
                        'Rayonnements optiques artificiels (UV, IR, laser)'=>'Rayonnements optiques artificiels (UV, IR, laser)',
                        'Rythme de travail, sce continu, astreinte (EvRP)'=>'Rythme de travail, sce continu, astreinte (EvRP)',
                        'TMS, effort soutenu, répété, posture contrainte (EvRP)'=>'TMS, effort soutenu, répété, posture contrainte (EvRP)',
                    ],
                ],
                '*********************  Déclaration non classée  *********************' =>[
                    'NON_CLASSEE'=>[
                        'Non précisé'=>'Non précisé',
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
                    'Autre HZ-Atelier méca GNU' => 'Autre HZ-Atelier méca GNU',
                    'Autre HZ-Atelier Nord' => 'Autre HZ-Atelier Nord',
                    'Autre HZ-autre' => 'Autre HZ-autre',
                    'Autre HZ-BAM' => 'Autre HZ-BAM',
                    'Autre HZ-Base incendie' => 'Autre HZ-Base incendie',
                    'Autre HZ-BDS' => 'Autre HZ-BDS',
                    'Autre HZ-Bengalow' => 'Autre HZ-Bengalow',
                    'Autre HZ-BLE' => 'Autre HZ-BLE',
                    'Autre HZ-Bulle 2' => 'Autre HZ-Bulle 2',
                    'Autre HZ-Démine' => 'Autre HZ-Démine',
                    'Autre HZ-DIESEL' => 'Autre HZ-DIESEL',
                    'Autre HZ-Galerie' => 'Autre HZ-Galerie',
                    'Autre HZ-GEV' => 'Autre HZ-GEV',
                    'Autre HZ-Hors site' => 'Autre HZ-Hors site',
                    'Autre HZ-Magasin général' => 'Autre HZ-Magasin général',
                    'Autre HZ-médical' => 'Autre HZ-médical',
                    'Autre HZ-Parc échaf' => 'Autre HZ-Parc échaf',
                    'Autre HZ-Portail' => 'Autre HZ-Portail',
                    'Autre HZ-Restaurant CCAS' => 'Autre HZ-Restaurant CCAS',
                    'Autre HZ-Restaurant inter-entreprise' => 'Autre HZ-Restaurant inter-entreprise',
                    'Autre HZ-RRI' => 'Autre HZ-RRI',
                    'Autre HZ-Salle secourisme' => 'Autre HZ-Salle secourisme',
                    'Autre HZ-SDP' => 'Autre HZ-SDP',
                    'Autre HZ-SEK' => 'Autre HZ-SEK',
                    'Autre HZ-Station de transit' => 'Autre HZ-Station de transit',
                    'Autre HZ-TER' => 'Autre HZ-TER',
                    'Autre HZ-travée centrale' => 'Autre HZ-travée centrale',
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
                    'BAN - Périphériques' => 'BAN - Périphériques',
                    'BAN - Vestiaire chaud' => 'BAN - Vestiaire chaud',
                ],
                'Bât administratif' => [
                    'Bât administratif A' => 'Bât administratif A',
                    'Bât administratif B' => 'Bât administratif B',
                    'Bât administratif C' => 'Bât administratif C',
                    'Bât administratif Nord' => 'Bât administratif Nord',
                    'Bât administratif Sud' => 'Bât administratif Sud',
                    'Bâtiment E' => 'Bâtiment E',
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
                    'Voirie-Guérite gardien' => 'Voirie-Guérite gardien',
                    'Voirie-Parking' => 'Voirie-Parking',
                    'Voirie-Réseau routier' => 'Voirie-Réseau routier',
                    'Voirie-Travée centrale' => 'Voirie-Travée centrale',
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
        ->add('vigilancePartagee', TextType::class, array('label' => 'Vigilance partagée', 'required' => false))
        ->add('observation', TextType::class, array('label' => 'Observation', 'required' => false))
        ->add('suiviDaction', TextType::class, array('label' => "Suivi d'Action", 'required' => false))
        


        ->add('save', SubmitType::class, array('label' => 'Enregister'))
        ->getForm();
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Base2019::class,
        ]);
    }
}
