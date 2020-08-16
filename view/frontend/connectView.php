<?php $title = "Inscription" ?>

<?php ob_start(); ?>
<h1>Mon super blog !! </h1>
<a href="index.php"> Retour</a>
<form action="index.php?action=connected" method="post">
	<p><input type="text" name="pseudo" placeholder="Entrez votre pseudo "></p>
	<p><input type="text" name="pass" placeholder="Entrez votre mot de passe : "></p>
	<p><input type="submit" name="validation"></p>
</form>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>