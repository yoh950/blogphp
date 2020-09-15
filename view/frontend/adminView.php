<?php $title = "admin"; ?>

<?php ob_start(); ?>
	<?php $menu = 
		'<a class="btn btn-danger" href="index.php">Retour</a>'
	?>
	<h3>Espace administrateur</h3>
</br>
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-4">
				<div class="card bg-primary">
					<div class="card-body btn text-white">
						<a href="index.php?action=new" class="card-title stretched-link">Creation de nouveau contenu</a>
					</div>
				</div>
			</div>
			<div class="col-12 col-lg-4">
				<div class="card bg-secondary">
					<div class="card-body btn">
						<a href="index.php?action=edit" class="card-title stretched-link">Modification de contenu</a>
					</div>
				</div>
			</div>
			<div class="col-12 col-lg-4">
				<div class="card bg-danger">
					<div class="card-body btn">
						<a href="index.php?action=deletePost" class="card-title stretched-link">Supprimer</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	</br>	
	<h2>Commentaire signaler : </h2>
	<?php
while ($data = $req_signaled->fetch()) {
?>


	<div class= "newest">
		<h3> 
			<?= htmlspecialchars($data['pseudo']); ?>
		</h3>
		<p class="viewDate"><em>le <?= htmlspecialchars($data['comment_date_fr']); ?> </em></p>
		<p class="viewComment">
		<?= htmlspecialchars($data['comment']); ?>
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
