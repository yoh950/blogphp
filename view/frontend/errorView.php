<?php $title = "Une erreur" ?>

<?php ob_start(); ?>
<h2>Une erreur est survenue !!!</h2>
<div class="container">
	<div class="row">
		<div class="col md-10">
			<p>Mais comme un grand homme a dit ...</p>
			<h4>Quelquefois l'échec est nécessaire à l'artiste</h4>
			<a href="index.php" class="btn btn-danger btn-lg">Retour a l'accueil</a>
		</div>
		<div class="col md-2">
			<img src="public/images/caution.jpg" class="img-fluid" alt="erreur">
		</div>
	</div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>