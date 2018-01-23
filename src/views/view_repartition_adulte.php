<?php

function viewRepartitionAdulte($db)
{
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
                                    <h2>Repartition des patients par protocole - Adulte</h2>
                            </div>
                    </div>
             </div>

    Choisissez une année

    <form action="" method="post">


    <select id="selectAnnee" name="select">'
    ;
    
    for ($i = 2015; $i <= 2050; $i++)
    {
        echo "<option>$i</option>";
    }
        
    echo
    '
    </select>

    <input type="submit" name="submit" value="Valider" />
    </form>
    <br>
    ';

    if (isset($_POST['submit']))
    {
        echo '<script language="JavaScript">$("#selectAnnee").val('.$_POST['select'].')</script>';
    }
    else
    {
        ($_POST['select']= date('Y'));
    }

    echo'

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-9">
                    <h3 class="panel-title">Répartition des patients par protocole national de '. $_POST['select'].'</h3>
                  </div>
                </div>
              </div>
              <div class="panel-body">
            <form method="POST" action="index.php?page=repartition_adulte">
                <table style="min-width : 100%" id="repDataTable1" class="table table-striped table-bordered table-list display">';

            $repartitions = new repartition_adulte($db);
            $stats = $repartitions->selectAll();
            $nb = count($stats);

            if($nb>0)
            {
                echo
                '
                  <thead>
                    <tr>
                        <th>Protocole</th>
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

                    </tr>
                  </thead>

                  <tbody>
                ';

                $statsTmp = array();
                $mois = array(1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0, 6 => 0, 7 => 0, 8 => 0, 9 => 0, 10 => 0, 11 => 0, 12 => 0);

                foreach ($stats as $s)
                {
                    if (!empty($s['mois']) && !empty($s['nom_proto']))
                    { // Si $s['nom_proto'] et $s['mois'] différent de vide
                        if (!array_key_exists($s['nom_proto'], $statsTmp))
                        {
                            // Si le nom du protocole n'est pas present alors on l'initialise avec la liste des mois et on ajoute la valeur
                            $statsTmp[$s['nom_proto']] = $mois; // On associe au protocole, un tableau associatif contenant la liste des mois
                            $statsTmp[$s['nom_proto']][$s['mois']] = $s['nb_protocole']; // On initialise avec le nombre de protocole pour le mois concerné
                        }
                        else
                        {
                            // Sinon on ajoute la valeur au mois concerné
                            $statsTmp[$s['nom_proto']][$s['mois']] += $s['nb_protocole'];
                        }
                    }
                }
                foreach (array_keys($statsTmp) as $nomProtocole)
                {
                    echo '<tr><td class="bg-success">' . $nomProtocole . '</td>';
                    
                    foreach ($statsTmp[$nomProtocole] as $value)
                    {
                        echo '<td>' . $value . '</td>';
                    }
                    echo '</tr>';
                }
                
                echo
                '<td class="bg-danger">Total</td>';
                            
                    $totalMois = array(1=>0,2=>0,3=>0,4=>0,5=>0,6=>0,7=>0,8=>0,9=>0,10=>0,11=>0,12=>0);
                    // Initialisation des totaux à 0
                    foreach(array_keys($statsTmp) as $nomProtocole)
                    {
                        for($i=1;$i<=12;$i++)
                        {
                            $totalMois[$i] += $statsTmp[$nomProtocole][$i];
                        }
                    }
                    
                    for($i=1;$i<=12;$i++) echo '<td class="bg-danger">'.$totalMois[$i].'</td>';
                    
            }
            else
            {
                echo'<td>Il n\'y a pas de patient adulte avec un protocole atypique</td>';
            }
            

            
                   
                    echo
                    '
                  </tbody>
                 
                 </table>
                  </form>
              </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-9">
                    <h3 class="panel-title">Répartition des patients par protocole atypique de '. $_POST['select'].'</h3>
                  </div>
                </div>
              </div>
              <div class="panel-body">
              <form method="POST" action="index.php?page=repartition_adulte">
                <table sytle="min-width : 100%" id="repDataTable2" class="table table-striped table-bordered table-list display">';

            $repartitions2 = new repartition_adulte($db);
            $stats2 = $repartitions2->selectAll2();
            $nb2 = count($stats2);

            if($nb2>0)
            {
                echo'
				  
                  <thead>
                    <tr>
                        <th>Protocole</th>
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
                    </tr>
                  </thead>

                  <tbody>
                    ';


                    $statsTmp2 = array();
                    $mois2 = array(1=>0,2=>0,3=>0,4=>0,5=>0,6=>0,7=>0,8=>0,9=>0,10=>0,11=>0,12=>0);

                    foreach($stats2 as $s2)
                    {
                        if (!empty($s2['mois']) && !empty($s2['nom_proto']))
                        {
                            // Si $s['nom_proto'] et $s['mois'] différent de vide
                            if (!array_key_exists($s2['nom_proto'], $statsTmp2))
                            { // Si le nom du protocole n'est pas present alors on l'initialise avec la liste des mois et on ajoute la valeur
                                $statsTmp2[$s2['nom_proto']] = $mois2; // On associe au protocole, un tableau associatif contenant la liste des mois
                                $statsTmp2[$s2['nom_proto']][$s2['mois']] = $s2['nb_protocole']; // On initialise avec le nombre de protocole pour le mois concerné
                            }
                            else
                            {
                                // Sinon on ajoute la valeur au mois concerné
                                $statsTmp2[$s2['nom_proto']][$s2['mois']] += $s2['nb_protocole'];
                            }
                        }
                    }

                    foreach(array_keys($statsTmp2) as $nomProtocole2)
                    {
                        echo '<tr><td class="bg-success">'.$nomProtocole2.'</td>';
                        foreach($statsTmp2[$nomProtocole2] as $value2)
                        {
                            echo '<td>'.$value2.'</td>';
                        }

                        echo '</tr>';
                    }
                    
                    $totalMois2 = array(1=>0,2=>0,3=>0,4=>0,5=>0,6=>0,7=>0,8=>0,9=>0,10=>0,11=>0,12=>0); // Initialisation des totaux à 0
                    foreach(array_keys($statsTmp2) as $nomProtocole2)
                    {
                        for($i2=1;$i2<=12;$i2++)
                        {
                            $totalMois2[$i2] += $statsTmp2[$nomProtocole2][$i2];
                        }
                    }


                    echo
                    '
                        <tr>
                        <td class="bg-danger"> Total</td>';
                        for($i2=1;$i2<=12;$i2++) echo '<td class="bg-danger">'.$totalMois2[$i2].'</td>';
                        echo '
                      </tbody>
                      ';

                    }
                    else
                    {
                        echo'<td>Il n\'y a pas de patient adulte avec un protocole atypique</td>';
                        for($i2=1;$i2<=12;$i2++) $totalMois2[$i2]=0;
                    }
                    
                    echo
                    '
                                        </table>
                                        </form>
                                  </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default panel-table">
                        <div class="panel-heading">
                          <div class="row">
                            <div class="col col-xs-9">
                              <h3 class="panel-title">Total des protocoles national et atypique</h3>
                            </div>
                          </div>
                        </div>

                        <div class="panel-body">
                          <table sytle="min-width : 100%" id="repDataTable2" class="table table-striped table-bordered table-list display">
                            <thead>
                              <tr>
                                  <th>Protocole</th>
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
                              </tr>
                            </thead>';
                    
                    echo'<td class="bg-danger">Total</td>';
                    
                    for($i2=1;$i2<=12;$i2++)
                    {
                        $totalMois[$i2]=$totalMois[$i2]+$totalMois2[$i2];
                        echo '<td class="bg-danger">'.$totalMois[$i2].'</td>';
                    }
                    
                    echo'</table></div></div>
                    </div>
                    <br><br></div></div></div>';
}
?>
