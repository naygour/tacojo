<?php

function viewAjouterPatient($db)
{
    echo'<meta http-equiv="content-type" content="text/html; charset=utf-8" />';
    echo
    '
	<!--<div id="content-wrapper">-->
        <div class="container">
        <div class="mui--appbar-height"></div>
        <div class="mui-container-fluid">
    ';

    //Si on appuie sur le bouton pour ajouter un patient
    if (isset($_POST['btPatient']))
    {
        //On récupère les informations du patient et on instancie un booléen qui autorisera l'insertion d'un nouveau patient
        $impossible=0;
        $num_id_national    = $_POST['num_id_national'];
        $num_inclusion      = $_POST['num_inclusion'];
        $profil_serologique = $_POST['profil_serologique'];
        $sexe               = $_POST['sexe'];
        $date_de_naissance  = $_POST['date_de_naissance'];
        $protocole          = $_POST['protocole'];
        $ligne              = $_POST['ligne'];
        $date_inclusion     = $_POST['date_inclusion'];
        $co_infections      = $_POST['co_infection'];


        if($sexe!="M" && $sexe!="F")
        {
            $impossible=1;
            echo'<br><div class="well center alert alert-danger" role="alert">Veuillez renseigner le sexe du patient !</div>
            <script>$(".well").fadeTo(5000, 200).slideUp(500);</script>';
        }
        if($profil_serologique==4)
            {
            $impossible=1;
            echo'<br><div class="well center alert alert-danger" role="alert">Veuillez renseigner le profil sérologique du patient !</div>
            <script>$(".well").fadeTo(5000, 200).slideUp(500);</script>';
        }
        if(empty($date_de_naissance))
        {
            $impossible=1;
            echo'<br><div class="well center alert alert-danger" role="alert">Veuillez renseigner la date de naissance !</div>
            <script>$(".well").fadeTo(5000, 200).slideUp(500);</script>';
        }
        if(empty($date_inclusion))
        {
            $impossible=1;
            echo'<br><div class="well center alert alert-danger" role="alert">Veuillez renseigner la date d\'inclusion du patient!</div>
            <script>$(".well").fadeTo(5000, 200).slideUp(500);</script>';
        }
        if(empty($num_inclusion))
        {
            if(empty($num_id_national))
            {
                $impossible=1;
                echo'<br><div class="well center alert alert-danger" role="alert">Veuillez renseigner soit un numéro id national ou un numéro d\'inclusion!</div>
                <script>$(".well").fadeTo(5000, 200).slideUp(500);</script>';
            }
        }
        else
        {
            $patient = new patient($db);
            $listePatient = $patient->selectAll();
            
            foreach ($listePatient as $unPatient)
            {
                if($unPatient['num_id_national']==$num_id_national)
                {
                    if($unPatient['num_inclusion']==$num_inclusion)
                    {
                        $impossible=1;
                        echo'<br><div class="well center alert alert-danger" role="alert">Le patient existe deja !!!</div>
                            <script>$(".well").fadeTo(5000, 200).slideUp(500);</script>';
                    }
                }
            }
            
            if($impossible==0)
            {
                $nb = $patient->insertAll($num_id_national, $num_inclusion, $profil_serologique, $sexe, $date_de_naissance, $protocole, 0, $ligne,$co_infections);
                
                if ($nb == 1)
                {
                    echo
                    '
                        <br><div class="well center alert alert-success" role="alert">Vous avez ajouté un Patient !</div>
                        <script>$(".well").fadeTo(5000, 200).slideUp(500);</script>
                    ';
                        
                    $inclu = new inclusion($db);
                    $nb2 = $inclu ->insertAll($num_inclusion , $date_inclusion);

                    echo "<script>window.location.replace(\"index.php?page=patient\")</script>";
                }
                else
                {
                    echo
                    '
                        <br><div class="well center alert alert-danger" role="alert">Impossible d\'ajouter un Patient !</div>
                        <script>$(".well").fadeTo(5000, 200).slideUp(500);</script>
                    ';
                }
            }
        }
    }

    echo
    '
    <br>
    
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="center">
                <h2>Ajouter un patientttttt</h2>
            </div>
        </div>
    <div class="panel-body">








    <form class="form-group" method="POST" action="index.php?page=ajouter_patient" enctype="multipart/form-data" style="margin-right:20%; margin-left : 20%">
    

        <div class="form-group">
          <label for="num_id_national">N° Identification national</label>
          <input type="text" class="form-control" name="num_id_national" id="num_id_national" placeholder="N° Identification national">
        </div>
        
        <div class="form-group">
          <label for="num_inclusion">N° Inclusion</label>
          <input type="text" class="form-control" name="num_inclusion" id="num_inclusionTEST" placeholder="N° Inclusion">
        </div>
        
        <div class="form-group">
            <label for="sexe">Sexe</label>
            
            <select class="form-control" name="sexe" id="sexe" />
              <option value="M">Homme</option>
              <option value="F">Femme</option>
            </select>
        </div>

        <div class="form-group">
          <label for="date_de_naissance">Date de naissance</label>
          <input class="datepicker form-control" type="date" name="date_de_naissance" id="date_de_naissance" placeholder="aaaa-mm-jj"/>
        </div>
        
        <div class="form-group">
          <label for="date_inclusion">Date d\'inclusion</label>
          <input class="datepicker form-control" type="date" name="date_inclusion" id="date_inclusion" placeholder="aaaa-mm-jj"/>
        </div>

        <div class="form-group">
            <label for="profil_serologique">Profil sérologique</label>
            
            <select class="form-control" id="profil_serologique" name="profil_serologique">
            ';
     Co-Infection 
            $listeProfilsSerologiques = new profil_serologique($db);
            $lesProfilsSérologiques = $listeProfilsSerologiques->selectAll();
            $compteur=1;
            
            //echo 'mdr'.var_dump($lesProfilsSérologiques);
            
            foreach($lesProfilsSérologiques as $unProfil)
            {
                if($compteur==1)
                {
                    echo '<option value="'.$unProfil['id_profil'].'" selected>'.$unProfil['nom_profil'].'</option>';
                }
                else
                {
                    echo '<option value="'.$unProfil['id_profil'].'">'.$unProfil['nom_profil'].'</option>';
                }
                $compteur++;
            }
    
            echo
            '
            </select>
        </div>  ';

        echo'<div class="form-group">
            <label for="co_infection"> Co-Infection </label>
            <select class="form-control" id="co_infection" name="co_infection">';
                $coInf = new co_infection($db);
                $listeCoInf = $coInf->selectAll();
                
                foreach($listeCoInf as $uneInf)
                {
                    echo'<option value="'.$uneInf['id_co_infection'].'">'.$uneInf['nom_co_infection'].'</option>';
                }
            echo'</select>
        </div>
        
        <div class="form-group">      
            <label for="protocole">Protocole</label>
            <select class="form-control" id="protocole" name="protocole">
            ';
            
            $listeProtocoles = new Protocole($db);
            $lesProtocoles = $listeProtocoles->selectAll();
            $compteur=1;
            
            foreach($lesProtocoles as $unProtocole)
            {
                if($compteur==1)
                {
                    echo '<option value="'.$unProtocole['id_proto'].'" selected>'.$unProtocole['nom_proto'].'</option>';
                }
                else
                {
                    echo '<option value="'.$unProtocole['id_proto'].'">'.$unProtocole['nom_proto'].'</option>';
                }
                $compteur++;
            }
            
            echo
            '
            </select>
        </div>
        
        <div class="form-group">      
            <label for="ligne">Ligne</label>
            <select class="form-control"  id="ligne" name="ligne">
            ';
            
            $listeLignes = new ligne($db);
            $lesLignes = $listeLignes->selectAll();
            $compteur=1;
                        
            foreach($lesLignes as $uneLigne)
            {
                if($compteur==1)
                {
                    echo'<option value="'.$uneLigne['id_ligne'].'" selected>'.$uneLigne['nom_ligne'].'</option>';
                }
                else
                {
                    echo'<option value="'.$uneLigne['id_ligne'].'">'.$uneLigne['nom_ligne'].'</option>';
                }
                
                $compteur++;
            }
            
            echo
            '
            </select>
        </div>

        <div class="form-group" style="float : right">      
            <button type="reset" class="btn btn-default">Réinitialiser</button>
            <button type="submit" class="btn btn-success" id="btPatient" name="btPatient">AJOUTER</button>
        </div>
        

  </form>

</div></div></div></div>';
}

function viewListePatient($db)
{
    $patient = new Patient($db);
    $listePatient = $patient->selectAll();
    
    //var_dump($listePatient);
    
    $protocole = new Protocole($db);
    $listeProtocole = $protocole->selectAll();

    $profil_serologique = new profil_serologique($db);
    $listeProfil = $profil_serologique->selectAll();

    $ligne = new ligne($db);
    $listeLigne = $ligne->selectAll();

    echo
    '

<!--<div id="content-wrapper">-->
        <div class="container">
        <div class="mui--appbar-height"></div>
        <div class="mui-container-fluid">
      <br>
        <div class="panel panel-default">
		<div class="panel-heading">
			<div class="center">
				<h2>Liste des patients</h2>
			</div>
		</div>
	</div>

        <!--<form id="patient_form" action="index.php?page=detail&id_patient=" enctype="multipart/form-data" method="get">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Rechercher un patient" id="patients" name="patients">
                <input type="hidden" id="id_patient" name="id_patient" value="">
                <div class="input-group-btn">
                    <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                </div>
            </div>
        </form>-->
        


        


       <br>
    <div class="row">

        <div class="col-md-12">

            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-6">
                    <h3 class="panel-title">Liste des patients</h3>
                  </div>PhpProject1
                  <!--<div class="col col-xs-6 text-right">
                    <button type="button" class="btn btn-sm btn-primary btn-create">Create New</button>
                  </div>-->
                </div>
              </div>
              

              <div class="panel-body">
                <table style="min-width : 100%" id="repDataTable1" class="table table-striped table-bordered table-list display">
                  <thead>
                   <tr>
                    <th>Accès à la fiche Patient</th>
                    <th>Id national</th>
                    <th>Num inclusion</th>
                    <th>Profil sérologique</th>
                    <th>Sexe</th>
                    <th>Date de naissance</th>
                    <th>Date d\'inclusion </th>PhpProject1
                    <th>Dernière Dispensation</th>
                    <th>Protocole en cours</th>
                    <th>Ligne</th>
                    <th>Poids</th>
                    <th>Suivi</th>
                    <th>Statut du patient</th>
                    <th>Prochain rdv </th>
                   </tr>
                  </thead>
                  <tbody>
                          ';
	foreach ($listePatient as $unPatient)
        {
            foreach ($listeProtocole as $unProtocole)
            {
                if ($unPatient['protocole'] == $unProtocole['id_proto'])
                {
                    foreach ($listeProfil as $unProfil)
                    {
                        if ($unPatient['profil_serologique'] == $unProfil['id_profil'])
                        {
                            foreach ($listeLigne as $uneLigne)
                            {
                                if ($unPatient['ligne'] == $uneLigne['id_ligne'])
                                {
                                    $date_inclusion = new inclusion($db);
                                    $DateInc = $date_inclusion->selectOne($unPatient['num_inclusion']);

                                    $inclu = new inclusion($db);
                                    $uneDate= $inclu -> selectOne($unPatient['num_inclusion']);

                                    $etat = new dispensation($db);
                                    $unEtat= $etat -> selectEtat($unPatient['num_inclusion']);

                                    $etatPatient= $unEtat['nom_etat_dispen'];

                                    $formatDate = "d/m/Y";

                                    $max= new dispensation($db);
                                    $maxRdv = $max->selectEtat($unPatient['num_inclusion']);

                                    $rdv = new dispensation($db);
                                    $unRDV= $rdv -> selectRDV($maxRdv['id_dispensation']);
                                    
                                    $dispensation = new dispensation($db);
                                    $derniereDispen = $dispensation->selectDerniereDispen($unPatient['num_inclusion']);
                                    
                                    echo
                                    '
                                    <tr>
                                        <td><a href="index.php?page=fichePatient&num_id_national=' .$unPatient['num_id_national'].'" value="'.$unPatient['num_id_national'].'"><input type="button" id="btFichePatient" name="btFichePatient" class="form-control" value="Fiche Patient"/></a>
                                        <td><a href="index.php?page=modifPatient&num_id_national=' . $unPatient['num_id_national'] . '">' . $unPatient['num_id_national'] . '</a></td>
                                        <td><a href="index.php?page=modifPatient&num_inclusion=' . $unPatient['num_inclusion'] . '">' . $unPatient['num_inclusion'] . '</a></td>
                                        <td>' . $unProfil['nom_profil'] . '</td>
                                        <td>' . $unPatient['sexe'] . '</td>';
                                            
                                        $date=date_create($unPatient['date_de_naissance']);
                                        echo'<td>' . date_format($date, $formatDate) . '</td>';
                                            
                                        $date=date_create($uneDate['dateInclusion']);
                                        echo'<td>' . date_format($date,$formatDate) .'</td>';
                                        
                                        $date=date_create($derniereDispen['derniereDisp']);
                                        echo'<td>' . date_format($date, $formatDate) . '</td>
                                            
                                        <td>' . $unProtocole['nom_proto'] . '</td>
                                        <td>' . $uneLigne['nom_ligne'] . ' </td>
                                        <td>' . $unPatient['poids'] . '</td>
                                        <td><a href="index.php?page=detail&id_patient=' . $unPatient['id_patient'] . '">Dispensation</a></td>
                                        <td>'. utf8_encode($etatPatient).'</td>';
                                            
                                        $date=date_create($unRDV['rdv']);
                                        echo'<td>'. date_format($date, $formatDate).'</td>

                                    </tr>

        			    ';
                                }
                            }
                        }
                    }
                }
            }
        }
        
	echo
        '
                          </tr>
                        </tbody>
                </table>
              </div>
              
                <div class="panel-footer">
                    <div class="row">
                        <div class="col col-xs-4">Page 1 sur 1
                        </div>
                  
                        <div class="col col-xs-8">

                            <ul class="pagination hidden-xs pull-right">
                              <li><a href="#">1</a></li>
                            </ul>
                            <ul class="pagination visible-xs pull-right">
                                <li><a href="#">«</a></li>
                                <li><a href="#">»</a></li>
                            </ul>

                        </div>
                  
                    </div>
                </div>
            

  </div></div></div></div>';


}

function viewModifPatient($db)
{
    echo
    '
        <!--<div id="content-wrapper">-->
        <div class="container">
        <div class="mui--appbar-height"></div>
        <div class="mui-container-fluid">';

        if(isset($_POST['btSupprimer']))
        {
            $id_patient = $_POST['id_patient'];

            $patient = new Patient($db);
            $nb = $patient->deleteOne($id_patient);
            if($nb!=1)
            {
                echo '<br><div class="center alert alert-danger" role="alert">Erreur de Suppression !</div>';
            }
            else
            {
                echo '<br><div class=" center alert alert-success" role="alert">Suppression effectuée !</div>';
                //header('refresh:1;url=index.php?page=patient');
                echo "<script>window.location.replace(\"index.php?page=patient\")</script>";
            }
        }

        if(isset($_POST['btModifier']))
        {

            $id_patient = $_POST['id_patient'];
            $num_id_national = $_POST['num_id_national'];
            $num_inclusion = $_POST['num_inclusion'];
            $profil_serologique = $_POST['profil_serologique'];
            $sexe = $_POST['sexe'];
            $date_de_naissance = $_POST['date_de_naissance'];
            $protocole = $_POST['protocole'];
            $poids  = $_POST['poids'];
            $ligne = $_POST['ligne'];
            $co_infections = $_POST['co_infection'];

            $patient = new Patient($db);

            $nb = $patient->updateAll($id_patient, $num_inclusion,$num_id_national, $profil_serologique, $sexe, $date_de_naissance, $protocole, $poids, $ligne, $co_infections);
            if ($nb == 1)
            {
                echo '<br><div class="center alert alert-success" role="alert">Modification effectuée !</div>';
                //header('refresh:1;url=index.php?page=patient');
                echo "<script>window.location.replace(\"index.php?page=patient\")</script>";
            }
            else
            {
                echo '<br><br><div class="center alert alert-danger" role="alert">Erreur de modification !</br><div>';
            }
        }
        
        $uneListe=true;
        if(isset($_GET['num_inclusion']))
        {
            $num_inclusion=$_GET['num_inclusion'];
            $patient=new Patient($db);
            $uneListe = $patient->selectOne($num_inclusion); //selectOne renvoie la valeur false si il n'a pas trouver de Produit
        }

        elseif(isset($_GET['num_id_national']))
        {
            $num_id_national=$_GET['num_id_national'];
            $patient= new Patient($db);
            $uneListe = $patient->selectOne2($num_id_national);
        }

        if($uneListe!=false)
        {

            echo'<br>
            <form method="POST" action="index.php?page=modifPatient" enctype="multipart/form-data">

          <div class="col-md-1"></div>

            <div class="col-md-10">

            <form class="form-group" method="POST" action="index.php?page=modifProtocole" enctype="multipart/form-data">

              <div class="panel panel-default">

                <div class="panel-heading">

                  <div class="center ">
                    <h3>Modification du patient</h3>
                  </div>

                </div>

                <div class="panel-body">



                      <input class="form-control" type="hidden" name="id_patient" id="id_patient" value="'.$uneListe['id_patient'].'"/>

                  <div class="col-md-12">

                      <label>Numéro id national</label>
                      <input class="form-control" type="text" name="num_id_national" id="num_id_national" value="'.$uneListe['num_id_national'].'"/><br>

                  </div>
                  <div class="col-md-12">

                      <label>Num inclusion</label>
                      <input class="form-control" type="text" value="'.$uneListe['num_inclusion'].'" name="num_inclusion" id="num_inclusion"/><br>
                  </div>
                  <div class="col-md-12">

                      <label>Profil sérologique</label>
                      <select class="form-control" id="profil_serologique" name="profil_serologique">';

                        $profil = new profil_serologique($db);
                        $listeP = $profil->selectAll();

                        foreach ($listeP as $unProfil)
                        {
                            if ($unProfil['id_profil'] == $uneListe['profil_serologique'])
                            {
                              echo'<option selected="selected" value="'.$unProfil['id_profil'].'">'.$unProfil['nom_profil'].'</option>';
                            }
                            else
                            {
                              echo'<option value="'.$unProfil['id_profil'].'">'.$unProfil['nom_profil'].'</option>';
                            }

                        }
                        echo
                        
                        '
                      </select>
                      <br>

                  </div>

                  
                  <div class="col-md-12">

                      <label>Sexe</label>
                      <input class="form-control" type="text" name="sexe" id="sexe" value="'.$uneListe['sexe'].'"/><br>

                  </div>
                  <div class="col-md-12">

                      <label>Date de naissance</label>
                      <input class="form-control" type="date" name="date_de_naissance" id="date_de_naissance" value="'.$uneListe['date_de_naissance'].'"/><br>

                  </div>
                  <div class="col-md-12">

                      <label>Protocole</label>
                      <select class="form-control" id="protocole" name="protocole">';

                        $proto = new protocole($db);
                        $listeP = $proto->selectAll();

                        foreach ($listeP as $unProto)
                        {
                            if ($unProto['id_proto'] == $uneListe['protocole'])
                            {
                                echo'<option selected="selected" value="'.$unProto['id_proto'].'">'.$unProto['nom_proto'].'</option>';
                            }
                            else
                            {
                                echo'<option value="'.$unProto['id_proto'].'">'.$unProto['nom_proto'].'</option>';
                            }
                        }
                        echo
                        '
                      </select>
                      <br>
                    </div> 
                     
                  <div class="col-md-12">
                    <label> Co-Infections</label>
                    <select class="form-control" id="co_infection" name="co_infection">';
                        
                        $coInf = new co_infection($db);
                        $listeCoInf = $coInf->selectAll();
                        
                        foreach($listeCoInf as $uneInf)
                        {
                            echo'<option value="'.$uneInf['id_co_infection'].'">'.$uneInf['nom_co_infection'].'</option>';
                        }
                    echo'</select>
                  </div>
                  
                  <div class="col-md-12">

                      <label>Poids</label>
                      <input class="form-control" type="text" name="poids" id="poids" value="'.$uneListe['poids'].'"/><br>

                  </div>

                  <div class="col-md-12">

                      <label>Ligne</label>
                      <input class="form-control" type="text" name="ligne" id="ligne" value="'.$uneListe['ligne'].'"/><br>

                  </div>

                      <div class="pull-right">
                        <button type="submit" class="btn btn-warning" id="btModifier" name="btModifier">Modifier</button>

                        <button type="submit" class="btn btn-danger" id="btSupprimer" name="btSupprimer">Supprimer</button>
                      </div>

                  </div>

                </div>

          </div>

        </form>';




		echo'</div>';
	}

        echo'</div></div>';

}

function viewIdPatient($db)
{
    echo
    '
    <!--<div id="content-wrapper">-->
        <div class="container">
        <div class="mui--appbar-height"></div>
        <div class="mui-container-fluid">
    ';

    if(isset($_POST['btModif']))
    {
        
        $id_dispensation        = $_POST['id_dispensationT'];
        $etat_dispensation      = $_POST['etat_dispensation'];
        $date_dispensation      = $_POST['dateDispT'];
        $nb_jours_traitement    = $_POST['NbJour'];
        $date_fin_traitement    = $_POST['DateFinTraitement'];
        $date_debut_traitement  = $_POST['dateDebutTraitementT'];
        $rdv                    = $_POST['RDV'];
        $observations           = $_POST['observationsT'];
        $poids                  = $_POST['poidsT'];

        $id_patient=$_POST['id_patient'];

        $modifdispensation = new dispensation($db);

        $uneDisp= $modifdispensation-> selectId($id_dispensation);

        $num_inclusion= $uneDisp['num_inclusion'];

        $nb = $modifdispensation->updateAll($id_dispensation,$num_inclusion,$etat_dispensation, $date_dispensation,$date_debut_traitement, $nb_jours_traitement, $date_fin_traitement , $rdv ,$poids, $observations);

        if($nb!=1)
        {
            echo '<br><div class="center alert alert-danger" role="alert">Erreur de Modification!</div>';
        }
        else
        {
            echo '<br><div class="center alert alert-success" role="alert">Modification effectuée !</div>';
        }
    }

    if(isset($_POST['btValider']))
    {
        $num_inclusion = $_POST['num_inclusion'];
        $etat_dispensation = $_POST['etat_dispensation'];
        $date_dispensation = $_POST['date_dispensation'];
        $nb_jours_traitement = $_POST['nb_jours_traitement'];
        $date_fin_traitement = $_POST['date_fin_traitement'];
        $poids= $_POST['poids'];
        $date_debut_traitement= $_POST['date_debut_traitement'];
        $date_rdv= $_POST['date_rdv'];
        $observations=$_POST['observations'];

        $id_patient = $_POST['id_patient'];
        $annee = $_POST['annee'];
        $mois = $_POST['mois'];
        print_r($_POST);
        $suivi_presence = new Suivi($db);
        $nb = $suivi_presence->insertAll($id_patient, $annee, $mois);

        $dispensation = new dispensation($db);

        $nb2 = $dispensation->insertAll($num_inclusion, $etat_dispensation, $date_dispensation, $date_debut_traitement, $nb_jours_traitement, $date_fin_traitement, $date_rdv,$poids, $observations);

        if($nb2!=1)
        {
            echo '<br><div class="center alert alert-danger" role="alert">Erreur dans l\'ajout !</div>';
            if(isset($_GET['id_patient']))
            {
                $id_patient = $_GET['id_patient'];
                $patient = new Patient($db);
                $uneListe = $patient->selectId($id_patient); //selectOne renvoie la valeur false si il n'a pas trouver de Produit
                if ($uneListe != false)
                {
                       // header('refresh:2;url=index.php?page=patient');
                }
            }
        }
        else
        {
            echo '<br><div class="center alert alert-success" role="alert">Ajout effectué !</div></div></div>';
            //header('refresh:2;url=index.php?page=patient');
        }
    }

    if(isset($_POST['btValider']))
    {
        $id_patient = $_POST['id_patient'];
        $protocole = $_POST['protocole'];
        $patient = new Patient($db);
        $nb = $patient->updateProto($id_patient, $protocole);
    }

    if(isset($_GET['id_patient']))
    {
        $id_patient     = $_GET['id_patient'];
        $patient        = new Patient($db);
        $uneListe       = $patient->selectId($id_patient); //selectOne renvoie la valeur false si il n'a pas trouver de Produit
        
        if ($uneListe != false)
        {
            echo
            '
             <br>
                    <div class="panel panel-default">
                            <div class="panel-heading">
                                    <div class="center">
                                            <h3>Dispensations du patient ' . $uneListe['num_inclusion'] . '</h3>
                                    </div>
                            </div>
                    </div>
            </div>
            
            <div class="col-md-12">

            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-6">
                    <h3 class="panel-title">Suivi des dispensations en '. date('Y') .'</h3>
                  </div>
                </div>
              </div>
            ';

            echo
            '<div id="dvData>
                <form method="POST" action="index.php?page=detail&id_patient=">
                <div class="panel-body">
            ';

            $dispensation = new Dispensation($db);
            
            for ($mois=1; $mois<=12; $mois++)
            {
                $tableDispens[$mois] = $dispensation->selectOneYearMonth($uneListe['num_inclusion'], $mois, date('Y'));
            }
            
            $legende[0] ='Statut';
            $legende[1] ='Date de la dispensation';
            $legende[2] ='Date début traitement';
            $legende[3] ='Nombre de jours de traitement dispensés';
            $legende[4] ='Date de fin de traitement';
            $legende[5] ='Date du prochain rdv';
            $legende[6] ='Poids';
            $legende[7] ='Observations';
            $legende[10]='Statut';
            $legende[11]='DateDispensation';
            $legende[12]='DateTraitement';
            $legende[13]='NbJour';
            $legende[14]='DateFinTraitement';
            $legende[15]='DateRdv';
            $legende[16]='poids';
            $legende[17]='Observations';

            echo
            '
                <table class="table table-striped table-bordered table-list">
                  <thead>
                    <tr>
                     <th></th>
                        <th>Jan</th>
                        <th>Fev</th>
                        <th>Mar</th>
                        <th>Avr</th>
                        <th>Mai</th>
                        <th>Juin</th>
                        <th>Jui</th>
                        <th>Aout</th>
                        <th>Sep</th>
                        <th>Oct</th>
                        <th>Nov</th>
                        <th>Dec</th>
                    </tr>';
            
                    $suivi_presence = new Suivi($db);
                    $listesuivi = $suivi_presence->selectAll();
                    $nb = count($listesuivi);
                    

                    for($ligne=0;$ligne<8;$ligne++)
                    {
                        echo
                        '
                        <tr>
                        <th scope="row">'.$legende[$ligne].'</th>';
                        if($ligne==0)
                        {
                          for($mois=1;$mois<=12;$mois++)
                          {
                            if($tableDispens[$mois][$ligne+2]==1)
                            {
                            echo'<td> Suivi </td>';
                            }
                            elseif($tableDispens[$mois][$ligne+2]==2)
                            {
                              echo'<td> Absent </td>';
                            }
                            elseif($tableDispens[$mois][$ligne+2]==3)
                            {
                              echo' <td> Décédé</td>';
                            }
                            elseif($tableDispens[$mois][$ligne+2]==4)
                            {
                              echo '<td> Perdu de vue </td>';
                            }
                            elseif($tableDispens[$mois][$ligne+2]==5)
                            {
                              echo' <td> Transfert sortant </td>';
                            }
                            else
                            {
                              echo'<td>    </td>';
                            }
                          }
                        }
                        else
                        {
                            $val=$ligne+10;
                            
                            for($mois=1;$mois<=12;$mois++)
                            {
                                echo'
                                <td id="'.$legende[$val].'-'.$tableDispens[$mois][0].'">'.$tableDispens[$mois][$ligne+2].'</td >';
                            }
                        }
                        echo
                        '
                        </tr>
                        ';
                    }
		
                    $listMois = array("de Janvier", "de Février", "de Mars", "d'Avril", "de Mai", "de Juin", "de Juillet", "d'Aout", "de Septembre", "d'Octobre", "de Novembre", "de Décembre");
                    echo'<th></th>';
			
                    $suivi_presence = new Suivi($db);
                    $listeModifications = $suivi_presence->getSuiviModifie($id_patient);
                    $arrayModif = array();
                    
                    foreach($listeModifications as $lm) array_push($arrayModif, $lm['mois'].':'.$lm['annee']);
                    for($mois=1;$mois<=12;$mois++)
                    {
                        $pattern = $mois.':'.date('Y');
                       
                        if(!empty($tableDispens[$mois][0]))
                        {
                            echo '<td><input type="button" class="btn btn-primary click-modalModif" name ="btModif2" value="Modif-'.$tableDispens[$mois][0].'" data-toggle="modal" data-target="#modalModif" data-iddisp="'.$tableDispens[$mois][0].'" data-dateDisp="'.$tableDispens[$mois][3].'" /></td>';
                        }
                        else
                        {
                            echo '<td><input type="button" class="btn btn-success click-modalAction" value="Suivi-'.$tableDispens[$mois][0].'" data-toggle="modal" data-target="#modalAction" data-idp="' . $id_patient . '" data-nommois="' . $listMois[$mois - 1] . '" data-mois="' . $mois . '" data-annee="' . date('Y') . '"/></td>';
                        }
                    }

                    echo '
				   </tr>

			   	  </thead>
			    </table>
                            <input type="button" id="btnExport" value=" Exporter votre tableau en Excel " class="btn btn-success click-modalAction" />
			  </div>
			</form>
		    </div>
                   </div>
	    </div>





	    <!-- Modal -->
		<div class="modal fade test" id="modalAction" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h2 class="modal-title" id="myModalLabel">Présence du patient ' . $uneListe['num_inclusion'] . '</h2>
			  </div>
			  <div class="modal-body">

			  <h4>Presence pour le mois <span id="nommois"></span> de l\'année <span id="nomannee"></span> :</h4>
			 	<form action="index.php?page=detail&id_patient=" method="post">
			 	';
				echo
                                '
                                <div class="panel-body">

                                <input class="form-control" type="hidden" name="num_inclusion" id="num_inclusion" value="' . $uneListe['num_inclusion'] . '"/>

                                        <label>Etat du patient</label>
                                        <select class="form-control" id="etat_dispensation" name="etat_dispensation">
                                ';

                                $etat_dispensation = new Etat_dispensation($db);
                                $listeP = $etat_dispensation->selectAll();

                                foreach ($listeP as $unType)
                                {
                                    echo '<option value="' . $unType['id_etat_dispen'] . '">' . $unType['nom_etat_dispen'] . '</option>';
                                }
                                
                                echo
                                '
                                </select><br>

                                        <div id=present>

                                        <label>Date de la dispensation</label>
                                        <input name="date_dispensation" type="date" id="date_dispensation" class="datepicker form-control" placeholder="JJ-MM-AAAA"/><br>

                                <label> Date du début du traitement </label>
                                <input name="date_debut_traitement" type="date" id="pUpDate" class="datepicker form-control" placeholder="JJ-MM-AAAA"/><br>

                                <label>Nombre de jours du traitement</label>
                                <input class="form-control" type="text" id="nb_jours_traitement" name="nb_jours_traitement" placeholder="Exemple : 30" value=""><br>

                                <label>Protocole Dispensé</label>
                                <select class="form-control" id="protocole" name="protocole"></br>

                                ';
                                
                                $proto = new protocole($db);
                                $listeP = $proto->selectAll();

                                foreach ($listeP as $unProto)
                                {
                                    if ($unProto['id_proto'] == $uneListe['protocole'])
                                    {

                                      echo'<option selected="selected" value="'.$unProto['id_proto'].'">'.$unProto['nom_proto'].'</option>';
                                    }
                                    else
                                    {

                                      echo'<option value="'.$unProto['id_proto'].'">'.$unProto['nom_proto'].'</option>';
                                    }
                                }
                                
                                echo
                                '
						</select>
						<br>
                                <label> Date du prochain RDV </label>
                                <input name="date_rdv" type="date" id="date_rdv" class="datepicker form-control" placeholder="JJ-MM-AAAA"/><br>

                                <label> Poids  </label>
                                <input class="form-control" type="text" id="poids" name="poids" placeholder="Exemple : 70" value=""><br>

                                <label> Observations </label>
                                <input class="form-control" type="text" id="observations" name="observations" placeholder="Exemple : intolérence au médicament .... " value=""><br>


                                <input name="date_fin_traitement" type="hidden" id="date_fin_traitement" class="dOffDate form-control" />
				</div>

                                </div>

				<input type="hidden" id="id_patient" name="id_patient" value=""/>
				<input type="hidden" id="mois" name="mois" value=""/>
				<input type="hidden" id="annee" name="annee" value=""/>
				<input type="hidden" id="id_dispensation" name="id_dispensation" value=""/>


                                </div>
                                <div class="modal-footer">
                                      <button type="button"  class="btn btn-default" data-dismiss="modal">Annuler</button>
                                      <input type="submit" id="btValider" name="btValider" class="btn btn-primary" value="Valider"/>
                                </div>
                                </form>
                              </div>
                        </div>
                        
		</div>
                
                <script>
                
                    $(document).on("click", ".click-modalAction", function ()
                    {
                        var mois = $(this).data(\'mois\');
                        var iddisp = $(this).data(\'iddisp\')
                        var nommois = $(this).data(\'nommois\');
                        var annee = $(this).data(\'annee\');
                        var idp = $(this).data(\'idp\');
                        $("#pUpDate").datepicker("setDate", new Date(annee,mois-1,1));
                        $("#nommois").text(nommois);
                        $("#mois").val(mois);
                        $("#id_dispensation").val(iddisp);
                        $("#nomannee").text(annee);
                        $("#annee").val(annee);
                        $("#id_patient").val(idp);
                    }
                );
		</script>';



		if(isset($_POST['btModif']))
                {
                    
                    $id_patient = $_POST['id_patient'];
                    $protocole = $_POST['protocole'];
                    $patient = new Patient($db);
                    $nb = $patient->updateProto($id_patient, $protocole);
		}


		if(isset($_POST['btModif']))
                {
                    
                    $id_dispensation = $_POST['id_dispensation'];
                    $etat_dispensation = $_POST['etat_dispensation'];
                    $date_dispensation = $_POST['date_dispensation'];
                    $nb_jours_traitement = $_POST['nb_jours_traitement'];
                    $date_fin_traitement = $_POST['date_fin_traitement'];

                    $modifdispensation = new dispensation($db);

                    $nb = $modifdispensation->updateAll($id_dispensation,$etat_dispensation, $date_dispensation, $nb_jours_traitement, $date_fin_traitement);


                    if($nb!=1)
                    {
			echo '<br><div class="center alert alert-danger" role="alert">Erreur de Modification!</div>';
                    }
                    else
                    {
			echo '<br><div class="center alert alert-success" role="alert">Modification effectuée !</div>';
                    }

		}

		echo
                '
		<!-- Modal -->
		<div class="modal fade test" id="modalModif" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h2 class="modal-title" id="myModalLabel">Modification de la presence du patient ' . $uneListe['num_inclusion'] . ' (Pas encore effectué)</h2><input type="text" name="nommois" id="nommois"/>
			  </div>
			  <div class="modal-body">

			  <h4>Modification de la presence pour le mois <span id="nommois"></span> de l\'année <span id="nomannee"></span> :</h4>
			 	<form action="index.php?page=detail&id_patient=" method="post">
		';

                echo'<label>Etat du patient</label>
                <select class="form-control" id="etat_dispensation" name="etat_dispensation">
                ';

                $etat_dispensation = new Etat_dispensation($db);
                $listeP = $etat_dispensation->selectAll();

                foreach ($listeP as $unType)
                {
                  echo '<option value="' . $unType['id_etat_dispen'] . '">' . $unType['nom_etat_dispen'] . '</option>';
                }
                
                echo
                '
                    </select><br>
                ';

                echo' <label>ID</label>
                      <input class="form-control" type="text" name="id_dispensationT" id="id_dispensationT" value=""/><br>';

                echo' <label>Date dispensation</label>
                    <input class="form-control" type="text" name="dateDispT" id="dateDispT" value=""/><br>';

                echo' <label>Date début traitement</label>
                    <input class="form-control" type="text" name="dateDebutTraitementT" id="dateDebutTraitementT" value=""/><br>';

                echo ' <label> Durée traitement</label>
                    <input class="form-control" type="text" name="NbJour" id="NbJour" value=""/><br>';

                echo ' <label> Date de fin de traitement</label>
                    <input class="form-control" type="text" name="DateFinTraitement" id="DateFinTraitement" value=""/><br>';

                echo ' <label> Date prochain RDV</label>
                    <input class="form-control" type="text" name="RDV" id="RDV" value=""/><br>';

                echo ' <label> poids</label>
                    <input class="form-control" type="text" name="poidsT" id="poidsT" value=""/><br>';

                echo ' <label> Observations </label>
                <input class="form-control" type="text" name="observationsT" id="observationsT" value=""/><br>';





        echo
        '
            <input type="hidden" id="id_patient" name="id_patient" value=""/>
            <input type="hidden" id="mois" name="mois" value=""/>
            <input type="hidden" id="annee" name="annee" value=""/>
            <input type="hidden" id="id_dispensation" name="id_dispensation" value=""/>
        ';
        echo
        '
        </div>
        <div class="modal-footer">
        
        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
         <input type="submit" id="btModif" name="btModif" class="btn btn-primary" value="Modifier"/>
			  </div>
			  </form>
			</div>
		  </div>
		</div>
        
        <script>
            $(document).on("click", ".click-modalModif", function ()
            {
                var mois = $(this).data(\'mois\');
                var nommois = $(this).data(\'nommois\');
                var annee = $(this).data(\'annee\');
                var idp = $(this).data(\'idp\');
                var iddisp = $(this).data(\'iddisp\');
                var dateDisp= $(this).data(\'dateDisp\');

                $("#nommois").text("nommois");
                $("#mois").val(mois);
                $("#nomannee").text(annee);
                $("#annee").val(annee);
                $("#id_patient").val(idp);
                $("#id_dispensationT").val(iddisp);

                var comp = "#DateDispensation-"+iddisp ;
                var comp2 = "#DateTraitement-"+iddisp ;
                var comp3 = "#NbJour-"+iddisp ;
                var comp4 = "#DateFinTraitement-"+iddisp ;
                var comp5 = "#DateRdv-"+iddisp ;
                var comp6 = "#Observations-"+iddisp ;
                var comp7 = "#poids-"+iddisp ;
                var test= $(comp).text() ;
                var test2 = $(comp2).text() ;
                var test3 = $(comp3).text();
                var test4 = $(comp4).text();
                var test5 = $(comp5).text();
                var test6 = $(comp6).text();
                var test7 = $(comp7).text();
                $("#dateDispT").val(test) ;
                $("#dateDebutTraitementT").val(test2);
                $("#NbJour").val(test3);
                $("#DateFinTraitement").val(test4);
                $("#RDV").val(test5);
                $("#observationsT").val(test6);
                $("#poidsT").val(test7);

		});
		</script>';

        echo'</div>';
	}

    }
    else
    {
	echo 'Mauvais ID';
    }
}

function viewFichePatient($db){
    
    if(isset($_GET['num_id_national']))
    {
        $num_id_national=$_GET['num_id_national'];
        $patient=new Patient($db);
        $lePatient = $patient->selectOne2($num_id_national);
    }    
    
    $formatDate = "d/m/Y";
    
    $date_inclusion = new inclusion($db);
    $DateInc = $date_inclusion->selectOne($lePatient['num_inclusion']);
    
    $dispensation = new dispensation($db);
    $derniereDispen = $dispensation->selectDerniereDispen($lePatient['num_inclusion']);
    
    $dispensation2 = new dispensation($db);
    $allDisp = $dispensation2->selectAllDateDisp($lePatient['num_inclusion']);
    
    var_dump($allDisp);
    
    echo'<form class="form-group" method="POST" action="index.php?page=fichePatient" enctype="multipart/form-data">
            <div class="container">
                <div class="mui--appbar-height">    
                </div>
                
                <div class="mui-container-fluid">
                    <br/>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="center">
                                <h2>Patient n°</h2>
                            </div>
                        </div>';
    
    

                        echo'<div class="panel-body">
                            <table style="min-width : 100%" class="table table-striped table-bordered table-list display">
                                    <tr>
                                        <th class="demitableau">Numéro d\'identification national</th>
                                        <td class="demitableau">'.$lePatient['num_id_national'].'</td>
                                    </tr>
                                    <tr>
                                        <th class="demitableau">Numéro d\'inclusion</th> 
                                        <td class="demitableau">'.$lePatient['num_inclusion'].'</td>
                                    </tr>
                                    <tr>    
                                        <th class="demitableau">Profil sérologique</th>
                                        <td class="demitableau">'.$lePatient['profil_serologique'].'</td>   
                                    </tr>';
    
                                    $date= date_create($lePatient['date_de_naissance']);
                                    echo'<tr>
                                        <th class="demitableau">Date de naissance</th>
                                        <td class="demitableau">'. date_format($date, $formatDate) .'</td>
                                    </tr>';
                                    $date= date_create($DateInc['dateInclusion']);
                                    echo'<tr>
                                        <th class="demitableau">Date d\'inclusion</th>
                                        <td class="demitableau">'. date_format($date, $formatDate).'</td>
                                    </tr>';
                                    $date= date_create($derniereDispen['derniereDisp']);
                                    echo'<tr>
                                        <th class="demitableau">Date de la dernière dispensation</th>
                                        <td class="demitableau">'. date_format($date, $formatDate).'</td>
                                    </tr> 
                                    <tr>
                                        <th class="demitableau">Ligne de traitement</th>
                                        <td class="demitableau">'.$lePatient['ligne'].'</td>
                                    </tr>  
                                    <tr>
                                        <th class="demitableau">Poids</th>
                                        <td class="demitableau">'.$lePatient['poids'].'kg</td>
                                    </tr>  
                                    <tr>
                                        <th class="demitableau">Accès aux historiques de dispensations</th>
                                        <td class="demitableau">
                                            <a href="index.php?page=fichePatientDisp&num_inclusion=' .$lePatient['num_inclusion'].'" value="'.$lePatient['num_inclusion'].'">
                                            <input type="button" id="btFichePatient" name="btFichePatient" class="form-control" value="Fiche Patient"/>
                                        </td>
                                    </tr>   
                                    <tr>
                                        <th class="demitableau">Date du prochain rendez-vous</th>
                                        <td class="demitableau"></td>
                                    </tr>  
                                    <tr>
                                        <th class="demitableau">Statut du patient</th>
                                        <td class="demitableau"></td>
                                    </tr>
                            </table>
                            
                        </div>
                    </div>
                </div>
            </div>';
    
}

function viewFichePatientDisp($db){
    
    if(isset($_GET['num_inclusion']))
    {
        $num_inclusion=$_GET['num_inclusion'];
            
        $dispensation2 = new dispensation($db);
        $allDisp = $dispensation2->selectAllDateDisp($num_id_national);
    }    
    
    echo'<form class="form-group" method="POST" action="index.php?page=fichePatientDisp" enctype="multipart/form-data">
            <div class="container">
                <div class="mui--appbar-height">    
                </div>
                
                <div class="mui-container-fluid">
                    <br/>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="center">
                                <h2>Dispensations du patient n°</h2>
                            </div>
                            


                        </div>
                    </div>
                </div>
            </div>';
    
}
?>
