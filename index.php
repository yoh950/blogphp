<?php
session_start();
?>
<?php
require('controller/frontend.php');

try{
	if(isset($_GET['action'])) {
		if($_GET['action'] == 'listPosts') {
			listPosts();
			if(isset($_SESSION['admin']) AND $_SESSION['admin'] == 1){
				echo "ADMIN";
			}
		} else if($_GET['action'] == 'post'){
			if(isset($_GET['id']) AND $_GET['id'] > 0){
				post();
			} else {
				throw new Exception('Aucun identifiant de billet envoyé');
			}
		} else if ($_GET['action'] == 'addComment'){
			if(isset($_GET['id']) AND $_GET['id'] > 0){
				if(!empty($_POST['comment'])){
					//die(var_dump($_GET['id'], $_POST['author_id'], $_POST['comment']));
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
			}
		} else if ($_GET['action'] == 'disconnect'){
			disconnect();
			listPosts();
		} else if ($_GET['action'] == 'signal'){
			signal($_GET['id']);
			listPosts();
		} else if ($_GET['action'] == 'admin'){
			if(isset($_SESSION['admin']) && $_SESSION['admin'] == 1){
			adminMenu();
			}
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
			//die(var_dump($_GET['id'], $_POST['newTitle']));
			editedPost($_POST['newTitle'], $_POST['editNewPost'], $_GET['id']);
			changePost();
		} else if ($_GET['action'] == 'deletePost') {
			deletePost();
		} else if ($_GET['action'] == 'deleted'){
			deletedPost($_GET['id']);
		}
	} else {
		listPosts();
	}
	
}

catch (Exception $e){
		echo 'Erreur : ' . $e->getMessage();
	}

