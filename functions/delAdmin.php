<?php
session_name('ArmaPanel');
session_start();
include('../include/actualise.php');

$Acces = false;
if ($PERM_Manage_Staff) $Acces = true;

$ID = $_GET['id'];

include ('../include/connexiondb_site.php');
$reponse = $bdd->query("SELECT * FROM Utilisateurs WHERE id=$ID");
$reponse = $reponse->fetch();

$PERM_DELETABLE = $reponse['PERM_DELETABLE'];
$Name = $reponse['Nom'];


if ($Acces) {
	if ($PERM_DELETABLE) {
		if (isset($_GET['id'])) DeleteUser($ID, $Name);
		else echo "Erreur, Veuillez saisir toutes les informations requises -> <a href=\"../staff.php\"><b>RETOUR</b></a>";
	} else echo "Vous ne pouvez pas supprimer cette utilisateur";
} else header('location: ../index.php');
	
function DeleteUser ($ID, $Name) {

		include("../include/Logs.php");
		$Logs = new Logs;
		$Logs->add($_SESSION['Nom'], 'delAdmin', $Name);

		include ('../include/connexiondb_site.php');
		$req = $bdd->query("DELETE FROM Utilisateurs WHERE ID=$ID");
		header('location: ../staff.php');
	}
?>