<?php 
require_once('model/Manager.php');

class PostManager extends Manager {

	public function getPosts(){
		$db = $this->dbConnect();
		$req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');
		return $req;
	}

	public function getPost($postId){
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts Where id= ?');
		$req->execute(array($postId));
		$post = $req->fetch();

		return $post;
	}
	public function newPost($title, $content){
		$db = $this->dbConnect();
		$posted = $db->prepare('INSERT INTO posts(title, content, creation_date) VALUES(?, ?, NOW())');
		$postedNew = $posted->execute(array($title, $content));
		return $postedNew;
	}
	public function editPost($title, $content, $id){
		$db =$this->dbConnect();
		$edit = $db->prepare('UPDATE posts SET title= ?, content= ? WHERE id = ?');
		$editedPost = $edit->execute(array($_POST['newTitle'], $_POST['editNewPost'], $_GET['id']));
		return $editedPost;
	}
	public function deleted($id){
		$db = $this->dbConnect();
		$deletedPost = $db->prepare('DELETE FROM posts WHERE id= ?');
		$del = $deletedPost->execute(array($_GET['id']));
		return $del;
	}
}