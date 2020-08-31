<?php 
require_once('model/Manager.php');

class CommentManager extends Manager{

	public function getComments($postId){
	$db = $this->dbConnect();
	$comments = $db->prepare('SELECT user.id, user.pseudo, user.mail, comments.id, comments.author_id, comments.post_id, comments.comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments INNER JOIN user ON user.id = comments.author_id WHERE post_id = ? ORDER BY comment_date DESC');
	$comments->execute(array($postId));

	return $comments;
}

	public function postComment($postId, $author_id, $comment){
		$db = $this->dbConnect();
		$comments = $db->prepare('INSERT INTO comments(post_id, author_id, comment, comment_date) VALUES(?, ?, ?, NOW())');
		$affectedLines = $comments->execute(array($postId, $author_id, $comment));
		return $affectedLines;
	}

	public function signaled($id){
		$db = $this->dbConnect();
		$req_comment = $db->prepare('UPDATE comments SET signaled= \'1\' WHERE id = ?');
		$comment_signal = $req_comment->execute(array($id));

		return $comment_signal;
	}
	public function commentSignaled(){
		$db = $this->dbConnect();
		$req_signaled = $db->query('SELECT * FROM comments WHERE signaled = 1');
		return $req_signaled;
	}
	public function notSignaled($id){
		$db = $this->dbConnect();
		$req_comment = $db->prepare('UPDATE comments SET signaled= \'0\' WHERE id = ?');
		$req_signal = $req_comment->execute(array($id));

		return $req_signal;
	}
	public function deletedComment($id){
		$db = $this->dbConnect();
		$delete_comment = $db->prepare('DELETE FROM comments WHERE id = ?');
		$del_comment = $delete_comment->execute(array($id));
		return $del_comment;
	}
}
