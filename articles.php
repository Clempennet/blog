<?php
require 'vendor/autoload.php';

use App\repository\ArticleRepository;

require 'src/inc/entete.php';

$m = new ArticleRepository();
?>

<h1>Liste des articles</h1>

<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

<div class="alert alert-danger" role="alert">
	Il y a actuellement <b><?php echo $m->getNumberArticles(); ?></b> publié<?php if ($m->getNumberArticles() > 1) {
																				echo "s";
																			} #Avec cette condition, on ajoute le 's' a 'publié' quand plusieurs articles sont visibles sur le blog 
																			?> sur le blog !
</div>

<div class="row row-cols-1 row-cols-md-4 g-4">

	<?php #Affichage des articles sous forme de cartes + bouton de redirection vers la page de l'article
	foreach ($articles = $m->getAll() as $article) { ?>
		<div class="col">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title"><?php echo $article->getTitre(); ?></h5>
					<p class="card-text"><?php echo substr($article->getContenu(), 0, 200) . "..."; ?></p>`
					<a href="index.php?route=article&action=read&id=<?php echo $article->getId(); ?>" class="btn btn-danger">Afficher l'article</a>
				</div>
			</div>
		</div>
	<?php
	}
	?>

	<?php

	require 'src/inc/pied_page.php';

	?>