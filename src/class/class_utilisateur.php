<?php

    class utilisateur {

        private $insertAll;
        private $selectConnexion;
        private $selectAll;
        private $selectOne;
        private $updateAll;
        private $deleteOne;

        public function __construct($db) {

            $this->insertAll = $db->prepare("INSERT INTO UTILISATEUR(nom_utilisateur, prenom_utilisateur, login, mdp, grade, centre)
                                            values(:nom_utilisateur, :prenom_utilisateur, :login, :mdp, :grade, :centre)");

            $this->selectConnexion=$db->prepare("SELECT * FROM UTILISATEUR WHERE login=:login AND mdp=:mdp");

            $this->selectAll=$db->prepare("select * from UTILISATEUR ");

            $this->selectOne=$db->prepare("select * from UTILISATEUR where id_utilisateur=:id_utilisateur");


            $this->updateAll=$db->prepare("update UTILISATEUR SET nom_utilisateur=:nom_utilisateur,prenom_utilisateur=:prenom_utilisateur,
                                          login=:login, mdp=:mdp, grade=:grade WHERE id_utilisateur=:id_utilisateur");

            $this->deleteOne=$db->prepare("delete from UTILISATEUR where id_utilisateur=:id_utilisateur");


        }

        public function insertAll($nom_utilisateur, $prenom_utilisateur, $login, $mdp, $grade, $centre) {
            $mdp = sha1(md5($mdp));
            $this->insertAll->execute(array(':nom_utilisateur' => $nom_utilisateur,':prenom_utilisateur' => $prenom_utilisateur,
                            ':login' => $login,':mdp' => $mdp,':grade' => $grade,':centre' => $centre));
            return $this->insertAll->rowCount();
        }

        public function selectConnexion($login,$mdp) {
            $mdp = sha1(md5($mdp));
            $this->selectConnexion->execute(array(':login' => $login,':mdp' => $mdp));
            return $this->selectConnexion->fetch();
        }
            
        public function selectAll() {
            $this->selectAll->execute();
            return $this->selectAll->fetchAll();
        }

        public function selectOne($id_utilisateur) {
            $this->selectOne->execute(array(':id_utilisateur' => $id_utilisateur));
            return $this->selectOne->fetch();
        }

        public function updateAll( $id_utilisateur,$nom_utilisateur, $prenom_utilisateur, $login, $mdp, $grade){
            $mdp = sha1(md5($mdp));
            $this->updateAll->execute(array(':id_utilisateur' => $id_utilisateur,':nom_utilisateur' => $nom_utilisateur,':prenom_utilisateur' => $prenom_utilisateur,
                                            ':login' => $login,':mdp' => $mdp,':grade' => $grade));
            return $this->updateAll->rowCount();
        }

        public function deleteOne($id_utilisateur){
            $this->deleteOne->execute(array(':id_utilisateur' => $id_utilisateur));
            return $this->deleteOne->rowCount();
        }
    }

?>
