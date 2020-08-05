<?php $title = "Une erreur" ?>

<?php ob_start(); ?>
<h1>Mon super blog</h1>
<div class="bad">
	<h3>Eh oui !!! Une Erreur est survenu </h3>
	<p>Mais comme un grand homme a dit ...</p>
	<h4>Mais victoires sont des chéques mes échecs sont des chefs d'oeuvres </h4>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>