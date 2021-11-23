<?php

require 'vendor/autoload.php';

use App\repository\ArticleRepository;
use App\Router;

require 'src/inc/entete.php';

$m = new ArticleRepository();
$route = new Router();
$route->run();
?>

<h1>Découvez un blog comme vous n'en avez jamais vu...</h1>

<img src="img/valloire.jpg" class="w-100 mb-2">

<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

<h3>Les 3 derniers articles :</h3>
<ul>
	<?php #Avec cette boucle on affiche 1 à 1 les articles sous la forme d'une liste où les éléments sont cliquables et renvoient vers les articles
	foreach($articles = $m->getLast3() as $article) {?>
		<li><a href="article.php?id=<?php echo $article["article_id"];?>"><?php echo $article["article_titre"]; ?></a></li>
	<?php
	}
	?>
</ul>

<hr>

<div class="row">
	<div class="col-4 text-center">
		<span style="font-size: 5rem;">&#128075;</span>
	</div>

	<div class="col-8">
		<p>Nam imperdiet commodo ipsum quis lacinia. Mauris posuere sapien felis, sit amet commodo ipsum sagittis eu. Nam sit amet eleifend urna. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. <b>Sed sit amet ex enim.</b> Mauris vel ullamcorper purus. Vivamus non urna tortor. Etiam facilisis lorem dignissim sapien blandit, in facilisis tortor ornare. Integer at tincidunt tellus, eget volutpat libero. <i>Sed magna libero, dapibus quis magna id, convallis vulputate justo.</i> Duis pellentesque est ut dui efficitur, sit amet efficitur justo molestie.</p>
	</div>
</div>


<?php 

require 'src/inc/pied_page.php';

?>