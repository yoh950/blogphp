<?php 
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/UserManager.php');


function listPosts(){
	$postManager = new PostManager();
	$posts = $postManager->getPosts();
	
	require('view/frontend/listPostsView.php');
	
}

function post(){
	$postManager = new PostManager();
	$commentManager = new CommentManager();

	$post = $postManager->getPost($_GET['id']);
	$comments = $commentManager->getComments($_GET['id']);
	if(isset($_SESSION['pseudo']) AND $_SESSION['pseudo']){

	}
	require('view/frontend/postView.php');
}

function addComment($postId, $author_id, $comments){
	$commentManager = new CommentManager();
	$affectedLines = $commentManager->postComment($postId, $_SESSION['id'], $comments);
	if($affectedLines === false) {
		throw new Exception('Impossible d\'ajouter le commentaire !');
	} else {
		header('location: index.php?action=post&id='. $postId);
	}
}

function signUp(){
	require('view/frontend/signUpView.php');
}

function signUpCheck($pseudo, $pass, $mail){
	$signUpManager = new SignUpManager();
	$newUser = $signUpManager->newUsers($pseudo, $pass, $mail);
	header('location: index.php');
}

function connect(){
	require('view/frontend/connectView.php');
}
function connected($pseudo, $pass){
	$connectManager = new ConnectManager();
	$user_info = $connectManager->connected($pseudo);
	if(password_verify($pass, $user_info['pass'])){
		$_SESSION['id'] = $user_info['id'];
		$_SESSION['pseudo'] = $user_info['pseudo'];
		$_SESSION['admin'] = $user_info['admin'];
	} else {
		echo "Votre idendifiant ou mot de passe sont incorrect!!!";
	}
	
}
function disconnect(){
	$_SESSION = array();
	session_destroy();
}
function signal(){
	$commentManager = new CommentManager();
	$req_comment = $commentManager->signaled($_GET['id']);
}
function adminMenu(){
	require('view/frontend/adminView.php');
}
function newPost(){
	require('view/frontend/createPostView.php');
}
function createPost($title, $content){
	$postManager = new PostManager();
	$postedNew = $postManager->newPost($title, $content);
	if($postedNew === false) {
		throw new Exception('Impossible d\'ajouter le commentaire !');
	} else {
		header('location: index.php');
	}
}
function changePost(){
	$postManager = new PostManager();
	$posts = $postManager->getPosts();
	require('view/frontend/changePostView.php');
}
function changedform(){
	$postManager = new PostManager();
	$post = $postManager->getPost($_GET['id']);
	require('view/frontend/editView.php');
}
function editedPost($title, $content, $id){
	$postManager = new PostManager();
	$edit = $postManager->editPost($title, $content, $id);
}








