<?php 
require_once('model/Manager.php');

class ConnectManager extends Manager{


	public function connected($pseudo){
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT * FROM user WHERE pseudo = ?');
		$req->execute(array($pseudo));
		
		$pseudo_exist = $req->rowCount();
		if($pseudo_exist == 1){
			$user_info = $req->fetch();
			return $user_info;
		}
	}
}