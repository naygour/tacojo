<?php 
    class protocole {

        private $selectAll;
        private $insertAll;
        private $selectOne;
        private $deleteOne;
        private $updateAll;
        private $selectProtoNa;
        private $selectProtoAt;
        
      

        public function __construct($db) {

            $this->insertAll = $db->prepare("INSERT INTO protocole(nom_proto, adulte, enfant, remarque) values(:nom_proto, :adulte, :enfant, :remarque)");

            $this->selectAll=$db->prepare("select * from protocole ");

            $this->selectOne=$db->prepare("select * from protocole where id_proto=:id_proto");

            $this->deleteOne=$db->prepare("delete from protocole where id_proto=:id_proto");

            $this->selectProtoNa=$db->prepare("select * from protocole where type_protocole='National'");

            $this->selectProtoAt=$db->prepare("select * from protocole where type_protocole='Atypique'");


        }

        public function insertAll($nom_proto, $adulte, $enfant, $remarque){

            
            $this->insertAll->execute(array(

                    ':nom_proto' => $nom_proto,
                    ':adulte' => $adulte,
                    ':enfant' => $enfant,
                    ':remarque' => $remarque
            
                ));

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