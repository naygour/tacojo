<?php
	
	class Type {
	
		private $insertAll;
		private $selectAll;
		private $selectOne;
	
		# $db est la variable de la connexion php
		public function __CONSTRUCT($db) {
		
			$this->insertAll = $db->prepare("INSERT INTO type(nomtype) VALUES(:nomtype)");
			$this->selectAll = $db->prepare("SELECT notype,nomtype FROM type");
			$this->selectOne=$db->prepare("select nomtype from type where nomtype=:nomtype");

			
		}
		
		public function insertAll($nomtype) {
				
			$this->insertAll->execute(array(':nomtype'=>$nomtype));
			return $this->insertAll->rowCount();
			
		}
		
		
		public function selectAll() {
				
			$this->selectAll->execute();
			return $this->selectAll->fetchAll();
			
		}

		public function selectOne($nomtype) {

            $this->selectOne->execute(array(':nomtype' => $nomtype));
            return $this->selectOne->fetch();

        }
		
	}
	
?>
