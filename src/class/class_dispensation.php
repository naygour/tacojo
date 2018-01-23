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
        private $selectAllDateDisp;
        
        public function __construct($db) 
        {
            $this->selectDerniereDispen = $db->prepare("SELECT MAX(`date_dispensation`) AS 'derniereDisp' FROM `DISPENSATION` WHERE `num_inclusion`=:num_inclusion");
            
            $this->insertAll = $db->prepare("INSERT INTO DISPENSATION(num_inclusion, etat_dispensation, date_dispensation,
                                            date_debut_traitement, nb_jours_traitement, date_fin_traitement, rdv,poids, observations) 
                                            values(:num_inclusion, :etat_dispensation, :date_dispensation, :date_debut_traitement, 
                                            :nb_jours_traitement, :date_fin_traitement, :rdv, :poids, :observations)");

            $this->selectAll=$db->prepare("select * from DISPENSATION ");

            $this->updateAll=$db->prepare("update DISPENSATION SET  num_inclusion=:num_inclusion , etat_dispensation=:etat_dispensation,
                                           date_dispensation=:date_dispensation, date_debut_traitement=:date_debut_traitement , 
                                           nb_jours_traitement=:nb_jours_traitement, date_fin_traitement=:date_fin_traitement , rdv=:rdv 
                                           , poids =:poids ,  observations=:observations WHERE id_dispensation=:id_dispensation");

            $this->selectId=$db->prepare("select * from DISPENSATION where id_dispensation=:id_dispensation");

            $this->selectOneYearMonth=$db->prepare("select * from DISPENSATION where num_inclusion=:num_inclusion and
                                                    MONTH(date_dispensation)=:mois AND YEAR(date_dispensation)=:annee");

            $this->selectDateInclusion = $db->prepare("SELECT MIN(date_dispensation) from DISPENSATION where num_inclusion=:num_inclusion");
            
            $this->selectEtat = $db->prepare("SELECT * FROM DISPENSATION INNER JOIN ETAT_DISPENSATION ON DISPENSATION.etat_dispensation=ETAT_DISPENSATION.id_etat_dispen WHERE num_inclusion=:num_inclusion AND
                                              date_dispensation = (select MAX(date_dispensation) FROM DISPENSATION 
                                              WHERE num_inclusion=:num_inclusion)");
            
            $this->selectRDV=$db->prepare("select rdv from DISPENSATION where id_dispensation=:id_dispensation ");
             
            $this->selectDate=$db->prepare("select rdv from DISPENSATION where rdv=:rdv ");
            
            $this->selectAllDateDisp=$db->prepare("select date_dispensation from DISPENSATION where num_inclusion=:num_inclusion");
            
        }
        public function selectDerniereDispen($num_inclusion) {
            $this->selectDerniereDispen->execute(array(':num_inclusion' => $num_inclusion));
            return $this->selectDerniereDispen->fetch();
        }
        
        

        public function insertAll($num_inclusion, $etat_dispensation, $date_dispensation,
                $date_debut_traitement, $nb_jours_traitement, $date_fin_traitement, $rdv,$poids, $observations){

            $this->insertAll->execute(array(
                    ':num_inclusion' => $num_inclusion,':etat_dispensation' => $etat_dispensation,
                    ':date_dispensation' => $date_dispensation,':date_debut_traitement' => $date_debut_traitement,
                    ':nb_jours_traitement' => $nb_jours_traitement,':date_fin_traitement' => $date_fin_traitement,
                    ':rdv' => $rdv,':poids' => $poids,':observations' => $observations));
            return $this->insertAll->rowCount();
        }

        public function updateAll($id_dispensation , $num_inclusion ,$etat_dispensation, $date_dispensation,
                $date_debut_traitement, $nb_jours_traitement, $date_fin_traitement, $rdv,$poids, $observations){
            
            $this->updateAll->execute(array(':id_dispensation' => $id_dispensation,':num_inclusion' => $num_inclusion,
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

        public function selectId($id_dispensation) {
            $this->selectId->execute(array(':id_dispensation' => $id_dispensation));
            return $this->selectId->fetch();
        }

        public function selectOneYearMonth($num_inclusion, $mois, $annee) {   
            $this->selectOneYearMonth->execute(array(':num_inclusion' => $num_inclusion,':mois' => $mois,':annee' => $annee));
            return $this->selectOneYearMonth->fetch();
        }
        
        public function selectDateInclusion($num_inclusion) {
            $this->selectDateInclusion->execute(array(':num_inclusion' => $num_inclusion));
            return $this->selectDateInclusion->fetch();
        }
        
        public function selectEtat($num_inclusion) {
            $this->selectEtat->execute(array(':num_inclusion' => $num_inclusion));
            return $this->selectEtat->fetch();
        }
        
        public function selectRDV($id_dispensation) {
            $this->selectRDV->execute(array(':id_dispensation' => $id_dispensation));
            return $this->selectRDV->fetch();
        }

        public function selectDate($rdv) {
            $this->selectDate->execute(array(':rdv' => $rdv));
            return $this->selectDate->fetchAll();
        }
        
        public function selectAllDateDisp($num_inclusion){
            $this->selectAllDateDisp->execute(array(':num_inclusion' => $num_inclusion));
            return $this->selectAllDateDisp->fetchAll();
        }
    }

?>
