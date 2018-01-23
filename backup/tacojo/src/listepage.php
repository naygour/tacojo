<?php
function getPage(){

	$LesPages['accueil']="viewAccueil;0";
	$LesPages['type']="viewType;0";
	$LesPages['ajoutType']="viewAjoutType;1";
	$LesPages['listeType']="viewListeTypes;0";
	$LesPages['client']="viewListeClients;0";
	$LesPages['protocole']="viewListeProtocole;0";
	$LesPages['ajoutClient']="viewAjoutClient;1";
	$LesPages['utilisateur']="viewInscrireUtilisateur;1";
	$LesPages['administrateur']="viewAjoutAdministrateur;1";
	$LesPages['produit']="viewAjouterProduit;1";
	$LesPages['listeproduit']="viewListeProduit;0";
	$LesPages['modifProduit']="viewModifProduit;0";
		
	if(isset($_GET['page'])){
		$page=$_GET['page'];
	}else{
		$page='accueil';
	}
	if(!isset($LesPages[$page])){
		$page='accueil';
	}
	
	$explose=explode(";",$LesPages[$page]);
	$role=$explose[1];
	if($role==0){
		$contenu=$explose[0]; // (1) J'execute le petit 1 quand le role de la page est egal à 0. Ce qui veut dire qu'il n'ya aucun droit spécial pour voir le contenu
	}
	else{
		if(isset($_SESSION['login'])){ // (2) On vérifie si la personne est connécté
			$rolePersonne=$_SESSION['role'];
			if($rolePersonne==$role){ // (3) On vérifie que la personne a bien le droit de voir le contenu de la page
					$contenu=$explose[0];
			}
			else{
				$contenu="viewAccueil"; // (4) Elle n'a pas le droit elle va sur la page d'accueil

			}
		}
			else{
				$contenu="viewAccueil"; // (5) Elle n'est pas connécté elle va sur la page d'accueil
			}
	}
		
		return $contenu;
		
}






























?>
