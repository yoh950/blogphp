<?php $title = "Inscription" ?>

<?php ob_start(); ?>
<?php $menu =
	'<a class="btn btn-danger" href="index.php">Retour</a>'
?>

<form action="index.php?action=connected" method="post">
	<div class="form-group col-lg-4">
		<input type="text" class="form-control" name="pseudo" placeholder="Entrez votre pseudo "><?php if(isset($output)) {echo $output;} ?>
	</div>

	<div class="form-group col-lg-4">
		<p><input type="password" class="form-control" name="pass" placeholder="Entrez votre mot de passe : "></p>
	</div>
	<div class="text-center">
		<p><input type="submit" class="btn btn-primary" name="validation"></p>
	</div>
	
</form>


<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>