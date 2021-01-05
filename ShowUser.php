<?php
session_name('ArmaPanel');
session_start();
include('include/actualise.php');
$PageName = "Information Joueur";

$PageIndex = "Tableau De Bord";
$PageIndexLink = "index.php";

$PageIndexTwo = "Joueurs";
$PageIndexTwoLink = "joueurs.php";

$jsonStr = file_get_contents("include/config/config.json");
$config = json_decode($jsonStr, true);
$NomGrades = $config['rank'];
define("NomGear", $config['gear']);


$error = null;
if (isset($_GET['uid'])) $UID = htmlspecialchars($_GET['uid']);

if ($UID === null || !ctype_digit($UID)) $error = "NoUID";
else {
	include('include/connexiondb_Serveur.php');
	$reponse = $serveur_bdd->query("SELECT * FROM players WHERE pid='$UID'");
	$donnees = $reponse->fetch();

	if ($donnees['pid'] == null) $error = "InvalideUID";
	else {
		if (isset($NomGrades['cop'][$donnees['coplevel']])) $CopLevel = $NomGrades['cop'][$donnees['coplevel']];
	else $CopLevel = $donnees['coplevel'];
	if (isset($NomGrades['medic'][$donnees['mediclevel']])) $MedicLevel = $NomGrades['medic'][$donnees['mediclevel']];
	else $MedicLevel = $donnees['mediclevel'];
		if (isset($NomGrades['admin'][$donnees['adminlevel']])) $AdminLevel = $NomGrades['admin'][$donnees['adminlevel']];
	else $AdminLevel = $donnees['adminlevel'];

	$aliases = $donnees['aliases'];
	$aliases = str_replace('"[`', "", $aliases);
	$aliases = str_replace('`]"', "", $aliases);

	$PlayTime = $donnees['playtime'];
	$PlayTime = str_replace('"[', "", $PlayTime);
	$PlayTime = str_replace(']"', "", $PlayTime);
	$PlayTime = explode(",", $PlayTime);
	$PlayTime = $PlayTime[0]+$PlayTime[1]+$PlayTime[2];
	$PlayTime = $PlayTime."Minutes";

	$GangRequest = $serveur_bdd->query("SELECT * FROM gangs WHERE members LIKE '%$UID%' AND active=1");
	$GangRequest = $GangRequest->fetch();

	if ($GangRequest['id']) { $GangButton = "<a href=\"ShowGang.php?id=".$GangRequest['id']."\"><button type=\"button\" class=\"btn btn-outline-primary\" mb-1>".$GangRequest['name']."</button></a>"; }
	else { $GangButton = "<button type=\"button\" class=\"btn btn-outline-danger\" disabled=\"\">Aucun</button>"; }
	}                                        
}

// Check Permissions
$Acces = false;
if ($PERM_View_User) $Acces = true;

?>


<!doctype html>
<html class="no-js" lang="">
<head>
    <?php include('include/head.php'); ?>
    <link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
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
			if ($error !== null) {
		?>
	        <div class="content text-center ">
	            <div class="col-lg-6 ">
	                <div class="card">
	                    <div class="card-header">
	                        <strong>Recherche</strong>
	                    </div>
	                    <div class="card-body card-block">
	                        <form method="get" class="form-horizontal">
	                            <div class="row form-group">
	                                <div class="col col-md-12">
	                                    <div class="input-group">
	                                        <div class="input-group-btn">
	                                            <button class="btn btn-primary"><i class="fa fa-search"></i> Rechercher</button>
	                                        </div>
	                                        <input type="text" id="uid" name="uid" placeholder="Player ID" class="form-control">
	                                    </div>
	                                </div>
	                            </div>
	                        </form>
	                        <?php if ($error === "InvalideUID") { ?><button type="button" class="btn btn-outline-danger btn-lg btn-block">Utilisateur Introuvable</button><?php } ?>
	                    </div>
	                </div>
	            </div>
	        </div>
		<?php } else { ?>
        <div class="content">
            <div class="animated fadeIn">
                <div class="ui-typography">
                    <div class="row"><!-- Information Joueur Debut -->
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title" v-if="headerText">Data Joueur</strong>
                                </div>
                                <div class="card-body">
                                <div class="col-md-4">
			                        <aside class="profile-nav alt">
			                            <section class="card">
			                                <div class="card-header user-header alt bg-dark">
			                                    <div class="media">
			                                        <div class="media-body">
			                                            <h2 class="text-light display-6 text-center"><?= $donnees['name'] ?></h2>
			                                            <p class="text-center">Profile</p>
			                                        </div>
			                                    </div>
			                                </div>
			                                <ul class="list-group list-group-flush">
			                                	<li class="list-group-item">
			                                        <i class="fa fa-clock-o"></i> <strong class="card-title">Temps Jouer :</strong> <?= $PlayTime ?>
			                                    </li>
			                                    <li class="list-group-item">
			                                        <i class="fa fa-clock-o"></i> <strong class="card-title">Première connexion :</strong> <?= $donnees['insert_time'] ?>
			                                    </li>
			                                    <li class="list-group-item">
			                                        <i class="fa fa-user"></i> <strong class="card-title">Alias :</strong> <?= $aliases ?>
			                                    </li>
			                                    <li class="list-group-item">
			                                        <i class="fa fa-id-card-o"></i> <strong class="card-title">Player ID :</strong> <?= $donnees['pid'] ?>
			                                    </li>
			                                    <li class="list-group-item">
			                                        <i class="fa fa-money"></i> <strong class="card-title">Argent Cash :</strong> <?= strrev(wordwrap(strrev($donnees['cash']), 3, '.', true)) ?> €
			                                    </li>
			                                    <li class="list-group-item">
			                                        <i class="fa fa-university"></i> <strong class="card-title">Banque :</strong> <?= strrev(wordwrap(strrev($donnees['bankacc']), 3, '.', true)) ?> €
			                                    </li>
			                                    <li class="list-group-item">
			                                        <i class="fa fa-coffee"></i> <strong class="card-title">Cop Level :</strong> <?= $CopLevel ?>
			                                    </li>
			                                    <li class="list-group-item">
			                                        <i class="fa fa-user-md"></i> <strong class="card-title">Medic Level :</strong> <?= $MedicLevel ?>
			                                    </li>
			                                    <li class="list-group-item">
			                                        <i class="fa fa-user-plus"></i> <strong class="card-title">Admin Level :</strong> <?= $AdminLevel ?>
			                                    </li>
			                                    <li class="list-group-item">
			                                        <i class="fa fa-briefcase"></i> <strong class="card-title">Inventaire : </strong><button type="button" class="btn btn-outline-primary mb-1" data-toggle="modal" data-target="#scrollmodal">Ouvrir</button>
			                                    </li>
			                                    <li class="list-group-item">
			                                        <i class="fa fa-briefcase"></i> <strong class="card-title">Licence : </strong><button type="button" class="btn btn-outline-primary mb-1" data-toggle="modal" data-target="#scrollmodallicence">Ouvrir</button>
			                                    </li>
			                                    <?php if ($PERM_View_Gang) { ?>
			                                    	<li class="list-group-item">
				                                        <i class="fa fa-users"></i> <strong class="card-title">Gang : </strong><?=$GangButton?>
				                                    </li>
			                                    <?php } ?>
			                                    <?php if ($PERM_Edit_User) { ?>
			                                    	<li class="list-group-item">
				                                        <strong class="card-title"></strong><button type="button" class="btn btn-outline-primary mb-1" data-toggle="modal" data-target="#scrollmodaledition"><i class="fa fa-cogs"></i> Editer</button>
				                                    </li>
			                                    <?php } ?>
			                                </ul>

			                            </section>
			                        </aside>
                    			</div>
                    			<!-- Iventaire Civil Debut -->
					            <div class="modal fade" id="scrollmodal" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
					                <div class="modal-dialog modal-lg" role="document">
					                    <div class="modal-content">
					                        <div class="modal-header">
					                            <h5 class="modal-title" id="scrollmodalLabel">Inventaire de <?= $donnees['name'] ?></h5>
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
					                                            <th>nom</th>
					                                            <th></th>
					                                        </tr>
					                                    </thead>
					                                    <tbody>
					                                    	<?php
					                                    		$Inventory = GetInventory($donnees['civ_gear']);
					                                    		$ToSend = "";
/*
$json["uniform"] = $string[0];						Uniforme 							-> Inventaire
$json["vest"] = $string[1];							ParBale, Veste 						-> Inventaire
$json["backpack"] = $string[2];						Sac A Dos							-> Inventaire
$json["goggles"] = $string[3];						Lunettes
$json["headgear"] = $string[4];						Chapeau
$json["assignedITems"] = $string[5];				Map Compas Montre, ...
$json["primaryWeapon"] = $string[6];				Arme Principale
$json["handgunWeapon"] = $string[7];				Arme Secondaire
$json["uniformItems"] = $string[8];					Items dans L'uniforme 					-> Inventaire Uniforme
$json["uniformMagazines"] = $string[9];				Munitions dans L'uniforme 				-> Inventaire Uniforme
$json["backpackItems"] = $string[10];				Item dans le Sac A Dos 					-> Inventaire Sac
$json["backpackMagazines"] = $string[11];			Munitions dans le Sac A Dos 			-> Inventaire Sac
$json["vestItems"] = $string[12];					Items dans la veste 					-> Inventaire Veste
$json["vestMagazines"] = $string[13];				Munitions dans la Veste 				-> Inventaire Veste
$json["primaryWeaponItems"] = $string[14];			équipement Arme Principale 				-> Éléments armes
$json["handgunItems"] = $string[15];				équipement Arme Secondaire 				-> Éléments armes
$json["virtualItems"] = $string[16];				Inventaire Vitruel (T)
*/
					                                    		function plein (string $ModaleName) {
					                                    			return "<button type=\"button\" class=\"btn btn-outline-primary mb-1\" data-toggle=\"modal\" data-target=\"#".$ModaleName."\">Ouvrir</button>";
					                                    		}
					                                    		$Vide = "<button type=\"button\" class=\"btn btn-outline-danger\" disabled=\"\">Vide</button>";
					                                    		if ($Inventory['virtualItems']) { $OpenVirtual = plein("ModalvitrualItem"); }
					                                    		else { $OpenVirtual = $Vide; }
					                                    		if ($Inventory['vestItems'] || $Inventory['vestMagazines']) { $OpenVeste = plein("ModaleVeste"); }
					                                    		else { $OpenVeste = $Vide; }
					                                    		if ($Inventory['backpackItems'] || $Inventory['backpackMagazines']) { $OpenBackPack = plein("ModalBackPack"); }
					                                    		else { $OpenBackPack = $Vide; }
					                                    		if ($Inventory['uniformItems'] || $Inventory['uniformMagazines']) { $OpenUniforme = plein("ModalUniforme"); }
					                                    		else { $OpenUniforme = $Vide; }
					                                    		if ($Inventory['primaryWeaponItems']) { $PrimaryAdds = plein("ModalePrimaryWeapon"); }
					                                    		else { $PrimaryAdds = $Vide; }
					                                    		if ($Inventory['handgunItems']) { $SecondaryAdds = plein("ModalSecondaryWeapon"); }
					                                    		else { $SecondaryAdds = $Vide; }

					                                    		addColumnInventoryGlobal("Inventaire Virtuel", $OpenVirtual);
					                                    		if ($Inventory['primaryWeapon']) addColumnInventoryGlobal($Inventory['primaryWeapon'], $PrimaryAdds, "armes", "ArmePrincipale");
					                                    		if ($Inventory['handgunWeapon']) addColumnInventoryGlobal($Inventory['handgunWeapon'], $SecondaryAdds, "armes", "ArmeSecondaire");
					                                    		if ($Inventory['uniform']) addColumnInventoryGlobal($Inventory['uniform'], $OpenUniforme, "tenue", "Uniforme");
					                                    		if ($Inventory['vest']) addColumnInventoryGlobal($Inventory['vest'], $OpenVeste, "tenue", "Veste");
					                                    		if ($Inventory['backpack']) addColumnInventoryGlobal($Inventory['backpack'], $OpenBackPack, "tenue", "Sac");
					                                    		if ($Inventory['goggles']) addColumnInventoryGlobal($Inventory['goggles'], "", "tenue", "Lunettes");
					                                    		if ($Inventory['headgear']) addColumnInventoryGlobal($Inventory['headgear'], "", "tenue", "Chapeau");
					                                    		if ($Inventory['assignedITems']) {
					                                    			foreach ($Inventory['assignedITems'] as $OneItem) {
					                                    				addColumnInventoryGlobal($OneItem, "");
					                                    			}
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
					            <!-- Iventaire Civil Fin -->
					            <!-- Licence Debut -->
					            <div class="modal fade" id="scrollmodallicence" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
					                <div class="modal-dialog modal-lg" role="document">
					                    <div class="modal-content">
					                        <div class="modal-header">
					                            <h5 class="modal-title" id="scrollmodalLabel">Licence de <?= $donnees['name'] ?></h5>
					                        </div>
					                        <div class="modal-body">
					                            <div class="col-md-12">
					                        

<?php 
$reponse = $serveur_bdd->query("SELECT pid,civ_licenses,cop_licenses,med_licenses from players WHERE pid='$UID'");
$retour = $reponse->fetch();
if (!isset($retour[0])) {
                return "";
            }
            $LicensesJS = [];
            $ValuesJS = [];
           	$TypeJS = [];

            $puid = $retour['pid'];
            $TableaHead = "<div class=\"card\"><div class=\"card-header\"><strong class=\"card-title\">";
            $TableaHead2 = "</strong></div><div class=\"card-body\"><table id=\"bootstrap-data-table\" class=\"table table-striped table-bordered\"><thead><tr><th>Licence</th><th>État</th></tr></thead><tbody>";
            $TableauFoot = "</tbody></table></div></div>";

            $civ_Array = $retour['civ_licenses'];

            $CardName = "Licences Civil";
            $str = $TableaHead.$CardName.$TableaHead2;
            if ($civ_Array !== '"[]"') {
                $civ_Array = str_replace('`', "", $civ_Array);
                $civ_Array = str_replace('"', "", $civ_Array);
                $civ_Array = str_replace('[[', "[", $civ_Array);
                $civ_Array = str_replace(']]', "]", $civ_Array);
                $civ_Array = str_replace('],[', "|", $civ_Array);
                $civ_Array = str_replace(']', "", $civ_Array);
                $civ_Array = str_replace('[', "", $civ_Array);
                $civ_Array = str_replace('license_civ_', "", $civ_Array);
                $civ_Array = explode("|", $civ_Array);

                foreach ($civ_Array as $key => $value) {
                    $civ_Array[$key] = explode(",", $value);
                }
                foreach ($civ_Array as $value) {
                    $str = $str."<tr>";
                    if (intval($value[1]) === 0) {
                        $eta = "<h5><span id=\"Badge".$value[0]."\" class=\"badge badge-pill badge-warning\">Non possédé</span></h5>";
                    } else {
                        $eta = "<h5><span id=\"Badge".$value[0]."\" class=\"badge badge-pill badge-success\">Possédé</span></h5>";
                    }
                    if ($PERM_Edit_Licence) {
                    	$str = $str."<td>".$value[0]."</td><td><span id =\"EditLicense".$value[0]."\">".$eta."</span></td></tr>";
                    } else {
                    	$str = $str."<td>".$value[0]."</td><td>".$eta."</td></tr>";
                    }
                    array_push($LicensesJS, ["License" => $value[0], "Type" => "civ"]);
                }
            }
            $str = $str.$TableauFoot;
            echo $str;

            $cop_Array = $retour['cop_licenses'];


            $CardName = "Licences Gendarme";
            $str = $TableaHead.$CardName.$TableaHead2;
            if ($cop_Array !== '"[]"') {
                $cop_Array = str_replace('`', "", $cop_Array);
                $cop_Array = str_replace('"', "", $cop_Array);
                $cop_Array = str_replace('[[', "[", $cop_Array);
                $cop_Array = str_replace(']]', "]", $cop_Array);
                $cop_Array = str_replace('],[', "|", $cop_Array);
                $cop_Array = str_replace(']', "", $cop_Array);
                $cop_Array = str_replace('[', "", $cop_Array);
                $cop_Array = str_replace('license_cop_', "", $cop_Array);
                $cop_Array = explode("|", $cop_Array);

                foreach ($cop_Array as $key => $value) {
                    $cop_Array[$key] = explode(",", $value);
                }
                foreach ($cop_Array as $value) {
                    $str = $str."<tr>";
                    if (intval($value[1]) === 0) {
                        $eta = "<h5><span id=\"Badge".$value[0]."\" class=\"badge badge-pill badge-warning\">Non possédé</span></h5>";
                    } else {
                        $eta = "<h5><span id=\"Badge".$value[0]."\" class=\"badge badge-pill badge-success\">Possédé</span></h5>";
                    }
                    if ($PERM_Edit_Licence) {
                    	$str = $str."<td>".$value[0]."</td><td><span id =\"EditLicense".$value[0]."\">".$eta."</span></td></tr>";
                    } else {
                    	$str = $str."<td>".$value[0]."</td><td>".$eta."</td></tr>";
                    }
                    array_push($LicensesJS, ["License" => $value[0], "Type" => "cop"]);
                }
            }
            $str = $str.$TableauFoot;
            echo $str;

            $med_Array = $retour['med_licenses'];

            $CardName = "Licences Médecin";
            $str = $TableaHead.$CardName.$TableaHead2;
            if ($med_Array !== '"[]"') {
                $med_Array = str_replace('`', "", $med_Array);
                $med_Array = str_replace('"', "", $med_Array);
                $med_Array = str_replace('[[', "[", $med_Array);
                $med_Array = str_replace(']]', "]", $med_Array);
                $med_Array = str_replace('],[', "|", $med_Array);
                $med_Array = str_replace(']', "", $med_Array);
                $med_Array = str_replace('[', "", $med_Array);
                $med_Array = str_replace('license_med_', "", $med_Array);
                $med_Array = explode("|", $med_Array);

                foreach ($med_Array as $key => $value) {
                    $med_Array[$key] = explode(",", $value);
                }
                foreach ($med_Array as $value) {
                    $str = $str."<tr>";
                    if (intval($value[1]) === 0) {
                        $eta = "<h5><span id=\"Badge".$value[0]."\" class=\"badge badge-pill badge-warning\">Non possédé</span></h5>";
                    } else {
                        $eta = "<h5><span id=\"Badge".$value[0]."\" class=\"badge badge-pill badge-success\">Possédé</span></h5>";
                    }
                    if ($PERM_Edit_Licence) {
                    	$str = $str."<td>".$value[0]."</td><td><span id =\"EditLicense".$value[0]."\">".$eta."</span></td></tr>";
                    } else {
                    	$str = $str."<td>".$value[0]."</td><td>".$eta."</td></tr>";
                    }
                    array_push($LicensesJS, ["License" => $value[0], "Type" => "med"]);
                }
            }
            $str = $str.$TableauFoot;
            echo $str;

            
?>
					                    </div>
					                        </div>
					                        <div class="modal-footer">
					                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
					                        </div>
					                    </div>
					                </div>
					            </div>
					            <!-- Liste Licence Fin -->
                    			</div>
                            </div>
                        </div>
                    </div>
                    <!-- Information Joueur Fin -->

                    <!-- Information Vehicule Debut -->
					<?php if ($PERM_View_Vehicle) { ?>
					<div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title" v-if="headerText">Data Véhicule</strong>
                                </div>
                                <div class="card-body">
                                  	<div class="typo-headers">
                                    	<h2 class="pb-2 display-5">Liste des Véhicules</h2>
                                	</div>
                                <br>
                                <div class="col-md-12">
			                        <div class="card">
			                            <div class="card-body">
			                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
			                                    <thead>
			                                        <tr>
			                                        	<th>ID</th>
			                                            <th>Classe Name</th>
			                                            <th>Type</th>
			                                            <th>Side</th>
			                                            <th>Edititon</th>
			                                        </tr>
			                                    </thead>
			                                    <tbody>
			                                    	<?php 
			                                    		$reponse = $serveur_bdd->query("SELECT * FROM vehicles WHERE pid=$UID");
				                                        while ($donneesVehicule = $reponse->fetch())
				                                        {
				                                        	if (isset($config['vehicules']['classname'][$donneesVehicule['classname']])) $Name = $config['vehicules']['classname'][$donneesVehicule['classname']];
				                                        	else $Name = $donneesVehicule['classname'];
			                                    	?>
			                                        <tr>
			                                        	<td><?= $donneesVehicule['id'] ?></td>
			                                            <td><?= $Name ?></td>
			                                            <td><?= $config['vehicules']['type'][$donneesVehicule['type']] ?></td>
			                                            <td><?= $config['vehicules']['side'][$donneesVehicule['side']] ?></td>
			                                            <td><a href="ShowVehicle.php?id=<?= $donneesVehicule['id'] ?>"><button type="button" class="btn btn-outline-primary mb-1">Editer</button></a></td>
			                                        </tr>
			                                        <?php } ?>
			                                    </tbody>
			                                </table>
			                            </div>
			                        </div>
                    			</div>
                    			</div>
                            </div>
                        </div>
                    </div>
					<?php } ?>
                    <!-- Information Vehicule Fin -->

                    <!-- Information Maison Debut -->
					<?php if ($PERM_View_Home) { ?>
					<div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title" v-if="headerText">Data Maison & Conteneur</strong>
                                </div>
                                <div class="card-body">
                                  	<div class="typo-headers">
                                    	<h2 class="pb-2 display-5">Liste des Maisons et des Conteneurs</h2>
                                	</div>
                                <br>
                                <div class="col-md-12">
			                        <div class="card">
			                            <div class="card-body">
			                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
			                                    <thead>
			                                        <tr>
			                                        	<th>ID</th>
			                                            <th>Coordonées GPS</th>
			                                            <th>Type</th>
			                                            <th>Edititon</th>
			                                        </tr>
			                                    </thead>
			                                    <tbody>
			                                    	<?php 
			                                    		$reponse = $serveur_bdd->query("SELECT * FROM houses WHERE pid=$UID");
				                                        while ($donneesMaison = $reponse->fetch())
				                                        {
			                                    	?>
			                                        <tr>
			                                        	<td><?= $donneesMaison['id'] ?></td>
			                                            <td><?= $donneesMaison['pos'] ?></td>
			                                            <td><?= $config['maison'][$donneesMaison['garage']] ?></td>
			                                            <td><a href="ShowHouse.php?id=<?= $donneesMaison['id'] ?>"><button type="button" class="btn btn-outline-primary mb-1">Editer</button></a></td>
			                                        </tr>
			                                        <?php } ?>
			                                        <?php 
			                                    		$reponse = $serveur_bdd->query("SELECT * FROM containers WHERE pid=$UID");
				                                        while ($doneesConteneur = $reponse->fetch())
				                                        {
			                                    	?>
			                                        <tr>
			                                        	<td><?= $doneesConteneur['id'] ?></td>
			                                            <td><?= $doneesConteneur['pos'] ?></td>
			                                            <td>Conteneur</td>
			                                            <td><a href="ShowContener.php?id=<?= $doneesConteneur['id'] ?>"><button type="button" class="btn btn-outline-primary mb-1">Editer</button></a></td>
			                                        </tr>
			                                        <?php } ?>
			                                    </tbody>
			                                </table>
			                            </div>
			                        </div>
                    			</div>
                    			</div>
                            </div>
                        </div>
                    </div>
					<?php } ?>
                    <!-- Information Vehicule Fin -->
                    <!-- édition membre -->
        <div class="modal fade" id="scrollmodaledition" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="scrollmodalLabel">Panel d'édition</h5>
                    </div>
                    <div class="modal-body">
						<div class="col-lg-13">
	                        <div class="card">
	                            <div class="card-header">
	                                <strong>Formulaire</strong> d'edition
	                            </div>
	                            <div class="card-body card-block">
	                                <form action="functions/EditPlayer.php" method="post" class="form-horizontal">
	                                	<input style="display: none;" type="text" name="uid" value="<?= $donnees['pid']?>">
	                                	<div class="row form-group">
	                                        <div class="col col-md-3"><label class=" form-control-label">Nom :</label></div>
	                                        <div class="col-12 col-md-9">
	                                            <p class="form-control-static"><?= $donnees['name']?></p>
	                                        </div>
	                                    </div>
	                                    <div class="row form-group">
	                                        <div class="col col-md-3"><label class=" form-control-label">Alias :</label></div>
	                                        <div class="col-12 col-md-9">
	                                            <p class="form-control-static"><?= $aliases?></p>
	                                        </div>
	                                    </div>
	                                    <div class="row form-group">
	                                        <div class="col col-md-3"><label class=" form-control-label">Temps Joueur : </label></div>
	                                        <div class="col-12 col-md-9">
	                                            <p class="form-control-static"><?= $PlayTime?></p>
	                                        </div>
	                                    </div>
	                                    <div class="row form-group">
	                                        <div class="col col-md-3"><label class=" form-control-label">Première connexion :</label></div>
	                                        <div class="col-12 col-md-9">
	                                            <p class="form-control-static"><?= $donnees['insert_time']?></p>
	                                        </div>
	                                    </div>
	                                    <div class="row form-group">
	                                        <div class="col col-md-3"><label class=" form-control-label">Player ID</label></div>
	                                        <div class="col-12 col-md-9">
	                                            <p class="form-control-static"><?= $donnees['pid']?></p>
	                                        </div>
	                                    </div>
	                                    <div class="row form-group">
	                                        <div class="col col-md-3"><label for="cash" class=" form-control-label">Argent Cash :</label></div>
	                                        <div class="col-12 col-md-9"><input value="<?= $donnees['cash']?>" type="text" id="cash" name="cash" placeholder="10000" class="form-control"><small class="form-text text-muted" >Entrée une sommes</small></div>
	                                    </div>
	                                    <div class="row form-group">
	                                        <div class="col col-md-3"><label for="bank" class=" form-control-label">Banque :</label></div>
	                                        <div class="col-12 col-md-9"><input value="<?= $donnees['bankacc']?>" type="text" id="bank" name="bank" placeholder="1000000" class="form-control"><small class="form-text text-muted" >Entrée une sommes</small></div>
	                                    </div>
	                                    <div class="row form-group">
	                                        <div class="col col-md-3"><label for="Select" class=" form-control-label">Cop Level</label></div>
	                                        <div class="col-12 col-md-9">
	                                            <select name="coplevel" id="select" class="form-control">
	                                            	<?php 
	                                            	$AFDS = 0;
	                                            	foreach ($NomGrades['cop'] as $OneGrade) {
	                                            		?>
	                                            		<option value="<?= $AFDS ?>"<?php SelectedCop($AFDS, $donnees['coplevel'])?>><?= $OneGrade?></option>
	                                            		<?php
	                                            		$AFDS++;
	                                            	}
	                                            	?>
	                                            </select>
	                                        </div>
	                                    </div>
	                                    <div class="row form-group">
	                                        <div class="col col-md-3"><label for="password-input" class=" form-control-label">Medic Level</label></div>
	                                        <div class="col-12 col-md-9">
	                                            <select name="mediclevel" id="select" class="form-control">
	                                            	<?php 
	                                            	$AFDS = 0;
	                                            	foreach ($NomGrades['medic'] as $OneGrade) {
	                                            		?>
	                                            		<option value="<?= $AFDS ?>"<?php SelectedCop($AFDS, $donnees['mediclevel'])?>><?= $OneGrade?></option>
	                                            		<?php
	                                            		$AFDS++;
	                                            	}
	                                            	?>
	                                            </select>
	                                        </div>
	                                    </div>
	                                    <?php if ($PERM_Manage_Staff) { ?>
	                                    	<div class="row form-group">
		                                        <div class="col col-md-3"><label for="password-input" class=" form-control-label">Admin Level</label></div>
		                                        <div class="col-12 col-md-9">
		                                            <select name="adminlevel" id="select" class="form-control">
		                                            	<?php 
		                                            	$AFDS = 0;
		                                            	foreach ($NomGrades['admin'] as $OneGrade) {
		                                            		?>
		                                            		<option value="<?= $AFDS ?>"<?php SelectedCop($AFDS, $donnees['adminlevel'])?>><?= $OneGrade?></option>
		                                            		<?php
		                                            		$AFDS++;
		                                            	}
		                                            	?>
		                                            </select>
		                                        </div>
		                                    </div>
	                                	<?php }?>
	                                    <div class="modal-footer">
				                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i>Anuler</button>
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
					            
					            <!-- édition membre fin -->
					            <!-- édition Inventaire Virtuel Début -->

			<div class="modal fade" id="ModalvitrualItem" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediumModalLabel">Inventaire Virtuel</h5>
                        </div>
                        <div class="modal-body">
                            <div class="box-body">
					              <table id="example2" class="table table-bordered table-hover">
					                <thead>
					                <tr>
					                  <th>Item</th>
					                  <th>Quantité</th>
					                </tr>
					                </thead>
					                <tbody>
					                	<?php
					                		$Inv = GetInventory($donnees['civ_gear']);
					                		if (!empty($Inv['virtualItems'])) {
					                			$Inv = $Inv['virtualItems'];
						                		foreach ($Inv as $Item) {
						                			if (isset(NomGear['virtual_item'][$Item[0]])){
						                				$name = NomGear['virtual_item'][$Item[0]];
						                			} else $name = $Item[0];
						                			
						                			echo "<tr><td>$name</td>";
						                			echo "<td>$Item[1]</td></tr>";
						                		}
					                		}
					                	?>
					                </tbody>
					              </table>
				            </div>
                    	</div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i>Fermer</button>
                        </div>
                    </div>
                </div>
            </div>
            		<!-- édition Inventaire Virtuel Fin -->
            		<!-- édition Veste Début -->

			<div class="modal fade" id="ModaleVeste" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediumModalLabel">Inventaire du Gillet / Veste</h5>
                        </div>
                        <div class="modal-body">
                            <div class="box-body">
					              <table id="example2" class="table table-bordered table-hover">
					                <thead>
						                <tr>
						                  <th>Item</th>
						                  <th>Quantité</th>
						                </tr>
					                </thead>
					                <tbody>
						                <?php
					                		$Inv = GetInventory($donnees['civ_gear']);
					                		if (!empty($Inv['vestItems'])) {
					                			$Inv = $Inv['vestItems'];
					                			$Invjson = [];
						                		foreach ($Inv as $Item) {
						                			if (isset($Invjson[$Item])) {
						                				$Invjson[$Item]['amount'] += 1;
						                			} else {
						                				$Invjson[$Item]['name'] = $Item;
						                				$Invjson[$Item]['amount'] = 1;
						                			}
						                		}
						                		foreach ($Invjson as $Item) {
						                			echo "<tr><td>".$Item['name']."</td><td>".$Item['amount']."</td></tr>";
						                		}
					                		}
					                		$Inv = GetInventory($donnees['civ_gear']);
					                		if (!empty($Inv['vestMagazines'])) {
					                			$Inv = $Inv['vestMagazines'];
					                			$Invjson = [];
						                		foreach ($Inv as $Item) {
						                			if (isset($Invjson[$Item])) {
						                				$Invjson[$Item]['amount'] += 1;
						                			} else {
						                				$Invjson[$Item]['name'] = $Item;
						                				$Invjson[$Item]['amount'] = 1;
						                			}
						                		}
						                		foreach ($Invjson as $Item) {
						                			echo "<tr><td>".$Item['name']."</td><td>".$Item['amount']."</td></tr>";
						                		}
					                		}
					                	?>
					                </tbody>
					              </table>
					            </div>
                        	</div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i>Fermer</button>
                        </div>
                    </div>
                </div>
            </div>
            		<!-- édition Veste Fin -->
            		<!-- édition BackPack Début -->

			<div class="modal fade" id="ModalBackPack" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediumModalLabel">Inventaire du Sac à Dos</h5>
                        </div>
                        <div class="modal-body">
                            <div class="box-body">
					              <table id="example2" class="table table-bordered table-hover">
					                <thead>
						                <tr>
						                  <th>Item</th>
						                  <th>Quantité</th>
						                </tr>
					                </thead>
					                <tbody>
						                <?php
					                		$Inv = GetInventory($donnees['civ_gear']);
					                		if (!empty($Inv['backpackItems'])) {
					                			$Inv = $Inv['backpackItems'];
					                			$Invjson = [];
						                		foreach ($Inv as $Item) {
						                			if (isset($Invjson[$Item])) {
						                				$Invjson[$Item]['amount'] += 1;
						                			} else {
						                				$Invjson[$Item]['name'] = $Item;
						                				$Invjson[$Item]['amount'] = 1;
						                			}
						                		}
						                		foreach ($Invjson as $Item) {
						                			echo "<tr><td>".$Item['name']."</td><td>".$Item['amount']."</td></tr>";
						                		}
					                		}
					                		$Inv = GetInventory($donnees['civ_gear']);
					                		if (!empty($Inv['backpackMagazines'])) {
					                			$Inv = $Inv['backpackMagazines'];
					                			$Invjson = [];
						                		foreach ($Inv as $Item) {
						                			if (isset($Invjson[$Item])) {
						                				$Invjson[$Item]['amount'] += 1;
						                			} else {
						                				$Invjson[$Item]['name'] = $Item;
						                				$Invjson[$Item]['amount'] = 1;
						                			}
						                		}
						                		foreach ($Invjson as $Item) {
						                			echo "<tr><td>".$Item['name']."</td><td>".$Item['amount']."</td></tr>";
						                		}
					                		}
					                	?>
					                </tbody>
					              </table>
					            </div>
                        	</div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i>Fermer</button>
                        </div>
                    </div>
                </div>
            </div>
            		<!-- édition BackPack Fin -->
            		<!-- édition Uniforme Début -->

			<div class="modal fade" id="ModalUniforme" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediumModalLabel">Inventaire de l'Uniforme</h5>
                        </div>
                        <div class="modal-body">
                            <div class="box-body">
					              <table id="example2" class="table table-bordered table-hover">
					                <thead>
						                <tr>
						                  <th>Item</th>
						                  <th>Quantité</th>
						                </tr>
					                </thead>
					                <tbody>
					                	<?php
					                		$Inv = GetInventory($donnees['civ_gear']);
					                		if (!empty($Inv['uniformItems'])) {
					                			$Inv = $Inv['uniformItems'];
					                			$Invjson = [];
						                		foreach ($Inv as $Item) {
						                			if (isset($Invjson[$Item])) {
						                				$Invjson[$Item]['amount'] += 1;
						                			} else {
						                				$Invjson[$Item]['name'] = $Item;
						                				$Invjson[$Item]['amount'] = 1;
						                			}
						                		}
						                		foreach ($Invjson as $Item) {
						                			echo "<tr><td>".$Item['name']."</td><td>".$Item['amount']."</td></tr>";
						                		}
					                		}
					                		$Inv = GetInventory($donnees['civ_gear']);
					                		if (!empty($Inv['uniformMagazines'])) {
					                			$Inv = $Inv['uniformMagazines'];
					                			$Invjson = [];
						                		foreach ($Inv as $Item) {
						                			if (isset($Invjson[$Item])) {
						                				$Invjson[$Item]['amount'] += 1;
						                			} else {
						                				$Invjson[$Item]['name'] = $Item;
						                				$Invjson[$Item]['amount'] = 1;
						                			}
						                		}
						                		foreach ($Invjson as $Item) {
						                			echo "<tr><td>".$Item['name']."</td><td>".$Item['amount']."</td></tr>";
						                		}
					                		}
					                	?>
					                </tbody>
					              </table>
					            </div>
                        	</div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i>Fermer</button>
                        </div>
                    </div>
                </div>
            </div>
            		<!-- édition Uniforme Fin -->
            		<!-- édition PrimaryWeapon Début -->

			<div class="modal fade" id="ModalePrimaryWeapon" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediumModalLabel">Equipement de l'Arme Principal</h5>
                        </div>
                        <div class="modal-body">
                            <div class="box-body">
					              <table id="example2" class="table table-bordered table-hover">
					                <thead>
						                <tr>
						                  <th>Type</th>
						                  <th>Nom</th>
						                </tr>
					                </thead>
					                <tbody>
					                	<?php
					                		$Inv = GetInventory($donnees['civ_gear']);
					                		if (!empty($Inv['primaryWeaponItems'])) {
					                			$Inv = $Inv['primaryWeaponItems'];
						                		?>
						                		<tr>
						                			<td>Silencieux</td>
						                			<td><?= $Inv[0] ?></td>
						                		</tr>
						                		<tr>
						                			<td>Lumières / pointeur</td>
						                			<td><?= $Inv[1] ?></td>
						                		</tr>
						                		<tr>
						                			<td>Optique</td>
						                			<td><?= $Inv[2] ?></td>
						                		</tr>
						                		<tr>
						                			<td>Bipied</td>
						                			<td><?= $Inv[3] ?></td>
						                		</tr>
						                		<?php
					                		}
					                	?>
					                </tbody>
					              </table>
					            </div>
                        	</div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i>Fermer</button>
                        </div>
                    </div>
                </div>
            </div>
            		<!-- édition PrimaryWeapon Fin -->
            		<!-- édition ModalSecondaryWeapon   Début -->

			<div class="modal fade" id="ModalSecondaryWeapon" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediumModalLabel">Equipement de l'Arme Secondaire</h5>
                        </div>
                        <div class="modal-body">
                            <div class="box-body">
					              <table id="example2" class="table table-bordered table-hover">
					                <thead>
						                <tr>
						                  <th>Type</th>
						                  <th>Nom</th>
						                </tr>
					                </thead>
					                <tbody>
						                <?php
					                		$Inv = GetInventory($donnees['civ_gear']);
					                		if (!empty($Inv['handgunItems'])) {
					                			$Inv = $Inv['handgunItems'];
						                		?>
						                		<tr>
						                			<td>Silencieux</td>
						                			<td><?= $Inv[0] ?></td>
						                		</tr>
						                		<tr>
						                			<td>Lumières / pointeur</td>
						                			<td><?= $Inv[1] ?></td>
						                		</tr>
						                		<tr>
						                			<td>Optique</td>
						                			<td><?= $Inv[2] ?></td>
						                		</tr>
						                		<tr>
						                			<td>Bipied</td>
						                			<td><?= $Inv[3] ?></td>
						                		</tr>
						                		<?php
					                		}
					                	?>
					                </tbody>
					              </table>
					            </div>
                        	</div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i>Fermer</button>
                        </div>
                    </div>
                </div>
            </div>
            		<!-- édition ModalSecondaryWeapon   Fin -->

                </div>
            </div>
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
<script>
<?php
if ($PERM_Edit_Licence) {
	foreach ($LicensesJS as $OneLicense) {
		$ToPrintLicence = $OneLicense['License'];
		$ToPrintType = $OneLicense['Type'];
		?>
			$("#EditLicense<?=$ToPrintLicence?>").click(function(){
			 	let value = "0";
			 	if ($('#EditLicense<?=$ToPrintLicence?>').text() === "Possédé") value = "1";
			    $.ajax({
			       url : 'functions/EditLicense.php',
			       type : 'GET',
			       dataType : 'html', // On désire recevoir du HTML
			       data : 'uid=' + '<?=$puid?>' + '&type=' + '<?=$ToPrintType?>' + '&name=' + '<?=$ToPrintLicence?>' + '&value=' + value,
			       success : function(code_html, statut){
				       	if (code_html === "<script language='javascript'>"+"window.close()</"+"script>") {
				       		if ($('#EditLicense<?=$ToPrintLicence?>').text() === "Possédé") {
					       		$('#Badge<?=$ToPrintLicence?>').text("Non possédé");
					       		$('#Badge<?=$ToPrintLicence?>').attr("class", "badge badge-pill badge-warning");
					       	} else {
					       		$('#Badge<?=$ToPrintLicence?>').text("Possédé");
					       		$('#Badge<?=$ToPrintLicence?>').attr("class", "badge badge-pill badge-success");
					       	}
				       	} else {
				       		alert('Erreur !');
					       	
				       	}
			       	}
			    });
			   
			});
		<?php
	}
}
?>
</script>


</body>
</html>
<?php
function GetInventory (string $string) {
		$string = str_replace('"[', "[", $string);
        $string = str_replace(']"', "]", $string);
        $string = str_replace('`', '"', $string);

        if ($string == "[]") {
            return [];
        }

        $string = json_decode($string);

        $json = [];

        $json["uniform"] = $string[0];
        $json["vest"] = $string[1];
        $json["backpack"] = $string[2];
        $json["goggles"] = $string[3];
        $json["headgear"] = $string[4];
        $json["assignedITems"] = $string[5];
        $json["primaryWeapon"] = $string[6];
        $json["handgunWeapon"] = $string[7];
        $json["uniformItems"] = $string[8];
        $json["uniformMagazines"] = $string[9];
        $json["backpackItems"] = $string[10];
        $json["backpackMagazines"] = $string[11];
        $json["vestItems"] = $string[12];
        $json["vestMagazines"] = $string[13];
        $json["primaryWeaponItems"] = $string[14];
        $json["handgunItems"] = $string[15];
        $json["virtualItems"] = $string[16];

        return $json;
}
function addColumnInventoryGlobal($string, $string2, $Categorie = null, $Prefix = null) {
	$GearName="";
	if (isset(NomGear[$Categorie][$string])) $GearName = NomGear[$Categorie][$string];
	else $GearName = $string;
	if (isset($Prefix)) {
		$Prefix = "[".$Prefix."]";
	} else $Prefix="";
	$string = "<tr><td>".$Prefix." ".$GearName."</td><td>".$string2."</td></tr>";
	echo $string;
}

function SelectedCop($int, $CurrentLvl) {
	if ($int == $CurrentLvl) {
		echo "selected";
	}
}
function SelectedMedic($int, $CurrentLvl) {
	if ($int == $CurrentLvl) {
		echo "selected";
	}
}
function SelectedAdmin($int, $CurrentLvl) {
	if ($int == $CurrentLvl) {
		echo "selected";
	}
}
?>