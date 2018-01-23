<?php

function viewRapport2($db){

    echo'

<div id="content-wrapper">
      <div class="mui--appbar-height"></div>
      <div class="mui-container-fluid">

      <br>
      <div class="panel panel-default">
		<div class="panel-heading">
			<div class="center">
				<h2>RAPPORT MENSUEL - PEC - PATIENTS SOUS ARV 1-4 ans </h2>
			</div>
		</div>
	 </div>

    Choisissez une année

   <form action="" method="post">


   <select id="selectAnnee" name="select">';
        for ($i = 2015; $i <= 2050; $i++) {
          for ($j=1; $j <13 ; $j++) {
            echo '<option>['.$j.']'.$i.' </option>';
          }

        }  echo '
    </select>

    <input type="submit" name="submit" value="Valider" />
    </form>
    <br>';

    if (isset($_POST['submit'])) {
        echo '<script language="JavaScript">$("#selectAnnee").val('.$_POST['select'].')</script>';
    }else{
        ($_POST['select']= date('Y'));
    }

    echo'

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-9">
                    <h3 class="panel-title">Présentation des rapports de '. $_POST['select'].'</h3>
                  </div>
                </div>
              </div>
              <div class="panel-body">
                <form method="POST" action="index.php?page=rapport">



                <table id="repDataTable1" class="table table-striped table-bordered table-list display" style="min-width : 100%">';

            $rapport = new rapport2($db);
            $stats = $rapport->selectAll();
            //var_dump($stats);
            $nb = count($stats);
            if($nb>0) {
                echo '

                  <thead>
                    <tr>
                        <th>  </th>
                        <th>Age</th>
                        <th>Sexe</th>
                        <th>Nombre total de patients sous ARV régulièrement suivis jusqu\'au mois précédent</th>
						            <th>Nombre de nouveaux patients mis sous ARV durant le mois</th>
						            <th>Nombre de patients sous ARV décédés et enregistrés durant le mois</th>
						            <th>Nombre de patients sous ARV déclarés perdus de vue durant le mois </th>
                        <th>Nombre de patients sous ARV perdus de vue et revenus durant le mois</th>
                        <th>Nombre de patients sous ARV transférés dans le site (TE) durant le mois</th>
						            <th>Nombre de patients sous ARV transférés vers un autre site (TA) durant le mois </th>
						            <th>Nombre total de patients sous ARV régulèrement suivis (file active sous ARV) </th>
                    </tr>
                  </thead>

                  <tbody>';


                $statsTmp = array();
/*
                $mois = array(1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0, 6 => 0, 7 => 0, 8 => 0, 9 => 0, 10 => 0, 11 => 0, 12 => 0);


                foreach ($stats as $s) {
                    if (!empty($s['mois']) && !empty($s['patients'])) { // Si $s['patients'] et $s['mois'] différent de vide
                        if (!array_key_exists($s['patients'], $statsTmp)) { // Si le patient n'est pas present alors on l'initialise avec la liste des mois et on ajoute la valeur
                            $statsTmp[$s['patients']] = $mois; // On associe au patient, un tableau associatif contenant la liste des mois
                            $statsTmp[$s['patients']][$s['mois']] = $s['nb_patient']; // On initialise avec le nombre de patients pour le mois concerné
                        } else { // Sinon on ajoute la valeur au mois concerné
                            $statsTmp[$s['patients']][$s['mois']] += $s['nb_patient'];
                        }
                    }

                }*/

               echo '<tr><td class="bg-success"></td>';
        //     var_dump($stats);
                foreach ($stats as $value) {

                    $info=$value;
                  //  var_dump($value);
              $nb= count($info)/2;

                  //foreach($info as $uneinfo) {
                  for($i = 0; $i<$nb; $i++){
                    echo'<td>';
                    echo $info[$i];
                    echo'</td>';
                  }
                }
                echo '</tr>';
              //  echo $nb;
          /*      foreach (array_keys($stats) as $patients) {

                    var_dump($patients);
                }*/
              }
      echo '        <tr>
                    <td class="bg-danger">Total</td>';
                    $totalPatient = array(1=>0,2=>0,3=>0,4=>0,5=>0,6=>0,7=>0,8=>0,9=>0,10=>0); // Initialisation des totaux à 0
                    for($i=1;$i<=10;$i++) echo '<td class="bg-danger">'.$totalPatient[$i].'</td>';

                    echo '
                  </tbody>
                  </form>


                 </table>


              </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
'

 ?> <?php

}


?>
