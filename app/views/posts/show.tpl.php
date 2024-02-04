<?php
/** @var Array $post */
require VIEWS . '/incs/header.php'
?>

<main class="main py-3">
    <div class="container">
        <div class="row">
            <h1><?= h($post['title']) ?></h1>
            <div class="col-md-12">
                <?= h($post['content']) ?>
              <form action="/posts" method="post">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="id" value="<?= $post['id'] ?>">
                <button class="btn btn-warning" type="submit">Delete</button>
              </form>
            </div>
        </div>
    </div>
</main>


<?php require VIEWS . '/incs/footer.php'?>
