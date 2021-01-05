<?php
session_name('ArmaPanel');
session_start();
include('include/actualise.php');
$PageName = "Information Vehicule";

$PageIndex = "Tableau De Bord";
$PageIndexLink = "index.php";

$PageIndexTwo = "Vehicules";
$PageIndexTwoLink = "vehicules.php";

$jsonStr = file_get_contents("include/config/config.json");
$config = json_decode($jsonStr, true);
$VehiCFG = $config['vehicules'];


$error = null;
if (isset($_GET['id'])) {
	$ID = htmlspecialchars($_GET['id']);
	if ($UID === null || !ctype_digit($UID)) $error = "NoUID";
	else {
		include('include/connexiondb_Serveur.php');
		$reponse = $serveur_bdd->query("SELECT * FROM vehicles WHERE id='$ID'");
		$donnees = $reponse->fetch();
		if (isset($donnees['pid'])) {
			$PID = $donnees['pid'];
			$reponse = $serveur_bdd->query("SELECT * FROM players WHERE pid='$PID'");
			$Proprio = $reponse->fetch();

			if ($donnees['pid'] == null) $error = "InvalideUID";

			if (isset($VehiCFG['classname'][$donnees['classname']])) $VehiculeName = $VehiCFG['classname'][$donnees['classname']];
			else $VehiculeName = $donnees['classname'];
		}
	}
}
// Check Permissions
$Acces = false;
if ($PERM_View_Vehicle) $Acces = true;

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
		if (isset($donnees['pid'])) { 
?>
<div class="content">
    <div class="animated fadeIn">
                <div class="row"><!-- Information Joueur Debut -->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title" v-if="headerText">Data Vehicule</strong>
                            </div>
                            <div class="card-body">
                            <div class="col-md-4">
		                        <aside class="profile-nav alt">
		                            <section class="card">
		                                <div class="card-header user-header alt bg-dark">
		                                    <div class="media">
		                                        <div class="media-body">
		                                            <h2 class="text-light display-6 text-center"><?= $VehiculeName?> <br>de<br> <?= $Proprio['name']?></h2>
		                                        </div>
		                                    </div>
		                                </div>


		                                <ul class="list-group list-group-flush">
		                                    <li class="list-group-item">
		                                        <i class="fa fa-bars"></i> <strong class="card-title"> ID : <?= $donnees['id']?></strong>
		                                    </li>
		                                    <li class="list-group-item">
		                                        <i class="fa fa-id-card-o"></i> <strong class="card-title"> Nom : <?= $VehiculeName?></strong>
		                                    </li>
		                                    <li class="list-group-item">
		                                        <i class="fa fa-user-o"></i> <strong class="card-title"> Camp : <?= $VehiCFG['side'][$donnees['side']]?></strong>
		                                    </li>
		                                    <li class="list-group-item">
		                                        <i class="fa fa-car"></i> <strong class="card-title"> Type : <?= $VehiCFG['type'][$donnees['type']]?></strong>
		                                    </li>
		                                    <li class="list-group-item">
		                                        <i class="fa fa-briefcase"></i> <strong class="card-title"> Inventaire : </strong><button type="button" class="btn btn-outline-primary mb-1" data-toggle="modal" data-target="#scrollmodal"> Ouvrir</button>
		                                    </li>
		                                    <?php if ($PERM_Edit_Vehicle) { ?>
		                                    <li class="list-group-item">
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
<?php if ($PERM_Edit_Vehicle) { ?>
    <!-- Modal Supprimer Début -->
    <div class="modal fade show" id="mediummodalsuprr" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="smallmodalLabel">Confirmation</h5>
				</div>
				<div class="modal-body">
					<p>
					Voulez vous vraiment supprimer ce véhicule ? 
					</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Anuler</button>
                    <a href="functions/delVehicle.php?id=<?= $donnees['id']?>&pid=<?= $Proprio['pid']?>"><button type="submit" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"> </i> Confirmer</button></a>
				</div>
			</div>
		</div>
	</div>
    <!-- Modal Supprimer Fin -->            
<?php } ?>
				<!-- Iventaire Vehicule Debut -->
				            <div class="modal fade" id="scrollmodal" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
				                <div class="modal-dialog modal-lg" role="document">
				                    <div class="modal-content">
				                        <div class="modal-header">
				                            <h5 class="modal-title" id="scrollmodalLabel">Inventaire du Vehicule</h5>
				                        </div>
				                        <div class="modal-body">
				                            <div class="col-md-12">
				                        <div class="card">
				                            <div class="card-header">
				                                <strong class="card-title">Inventaire</strong>
				                            </div>
				                            <div class="card-body">
				                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
				                                    <thead>
				                                        <tr>
				                                            <th>ClassName</th>
				                                            <th>Quantitée</th>
				                                            <th>Type</th>
				                                        </tr>
				                                    </thead>
				                                    <tbody>
				                                        <tr>
				                                            <td>Tiger Nixon</td>
				                                            <td>687</td>
				                                            <td>Civil</td>
				                                        </tr>
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
				            <!-- Iventaire Vehicule Fin -->
		</div>
</div>
<?php } else { ?>
	<div class="content">
		<h1>Véhicule Introuvable</h1>
	</div>
<?php }} else { ?>
    <div class="content">
        <h1>Acces Refusé !</h1>
    </div>
<?php } ?>
        <!-- .content -->

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