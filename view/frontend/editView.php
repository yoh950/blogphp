<?php $title = "Modification du commentaire";	?>

<?php ob_start(); ?>
	<h1>Mon super blog !</h1>
	<a href="index.php"> Retour a la liste des billets</a>

	<?php 
	while ($comment = $newComment->fetch())
	{
	?>

	<h2>Commentaires</h2>
	
	<form action="" method="post">
    	<div>
	        <label for="author">Auteur</label><br />
	        <input type="text" id="author" name="author" />
	    </div>
	    <div>
	        <label for="comment">Commentaire</label><br />
	        <textarea id="comment" name="comment"></textarea>
	    </div>
	    <div>
	        <input type="submit" />
	    </div>
	</form>
	<p><?= $comment['comment']; ?></p>
	<?php 
	}
	?>	
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>