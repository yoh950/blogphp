
<?php
require('controller.php');

if(isset($_GET['action'])) {
	if($_GET['action'] == 'listPosts') {
		listPosts();
	} else if($_GET['action'] == 'post'){
		if(isset($_GET['id']) AND $_GET['id'] > 0){
			post();
		} else {
		echo "Erreur : aucun identifiant de billet envoyé";
		}
	}
} else {
	listPosts();
}

//$posts = getPosts();

//require('indexView.php');
