<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>
	<h1>Mon super blog !</h1>
	<a href="index.php"> Retour a la liste des billets</a>
	<div class="news">
		<h3>
			<?= htmlspecialchars($post['title']) ?>
			<em> le <?= $post['creation_date_fr'] ?></em>
		</h3>
		<p>
			<?= htmlspecialchars($post['content']) ?>		
		</p>
		</div>
	
		<h2>Commentaires</h2>
	<form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
    	<div>
	        <label for="author">Auteur</label><br />
	        <input type="text" id="author" name="author" value="<?= $_SESSION['pseudo'] ?>" />
	    </div>
	    <div>
	        <label for="comment">Commentaire</label><br />
	        <textarea id="comment" name="comment"></textarea>
	    </div>
	    <div>
	        <input type="submit" />
	    </div>
	</form>
		<?php
		while ($comment = $comments->fetch())
		{
		?>
			<p><strong><?= htmlspecialchars($comment['pseudo']) ?></strong> le <?= $comment['comment_date_fr'] ?><a href="index.php?action=edit&amp;id=<?= $comment['id'] ?>"> (modifier)</a></p>
			<p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
		
		<?php
		}
		?>		
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>