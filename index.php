<!DOCTYPE HTML>
	<html>
		<head>
			<meta charset="utf-8">
			<title>Super Blog</title>
			<link rel="stylesheet" href="css/style.css">
		</head>
		<body>
			<h1>Mon super blog ! </h1>
			<p>Derniers billets du blog : </p>
<?php
	try {
		$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch (Exception $e)
	{
        die('Erreur : ' . $e->getMessage());
	}
	$reponse = $bdd->query('SELECT id, titre, contenu, date_format(date_creation, \'%d/%m/%y à %Hh%imin%ss\') AS date_creation_fr FROM billets ORDER BY ID DESC LIMIT 0, 5');
	while ($donnees = $reponse->fetch()) {
		echo '<h3>' . htmlspecialchars($donnees['titre']) .' ! le '. htmlspecialchars($donnees['date_creation_fr']) . '</h3> <p class="news">'. htmlspecialchars($donnees['contenu'])
		?>
	</br> 
	<a href="commentaires.php?billet=<?php echo $donnees['id']; ?>">Commentaires </a>
	<?php
	}
$reponse->closeCursor();
?>
		</body>
	</html>