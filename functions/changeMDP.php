<?php
session_name('ArmaPanel');
session_start();
include('../include/actualise.php');

$Pass = $_POST['password'];
$NewPass=  $_POST['new-password'];
$Confirm = $_POST['Confirm-new-password'];

$ButtonReturn = "<br><a href=\"../settings.php\"><b>RETOUR</b></a>";

include('../include/connexiondb_site.php');

$UID = $_SESSION['UID'];

$req = $bdd->query("SELECT * FROM Utilisateurs WHERE UID=$UID");
$req = $req->fetch();
$TrueMDP = $req['Password'];

if (password_verify($Pass, $TrueMDP)) {
	if ($NewPass === $Confirm) {
		$NewPasswordHashed = password_hash($NewPass, PASSWORD_DEFAULT);
		$bdd->query("UPDATE Utilisateurs SET Password='$NewPasswordHashed' WHERE UID=$UID ");
		echo "Le Mot de passe a été changé !".$ButtonReturn;
	} else echo "Les Mots de passe ne sont pas identiques".$ButtonReturn;
} else echo "Mot de passe Incorrect !".$ButtonReturn;

?>