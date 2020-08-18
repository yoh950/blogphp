<?php $title = "Mon Blog" ?>

<?php ob_start(); ?>
<h1>Mon super blog !!! </h1>

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
	?>
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
		htmlspecialchars($data['content']);
		?>s
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