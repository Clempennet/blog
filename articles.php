<?php

require 'inc/entete.php';
require 'inc/db.php';

#Récupération des données de l'entierté des articles publiés
$req_articles = $connect->query("SELECT article_id, article_titre, article_contenu FROM articles WHERE article_etat = 1 ORDER BY article_date DESC;");

#Combien d'articles sont publiés ?
$req_nb_articles = ($connect->query("SELECT count(*) AS 'nb' FROM articles WHERE article_etat = 1"))->fetch_object();

?>

<h1>Liste des articles</h1>

<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

<div class="alert alert-danger" role="alert">
	Il y a actuellement <b><?php echo $req_nb_articles->nb; ?></b> publié<?php if($req_nb_articles->nb > 1) {echo "s";} #Avec cette condition, on ajoute le 's' a 'publié' quand plusieurs articles sont visibles sur le blog ?> sur le blog !
</div>

<div class="row row-cols-1 row-cols-md-4 g-4">

	<?php #Affichage des articles sous forme de cartes + bouton de redirection vers la page de l'article ?>
	<?php while($article = $req_articles->fetch_object()): ?>
		<div class="col">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title"><?php echo $article->article_titre; ?></h5>
					<p class="card-text"><?php echo substr($article->article_contenu, 0, 200)."..."; ?></p>`
					<a href="article.php?id=<?php echo $article->article_id; ?>" class="btn btn-danger">Afficher l'article</a>
				</div>
			</div>
		</div>
	<?php endwhile; ?>

</div>

<?php 

require 'inc/pied_page.php';

?>