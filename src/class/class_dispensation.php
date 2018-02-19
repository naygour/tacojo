<?php

    class dispensation 
    {
        private $selectDerniereDispen;
        private $selectAll;
        private $insertAll;
        private $updateAll;
        private $selectId;
        private $selectOneYearMonth;
        private $selectDateInclusion;
        private $selectEtat;
        private $selectRDV;
        private $selectDate;
        private $selectDateDisp;
        private $selectAllDateDisp;
        
        public function __construct($db) 
        {
            $this->selectDerniereDispen = $db->prepare("SELECT  MAX(`date_dispensation`) AS 'derniereDisp' , rdv FROM `DISPENSATION` WHERE `id_patient`=:id_patient");
            
            $this->insertAll = $db->prepare("INSERT INTO DISPENSATION(id_patient, etat_dispensation, date_dispensation,
                                            date_debut_traitement, nb_jours_traitement, date_fin_traitement, rdv,poids, observations) 
                                            values(:id_patient, :etat_dispensation, :date_dispensation, :date_debut_traitement, 
                                            :nb_jours_traitement, :date_fin_traitement, :rdv, :poids, :observations)");

            $this->selectAll=$db->prepare("select * from DISPENSATION ");

            $this->updateAll=$db->prepare("update DISPENSATION SET  id_patient=:id_patient , etat_dispensation=:etat_dispensation,
                                           date_dispensation=:date_dispensation, date_debut_traitement=:date_debut_traitement , 
                                           nb_jours_traitement=:nb_jours_traitement, date_fin_traitement=:date_fin_traitement , rdv=:rdv 
                                           , poids =:poids ,  observations=:observations WHERE id_dispensation=:id_dispensation");

            $this->selectId=$db->prepare("select * from DISPENSATION where id_patient=:id_patient");

            $this->selectOneYearMonth=$db->prepare("select * from DISPENSATION where id_patient=:id_patient and
                                                    MONTH(date_dispensation)=:mois AND YEAR(date_dispensation)=:annee");

            $this->selectDateInclusion = $db->prepare("SELECT MIN(date_dispensation) from DISPENSATION where id_patient=:id_patient");
            
            $this->selectEtat = $db->prepare("SELECT * FROM DISPENSATION INNER JOIN ETAT_DISPENSATION ON DISPENSATION.etat_dispensation=ETAT_DISPENSATION.id_etat_dispen WHERE id_patient=:id_patient AND
                                              date_dispensation = (select MAX(date_dispensation) FROM DISPENSATION 
                                              WHERE id_patient=:id_patient)");
            
            $this->selectRDV=$db->prepare("select rdv from DISPENSATION where id_dispensation=:id_dispensation ");
             
            $this->selectDateDisp=$db->prepare("select etat_dispensation,date_dispensation from DISPENSATION where date_dispensation=:date_dispensation ");
            
            $this->selectDate=$db->prepare("select rdv from DISPENSATION where rdv=:rdv ");
            
            $this->selectAllDateDisp=$db->prepare("select date_dispensation from DISPENSATION where id_patient=:id_patient");
            
        }
        
        public function selectDerniereDispen($id_patient) {
            $this->selectDerniereDispen->execute(array(':id_patient' => $id_patient));
            return $this->selectDerniereDispen->fetch();
        }
        
        

        public function insertAll($id_patient, $etat_dispensation, $date_dispensation,
                $date_debut_traitement, $nb_jours_traitement, $date_fin_traitement, $rdv,$poids, $observations){

            $this->insertAll->execute(array(
                    ':id_patient' => $id_patient,':etat_dispensation' => $etat_dispensation,
                    ':date_dispensation' => $date_dispensation,':date_debut_traitement' => $date_debut_traitement,
                    ':nb_jours_traitement' => $nb_jours_traitement,':date_fin_traitement' => $date_fin_traitement,
                    ':rdv' => $rdv,':poids' => $poids,':observations' => $observations));
            return $this->insertAll->rowCount();
        }

        public function updateAll($id_dispensation , $id_patient ,$etat_dispensation, $date_dispensation,
                $date_debut_traitement, $nb_jours_traitement, $date_fin_traitement, $rdv,$poids, $observations){
            
            $this->updateAll->execute(array(':id_dispensation' => $id_dispensation,':id_patient' => $id_patient,
                    ':etat_dispensation' => $etat_dispensation,':date_dispensation' => $date_dispensation,
                    ':date_debut_traitement' => $date_debut_traitement,':nb_jours_traitement' => $nb_jours_traitement,
                    ':date_fin_traitement' => $date_fin_traitement,':rdv' => $rdv,
                    ':poids' => $poids,':observations' => $observations));
            return $this->updateAll->rowCount();
        }

        public function selectAll() {
            $this->selectAll->execute();
            return $this->selectAll->fetchAll();
        }

        public function selectId($id_patient) {
            $this->selectId->execute(array(':id_patient' => $id_patient));
            return $this->selectId->fetch();
        }

        public function selectOneYearMonth($id_patient, $mois, $annee) {   
            $this->selectOneYearMonth->execute(array(':id_patient' => $id_patient,':mois' => $mois,':annee' => $annee));
            return $this->selectOneYearMonth->fetch();
        }
        
        public function selectDateInclusion($id_patient) {
            $this->selectDateInclusion->execute(array(':id_patient' => $id_patient));
            return $this->selectDateInclusion->fetch();
        }
        
        public function selectEtat($id_patient) {
            $this->selectEtat->execute(array(':id_patient' => $id_patient));
            return $this->selectEtat->fetch();
        }
        
        public function selectRDV($id_dispensation) {
            $this->selectRDV->execute(array(':id_dispensation' => $id_dispensation));
            return $this->selectRDV->fetch();
        }
        
          public function selectDateDisp($date_dispensation) {
            $this->selectDateDisp->execute(array(':date_dispensation' => $date_dispensation));
            return $this->selectDateDisp->fetch();
        }

        public function selectDate($rdv) {
            $this->selectDate->execute(array(':rdv' => $rdv));
            return $this->selectDate->fetchAll();
        }
        
        public function selectAllDateDisp($id_patient){
            $this->selectAllDateDisp->execute(array(':id_patient' => $id_patient));
            return $this->selectAllDateDisp->fetchAll();
        }
    }

?>
