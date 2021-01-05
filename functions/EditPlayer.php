<?php 
session_name('ArmaPanel');
session_start();
include('../include/actualise.php');

$Acces = false;
if ($PERM_Edit_User) $Acces = true;

if ($Acces) {
	if ($PERM_Manage_Staff) {
		if (isset($_POST['uid']) && isset($_POST['cash']) && isset($_POST['bank']) && isset($_POST['coplevel']) && isset($_POST['mediclevel']) && isset($_POST['adminlevel'])) {
			$uid = $_POST['uid'];
			$cash = $_POST['cash'];
			$bank = $_POST['bank'];
			$coplevel = $_POST['coplevel'];
			$mediclevel = $_POST['mediclevel'];
			$adminlevel = $_POST['adminlevel'];

			include ('../include/connexiondb_Serveur.php');
			$reponse = $serveur_bdd->query("SELECT * FROM players WHERE pid='$uid'");
			$donnees = $reponse->fetch();
			include("../include/Logs.php");

			$Logs = new Logs;
			$Old_cash = $donnees['cash'];
			$Old_bank = $donnees['bankacc'];
			$Old_coplevel = $donnees['coplevel'];
			$Old_mediclevel = $donnees['mediclevel'];
			$Old_adminlevel = $donnees['adminlevel'];
			$Logs->add($_SESSION['Nom'], 'editPlayer', "$uid]-|-[$Old_cash]-[$Old_bank]-[$Old_coplevel]-[$Old_mediclevel]-[$Old_adminlevel]-|-[$cash]-[$bank]-[$coplevel]-[$mediclevel]-[$adminlevel");
			$req = $serveur_bdd->prepare('UPDATE players SET cash = :cash, bankacc = :bankacc, coplevel = :coplevel, mediclevel = :mediclevel, adminlevel = :adminlevel WHERE pid = :uid');
			$req->execute(array(
				'cash' => $cash,
				'bankacc' => $bank,
				'coplevel' => $coplevel,
				'mediclevel' => $mediclevel,
				'adminlevel' => $adminlevel,
				'uid' => $uid,
			));
			header("location: ../ShowUser.php?uid=$uid");

		} else echo "Erreur : Toutes les Variables ne sont pas définies";
	} else {
		if (isset($_POST['uid']) && isset($_POST['cash']) && isset($_POST['bank']) && isset($_POST['coplevel']) && isset($_POST['mediclevel']) && isset($_POST['adminlevel'])) {
			$uid = $_POST['uid'];
			$cash = $_POST['cash'];
			$bank = $_POST['bank'];
			$coplevel = $_POST['coplevel'];
			$mediclevel = $_POST['mediclevel'];

			include ('../include/connexiondb_Serveur.php');
			$reponse = $serveur_bdd->query("SELECT * FROM players WHERE pid='$uid'");
			$donnees = $reponse->fetch();
			include("../include/Logs.php");

			$Logs = new Logs;
			$Old_cash = $donnees['cash'];
			$Old_bank = $donnees['bankacc'];
			$Old_coplevel = $donnees['coplevel'];
			$Old_mediclevel = $donnees['mediclevel'];
			$Old_adminlevel = $donnees['adminlevel'];
			$Logs->add($_SESSION['Nom'], 'editPlayer', "$uid]-|-[$Old_cash]-[$Old_bank]-[$Old_coplevel]-[$Old_mediclevel]-[$Old_adminlevel]-|-[$cash]-[$bank]-[$coplevel]-[$mediclevel]-[$adminlevel");
			header("location: ../ShowUser.php?uid=$uid");
			$req = $serveur_bdd->prepare('UPDATE players SET cash = :cash, bankacc = :bankacc, coplevel = :coplevel, mediclevel = :mediclevel WHERE pid = :uid');
			$req->execute(array(
				'cash' => $cash,
				'bankacc' => $bank,
				'coplevel' => $coplevel,
				'mediclevel' => $mediclevel,
				'uid' => $uid,
			));

		} else echo "Erreur : Toutes les Variables ne sont pas définies";
	}
}
?>