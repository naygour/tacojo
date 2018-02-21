<?php

function viewListeProtocole($db)
{
echo'<meta http-equiv="content-type" content="text/html; charset=utf-8" />';
    echo
    '
        <!--<div id="content-wrapper">-->
        <div class="container">
        <div class="mui--appbar-height"></div>
        <div class="mui-container-fluid">
    ';

    if (isset($_POST['btProtocole']))
    {
        $nom_proto = $_POST['nom_proto'];
        $parametres['nom_proto']=array("type"=>"char","null"=>"no","label"=>"un nom de protocole","value"=>"$nom_proto") ;
        $resultat=verif($parametres) ;

        $idtype = $_POST['idtype'];
        $adulte = $_POST['adulte'];
        $enfant = $_POST['enfant'];
        $remarque = $_POST['remarque'];
        $cp=0;
        
        if ($resultat['code']==1)
        {
            echo '<div class="alert alert-danger" role="alert">'.$resultat['message'].' !</div>';
        }
        else
        {
            $protocole = new protocole($db);
            $liste =  $protocole->selectAll();
            foreach ($liste as $unProto)
            {
                if($unProto['nom_proto']==$nom_proto)
                {
                        $cp=1;
                        echo '<div class="alert alert-danger" role="alert"> Le protocole existe deja !</div>';
                }
            }
            
            if($cp==0)
            {
                $nb = $protocole->insertAll($nom_proto, $idtype, $adulte, $enfant, $remarque);
                if ($nb == 1)
                {
                        echo '<br><div class="alert center alert-success" role="alert">Vous avez ajouté un Protocole !</div>';
                }
                else
                {
                        echo '<br><div class="alert center alert-danger" role="alert">Impossible d\'ajouter un Protocole !</div>';
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
                <h2>Les Protocoles</h2>
            </div>
        </div>
        ';


        if (isset($_SESSION['droits']['11']))
        {
            echo
            '
            <div class="panel-body">
                <form method="POST" action="index.php?page=protocole" enctype="multipart/form-data" >

                        <div class="form-group">
                        <label>Nom</label>
                            <input class="form-control" type="text" name="nom_proto" id="nom_proto" placeholder="Nom du protocole" />
                        </div>

                        <div class="form-group">
                            <label>Adulte</label>

                            <select class="form-control" name="adulte" id="adulte" /><br>
                                <option value"adulte"> X </option>
                                <option value="   "> vide </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Enfant</label>

                            <select class="form-control" name="enfant" id="enfant" /><br>
                                <option value"enfant"> X </option>
                                <option value="   "> vide </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Remarque </label>
                            <input class="form-control" type="text" name="remarque" id="remarque" placeholder="Remarque" />
                        </div>

                        <div class="form-group">
                            <label></label>
                            <select class="form-control" id="idtype" name="idtype">';

                                $type = new Type_protocole($db);
                                $listeP = $type->selectAll();
                                foreach ($listeP as $unType)
                                {
                                    echo'<option value="'.$unType['id_type_protocole'].'">'.$unType['type_protocole'].'</option>';
                                }

                                echo'

                            </select>
                        </div>

                        <div class="form-group" style="float : right">
                            <button type="reset" class="btn btn-default">Réintialiser</button>
                            <button type="submit" class="btn btn-success" id="btProtocole" name="btProtocole">AJOUTER</button>
                        </div>
                    </form>
                </div>';
        }
	echo
        '
        </div>

        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-default panel-table">
                  <div class="panel-heading">
                    <div class="row">
                      <div class="col col-xs-6">
                        <h3 class="panel-title">Protocoles pré-enregistrés</h3>
                      </div>
                      <!--<div class="col col-xs-6 text-right">
                        <button type="button" class="btn btn-sm btn-primary btn-create">Create New</button>
                      </div>-->
                    </div>
                  </div>
                  <div class="panel-body">
                    <table id="repDataTable1" class="table table-striped table-bordered table-list display" style="min-width : 100%">';
        
                        $Protocole_nationaux = new protocole($db);
                        $liste_national = $Protocole_nationaux->selectProtoNA();
                        $nb = count($liste_national);

                        if($nb>0)
                        {
                            echo
                            '<form method="POST" action="index.php?page=protocole">
                            <thead>
                                <tr>
                                    <th>Protocole</th>
                                    <th>Adulte</th>
                                    <th>Enfant</th>
                                    <th>Remarque</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                            ';
                            
                            for($i=0;$i<$nb;$i++)
                            {
                                $unProtocoleN = $liste_national[$i];
                                echo '<tr>

                                <td><a href="index.php?page=modifProtocole&id_proto='. $unProtocoleN['id_proto'].'">'.$unProtocoleN['nom_proto'].'</a></td>
                                <td>'. $unProtocoleN['adulte'].'</td>
                                <td>'. $unProtocoleN['enfant'].'</td>
                                <td>'. $unProtocoleN['remarque'].'</td>';
                            }
                            
                            echo '</table>';
                        }
                        echo
                        '
                           </tbody>
                    </table>

                  </div>
                </div>

    </div></div></div><br><br>';




		echo
                '
                <div class="col-md-12">

                    <div class="panel panel-default panel-table">
                      <div class="panel-heading">
                        <div class="row">
                          <div class="col col-xs-6">
                            <h3 class="panel-title">Protocoles atypiques</h3>
                          </div>
                          <!--<div class="col col-xs-6 text-right">
                            <button type="button" class="btn btn-sm btn-primary btn-create">Create New</button>
                          </div>-->
                        </div>
                      </div>
                ';
                
                $Protocole_atypiques = new protocole($db);

                $liste_atypique = $Protocole_atypiques->selectProtoAt();
                $nb = count($liste_atypique);

                if($nb>0)
                {
                    echo
                    '
                        <form method="POST" action="index.php?page=protocole">
                            <div class="panel-body">
                              <table id="repDataTable1" class="table table-striped table-bordered table-list display">
                                <thead>
                                  <tr>
                                        <th>Protocole</th>
                                        <th>Adulte</th>
                                        <th>Enfant</th>
                                        <th>Remarque</th>
                                  </tr>
                                </thead>
                                <tbody>
                    ';
                    
                    for($i=0;$i<$nb;$i++)
                    {
                        $unProtocole = $liste_atypique[$i];
                        echo '<tr><td><a href="index.php?page=modifProtocole&id_proto='. $unProtocole['id_proto'].'">'.$unProtocole['nom_proto'].'</a></td>

                        <td>'. $unProtocole['adulte'].'</td>
                        <td>'. $unProtocole['enfant'].'</td>
                        <td>'. $unProtocole['remarque'].'</td>';
                    }

		}
                echo
                '
                    </tbody>
                </table>

              </div>
            </div>

</div></div></div>
                ';
}

function viewModifProtocole($db)
{
    echo'<meta http-equiv="content-type" content="text/html; charset=utf-8" />';
    echo
    '
    <!--<div id="content-wrapper">-->
        <div class="container">
        <div class="mui--appbar-height"></div>
        <div class="mui-container-fluid">
    ';

    if(isset($_POST['btSupprimer']))
    {
        $id_proto = $_POST['id_proto'];

        $protocole = new Protocole($db);
        $nb = $protocole->deleteOne($id_proto);
        
        if($nb!=1)
        {
            echo
            '
                <br><div class="well center alert alert-danger" role="alert">Erreur de Suppression ! <br> La page s\'acrualisera d\'ici quelques secondes !</div>
            ';
        }
        else
        {
            echo
            '
                <br><div class="well center alert alert-success" role="alert">Suppression effectuée ! <br> La page s\'acrualisera d\'ici quelques secondes !</div>';
                echo "<script>window.location.replace(\"index.php?page=protocole\")</script>";
        }
    }
    
    if(isset($_POST['btModifier']))
    {
        $id_proto           = $_POST['id_proto'];
        $nom_proto          = $_POST['nom_proto'];
        $type_protocole     = $_POST['type_protocole'];
        $adulte             = $_POST['adulte'];
        $enfant             = $_POST['enfant'];
        $remarque           = $_POST['remarque'];

        $protocole          = new Protocole($db);

        $nb = $protocole->updateAll($id_proto,$nom_proto, $type_protocole, $adulte, $enfant, $remarque);


        if($nb!=1)
        {
                echo '<br><div class="center alert alert-danger" role="alert">Erreur de Modification! <br> La page s\'acrualisera d\'ici quelques secondes !</div>';
        }
        else
        {
            echo '<br><div class="center alert alert-success" role="alert">Modification effectuée ! <br> La page s\'acrualisera d\'ici quelques secondes !</div>';
            echo "<script>window.location.replace(\"index.php?page=protocole\")</script>";
        }
    }


    if(isset($_GET['id_proto']))
    {
        $id_proto   = $_GET['id_proto'];
        $protocole  = new Protocole($db);

        $uneListe=$protocole->selectOne($id_proto); //selectOne renvoie la valeur false si il n'a pas trouver de Produit

        if($uneListe!=false)
        {
            echo'
            <div class="col-md-1"></div>

              <div class="col-md-10">
              <br>

                        <form class="form-group" method="POST" action="index.php?page=modifProtocole" enctype="multipart/form-data">

                          <div class="panel panel-default">

                            <div class="panel-heading">

                              <div class="panel-title">

                                <div class="center">

                                  <h3>Modification d\'un protocole</h3>

                                </div>

                              </div>

                            </div>

                            <div class="panel-body">

                              <input type="hidden" value="'.$id_proto.'" name="id_proto" id="id_proto"/>

                              <label>Nom du protocole </label>
                              <input class="form-control" type="text" name="nom_proto" id="nom_proto" value="'.$uneListe['nom_proto'].'"/><br>

                              <label>Adulte</label>
                              <input class="form-control" type="text" name="adulte" id="adulte" value="'.$uneListe['adulte'].'"/><br>

                              <label>Enfant</label>
                              <input class="form-control" type="text" name="enfant" id="enfant" value="'.$uneListe['enfant'].'"/><br>

                              <label>Remarque</label>
                              <input class="form-control" type="text" name="remarque" id="remarque" value="'.$uneListe['remarque'].'"/><br>

                              <label>Type de protocole</label>
                              <select class="form-control" id="type_protocole" name="type_protocole">';

                            $type = new Type_protocole($db);
                            $listeP = $type->selectAll();

                            foreach ($listeP as $unType)
                            {
                                if ($unType['id_type_protocole'] == $uneListe['type_protocole'])
                                {
                                  echo'<option selected="selected" value="'.$unType['id_type_protocole'].'">'.$unType['type_protocole'].'</option>';
                                }
                                else
                                {
                                  echo'<option value="'.$unType['id_type_protocole'].'">'.$unType['type_protocole'].'</option>';
                                }
                            }
                            
                            echo'
                              </select>
                              <br><br>

                              <div class="pull-right">

                                <button type="submit" class="btn btn-warning" id="btModifier" name="btModifier">Modifier</button>

                                <button type="submit" class="btn btn-danger" id="btSupprimer" name="btSupprimer">Supprimer</button>
                              </div>

                            </div>

                          </div>

                        </form>

                      </div>

                    <div class="col-md-1"></div>';

                }
                else
                {
                    echo'Mauvaise référence';
                }

    }
    
    echo
    '
        </div>
    </div>';
}
?>
