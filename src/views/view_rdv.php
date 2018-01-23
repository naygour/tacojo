<?php

function listeRDV($db)
{
    $date=0;
    
    echo
    '
    <!--<div id="content-wrapper">-->
        <div class="container">
        <div class="mui--appbar-height"></div>
        <div class="mui-container-fluid">';

    if (isset($_POST['btVoir']))
    {
        $date= $_POST['date_rdv'];
    }

    echo'
    <br>
        <div class="panel panel-default">
		<div class="panel-heading">
			<div class="center">
				<h2>Liste des rendez-vous</h2>
			</div>
		</div>
	</div>
        
      <form class="form-group" method="POST" action="index.php?page=listeRDV" enctype="multipart/form-data" >
      <div class="row">
          <div class="col-md-12">
          
                <div class="panel panel-default panel-table">
                <div class="panel-heading">
                  <div class="row">
                    <div class="col col-xs-6">
                      <h3 class="panel-title">Liste des rendez-vous</h3>
                    </div>
                    <!--<div class="col col-xs-6 text-right">
                      <button type="button" class="btn btn-sm btn-primary btn-create">Create New</button>
                    </div>-->
                  </div>
                </div>
              
                <div class="panel-body">
                  <table style="min-width : 100%" id="repDataTable1" class="table table-striped table-bordered table-list display">';

    $patient = new patient($db);
    $listeP = $patient->selectAll();
    $nb = count($listeP);

    if($nb>0)
    {
        echo
        '
              <thead>
                <tr>
                    <th>Numéro d\'id national</th>
                    <th>Numéro d\'inclusion</th>
                    <th>Date de rendez-vous</th>
                </tr>
              </thead>
              
              <tbody>';
        
            foreach ($listeP as $unPatient)
            {
                $unRdv  = new dispensation($db);
                $maxRdv = $unRdv->selectEtat($unPatient['num_inclusion']);

                if($date==0)
                {
                    $rdv = new dispensation($db);
                    $listeRDV = $rdv->selectRDV($maxRdv['id_dispensation']);

                    echo
                    '
                    <tr>
                        <td>'.$unPatient['num_id_national'].'</td>
                        <td>'.$unPatient['num_inclusion'].'</td>
                        <td>'.$listeRDV['rdv'].'</td>
                    </tr>
                    ';

                }
                else
                {
                    $rdv        = new dispensation($db);
                    $listeRDV   = $rdv->selectRDV($maxRdv['id_dispensation']);
                    
                    if($listeRDV['rdv']==$date)
                    {
                        echo
                        '
                        <tr>
                            <td>'.$unPatient['num_id_national'].'</td>
                            <td>'.$unPatient['num_inclusion'].'</td>
                            <td>'.$listeRDV['rdv'].'</td>
                        <:tr>
                        ';
                    }
                }
            }
    }

    echo
    '
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
                


             
    </div>
            


    </div>
    
    </div>
    </form>
    </div>
    </div>
    ';
}
?>
