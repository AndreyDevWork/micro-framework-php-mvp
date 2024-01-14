<?php require VIEWS . '/incs/header.php' ?>

<main class="main py-3">
    <div class="container">
        <div class="row">
            <h1><?= $post['title'] ?></h1>
            <div class="col-md-12">
                <?= $post['content'] ?>
            </div>
        </div>
    </div>
</main>


<?php require VIEWS . '/incs/footer.php'?>
