<?php
require_once('model/Manager.php');

class SignUpManager extends Manager{

	public function newUsers($pseudo, $pass, $mail){
		
		$pseudo = htmlspecialchars($_POST['pseudo']);
		$mail = htmlspecialchars(filter_var($_POST['mail']), FILTER_VALIDATE_EMAIL);
		$pass = htmlspecialchars(password_hash($_POST['mail'], PASSWORD_DEFAULT));

		$db = $this->dbConnect();
		$req_user = $db->prepare('SELECT * FROM user WHERE pseudo = ?');
		$req_user->execute(array($pseudo));
		$pseudo_exist = $req_user->rowCount();

		if($pseudo_exist == 0){
			$req = $db->prepare('INSERT INTO user (pseudo, pass, mail, date_signUp) VALUE (?, ?, ?, CURDATE())');
			$newUser = $req->execute(array($pseudo, $pass, $mail));
			return $newUser; 
		}
		
		}
	}
