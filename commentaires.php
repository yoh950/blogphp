<!DOCTYPE HTML>
	<html>
		<head>
			<link rel="stylesheet" href="css/style.css">
			
		</head>
		<body>
			<h1>Mon super blog</h1>
			<a href="index.php"> Retour a la liste des billets</a>
<?php
	try {
		$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch (Exception $e)
	{
        die('Erreur : ' . $e->getMessage());
	}
	$reponse = $bdd->prepare('SELECT titre, contenu, date_format(date_creation, \'%d/%m/%y à %Hh%imin%ss\') AS date_creation_fr FROM billets where id = ? ');
	$reponse->execute(array($_GET['billet']));
	while ($donnees = $reponse->fetch()) {
		echo '<h3>' . $donnees['titre'] . ' - ' . $donnees['date_creation_fr']. '</h3>';
		echo '<p class="news">' . $donnees['contenu'] . '</p>';
	}
	$reponse->closeCursor();
	$req = $bdd->prepare('SELECT commentaires, date_format(date_commentaire, \'%d/%m:%y à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaires WHERE id_billet = ? ORDER BY date_commentaire');
	$req->execute(array($_GET['billet']));
	while ($donnees = $req->fetch())
	{
		echo '<p>' . $donnees['commentaires'] .' - '.$donnees['date_commentaire_fr'] . '</p>';
	}
$req->closeCursor();
?>
		</body>
	</html>