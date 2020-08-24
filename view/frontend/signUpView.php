<?php $title= "Inscription"; ?>

<?php ob_start(); ?>
	<?php $menu =
		'<a class="btn btn-danger" href="index.php">Retour</a>'
	?>
	<div class="news">
		<h3>INSCRIPTION</h3>
		<form action="index.php?action=signUpCheck" method="post">
			<div class="container">
				<div class="form-group">
					<label for="pseudo"> Pseudo : 
					<input type="text" id="pseudo" name="pseudo"></label>
				</div>
				<div class="form-group">
					<label for="pass"> Mot de passe : <input type="password" id="pass" name="pass"></label></br>		
				</div>
				<div class="form-group">
					<label for="password"> Mot de passe : <input type="password" id="password" name="password"></label></br>
				</div>
				<div class="form-group">
					<label for="mail"> Adresse email : <input type="email" id="mail" name="mail"></label></br>
				</div>
			</div>
		
			
			
				</div>
			</div>
				<input type="submit" class="btn btn-primary" name="valid" placeholder="Je m'inscris"></p>
		</form>
	</div>


<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>