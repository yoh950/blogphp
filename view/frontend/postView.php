<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>

	<?php $menu =
	'<a class="btn btn-danger" href="index.php"> Retour a la liste des billets</a>'
	?>
	<div class="news">
		<h3>
			<?= htmlspecialchars($post['title']) ?>
			<em> le <?= $post['creation_date_fr'] ?></em>
		</h3>
		<p>
			<?= html_entity_decode($post['content']) ?>		
		</p>
		</div>
	<?php if(isset($_SESSION['id']) && $_SESSION['id'] > 0)
	{
	?>
	<form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
	<div>
	    <label for="comment">Commentaire</label><br />
	    <textarea id="comment" name="comment"></textarea>
	</div>
	<div>
	    <input type="submit" class="btn btn-primary" />
	</div>
	</form>

	<?php
	}
	?>
	
	
		<?php
		while ($comment = $comments->fetch())
		{
		?>
			<p><strong><?= htmlspecialchars($comment['pseudo']) ?></strong> le <?= $comment['comment_date_fr'] ?><a href="index.php?action=signal&amp;id=<?= $comment['id'] ?>"> (signaler)</a></p>
			<p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
		
		<?php
		}
		?>		
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>