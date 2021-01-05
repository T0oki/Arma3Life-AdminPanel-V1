<?php
class Logs{
	public function add ($User, $Type, $Content = null) {
		include('connexiondb_site.php');

		$req = $bdd->prepare("INSERT INTO Logs(Type, User, Time, Content) VALUES(:Type, :User, :Time, :Content)");
		$req->execute(array(
			'Type' => $Type,
			'User' => $User,
			'Time' => date("Y-m-d H:i:s"),
			'Content' => $Content,
		    ));
	}
}
?>