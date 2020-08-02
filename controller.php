<?php 

require('model.php');

function listPosts(){
	$posts = getPosts();
	
	require('listPostsView.php');
}

function post(){
	$post = getPosts($_GET['id']);
	$comment = getComments($_GET['id']);

	require('postView.php');
}