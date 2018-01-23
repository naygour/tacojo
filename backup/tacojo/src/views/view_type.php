<?php

	function viewtype($db){
		echo'Page View_Type';	
	}
	
	function viewAjoutType($db){
		
		echo '
<div id="content-wrapper">
      <div class="mui--appbar-height"></div>
      <div class="mui-container-fluid">
<h3>Ajouter un type <br></h3>
		<hr />';



			if (isset($_POST['btAjouter'])) {

				$nomType = $_POST['nomType'];

				$parametres['nomType'] = array("type" => "integer", "null" => "no", "label" => "un type");
				$resultat = Verif($parametres);
				if ($resultat['code'] == 0) {
					$type = new Type($db);
					$existe = $type->selectOne($nomType);
					var_dump($nomType);
					if($existe!=NULL){



					$nb = $type->insertAll($nomType);

					if ($nb == 1) {
						echo '<div class="alert alert-success" role="alert">Ajout du type effectué !';
					}else {
						echo '<div class="alert alert-danger" role="alert">Une erreur est survenue lors de l\'ajout du type !</div>';
					}
					}
				}else{
					echo $resultat['message'];
				}
			}
			/*	if ($nb == 1) {
					echo '<div class="alert alert-success" role="alert">Ajout du type effectué !</div>';	
				}else {
					echo '<div class="alert alert-danger" role="alert">Une erreur est survenue lors de l\'ajout du type !</div>';
				}*/



		
		echo '

			<div class="col-md-12">

				<form method="POST" action="index.php?page=ajoutType">
					<div class="col-md-12 col-sm-12">
						<div class="form-group">
							<input class="form-control" type="text" name="nomType" id="nomType" placeholder="Entrer le nom du type"/>
						</div>
						
						<button type="submit" class="btn btn-default" id="btAjouter" name="btAjouter" values="Ajouter" >Ajouter</button>
					</div>
				</form>
			</div>
		';			
	}
	
	function viewListeTypes($db){
		
		echo '
<div id="content-wrapper">
      <div class="mui--appbar-height"></div>
      <div class="mui-container-fluid"><h3>Liste des Types <br /></h3>
		<hr />';
		
		$type = new Type($db);
		$listeType = $type->selectAll();
		
		echo '
			<table style="min-width : 100%" class="table">
				<tr>
					<th>Numéro</th>
					<th>Nom du type</th>
				</tr>


		';
		
		foreach ($listeType as $unType) {

			echo '
				<tr>
					<td>'.$unType['notype'].'</td>
					<td>'.$unType['nomtype'].'</td>
				</tr>

			';
		}

		echo '</table>
</div>
</div>';
		
	}



?>
