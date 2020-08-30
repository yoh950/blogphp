<?php $title = "Modification du commentaire";	?>

<?php ob_start(); ?>
<?php $menu =
	'<a class="btn btn-danger" href="index.php?action=admin">Retour a la liste des billets</a>'
?>
	<h3>Modification</h3>
	<form action="index.php?action=edited&amp;id=<?= $_GET['id'];?>" method="post">
		<div class="form-group">
			<label for="newTitle">Nouveau titre</label>
			<input type="text" class="form-control" name="newTitle" value= <?= $post['title']; ?>>
			<label for="editNewPost"> Nouvelle article :</label>
			<textarea type="textarea" class="form-control" cols="30" rows="10" name="editNewPost" value=<?= html_entity_decode($post['content']);?></textarea>
			<button type="submit" class="btn btn-primary">Publier</button>
		</div>
	</form>
	<?= $post['title']; ?>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>