<?php

function viewRepartitionAdulte($db){

    echo'

<div id="content-wrapper">
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


   <select name="select">';
        for ($i = 2015; $i <= 2050; $i++) {
            echo "<option>$i</option>";
        } ?><? echo '
    </select>

    <input type="submit" name="submit" value="Valider" />
    </form>
    <br>';

    if (isset($_POST['submit'])) {

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
                    <h3 class="panel-title">Repartition des protocole nationaux de '. $_POST['select'].'</h3>
                  </div>
                </div>
              </div>
              <div class="panel-body">
                <table class="table table-striped table-bordered table-list">';





            $repartitions = new repartition_adulte($db);
            $stats = $repartitions->selectAll();
            $nb = count($stats);

            if($nb>0){
                echo'
				  <form method="POST" action="index.php?page=repartition_adulte">
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

                    </tr>
                  </thead>

                  <tbody>
                    ';

    foreach($stats as $s): ?>
        <tr>
            <td><?=$s['nom_proto']?></td>
            <td><?php if($s['annee']==''. $_POST['select'].'' && $s['mois']==1 && isset($s['nb_protocole'])){ echo $s['nb_protocole']; }else{ echo '0'; }  ?></td>
            <td><?php if($s['annee']==''. $_POST['select'].'' && $s['mois']==2 && isset($s['nb_protocole'])){ echo $s['nb_protocole']; }else{ echo '0'; }  ?></td>
            <td><?php if($s['annee']==''. $_POST['select'].'' && $s['mois']==3 && isset($s['nb_protocole'])){ echo $s['nb_protocole']; }else{ echo '0'; }  ?></td>
            <td><?php if($s['annee']==''. $_POST['select'].'' && $s['mois']==4 && isset($s['nb_protocole'])){ echo $s['nb_protocole']; }else{ echo '0'; }  ?></td>
            <td><?php if($s['annee']==''. $_POST['select'].'' && $s['mois']==5 && isset($s['nb_protocole'])){ echo $s['nb_protocole']; }else{ echo '0'; }  ?></td>
            <td><?php if($s['annee']==''. $_POST['select'].'' && $s['mois']==6 && isset($s['nb_protocole'])){ echo $s['nb_protocole']; }else{ echo '0'; }  ?></td>
            <td><?php if($s['annee']==''. $_POST['select'].'' && $s['mois']==7 && isset($s['nb_protocole'])){ echo $s['nb_protocole']; }else{ echo '0'; }  ?></td>
            <td><?php if($s['annee']==''. $_POST['select'].'' && $s['mois']==8 && isset($s['nb_protocole'])){ echo $s['nb_protocole']; }else{ echo '0'; }  ?></td>
            <td><?php if($s['annee']==''. $_POST['select'].'' && $s['mois']==9 && isset($s['nb_protocole'])){ echo $s['nb_protocole']; }else{ echo '0'; }  ?></td>
            <td><?php if($s['annee']==''. $_POST['select'].'' && $s['mois']==10 && isset($s['nb_protocole'])){ echo $s['nb_protocole']; }else{ echo '0'; }  ?></td>
            <td><?php if($s['annee']==''. $_POST['select'].'' && $s['mois']==11 && isset($s['nb_protocole'])){ echo $s['nb_protocole']; }else{ echo '0'; }  ?></td>
            <td><?php if($s['annee']==''. $_POST['select'].'' && $s['mois']==12 && isset($s['nb_protocole'])){ echo $s['nb_protocole']; }else{ echo '0'; }  ?></td>

        <?php
    endforeach ?>

    <?php


    echo '
                  </tbody>
                  </form>';


            }else{
                echo'<td>Il n\'y a pas de patient adulte avec un protocole national</td>';
            }
echo'
		         </table>
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
                    <h3 class="panel-title">Repartition des protocole atypique de '. $_POST['select'].'</h3>
                  </div>
                </div>
              </div>
              <div class="panel-body">
                <table class="table table-striped table-bordered table-list">';

            $repartitions2 = new repartition_adulte($db);
            $stats2 = $repartitions2->selectAll2();
            $nb2 = count($stats2);

            if($nb2>0){
                echo'
				  <form method="POST" action="index.php?page=repartition_adulte">
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
                    </tr>
                  </thead>

                  <tbody>
                    <tr>';

                foreach($stats2 as $s2): ?>
                    <tr>
                        <td><?=$s2['nom_proto']?></td>
                        <td><?php if($s2['annee']==''. $_POST['select'].'' && $s2['mois']==1 && isset($s2['nb_protocole'])){ echo $s2['nb_protocole']; }else{ echo '0'; }  ?></td>
                        <td><?php if($s2['annee']==''. $_POST['select'].'' && $s2['mois']==2 && isset($s2['nb_protocole'])){ echo $s2['nb_protocole']; }else{ echo '0'; }  ?></td>
                        <td><?php if($s2['annee']==''. $_POST['select'].'' && $s2['mois']==3 && isset($s2['nb_protocole'])){ echo $s2['nb_protocole']; }else{ echo '0'; }  ?></td>
                        <td><?php if($s2['annee']==''. $_POST['select'].'' && $s2['mois']==4 && isset($s2['nb_protocole'])){ echo $s2['nb_protocole']; }else{ echo '0'; }  ?></td>
                        <td><?php if($s2['annee']==''. $_POST['select'].'' && $s2['mois']==5 && isset($s2['nb_protocole'])){ echo $s2['nb_protocole']; }else{ echo '0'; }  ?></td>
                        <td><?php if($s2['annee']==''. $_POST['select'].'' && $s2['mois']==6 && isset($s2['nb_protocole'])){ echo $s2['nb_protocole']; }else{ echo '0'; }  ?></td>
                        <td><?php if($s2['annee']==''. $_POST['select'].'' && $s2['mois']==7 && isset($s2['nb_protocole'])){ echo $s2['nb_protocole']; }else{ echo '0'; }  ?></td>
                        <td><?php if($s2['annee']==''. $_POST['select'].'' && $s2['mois']==8 && isset($s2['nb_protocole'])){ echo $s2['nb_protocole']; }else{ echo '0'; }  ?></td>
                        <td><?php if($s2['annee']==''. $_POST['select'].'' && $s2['mois']==9 && isset($s2['nb_protocole'])){ echo $s2['nb_protocole']; }else{ echo '0'; }  ?></td>
                        <td><?php if($s2['annee']==''. $_POST['select'].'' && $s2['mois']==10 && isset($s2['nb_protocole'])){ echo $s2['nb_protocole']; }else{ echo '0'; }  ?></td>
                        <td><?php if($s2['annee']==''. $_POST['select'].'' && $s2['mois']==11 && isset($s2['nb_protocole'])){ echo $s2['nb_protocole']; }else{ echo '0'; }  ?></td>
                        <td><?php if($s2['annee']==''. $_POST['select'].'' && $s2['mois']==12 && isset($s2['nb_protocole'])){ echo $s2['nb_protocole']; }else{ echo '0'; }  ?></td>
                        <td></td>
                    </tr>

                    <?php
                endforeach ?>
                <?php

                echo '
                  </tbody>
                  </form>';

            }else{
                echo'<td>Il n\'y a pas de patient adulte avec un protocole atypique</td>';
            }
echo'
		         </table>
              </div>
            </div>
        </div>
    </div>

</div>
</div>
<br><br>';


}

?>