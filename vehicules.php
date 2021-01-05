<?php
session_name('ArmaPanel');
session_start();
include('include/actualise.php');
$PageName = "Vehicules";

$PageIndex = "Tableau De Bord";
$PageIndexLink = "index.php";

$jsonStr = file_get_contents("include/config/config.json");
$config = json_decode($jsonStr, true);

// Check Permissions
$Acces = false;
if ($PERM_View_Vehicle) $Acces = true;
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
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Vehicule</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Player ID</th>
                                            <th>ClassName</th>
                                            <th>Side</th>
                                            <th>Type</th>
                                            <th>Edition</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include('include/connexiondb_Serveur.php');
                                        $reponse = $serveur_bdd->query("SELECT * FROM vehicles");
                                        while ($donnees = $reponse->fetch())
                                        {
                                            $Type = $config['vehicules']['type'][$donnees['type']];
                                            $Side = $config['vehicules']['side'][$donnees['side']];

                                            if (isset($config['vehicules']['classname'][$donnees['classname']])) $Name = $config['vehicules']['classname'][$donnees['classname']];
                                            else $Name = $donnees['classname'];
                                            
                                            $Pid = $donnees['pid'];
                                            $Owner = $serveur_bdd->query("SELECT * FROM players WHERE pid='$Pid'");
                                            $Owner = $Owner->fetch();
                                            ?>
                                            <tr>
                                            <td><a class="btn btn-primary m-l-10 m-b-10" href="ShowUser.php?uid=<?php echo $Pid;?>" role="button"><?php echo $Owner['name'];?></span></td>
                                            <td><?= $Name?></td>
                                            <td><?= $Side?></td>
                                            <td><?= $Type?></td>
                                            <td><a class="btn btn-primary" href="ShowVehicle.php?id=<?php echo $donnees['id'];?>" role="button">Edit</a></td>
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
            </div><!-- .animated -->
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
          $('#bootstrap-data-table-export').DataTable();
      } );
  </script>


</body>
</html>