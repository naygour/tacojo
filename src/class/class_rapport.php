<?php

    class rapport
    {
        private $selectAll;
        private $selectAllExceptId;

        public function __construct($db) 
        {
            $this->selectAll=$db->prepare("SELECT * FROM RAPPORT");
            $this->selectAllExceptId=$db->prepare("SELECT Age, Sexe, Nb_patient_suivit, Nb_patient_nouveau, Nb_patient_decede,
                                                  Nb_patient_PDV, Nb_patient_PDV_revenu, Nb_patient_transfere_TE, Nb_patient_transfere_TA, 
                                                  Nb_patient_suivit_regulierement FROM RAPPORT ORDER BY Age");
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
    }

?>
