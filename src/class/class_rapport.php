<?php

    class rapport
    {
        private $selectAll;
        private $selectAllExceptId;
        private $selectInscritAvant ;
        private $selectMois ; 
        public function __construct($db) 
        {
            $this->selectAll=$db->prepare("SELECT * FROM RAPPORT");
            $this->selectAllExceptId=$db->prepare("SELECT Age, Sexe, Nb_patient_suivit, Nb_patient_nouveau, Nb_patient_decede,
                                                  Nb_patient_PDV, Nb_patient_PDV_revenu, Nb_patient_transfere_TE, Nb_patient_transfere_TA, 
                                                  Nb_patient_suivit_regulierement FROM RAPPORT ORDER BY Age");
            $this->selectInscritAvant=$db->prepare("SELECT month(dateInscription) as mois , year(dateInscription) as year ,sexe,DATEDIFF(current_date,date_de_naissance) as AgeEnJour FROM patient where dateInscription < :dateInscription");
            $this->selectMois=$db->prepare("SELECT MONTH(:date)as mois");
            $this->selectAnnee=$db->prepare("SELECT YEAR(:date)as annee");
            $this->selectEtatDisp=$db->prepare("select * from dispensation where month(date_dispensation)=:mois and year(date_dispensation)=:year and id_patient=:id_patient");
            $this->selectAge=$db->prepare("SELECT sexe,DATEDIFF(current_date,date_de_naissance) as AgeEnJour FROM patient where dateInscription < :dateInscription");
            
        }

        public function selectAll() 
        {
            $this->selectAll->execute();
            return $this->selectAll->fetchAll();
        }
        
        public function selectAllExceptId()
        {
            $this->selectAllExceptId->execute();
            return $this->selectAllExceptId->fetchAll();
        }
        
        public function selectInscritAvant( $dateInscrption)
        {
            $this->selectInscritAvant->execute(array(':dateInscription' => $dateInscrption));
            return $this->selectInscritAvant->fetchAll();
        }
        
        public function selectMois($date)
        {
            $this->selectMois->execute(array(':date' => $date));
            return $this->selectMois->fetch();
        }
        
        public function selectAnnee($date)
        {
            $this->selectAnnee->execute(array(':date' => $date));
            return $this->selectAnnee->fetch();
        }
        
        public function selectEtatDisp($mois, $year , $id_patient)
        {
            $this->selectEtatDisp->execute(array(':mois' => $mois,':year' => $year,':id_patient' => $id_patient));
            return $this->selectEtatDisp->fetch();
        }
    }

?>
