<?php 
session_name('ArmaPanel');
session_start();
include('../include/actualise.php');

$Acces = false;
if ($PERM_Edit_Licence) $Acces = true;

if ($Acces) {
    if (isset($_GET['uid']) && isset($_GET['type']) && isset($_GET['name']) && isset($_GET['value'])) {

            $puid = $_GET['uid'];
            $type = $_GET['type'];
            $name = $_GET['name'];
            $value = $_GET['value'];
            $CatName = $type."_licenses";

            if ($value === "0" || $value === "1"){
                include('../include/connexiondb_Serveur.php');
                $reponse = $serveur_bdd->query("SELECT ".$CatName.", pid FROM players WHERE pid='$puid'");
                $donnees = $reponse->fetch();

                if (empty($donnees)) echo "Utilisateur Introuvable";
                else {
                    $lis_String = $donnees[$CatName];

                    $find = "`license_".$type."_".$name."`,".$value;

                    if (intval($value) === 0){
                        $value = '1';
                    }else {
                        $value = '0';
                    }

                    $replace = "`license_".$type."_".$name."`,".$value;
                    $lis_String = str_replace($find, $replace, $lis_String);

                    include("../include/Logs.php");
                    $Logs = new Logs;
                    $Logs->add($_SESSION['Nom'], 'editLisence', $value."]-[license_".$type."_".$name."]-[".$donnees['pid']);

                    $serveur_bdd->Query("UPDATE players SET ".$CatName."='$lis_String' WHERE pid='$puid'");
                    echo "<script language='javascript'>window.close()</script>";
                }
        } else echo "Tentative de fraude détecter ! ";
    } else echo "Toutes les informations n'ont pas été définies ";
} else header('location: ../index.php');
?>