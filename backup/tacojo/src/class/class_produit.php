<?php 
    class Produit {

        private $insertAll;
        private $selectOne;
        private $deleteOne;
        private $updateAll;

        public function __construct($db) {

            $this->insertAll = $db->prepare("INSERT INTO produit(refproduit, designproduit, descproduit, prixproduit, idtype, photo) values(:refproduit, :designproduit, :descproduit, :prixproduit, :idtype, :photo)");
            $this->selectAll=$db->prepare("select refproduit, designproduit, descproduit, prixproduit, idtype, photo from produit");
            $this->selectOne=$db->prepare("select refproduit, designproduit, descproduit, prixproduit, idtype, photo from produit where refproduit=:refproduit");
            $this->deleteOne=$db->prepare("delete from produit where refproduit=:refproduit");
            $this->updateAll=$db->prepare("update produit SET designproduit=:designproduit, descproduit=:descproduit, prixproduit=:prixproduit, idtype=:idtype, photo=:photo WHERE refproduit=:refproduit");

        }

        public function insertAll($refproduit, $designproduit, $descproduit, $prixproduit, $idtype, $photo) {

            
            $this->insertAll->execute(array(

                    ':refproduit' => $refproduit,
                    ':designproduit' => $designproduit,
                    ':descproduit' => $descproduit,
                    ':prixproduit' => $prixproduit,
                    ':idtype' => $idtype,
                    ':photo' => $photo

                ));

            return $this->insertAll->rowCount();

        }

        public function selectAll() {

        $this->selectAll->execute();
        return $this->selectAll->fetchAll();

    }

        public function selectOne($refproduit) {

            $this->selectOne->execute(array(':refproduit' => $refproduit));
            return $this->selectOne->fetch();

        }

        public function deleteOne($refproduit){
            $this->deleteOne->execute(array(':refproduit' => $refproduit));
            return $this->deleteOne->rowCount();
        }

        public function updateAll($refproduit, $designproduit, $descproduit, $prixproduit, $idtype, $photo){
            $this->updateAll->execute(array(

                    ':refproduit' => $refproduit,
                    ':designproduit' => $designproduit,
                    ':descproduit' => $descproduit,
                    ':prixproduit' => $prixproduit,
                    ':idtype' => $idtype,
                    ':photo' => $photo

            ));
            return $this->updateAll->rowCount();
        }
        
    }
    

?>
