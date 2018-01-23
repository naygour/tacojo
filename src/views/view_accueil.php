<?php
function viewAccueil($db)
{

    if(!isset($_SESSION['login']))
    //Si la personne n'est pas connectée
    {
        //AFFICHAGE DE L'ACCUEIL POUR UNE PERSONNE NON CONNECTEE
	echo
        '
        <!--<div id="content-wrapper">-->
        <div class="container">
        <div class="mui--appbar-height"></div>
        <div class="mui-container-fluid">
        
        <div id="loginbox" class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">


        <div class="panel panel-default" >
            <div class="panel-heading">
                <div class="panel-title text-center">Se connecter</div>
            </div>

            <div class="panel-body" >

                <form name="form" id="form" class="form-horizontal" enctype="multipart/form-data" method="POST">

                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                        <input class="form-control" type="email" id="login" name="login" placeholder="exemple@domaine.fr" />
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input class="form-control" type="password" id="mdp" name="mdp" placeholder="Votre mot de passe" />
                    </div>

                    <div class="form-group">
                        <!-- Button -->
                        <div class="col-sm-12 controls">
                            <button type="submit" class="btn btn-warning btn btn-default pull-right" id="btConnexion" class="glyphicon glyphicon-log-in" name="btConnexion" >Se connecter</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
	';
    }
    else
    //AFFICHAGE DE L'ACCUEIL POUR UNE PERSONNE CONNECTEE
    {
        echo
        '
        <br>
        <!--<div id="content-wrapper">-->
            <div class="container">
                <div class="mui--appbar-height"></div>
                    <div class="mui-container-fluid">
                        <div class="alert alert-info">
                            <center>
                                <h1><strong>Le TACOJO</strong></h1>
                            
                                <h2>Un outil intuitif pour les dispensateurs, un outil de suivi pharmaceutique des patients vivant avec le VIH
                                sous ARV.</h2>
                            </center>
                            </br>
                            </br>
                            <center>Le TACOJO permet...</center>
                            </br>
                            
                            <div style="margin : 2%">
                                <ul style="margin : inherit;padding: 0">
                                    <li>
                                        Un <strong>suivi fiable et aisé du patient </strong> avec une grande visibilité des
                                        absences (premier indicateur d’observance)
                                    </li>

                                    <li>
                                        L’amélioration de <strong>l’estimation des besoins en ARV</strong> avec la
                                        <strong>génération automatique du tableau de répartition des patients
                                        par protocole</strong>
                                    </li>

                                    <li>
                                        La sauvegarde et la transmission de <strong>données exactes et fiables</strong> avec
                                        <strong>génération automatique des rapports mensuels de PEC destinés
                                        au niveau central</strong>.
                                    </li>
                                </ul>

                                    <hr>
                                </br>


                                <i>
                                    Le TACOJO a été élaboré en Casamance (Sénégal) afin d’améliorer
                                    le suivi pharmaceutique des PvVIH sous ARV, suite à la demande
                                    du médecin chef de Ziguinchor.
                                    Il est le fruit de 6 années de collaboration entre les dispensateurs
                                    de la région et un collectif de pharmaciens (associations PAH - Les
                                    Pharmaciens Humanitaires et GISPE), sous la conduite du CNLS et
                                    de la DLSI.
                                </i>
                            </div>
                </div>
            </div>
        </div>
        ';
    }
}

?>
