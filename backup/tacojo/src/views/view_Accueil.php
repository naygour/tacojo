<?php
function viewAccueil($db){

	if(!isset($_SESSION['login'])){
		echo'

				<!--<form class="form-inline" method="POST" action="index.php">

					<div class="col-md-12">
						<div class="form-group">
							<input class="form-control" type="text id" id="email" name="email" placeholder="exemple@domaine.fr" />
						</div>

						<div class="form-group">
							<input class="form-control" type="password" id="mdp" name="mdp" placeholder="Votre mot de passe" />
						</div>

						<button type="submit" class="btn btn-warning" id="btConnexion" name="btConnexion">Se connecter</button>
					</div>
				</form>

				<div class="container">-->

<div id="content-wrapper">
      <div class="mui--appbar-height"></div>
      <div class="mui-container-fluid">
    <div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">


        <div class="panel panel-default" >
            <div class="panel-heading">
                <div class="panel-title text-center">Se connecter</div>
            </div>

            <div class="panel-body" >

                <form name="form" id="form" class="form-horizontal" enctype="multipart/form-data" method="POST">


                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                        <input class="form-control" type="text id" id="email" name="email" placeholder="exemple@domaine.fr email=1234" />
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input class="form-control" type="password" id="mdp" name="mdp" placeholder="Votre mot de passe mdp=1234" />
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
    </div>
    </div>
  </div>

			';


	}else {

		echo 'Bonjour '.$_SESSION['prenom'].'</a>';




	}
}



?>
