<?php 

require('model/frontend.php');

function listPosts(){
	$posts = getPosts();
	
	require('view/frontend/listPostsView.php');
}

function post(){
	$post = getPost($_GET['id']);
	$comments = getComments($_GET['id']);

	require('view/frontend/postView.php');
}

function addComment($postId, $author, $comments){
	$affectedLines = postComment($postId, $author, $comments);

	if($affectedLines === false) {
		throw new Exception('Impossible d\'ajouter le commentaire !');
	} else {
		header('location: index.php?action=post&id='. $postId);
	}
}