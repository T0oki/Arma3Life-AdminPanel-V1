<?php 
session_name('ArmaPanel');
session_start();
include('../include/actualise.php');

$Acces = false;
if ($PERM_Edit_Gang) $Acces = true;

if ($Acces) {
	if ($PERM_Manage_Staff) {
		if (isset($_POST['id']) && isset($_POST['owner']) && isset($_POST['max']) && isset($_POST['bank'])) {
			$id = $_POST['id'];
			$owner = $_POST['owner'];
			$bank = $_POST['bank'];
			$max = $_POST['max'];

			include ('../include/connexiondb_Serveur.php');
			$reponse = $serveur_bdd->query("SELECT * FROM gangs WHERE id='$id'");
			$donnees = $reponse->fetch();
			include("../include/Logs.php");

			$Logs = new Logs;
			$Old_owner = $donnees['owner'];
			$Old_bank = $donnees['bank'];
			$Old_max = $donnees['maxmembers'];

			$Logs->add($_SESSION['Nom'], 'editGang', "$id]-|-[$Old_owner]-[$Old_bank]-[$Old_max]-|-[$owner]-[$bank]-[$max");
			$req = $serveur_bdd->prepare('UPDATE gangs SET owner = :owner, bank = :bank, maxmembers = :maxmembers WHERE id = :id');
			$req->execute(array(
				'owner' => $owner,
				'bank' => $bank,
				'maxmembers' => $max,
				'id' => $id,
			));
			header("location: ../ShowGang.php?id=$id");

		} else echo "Erreur : Toutes les Variables ne sont pas définies";
	}
}
?>