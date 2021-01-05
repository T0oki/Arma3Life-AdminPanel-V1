<?php
session_name('ArmaPanel');
session_start();
include('../include/actualise.php');

$Acces = false;
if ($PERM_Edit_Home) $Acces = true;

if ($Acces) {
	if (isset($_GET['id']) && isset($_GET['pid'])) {
		$id = $_GET['id'];
		$pid = $_GET['pid'];

		include('../include/connexiondb_Serveur.php');
	  	$reponse = $serveur_bdd->query("SELECT * FROM houses WHERE id='$id'");
  		$donnees = $reponse->fetch();
		
		if ($donnees['id'] === $id) {
			include("../include/Logs.php");
			$Logs = new Logs;
			$LogToSend = $donnees['garage']."]-[".$donnees['pid'];
	      	$Logs->add($_SESSION['Nom'], 'delHouse', $LogToSend);

	      	$serveur_bdd->query("DELETE FROM houses WHERE id='$id'");

			header('location: ../ShowUser.php?uid='.$pid);
		} else echo "Maison Introuvable";

	} else echo "Une erreur est survenue, ID not defined";
} else header('location: ../index.php');
?>