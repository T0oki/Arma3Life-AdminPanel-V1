<?php
require('config/config.php');
try
{
	$serveur_bdd = new PDO('mysql:host='.DB_SERVER_HOST.';dbname='.DB_SERVER_NAME.';charset=utf8', DB_SERVER_USER, DB_SERVER_PASSWORD);
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
?>