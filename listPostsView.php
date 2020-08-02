<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<?php $title = "Mon Blog" ?>
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<?php ob_start(); ?>
		<h1>Mon super blog !!! </h1>
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
			<em><a href="post.php?id=<?= $data['id'] ?>">Commentaires</a></em>
			</p>
	</div>
	<?php
	}
	$posts->closeCursor();
	?>
	<?php $content = ob_get_clean(); ?>
	<?php require('template.php'); ?>
	</body>
</html>