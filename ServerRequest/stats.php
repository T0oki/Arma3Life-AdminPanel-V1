<?php

define('PASSWD', "c9DZjQQchBFWHe49ujE76p8QaLHsvSp7UUi55UiuaB6JkUj3k73Ti067JBwHC5ADRRrTmuH1ZE7uIO5T");

if (isset($_GET['Pass'])) {
	if ($_GET['Pass'] === PASSWD) {
		if (isset($_GET['Req'])) {
			$Fonctions = new Functions;
			switch ($_GET['Req']) {
				case 'money':
					$Fonctions::money();
					break;
				case 'containers':
					$Fonctions::containers();
					break;
				case 'gangs':
					$Fonctions::gangs();
					break;
				case 'houses':
					$Fonctions::houses();
					break;
				case 'players':
					$Fonctions::players();
					break;
				case 'vehicles':
					$Fonctions::vehicles();
					break;
				default:
					echo "ERROR_REQ_404";
					break;
			}
		} else echo "ERROR_NO_REQ";
	} else echo "ERROR_FALSE_PASSWD";
} else echo "ERROR_NO_PASSWD";


class Functions
{
	function money()
	{
		$serveur_db = self::DB_SERVEUR();
		$reponse = $serveur_db->query('SELECT sum(cash) AS TotalCash FROM players');
		$stat_TotalCash = $reponse->fetch();
		$reponse = $serveur_db->query('SELECT sum(bankacc) AS TotalBank FROM players');
		$stat_TotalBank = $reponse->fetch();
		$Stat_TotalMoney = $stat_TotalCash['TotalCash'] + $stat_TotalBank['TotalBank'];

		self::InsertStat('money',$Stat_TotalMoney);
		echo "DONE";
	}
	function containers() {
		$serveur_db = self::DB_SERVEUR();
		$reponse = $serveur_db->query("SELECT COUNT(*) FROM containers");
		$Stat = $reponse->fetch();
		self::InsertStat('containers',$Stat[0]);
		echo "DONE";
	}
	function gangs() {
		$serveur_db = self::DB_SERVEUR();
		$reponse = $serveur_db->query("SELECT COUNT(*) FROM gangs");
		$Stat = $reponse->fetch();
		self::InsertStat('gangs',$Stat[0]);
		echo "DONE";
	}
	function houses() {
		$serveur_db = self::DB_SERVEUR();
		$reponse = $serveur_db->query("SELECT COUNT(*) FROM houses");
		$Stat = $reponse->fetch();
		self::InsertStat('houses',$Stat[0]);
		echo "DONE";
	}
	function players() {
		$serveur_db = self::DB_SERVEUR();
		$reponse = $serveur_db->query("SELECT COUNT(*) FROM players");
		$Stat = $reponse->fetch();
		self::InsertStat('players',$Stat[0]);
		echo "DONE";
	}
	function vehicles() {
		$serveur_db = self::DB_SERVEUR();
		$reponse = $serveur_db->query("SELECT COUNT(*) FROM vehicles");
		$Stat = $reponse->fetch();
		self::InsertStat('vehicles',$Stat[0]);
		echo "DONE";
	}

	function DB_SERVEUR() {
		require('../include/config/config.php');
		try
		{
			$NewConnexion = new PDO('mysql:host='.DB_SERVER_HOST.';dbname='.DB_SERVER_NAME.';charset=utf8', DB_SERVER_USER, DB_SERVER_PASSWORD);
			return $NewConnexion;
		}
		catch(Exception $e)
		{
		        die('Erreur : '.$e->getMessage());
		}
	}
	function DB_SITE() {
		require('../include/config/config.php');
		try
		{
			$NewConnexion = new PDO('mysql:host='.DB_Site_HOST.';dbname='.DB_Site_NAME.';charset=utf8', DB_Site_USER, DB_Site_PASSWORD);
			return $NewConnexion;
		}
		catch(Exception $e)
		{
		        die('Erreur : '.$e->getMessage());
		}
	}
	function InsertStat($Value1, $Value2) {
		$site_db = self::DB_SITE();

		$site_db->query("INSERT INTO Stats (Date, Type, Content) VALUES ('".date("Y-m-d H:i:s")."', '$Value1', '$Value2')");
	}
}
?>