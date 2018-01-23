<?php 
	class Administrateur {

		private $insertAll;
		private $selectOne;

		public function __construct($db) {

			$this->insertAll = $db->prepare("INSERT INTO administrateur(email, mdp, nom, prenom) values(:email, :mdp, :nom, :prenom)");
			$this->selectOne = $db->prepare("SELECT * FROM administrateur WHERE email=:email AND mdp=:mdp ");

		}

		public function insertAll($email, $mdp, $nom, $prenom) {

			$mdp = sha1(md5($mdp));
			$this->insertAll->execute(array(

					':email' => $email,
					':mdp' => $mdp,
					':nom' => $nom,
					':prenom' => $prenom

				));

			return $this->insertAll->rowCount();

		}

		public function selectOne($email, $mdp) {

			$mdp = sha1(md5($mdp));
			$this->selectOne->execute(array(

					':email' => $email,
					':mdp' => $mdp

				));

			return $this->selectOne->fetch();

		}
	}
	
?>
