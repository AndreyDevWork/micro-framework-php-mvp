<?php
/** @var Array $posts */

/** @var Pagination $pagination */

use Core\Pagination;
use Core\Patterns\Bridge\Abstract\Page;
use Core\Patterns\Bridge\Abstract\ProductPage;
use Core\Patterns\Bridge\Abstract\SimplePage;
use Core\Patterns\Bridge\HTMLRenderer;
use Core\Patterns\Bridge\JsonRenderer;
use Core\Patterns\Bridge\Product;

require VIEWS . '/incs/header.php';


function clientCode(Page $page)
{
    echo $page->view();
}


/**
 * Клиентский код может выполняться с любой предварительно сконфигурированной
 * комбинацией Абстракция+Реализация.
 */
$HTMLRenderer = new HTMLRenderer();
$JSONRenderer = new JsonRenderer();

$page = new SimplePage($HTMLRenderer, 'Home', 'Welcome to our website!');
clientCode($page);
echo "\n\n";
/**
 * При необходимости Абстракция может заменить связанную Реализацию во время
 * выполнения.
 */
$page->changeRenderer($JSONRenderer);
clientCode($page);
echo "\n\n";


$product = new Product('123', 'Star Wars, episode1',
    'A long time ago in a galaxy far, far away...',
    '/images/star-wars.jpeg', 39.95);

$page = new ProductPage($HTMLRenderer, $product);
clientCode($page);
echo "\n\n";

$page->changeRenderer($JSONRenderer);
echo "JSON view of a simple content page, with the same client code:\n";
clientCode($page);
?>


  <main class="main py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
            <?php foreach ($posts as $post): ?>
              <div>
                <div class="card mb-3">
                  <div class="card-body">
                    <h5 class="card-title"><?= h($post['title']) ?></h5>
                    <p class="card-text"><?= h($post['excerpt']) ?></p>
                    <a href="posts/<?= h($post['slug']) ?>" class="btn btn-primary">Go to post</a>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>

          <hr>
            <?= $pagination ?>
        </div>
          <?php require VIEWS . '/incs/sidebar.php' ?>
      </div>
    </div>
  </main>

<?php require VIEWS . '/incs/footer.php' ?>