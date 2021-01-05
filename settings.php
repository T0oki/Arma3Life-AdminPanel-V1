<?php
session_name('ArmaPanel');
session_start();
include('include/actualise.php');
$PageName = "Settings";

$PageIndex = "Tableau De Bord";
$PageIndexLink = "index.php";
?>


<!doctype html>
<html class="no-js" lang="">
<head>
    <?php include('include/head.php'); ?>
    <link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">
</head>

<body>
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

        <div class="content">
            <div class="animated fadeIn">

                <div class="ui-typography">
                    <div class="row">
                        <div class="col-md-12">


                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title" v-if="headerText">Paramètre</strong>
                                </div>

                                <div class="card-body">
                                	<div class="typo-headers">
                                    	<h2 class="pb-2 display-5">Information relative à votre compte.</h2>
                                	</div>
                                <div class="typo-articles">
                                    <p>Voici les informations relative à votre compte :</p>

                                </div>
								<div class="col-md-4">
			                        <div class="card">
			                            <div class="card-header">
			                                <strong class="card-title mb-3">Mon Compte</strong>
			                            </div>
			                            <div class="card-body">
			                                <div class="mx-auto d-block">
			                                    <img class="rounded-circle mx-auto d-block" src="images/admin.jpg" alt="Card image cap">
			                                    <h5 class="text-sm-center mt-2 mb-1"><i class="fa fa-user"></i> <?= $_SESSION['Nom'] ?></h5>
			                                    <div class="location text-sm-center"><i class="fa fa-envelope"></i> <?= $_SESSION['Email'] ?></div>
			                                    <hr>
			                                    <div class="locotion text-sm-center"><button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#mediumModal"><i class="fa fa-cogs"> </i> Changer de Mot de Passe </button></div>
			                                </div>
			                                <hr>
			                                <div class="card-text text-sm-center">
			                                    <a href="#"><i class="fa fa-steam pr-1"></i></a> <!-- Faire en sorte que ca redirige vers son compte steam avec son PID -->
			                                </div>
			                            </div>
			                        </div>
			                    </div>

								<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
					                <div class="modal-dialog modal-lg" role="document">
					                    <div class="modal-content">
					                        <div class="modal-header">
					                            <h5 class="modal-title" id="mediumModalLabel">Confirmation</h5>
					                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					                                <span aria-hidden="true">&times;</span>
					                            </button>
					                        </div>
					                        <div class="modal-body">
					                            <p>Veuilliez remplir les champs si-dessous.</p>
					                            <div class="card">
					                            <div class="card-body card-block">
					                                <form action="functions/changeMDP.php" method="post" class="form-horizontal">
					                                    <div class="row form-group">
					                                        <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Actuel</label></div>
					                                        <div class="col-12 col-md-9"><input type="password" id="hf-password" name="password" placeholder="Entez votre mot de passe" class="form-control"></div>
					                                    </div>
					                                    <div class="row form-group">
					                                        <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Nouveau</label></div>
					                                        <div class="col-12 col-md-9"><input type="password" id="new-password" name="new-password" placeholder="Entez le nouveau mot de passe" class="form-control"></div>
					                                    </div>
					                                    <div class="row form-group">
					                                        <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Confirmation</label></div>
					                                        <div class="col-12 col-md-9"><input type="password" id="Confirm-new-password" name="Confirm-new-password" placeholder="Confirmez le nouveau mot de passe" class="form-control"></div>
					                                    </div>
					                            </div>
					                        </div>
					                        </div>
					                        <div class="modal-footer">
					                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Anuler</button>
					                            <button type="submit" class="btn btn-primary">Confirmer</button>
					                        </form>
					                        </div>
					                    </div>
					                </div>

        </div><!-- .content -->

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
