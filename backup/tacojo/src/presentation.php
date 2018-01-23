<?php
function entete()
{

    echo ' <!DOCTYPE html>
				<html lang="FR">
				<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//cdn.muicss.com/mui-latest/css/mui.min.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="css/inscription.css" rel="stylesheet" type="text/css" />
    <script src="//cdn.muicss.com/mui-latest/js/mui.min.js"></script>
    <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="js/script.js"></script>

    <title>TACOJO</title>
  </head>
				<body>
				';

}

function menu()
{
    echo '
    <body>
    <div id="sidedrawer" class="mui--no-user-select">
      <div id="sidedrawer-brand" class="mui--appbar-line-height">
        <span class="mui--text-title">TACOJO</span>
      </div>
      <div class="mui-divider"></div>
      <ul>
        <li>
          <strong><i class="fa fa-users"></i>Patients<span class="arrow"></span></strong>
          <ul>
            <li><a href="index.php?page=ajoutType">Ajouter un patient</a></li>
            <li><a href="index.php?page=listeType">Liste des patients</a></li>
          </ul>
        </li>
        <li>
          <strong><i class="fa fa-book"></i>Protocoles<span class="arrow"></span></strong>
          <ul>
            <li><a href="index.php?page=protocole">Afficher les protocoles</a></li>
          </ul>
        </li>
        <li>
          <strong><i class="fa fa-share"></i>Repartition<span class="arrow"></span></strong>
          <ul>
            <li><a href="#">Repartition adultes</a></li>
            <li><a href="#">Repartition enfants</a></li>
          </ul>
        </li>
        <li>
          <strong><i class="fa fa-bar-chart"></i>Rapport<span class="arrow"></span></strong>
          <ul>
            <li><a href="#">Partie 1</a></li>
            <li><a href="#">Partie 2</a></li>
          </ul>
        </li>
      </ul>
    </div>
    <header id="header">
      <div class="mui-appbar mui--appbar-line-height">
        <div class="mui-container-fluid">
          <a class="sidedrawer-toggle mui--visible-xs-inline-block mui--visible-sm-inline-block js-show-sidedrawer">☰</a>
          <a class="sidedrawer-toggle mui--hidden-xs mui--hidden-sm js-hide-sidedrawer">☰</a>
          <span class="mui--text-title mui--visible-xs-inline-block mui--visible-sm-inline-block">TACOJO</span>
        </div>
      </div>
    </header>




 ';
}


function contenu(){
    echo'
    ';
}




function bas()
{
    echo '

<footer id="footer">
      <div class="mui-container-fluid">
        <br>
        Made with ♥ by <a href="http://www.arras-sio.com">Arras-sio</a>
      </div>
    </footer>
  </body>

			';
}
