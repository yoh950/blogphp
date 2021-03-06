<?php $title = "Création de contenu"; ?>

<?php ob_start(); ?>
<?php $menu =
	'<a class="btn btn-danger" href="index.php?action=admin">Retour</a>'
?>
<div class="container">
<h3>Creation de contenu</h3>
	<form action="index.php?action=create" method="post">
		<div class="form-group col-9">
			<label for="title" class="titleInput">Titre :</label>
				<input type="text" class="form-control" name="title" id="title" placeholder="Titre">
			<label for="content" class="titleInput">Contenu :</label>
				<textarea id="content" name="content" cols="30" rows="10"></textarea>
		</div>
		<button type="submit" class="btn btn-primary">Publier</button>
	</form>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>