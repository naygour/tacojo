<?php
	
    class droit {

        private $selectAll;

        public function __CONSTRUCT($db) {
            $this->selectAll = $db->prepare("SELECT * FROM DROIT");
        }

        public function selectAll() {
            $this->selectAll->execute();
            return $this->selectAll->fetchAll();
        }
    }
	
?>