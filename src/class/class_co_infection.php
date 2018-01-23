<?php

    class co_infection
    {
        private $selectAll;
        
        public function __construct($db) 
        {
            $this ->selectAll = $db->prepare("select * From CO_INFECTION");
        }
        
        public function selectAll()
        {
            $this->selectAll->execute();
            return $this->selectAll->fetchAll();
        }
    }