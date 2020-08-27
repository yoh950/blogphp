<?php $title = "Modification du commentaire";	?>

<?php ob_start(); ?>
	<h1>Mon super blog !</h1>
	<a href="index.php"> Retour a la liste des billets</a>
	<h3>Modification</h3>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>