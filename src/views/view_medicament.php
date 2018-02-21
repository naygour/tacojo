<?php
//FONCTION AFFICHAGE LISTE ACRONYMES
function viewMedicament($db)
{
    //Instancier une variable booléenne qui va permettre de tester si l'ajout d'un medicament est valable ou pas
    $cp=0;

    echo
    '
    <!--<div id="content-wrapper">-->
        <div class="container">
        <div class="mui--appbar-height"></div>
        <div class="mui-container-fluid">
    ';
    
    //Si on appuie sur le bouton pour ajouter un médicament
    if(isset($_POST['btacronyme']))
    {
        //On récupère les variables nécessaires à l'ajout d'un nouvel acronyme
        $acronyme_acronyme = $_POST['acronyme_acronyme'];
        $nom_acronyme = $_POST['nom_acronyme'];

        //On instancie la classe medicament pour en utiliser la focntion qui retournera la liste de tous les medicaments
        $acronyme = new acronyme($db);
        $liste =  $acronyme->selectAll();

        //Pour chaque medicamennt se trouvant dans la liste des mdicaments
        foreach ($liste as $unAcronyme)
        {
            //Si l'acronyme du medicament entré par l'utilisateur correspond à l'acronyme d'un médicament de la liste
            if($acronyme_acronyme==$unAcronyme['acronyme_medicament'])
            {
                //On affiche un message d'erreur et on mets cp à 1
                echo '<br><div class="alert center alert-danger" role="alert">L\'acronyme existe déja !!!</div>';
                $cp=1;
            }
            //Si le nom d'un medicament entré par l'utilisateur corresponds à l'acronyme d'un médicament de la liste
            elseif($nom_acronyme==$unAcronyme['nom_medicament'])
            {
                //On affiche un message d'erreur et on mets cp à 1
                echo '<br><div class="alert center alert-danger" role="alert">La Signification existe déja !!!</div>';
                $cp=1;
            }
        }

        //Si cp est à 0, donc si le nom et l'acronyme entrés ne sont pasz déjà présents dans la liste
        if($cp==0)
        {
            //On insère les valeurs entrées dans la bgase de données
            $nb = $acronyme->insertAll($acronyme_acronyme, $nom_acronyme);

            //Si la RQ s'est déroulée correctement, on affiche
            if ($nb == 1)
            {
                echo '<br><div class="alert center alert-success" role="alert">Vous avez ajouté un acronyme !</div>';
            }
            //Sinon, on affiche
            else
            {
                echo '<br><div class="alert center alert-danger" role="alert">Impossible d\'ajouter un acronyme !</div>';
            }
        }

    }

    //On instancie la classe médicament et on récupère la liste de tous les médicaments ainsi que le nombre de médicaments dans la liste
    $acronyme = new acronyme($db);
    $listeAcronyme = $acronyme->selectAll();
    $nb = count($listeAcronyme);
    echo
    '
        <br>
        <div class="panel panel-default">
                <div class="panel-heading">

                <div class="center">
                        <h2>Acronymes des antirétroviraux</h2>
                </div>
        </div>
    ';

    //Si la personne actuellement connectées a le droit n°11
    if (isset($_SESSION['droits']['11']))
    {
        //On affiche un formulaire pour ajouter un acronyme
        echo
        '
        <form class="form-inline" method="POST" action="index.php?page=acronyme" enctype="multipart/form-data" >
            <div class="panel-body">
                <div class="form-group">

                        <input class="form-control" type="text" name="acronyme_acronyme" id="acronyme_acronyme" placeholder="Acronyme" />

                        <input class="form-control" type="text" name="nom_acronyme" id="nom_acronyme" placeholder="Signification" />

                        <button type="reset" class="btn btn-default" >Réinitialiser</button>
                        <button type="submit" class="btn btn-success" id="btacronyme" name="btacronyme">AJOUTER</button>
                        <br />

                </div>
            </div>
        </form>
        ';
    }

    //Si la liste de médicaments n'est pas vide
    if($nb>0)
    {
        //On affiche un tableau avec les informations de chaque médicaments
        echo
        '
        <table id="repDataTable1" class="table table-striped table-bordered table-list display" style="min-width : 100%">
            <form method="POST" action="index.php?page=acronyme">
                <thead>
                    <tr>
                        <th>Acronyme</th>
                        <th>Signification</th>

                    </tr>

                    </thead>
                        <tbody>
                        ';

                        foreach($listeAcronyme as $unAcronyme)
                        {
                            echo
                            '
                                <tr>
                                    <td><a href="index.php?page=modifAcronyme&id_acronyme='. $unAcronyme['id_medicament'].'">'. $unAcronyme['acronyme_medicament'].'</a></td>
                                    <td>'. $unAcronyme['nom_medicament'].'</td>
                                </tr>
                            ';
                        }
                        
                        echo
                        '
                        </tbody>
                    </table>
                        ';
    }
    echo'
            </div>
        </div>
    </div>
    ';
}


function viewModifMedicament($db)
{
    echo
    '
    <!--<div id="content-wrapper">-->
        <div class="container">
        <div class="mui--appbar-height"></div>
        <div class="mui-container-fluid">
    ';

    //Si on appuie sur le bouton de suppression d'un medicament
    if(isset($_POST['btSupprimer']))
    {
        //On récupère l'id du medicament
        $id_acronyme = $_POST['id_acronyme'];
        //On instancie la classe acronyme pour utiliser la RQ de suppresion d'un medicament
        $acronyme = new acronyme($db);
        $nb = $acronyme->deleteOne($id_acronyme);
        
        
        //Si la RQ s'est mal passée
        if($nb!=1)
        {
            //On affiche ce message
            echo
            '
                <br><div class=" well center alert alert-danger" role="alert">Erreur de Suppression !</div>
                </div></div>
            ';
        }
        else
        {
            //Sinon
            echo
            '
                  <br><div class="well center alert alert-success" role="alert">Suppression effectuée !</div>
                  </div></div>
            ';
            echo '<script type="text/javascript">window.location.replace("index.php?page=acronyme");</script>';
            
        }
    }

    //Si on appuie sur le bouton pour modifier un acronyme
    if(isset($_POST['btModifier']))
    {
        //On réucpère les informations relatives au medicament
        $id_acronyme = $_POST['id_acronyme'];
        $acronyme_acronyme = $_POST['acronyme_acronyme'];
        $nom_acronyme = $_POST['nom_acronyme'];

        //On instancie la classe pour utiliser la RQ de modification
        $acronyme = new acronyme($db);

        $nb = $acronyme->updateAll($id_acronyme,$acronyme_acronyme, $nom_acronyme);

        //Si la RQ s'ets mal apssée
        if($nb!=1)
        {
            echo '<br><div class="center alert alert-danger" role="alert">Erreur de Modification!</div></div></div>';
        }
        //Sinon
        else
        {
            echo '<br><div class="center alert alert-success" role="alert">Modification effectuée !</div>
            </div></div>';
        }
    }

    //Si une variable id_acronyme existe dans l'URL
    if(isset($_GET['id_acronyme']))
    {
        //On récupère la valeur de l'id
        $id_acronyme=$_GET['id_acronyme'];
        
        //On instancie al classe medicament pour utiliser la RQ qui permets de ne récupérer qu'un seul médicament
        $acronyme=new acronyme($db);

        $uneListe=$acronyme->selectOne($id_acronyme);

        //Si l'objet contenant le médicament est valable, on affiche ses informations dans un formulaire de modification
        if($uneListe!=false)
        {
            echo
            '
            <div class="col-md-1"></div>

              <div class="col-md-10">
              <br>

                <form class="form-group" method="POST" action="index.php?page=modifAcronyme" enctype="multipart/form-data">

                  <div class="panel panel-default">

                    <div class="panel-heading">

                      <div class="panel-title">

                        <div class="center">

                          <h3>Modification d\'un acronyme</h3>

                        </div>

                      </div>

                    </div>

                    <div class="panel-body">

                      <input type="hidden" value="'.$id_acronyme.'" name="id_acronyme" id="id_acronyme"/>

                      <label>Acronyme</label>
                      <input class="form-control" type="text" name="acronyme_acronyme" id="acronyme_acronyme" value="'.$uneListe['acronyme_medicament'].'"/><br>

                      <label>Signification</label>
                      <input class="form-control" type="text" name="nom_acronyme" id="nom_acronyme" value="'.$uneListe['nom_medicament'].'"/><br>


                      <br><br>

                      <div class="pull-right">

                        <button type="submit" class="btn btn-warning" id="btModifier" name="btModifier">Modifier</button>

                        <button type="submit" class="btn btn-danger" id="btSupprimer" name="btSupprimer">Supprimer</button>
                      </div>

                    </div>

                  </div>

                </form>
             </div>

            <div class="col-md-1"></div>
            ';
        }
        else
        //Sinon, si le medicament demandé n'existe pas
        {
            echo
            '
                Mauvaise référence
            ';
        }

        echo'</div></div>';
    }
}
?>
