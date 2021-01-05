<?php
session_name('ArmaPanel');
session_start();
include('include/actualise.php');
$PageName = "Logs";

$PageIndex = "Tableau De Bord";
$PageIndexLink = "index.php";

$jsonStr = file_get_contents("include/config/config.json");
$config = json_decode($jsonStr, true);
$VehiCFG = $config['vehicules'];

// Check Permissions
$Acces = false;
if ($PERM_View_Logs) $Acces = true;
?>

<!doctype html>
<html class="no-js" lang="">
<head>
    <?php include('include/head.php'); ?>
    <link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">
</head>

<body>
   <body>
    <!-- Left Panel -->
    <?php include('include/left-panel.php');?>
    <!-- /#left-panel -->
    <!-- Right Panel -->
    
    
<div id="right-panel" class="right-panel">
        <!-- Header-->
        <?php include('include/menu.php');?>
        <!-- /#header -->
        <?php include('include/BareIndex.php');?>
        
        <?php if ($Acces) { ?>
        <div class="content">

<div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Liste des logs</h4>
                                </div>
                                <div class="card-body">
                                    <div class="custom-tab">

                                        <nav>
                                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                <a class="nav-item nav-link active show" id="custom-nav-Connexion-tab" data-toggle="tab" href="#custom-nav-Connexion" role="tab" aria-controls="custom-nav-Connexion" aria-selected="true">Connexion</a>

                                                <a class="nav-item nav-link" id="custom-nav-AddAdmin-tab" data-toggle="tab" href="#custom-nav-AddAdmin" role="tab" aria-controls="custom-nav-AddAdmin" aria-selected="false">AddAdmin</a>

                                                <a class="nav-item nav-link" id="custom-nav-delAdmin-tab" data-toggle="tab" href="#custom-nav-delAdmin" role="tab" aria-controls="custom-nav-delAdmin" aria-selected="false">delAdmin</a>

                                                <a class="nav-item nav-link" id="custom-nav-delContainer-tab" data-toggle="tab" href="#custom-nav-delContainer" role="tab" aria-controls="custom-nav-delContainer" aria-selected="false">delContainer</a>

                                                <a class="nav-item nav-link" id="custom-nav-delGang-tab" data-toggle="tab" href="#custom-nav-delGang" role="tab" aria-controls="custom-nav-delGang" aria-selected="false">delGang</a>

                                                <a class="nav-item nav-link" id="custom-nav-delHouse-tab" data-toggle="tab" href="#custom-nav-delHouse" role="tab" aria-controls="custom-nav-delHouse" aria-selected="false">delHouse</a>

                                                <a class="nav-item nav-link" id="custom-nav-delVehicle-tab" data-toggle="tab" href="#custom-nav-delVehicle" role="tab" aria-controls="custom-nav-delVehicle" aria-selected="false">delVehicle</a>

                                                <a class="nav-item nav-link" id="custom-nav-editAdmin-tab" data-toggle="tab" href="#custom-nav-editAdmin" role="tab" aria-controls="custom-nav-editAdmin" aria-selected="false">editAdmin</a>

                                                <a class="nav-item nav-link" id="custom-nav-editGang-tab" data-toggle="tab" href="#custom-nav-editGang" role="tab" aria-controls="custom-nav-editGang" aria-selected="false">editGang</a>

                                                <a class="nav-item nav-link" id="custom-nav-EditLicense-tab" data-toggle="tab" href="#custom-nav-EditLicense" role="tab" aria-controls="custom-nav-EditLicense" aria-selected="false">EditLicense</a>

                                                <a class="nav-item nav-link" id="custom-nav-EditPlayer-tab" data-toggle="tab" href="#custom-nav-EditPlayer" role="tab" aria-controls="custom-nav-EditPlayer" aria-selected="false">EditPlayer</a>
                                            </div>
                                        </nav>
                                        <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                            <div class="tab-pane fade active show" id="custom-nav-Connexion" role="tabpanel" aria-labelledby="custom-nav-Connexion-tab">
                                                <!-- Début Connexion -->
                                                <br>
                                                    <table id="bootstrap-data-table-Connexion" class="table table-striped table-bordered">
                                                        <thead class="thead-dark">
                                                            <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Nom</th>
                                                            <th scope="col">IP</th>
                                                            <th scope="col">Date</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                                include('include/connexiondb_site.php');
                                                                $reponse = $bdd->query("SELECT * FROM Logs WHERE Type='Connexion' ORDER BY id DESC");
                                                                while ($donnees = $reponse->fetch()) {
                                                                    $date = new DateTime($donnees['Time']);
                                                                    $day = getDay($date->format('l'));
                                                                    
                                                                    $month = getMonth($date->format('F'));
                                                                    
                                                                    $date = "$day {$date->format('d')} $month {$date->format('Y H:i:s')}";
                                                                    $row = "<tr>
                                                                    <th>{$donnees['id']}</th>
                                                                    <td>{$donnees['User']}</td>
                                                                    <td>{$donnees['Content']}</td>
                                                                    <td>$date</td>
                                                                    </tr>";
                                                                    echo $row;  
                                                                }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                <!-- Fin Connexion -->
                                            </div>
                                            <div class="tab-pane fade" id="custom-nav-AddAdmin" role="tabpanel" aria-labelledby="custom-nav-AddAdmin-tab">
                                                <!-- Début AddAdmin -->
                                                <br>
                                                    <table id="bootstrap-data-table-AddAdmin" class="table table-striped table-bordered">
                                                        <thead class="thead-dark">
                                                            <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Autheur</th>
                                                            <th scope="col">UID</th>
                                                            <th scope="col">Nom</th>
                                                            <th scope="col">Email</th>
                                                            <th scope="col"><!-- Perms --></th>
                                                            <th scope="col">Date</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                                include('include/connexiondb_site.php');
                                                                $reponse = $bdd->query("SELECT * FROM Logs WHERE Type='addAdmin' ORDER BY id DESC");
                                                                while ($donnees = $reponse->fetch()) {
                                                                    $date = new DateTime($donnees['Time']);
                                                                    $day = getDay($date->format('l'));
                                                                    $month = getMonth($date->format('F'));
                                                                    $date = "$day {$date->format('d')} $month {$date->format('Y H:i:s')}";
                                                                    
                                                                    $AdminInfo = $donnees['Content'];
                                                                    $AdminInfo = explode(']-|-[', $AdminInfo);
                                                                    $AdminPermInfo = explode(']-[', $AdminInfo[1]);
                                                                    $AdminInfo = explode(']-[', $AdminInfo[0]);
                                                                    $UID = $AdminInfo[0];
                                                                    $Nom = $AdminInfo[1];
                                                                    $Email = $AdminInfo[2];
                                                                    $row = "<tr><th>{$donnees['id']}</th>
                                                                    <td>{$donnees['User']}</td>
                                                                    <td>{$UID}</td>
                                                                    <td>{$Nom}</td>
                                                                    <td>{$Email}</td>
                                                                    <td><button type=\"button\" class=\"btn btn-outline-primary mb-1\" data-toggle=\"modal\" data-target=\"#AddAdminModal_{$donnees['id']}\">Permissions</button></td>
                                                                    <td>$date</td>
                                                                    </tr>";
                                                                    echo $row;

                                                                } ?>
                                                        </tbody>
                                                    </table>
<?php
    include('include/connexiondb_site.php');
    $reponse = $bdd->query("SELECT * FROM Logs WHERE Type='addAdmin' ORDER BY id DESC");
    while ($donnees = $reponse->fetch()) {
        $date = new DateTime($donnees['Time']);
        $day = getDay($date->format('l'));
        $month = getMonth($date->format('F'));
        $date = "$day {$date->format('d')} $month {$date->format('Y H:i:s')}";
        
        $AdminInfo = $donnees['Content'];
        $AdminInfo = explode(']-|-[', $AdminInfo);
        $AdminPermInfo = explode(']-[', $AdminInfo[1]);
        $AdminInfo = explode(']-[', $AdminInfo[0]);
        $Nom = $AdminInfo[1];
?>
<div class="modal fade" id="AddAdminModal_<?=$donnees['id']?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header"> <h5 class="modal-title" id="AddAdminModal_<?=$donnees['id']?>Label">Permissions de <?=$Nom?></h5> </div>
            <div class="modal-body">
                <div class="col-lg-12">
                    <table id="bootstrap-data-table-AddAdminModal_<?=$donnees['id']?>" class="table table-striped table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Permission</th>
                                <th scope="col">Valeur</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($AdminPermInfo as $key => $value) {
                                $AdminPermInfo[$key] = str_replace('0', '<span class="badge badge-danger">False</span>', $AdminPermInfo[$key]);
                                $AdminPermInfo[$key] = str_replace('1', '<span class="badge badge-success">True</span>', $AdminPermInfo[$key]);
                            }
                            AdminPermAddRow("PERM_View_User", $AdminPermInfo[0]);
                            AdminPermAddRow("PERM_Edit_User", $AdminPermInfo[1]);
                            AdminPermAddRow("PERM_View_Vehicle", $AdminPermInfo[2]);
                            AdminPermAddRow("PERM_Edit_Vehicle", $AdminPermInfo[3]);
                            AdminPermAddRow("PERM_View_Gang", $AdminPermInfo[4]);
                            AdminPermAddRow("PERM_Edit_Gang", $AdminPermInfo[5]);
                            AdminPermAddRow("PERM_View_Home", $AdminPermInfo[6]);
                            AdminPermAddRow("PERM_Edit_Home", $AdminPermInfo[7]);
                            AdminPermAddRow("PERM_View_Container", $AdminPermInfo[8]);
                            AdminPermAddRow("PERM_Edit_Container", $AdminPermInfo[9]);
                            AdminPermAddRow("PERM_Login", $AdminPermInfo[10]);
                            AdminPermAddRow("PERM_Manage_Staff", $AdminPermInfo[11]);
                            AdminPermAddRow("PERM_Edit_Licence", $AdminPermInfo[12]);
                            if (isset($AdminPermInfo[13])) AdminPermAddRow("PERM_View_Logs", $AdminPermInfo[13]);
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>
                                                <!-- Fin Add Admin -->
                                            </div>
                                            <div class="tab-pane fade" id="custom-nav-delAdmin" role="tabpanel" aria-labelledby="custom-nav-delAdmin-tab">
                                                <!-- Début Del Admin -->
                                                <br>
                                                    <table id="bootstrap-data-table-delAdmin" class="table table-striped table-bordered">
                                                        <thead class="thead-dark">
                                                            <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Autheur</th>
                                                            <th scope="col">Nom</th>
                                                            <th scope="col">Date</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                                include('include/connexiondb_site.php');
                                                                $reponse = $bdd->query("SELECT * FROM Logs WHERE Type='delAdmin' ORDER BY id DESC");
                                                                while ($donnees = $reponse->fetch()) {
                                                                    $date = new DateTime($donnees['Time']);
                                                                    $day = getDay($date->format('l'));
                                                                    
                                                                    $month = getMonth($date->format('F'));
                                                                    
                                                                    $date = "$day {$date->format('d')} $month {$date->format('Y H:i:s')}";
                                                                    $row = "<tr>
                                                                    <th>{$donnees['id']}</th>
                                                                    <td>{$donnees['User']}</td>
                                                                    <td>{$donnees['Content']}</td>
                                                                    <td>$date</td>
                                                                    </tr>";
                                                                    echo $row;  
                                                                }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                <!-- Fin Del Admin -->
                                            </div>
                                            <div class="tab-pane fade" id="custom-nav-delContainer" role="tabpanel" aria-labelledby="custom-nav-delContainer-tab">
                                                <!-- Début Del Container -->
                                                <br>
                                                    <table id="bootstrap-data-table-delContainer" class="table table-striped table-bordered">
                                                        <thead class="thead-dark">
                                                            <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Autheur</th>
                                                            <th scope="col">Propriétaire</th>
                                                            <th scope="col">Date</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                                include('include/connexiondb_site.php');
                                                                $reponse = $bdd->query("SELECT * FROM Logs WHERE Type='delContainer' ORDER BY id DESC");
                                                                while ($donnees = $reponse->fetch()) {
                                                                    $date = new DateTime($donnees['Time']);
                                                                    $day = getDay($date->format('l'));
                                                                    
                                                                    $month = getMonth($date->format('F'));
                                                                    
                                                                    $date = "$day {$date->format('d')} $month {$date->format('Y H:i:s')}";
                                                                    $row = "<tr>
                                                                    <th>{$donnees['id']}</th>
                                                                    <td>{$donnees['User']}</td>
                                                                    <td><a target='_blank' href=\"ShowUser.php?uid={$donnees['Content']}\">{$donnees['Content']}</a></td>
                                                                    <td>$date</td>
                                                                    </tr>";
                                                                    echo $row;  
                                                                }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                <!-- Fin Del Container -->
                                            </div>
                                            <div class="tab-pane fade" id="custom-nav-delGang" role="tabpanel" aria-labelledby="custom-nav-delGang-tab">
                                                <!-- Début Del Gang -->
                                                <br>
                                                    <table id="bootstrap-data-table-delGang" class="table table-striped table-bordered">
                                                        <thead class="thead-dark">
                                                            <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Autheur</th>
                                                            <th scope="col">Propriétaire</th>
                                                            <th scope="col">Argent</th>
                                                            <th scope="col">Date</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                                include('include/connexiondb_site.php');
                                                                $reponse = $bdd->query("SELECT * FROM Logs WHERE Type='delGang' ORDER BY id DESC");
                                                                while ($donnees = $reponse->fetch()) {
                                                                    $date = new DateTime($donnees['Time']);
                                                                    $day = getDay($date->format('l'));
                                                                    
                                                                    $month = getMonth($date->format('F'));
                                                                    
                                                                    $date = "$day {$date->format('d')} $month {$date->format('Y H:i:s')}";
                                                                    $GangInfo = $donnees['Content'];
                                                                    $GangInfo = explode(']-[', $GangInfo);
                                                                    $ArgentGang = strrev(wordwrap(strrev($GangInfo[1]), 3, '.', true)).(' €');
                                                                    $OwnerGang = 'ShowUser.php?uid='.$GangInfo[0];
                                                                    $row = "<tr>
                                                                    <th>{$donnees['id']}</th>
                                                                    <td>{$donnees['User']}</td>
                                                                    <td><a target='_blank' href=\"{$OwnerGang}\">{$GangInfo[0]}</a></td>
                                                                    <td>{$ArgentGang}</td>
                                                                    <td>$date</td>
                                                                    </tr>";
                                                                    echo $row;
                                                                }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                <!-- Fin Del Gang -->
                                            </div>
                                            <div class="tab-pane fade" id="custom-nav-delHouse" role="tabpanel" aria-labelledby="custom-nav-delHouse-tab">
                                                <!-- Début Del House -->
                                                <br>
                                                    <table id="bootstrap-data-table-delHouse" class="table table-striped table-bordered">
                                                        <thead class="thead-dark">
                                                            <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Autheur</th>
                                                            <th scope="col">Propriétaire</th>
                                                            <th scope="col">Type</th>
                                                            <th scope="col">Date</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                                include('include/connexiondb_site.php');
                                                                $reponse = $bdd->query("SELECT * FROM Logs WHERE Type='delHouse' ORDER BY id DESC");
                                                                while ($donnees = $reponse->fetch()) {
                                                                    $date = new DateTime($donnees['Time']);
                                                                    $day = getDay($date->format('l'));
                                                                    
                                                                    $month = getMonth($date->format('F'));
                                                                    
                                                                    $date = "$day {$date->format('d')} $month {$date->format('Y H:i:s')}";
                                                                    $HouseInfo = $donnees['Content'];
                                                                    $HouseInfo = explode(']-[', $HouseInfo);
                                                                    $Type = $config['maison'][$HouseInfo[0]];
                                                                    $Owner = 'ShowUser.php?uid='.$HouseInfo[1];
                                                                    $row = "<tr>
                                                                    <th>{$donnees['id']}</th>
                                                                    <td>{$donnees['User']}</td>
                                                                    <td><a target='_blank' href=\"{$Owner}\">{$HouseInfo[1]}</a></td>
                                                                    <td>{$Type}</td>
                                                                    <td>$date</td>
                                                                    </tr>";
                                                                    echo $row;
                                                                }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                <!-- Début Del House -->
                                            </div>
                                            <div class="tab-pane fade" id="custom-nav-delVehicle" role="tabpanel" aria-labelledby="custom-nav-delVehicle-tab">
                                                <!-- Début Del Vehicle -->
                                                <br>
                                                    <table id="bootstrap-data-table-delVehicle" class="table table-striped table-bordered">
                                                        <thead class="thead-dark">
                                                            <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Autheur</th>
                                                            <th scope="col">Propriétaire</th>
                                                            <th scope="col">Véhicule</th>
                                                            <th scope="col">Date</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                                include('include/connexiondb_site.php');
                                                                $reponse = $bdd->query("SELECT * FROM Logs WHERE Type='delVehicle' ORDER BY id DESC");
                                                                while ($donnees = $reponse->fetch()) {
                                                                    $date = new DateTime($donnees['Time']);
                                                                    $day = getDay($date->format('l'));
                                                                    
                                                                    $month = getMonth($date->format('F'));
                                                                    
                                                                    $date = "$day {$date->format('d')} $month {$date->format('Y H:i:s')}";
                                                                    $VehicleInfo = $donnees['Content'];
                                                                    $VehicleInfo = explode(']-[', $VehicleInfo);
                                                                    $ClassName = $VehiCFG['classname'][$VehicleInfo[0]];
                                                                    $Owner = 'ShowUser.php?uid='.$VehicleInfo[1];
                                                                    $row = "<tr>
                                                                    <th>{$donnees['id']}</th>
                                                                    <td>{$donnees['User']}</td>
                                                                    <td><a target='_blank' href=\"{$Owner}\">{$VehicleInfo[1]}</a></td>
                                                                    <td>{$ClassName}</td>
                                                                    <td>$date</td>
                                                                    </tr>";
                                                                    echo $row;
                                                                }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                <!-- Fin Del Vehicle -->
                                            </div>
                                            <div class="tab-pane fade" id="custom-nav-editAdmin" role="tabpanel" aria-labelledby="custom-nav-editAdmin-tab">
                                                <!-- Début Edit Admin -->
                                                <br>
                                                    <table id="bootstrap-data-table-editAdmin" class="table table-striped table-bordered">
                                                        <thead class="thead-dark">
                                                            <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Autheur</th>
                                                            <th scope="col">UID</th>
                                                            <th scope="col">Nom</th>
                                                            <th scope="col">Email</th>
                                                            <th scope="col"><!-- Perms --></th>
                                                            <th scope="col">Date</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                                include('include/connexiondb_site.php');
                                                                $reponse = $bdd->query("SELECT * FROM Logs WHERE Type='editAdmin' ORDER BY id DESC");
                                                                while ($donnees = $reponse->fetch()) {
                                                                    $date = new DateTime($donnees['Time']);
                                                                    $day = getDay($date->format('l'));
                                                                    $month = getMonth($date->format('F'));
                                                                    $date = "$day {$date->format('d')} $month {$date->format('Y H:i:s')}";
                                                                    
                                                                    $AdminInfo = $donnees['Content'];
                                                                    $AdminInfo = explode(']-|-[', $AdminInfo);
                                                                    $AdminPermInfo = explode(']-[', $AdminInfo[1]);
                                                                    $AdminInfo = explode(']-[', $AdminInfo[0]);
                                                                    $UID = $AdminInfo[0];
                                                                    $Nom = $AdminInfo[1];
                                                                    $Email = $AdminInfo[2];
                                                                    $row = "<tr><th>{$donnees['id']}</th>
                                                                    <td>{$donnees['User']}</td>
                                                                    <td>{$UID}</td>
                                                                    <td>{$Nom}</td>
                                                                    <td>{$Email}</td>
                                                                    <td><button type=\"button\" class=\"btn btn-outline-primary mb-1\" data-toggle=\"modal\" data-target=\"#editAdminModal_{$donnees['id']}\">Permissions</button></td>
                                                                    <td>$date</td>
                                                                    </tr>";
                                                                    echo $row;

                                                                } ?>
                                                        </tbody>
                                                    </table>
<?php
    include('include/connexiondb_site.php');
    $reponse = $bdd->query("SELECT * FROM Logs WHERE Type='editAdmin' ORDER BY id DESC");
    while ($donnees = $reponse->fetch()) {        
        $AdminInfo = $donnees['Content'];
        $AdminInfo = explode(']-|-[', $AdminInfo);
        $AdminPermInfo = explode(']-[', $AdminInfo[1]);
        $AdminInfo = explode(']-[', $AdminInfo[0]);
        $Nom = $AdminInfo[1];
?>
<div class="modal fade" id="editAdminModal_<?=$donnees['id']?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header"> <h5 class="modal-title" id="editAdminModal_<?=$donnees['id']?>Label">Permissions de <?=$Nom?></h5> </div>
            <div class="modal-body">
                <div class="col-lg-12">
                    <table id="bootstrap-data-table-editAdminModal_<?=$donnees['id']?>" class="table table-striped table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Permission</th>
                                <th scope="col">Valeur</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($AdminPermInfo as $key => $value) {
                                $AdminPermInfo[$key] = str_replace('0', '<span class="badge badge-danger">False</span>', $AdminPermInfo[$key]);
                                $AdminPermInfo[$key] = str_replace('1', '<span class="badge badge-success">True</span>', $AdminPermInfo[$key]);
                            }
                            AdminPermAddRow("PERM_View_User", $AdminPermInfo[0]);
                            AdminPermAddRow("PERM_Edit_User", $AdminPermInfo[1]);
                            AdminPermAddRow("PERM_View_Vehicle", $AdminPermInfo[2]);
                            AdminPermAddRow("PERM_Edit_Vehicle", $AdminPermInfo[3]);
                            AdminPermAddRow("PERM_View_Gang", $AdminPermInfo[4]);
                            AdminPermAddRow("PERM_Edit_Gang", $AdminPermInfo[5]);
                            AdminPermAddRow("PERM_View_Home", $AdminPermInfo[6]);
                            AdminPermAddRow("PERM_Edit_Home", $AdminPermInfo[7]);
                            AdminPermAddRow("PERM_View_Container", $AdminPermInfo[8]);
                            AdminPermAddRow("PERM_Edit_Container", $AdminPermInfo[9]);
                            AdminPermAddRow("PERM_Login", $AdminPermInfo[10]);
                            AdminPermAddRow("PERM_Manage_Staff", $AdminPermInfo[11]);
                            AdminPermAddRow("PERM_Edit_Licence", $AdminPermInfo[12]);
                            if (isset($AdminPermInfo[13])) AdminPermAddRow("PERM_View_Logs", $AdminPermInfo[13]);
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>
                                                <!-- Fin Edit Admin -->
                                            </div>
                                            <div class="tab-pane fade" id="custom-nav-editGang" role="tabpanel" aria-labelledby="custom-nav-editGang-tab">
                                                <!-- Début Edit Gang -->
                                                <br>
                                                    <table id="bootstrap-data-table-editGang" class="table table-striped table-bordered">
                                                        <thead class="thead-dark">
                                                            <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Autheur</th>
                                                            <th scope="col">ID</th>
                                                            <th scope="col">Propriétaire</th>
                                                            <th scope="col">Argent</th>
                                                            <th scope="col">Max</th>
                                                            <th scope="col">Date</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                                include('include/connexiondb_site.php');
                                                                $reponse = $bdd->query("SELECT * FROM Logs WHERE Type='editGang' ORDER BY id DESC");
                                                                while ($donnees = $reponse->fetch()) {
                                                                    $date = new DateTime($donnees['Time']);
                                                                    $day = getDay($date->format('l'));
                                                                    $month = getMonth($date->format('F'));
                                                                    $date = "$day {$date->format('d')} $month {$date->format('Y H:i:s')}";

                                                                    $GangInfo = $donnees['Content'];
                                                                    $GangInfo = explode(']-|-[', $GangInfo);
                                                                    $ID = $GangInfo[0];
                                                                    $GangOldInfo = explode(']-[', $GangInfo[1]);
                                                                    $Old_Owner = $GangOldInfo[0];
                                                                    $Old_OwnerGang_Link = 'ShowUser.php?uid='.$GangOldInfo[0];
                                                                    $Old_Argent = strrev(wordwrap(strrev($GangOldInfo[1]), 3, '.', true)).(' €');
                                                                    $Old_Max = $GangOldInfo[2];
                                                                    $GangInfo = explode(']-[', $GangInfo[2]);
                                                                    $Owner = $GangInfo[0];
                                                                    $OwnerGang_Link = 'ShowUser.php?uid='.$GangInfo[0];
                                                                    $Argent = strrev(wordwrap(strrev($GangInfo[1]), 3, '.', true)).(' €');
                                                                    $Max = $GangInfo[2];
                                                                    /*152]-|-[76561198127725097]-[2147483647]-[12]-|-[76561198127725097]-[22446276]-[12*/
                                                                    
                                                                    
                                                                    
                                                                    $row = "<tr>
                                                                    <th>{$donnees['id']}</th><td>{$donnees['User']}</td>
                                                                    <td><a target='_blank' href=\"ShowGang.php?id={$ID}\">{$ID}</a></td>
                                                                    <td><a target='_blank' href=\"{$Old_OwnerGang_Link}\">{$Old_Owner}</a> -> <a target='_blank' href=\"{$OwnerGang_Link}\">{$Owner}</a></td>
                                                                    <td>{$Old_Argent} -> {$Argent}</td>
                                                                    <td>{$Old_Max} -> {$Max}</td>
                                                                    <td>$date</td>
                                                                    </tr>";
                                                                    echo $row;
                                                                }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                <!-- Fin Edit Gang -->
                                            </div>
                                            <div class="tab-pane fade" id="custom-nav-EditLicense" role="tabpanel" aria-labelledby="custom-nav-EditLicense-tab">
                                                <!-- Début Edit Licence -->
                                                <br>
                                                    <table id="bootstrap-data-table-EditLicense" class="table table-striped table-bordered">
                                                        <thead class="thead-dark">
                                                            <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Autheur</th>
                                                            <th scope="col">Propriétaire</th>
                                                            <th scope="col">Licence</th>
                                                            <th scope="col">Edition</th>
                                                            <th scope="col">Date</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                                include('include/connexiondb_site.php');
                                                                $reponse = $bdd->query("SELECT * FROM Logs WHERE Type='editLisence' ORDER BY id DESC");
                                                                while ($donnees = $reponse->fetch()) {
                                                                    $date = new DateTime($donnees['Time']);
                                                                    $day = getDay($date->format('l'));
                                                                    
                                                                    $month = getMonth($date->format('F'));
                                                                    
                                                                    $date = "$day {$date->format('d')} $month {$date->format('Y H:i:s')}";
                                                                    $LicenceInfo = $donnees['Content'];
                                                                    /*1]-[license_civ_meca]-[76561198039975557*/
                                                                    $LicenceInfo = explode(']-[', $LicenceInfo);
                                                                    $LicenceValue = "Retirée";
                                                                    if ($LicenceInfo[0] === "1") $LicenceValue = "Accordée";
                                                                    $Owner = 'ShowUser.php?uid='.$LicenceInfo[2];
                                                                    $Licence = $LicenceInfo[1];
                                                                    $row = "<tr>
                                                                    <th>{$donnees['id']}</th><td>{$donnees['User']}</td>
                                                                    <td><a target='_blank' href=\"{$Owner}\">{$LicenceInfo[2]}</a></td>
                                                                    <td>{$Licence}</td>
                                                                    <td>{$LicenceValue}</td>
                                                                    <td>$date</td>
                                                                    </tr>";
                                                                    echo $row;
                                                                }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                <!-- Fin Edit Licence -->
                                            </div>
                                            <div class="tab-pane fade" id="custom-nav-EditPlayer" role="tabpanel" aria-labelledby="custom-nav-EditPlayer-tab">
                                                <!-- Début Edit Player -->
                                                <br>
                                                    <table id="bootstrap-data-table-EditPlayer" class="table table-striped table-bordered">
                                                        <thead class="thead-dark">
                                                            <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Autheur</th>
                                                            <th scope="col">UID</th>
                                                            <th scope="col"><!-- Edit --></th>
                                                            <th scope="col">Date</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                                include('include/connexiondb_site.php');
                                                                $reponse = $bdd->query("SELECT * FROM Logs WHERE Type='editPlayer' ORDER BY id DESC");
                                                                while ($donnees = $reponse->fetch()) {
                                                                    $date = new DateTime($donnees['Time']);
                                                                    $day = getDay($date->format('l'));
                                                                    $month = getMonth($date->format('F'));
                                                                    $date = "$day {$date->format('d')} $month {$date->format('Y H:i:s')}";
                                                                    
                                                                    $PlayerEditInfo = explode(']-|-[', $donnees['Content']);
                                                                    $UID = $PlayerEditInfo[0];
                                                                    $PlayerOldInfo = explode(']-[', $PlayerEditInfo[1]);
                                                                    $PlayerNewInfo = explode(']-[', $PlayerEditInfo[2]);

                                                                    /*76561198039975557]-|-[100]-[81528112]-[0]-[0]-[0]-|-[1000]-[81528112]-[0]-[0]-[0*/

                                                                    $row = "<tr><th>{$donnees['id']}</th>
                                                                    <td>{$donnees['User']}</td>
                                                                    <td>{$UID}</td>
                                                                    <td><button type=\"button\" class=\"btn btn-outline-primary mb-1\" data-toggle=\"modal\" data-target=\"#editPlayerModal_{$donnees['id']}\">Voir</button></td>
                                                                    <td>$date</td>
                                                                    </tr>";
                                                                    echo $row;

                                                                } ?>
                                                        </tbody>
                                                    </table>
<?php
    include('include/connexiondb_site.php');
    $reponse = $bdd->query("SELECT * FROM Logs WHERE Type='editPlayer' ORDER BY id DESC");
    while ($donnees = $reponse->fetch()) {
        
        $PlayerEditInfo = explode(']-|-[', $donnees['Content']);
        $PlayerOldInfo = explode(']-[', $PlayerEditInfo[1]);
        $PlayerNewInfo = explode(']-[', $PlayerEditInfo[2]);
?>
<div class="modal fade" id="editPlayerModal_<?=$donnees['id']?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header"> <h5 class="modal-title" id="editPlayerModal_<?=$donnees['id']?>Label">Edition de <?=$UID?></h5> </div>
            <div class="modal-body">
                <div class="col-lg-12">
                    <table class="table table-striped table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>Ligne</th>
                                <th>Avant</th>
                                <th>Après</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            PlayerEditAddRow('Cash', $PlayerOldInfo[0], $PlayerNewInfo[0]);
                            PlayerEditAddRow('Bank', $PlayerOldInfo[1], $PlayerNewInfo[1]);
                            PlayerEditAddRow('CopLevel', $PlayerOldInfo[2], $PlayerNewInfo[2]);
                            PlayerEditAddRow('MedicLevel', $PlayerOldInfo[3], $PlayerNewInfo[3]);
                            PlayerEditAddRow('AdminLevel', $PlayerOldInfo[4], $PlayerNewInfo[4]);
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>
                                                <!-- Fin Edit Player -->
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
        </div><!-- .content -->        
        <?php } else { ?>
            <div class="content">
                <h1>Acces Refusé !</h1>
            </div>
        <?php } ?>

        <div class="clearfix"></div>

        <?php include('include/footer.php'); ?>

    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/jszip.min.js"></script>
    <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="assets/js/init/datatables-init.js"></script>


    <script type="text/javascript">
    $(document).ready(function() {
        $('#bootstrap-data-table-Connexion').DataTable( {
            "ordering": false,
            "paging":   true,
            "info":     true
        
        } );
        $('#bootstrap-data-table-delContainer').DataTable( {
            "ordering": false,
            "paging":   true,
            "info":     true
        } );
        $('#bootstrap-data-table-delAdmin').DataTable( {
            "ordering": false,
            "paging":   true,
            "info":     true
        } );
        $('#bootstrap-data-table-delGang').DataTable( {
            "ordering": false,
            "paging":   true,
            "info":     true
        } );
        $('#bootstrap-data-table-delHouse').DataTable( {
            "ordering": false,
            "paging":   true,
            "info":     true
        } );
        $('#bootstrap-data-table-delVehicle').DataTable( {
            "ordering": false,
            "paging":   true,
            "info":     true
        } );
        $('#bootstrap-data-table-editGang').DataTable( {
            "ordering": false,
            "paging":   true,
            "info":     true
        } );
        $('#bootstrap-data-table-EditLicense').DataTable( {
            "ordering": false,
            "paging":   true,
            "info":     true
        } );
        $('#bootstrap-data-table-AddAdmin').DataTable( {
            "ordering": false,
            "paging":   true,
            "info":     true
        } );
        $('#bootstrap-data-table-editAdmin').DataTable( {
            "ordering": false,
            "paging":   true,
            "info":     true
        } );
        $('#bootstrap-data-table-EditPlayer').DataTable( {
            "ordering": false,
            "paging":   true,
            "info":     true
        } );
    } );
    
  </script>


</body>
</html>

<?php

function getMonth($month) {
    switch ($month) {
        case 'January':
            $month = "January";
            break;
        case 'February':
            $month = "Février";
            break;
        case 'March':
            $month = "Mars";
            break;
        case 'April':
            $month = "Avril";
            break;
        case 'May':
            $month = "Mai";
            break;
        case 'June':
            $month = "Juin";
            break;
        case 'July':
            $month = "Juillet";
            break;
        case 'August':
            $month = "Août";
            break;
        case 'September':
            $month = "Septembre";
            break;
        case 'October':
            $month = "Octobre";
            break;
        case 'November':
            $month = "Nombre";
            break;
        case 'December':
            $month = "Decembre";
            break;
    }
    return $month;
}

function getDay ($day) {
    switch ($day) {
        case 'Monday':
            $day = "Lundi";
            break;
        case 'Tuesday':
            $day = "mardi";
            break;
        case 'Wednesday':
            $day = "Mercredi";
            break;
        case 'Thursday':
            $day = "Jeudi";
            break;
        case 'Friday':
            $day = "Vendredi";
            break;
        case 'Saturday':
            $day = "Samedi";
            break;
        case 'Sunday':
            $day = "Dimanche";
            break;
    }
    return $day;
}

function AdminPermAddRow ($Value1, $Value2) {
    echo "<tr><td>$Value1</td><td>$Value2</td></tr>";
}
function PlayerEditAddRow ($Value1, $Value2, $Value3) {
    echo "<tr><td>$Value1</td><td>$Value2</td><td>$Value3</td></tr>";
}
?>
