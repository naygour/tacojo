<?php


	//Démarrage de la session de l'internaute
	session_start();

	//IMPORTS
	require_once'src/bd/config.php';
	require_once'src/bd/connexion.php';
	require_once'src/presentation.php';
	require_once'src/listepage.php';
	require_once'src/outil.php';

	require_once'src/views/view_accueil.php';
	require_once'src/views/view_patients.php';
	require_once'src/views/view_protocole.php';
	require_once'src/views/view_dispensation.php';
	require_once'src/views/view_utilisateur.php';
	require_once'src/views/view_medicament.php';
	require_once'src/views/view_repartition_adulte.php';
	require_once'src/views/view_repartition_enfant.php';
	require_once'src/views/view_rdv.php';
	require_once'src/views/view_rapport.php';

        require_once'src/class/class_inclusion.php';
	require_once'src/class/class_dispensation.php';
	require_once'src/class/class_etat_dispensation.php';
	require_once'src/class/class_ligne.php';
	require_once'src/class/class_patient.php';
	require_once'src/class/class_profil_serologique.php';
	require_once'src/class/class_protocole.php';
	require_once'src/class/class_type_protocole.php';
	require_once'src/class/class_suivi_patient.php';
	require_once'src/class/class_grade.php';
	require_once'src/class/class_utilisateur.php';
	require_once'src/class/class_ass_grade_droit.php';
	require_once'src/class/class_droit.php';
	require_once'src/class/class_medicament.php';
	require_once'src/class/class_repartition_adulte.php';
	require_once'src/class/class_repartition_enfant.php';
	require_once'src/class/class_inclusion.php';
	require_once'src/class/class_rapport.php';
        require_once'src/class/class_co_infection.php';


        //Ecriture de l'entête HTML
	entete();
        
        //Connexion à la BDD
	$db = connect($config);

	if (isset($_POST['btConnexion']))
        //Si on appuie sur le bouton de connexion
        {
            //On récupère le login et le mot de passe renseigné
            $login = $_POST['login'];
            $mdp = $_POST['mdp'];
            
            //On appelle la classe Utilisateur
            $utilisateur = new utilisateur($db);
            //On utilise la RQ permettant de vérifier la connexion
            $unUtilisateur = $utilisateur->selectConnexion($login,$mdp);

            //On appelle la classe grade
            $grade = new grade($db);
            //On récupère la liste de tous le grades
            $listeGrade = $grade->selectAll();

            //Si les identifiants de connexion correspondent à ceux d'un utilisateur
            if ($unUtilisateur != false)
            {

                //Enregistrement du login dans la superglobale $_SESSION
                $_SESSION['login'] = $unUtilisateur['login'];

                //Pour chaque grade se trouvant dans la liste des grades
                foreach($listeGrade as $unGrade)
                {
                    //Si le grade de l'utilisateur correspond à celui de la liste
                    if( $unUtilisateur['grade'] == $unGrade['id_grade'])
                    {
                            //On enregistre l'ID et le nom du grade dans $_SESSION
                            $_SESSION['role'] = $unGrade['id_grade'];
                            $_SESSION['grade'] =$unGrade['nom_grade'];
                            
                            //On appelle la classe qui permet de donner des droits selon le grade
                            $ass_grade_droit = new ass_grade_droit($db);
                            //Récupération des droits selon le grade
                            $liste_ass_grade_droit = $ass_grade_droit->selectOneGrade($unGrade['id_grade']);

                            //Pour chaque droit se trouvant dans al liste de droits, récupérées selon le grade
                            foreach ($liste_ass_grade_droit as $uneLigne)
                            {
                                $droits[$uneLigne['id_droit']]=$uneLigne['id_droit'];
                                //Réupération des droits dans un tableau
                            }
                            
                            $_SESSION['droits']=$droits;
                            //Stockage du tableau dans la superglobale $_SESSION
                    }
                }

            }
            else
            {
                echo
                '
                <script>
                    alert("La connexion a échoué. Vérifiez vos identifiants.");
                </script>
                ';
                    //echo'pas possible de se connecter';
            }
	}





        if ($db == NULL)
        {
            echo '<div class="col-md-12"><div class="alert alert-danger">Site en maintenance !</div></div>';
	}
        else
        {

            menu();


            $contenu=getPage();
            $contenu($db);

	}

	bas();

?>
