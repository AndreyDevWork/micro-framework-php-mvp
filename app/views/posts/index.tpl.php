<?php
/** @var Array $posts */

/** @var Pagination $pagination */

use Core\Pagination;

require VIEWS . '/incs/header.php'
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