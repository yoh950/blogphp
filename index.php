<?php
session_start();
?>
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
				if(!empty($_POST['comment'])){
					addComment($_GET['id'], $_SESSION['id'], $_POST['comment']);
				} else {
					throw new Exception('Aucun identifiant de billet envoyé !!!');
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
			if(isset($_POST['validation'])){
				if(!empty($_POST['pseudo']) AND !empty($_POST['pass'])){
					connected($_POST['pseudo'], $_POST['pass']);
					header('Location: index.php');
				} else {
				throw new Exception("Veuillez remplir tous les champs svp");
				}
			} else {
				throw new Exception("Veuillez remplir tous les champs svp");
			}
		} else if ($_GET['action'] == 'disconnect'){
			disconnect();
			listPosts();
		} else if ($_GET['action'] == 'signal'){
			signal($_GET['id']);
			listPosts();
		} else if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1){
			if($_GET['action'] == 'admin'){
				adminMenu();
			} else if($_GET['action'] == 'new'){
				newPost();
			} else if($_GET['action'] == 'create') {
				createPost($_POST['title'], $_POST['content']);
			} else if($_GET['action'] == 'edit') {
				changePost();
			} else if($_GET['action'] == 'change'){
				if(isset($_GET['id']) AND $_GET['id'] > 0){
				post();
				}
			} else if($_GET['action'] == 'changedform'){
				if(isset($_GET['id']) AND $_GET['id'] > 0){
					changedform($_GET['id']);
				}
			} else if($_GET['action'] == 'edited'){
				editedPost($_POST['newTitle'], $_POST['editNewPost'], $_GET['id']);
				changePost();
			} else if ($_GET['action'] == 'deletePost') {
				deletePost();
			} else if ($_GET['action'] == 'deleted'){
				deletedPost($_GET['id']);
				deletePost();
			} else if ($_GET['action'] == 'notSignaled'){
				notSignaled();
				adminMenu();
			} else if ($_GET['action'] == 'deletedComment'){
				deleteComment($_GET['id']);
				adminMenu();
			}
		} else {
			throw new Exception();
		}	
		
	} else {
		listPosts();
	}
}

catch (Exception $e){

	echo 'Erreur : ' . $e->getMessage();
	error();
	}

