<?php 

    class Protocole {

        private $selectAll;
        private $insertAll;
        private $selectOne;
        private $deleteOne;
        private $updateAll;
        private $selectProtoNa;
        private $selectProtoAt;
        
        public function __construct($db) {

            $this->insertAll = $db->prepare("INSERT INTO PROTOCOLE(nom_proto, type_protocole, adulte, enfant, remarque) values(:nom_proto, :type_protocole, :adulte, :enfant, :remarque)");

            $this->selectAll=$db->prepare("select * from PROTOCOLE");

            $this->selectOne=$db->prepare("select * from PROTOCOLE where id_proto=:id_proto");

            $this->deleteOne=$db->prepare("delete from PROTOCOLE where id_proto=:id_proto");

            $this->selectProtoNa=$db->prepare("select * from PROTOCOLE where type_protocole=1");

            $this->selectProtoAt=$db->prepare("select * from PROTOCOLE where type_protocole=2");

            $this->updateAll=$db->prepare("update PROTOCOLE SET nom_proto=:nom_proto, type_protocole=:type_protocole, adulte=:adulte, enfant=:enfant, remarque=:remarque WHERE id_proto=:id_proto");
        }

        public function insertAll($nom_proto, $idtype, $adulte, $enfant, $remarque){
            $this->insertAll->execute(array(':nom_proto' => $nom_proto,':type_protocole' => $idtype,':adulte' => $adulte,':enfant' => $enfant,':remarque' => $remarque));
            return $this->insertAll->rowCount();
        }

        public function selectAll() {
            $this->selectAll->execute();
            return $this->selectAll->fetchAll();
        }

        public function selectOne($id_proto) {
            $this->selectOne->execute(array(':id_proto' => $id_proto));
            return $this->selectOne->fetch();
        }

        public function deleteOne($id_proto){
            $this->deleteOne->execute(array(':id_proto' => $id_proto));
            return $this->deleteOne->rowCount();
        }

        public function updateAll($id_proto,$nom_proto, $type_protocole, $adulte, $enfant, $remarque){
            $this->updateAll->execute(array(':id_proto' => $id_proto,':nom_proto' => $nom_proto,':type_protocole' => $type_protocole,
                                            ':adulte' => $adulte,':enfant' => $enfant,':remarque' => $remarque));
            return $this->updateAll->rowCount();
        }

        public function selectProtoNa(){
            $this->selectProtoNa->execute();
            return $this->selectProtoNa->fetchAll();
        }

        public function selectProtoAt(){
            $this->selectProtoAt->execute();
            return $this->selectProtoAt->fetchAll();
        }
    }

?>