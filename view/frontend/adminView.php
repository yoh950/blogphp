<?php $title = "admin"; ?>

<?php ob_start(); ?>
	<?php $menu = 
		'<a href="index.php"> Retour</a>'
	?>
	<h3>Espace administrateur</h3>
	<div class="container">
		<div class="row">
			<div class="col col-md-4">
				<div class="card">
					<div class="card-body btn btn-light">
						<a href="index.php?action=new" class="card-title stretched-link">Creation de nouveau contenu</a>
					</div>
				</div>
			</div>
			<div class="col col-md-4">
				<div class="card">
					<div class="card-body btn btn-light">
						<h4 class="card-title">Modification de contenu</h4>
					</div>
				</div>
			</div>
			<div class="col col-md-4">
				<div class="card">
					<div class="card-body btn btn-light">
						<h4 class="card-title">Supprimer</h4>
					</div>
				</div>
			</div>
		</div>
	</div>	


<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
