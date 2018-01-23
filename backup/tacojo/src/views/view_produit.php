<link href="css/bootstrap.css" rel="stylesheet">
<link href="/../../css/style.css" rel="stylesheet">


<?php



	function viewAjouterProduit($db) {



			if (isset($_POST['btProduit'])) {

				$refproduit = $_POST['refproduit'];
				$designproduit = $_POST['designproduit'];
				$descproduit = $_POST['descproduit'];
				$prixproduit = $_POST['prixproduit'];
				$notype = $_POST['notype'];
				$dest_fichier = '';


					$produit = new Produit($db);

					if(isset($_FILES['photo'])) {
						$extensions_ok = array('png', 'gif', 'jpg', 'jpeg');
						$taille_max = 500000;
						$dest_dossier = '/Applications/XAMPP/xamppfiles/htdocs/mrlegales/img/';
						if (!in_array(substr(strrchr($_FILES['photo']['name'], '.'), 1), $extensions_ok)) {
							echo 'Veuillez sélectionner un fichier de type png, gif ou jpg !';
						} else {
							if (file_exists($_FILES['photo']['tmp_name']) && (filesize($_FILES['photo']['tmp_name'])) > $taille_max) {
								echo 'Votre fichier doit faire moins de 500Ko !';
							} else {
								// copie du fichier
								$dest_fichier = basename($_FILES['photo']['name']); // formatage nom fichier
								// enlever les accents

								$dest_fichier = strtr($dest_fichier, 'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùú ûüýÿ', 'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
								// remplacer les caractères autres que lettres, chiffres et point par _
								$dest_fichier = preg_replace('/([^.a-z0-9]+)/i', '_', $dest_fichier);
								// copie du fichier
								move_uploaded_file($_FILES['photo']['tmp_name'], $dest_dossier . $dest_fichier);


							}
						}
					}
					$nb = $produit->insertAll($refproduit, $designproduit, $descproduit, $prixproduit, $notype, $dest_fichier
					);

					if ($nb == 1) {
						echo '<div class="alert alert-success" role="alert">Vous avez ajouter un produit !</div>';
					}
					else {
						echo '<div class="alert alert-danger" role="alert">Impossible d\'ajouter un produit !</div>';
					}
			}



		echo'
			<h3>Ajouter un produit</h3>
			<hr />
			<form class="form-inline" method="POST" action="index.php?page=produit" enctype="multipart/form-data" >

				<div class="form-group">
					<input class="form-control" type="text" name="refproduit" id="refproduit" placeholder="Reference" />


					<input class="form-control" type="text" name="designproduit" id="designproduit" placeholder="Designation" />


					<input class="form-control" type="text" name="descproduit" id="descproduit" placeholder="Description"/>


					<input class="form-control" type="text" name="prixproduit" id="prixproduit" placeholder="Prix" />



					<label for="notype">Type :</label>
					<select class="form-control" id="notype" name="notype">';
					$type = new Type($db);
					$liste = $type->selectAll();
					foreach ($liste as $unType){
						echo'<option value="'.$unType['notype'].'">'.$unType['nomtype'].'</option>';
					}
					echo'</select><br />

				<label for="photo">Photo :</label><input type="file" name="photo" id="photo"/><br />

				</div>

	
				<button type="submit" class="btn btn-default" id="btProduit" name="btProduit">Ajouter</button>

				</form>
		';



		echo '<OPTION VALUE="l"</OPTION>';



	}



function viewListeProduit($db) {



	if(isset($_POST['btSupprimer'])) {
		if(isset($_POST['cocher'])) {
			$cocher = $_POST['cocher'];
			foreach($cocher as $refproduit){
				$Produit=new Produit($db);
				$nb=$Produit->deleteOne($refproduit);
				if($nb!=1){
					echo'ERREUR de suppression';
				}
			}
			//var_dump($_POST);
		}

	}
	var_dump($_POST);
	echo '<h3>Liste produit<h3>
	<hr>';

$Produit=new Produit($db);
$type = new Type($db);
	$liste = $type->selectAll();
    $listeproduit=$Produit->selectAll();
    echo '<form method="POST" action="index.php?page=listeproduit">
            <table style="min-width : 100%" class="table">
                <tr>
                    <th>Reference</th>
                    <th>Designation</th>
                    <th>Description</th>
                    <th>Type</th>
                    <th>Prix</th>
                    <th>Photo</th>
                    <th>Supprimez</th>
                </tr>
        ';

    foreach($listeproduit as $uneListe){
		foreach ($liste as $unType) {
			if ($uneListe['idtype'] == $unType['notype']) {
				echo '

				<tr>

					<td><a href="index.php?page=modifProduit&refproduit=' . $uneListe['refproduit'] . '">' . $uneListe['refproduit'] . '</a></td>
					<td>' . $uneListe['designproduit'] . '</td>
					<td>' . $uneListe['descproduit'] . '</td>
					<td>' . $unType['nomtype'] . '</td>
					<td>' . $uneListe['prixproduit'] . '</td>
					<td><img src="img/'.$uneListe['photo'].'" alt="image produit" /></td>
        			<td><input type="checkbox" name="cocher[]" id="cocher[]" value="' . $uneListe['refproduit'] . '"/></td>
					';
			}
		}
		// Transformer une liste en formulaire :
		// 1er étape : Au dessus de la balise <table> on rajoute la balise <form en redirigeant sur cette même page
		// 2eme étape : Après la balise </table> on rajoute un bouton "submit"
		// 3eme étape : En dessous du bouton je ferme le formulaire </form>
		// 4eme étape : Je crée une nouvelle colone <th> dans mon entête
		// 5eme étape : Je crée une nouvelle colone <td> et je place à l'interieur une case à cocher (checkbox)
		// Dans le name"" et l'id"" nous mettons un nom de variable "cocher[]" sans oublié les crochés. (Tableau de case à cocher)
		// Dans cette meme checkbox nous rajoutons la propriété value et nous metton à l'intérieur la valeur de l'identifiant de la ligne
    	// Astuce : Pour vérifié que notre nouvelle liste fonctionne je regarde le code source html dans le navigateur
		// nous verrons dans la propriété value de la checkbox l'identifiant du produit sur lequel nous somme
	}
    echo '</table>
	<input class="btn btn-default" type="submit" name="btSupprimer" id="btSupprimer"/>
	</form>';

}


function viewModifProduit($db) {

	if(isset($_POST['btModifier'])) {
		$refproduit = $_POST['refproduit'];
		$designproduit = $_POST['designproduit'];
		$descproduit = $_POST['descproduit'];
		$prixproduit = $_POST['prixproduit'];
		$notype = $_POST['notype'];
		$dest_fichier = $_POST['destfichier'];
		$Produit = new Produit($db);

		if(isset($_FILES['photo'])) {

			if (!empty($_FILES['photo']['name'])) {

				$extensions_ok = array('png', 'gif', 'jpg', 'jpeg');
				$taille_max = 500000;
				$dest_dossier = '/Applications/XAMPP/xamppfiles/htdocs/mrlegales/img/';
				if (!in_array(substr(strrchr($_FILES['photo']['name'], '.'), 1), $extensions_ok)) {
					echo 'Veuillez sélectionner un fichier de type png, gif ou jpg !';
				} else {
					if (file_exists($_FILES['photo']['tmp_name']) && (filesize($_FILES['photo']['tmp_name'])) > $taille_max) {
						echo 'Votre fichier doit faire moins de 500Ko !';
					} else {
						// copie du fichier
						$dest_fichier = basename($_FILES['photo']['name']); // formatage nom fichier
						// enlever les accents

						$dest_fichier = strtr($dest_fichier, 'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùú ûüýÿ', 'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
						// remplacer les caractères autres que lettres, chiffres et point par _
						$dest_fichier = preg_replace('/([^.a-z0-9]+)/i', '_', $dest_fichier);
						// copie du fichier
						move_uploaded_file($_FILES['photo']['tmp_name'], $dest_dossier . $dest_fichier);
						$produit = new Produit($db);
						/*	$nb = $produit->insertAll($refproduit, $designproduit, $descproduit, $prixproduit, $notype, $dest_fichier); if ($nb!=1){
								echo ' Erreur d\'insertion'; }
							else{
								echo 'Insertion réussie';
							} */

					}
				}

			}

		}
		$nb = $Produit->updateAll($refproduit, $designproduit, $descproduit, $prixproduit, $notype, $dest_fichier);
		if ($nb == 1) {
			echo '<div class="alert alert-success" role="alert">Modification effectuer !</div>';
		} else {
			echo '<div class="alert alert-danger" role="alert">Erreur de modification !</div>';
		}
	}

	if(isset($_GET['refproduit'])){
		$refproduit=$_GET['refproduit'];
		$Produit=new Produit($db);




		$uneListe=$Produit->selectOne($refproduit); //selectOne renvoie la valeur false si il n'a pas trouver de produit
		if($uneListe!=false){


			echo'<h1>Modification</h1><br/>
			<form class="form-inline" method="POST" action="index.php?page=modifProduit" enctype="multipart/form-data">

			<th>Designation</th>
			<input type="hidden" value="'.$refproduit.'" name="refproduit" id="refproduit"/>
			<input type="hidden" value="'.$uneListe['photo'].'" name="destfichier" id="destfichier"/>
			<input class="form-control" type="text" name="designproduit" id="designproduit" value="'.$uneListe['designproduit'].'"/>Description
			<input class="form-control" type="text" name="descproduit" id="descproduit" value="'.$uneListe['descproduit'].'"/>Prix
			<input class="form-control" type="text" name="prixproduit" id="prixproduit" value="'.$uneListe['prixproduit'].'"/>



			<label for="notype">Type </label>

					<select class="form-control" id="notype" name="notype">';
					$type = new Type($db);
					$liste = $type->selectAll();
					foreach ($liste as $unType){
						echo'<option value="'.$unType['notype'].'">'.$unType['nomtype'].'</option>';
					}
					echo'</select><br />';

					if($uneListe['idtype']==$unType['notype']){
						echo '<option value="'.$unType['notype'].'" selected>'.$unType['nomtype'].'</option>';
					}

					else{
						echo '<option value="'.$unType['notype'].'">'.$unType['nomtype'].'</option>';
					}

					echo'Photo <img src="img/'.$uneListe['photo'].'" alt="image produit" /><br /><br />

					<label for="photo">Photo :</label><input type="file" name="photo" id="photo"/><br />';


					echo'<input class="btn btn-default" type="submit" name="btModifier" id="btModifier"/>
					</form>';

		}
					else{
						echo'Mauvaise référence';
					}


	}

}


?>
