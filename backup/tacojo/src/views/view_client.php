<link rel="stylesheet" href="css/style.css" />
<?php

function viewListeClients($db){
    echo'<h3>Liste des clients</h3>
    <hr />';
    $client=new Client($db);
    $listeClient=$client->selectAll();
    echo '
            <table style="min-width : 100%" class="table">
                <tr>
                    <th>Login</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                </tr>
        ';
    foreach($listeClient as $unClient){
        echo '<tr><td>'.$unClient['login'].'</td><td>'.$unClient['nom'].'</td><td>'.$unClient['prenom'].'</td></tr>';
    }
    echo '</table>';


    // var_dump($listeType); //pour debug le script ex : var_dump($_POST);
}

function viewAjoutClient($db)
{


            echo '<h3>Ajouter un client</h3>
            <hr>';


    /*il regarde si dans la memoire sil existe une variable btAjouter dans les info qui vienne d'un formulaire*/
    if (isset($_POST['btInscrire'])) { //$_GET pour un lien a href, $_POST pour un formulaire


        $login = $_POST['login'];

        if (strlen($_POST['login']) < 5) {
            echo '5 caractères minimum!';
        } else {

            $mdp = $_POST['mdp'];

            //$nom=$_POST['nom'];
            $nom = strtoupper($_POST['nom']);
            $prenom = $_POST['prenom'];
            $client = new Client($db); // instancier la class type
            $nb = $client->insertAll($login, $mdp, $nom, $prenom);
            if ($nb == 1) {
                echo '<div class="alert alert-success">Envoyé avec succées</div>';
            } else {
                echo '<div class="alert alert-danger">Une erreur est survenu</div>';
            }
        }
    }
    print_r($_POST);

    echo'<form class="form-inline" method="POST" action="index.php?page=ajoutClient">

                <div class="form-group">
                    <input class="form-control" type="text" name="login" id="login" placeholder="Login" />
                </div>

                 <div class="form-group">
                    <input class="form-control" type="password" name="mdp" id="login" placeholder="Mot de passe" />
                </div>

                 <div class="form-group">
                    <input class="form-control" type="text" name="nom" id="nom" placeholder="Nom" />
                </div>


                <div class="form-group">
                    <input class="form-control" type="text" name="prenom" id="prenom" placeholder="Prenom" />
                </div>



            <button type="submit" class="btn btn-default" id="bt" name="btInscrire">Ajouter</button>
        </form>';

}


?>