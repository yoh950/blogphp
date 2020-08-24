<?php $title = "Mon Blog" ?>

<?php ob_start(); ?>
	<?php 
		if(isset($_SESSION['pseudo'])){
		$menu ='<p><a class="btn btn-danger" href="index.php?action=disconnect">Deconnexion</a></p>'
		?>
		<?php 
		if($_SESSION['admin'] == 1){
		$menu ='<p><a class="btn btn-danger" href="index.php?action=disconnect">Deconnexion</a></p>
				<p><a class="btn btn-dark" href="index.php?action=admin">Admin</a></p>'
		?>
		<?php
		}
		?>
		<h3>Bonjour <?= $_SESSION['pseudo']  ?></h3>
		<?php
		} else {
		$menu = '<p><a class="btn btn-info" href="index.php?action=signUp">Inscription</a></p>
				<p><a class="btn btn-secondary" href="index.php?action=connect">Connexion</a></p>'
		?>
		<?php
		}
		?>
<!--<div class="container">
      		<div class="row">
      			<div class="col">
      				<nav class="navbar navbar-expand navbar-light bg-light">
						<a href="index.html" class="navbar-brand">
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent"></button>
						<div id="navbarContent" class="collapse navbar-collapse">
							<ul class="navbar-nav">
								<li class="navbar-nav active">
									
								</li>
							</ul>
							<ul class="navbar-nav">
								<li class="navbar-nav">
									<a href="#" class="nav-link">Cours</a>
								</li>
							</ul>
						</div>
      				</nav>
      			</div>
      		</div>
</div>
<?php 
	if(isset($_SESSION['pseudo'])){
	?>
	<p><a href="index.php?action=disconnect">Deconnexion</a></p>
	<?php 
	if($_SESSION['admin'] == 1){
	?>
	<p><a href="index.php?action=admin">Admin</a></p>
	<?php
	}
	?>
	

	<h2>Bonjour <?= $_SESSION['pseudo']  ?>	</h2>
	<?php
	} else {
	?>
	<p><a href="index.php?action=signUp">Inscription</a></p>
	<p><a href="index.php?action=connect">Connexion</a></p>
	<?php

	}
	?>-->
<p>Derniers billets du blog : </p>
<?php
while ($data = $posts->fetch()) {
?>


	<div class= "news">
		<h3> 
			<?= htmlspecialchars($data['title']); ?>
			<em>le <?= htmlspecialchars($data['creation_date_fr']); ?> </em>
		</h3>

		<p>
		<?=
		html_entity_decode($data['content']);
		?>
			</br>
			<em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Commentaires</a></em>
			</p>
		</br>
	</div>

	<?php
	}
	$posts->closeCursor();
	?>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>