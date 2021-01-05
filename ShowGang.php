<?php
session_name('ArmaPanel');
session_start();
include('include/actualise.php');
$PageName = "Information Gang";

$PageIndex = "Tableau De Bord";
$PageIndexLink = "index.php";

$PageIndexTwo = "Gangs";
$PageIndexTwoLink = "gangs.php";

$jsonStr = file_get_contents("include/config/config.json");
$config = json_decode($jsonStr, true);


$error = null;
if (isset($_GET['id'])) {
	$ID = htmlspecialchars($_GET['id']);
	if ($ID === null || !ctype_digit($ID)) $error = "InvalideUID";
	else {
		include('include/connexiondb_Serveur.php');
		$reponse = $serveur_bdd->query("SELECT * FROM gangs WHERE id='$ID'");
		$donnees = $reponse->fetch();

		if ($donnees['owner'] == null) $error = "InvalideUID";
	}
}

function GetUser($pid) {
	include('include/connexiondb_Serveur.php');
	$reponse = $serveur_bdd->query("SELECT * FROM players WHERE pid='$pid'");
	$playerData = $reponse->fetch();
	return array('uid' => $playerData['pid'], 'nom' =>  $playerData['name']);
}
function GetUserExtrem($pid) {
	include('include/connexiondb_Serveur.php');
	$reponse = $serveur_bdd->query("SELECT * FROM players WHERE pid='$pid'");
	$playerData = $reponse->fetch();
	return "<a href=\"ShowUser.php?uid=".$playerData['pid']."\">".$playerData['name']."</a>";
}

// Check Permissions
$Acces = false;
if ($PERM_View_Gang) $Acces = true;

?>

<!doctype html>
<html class="no-js" lang="">
<head>
    <?php include('include/head.php'); ?>
    <link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">
</head>

<body>
    <!-- Left Panel -->
    <?php include('include/left-panel.php');?>
    <!-- /#left-panel -->
    <!-- Right Panel -->
    
    
<div id="right-panel" class="right-panel">
        <!-- Header-->
        <?php include('include/menu.php');?>
        <!-- /#header -->
        <?php include('include/BareIndex.php');?>
<?php 
	if ($Acces) {
		if ($error !== "InvalideUID") { 
?>
    <div class="content">
        <div class="animated fadeIn">
                    <div class="row"><!-- Information Joueur Debut -->
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title" v-if="headerText">Data Gang</strong>
                                </div>
                                <div class="card-body">
                                <div class="col-md-4">
			                        <aside class="profile-nav alt">
			                            <section class="card">
			                                <div class="card-header user-header alt bg-dark">
			                                    <div class="media">
			                                        <div class="media-body">
			                                            <h2 class="text-light display-6 text-center"><?= $donnees['name']?></h2>
			                                        </div>
			                                    </div>
			                                </div>


			                                <ul class="list-group list-group-flush">
			                                    <li class="list-group-item">
			                                        <i class="fa fa-bars"></i> <strong class="card-title"> ID : <?= $donnees['id']?></strong>
			                                    </li>
			                                    <li class="list-group-item">
			                                        <i class="fa fa-id-card-o"></i> <strong class="card-title"> Propriétaire : <?= GetUserExtrem($donnees['owner']) ?></strong>
			                                    </li>
			                                    <li class="list-group-item">
			                                        <i class="fa fa-car"></i> <strong class="card-title"> Membre Max : <?= $donnees['maxmembers']?></strong>
			                                    </li>
			                                    <li class="list-group-item">
			                                        <i class="fa fa-car"></i> <strong class="card-title"> Compte Gang : <?= strrev(wordwrap(strrev($donnees['bank']), 3, '.', true))?> €</strong>
			                                    </li>
			                                    <li class="list-group-item">
			                                        <i class="fa fa-car"></i> <strong class="card-title"> Date de Création : <?= $donnees['insert_time']?></strong>
			                                    </li>
			                                    <li class="list-group-item">
			                                        <i class="fa fa-briefcase"></i> <strong class="card-title"> Liste des Membres : </strong><button type="button" class="btn btn-outline-primary mb-1" data-toggle="modal" data-target="#scrollmodal"> Ouvrir</button>
			                                    </li>
						                        <?php if ($PERM_Edit_Gang) { ?>
			                                    <li class="list-group-item">
			                                    	<button type="button" class="btn btn-outline-primary mb-1" data-toggle="modal" data-target="#mediummodaledition"><i class="fa fa-cogs"></i> Editer</button>
						                            <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#mediummodalsuprr"><i class="fa fa-cogs"> </i> Supprimer</button>
						                        </li>
			                                    <?php } ?>
			                                </ul>
			                            </section>
                        			</aside>
                    			</div>
                				</div>
            				</div>
        				</div>
    				</div>
    				<!-- Liste des Membre Debut -->
					            <div class="modal fade" id="scrollmodal" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
					                <div class="modal-dialog modal-lg" role="document">
					                    <div class="modal-content">
					                        <div class="modal-header">
					                            <h5 class="modal-title" id="scrollmodalLabel">Liste des Membres</h5>
					                        </div>
					                        <div class="modal-body">
					                            <div class="col-md-12">
					                        <div class="card">
					                            <div class="card-header">
					                                <strong class="card-title">Membres</strong>
					                            </div>
					                            <div class="card-body">
					                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
					                                    <thead>
					                                        <tr>
					                                            <th>Nom</th>
					                                            <th>Profile</th>
					                                        </tr>
					                                    </thead>
					                                    <tbody>
					                                    	<?php
					                                        	$membres = $donnees['members'];
					                                        	$membres = str_replace('"[', "", $membres);
												                $membres = str_replace(']"', "", $membres);
												                $membres = str_replace('`', "", $membres);
												                $membres = explode(",", $membres);
												                foreach ($membres as $value) {
												                   	$data = GetUser($value);
												                   	echo "<tr><td>{$data['nom']}</td><td><button type=\"button\" class=\"btn btn-outline-primary mb-1\" onclick=\"window.location.href = 'ShowUser.php?uid={$data['uid']}';\"> Ouvrir</button></td></tr>";
												                }
					                                        	?>
					                                    </tbody>
					                                </table>
					                            </div>
					                        </div>
					                    </div>
					                        </div>
					                        <div class="modal-footer">
					                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
					                        </div>
					                    </div>
					                </div>
					            </div>
					            <!-- Liste des Membre Fin -->

					            <!-- Modal Edit Debut -->
<?php if ($PERM_Edit_Gang) { ?>
			<div class="modal fade" id="mediummodaledition" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediumModalLabel">Edition Gang</h5>
                        </div>
	                    <div class="modal-body">
							<div class="col-lg-13">
		                        <div class="card">
		                            <div class="card-header">
		                                <strong>Formulaire</strong> d'edition
		                            </div>
		                            <div class="card-body card-block">
		                                <form action="functions/editGang.php" method="post" class="form-horizontal">
		                                	<input style="display: none;" type="text" name="id" value="<?= $donnees['id']?>">
		                                	<div class="row form-group">
		                                        <div class="col col-md-3"><label class=" form-control-label">Propriétaire :</label></div>
		                                        <div class="col-12 col-md-9">
		                                            <input value="<?= $donnees['owner']?>" type="text" id="proprio" name="owner" placeholder="UID" class="form-control">
		                                        </div>
		                                    </div>
		                                    <div class="row form-group">
		                                        <div class="col col-md-3"><label class=" form-control-label">Max Membre :</label></div>
		                                        <div class="col-12 col-md-9">
		                                            <input value="<?= $donnees['maxmembers']?>" type="number" id="maxmembers" name="max" placeholder="12" class="form-control">
		                                        </div>
		                                    </div>
		                                    <div class="row form-group">
		                                        <div class="col col-md-3"><label class=" form-control-label">Compte Gang :</label></div>
		                                        <div class="col-12 col-md-9">
		                                            <input value="<?= $donnees['bank']?>" type="number" id="cash" name="bank" placeholder="10000" class="form-control">
		                                        </div>
		                                    </div>
		                                    <div class="modal-footer">
					                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Anuler</button>
					                            <button type="submit" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"> </i> Confirmer</button>
					                        </div>
		                                </form>
		                            </div>
		                        </div>
							</div>              
	                    </div>
	                </div>
	            </div>
	        </div>
<?php } ?>
        </div>
    </div>
</div>
            <!-- Modal Edit Fin -->
<?php if ($PERM_Edit_Gang) { ?>
    <!-- Modal Supprimer Début -->
    <div class="modal fade show" id="mediummodalsuprr" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="smallmodalLabel">Confirmation</h5>
				</div>
				<div class="modal-body">
					<p>
					Voulez vous vraiment supprimer le gang <strong><?= $donnees['name']?></strong>
					</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Anuler</button>
                    <a href="functions/delGang.php?id=<?= $donnees['id']?>"><button type="submit" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"> </i> Confirmer</button></a>
				</div>
			</div>
		</div>
	</div>
    <!-- Modal Supprimer Fin -->            
<?php } ?>
  		</div>
	</div>
        <!-- .content -->
<?php } else { ?>
	<div class="content">
		<h1>Gang Introuvable</h1>
	</div>
<?php }} else { ?>
    <div class="content">
        <h1>Acces Refusé !</h1>
    </div>
<?php } ?>

    <div class="clearfix"></div>

    <?php include('include/footer.php'); ?>

</div><!-- /#right-panel -->

<!-- Right Panel -->

<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="assets/js/main.js"></script>


</body>
</html>