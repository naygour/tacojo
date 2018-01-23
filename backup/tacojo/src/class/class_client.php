<?php

class Client{


    private $insertAll;//la variable
    private $deleteOne;
    private $selectAll;//la variable
    public function __construct($db){ //$db c'est la variable qui gere la connexion à mysql
        $this->insertAll=$db->prepare("insert into client (login, mdp, nom, prenom)values(:login, :mdp, :nom, :prenom)");
        $this->selectAll=$db->prepare("select login, nom, prenom from client");
        $this->deleteOne=$db->prepare("delete from client where login=(:login)");
    }
    //fonction
    public function insertAll($login, $mdp, $nom, $prenom){ // méthode qui s'adresse à la variable "php"
        $this->insertAll->execute(array(':login'=>$login,':mdp'=>$mdp,':nom'=>$nom,':prenom'=>$prenom));
        return $this->insertAll->rowcount();
    }


    public function selectAll(){ // on s'adresse à la variable "php"
        $this->selectAll->execute();
        return $this->selectAll->fetchAll();
    }

    public function deleteOne($login){
        $this->deleteOne->execute(array(':login'=>$login));
        return $this->deleteOne->RowCount();
    }


}

?>