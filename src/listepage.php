<?php
function getPage()
{
    //LISTE DES PAGES DU SITE
    $LesPages['accueil']            ="viewAccueil;0";
    $LesPages['protocole']          ="viewListeProtocole;1";
    $LesPages['modifProtocole']     ="viewModifProtocole;1";
    $LesPages['patient']            ="viewListePatient;1";
    $LesPages['modifPatient']       ="viewModifPatient;1";
    $LesPages['ajouter_patient']    ="viewAjouterPatient;1";
    $LesPages['Ajouter_protocole']  ="viewAjouterProtocole;1";
    $LesPages['fichePatient']       ="viewFichePatient;1";
    $LesPages['detail']             ="viewIdPatient;1";
    $LesPages['fichePatientDisp']   ="viewFichePatientDisp";
    $LesPages['dispensation']       ="viewListDispensation;1";
    $LesPages['ajout_dispensation'] ="viewAjouterDispensation;1";
    $LesPages['utilisateur']        ="viewListeUtilisateur;1";
    $LesPages['ajout_utilisateur']  ="viewAjoutUtilisateur;1";
    $LesPages['modifUtilisateur']   ="viewModifUtilisateur;1";
    $LesPages['acronyme']           ="viewMedicament;1";
    $LesPages['modifAcronyme']      ="viewModifMedicament;1";
    $LesPages['repartition_adulte'] ="viewRepartitionAdulte;1";
    $LesPages['repartition_enfant'] ="viewRepartitionEnfant;1";
    $LesPages['repartition_ligne']  ="viewRepartitionLigne;1";
    $LesPages['listeRDV']           ="listeRDV;1";
    $LesPages['rapport']            ="viewRapport;1";
    $LesPages['graphique']          ="view_graph;1";
    $LesPages['ajouterDispensationPourLePatient']          ="ajouterDispensationPourLePatient;1";

    if(isset($_GET['page']))
    //Si la variable page est définie dans la barre URL
    {
        $page=$_GET['page'];
        //On récupère a valeur de la page
    }
    else
    {
        $page='accueil';
        //Sinon on renvoie à la page d'accueil
    }
    
    if(!isset($LesPages[$page]))
    //Si la clef dont la valeur est celle de la variable page, n'existe pas dans le tableau
    {
            $page='accueil';
            //On renvoie à la page d'accueil
    }

    //On récupère le role de la page
    $explose=explode(";",$LesPages[$page]);
    $role=$explose[1];
    
    //Si le rôle est 0
    if($role==0)
    {
            $contenu=$explose[0];
            //On affiche le contenu directement
    }
    else
    {
        if(isset($_SESSION['login']))
        //Si la personne est connectée
        {
                $rolePersonne=$_SESSION['role'];
                //On récupère son role
                if($rolePersonne>=$role)
                //Si le role de la personne est le même que celui requis pour la page
                { 
                    $contenu=$explose[0];
                    //On affiche le contenu 
                }
                else
                {
                    $contenu="accueil";
                    //Sinon, si la personne n'a pas les droits requis, on affiche l'accueil
                }
        }
        else
        {
            $contenu="accueil";
            //Sinon si la personne n'est pas connectée, alors on affiche l'accueil
        }
    }

    return $contenu;
    //On retourne la valeur du contenu

}

?>
