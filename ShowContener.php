<?php
session_name('ArmaPanel');
session_start();
include('include/actualise.php');
$PageName = "Information Maison";

$PageIndex = "Tableau De Bord";
$PageIndexLink = "index.php";

$PageIndexTwo = "Conteneurs";
$PageIndexTwoLink = "conteneurs.php";

$jsonStr = file_get_contents("include/config/config.json");
$config = json_decode($jsonStr, true);


$error = null;
if (isset($_GET['id'])) {
	$ID = htmlspecialchars($_GET['id']);
	if ($ID === null || !ctype_digit($ID)) $error = "InvalideUID";
	else {
		include('include/connexiondb_Serveur.php');
		$reponse = $serveur_bdd->query("SELECT * FROM containers WHERE id='$ID'");
		$donnees = $reponse->fetch();

		if ($donnees['id'] == null) $error = "InvalideUID";
	}
}


function GetUserExtrem($pid, $link = false) {
	include('include/connexiondb_Serveur.php');
	$reponse = $serveur_bdd->query("SELECT * FROM players WHERE pid='$pid'");
	$playerData = $reponse->fetch();
	if ($link) {
		return "<a href=\"ShowUser.php?uid=".$playerData['pid']."\">".$playerData['name']."</a>";
	} else {
		return $playerData['name'];
	}
}

// Check Permissions
$Acces = false;
if ($PERM_View_Home) $Acces = true;

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
                                    <strong class="card-title" v-if="headerText">Info du bien immobilier</strong>
                                </div>
                                <div class="card-body">
                                <div class="col-md-4">
			                        <aside class="profile-nav alt">
			                            <section class="card">
			                                <div class="card-header user-header alt bg-dark">
			                                    <div class="media">
			                                        <div class="media-body">
			                                            <h2 class="text-light display-6 text-center"><?= "Conteneur"."<br>de</br>".GetUserExtrem($donnees['pid']) ?></h2>
			                                        </div>
			                                    </div>
			                                </div>


			                                <ul class="list-group list-group-flush">
			                                    <li class="list-group-item">
			                                        <i class="fa fa-bars"></i> <strong class="card-title"> ID : <?= $donnees['id']?></strong>
			                                    </li>
			                                    <li class="list-group-item">
			                                        <i class="fa fa-id-card-o"></i> <strong class="card-title"> Propriétaire : <?= GetUserExtrem($donnees['pid'], true) ?></strong>
			                                    </li>
			                                    <li class="list-group-item">
			                                        <i class="fa fa-car"></i> <strong class="card-title"> Inventaire : FAIS CE BOUTON LÉO!!!</strong>
			                                    </li>
			                                    <li class="list-group-item">
			                                        <i class="fa fa-car"></i> <strong class="card-title"> Pos : <?= $donnees['pos']?></strong>
			                                    </li>
			                                    <li class="list-group-item">
			                                        <i class="fa fa-car"></i> <strong class="card-title"> Date de Création : <?= $donnees['insert_time']?></strong>
			                                    </li>
			                                    <?php if ($PERM_Edit_Container) { ?>
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
<?php if ($PERM_Edit_Container) { ?>
    <!-- Modal Supprimer Début -->
    <div class="modal fade show" id="mediummodalsuprr" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="smallmodalLabel">Confirmation</h5>
				</div>
				<div class="modal-body">
					<p>
					Voulez vous vraiment supprimer ce conteneur ?
					</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Anuler</button>
                    <a href="functions/delContainer.php?id=<?= $donnees['id']?>&pid=<?= $donnees['pid']?>"><button type="submit" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"> </i> Confirmer</button></a>
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
		<h1>Conteneur Introuvable</h1>
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