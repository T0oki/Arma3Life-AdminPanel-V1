<?php
session_name('ArmaPanel');
session_start();
include('include/actualise.php');
$PageName = "Staff";

$PageIndex = "Tableau De Bord";
$PageIndexLink = "index.php";


// Check Permissions
$Acces = false;
if ($PERM_Manage_Staff) $Acces = true;

include ("include/connexiondb_site.php");
?>


<!doctype html>
<html class="no-js" lang="">
<head>
    <?php include('include/head.php'); ?>
    <link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">
</head>

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
            <div class="animated fadeIn">
				<div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Menu Staff</strong>
                            </div>
                        </div>
                        <div class="card-body">
                        	<div class="col-sm-12 mb-4">
                                <div class="card-group">
                                    <div class="card col-md-6 no-padding ">
                                        <div class="card-body">
                                            <div class="h1 text-muted text-right mb-4">
                                                <i class="fa fa-user-plus"></i>
                                            </div>
                                            <small class="text-muted text-uppercase font-weight-bold">Ajouter un Utilisateur Staff</small><br>
                                            <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#mediumModaladd">Ajouter</button>
                                            <div class="progress progress-xs mt-3 mb-0 bg-info" style="width: 40%; height: 5px;"></div>
                                        </div>
                                    </div>
                                    <div class="card col-md-6 no-padding ">
                                        <div class="card-body">
                                            <div class="h1 text-muted text-right mb-4">
                                                <i class="fa fa-user"></i>
                                            </div>
                                            <small class="text-muted text-uppercase font-weight-bold">Modifier un Utilisateur Staff</small><br>
                                            <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#mediumModalmod">Modifier</button>
                                            <div class="progress progress-xs mt-3 mb-0 bg-success" style="width: 40%; height: 5px;"></div>
                                        </div>
                                    </div>
                                    <div class="card col-md-6 no-padding ">
                                        <div class="card-body">
                                            <div class="h1 text-muted text-right mb-4">
                                                <i class="fa fa-user-times"></i>
                                            </div>
                                            <small class="text-muted text-uppercase font-weight-bold">Supprimer un Utilisateur Staff</small><br>
                                            <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#mediumModalsupprr">Supprimer</button>
                                            <div class="progress progress-xs mt-3 mb-0 bg-danger" style="width: 40%; height: 5px;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 

                <!-- Début Ajouter Staff -->
                <div class="modal fade" id="mediumModaladd" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header"> <h5 class="modal-title" id="mediumModalLabel">Ajouter Un Utilisateur</h5> </div>
                            <div class="modal-body">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <form action="/functions/addAdmin.php" method="post">
                                            <div class="card-header"><strong>Création Utilisateur</strong><small></small></div>
                                            <div class="card-body card-block">
                                                <div class="form-group"><label class=" form-control-label">Nom d'Utilisateur</label><input required type="text" name="Nom" placeholder="Léo Iskia" class="form-control"></div>
                                                <div class="form-group"><label class=" form-control-label">Adresse Email</label><input required type="email" name="Email" placeholder="exemple@exemple.com" class="form-control"></div>
                                                <div class="form-group"><label class=" form-control-label">UID</label><input required type="number" name="UID" placeholder="76561198098401487" class="form-control"></div>
                                                <div class="form-group"><label class=" form-control-label">Mot de Passe</label><input required type="password" name="Password" placeholder="*********" class="form-control"></div>
                                                <div class="row form-group">
                                                    <div class="col col-md-6"><label class=" form-control-label">Autorisation de l'Utilisateur</label></div>
                                                    <div class="col col-md-12">
                                                        <div class="form-check">
                                                            <?php ListPerms(); ?>                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"> </i> Anuler</button>
                                                <button type="submit" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"> </i> Confirmer</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- Fin Ajouter Staff -->

            <!-- Début Modifier Staff -->

                <div class="modal fade" id="mediumModalmod" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header"> <h5 class="modal-title" id="mediumModalLabel">Liste Staff</h5> </div>
                            <div class="modal-body">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header"> <strong class="card-title">Data Utilisateur Staff</strong> </div>
                                        <div class="card-body">
                                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Nom d'Utilisateur</th>
                                                        <th>Modifier</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php

                                                        $reponse = $bdd->query("SELECT * FROM Utilisateurs");
                                                        while ($donnees = $reponse->fetch())
                                                        {
                                                            ?>
                                                            <tr>
                                                                <td><?= $donnees['Nom'] ?></td>
                                                                <td><button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#edit<?= $donnees['ID']?>">Modifier</button></td>
                                                            </tr>
                                                            <?php
                                                        }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<?php
    $reponse = $bdd->query("SELECT * FROM Utilisateurs");
    while ($donnees = $reponse->fetch())
    {
        ?>
            <div class="modal fade" id="edit<?= $donnees['ID']?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header"> <h5 class="modal-title" id="mediumModalLabel">Modifier Un Utilisateur</h5> </div>
                        <div class="modal-body">
                            <div class="col-lg-12">
                                <div class="card">
                                    <form action="/functions/editAdmin.php" method="post">
                                        <div class="card-header"><strong>Modification Utilisateur</strong><small></small></div>
                                        <div class="card-body card-block">
                                            <div class="form-group"><label for="company" class=" form-control-label">Nom d'Utilisateur</label><input type="text" name="Nom" placeholder="Léo Iskia" value="<?= $donnees['Nom']?>" class="form-control"></div>
                                            <div class="form-group"><label for="vat" class=" form-control-label">Adresse Email</label><input type="text" name="Email" placeholder="exemple@exemple.com" value="<?= $donnees['Email']?>" class="form-control"></div>
                                            <div class="form-group"><label for="street" class=" form-control-label">UID</label><input type="text" name="UID" placeholder="76561198098401487" value="<?= $donnees['UID']?>" class="form-control"></div>
                                            <div class="row form-group">
                                                <div class="col col-md-6"><label class=" form-control-label">Autorisation de l'Utilisateur</label></div>
                                                <div class="col col-md-12">
                                                    <div class="form-check">
                                                        <?php ListPerms($donnees['ID']); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"> </i> Anuler</button>
                                            <button type="submit" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"> </i> Confirmer</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
    }
?>
                <!-- Fin Modifier Staff -->

                <!-- Début Supprimer Staff -->
                <div class="modal fade" id="mediumModalsupprr" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mediumModalLabel">Liste Staff</h5>
                            </div>
                            <div class="modal-body">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <strong class="card-title">Data Utilisateur Staff</strong>
                                        </div>
                                        <div class="card-body">
                                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Nom d'Utilisateur</th>
                                                        <th>Supprimer</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php

                                                        $reponse = $bdd->query("SELECT * FROM Utilisateurs");
                                                        while ($donnees = $reponse->fetch())
                                                        {
                                                            ?>
                                                            <tr>
                                                                <td><?= $donnees['Nom'] ?></td>
                                                                <td><button data-toggle="modal" data-target="#SuprAdmin<?= $donnees['ID']?>" type="button" class="btn btn-outline-danger">Supprimer</button></td>
                                                            </tr>
<div class="modal fade show" id="SuprAdmin<?= $donnees['ID']?>" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="smallmodalLabel">Confirmation</h5>
            </div>
            <div class="modal-body">
                <p>
                Voulez vous vraiment supprimer <strong><?= $donnees['Nom']?></strong>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Anuler</button>
                <a href="functions/delAdmin.php?id=<?= $donnees['ID']?>"><button type="submit" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"> </i> Confirmer</button></a>
            </div>
        </div>
    </div>
</div>
                                                            <?php
                                                        }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"> </i> Anuler</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- Fin Supprimer Staff -->
            </div>
        </div>
<?php } else { ?>
<div class="content">
    <h1>Acces Refusé !</h1>
</div>
<?php } ?>
<div class="clearfix"></div>

<?php include('include/footer.php'); ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="assets/js/main.js"></script>


</body>
</html>

<?php
function AddPermCheckBox($PermName, $String, $ForEdit) {
    $checked = "";
    $UID = "NewMember";
    if ($ForEdit) {
        include('include/connexiondb_site.php');
        $req = $bdd->query("SELECT ".$PermName.", UID FROM Utilisateurs WHERE id=".$ForEdit);
        $donnees = $req->fetch();


        if ($donnees[$PermName] === "1") $checked = "checked";
        $UID = $donnees['UID'];
    }
    echo "<div class=\"checkbox\"><label for=\"$UID$PermName\" class=\"form-check-label \"><input type=\"checkbox\" id=\"$UID$PermName\" name=\"$PermName\" class=\"form-check-input\" $checked>$String</label></div>";
}

function ListPerms($ForEdit = false){
    AddPermCheckBox("PERM_Login", "Se Connecter au Panel", $ForEdit);
    AddPermCheckBox("PERM_View_User", "Voir Les Utilisateur", $ForEdit);
    AddPermCheckBox("PERM_Edit_User", "Éditer les Utilisateur", $ForEdit);
    AddPermCheckBox("PERM_View_Vehicle", "Voir Les Véhicules", $ForEdit);
    AddPermCheckBox("PERM_Edit_Vehicle", "Éditer les Véhicules", $ForEdit);
    AddPermCheckBox("PERM_View_Gang", "Voir Les Gangs", $ForEdit);
    AddPermCheckBox("PERM_Edit_Gang", "Éditer les Gangs", $ForEdit);
    AddPermCheckBox("PERM_View_Home", "Voir Les Propriétés", $ForEdit);
    AddPermCheckBox("PERM_Edit_Home", "Éditer les Propriétés", $ForEdit);
    AddPermCheckBox("PERM_View_Container", "Voir Les Conteneurs", $ForEdit);
    AddPermCheckBox("PERM_Edit_Container", "Éditer les Conteneurs", $ForEdit);
    AddPermCheckBox("PERM_Manage_Staff", "Gérer les acces Staff", $ForEdit);
    AddPermCheckBox("PERM_Edit_Licence", "Editer Les licences utilisateur", $ForEdit);
    AddPermCheckBox("PERM_View_Logs", "Voir les Logs du Panel", $ForEdit);
}

?>