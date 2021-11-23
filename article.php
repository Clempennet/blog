

<?php


require 'src/inc/entete.php';
?>

<h1>CA MARCHE ARTICLE : <?php echo $_GET['id']?>. JE TE LAISSE FAIRE LA SUITE</h1>

<?php


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

?>

<h1><?php echo $donnee->article_titre; ?></h1>

<p><?php echo nl2br($donnee->article_contenu); #nl2br() pour respecter les retours à la ligne?></p>

<ul>
	<li>Auteur : <?php echo $donnee->article_auteur; ?></li>
	<li>Date : <?php echo $donnee->article_date; #La date n'est pas formatée au format FR?></li>
</ul>

<a class="btn btn-danger" href="modification_article.php?id=<?php echo $article_id; ?>"><i class="bi bi-pen"></i>
 Modifier l'article</a>

<?php 

require 'inc/pied_page.php';

?>