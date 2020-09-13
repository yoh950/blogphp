<?php $title = 'Modification de contenu'; ?>

<?php ob_start(); ?>
<?php $menu =
		'<a class="btn btn-danger" href="index.php?action=admin">Retour</a>'
	?>
	<h3>Modification</h3>
	<p>Derniers billets du blog : </p>
<?php
while ($data = $posts->fetch()) {
?>


	<div class= "newest">
		<h3> 
			<?= htmlspecialchars($data['title']); ?>
			<em>le <?= htmlspecialchars($data['creation_date_fr']); ?> </em>
		</h3>
		<p>
		<?=
		html_entity_decode($data['content']);
		?>
		</p>
		<a href="index.php?action=changedform&amp;id=<?= $data['id']?>">modifier</a>
	</div>
<?php 
}
?>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>