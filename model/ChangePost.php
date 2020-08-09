<?php 
require_once('model/Manager.php');

class ChangePost extends Manager{


	public function changepost($postId, $author, $comment){
		$db = $this->dbConnect();
		$postModify = $db->prepare('UPDATE comments(author, comment, comment_date VALUES (?, ?, NOW()) WHERE id=?');
		$changedLines = $comments->execute(array($author, $comment));

		return changedLines;
	}
}

?>