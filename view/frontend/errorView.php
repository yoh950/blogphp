<?php $title = "Une erreur" ?>

<?php ob_start(); ?>
<h2>Une Erreur est survenu !!!</h2>
<div class="container">
	<div class="row">
		<div class="col md-10">
			<p>Mais comme un grand homme a dit ...</p>
			<h4>Mais victoires sont des chéques </br> Mes échecs sont des chefs d'oeuvres </h4>
		</div>
		<div class="col md-2">
			<button type="button" class="close btn-danger btn-lg" aria-label="Close">
  			<span aria-hidden="true">&times;</span>
			</button>
		</div>
	</div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>