<?php

function viewRepartitionLigne($db){
      
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
                        <h2>Répartition par ligne </h2>
                    </div>
                </div>
            </div>


            <form action="" method="post">';
    for($i=1;$i<4;$i++){
            
    $M_VIH1_0=0;$M_VIH2_0=0;$M_VIH3_0=0;
    $M_VIH1_1=0;$M_VIH2_1=0;$M_VIH3_1=0;
    $F_VIH1_0=0;$F_VIH2_0=0;$F_VIH3_0=0;
    $F_VIH1_1=0;$F_VIH2_1=0;$F_VIH3_1=0; 
    
    echo
    ' 
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-9">
                    <h3 class="panel-title">Ligne '. $i.'</h3>
                  </div>
                </div>
              </div>
              <div class="panhttp://172.16.207.74/Senegal/Senegal/tacojo/index.php?page=rapport#el-body">
                <form method="POST" action="index.php?page=repartition_ligne">';
                $test           = new Patient($db);
                $listePatient           = $test->selectAll();
                
                foreach ($listePatient as $unPatient) {
                    
                    $AgePatient           = $test->selectAge($unPatient['id_patient']);
                    $age = $AgePatient['Age'];
                    
                    if($unPatient['ligne']==$i){
                        if($age>0 && $age<5114){
                            if($unPatient['sexe']=='M'){
                                if($unPatient['profil_serologique']==1){
                                    $M_VIH1_0=$M_VIH1_0+1;
                                }
                                elseif($unPatient['profil_serologique']==2){
                                    $M_VIH2_0=$M_VIH2_0+1;
                                }
                                else{
                                    $M_VIH3_0=$M_VIH3_0+1;
                                }
                            }
                            else{
                                if($unPatient['profil_serologique']==1){
                                    $F_VIH1_0=$F_VIH1_0+1;
                                }
                                elseif($unPatient['profil_serologique']==2){
                                    $F_VIH2_0=$F_VIH2_0+1;
                                }
                                else{
                                    $F_VIH3_0=$F_VIH3_0+1;
                                }
                            }
                        }
                        elseif ($age >= 5114) {
                            if($unPatient['sexe']=='M'){
                                if($unPatient['profil_serologique']==1){
                                    $M_VIH1_1=$M_VIH1_1+1;
                                }
                                elseif($unPatient['profil_serologique']==2){
                                    $M_VIH2_1=$M_VIH2_1+1;
                                }
                                else{
                                    $M_VIH3_1=$M_VIH3_1+1;
                                }
                            }
                            else{
                                if($unPatient['profil_serologique']==1){
                                    $F_VIH1_1=$F_VIH1_1+1;
                                }
                                elseif($unPatient['profil_serologique']==2){
                                    $F_VIH2_1=$F_VIH2_1+1;
                                }
                                else{
                                    $F_VIH3_1=$F_VIH3_1+1;
                                }
                            }
                        
                        }
                    }
                    
                }
                
                


                echo'<table style="min-width : 100%" id="repDataTable1" class="table table-striped table-bordered table-list display">

              
                        <tr>
                            <th rowspan="3" class="Lignerouge"> Enfants 0 - 14 ans </th>
                            <th colspan="3" class="Lignerouge"> Garçon </th>
                            <th colspan="3" class="Lignerouge"> Fille </th>
                            <th colspan="3" class="Lignerouge"> Total </th>
                        </tr>
                        <tr>
                            <td> VIH 1  </td>
                            <td> VIH 2 </td> 
                            <td> VIH 1+2 </td>
                            <td> VIH 1 </td>
                            <td> VIH 2 </td>
                            <td> VIH 1+2 </td>
                            <td> VIH 1 </td>
                            <td> VIH 2  </td>
                            <td> VIH 1+2  </td>
                        </tr>
                        <tr>
                            <td>'.$M_VIH1_0.' </td>
                            <td> '.$M_VIH2_0.' </td> 
                            <td> '.$M_VIH3_0.' </td>
                            <td> '.$F_VIH1_0.' </td>
                            <td> '.$F_VIH2_0.' </td>
                            <td>'.$F_VIH3_0.' </td>
                            <td>'.($M_VIH1_0 + $F_VIH1_0).'</td>
                            <td> '.($M_VIH2_0 + $F_VIH2_0).' </td>
                            <td> '.($M_VIH3_0 + $F_VIH3_0).' </td>
                        </tr>

                        <tr>
                            <th rowspan="3" class="Lignerouge"> Adultes > 14 ans </th>
                            <th colspan="3" class="Lignerouge"> Garçon </th>
                            <th colspan="3" class="Lignerouge"> Fille </th>
                            <th colspan="3" class="Lignerouge"> Total </th>
                        </tr>
                        <tr>
                            <td> VIH 1  </td>
                            <td> VIH 2 </td> 
                            <td> VIH 1+2 </td>
                            <td> VIH 1 </td>
                            <td> VIH 2 </td>
                            <td> VIH 1+2 </td>
                            <td> VIH 1 </td>
                            <td> VIH 2  </td>
                            <td> VIH 1+2  </td>
                        </tr>
                        <tr>
                            <td>'.$M_VIH1_1.' </td>
                            <td> '.$M_VIH2_1.' </td> 
                            <td> '.$M_VIH3_1.' </td>
                            <td> '.$F_VIH1_1.' </td>
                            <td> '.$F_VIH2_1.' </td>
                            <td>'.$F_VIH3_1.' </td>
                            <td>'.($M_VIH1_1 + $F_VIH1_1).'</td>
                            <td> '.($M_VIH2_1 + $F_VIH2_1).' </td>
                            <td> '.($M_VIH3_1 + $F_VIH3_1).' </td>
                        </tr>
     
                    </form>


                   </table>


              </div>
            </div>
        </div>
    </div>
    
';
    }
}


?>