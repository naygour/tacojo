<?php

    class Suivi
    {

        private $insertAll;
        private $selectAll;
        private $updateAll;


        public function __construct($db)
        {
            $this->insertAll = $db->prepare("INSERT INTO SUIVI_PRESENCE(id_patient, annee, mois) values( :id_patient, :annee, :mois)");

            $this->selectAll = $db->prepare("select * from SUIVI_PRESENCE ");

            /*$this->updateAll=$db->prepare("update suivi_presence SET annee, mois WHERE id=:id");*/

            $this->selectSuiviModifie=$db->prepare("SELECT * FROM `SUIVI_PRESENCE` WHERE id_patient=:id_patient GROUP BY `annee`,`mois`");
        }

        public function insertAll($id_patient, $annee, $mois)
        {
            $this->insertAll->execute(array(':id_patient' => $id_patient,':annee' => $annee,':mois' => $mois,));
            return $this->insertAll->rowCount();
        }

        public function selectAll() {
            $this->selectAll->execute();
            return $this->selectAll->fetchAll();
        }

        /*public function updateAll($id, $annee, $mois){
            $this->updateAll->execute(array(':id' => $id,':annee' => $annee,':mois' => $mois));
            return $this->updateAll->rowCount();
        }*/

        public function getSuiviModifie($id_patient) {
            $this->selectSuiviModifie->execute(array(':id_patient' => $id_patient));
            return $this->selectSuiviModifie->fetchAll();
        }

    }

?>
