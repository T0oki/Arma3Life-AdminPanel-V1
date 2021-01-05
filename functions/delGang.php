<?php
session_name('ArmaPanel');
session_start();
include('../include/actualise.php');

$Acces = false;
if ($PERM_Edit_Gang) $Acces = true;

if ($Acces) {
	if (isset($_GET['id'])) {
		$id = $_GET['id'];

		include('../include/connexiondb_Serveur.php');
	  	$reponse = $serveur_bdd->query("SELECT * FROM gangs WHERE id='$id'");
  		$donnees = $reponse->fetch();
		
		if ($donnees['id'] === $id) {
			include("../include/Logs.php");
			$Logs = new Logs;
	      	$Logs->add($_SESSION['Nom'], 'delGang', $donnees['owner']."]-[".$donnees['bank']);

	      	$serveur_bdd->query("DELETE FROM gangs WHERE id='$id'");

			header('location: ../gangs.php');
		} else echo "Gang Introuvable";

	} else echo "Une erreur est survenue, ID not defined";
} else header('location: ../index.php');
?>