<?php
if (!isset($_SESSION['Statut'])) { header('location: login.php'); }
else
{
	include('connexiondb_site.php');

	$UID = $_SESSION['UID'];
	$SafeCode = $_SESSION['SafeCode'];
	$reponse = $bdd->query("SELECT * FROM Utilisateurs WHERE UID='$UID' AND SafeCode='$SafeCode'");
	$donnees = $reponse->fetch();

	if (!$donnees['activate']) header('location: logout.php');

	$_SESSION['Statut'] = true;
	$_SESSION['UID'] = $donnees['UID'];
	$_SESSION['Email'] = $donnees['Email'];
	$_SESSION['Nom'] = $donnees['Nom'];

	// Start Listing des permissions
		// Perm View
			// PERM_View_User	PERM_View_Vehicle	PERM_View_Gang	PERM_View_Home	PERM_View_Container

			$PERM_View_User = /*$donnees['PERM_View_User'];*/ true;
			$PERM_View_Vehicle = /*$donnees['PERM_View_Vehicle'];*/ true;
			$PERM_View_Gang = /*$donnees['PERM_View_Gang'];*/ true;
			$PERM_View_Home = /*$donnees['PERM_View_Home'];*/ true;
			$PERM_View_Container = /*$donnees['PERM_View_Container'];*/ true;

		// Perm Edit
			// PERM_Edit_User	PERM_Edit_Vehicle	PERM_Edit_Gang	PERM_Edit_Home	PERM_Edit_Container

			$PERM_Edit_User = /*$donnees['PERM_Edit_User'];*/ true;
			$PERM_Edit_Vehicle = /*$donnees['PERM_Edit_Vehicle'];*/ true;
			$PERM_Edit_Gang = /*$donnees['PERM_Edit_Gang'];*/ true;
			$PERM_Edit_Home = /*$donnees['PERM_Edit_Home'];*/ true;
			$PERM_Edit_Container = /*$donnees['PERM_Edit_Container'];*/ true;
			$PERM_Edit_Licence = /*$donnees['PERM_Edit_Licence'];*/ true;

		// Perm Staff
			// PERM_Manage_Staff
			$PERM_Manage_Staff = /*$donnees['PERM_Manage_Staff'];*/ true;
			$PERM_View_Logs = /*$donnees['PERM_View_Logs'];*/ true;
	// Stop Listing des permissions

	if ($_SESSION['Statut'] == "" || $_SESSION['UID'] == "" || $_SESSION['SafeCode'] == "")
	{
		header('location: logout.php');
	}
	else
	{
		$NewSafeCode = CreateSafeCode(70);
		$req = $bdd->query("UPDATE Utilisateurs SET SafeCode='$NewSafeCode', IP='".get_ip()."' WHERE UID='$UID' AND SafeCode='$SafeCode'");
		$_SESSION['SafeCode'] = $NewSafeCode;
	}


	// Check When last Activity
	$Nom = $_SESSION['Nom'];
	$SafeCode = $_SESSION['SafeCode'];
	$LastActivity = $donnees['LastActivity'];
	$Now = time();
	$TimeDif = $Now - $LastActivity;
    if ($TimeDif <= 15*60)
    {
    	$req = $bdd->query("UPDATE Utilisateurs SET LastActivity='$Now' WHERE UID='$UID' AND SafeCode='$SafeCode'");
    }
    else { header('location: logout.php'); }
}

function CreateSafeCode($longueur = 10)
{
 $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
 $longueurMax = strlen($caracteres);
 $chaineAleatoire = '';
 for ($i = 0; $i < $longueur; $i++)
 {
 $chaineAleatoire .= $caracteres[rand(0, $longueurMax - 1)];
 }
 return $chaineAleatoire;
}
function get_ip() {
  // IP si internet partagé
  if (isset($_SERVER['HTTP_CLIENT_IP'])) {
    return $_SERVER['HTTP_CLIENT_IP'];
  }
  // IP derrière un proxy
  elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    return $_SERVER['HTTP_X_FORWARDED_FOR'];
  }
  // Sinon : IP normale
  else {
    return (isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '');
  }
}
?>