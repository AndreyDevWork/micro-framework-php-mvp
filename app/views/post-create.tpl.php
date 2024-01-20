<?php require VIEWS . '/incs/header.php'

/** @var \Core\Validator $validation */
?>

<main class="main py-3">
    <div class="container">
        <div class="row">
            <h1>New Post</h1>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input name="title" type="text" class="form-control" id="title" placeholder="Title" value="<?= old('title') ?>">
                    <?= isset($validation) ? $validation->listErrors('title') : '' ?>
                </div>
                <div class="mb-3">
                    <label for="excerpt" class="form-label">Excerpt</label>
                    <textarea name="excerpt" id="excerpt" rows="2" class="form-control" id="content"><?= old('excerpt') ?></textarea>
                    <?= isset($validation) ? $validation->listErrors('excerpt') : '' ?>
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea name="content" id="content" rows="5" class="form-control" id="content"><?= old('content') ?></textarea>
                    <?= isset($validation) ? $validation->listErrors('content') : '' ?>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
</main>


<?php require VIEWS . '/incs/footer.php'?>
