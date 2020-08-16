<?php
require_once('model/Manager.php');

class SignUpManager extends Manager{

	public function newUsers($pseudo, $pass, $mail){
		$db = $this->dbConnect();
		$req_user = $db->prepare('SELECT * FROM user WHERE pseudo = ?');
		$req_user->execute(array($pseudo));
		$pseudo_exist = $req_user->rowCount();

		if($pseudo_exist == 0){
			$req = $db->prepare('INSERT INTO user (pseudo, pass, mail, date_signUp) VALUE (?, ?, ?, CURDATE())');
			$newUser = $req->execute(array($pseudo, password_hash($pass, PASSWORD_DEFAULT), $mail));
			return $newUser; 
		}
		
		}
	}
