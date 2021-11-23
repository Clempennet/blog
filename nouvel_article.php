<?php


require 'inc/entete.php';
require 'inc/db.php';

#Si le bouton ajoutes est cliqué
if (isset($_POST['ajouter'])) {

	#Nettoyage des valeurs envoyées via le formulaire
	$titre = mysqli_escape_string($connect, $_POST['titre']);
	$contenu = mysqli_escape_string($connect, $_POST['contenu']);
	$auteur = mysqli_escape_string($connect, $_POST['auteur']);
	$date = mysqli_escape_string($connect, $_POST['date']);
	$etat = mysqli_escape_string($connect, $_POST['etat']);

	#Vérifier si les variables ne sont pas vides
	if (!empty($titre) AND !empty($contenu) AND !empty($auteur) AND !empty($date) AND ($etat == O OR $etat == 1)) {
		
		#Modification des valeurs dans la db
		if ($connect->query("INSERT INTO articles (article_titre, article_contenu, article_auteur, article_date, article_etat) VALUES ('$titre', '$contenu', '$auteur', '$date', '$etat')") == true) {
			
			#Si la requete s'est bien passée, rediriger la liste des articles
			header('Location: articles.php');
		}
		else {
			echo "Une erreur s'est produite lors de l'ajout en base de données";
		}

	}
	else {
		#Si les champs ne sont pas tous remplis OU que etat != 0;1
		echo "Tous les champs doivent être remplis";
	}
}

?>

<h1>Ajout d'un nouvel article</h1>

<form method="POST" action="">
	
	<div class="mb-3">
		<label for="titre" class="form-label">Titre</label>
		<input type="text" class="form-control" id="titre" name="titre" value="<?php echo $donnee->article_titre; ?>">
	</div>
	
	<div class="mb-3">
		<label for="contenu" class="form-label">Contenu</label>
		<textarea rows="5" class="form-control" name="contenu" id="contenu"><?php echo $donnee->article_contenu; ?></textarea>
	</div>

	<div class="mb-3">
		<label for="auteur" class="form-label">Auteur</label>
		<input type="text" class="form-control" id="auteur" name="auteur" value="<?php echo $donnee->article_auteur; ?>">
	</div>

	<div class="mb-3">
		<label for="date" class="form-label">Date</label>
		<input type="date" class="form-control" id="date" name="date" value="<?php echo $donnee->article_date; ?>">
	</div>

	<select class="form-select mb-3" name="etat">
		<option value="0">Non publié</option>
		<option value="1" selected>Publié</option>
	</select>
	
	<button type="submit" class="btn btn-danger" name="ajouter">Ajouter</button>
	
</form>

<?php 

require 'inc/pied_page.php';

?>