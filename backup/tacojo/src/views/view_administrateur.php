<?php

	function viewAjoutAdministrateur($db) {



			if (isset($_POST['btInscrire'])) {

				$email = $_POST['email'];
				$mdp = $_POST['mdp'];
				$nom = $_POST['nom'];
				$prenom = $_POST['prenom'];

				
				
				
					$admin = new Administrateur($db);
					$nb = $admin->insertAll($email, $mdp, $nom, $prenom);

					if ($nb == 1) {
						echo '
						<div class="alert alert-success" role="alert">Création du compte administrateur réussi !</div>';
					}else {
						echo '<div class="alert alert-danger" role="alert">Impossible d\'ajouter un administrateur !</div>';
					}
				}




echo'
			<h3>Ajouter un administrateur</h3>
			<hr />
			<form class="form-inline" method="POST" action="index.php?page=administrateur" >

				<div class="form-group">
					<input class="form-control" type="text" name="email" id="email" placeholder="exemple@domaine.fr" />
				</div>

				<div class="form-group">
					<input class="form-control" type="password" name="mdp" id="mdp" placeholder="Votre mot de passe" />
				</div>

				<div class="form-group">
					<input class="form-control" type="text" name="nom" id="nom" placeholder="Votre nom"/>
				</div>

				<div class="form-group">
					<input class="form-control" type="text" name="prenom" id="prenom" placeholder="Votre prenom" />
				</div>

	
				<button type="submit" class="btn btn-default" id="btInscrire" name="btInscrire">Ajouter</button>
		';
		


}


?>
