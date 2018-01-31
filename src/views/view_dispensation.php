<?php
function viewAjouterDispensation($db)
{
    echo'<meta http-equiv="content-type" content="text/html; charset=utf-8" />';
    echo
    '
        <!--<div id="content-wrapper">-->
        <div class="container">
        <div class="mui--appbar-height"></div>
        <div class="mui-container-fluid">
    ';

    if (isset($_POST['btPatient']))
    {
        $num_id_national = $_POST['num_id_national'];
        //var_dump($num_id_national);
        //$num_inclusion = $_POST['num_inclusion'];

        $patient = new patient($db); 
        $unPatient = $patient->selectOne2($num_id_national);
        echo' <div class= "panel-heading">';
        if(count($unPatient)!=1)
        {
            echo'<br><div class="well center alert alert-success" role="alert">'
            . '     <strong>Patient trouvé n°'.$unPatient['num_id_national'].'</strong><br/> Pour voir ses dispensations <a href="index.php?page=detail&id_patient=' . $unPatient['id_patient'] . '">cliquez ici</a> !'
                    .'<br/>Pour ajouter une dispensation <a href="index.php?page=ajouterDispensationPourLePatient&id_patient=' . $unPatient['id_patient'].'">cliquez ici</a></div>';
            echo '';
        }
        else 
        {
            echo'<br><div class="well center alert alert-danger" role="alert">Le patient que vous avez inséré n\'existe pas !</div>
                <script>$(".well").fadeTo(5000, 200).slideUp(500);</script>';
        }
        echo'</div>';
    }

    $patients = new patient($db);
    $listePatients = $patients->selectAll();
    
    echo
    ' <br>
        <div class="panel panel-default">
            <div class="center">
                <h2>Ajout d\'une dispensation</h2>
            </div>

            <div class="panel-heading">
                <h3> Rechercher un patient </h3>
            </div>

            <div class="panel-body">
		<form class="form-group" method="POST" action="index.php?page=ajout_dispensation" enctype="multipart/form-data" >
                    
                    <div class="col-md-12 ui-widget">
                      <label for="num_id_national">Numéro d\'id national</label>
                     
                      <select class="form-control" name="num_id_national" id="num_id_national">
                      
                       ';
                        
                       foreach($listePatients as $unP)
                       {
                           echo
                           '<option value="'.$unP['num_id_national'].'">
                               '.$unP['num_id_national'].'
                           </option>';
                       }
    
                       echo
                        '
                      
                      </select>

                    </div>


                    <!--<div class="col-md-12">
                        <label>Numéro inclusion</label>
                        <input class="form-control" type="text" name="num_inclusion" id="num_inclusion" placeholder="Numéro d\'inclusion" /><br>

                    </div>-->

                    
                    <div class="col-md-12" style="padding-top : 10px">
                        <div class="center">
                            <button style="float : right" type="submit" class="btn btn-success" id="btPatient" On name="btPatient">Rechercher...</button>
                        </div>
                    </div>

		</form>
            </div>
	</div>
    ';

    echo'</div></div>';
    
}

    
function ajouterDispensationPourLePatient($db)
{
    
    echo'<meta http-equiv="content-type" content="text/html; charset=utf-8" />';
    echo
    '
        <!--<div id="content-wrapper">-->
        <div class="container">
        <div class="mui--appbar-height"></div>
        <div class="mui-container-fluid">
    ';

    if (isset($_POST['btAjoutDisp']))
    {
        $id_patient = $_POST['id_patient'];
        $etat_dispensation = $_POST['etat_dispensation'];
        $date_dispensation = $_POST['date_dispensation'];
        $date_debut_traitement = $_POST['date_debut_traitement'];
        $nb_jours_traitement = $_POST['nb_jours_traitement'];
        $date_fin_traitement = $_POST['date_fin_traitement'];
        $rdv = $_POST['rdv'];
        $poids = $_POST['poids'];
        $observations = $_POST['observations'];
        
        $dispensations = new dispensation($db);
        
        $nb = $dispensations->insertAll( $id_patient, $etat_dispensation, $date_dispensation, $date_debut_traitement, $nb_jours_traitement, $date_fin_traitement, $rdv, $poids, $observations);
           
        if($nb!=1)
        {
            echo
            '
            <div class="alert alert-danger" role="alert">
                <strong>Erreur SQL</strong>.
            </div>
            ';
        }
        else
        {
            echo
            '
            <div class="alert alert-success" role="alert">
                <strong>Ajout réussi</strong>.
            </div>
            ';
        }
    }
    
    $id_patient = $_GET['id_patient'];
    
    $patients = new Patient($db);
    
    $lePatient = $patients->selectId($id_patient);
    
    $etats = new Etat_dispensation($db);
    
    $lesEtats = $etats->selectAll();
    
    
    echo
    ' <br>
        <div class="panel panel-default">
            <div class="center">
                <h2>Ajout d\'une dispensation pour le patient n°'.$lePatient['num_id_national'].'</h2>
            </div>

            <div class="panel-heading">
                <h3> Informations sur la dispensation</h3>
            </div>

            <div class="panel-body">
            
		<form class="form-group" method="POST" action="index.php?page=ajouterDispensationPourLePatient&id_patient='.$id_patient.'" enctype="multipart/form-data" >
                    
                    <div class="col-md-12 ui-widget">
                    
                        <label>N° inclusion du patient</label>
                        <input class="form-control" type="text" value="'.$lePatient['num_inclusion'].'" disabled/>
                        <input class="form-control" type="hidden" name="num_inclusion" id="num_inclusion" value="'.$lePatient['num_inclusion'].'" />

                        <br>

                        <label for="etat_dispensation">Etat de la dispensation</label>
                        <select class="form-control" name="etat_dispensation" id="etat_dispensation">
                        ';

                        foreach($lesEtats as $unEtat)
                        {
                            echo
                            '
                                <option value="'.$unEtat['id_etat_dispen'].'">'.utf8_encode($unEtat['nom_etat_dispen']).'</options>
                            '
                            ;

                        }
                        
                        $randJours = rand(1,15);
                        
                        echo
                        '
                        </select>

                        <br>

                        <label>Date de la dispensation</label>
                        <input name="date_dispensation" class="datepicker form-control" type="text" placeholder="jj-mm-aaaa"/>
                    
                        <br>
                        
                        <label>Date début du traitement</label>
                        <input name="date_debut_traitement" class="datepicker form-control" type="text" placeholder="jj-mm-aaaa"/>

                        <br>
                        
                        <label>Date fin du traitement</label>
                        <input name="date_fin_traitement" class="datepicker form-control" type="text" placeholder="jj-mm-aaaa"/>

                        <br>

                        <label>Nombre de jour pour le traitement</label>
                        <input id="nb_jours_traitement" name="nb_jours_traitement" class="form-control" type="number" min="0" placeholder="'.$randJours.'"/>

                        <br>
                        
                        <label>Date du rendez-vous</label>
                        <input id="rdv" name="rdv" class="datepicker form-control" type="text" placeholder="jj-mm-aaaa"/>
                        
                        <br>

                        <label>Poids du patient</label>
                        <input id="poids" name="poids" class="form-control" type="number" min="0" placeholder="50"/>

                        <br>
                       
                        <label>Observations</label>
                        <textarea maxlength="255" id="textarea" name="observations" class="form-control" placeholder="255 caractères maximum..."></textarea>
                        <div id="count" style="color : #bfbfbf"></div>
                    </div>


                    
                    <div class="col-md-12" style="padding-top : 10px">
                        <div class="center">
                            <button style="float : right" type="submit" class="btn btn-success" id="btAjoutDisp" name="btAjoutDisp">AJOUTER</button>
                            <button style="float : right" type="reset" class="btn btn-default">Réinitialiser</button>
                        </div>
                    </div>

		</form>
            </div>
	</div>
    ';

    echo'</div></div>';
    
}    
    
    
    
function viewListDispensation($db)
{
        echo'
	<!--<div id="content-wrapper">-->
        <div class="container">
        <div class="mui--appbar-height"></div>
        <div class="mui-container-fluid">

            <br>
            
<div class="panel panel-default">
		<div class="panel-heading">
			<div class="center">
				<h2>Liste des dispensations</h2>
			</div>
		</div>
	</div>

            <div class="row">
		<div class="col-md-12">
                
                    <div class="panel panel-default panel-table">
                      <div class="panel-heading">
                        <div class="row">
                          <div class="col col-xs-6">
                            <h3 class="panel-title">Liste des dispensations</h3>
                          </div>
                          <!--<div class="col col-xs-6 text-right">
                            <button type="button" class="btn btn-sm btn-primary btn-create">Create New</button>
                          </div>-->
                        </div>
                      </div>

			<div class="panel-body">
                        <div style="overflow:auto;">
			    <table style="min-width : 100%" id="repDataTable1" class="table table-striped table-bordered table-list display">';

                                $protocole = new protocole($db);
                                $listePro = $protocole->selectAll();

                                $profil_serologique = new profil_serologique($db);
                                $listePS = $profil_serologique->selectAll();

                                $type_protocole = new Type_protocole($db);
                                $listeTypeProto = $type_protocole->selectAll();

                                $ligne = new ligne($db);
                                $listeL = $ligne->selectAll();

                                $patient = new patient($db);
                                $listeP = $patient->selectAll();

                                $nb = count($listeP);
                                
                                $formatDate = "d/m/Y";

				if($nb>0)
                                {
                                    echo
                                    '
			                <thead>
			                    <tr>
			                    	<th>Numéro d\'id national</th>
			                        <th>Numéro d\'inclusion</th>
			                        <th>Profil Sérologique</th>
			                        <th>Sexe</th>
			                        <th>Date de naissance</th>
			                        <th>Ligne</th>
			                        <th>Date Inc/Chan</th>
			                        <th>Poids</th>
			                    </tr>
			                </thead>
                                        </div>
                                        <tbody>
                                        ';
                                        foreach ($listeP as $unPatient)
                                        {
                                            foreach ($listePS as $unProfilSero)
                                            {
                                                if($unPatient['profil_serologique'] == $unProfilSero['id_profil'])
                                                {
                                                    foreach ($listePro as $unProto)
                                                    {
                                                        if ($unPatient['protocole'] == $unProto['id_proto'])
                                                        {
                                                            foreach ($listeTypeProto as $unTypeProto)
                                                            {
                                                                if ($unProto['type_protocole'] == $unTypeProto['id_type_protocole'])
                                                                {
                                                                    foreach ($listeL as $uneLigne)
                                                                    {
                                                                        if ($unPatient['ligne'] == $uneLigne['id_ligne'])
                                                                        {
                                                                            $date_inclusion = new Patient($db);
                                                                            $DateInc = $date_inclusion->selectOne($unPatient['num_inclusion']);

                                                                            echo
                                                                            '
                                                                            <tr>
                                                                            
                                                                                <td><a href="index.php?page=detail&id_patient='.$unPatient['id_patient'].'">'.$unPatient['num_id_national'].'</a></td>
                                                                                <td>'.$unPatient['num_inclusion'].'</td>
                                                                                <td>'.$unProfilSero['nom_profil'].'</td>
                                                                                <td>'.$unPatient['sexe'].'</td>';
                                                                            
                                                                                $date=date_create($unPatient['date_de_naissance']);
                                                                                echo'<td>'.date_format($date,$formatDate).'</td>
                                                                                    
                                                                                <td>'.$uneLigne['nom_ligne'].'</td>
                                                                                <td>'.$DateInc[0].'</td>
                                                                                <td>'.$unPatient['poids'].'</td>
                                                                            </tr>
                                                                            ';
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                            echo
                                            '
                                                </tbody>
                                            
                                          </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    ';
                                        }
                                        echo'</table> ';                                       
                                }
    }
?>
