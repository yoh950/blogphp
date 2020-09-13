<?php $title = "admin"; ?>

<?php ob_start(); ?>
	<?php $menu = 
		'<a class="btn btn-danger" href="index.php">Retour</a>'
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
						<a href="index.php?action=edit" class="card-title stretched-link">Modification de contenu</a>
					</div>
				</div>
			</div>
			<div class="col col-md-4">
				<div class="card">
					<div class="card-body btn btn-light">
						<a href="index.php?action=deletePost" class="card-title stretched-link">Supprimer</a>
					</div>
				</div>
			</div>
		</div>
	</div>	
	<h2>Commentaire signaler : </h2>
	<?php
while ($data = $req_signaled->fetch()) {
?>


	<div class= "newest">
		<h3> 
			<?= htmlspecialchars($data['pseudo']); ?>
			<em>le <?= htmlspecialchars($data['comment_date_fr']); ?> </em>
		</h3>

		<p>
		<?=
		htmlspecialchars($data['comment']);
		?>
			</br>
			<em><a class="btn btn-success" href="index.php?action=notSignaled&amp;id=<?= $data['id'] ?>">Valider</a></em>
			<em><a class="btn btn-danger" href="index.php?action=deletedComment&amp;id=<?= $data['id'] ?>">Supprimer</a></em>
			</p>
		</br>
	</div>
	<?php
	}
	$req_signaled->closeCursor();
	?>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
