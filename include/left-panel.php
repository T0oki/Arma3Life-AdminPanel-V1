<aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li <?php if ($PageName === "Index") echo "class=\"active\""; ?>>
                        <a href="index.php"><i class="menu-icon fa fa-laptop"></i>Tableau de bord </a>
                    </li>
                    <li class="menu-title">Life Serveur</li><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>Licences</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-id-card-o"></i><a href="#">Permis de Conduire</a></li>
                            <li><i class="fa fa-id-card-o"></i><a href="#">Permis Camions</a></li>
                            <li><i class="fa fa-id-card-o"></i><a href="##">Permis Moto</a></li>
                            <li><i class="fa fa-id-card-o"></i><a href="#">Permis Aérien</a></li>
                            <li><i class="fa fa-id-card-o"></i><a href="#">Permis Bateaux</a></li>
                            <li><i class="fa fa-id-card-o"></i><a href="#">Permis Port d'Armes</a></li>
                            <li><i class="fa fa-file-word-o"></i><a href="#">Entreprise 1</a></li>
                            <li><i class="fa fa-file-word-o"></i><a href="#">Entreprise 2</a></li>
                            <li><i class="fa fa-file-word-o"></i><a href="#">Entreprise 3</a></li>
                            <li><i class="fa fa-file-word-o"></i><a href="#">Entreprise 4</a></li>
                            <li><i class="fa fa-file-word-o"></i><a href="#">Entreprise 5</a></li>
                            <li><i class="fa fa-file-word-o"></i><a href="#">Rebelle 1</a></li>
                            <li><i class="fa fa-file-word-o"></i><a href="#">Rebelle 2</a></li>
                            <li><i class="fa fa-file-word-o"></i><a href="#">Rebelle 3</a></li>
                            <li><i class="fa fa-file-word-o"></i><a href="#">Rebelle 4</a></li>
                        </ul>
                    </li>
                    <?php
                    if ($PERM_View_User) {
                    ?>
                        <li <?php if ($PageName === "Joueurs") echo "class=\"active\""; ?>>
                            <a href="joueurs.php"> <i class="menu-icon fa fa-user"></i></i>Joueurs</a>
                        </li>
                    <?php } ?>
                    
                    <?php
                    if ($PERM_View_Vehicle) {
                    ?>
                        <li <?php if ($PageName === "Vehicules") echo "class=\"active\""; ?>>
                            <a href="vehicules.php"> <i class="menu-icon fa fa-car"></i>Vehicules</a>
                        </li>
                    <?php } ?>
                    
                    <?php
                    if ($PERM_View_Gang) {
                    ?>
                        <li <?php if ($PageName === "Gangs") echo "class=\"active\""; ?>>
                            <a href="gangs.php"> <i class="menu-icon fa fa-user"></i>Gangs</a>
                        </li>
                    <?php } ?>
                    
                    <?php
                    if ($PERM_View_Home) {
                    ?>
                        <li <?php if ($PageName === "Maisons") echo "class=\"active\""; ?>>
                            <a href="maisons.php"> <i class="menu-icon fa fa-home"></i>Maisons</a>
                        </li>
                    <?php } ?>
                    
                    <?php
                    if ($PERM_View_Container) {
                    ?>
                        <li <?php if ($PageName === "Conteneurs") echo "class=\"active\""; ?>>
                            <a href="conteneurs.php"> <i class="menu-icon fa fa-briefcase"></i>Conteneurs</a>
                        </li>
                    <?php } ?>
                    
                    <li class="menu-title">Administration</li>
                    <?php
                    if ($PERM_Manage_Staff) {
                    ?>
                        <li <?php if ($PageName === "Staff") echo "class=\"active\""; ?>>
                            <a href="staff.php"> <i class="menu-icon fa fa-folder"></i>Staff</a>
                        </li>
                    <?php } ?>
                    <?php
                    if ($PERM_View_Logs) {
                    ?>
                        <li <?php if ($PageName === "Logs") echo "class=\"active\""; ?>>
                            <a href="logs.php"> <i class="menu-icon fa fa-users"></i>Logs</a>
                        </li>
                    <?php } ?>
                    <li>
                        <a href="#"> <i class="menu-icon fa fa-database"></i>Base de donnée</a>
                    </li>

                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>