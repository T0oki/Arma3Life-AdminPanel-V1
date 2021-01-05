<?php
require('config/config.php');
try
{
	$bdd = new PDO('mysql:host='.DB_Site_HOST.';dbname='.DB_Site_NAME.';charset=utf8', DB_Site_USER, DB_Site_PASSWORD);
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
?>