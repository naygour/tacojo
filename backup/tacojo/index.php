<?php
	
	session_start();



	require_once'src/config.php';
	require_once'src/bd/connexion.php';
	require_once'src/class/class_type.php';
	require_once'src/class/class_administrateur.php';
	require_once'src/class/class_client.php';
	require_once'src/class/class_protocole.php';
	require_once'src/presentation.php';
	require_once'src/listepage.php';
	require_once'src/views/view_Accueil.php';
	require_once'src/views/view_type.php';
	require_once'src/views/view_utilisateur.php';
	require_once'src/views/view_administrateur.php';
	require_once'src/views/view_client.php';
	require_once'src/views/view_produit.php';
	require_once'src/views/view_protocole.php';
	require_once'src/class/class_produit.php';
	require_once'src/views/view_outils.php';



	entete();
	$db = connect($config);

	if (isset($_POST['btConnexion'])) {
		$email = $_POST['email'];
		$mdp = $_POST['mdp'];
		$administrateur = new Administrateur($db);
		$unUtilisateur = $administrateur->selectOne($email, $mdp);

		if ($unUtilisateur != false) {

			$_SESSION['login'] = $unUtilisateur['email'];
			$_SESSION['prenom'] = $unUtilisateur['prenom'];
			$_SESSION['role'] = 1;

		}
	}





if ($db == NULL) {
		echo '<div class="col-md-12"><div class="alert alert-danger">Site en maintenance !</div></div>';
	}else {



	//echo '<div class="row">';
	//echo '<div class="col-lg-3 col-md-3">';
	menu();
	//echo'</div>';

	//echo '<div class="col-lg-9 col-md-9">';

	if(isset($_SESSION['login'])){
		echo ' <a href="index.php? action=deco">Se deconnecter</a><br />';
	}

	$contenu=getPage();
	$contenu($db);
	echo '</div>';
	echo '</div>';
	}

	bas();



?>
