<?php require VIEWS . '/incs/header.php' ?>

<main class="main py-3">
    <div class="container">
        <div class="row">
            <h1>New Post</h1>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input name="title" type="text" class="form-control" id="title" placeholder="Title">
                    <?php if(isset($errors['title'])): ?>
                        <div class="invalid-feedback d-block">
                            <?= $errors['title'] ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="excerpt" class="form-label">Excerpt</label>
                    <textarea name="excerpt" id="excerpt" rows="2" class="form-control" id="content"></textarea>
                    <?php if(isset($errors['excerpt'])): ?>
                        <div class="invalid-feedback d-block">
                            <?= $errors['excerpt'] ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea name="content" id="content" rows="5" class="form-control" id="content"></textarea>
                    <?php if(isset($errors['content'])): ?>
                        <div class="invalid-feedback d-block">
                            <?= $errors['content'] ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
</main>


<?php require VIEWS . '/incs/footer.php'?>
