<?php

	function viewListeUtilisateur($db){

		echo'<!--<div id="content-wrapper">-->
        <div class="container">
        <div class="mui--appbar-height"></div>
        <div class="mui-container-fluid">


					<br>
					<div class="panel panel-default">
						<div class="panel-heading">

							<div class="center">
								<h2>Utilisateurs</h2>
							</div>

						</div>

					    ';

					    $utilisateur=new utilisateur($db);
					    $listeUtilisateur=$utilisateur->selectAll();

					    $grade=new grade($db);
					    $listeGrade=$grade->selectAll();

					    $droit=new droit($db);
					    $listeDroit=$droit->selectAll();

					    $ass_grade_droit = new ass_grade_droit($db);
					    $listeAss_grade_droit=$ass_grade_droit->selectAll();

					    foreach($listeUtilisateur as $uneListe){

						    foreach ($listeGrade as $unGrade) {

								if ($uneListe['grade'] == $unGrade['id_grade']) {

								    echo'
								    <div class="panel-body">

									    <div class="row">
											<br>
										    <div class="col-sm-12">

										    	<td><h4>' . $unGrade['nom_grade'] . '&nbsp;:</td>

										   		<td><a href="index.php?page=modifUtilisateur&id_utilisateur=' . $uneListe['id_utilisateur'] . '">' . $uneListe['nom_utilisateur'] . '</td>
										    	<td>' . $uneListe['prenom_utilisateur'] . '</h4></a></td>

										    </div>




               									<table style="min-width : 100%" class="table table-striped table-bordered table-list">

               										<thead>
								                    <tr>
								                    	<th>Numéro droit</th>
								                       	<th>Droits</th>
								                    </tr>
								                  	</thead>

								                  	<tbody>
								                  		<tr>';

								                  		foreach ($listeAss_grade_droit as $une_ass_grade_droit) {



										                  		if ($unGrade['id_grade'] == $une_ass_grade_droit['id_grade']){

										                  			foreach ($listeDroit as $unDroit) {

										                  				if($unDroit['id_droit']==$une_ass_grade_droit['id_droit']){

													                 		echo'
						                                					<tr>
						                                						<td>' . $unDroit['id_droit'] . '</td>
						                                						<td>' . $unDroit['remarque'] . '</td>
						                                					</tr>';
						                                				}
					                                				}
					                                			}


		                                				}
                                						echo'
                                						</tr><br>

								                  	</tbody>

               									</table>


               								</div>


								    </div>';
								}
							}
					    }echo'
					    </div>
				   </div>
				</div>
			</div>';

	}

	function viewAjoutUtilisateur($db){

		echo'
			<!--<div id="content-wrapper">-->
        <div class="container">
        <div class="mui--appbar-height"></div>
        <div class="mui-container-fluid">';


				    if (isset($_POST['btUtilisateur'])) {

				        $nom_utilisateur = $_POST['nom_utilisateur'];
				        $prenom_utilisateur = $_POST['prenom_utilisateur'];
				        $login = $_POST['login'];
				        $mdp = $_POST['mdp'];
				        $grade = $_POST['grade'];
								$mdp2 = $_POST['mdp2'];

								if($mdp != $mdp2) {

									echo '
													<br><div class="well center alert alert-danger" role="alert">Vous avez mal confirmé votre mot de passe, réessayez !</div>
									            <script>$(".well").fadeTo(5000, 200).slideUp(500);</script>';
								}
								else {
									echo '
											<br><div class="well center alert alert-success" role="alert">Vous avez ajouté un utilisateur !</div>
															<script>$(".well").fadeTo(5000, 200).slideUp(500);</script>';
								}

				        $utilisateur = new utilisateur($db);

				        $nb = $utilisateur->insertAll($nom_utilisateur, $prenom_utilisateur, $login, $mdp, $grade,1);


				    /*    if ($nb == 1) {

				            echo '
												<br><div class="well center alert alert-success" role="alert">Vous avez ajouté un utilisateur !</div>
						               			<script>$(".well").fadeTo(5000, 200).slideUp(500);</script>';
				        }else {
								echo '
										<br><div class="well center alert alert-success" role="alert">Vous avez ajouté un utilisateur !</div>
														<script>$(".well").fadeTo(5000, 200).slideUp(500);</script>';
				        }*/
				    }echo'


			          <br>
			          <div class="panel panel-default">

			                <div class="panel-heading">

			                  <div class="center">
			                  <h2>Ajouter un utilisateur</h2>
			                  </div>

			                 </div>

			            <div class="panel-body">

			            <form class="form-group" method="POST" action="index.php?page=ajout_utilisateur" enctype="multipart/form-data" >

                                        <div class="form-group">
                                            <label for="nom_utilisateur">Nom</label>
                                            <input type="text" class="form-control" name="nom_utilisateur" id="nom_utilisateur" placeholder="Nom">
                                        </div>

                                        <div class="form-group">
                                            <label for="prenom_utilisateur">Prénom</label>
                                            <input type="text" class="form-control" name="prenom_utilisateur" id="prenom_utilisateur" placeholder="Prénom">
                                        </div>

                                        <div class="form-group">
                                            <label for="Login">Login</label>
                                            <input type="email" class="form-control" name="login" id="login" placeholder="Login">
                                        </div>

                                        <div class="form-group">
                                            <label for="mdp">Mot de passe</label>
                                            <input type="password" class="form-control" name="mdp" id="mdp" placeholder="Mot de passe">
                                        </div>

                                        <div class="form-group">
                                            <label for="mdp2">Confirmation du mot de passe</label>
                                            <input type="password" class="form-control" name="mdp2" id="mdp2" placeholder="Confirmation du mot de passe">
                                        </div>

                                        <div class="form-group">
                                            <label for="sel1">Grade</label>
                                            <select class="form-control" id="grade" name="grade">
                                        ';

                                            $grade = new grade($db);
                                            $listeGrade = $grade->selectAll();
                                            foreach ($listeGrade as $unGrade){
                                                echo'<option value="'.$unGrade['id_grade'].'">'.$unGrade['nom_grade'].'</option>';
                                            }

                                        echo'
                                            </select>
                                        </div> 

                                        <button type="submit" class="btn btn-success" id="btUtilisateur" name="btUtilisateur">Ajouter</button>
                                    </form>';
}

	function viewModifUtilisateur($db) {

		echo'
		<!--<div id="content-wrapper">-->
        <div class="container">
        <div class="mui--appbar-height"></div>
        <div class="mui-container-fluid">';

				if(isset($_POST['btSupprimer'])) {

					$id_utilisateur = $_POST['id_utilisateur'];

					$utilisateur = new utilisateur($db);
					$nb = $utilisateur->deleteOne($id_utilisateur);

					if($nb!=1){
							echo '<br><div class="center alert alert-danger" role="alert">Erreur de Suppression !</div>';

					}else{
							echo '<br><div class=" center alert alert-success" role="alert">Suppression effectuée !</div>';
							;
					}
				}

				if(isset($_POST['btModifier'])) {

					$id_utilisateur = $_POST['id_utilisateur'];
					$nom_utilisateur = $_POST['nom_utilisateur'];
					$prenom_utilisateur = $_POST['prenom_utilisateur'];
					$login = $_POST['login'];
					$mdp = $_POST['mdp'];
					$grade = $_POST['grade'];



					$utilisateur = new utilisateur($db);

					$nb = $utilisateur->updateAll($id_utilisateur,$nom_utilisateur, $prenom_utilisateur, $login, $mdp, $grade);
					if ($nb == 1) {
						echo '<br><div class="center alert alert-success" role="alert">Modification effectuée !</div>';

					} else {

						echo '<br><br><div class="center alert alert-danger" role="alert">Erreur de modification !</br><div></div></div>';
					}

				}

				if(isset($_GET['id_utilisateur'])){

					$id_utilisateur=$_GET['id_utilisateur'];
					$utilisateur=new utilisateur($db);

					$uneListe=$utilisateur->selectOne($id_utilisateur); //selectOne renvoie la valeur false si il n'a pas trouver de Produit
					if($uneListe!=false){

						echo'<br>

						<div class="col-md-1"></div>

                      <div class="col-md-10">
                      <br>

                        <form class="form-group" method="POST" action="index.php?page=modifUtilisateur" enctype="multipart/form-data">

                          <div class="panel panel-default">

                            <div class="panel-heading">

                              <div class="panel-title">

                                <div class="center">

					                <h3>Modifier l\'utilisateur</h3>

                                </div>

                              </div>

                            </div>

                            <div class="panel-body">

								<input class="form-control" type="hidden" name="id_utilisateur" id="id_utilisateur" value="'.$uneListe['id_utilisateur'].'"/>

                              	<label>Nom</label>
					            <input class="form-control" type="text" name="nom_utilisateur" id="nom_utilisateur" value="'.$uneListe['nom_utilisateur'].'"/><br>

                              	<label>Prénom</label>
					            <input class="form-control" type="text" name="prenom_utilisateur" id="prenom_utilisateur" value="'.$uneListe['prenom_utilisateur'].'" /><br>

                              	<label>Login</label>
					            <input class="form-control" type="text" name="login" id="login" value="'.$uneListe['login'].'" /><br>

                              	<label>Mot de passe</label>
					            <input class="form-control" type="text" name="mdp" id="mdp" placeholder="Mot de passe"/><br>

                              	<label>Grade</label>
					            <select class="form-control" id="grade" name="grade">';

						            $grade = new grade($db);
						            $listeGrade = $grade->selectAll();

						            foreach ($listeGrade as $unGrade){

					                	if ($unGrade['id_grade'] == $uneListe['grade']){

					                        echo'<option selected="selected" value="'.$unGrade['id_grade'].'">'.$unGrade['nom_grade'].'</option>';
					                            }
					                    else {

					                              echo'<option value="'.$unGrade['id_grade'].'">'.$unGrade['nom_grade'].'</option>';
					                    }
					                }

						                    echo'
					            </select><br>

                              <div class="pull-right">

                                <button type="submit" class="btn btn-warning" id="btModifier" name="btModifier">Modifier</button>

                                <button type="submit" class="btn btn-danger" id="btSupprimer" name="btSupprimer">Supprimer</button>
                              </div>

                            </div>

                          </div>

                        </form>

                      </div>

                    <div class="col-md-1"></div>';




					/*        	<div class="panel panel-default">

									<div class="panel-heading">

									    <div class="center">
									      	<h2>Modifier les droits de l\'utilisateur</h2>
									    </div>

									</div>';


							    $grade=new grade($db);
							    $listeGrade=$grade->selectAll();

							    $droit=new droit($db);
							    $listeDroit=$droit->selectAll();

							    $ass_grade_droit = new ass_grade_droit($db);
							    $listeAss_grade_droit=$ass_grade_droit->selectAll();


								foreach ($listeGrade as $unGrade) {

									if ($uneListe['grade'] == $unGrade['id_grade']) {

										echo'

										<div class="panel-body">

											<div class="row">

												<table class="table table-striped table-bordered table-list">

			               							<thead>
											            <tr>
											                <th>Numéro droit</th>
											                <th>Droits</th>
											                <th></th>
											            </tr>
											        </thead>

											        <tbody>';


											            foreach ($listeAss_grade_droit as $une_ass_grade_droit) {

											            	if ($unGrade['id_grade'] == $une_ass_grade_droit['id_grade']){

													            foreach ($listeDroit as $unDroit) {

													                if($unDroit['id_droit']==$une_ass_grade_droit['id_droit']){

													                	$droits[$unDroit['id_droit']]=$unDroit['id_droit'];

																    	echo'
									                                	<tr>
									                                		<td>' . $unDroit['id_droit'] . '</td>
									                                		<td>' . $unDroit['remarque'] . '</td>
									                                		<td>

									                                			 <form class="form-group" method="POST" action="index.php?page=modifUtilisateur" enctype="multipart/form-data">

									                                				<div class="center"><button type="submit" class="btn btn-danger" id="" name="">Supprimer</button></div></td>
									                                	</tr>';
									                                }
								                                }

								                            }
								                    	}';

									                </tbody>

									            </table><br>
									        </div>
									    </div>


									    <div class="panel-body">

											<div class="row">


								                <table class="table table-striped table-bordered table-list">

								               		<thead>
														<tr>
															<th>Numéro droit</th>
															<th>Droits</th>
															<th></th>
														</tr>
													</thead>

													<tbody>';


										                    foreach ($listeDroit as $unDroit) {

															    if (!isset($droits[$unDroit['id_droit']])){

																	echo'
											                        <tr>
											                            <td>' . $unDroit['id_droit'] . '</td>
											                            <td>' . $unDroit['remarque'] . '</td>
											                            <td><div class="center"><button type="submit" class="btn btn-success" id="" name="">Ajouter</button></div></td>
											                        </tr>';
											                    }

										           			}


									           			echo'

			                                		</tbody>

			               						</table>
			               					</div>
			               				</div>';

									}

								}*/

	    			}
					else{

						echo'Mauvaise référence';

					}
				}	echo'

			</div></div>';

				echo'

		</div>';

	}

?>
