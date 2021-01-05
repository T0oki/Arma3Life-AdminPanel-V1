<?php
session_name('ArmaPanel');
session_start();
$PageName = "Login";

if (isset($_SESSION['Statut'])) { header('location: index.php'); }
$Error = null; 
if (isset($_POST['u']) AND isset($_POST['p']))
{
    include('include/connexiondb_site.php');
    $Email = $_POST['u'];
    $Pass = $_POST['p'];
    $reponse = $bdd->query("SELECT * FROM Utilisateurs WHERE Email='$Email'");
    $donnees = $reponse->fetch();
    if ($donnees['Email'] == $Email)
    {
        $Error = Connexion($bdd, $Email, $Pass);
    }
    else { $Error="DENIED"; }
}

function Connexion($bdd, $Email, $Password)
{
  $reponse = $bdd->query("SELECT * FROM Utilisateurs WHERE Email='$Email'");
  $donnees = $reponse->fetch();
  $TruePassword = $donnees['Password'];
    if (password_verify($Password, $TruePassword))
    {
        $_SESSION['UID'] = $donnees['UID'];
        $_SESSION['Nom'] = $donnees['Nom'];
        $_SESSION['SafeCode'] = $donnees['SafeCode'];
        $Granted = $donnees['activate'];
        if ($Granted)
        {
          $UID = $_SESSION['UID'];
          $SafeCode = $_SESSION['SafeCode'];
          $Time = time();
          $req = $bdd->query("UPDATE Utilisateurs SET LastActivity='$Time' WHERE UID='$UID' AND SafeCode='$SafeCode'");
          $_SESSION['Statut'] = true;
          include("include/Logs.php");
          $Logs = new Logs;
          $Logs->add($donnees['Nom'], 'Connexion', get_ip());
          header('location: index.php'); 
        }
        else return "DENIED_DISABLE";
    }
    else return "DENIED";
}
?>

<!doctype html>
<html class="no-js" lang="">
<head>
    <?php include('include/head.php'); ?>
</head>
<body class="bg-dark">

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <img class="align-content" src="images/logo.png" alt="">
                </div>
                <div class="login-form">
                    <form method="post">
                        <div class="form-group">
                            <h1>
                                <?php 
                                    if (isset($Error)) {
                                      if ($Error === "DENIED") {
                                        if ($Error === "DENIED") {
                                            echo "<span>Access Refusée !</span>";
                                        }
                                        } elseif ($Error === "DENIED_DISABLE") {
                                          echo "<span>Compte Désactivé !</span>";
                                        }
                                    }
                                ?>
                                 
                             </h1>
                            <label>Adresse Email</label>
                            <input type="email" name="u" class="form-control" placeholder="Adresse Email">
                        </div>
                        <div class="form-group">
                            <label>Mort de Passe</label>
                            <input type="password" name="p" class="form-control" placeholder="Mot de Passe">
                        </div>
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Connexion</button>
                        <div class="register-link m-t-15 text-center">
                            <p>Tu n'a pas de compte ? <br>Normal tu ne fais pas parti du Staff !</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>

</body>
</html>
<?php
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