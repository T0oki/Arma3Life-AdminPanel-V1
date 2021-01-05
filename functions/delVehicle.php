<?php
session_name('ArmaPanel');
session_start();
include('../include/actualise.php');

$Acces = false;
if ($PERM_Edit_Vehicle) $Acces = true;

if ($Acces) {
	if (isset($_GET['id']) && isset($_GET['pid'])) {
		$id = $_GET['id'];
		$pid = $_GET['pid'];

		include('../include/connexiondb_Serveur.php');
	  	$reponse = $serveur_bdd->query("SELECT * FROM vehicles WHERE id='$id'");
  		$donnees = $reponse->fetch();
		
		if ($donnees['id'] === $id) {
			include("../include/Logs.php");
			$Logs = new Logs;
	      	$Logs->add($_SESSION['Nom'], 'delVehicle', $donnees['classname']."]-[".$donnees['pid']);

	      	$serveur_bdd->query("DELETE FROM vehicles WHERE id='$id'");

			header('location: ../ShowUser.php?uid='.$pid);
		} else echo "Véhiule Introuvable";

	} else echo "Une erreur est survenue, ID not defined";
} else header('location: ../index.php');
?>