<?php


require 'inc/entete.php';
require 'inc/db.php';

#Récupération de l'id de l'article recherché dans l'url + néttoyage pour vérification en db
(int)$article_id = mysqli_escape_string($connect, $_GET['id']);

#Vérification de l'existence de l'article (id) et de l'état de publication de l'article (etat)
if (mysqli_num_rows($connect->query("SELECT * FROM articles WHERE article_id = '$article_id' AND article_etat = 1")) != 1) {
	#Si l'article n'existe pas, renvoyer vers la liste des articles et ne pas exécuter la suite du code
	header('Location: articles.php');
	exit();
}

#Ce sont exclusivement les données de l'article à afficher
$donnee = ($connect->query("SELECT * FROM articles WHERE article_id = '$article_id'"))->fetch_object();

if (isset($_POST['modifier'])) {

	$titre = mysqli_escape_string($connect, $_POST['titre']);
	$contenu = mysqli_escape_string($connect, $_POST['contenu']);
	$auteur = mysqli_escape_string($connect, $_POST['auteur']);
	$date = mysqli_escape_string($connect, $_POST['date']);
	$etat = mysqli_escape_string($connect, $_POST['etat']);

	#Vérifier si les variables ne sont pas vides
	if (!empty($titre) AND !empty($contenu) AND !empty($auteur) AND !empty($date) AND ($etat == O OR $etat == 1)) {
		
		#Modification des valeurs dans la db
		if ($connect->query("UPDATE articles SET article_titre = '$titre', article_contenu = '$contenu', article_auteur = '$auteur', article_date = '$date', article_etat = '$etat' WHERE article_id = '$article_id'") == true) {
			
			#Si la requete s'est bien passée, rediriger vers page de l'article
			header('Location: article.php?id='.$article_id);
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

#Suppression de l'article
elseif(isset($_POST['supprimer'])) {

	if($connect->query("DELETE FROM articles WHERE article_id = '$article_id'") == true) {
		header('Location: articles.php');
		exit();
	}

}

?>

<h1>Modification de l'article</h1>

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

	<?php #Les conditions permettent de préselectionner l'état actuel de l'article ?>
	<select class="form-select mb-3" name="etat">
		<option value="0" <?php if($donnee->article_etat == 0) {echo "selected";} ?>>Non publié</option>
		<option value="1" <?php if($donnee->article_etat == 1) {echo "selected";} ?>>Publié</option>
	</select>
	
	<button type="submit" class="btn btn-danger" name="modifier">Modifier</button>
	<button type="submit" class="btn btn-danger" name="supprimer">Supprimer</button>
	
</form>

<?php 

require 'inc/pied_page.php';

?>