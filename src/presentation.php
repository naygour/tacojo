<?php
function entete()
{

    echo
    '
        <!DOCTYPE html>
            <html lang="FR">
                <head>
                    <meta charset="UTF-8">
                    <meta http-equiv="Content-type" content="text/html">
                    
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
                    <!--Permet le côté responsive de boostrap, enelevé à cause du double burger dans la nabvar-->
                    
                    <link href="css/mui.min.css" rel="stylesheet type="text/css" />
                    <link href="css/font-awesome.css" rel="stylesheet" type="text/css" />
                    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
                    <link href="css/inscription.css" rel="stylesheet" type="text/css" />
                    <link href="css/style.css" rel="stylesheet" type="text/css" />
                    <link rel="stylesheet" href="css/jquery-ui.css" type="text/css" media="screen" />
                    <link href="css/jquery.datatable.min.css" rel="stylesheet" type="text/css" />

                    <script src="js/mui.min.js"></script>
                    <script src="js/jquery-2.1.4.min.js"></script>
                    <script src="js/script.js"></script>
                    <script src="js/bootstrap.js"></script>
                    <script type="text/javascript" src="js/jquery.min.js"></script>
                    <script src="js/jquery-ui.js" ></script>
                    <script src="js/jquery.datatable.min.js" ></script>
                    <script src="js/jquery.datatable.bootstrap.min.js" ></script>

                    <title>TACOJO</title>
                </head>
                <body>
    ';

}

if(isset($_GET['action']))
//Si on appuie sur le bouton action
{
    if($_GET['action']=='deco')
    //Et si l'action est une déconnexion
    {
        //On vide le tableau $_SESSION
        $_SESSION=array();
        //On détruit la session
        session_destroy();
        //On redirige vers l'accueil
        header('Location: index.php');
    }
}

function menu()
{
//    if(isset($_SESSION['login']))
//    {
//    echo
//    '
//    <div id="sidedrawer" class="mui--no-user-select">
//      <div id="sidedrawer-brand" class="mui--appbar-line-height">
//        <a href="index.php" class="titre"<span class="mui--text-title">TACOJO</span></a>
//      </div>
//      <div class="mui-divider"></div>
//      <ul>
//        <li>
//          <strong><i class="fa fa-users"></i>Patients<span class="arrow"></span></strong>
//          <ul>
//            <li><a href="index.php?page=ajouter_patient">Ajouter un patient</a></li>
//            <li><a href="index.php?page=patient">Liste des patients</a></li>
//          </ul>
//        </li>
//        <li>
//          <strong><i class="fa fa-book"></i>Protocoles<span class="arrow"></span></strong>
//          <ul>
//            <li><a href="index.php?page=protocole">Afficher les protocoles</a></li>
//            <li><a href="index.php?page=acronyme">Afficher les acronymes</a></li>
//          </ul>
//        </li>
//        <li>
//        <li>
//          <strong><i class="fa fa-edit"></i>Dispensation<span class="arrow"></span></strong>
//          <ul>
//            <li><a href="index.php?page=dispensation">Les dispensations</a></li>
//            <li><a href="index.php?page=ajout_dispensation">Ajouter une dispensation</a></li>
//          </ul>
//        </li>
//          <strong><i class="fa fa-share"></i>Repartition<span class="arrow"></span></strong>
//          <ul>
//            <li><a href="index.php?page=repartition_adulte">Repartition adultes</a></li>
//            <li><a href="index.php?page=repartition_enfant">Repartition enfants</a></li>
//          </ul>
//        </li>
//        <li>
//          <strong><i class="fa fa-bar-chart"></i>Rapport<span class="arrow"></span></strong>
//          <ul>
//            <li><a href="index.php?page=rapport">Rapports</a></li> 
//          </ul>
//        </li>
//        <li>
//          <strong><i class="fa fa-briefcase"></i>RDV<span class="arrow"></span></strong>
//          <ul>
//            <li><a href="index.php?page=listeRDV">Voir les RDV</a></li>
//          </ul>
//        </li>';
//
//        if(isset($_SESSION['droits']['11']))
//        //Si la personne a le droit 11
//        {
//            echo
//            '
//            <li>
//                <strong><i class="fa fa-user"></i>Utilisateurs<span class="arrow"></span></strong>
//                <ul>
//                  <li><a href="index.php?page=ajout_utilisateur">Ajouter un utilisateur</a></li>
//                  <li><a href="index.php?page=utilisateur">Liste des utilisateurs</a></li>
//                </ul>
//            </li>
//            ';
//            //On affiche le menu de gestion des utilisateurs
//        }
//
//        if(isset($_SESSION['login']))
//        //Si la personne est connectée
//        {
//            echo
//            '
//            <li>
//              <strong><a href="index.php? action=deco" <i class="fa fa-sign-out"></i>  Deconnexion</a></strong>
//
//            </li>
//            ';
//            //On affiche le bouton de déconnexion
//        }
//        
//    echo
//    '
//      </ul>
//    </div>
//    ';
//    }
//   
//    echo
//    '
//      <header id="header">
//    
//      <div class="mui-appbar mui--appbar-line-height">
//        <div class="mui-container-fluid">
//    ';
//    
//    if(isset($_SESSION['login']))
//    //Si la personne est connectée, on affiche le menu de côté
//    {
//        echo
//        '
//            <a style="text-decoration : none;" class="sidedrawer-toggle mui--visible-xs-inline-block mui--visible-sm-inline-block js-show-sidedrawer">☰</a>
//            <a style="text-decoration : none;" class="sidedrawer-toggle mui--hidden-xs mui--hidden-sm js-hide-sidedrawer">☰</a>
//        ';
//    }
//          
//    echo
//    '
//          <span class="mui--text-title mui--visible-xs-inline-block mui--visible-sm-inline-block">TACOJO</span>
//          Made by <a href="http://www.arras-sio.com">arras-sio.com</a>
//        </div>
//      </div>
//      
//    </header>
//
    //BARRE DE NAVIGATION HORIZONTALE
    echo
    '     
    <nav class="navbar navbar-inverse navbar-fixed-top" style="border-radius : 0px; width : 100%; position : fixed;">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        
        <div class="navbar-header">
          <button style="top : 0; left : 1%" type="button" class="navbar-btn hamburger open-nav is-closed navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="hamb-top"></span>
            <span class="hamb-middle"></span>
            <span class="hamb-bottom"></span>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        
          <ul class="nav navbar-nav">
            
            <li>
                <button style="top : 0; left : 1%" type="button" class="navbar-btn hamburger open-nav is-closed navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="hamb-top"></span>
                    <span class="hamb-middle"></span>
                    <span class="hamb-bottom"></span>
                </button>
            </li>
           
          </ul>
          
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    ';
    
  
    //BARRE DE NAVIGATION VERTICALE
    echo
    '
            <div id="wrapper">
                <div class="overlay"></div>

                <!-- Sidebar -->
                <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
                    <ul class="nav sidebar-nav">
                        <li>
                            <a href="#" class="close">
                                <i class="fa fa-times" aria-hidden="true"></i>
                            </a>
                        </li>
                        
                        <li>
                            <h1> 
                                <strong>
                                    <a href="#" class="close">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </a>
                                    <a href="index.php?page=accueil">
                                        TACOJO
                                    </a>
                                </strong>
                            </h1>
                        </li>

                        ';
                        
                        if(isset($_SESSION['login']))
                        {
                            echo
                            '

                                <li class="dropdown">
                                  <a style="color: rgb(122, 122, 122)" href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-users" aria-hidden="true"></i>
                                    Patients
                                    <span class="caret"></span>
                                  </a>
                                  
                                  <ul class="dropdown-menu" role="menu">
                                    <li><a href="index.php?page=ajouter_patient" style="color: rgb(93, 182, 166)">Ajouter un patient</a></li>
                                    <li><a href="index.php?page=patient" style="color: rgb(93, 182, 166)">Liste des patients</a></li>
                                  </ul>
                                </li>
                                




                                <li class="dropdown">
                                  <a style="color: rgb(122, 122, 122)" href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-book" aria-hidden="true"></i>
                                    Protocoles
                                    <span class="caret"></span>
                                  </a>
                                  
                                  <ul class="dropdown-menu" role="menu">
                                    <li><a href="index.php?page=protocole" style="color: rgb(93, 182, 166)">Afficher les protocoles</a></li>
                                    <li><a href="index.php?page=acronyme" style="color: rgb(93, 182, 166)">Afficher les acronymes</a></li>
                                  </ul>
                                </li>
                                

                                <li class="dropdown">
                                  <a style="color: rgb(122, 122, 122)" href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    Dispensation
                                    <span class="caret"></span>
                                  </a>
                                  
                                  <ul class="dropdown-menu" role="menu">
                                    <li><a href="index.php?page=dispensation" style="color: rgb(93, 182, 166)">Dispensations</a></li>
                                    <li><a href="index.php?page=ajout_dispensation" style="color: rgb(93, 182, 166)">Ajouter une dispensation</a></li>
                                  </ul>
                                </li>
                                


                                <li class="dropdown">
                                  <a style="color: rgb(122, 122, 122)" href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-pie-chart" aria-hidden="true"></i>
                                    Répartition
                                    <span class="caret"></span>
                                  </a>
                                  
                                  <ul class="dropdown-menu" role="menu">
                                    <li><a href="index.php?page=repartition_adulte" style="color: rgb(93, 182, 166)">Répartition adulte</a></li>
                                    <li><a href="index.php?page=repartition_enfant" style="color: rgb(93, 182, 166)">Répartition enfant</a></li>
                                  </ul>
                                </li>
                                


                                <li class="dropdown">
                                  <a style="color: rgb(122, 122, 122)" href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-bar-chart" aria-hidden="true"></i>
                                    Rapports
                                    <span class="caret"></span>
                                  </a>
                                  
                                  <ul class="dropdown-menu" role="menu">
                                    <li><a href="index.php?page=rapport" style="color: rgb(93, 182, 166)">Rapports</a></li>
                                  </ul>
                                </li>
                                

                                <li class="dropdown">
                                  <a style="color: rgb(122, 122, 122)" href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-briefcase" aria-hidden="true"></i>
                                    Rendez-vous
                                    <span class="caret"></span>
                                  </a>
                                  
                                  <ul class="dropdown-menu" role="menu">
                                    <li><a href="index.php?page=listeRDV" style="color: rgb(93, 182, 166)">Voir les Rendez-vous</a></li>
                                  </ul>
                                </li>
                                
                                <li class="dropdown">
                                  <a style="color: rgb(122, 122, 122)" href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-user-circle" aria-hidden="true"></i>
                                    Utilisateurs
                                    <span class="caret"></span>
                                  </a>
                                  
                                  <ul class="dropdown-menu" role="menu">
                                    <li><a href="index.php?page=utilisateur" style="color: rgb(93, 182, 166)">Liste des utilisateurs</a></li>
                                    <li><a href="index.php?page=ajout_utilisateur" style="color: rgb(93, 182, 166)">Ajouter un utilisateur</a></li>
                                  </ul>
                                </li>
                                



                                <!--DECONNEXION-->
                                <li>
                                    <strong>
                                        <a href="index.php? action=deco">
                                            <i class="fa fa-sign-out"></i>  Déconnexion
                                        </a>
                                    </strong>
                                </li>
                            ';
                        }
                    echo
                    '
                        
                        <hr/>
                        <li>
                            <a style="color : #737373; text-decoration : none" target="_blank" href="http://arras-sio.com">
                                www.arras-sio.com
                            </a>
                        </li>
                    </ul>
                </nav>
            </div> 
    ';
    
}

function contenu(){}

//Fonction qui ferme le fichier HTML
function bas()
{
//    echo
//    '
//
//        <footer id="footer">
//          <div class="mui-container-fluid">
//            <br>
//            Made by <font color="white"><a href="http://www.arras-sio.com">Arras-sio</a></font>
//          </div>
//        </footer>
//
//
//      </body>
//    ';
//
//    if(!isset($_SESSION['login']))
//    {
//        echo
//        '
//            <script language="JavaScript">
//                $("body").toggleClass("hide-sidedrawer");
//                $(".sidedrawer-toggle").hide();
//            </script>
//        ';
//    }

}
