<?php

	function viewListeProtocole($db){

		if (isset($_POST['btProtocole'])) {

					$nom_proto = $_POST['nom_proto'];
					$adulte = $_POST['adulte'];
					$enfant = $_POST['enfant'];
					$remarque = $_POST['remarque'];
					

						$protocole = new protocole($db);

						$nb = $protocole->insertAll($nom_proto, $adulte, $enfant, $remarque);

						if ($nb == 1) {
							echo '<div class="alert alert-success" role="alert">Vous avez ajouté un Protocole !</div>';
						}
						else {
							echo '<div class="alert alert-danger" role="alert">Impossible d\'ajouter un Protocole !</div>';
						}
			}

						echo'
						<div id="content-wrapper">
					      <div class="mui--appbar-height"></div>
					      <div class="mui-container-fluid">
						<h3>Les Protocoles</h3>
						<hr />
						<form class="form-inline" method="POST" action="index.php?page=protocole" enctype="multipart/form-data" >

						<div class="form-group">
							<input class="form-control" type="text" name="nom_proto" id="nom_proto" placeholder="Nom du Protocole" />


						<input class="form-control" type="text" name="adulte" id="adulte" placeholder="Adulte" />


						<input class="form-control" type="text" name="enfant" id="enfant" placeholder="Enfant"/>


						<input class="form-control" type="text" name="remarque" id="remarque" placeholder="Remarque" />


						<button type="submit" class="btn btn-default" id="btProtocole" name="btProtocole">Ajouter</button>
						<br />
						</div>
						</form>';

		echo '<br><br>';

		$Protocole_nationaux = new protocole($db);

		$liste_national = $Protocole_nationaux->selectProtoNA();
		$nb = count($liste_national); 

		if($nb>0){
		  echo '<form method="POST" action="index.php?page=protocole">
			<div class="horizontal">
		  		<table style="min-width : 100%" class="table table-stripped table-bordered">';

		  echo '<hr />

		  		<h3>Les protocoles nationaux</h3>
				<hr />
		  		<tr>
		  		<td>Id Protocole</td>
		  		<td>Protocole</td>
		  		<td>Adulte</td>
		  		<td>Enfant</td>
		  		<td>Remarque</td>
		 		</tr>
		 		<br><br>';

		  
		  for($i=0;$i<$nb;$i++){
		  		   		$unProtocoleN = $liste_national[$i];
		  		       	echo '<tr><td><a href="index.php?page=ficheProtocole&identifiant='. $unProtocoleN['id_proto'].'">'. $unProtocoleN['id_proto'].'</a></td>

		  		       	<td>'.$unProtocoleN['nom_proto'].'</td>
		  		       	<td>'. $unProtocoleN['adulte'].'</td>
		  		       	<td>'. $unProtocoleN['enfant'].'</td>
		  		       	<td>'. $unProtocoleN['remarque'].'</td>';
		  		}
		  echo '</table></div><br>';

		}

		$Protocole_atypiques = new protocole($db);

		$liste = $Protocole_atypiques->selectProtoAt();
		$nb = count($liste); 

		if($nb>0){
		  echo '<form method="POST" action="index.php?page=protocole">
		  		<table class="table table-stripped table-bordered">';

		  echo '<hr />
		  		<h3>Les protocoles atypiques</h3>
				<hr />
				<br><br>
		  		<tr>
		  		<td>Id Protocole</td>
		  		<td>Protocole</td>
		  		<td>Adulte</td>
		  		<td>Enfant</td>
		  		<td>Remarque</td>
		 		</tr>';

		  
		  for($i=0;$i<$nb;$i++){
		  		   		$unProtocole = $liste[$i];
		  		       	echo '<tr><td><a href="index.php?page=ficheProtocole&identifiant='. $unProtocole['id_proto'].'">'. $unProtocole['id_proto'].'</a></td>

		  		       	<td>'.$unProtocole['nom_proto'].'</td>
		  		       	<td>'. $unProtocole['adulte'].'</td>
		  		       	<td>'. $unProtocole['enfant'].'</td>
		  		       	<td>'. $unProtocole['remarque'].'</td>';
		  		}
		  echo '</table><br>
		  </div></div>';

		}		
	}

?>