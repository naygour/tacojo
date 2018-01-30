<?php

function viewRapport($db)
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
                        <h2>RAPPORT MENSUEL - PEC - PATIENTS SOUS ARV <1 an </h2>
                    </div>
                </div>
            </div>

            Choisissez une année

            <form action="" method="post">


            <select id="selectAnnee" name="select">';
            $mois = ['Janvier','Février', 'Mars' , 'Avril','Mai','Juin','Juillet','Aout','Septembre','Octobre','Novembre','Décembre'];
            for ($i = 2016; $i <= 2050; $i++)
            {
                for ($j=1; $j <13 ; $j++)
                {
                    echo '<option value = '.$i.'-'.$j.'-01 >'.$mois[$j-1].'/'.$i.' </option>';
                }
            }
            echo
            '
            </select>

    <input type="submit" name="submit" value="Valider" />
    </form>
    <br>';

    if (isset($_POST['submit']))
    {
                echo '<script language="JavaScript">$("#selectAnnee").val('.$_POST['select'].')</script>';
                $test    = new rapport($db);
                $lesInscritsAvantHomme   = $test->selectInscritAvant("M",$_POST['select']);   // Tout les hommes inscrits avant ce mois
                $LesInscritsAvantFemme   = $test->selectInscritAvant("F",$_POST['select']);
                $mois                    = $test->selectMois($_POST['select']);
                $annee                  = $test->selectAnnee($_POST['select']);
                $leMoisApres = "".$annee['annee']."-".($mois['mois']+1)."-01"; // On récupere la date du mois d'apres 
                $lesInscritsPendantHomme = $test->selectInscritAvant("M",$leMoisApres); // On calcule avant ce mois pour ensuite soustraire a tout les mois d'avant
                $lesInscritsPendantFemme = $test->selectInscritAvant("F",$leMoisApres);
                $lesInscritsPendantFemme = count($lesInscritsPendantFemme) - count($LesInscritsAvantFemme);
                $lesInscritsPendantHomme = count($lesInscritsPendantHomme) - count($lesInscritsAvantHomme);
                
    }
    else
    {
        ($_POST['select']= date('Y'));
    }

    echo
    '
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
              <div class="panhttp://172.16.207.74/Senegal/Senegal/tacojo/index.php?page=rapport#el-body">
                <form method="POST" action="index.php?page=rapport">



                <table style="min-width : 100%" id="repDataTable1" class="table table-striped table-bordered table-list display">';

                $rapport    = new rapport($db);
                $stats      = $rapport->selectAllExceptId();
                $nb         = count($stats);
                
                
                if($nb>0)
                {
                    echo
                    '
                      <thead>
                        <tr>
                            <th>Age</th>
                            <th>Sexe</th>
                            <th>Nombre total de patients qui ont été suivis sous ARV dans le site depuis le début jusqu’au mois précédent</th>
                            <thNombre total de patients sous ARV régulièrement suivis jusqu\'au mois précédent</th>
                            <th>Nombre de nouveaux patients mis sous ARV durant le mois  </th>
                            <th>Nombre de patients sous ARV décédés et enregistrés durant le mois  </th>
                            <th>Nombre de patients sous ARV déclarés perdus de vue durant le mois </th>
                            <th>Nombre de patients sous ARV perdus de vue et revenus durant le mois</th>
                            <th>Nombre de patients sous ARV transférés dans le site (TE) durant le mois </th>
                            <th>Nombre de patients sous ARV transférés vers un autre site (TA) durant le mois  </th>
                            <th> Nombre total de patients sous ARV régulèrement suivis (file active sous ARV) </th>
                            </tr>
                      </thead>
      
                    <tr>
                    <td rowspan="2"> <1 an </td>
                    <td>M</td>
                    <td>'.count($lesInscritsAvantHomme).'</td>
                    <td>'.$lesInscritsPendantHomme.'</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    
                    <td></td>
                    
                    <td></td>
                    </tr>
                    
                    <tr>
                    <td>F</td>
                    <td>'.count($LesInscritsAvantFemme).'</td>
                    <td>'.$lesInscritsPendantFemme.'</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    
                    </tr>
                    
                        
                      <tbody>
                    ';

                    
                }
                
                echo '
                    <tr>
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
    </div>http://172.16.207.74/Senegal/Senegal/tacojo/index.php?page=rapport#
';
}
?>
