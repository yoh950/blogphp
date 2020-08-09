<?php 

require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/SignUpManager.php');

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

	require('view/frontend/postView.php');
}

function addComment($postId, $author, $comments){
	$commentManager = new CommentManager();


	$affectedLines = $commentManager->postComment($postId, $author, $comments);

	if($affectedLines === false) {
		throw new Exception('Impossible d\'ajouter le commentaire !');
	} else {
		header('location: index.php?action=post&id='. $postId);
	}
}

function edit($id){
	$editManager = new CommentManager();

	$newComment = $editManager->getComments($_GET['id']);
	require('view/frontend/editView.php');
}

function signUp(){

	require('view/frontend/signUpView.php');
}
function addUser($pseudo, $pass, $mail){
	$signUpManager = new SignUpManager();
	$newUser = $signUpManager->newUsers($pseudo, $pass, $mail);
}