<?php
session_name('ArmaPanel');
session_start();
include('../include/actualise.php');

$Acces = false;
if ($PERM_Manage_Staff) $Acces = true;

if ($Acces) {
	if (isset($_POST['UID']) && isset($_POST['Nom']) && isset($_POST['Email']) && isset($_POST['Password'])) CreateUser();
	else echo "Erreur, Veuillez saisir toutes les informations requises -> <a href=\"../staff.php\"><b>RETOUR</b></a>";

	
} else header('location: ../index.php');
function CreateUser () {
		if (isset($_POST['PERM_View_User'])) $_POST['PERM_View_User'] = 1; else $_POST['PERM_View_User'] = 0;
		if (isset($_POST['PERM_Edit_User'])) $_POST['PERM_Edit_User'] = 1; else $_POST['PERM_Edit_User'] = 0;
		if (isset($_POST['PERM_View_Vehicle'])) $_POST['PERM_View_Vehicle'] = 1; else $_POST['PERM_View_Vehicle'] = 0;
		if (isset($_POST['PERM_Edit_Vehicle'])) $_POST['PERM_Edit_Vehicle'] = 1; else $_POST['PERM_Edit_Vehicle'] = 0;
		if (isset($_POST['PERM_View_Gang'])) $_POST['PERM_View_Gang'] = 1; else $_POST['PERM_View_Gang'] = 0;
		if (isset($_POST['PERM_Edit_Gang'])) $_POST['PERM_Edit_Gang'] = 1; else $_POST['PERM_Edit_Gang'] = 0;
		if (isset($_POST['PERM_View_Home'])) $_POST['PERM_View_Home'] = 1; else $_POST['PERM_View_Home'] = 0;
		if (isset($_POST['PERM_Edit_Home'])) $_POST['PERM_Edit_Home'] = 1; else $_POST['PERM_Edit_Home'] = 0;
		if (isset($_POST['PERM_View_Container'])) $_POST['PERM_View_Container'] = 1; else $_POST['PERM_View_Container'] = 0;
		if (isset($_POST['PERM_Edit_Container'])) $_POST['PERM_Edit_Container'] = 1; else $_POST['PERM_Edit_Container'] = 0;
		if (isset($_POST['PERM_Login'])) $_POST['PERM_Login'] = 1; else $_POST['PERM_Login'] = 0;
		if (isset($_POST['PERM_Manage_Staff'])) $_POST['PERM_Manage_Staff'] = 1; else $_POST['PERM_Manage_Staff'] = 0;
		if (isset($_POST['PERM_Edit_Licence'])) $_POST['PERM_Edit_Licence'] = 1; else $_POST['PERM_Edit_Licence'] = 0;
		if (isset($_POST['PERM_View_Logs'])) $_POST['PERM_View_Logs'] = 1; else $_POST['PERM_View_Logs'] = 0;
		

		include("../include/Logs.php");
		$Logs = new Logs;
		$LogToSend = 	htmlspecialchars($_POST['UID'])."]-[".
						htmlspecialchars($_POST['Nom'])."]-[".
						htmlspecialchars($_POST['Email']).
						"]-|-[".
						htmlspecialchars($_POST['PERM_View_User'])."]-[".
						htmlspecialchars($_POST['PERM_Edit_User'])."]-[".
						htmlspecialchars($_POST['PERM_View_Vehicle'])."]-[".
						htmlspecialchars($_POST['PERM_Edit_Vehicle'])."]-[".
						htmlspecialchars($_POST['PERM_View_Gang'])."]-[".
						htmlspecialchars($_POST['PERM_Edit_Gang'])."]-[".
						htmlspecialchars($_POST['PERM_View_Home'])."]-[".
						htmlspecialchars($_POST['PERM_Edit_Home'])."]-[".
						htmlspecialchars($_POST['PERM_View_Container'])."]-[".
						htmlspecialchars($_POST['PERM_Edit_Container'])."]-[".
						htmlspecialchars($_POST['PERM_Login'])."]-[".
						htmlspecialchars($_POST['PERM_Manage_Staff'])."]-[".
						htmlspecialchars($_POST['PERM_Edit_Licence'])."]-[".
						htmlspecialchars($_POST['PERM_View_Logs'])
						;


		$Logs->add($_SESSION['Nom'], 'addAdmin', $LogToSend);

		include ('../include/connexiondb_site.php');
		$req = $bdd->prepare("INSERT INTO Utilisateurs(UID, Nom, Email, Password, SafeCode, PERM_View_User, PERM_Edit_User, PERM_View_Vehicle, PERM_Edit_Vehicle, PERM_View_Gang, PERM_Edit_Gang, PERM_View_Home, PERM_Edit_Home, PERM_View_Container, PERM_Edit_Container, PERM_Login, PERM_Manage_Staff, PERM_Edit_Licence, PERM_View_Logs) VALUES(:UID, :Nom, :Email, :Password, :SafeCode, :PERM_View_User, :PERM_Edit_User, :PERM_View_Vehicle, :PERM_Edit_Vehicle, :PERM_View_Gang, :PERM_Edit_Gang, :PERM_View_Home, :PERM_Edit_Home, :PERM_View_Container, :PERM_Edit_Container, :PERM_Login, :PERM_Manage_Staff, :PERM_Edit_Licence, :PERM_View_Logs)");
		$req->execute(array(
			'UID' => htmlspecialchars($_POST['UID']),
			'Nom' => htmlspecialchars($_POST['Nom']),
			'Email' => htmlspecialchars($_POST['Email']),
			'Password' => password_hash($_POST['Password'], PASSWORD_DEFAULT),
			'SafeCode' => "AHF9GBDS654GESFDSF862",
			'PERM_View_User' => htmlspecialchars($_POST['PERM_View_User']),
			'PERM_Edit_User' => htmlspecialchars($_POST['PERM_Edit_User']),
			'PERM_View_Vehicle' => htmlspecialchars($_POST['PERM_View_Vehicle']),
			'PERM_Edit_Vehicle' => htmlspecialchars($_POST['PERM_Edit_Vehicle']),
			'PERM_View_Gang' => htmlspecialchars($_POST['PERM_View_Gang']),
			'PERM_Edit_Gang' => htmlspecialchars($_POST['PERM_Edit_Gang']),
			'PERM_View_Home' => htmlspecialchars($_POST['PERM_View_Home']),
			'PERM_Edit_Home' => htmlspecialchars($_POST['PERM_Edit_Home']),
			'PERM_View_Container' => htmlspecialchars($_POST['PERM_View_Container']),
			'PERM_Edit_Container' => htmlspecialchars($_POST['PERM_Edit_Container']),
			'PERM_Login' => htmlspecialchars($_POST['PERM_Login']),
			'PERM_Manage_Staff' => htmlspecialchars($_POST['PERM_Manage_Staff']),
			'PERM_Edit_Licence' => htmlspecialchars($_POST['PERM_Edit_Licence']),
			'PERM_View_Logs' => htmlspecialchars($_POST['PERM_View_Logs']),
		    ));
		header('location: ../staff.php');
	}
?>