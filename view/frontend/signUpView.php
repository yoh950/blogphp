<?php $title= "Inscription"; ?>

<?php ob_start(); ?>
<?php $menu =
	'<a class="btn btn-danger" href="index.php">Retour</a>'
?>
<?php
	$pseudo_regex = "#^[a-zA-Z0-9._-]+$#";
	$email_regex = "#^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-z]{2,4}$#";
	if(isset($_POST['pseudo'])){
		if(preg_match($pseudo_regex, $_POST['pseudo'])){
			$output = "<span style='color: green;'>  ✅ </span>";
		} else {
			$output = "<span style='color:red;'> X </span>";
			var_dump($_POST['pseudo']);
		}
	}
	if(isset($_POST['mail'])){
		if(preg_match($email_regex, $_POST['mail'])){
			$output_mail = "<span style='color: green;'>  ✅ </span>";
		} else {
			$output_mail = "<span style='color:red;'> X </span>";
		}
	}
?>
<h3 class="news" id="signup">INSCRIPTION</h3>
	<form action="#" method="post">
		<div class="container">
			<div class="form-row justify-content-center">
				<div class="form-group ">
					<label for="pseudo"> Pseudo : 
					<input type="text" id="pseudo" name="pseudo"><?php if(isset($output)) {echo $output;} ?></label>
				</div>
				<div class="form-group">
					<label for="mail"> Adresse email : <input type="email" id="mail" name="mail"><?php if(isset($output_mail)) {echo $output_mail;} ?></label></br>
				</div>
			</div>
			<div class="form-group text-center">
				<label for="pass"> Mot de passe : <input type="password" id="pass" name="pass"></label></br>		
			</div>
			<div class="form-group text-center">
				<label for="password"> Mot de passe : <input type="password" id="password" name="password"></label></br>
			</div>
		</div>
		<div class="text-center">
			<input type="submit" class="btn btn-primary btn-lg" name="valid" placeholder="Je m'inscris"></p>
		</div>
		</form>
	</div>


<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>