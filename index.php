
<?php
require('controller/frontend.php');

try{
if(isset($_GET['action'])) {
	if($_GET['action'] == 'listPosts') {
		listPosts();
	} else if($_GET['action'] == 'post'){
		if(isset($_GET['id']) AND $_GET['id'] > 0){
			post();
		} else {
			throw new Exception('Aucun identifiant de billet envoyé');
		}
	} else if ($_GET['action'] == 'addComment'){
		if(isset($_GET['id']) AND $_GET['id'] > 0){
			if(!empty($_POST['author']) AND !empty($_POST['comment'])){
				addComment($_GET['id'], $_POST['author'], $_POST['comment']);
			} else {
				throw new Exception('Aucun identifiant de billet envoyé');
			}
		} else {
		throw new Exception('Aucun identifiant de billet envoyé');
		}
	} else if($_GET['action'] == 'signUp'){
		signUp();
	} else if($_GET['action'] == 'signUpCheck') {
		if(isset($_POST['valid']) AND $_POST['valid']){
			if(!empty($_POST['pseudo']) AND !empty($_POST['pass']) AND !empty($_POST['password']) AND !empty($_POST['mail'])){
				if($_POST['pass'] == $_POST['password']){
					signUpCheck($_POST['pseudo'], $_POST['pass'], $_POST['mail']);
				} else {
					throw new Exception("Vos mots de passe ne sont pas identiques !!");
				}			
			} else {
				throw new Exception("Veuillez remplir tous les champs svp");
			}
		}
	} else if($_GET['action'] == 'connect'){
		connect();
	} else if($_GET['action'] == 'connected'){
		connect();
		if(isset($_POST['validation'])){
			if(!empty($_POST['pseudo']) AND !empty($_POST['pass'])){
				connected($_POST['pseudo']);
			} else {
				throw new Exception("Veuillez remplir tous les champs svp");
			}
		}
	}
} else {
	listPosts();
}
}
catch (Exception $e){
	echo 'Erreur : ' . $e->getMessage();
}
