<?php $title = "Mon Blog" ?>

<?php ob_start(); ?>
	<?php 
		if(isset($_SESSION['pseudo'])){
		$menu ='<p><a class="btn btn-danger" href="index.php?action=disconnect">Déconnexion</a></p>'
		?>
		<?php 
		if($_SESSION['admin'] == 1){
		$menu ='<p><a class="btn btn-dark" href="index.php?action=admin">Admin</a></p>';
		$secondMenu='<p><a class="btn btn-danger" href="index.php?action=disconnect">Déconnexion</a></p>'
		?>
		<?php
		}
		?>
		<h4>Bonjour <span class="hello"><?= $_SESSION['pseudo']  ?></span></h4>
		<?php
		} else {
		$menu = '<p><a class="btn btn-info btn-sm" href="index.php?action=signUp">Inscription</a></p>';
		$secondMenu='<p><a class="btn btn-secondary btn-sm" href="index.php?action=connect">Connexion</a></p>'
		?>
		<?php
		}
	?>
	<div class="container">
		<p>Derniers billets du blog : </p>
	</div>
<?php
while ($data = $posts->fetch()) {
?>
	<div class="container">
		<div class="row">
			<div class="col md-10">
				<div class= "card">
					<div class="card-body md-8">
						<div class="card-title">
							<h3 class="news">
								<?= htmlspecialchars($data['title']); ?>
							</h3>
							<span class="info">le <?= htmlspecialchars($data['creation_date_fr']); ?> </em></span>
						</div>
						<div class="card-text">
							<p>
							<?=html_entity_decode($data['content']);?>
							</br>
							<em><a class="new_com" href="index.php?action=post&amp;id=<?= $data['id'] ?>">Commentaires</a></em>
							</p>
						</div>
					</br>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php
	}
	$posts->closeCursor();
	?>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>