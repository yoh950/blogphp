<?php $title = 'Modification de contenu'; ?>

<?php ob_start(); ?>
<?php $menu =
		'<a class="btn btn-danger" href="index.php?action=admin">Retour</a>'
?>
<div class="container">
	<h3>Modification</h3>
	<p>Derniers billets du blog : </p>
<?php
while ($data = $posts->fetch()) {
?>
<div class= "newest">
	<h3 class="news"> 
		<?= htmlspecialchars($data['title']); ?>
	</h3>
	<p class="viewDate"><em>le <?= htmlspecialchars($data['creation_date_fr']); ?> </em></p>
	<p class="viewComment">
	<?= html_entity_decode($data['content']); ?>
	</p>
	<a href="index.php?action=changedform&amp;id=<?= $data['id']?>">modifier</a>
</div>
<?php 
}
?>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>