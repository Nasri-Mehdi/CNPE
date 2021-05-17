<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Base2019
 *
 * @ORM\Table(name="base2019", uniqueConstraints={@ORM\UniqueConstraint(name="chrono_unique", columns={"N_chrono"})})
 * @ORM\Entity
 */
class Base2019
{
    /**
     * @var int|null
     *
     * @ORM\Column(name="N_chrono", type="integer", nullable=false)
     */
    private $nChrono;

    /**
     * @var int
     *
     * @ORM\Column(name="N_prevensiss", type="integer", nullable=false)
     * @ORM\Id
     */
    private $nPrevensiss;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="Date_Accident", type="date", nullable=true)
     */
    private $dateAccident;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Heure", type="string", length=5, nullable=true)
     */
    private $heure;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Type_Accident", type="string", length=30, nullable=true)
     */
    private $typeAccident;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Trajet_Service", type="string", length=30, nullable=true)
     */
    private $trajetService;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Siege_Lesions", type="string", length=50, nullable=true)
     */
    private $siegeLesions;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Typologie_EMR", type="string", length=100, nullable=true)
     */
    private $typologieEmr;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Typologie_EMS", type="string", length=100, nullable=true)
     */
    private $typologieEms;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Nature_lesions", type="string", length=50, nullable=true)
     */
    private $natureLesions;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Recit_Succinct", type="string", length=1000, nullable=true)
     */
    private $recitSuccinct;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Service", type="string", length=4, nullable=true)
     */
    private $service;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Employeur", type="string", length=20, nullable=true)
     */
    private $employeur;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Entreprise_utilisatrice", type="string", length=10, nullable=true)
     */
    private $entrepriseUtilisatrice;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Tranche", type="string", length=10, nullable=true)
     */
    private $tranche;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Lieu", type="string", length=30, nullable=true)
     */
    private $lieu;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ZC_HZC", type="string", length=10, nullable=true)
     */
    private $zcHzc;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Projet", type="string", length=15, nullable=true)
     */
    private $projet;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Donneur_dorder", type="string", length=100, nullable=true)
     */
    private $donneurDorder;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ASE_realise", type="string", length=3, nullable=true)
     */
    private $aseRealise;

    /**
     * @var int|null
     *
     * @ORM\Column(name="Avancement_ASE", type="integer", nullable=true)
     */
    private $avancementAse;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="Date_maj_prevensiss", type="date", nullable=true)
     */
    private $dateMajPrevensiss;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Lien_ASE", type="string", length=10, nullable=true)
     */
    private $lienAse;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Recueil_realise", type="string", length=10, nullable=true)
     */
    private $recueilRealise;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Visite_Lieu", type="string", length=3, nullable=true)
     */
    private $visiteLieu;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="Date_Changement_etat", type="date", nullable=true)
     */
    private $dateChangementEtat;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Vigilance_Partagee", type="string", length=20, nullable=true)
     */
    private $vigilancePartagee;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Observation", type="string", length=100, nullable=true)
     */
    private $observation;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Suivi_Daction", type="string", length=20, nullable=true)
     */
    private $suiviDaction;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Comptabilise_CNPE", type="string", length=3, nullable=true)
     */
    private $comptabiliseCnpe;



    public function __construct( ){

    }


    public function getNChrono() {
		return $this->nChrono;
	}


	public function setNChrono($nChrono) {
		$this->nChrono = $nChrono;
	}


	public function getNPrevensiss() {
		return $this->nPrevensiss;
	}


	public function setNPrevensiss($nPrevensiss) {
		$this->nPrevensiss = $nPrevensiss;
	}


	public function getDateAccident() {
		return $this->dateAccident;
	}


	public function setDateAccident($dateAccident) {
		$this->dateAccident = $dateAccident;
	}


	public function getHeure() {
		return $this->heure;
	}


	public function setHeure($heure) {
		$this->heure = $heure;
	}


	public function getTypeAccident() {
		return $this->typeAccident;
	}


	public function setTypeAccident($typeAccident) {
		$this->typeAccident = $typeAccident;
	}


	public function getTrajetService() {
		return $this->trajetService;
	}


	public function setTrajetService($trajetService) {
		$this->trajetService = $trajetService;
    }
    
  public function getComptabiliseCnpe() {
		return $this->comptabiliseCnpe;
	}


	public function setComptabiliseCnpe($comptabiliseCnpe) {
		$this->comptabiliseCnpe = $comptabiliseCnpe;
	}


	public function getSiegeLesions() {
		return $this->siegeLesions;
	}


	public function setSiegeLesions($siegeLesions) {
		$this->siegeLesions = $siegeLesions;
	}


	public function getTypologieEmr() {
		return $this->typologieEmr;
	}


	public function setTypologieEmr($typologieEmr) {
		$this->typologieEmr = $typologieEmr;
	}


	public function getTypologieEms() {
		return $this->typologieEms;
	}


	public function setTypologieEms($typologieEms) {
		$this->typologieEms = $typologieEms;
	}


	public function getNatureLesions() {
		return $this->natureLesions;
	}


	public function setNatureLesions($natureLesions) {
		$this->natureLesions = $natureLesions;
	}


	public function getRecitSuccinct() {
		return $this->recitSuccinct;
	}


	public function setRecitSuccinct($recitSuccinct) {
		$this->recitSuccinct = $recitSuccinct;
	}


	public function getService() {
		return $this->service;
	}


	public function setService($service) {
		$this->service = $service;
	}


	public function getEmployeur() {
		return $this->employeur;
	}


	public function setEmployeur($employeur) {
		$this->employeur = $employeur;
	}


	public function getEntrepriseUtilisatrice() {
		return $this->entrepriseUtilisatrice;
	}


	public function setEntrepriseUtilisatrice($entrepriseUtilisatrice) {
		$this->entrepriseUtilisatrice = $entrepriseUtilisatrice;
	}


	public function getTranche() {
		return $this->tranche;
	}


	public function setTranche($tranche) {
		$this->tranche = $tranche;
	}


	public function getLieu() {
		return $this->lieu;
	}


	public function setLieu($lieu) {
		$this->lieu = $lieu;
	}


	public function getZcHzc() {
		return $this->zcHzc;
	}


	public function setZcHzc($zcHzc) {
		$this->zcHzc = $zcHzc;
	}


	public function getProjet() {
		return $this->projet;
	}


	public function setProjet($projet) {
		$this->projet = $projet;
	}


	public function getDonneurDorder() {
		return $this->donneurDorder;
	}


	public function setDonneurDorder($donneurDorder) {
		$this->donneurDorder = $donneurDorder;
	}


	public function getAseRealise() {
		return $this->aseRealise;
	}


	public function setAseRealise($aseRealise) {
		$this->aseRealise = $aseRealise;
	}


	public function getAvancementAse() {
		return $this->avancementAse;
	}


	public function setAvancementAse($avancementAse) {
		$this->avancementAse = $avancementAse;
	}


	public function getDateMajPrevensiss() {
		return $this->dateMajPrevensiss;
	}


	public function setDateMajPrevensiss($dateMajPrevensiss) {
		$this->dateMajPrevensiss = $dateMajPrevensiss;
	}


	public function getLienAse() {
		return $this->lienAse;
	}


	public function setLienAse($lienAse) {
		$this->lienAse = $lienAse;
	}


	public function getRecueilRealise() {
		return $this->recueilRealise;
	}


	public function setRecueilRealise( $recueilRealise) {
		$this->recueilRealise = $recueilRealise;
	}


	public function getVisiteLieu() {
		return $this->visiteLieu;
	}


	public function setVisiteLieu( $visiteLieu) {
		$this->visiteLieu = $visiteLieu;
	}


	public function getDateChangementEtat() {
		return $this->dateChangementEtat;
	}


	public function setDateChangementEtat($dateChangementEtat) {
		$this->dateChangementEtat = $dateChangementEtat;
	}


	public function getVigilancePartagee() {
		return $this->vigilancePartagee;
	}


	public function setVigilancePartagee($vigilancePartagee) {
		$this->vigilancePartagee = $vigilancePartagee;
	}


	public function getObservation() {
		return $this->observation;
	}


	public function setObservation($observation) {
		$this->observation = $observation;
	}


	public function getSuiviDaction() {
		return $this->suiviDaction;
	}


	public function setSuiviDaction($suiviDaction) {
		$this->suiviDaction = $suiviDaction;
	}


}
