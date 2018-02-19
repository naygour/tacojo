<?php

    class co_infection
    {
        private $selectAll;
        
        public function __construct($db) 
        {
            $this ->selectAll = $db->prepare("select * From TYPE_CO_INFECTION");
            $this->insertAll = $db->prepare("INSERT INTO co_infection( id_type_co_infection, id_patient) values( :id_coinf, :id_patient)");
        }
        
        public function selectAll()
        {
            $this->selectAll->execute();
            return $this->selectAll->fetchAll();
        }
        
        public function insertAll($id_coinf, $id_patient){
            $this->insertAll->execute(array(':id_coinf' => $id_coinf,':id_patient' => $id_patient));
            return $this->insertAll->rowCount();
        }
    }