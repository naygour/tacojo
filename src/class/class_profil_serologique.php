<?php

    class profil_serologique {

        private $selectAll;

        public function __CONSTRUCT($db) {
            $this->selectAll = $db->prepare("SELECT id_profil,nom_profil FROM PROFIL_SEROLOGIQUE");
        }

        public function selectAll() {
            $this->selectAll->execute();
            return $this->selectAll->fetchAll();
        }
    }

?>