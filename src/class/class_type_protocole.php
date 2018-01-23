<?php
	
    class Type_protocole {

        private $selectAll;

        public function __CONSTRUCT($db) {

            $this->selectAll = $db->prepare("SELECT id_type_protocole,type_protocole FROM TYPE_PROTOCOLE");

        }

        public function selectAll() {
            $this->selectAll->execute();
            return $this->selectAll->fetchAll();
        }
    }
	
?>
