<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>

	<?php $menu =
	'<a class="btn btn-danger btn-lg" href="index.php"> Retour a l\'accueil</a>'
	?>
	<div class="newest">
		<h3 class="news">
			<?= htmlspecialchars($post['title']) ?>
		</h3>
		<span class="info"> le <?= $post['creation_date_fr'] ?></span></br>
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
	</br>
	<?php
	}
	?>
	
	
		<?php
		while ($comment = $comments->fetch())
		{
		?>
		<div class="com">
			<p><strong><?= htmlspecialchars($comment['pseudo']) ?> : </strong></br> <span class="viewDate">le <?= $comment['comment_date_fr'] ?></span>
			<?php if(isset($_SESSION['id']) && $_SESSION['id'] > 0)
			{
			?>
			<a href="index.php?action=signal&amp;id=<?= $comment['id'] ?>"> (signaler)</a></p>
			<?php
			}
			?>
			<p class="viewComment"><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
		</div>
		<?php
		}
		?>		
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>