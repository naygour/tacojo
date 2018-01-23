<?php

 class grade {

        private $insertAll;
        private $selectAll;
        private $selectOne;
        private $updateAll;


        public function __construct($db) {

            $this->insertAll = $db->prepare("INSERT INTO GRADE( nom_grade, id_role) values( :nom_grade, :id_role)");

            $this->selectAll=$db->prepare("select * from GRADE ");

            $this->selectOne=$db->prepare("select * from GRADE where id_grade=:id_grade");

            $this->updateAll=$db->prepare("update GRADE SET nom_grade=:nom_grade,id_role=:id_role WHERE id_grade=:id_grade");

            $this->deleteOne=$db->prepare("delete from GRADE where id_grade=:id_grade");


        }

        public function insertAll($nom_grade, $id_role){
            $this->insertAll->execute(array(':nom_grade' => $nom_grade,':id_role' => $id_role));
            return $this->insertAll->rowCount();
        }

        public function selectAll() {
            $this->selectAll->execute();
            return $this->selectAll->fetchAll();
        }

        public function selectOne($id_grade) {
            $this->selectOne->execute(array(':id_grade' => $id_grade));
            return $this->selectOne->fetch();
        }


        public function updateAll($nom_grade, $id_role){
            $this->updateAll->execute(array(':nom_grade' => $nom_grade,':id_role' => $id_role));
            return $this->updateAll->rowCount();
        }

        public function deleteOne($id_grade){
            $this->deleteOne->execute(array(':id_grade' => $id_grade));
            return $this->deleteOne->rowCount();
        }
    }