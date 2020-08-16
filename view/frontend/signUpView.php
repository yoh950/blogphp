<?php $title= "Inscription"; ?>

<?php ob_start(); ?>
	<h1>Mon super blog</h1>
	<a href="index.php"> Retour</a>
	<div class="news">
		<h3>INSCRIPTION</h3>
		<form action="index.php?action=signUpCheck" method="post">
				<p><label for="pseudo"> Pseudo : <input type="text" id="pseudo" name="pseudo"></label></br>
				<label for="pass"> Mot de passe : <input type="password" id="pass" name="pass"></label></br>
				<label for="password"> Mot de passe : <input type="password" id="password" name="password"></label></br>
				<label for="mail"> Adresse email : <input type="email" id="mail" name="mail"></label></br>
				<input type="submit" name="valid" placeholder="Je m'inscris"></p>
		</form>
	</div>


<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>