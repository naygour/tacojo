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

    if (isset($_POST['submit']))
    {
    }
    for($i=0;$i>3;$i++){
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
                <form method="POST" action="index.php?page=rapport">



                <table style="min-width : 100%" id="repDataTable1" class="table table-striped table-bordered table-list display">

               
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
     
                    </form>


                   </table>


              </div>
            </div>
        </div>
    </div>
    </div>
    </div>
';
    }
}


?>