<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/main.css">
    <title><?= $title ?? 'TITLE' ?></title>
</head>
<body>

<header class="header">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about.php">About</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<main class="main py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?php foreach ($posts as $post): ?>
                    <div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title"><?= $post['title'] ?></h5>
                                <p class="card-text"><?= $post['desc'] ?></p>
                                <a href="post/<?= $post['slug'] ?>" class="btn btn-primary">Go to post</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="col-md-4">
                <h2>Recent Posts</h2>
                <ul class="list-group">
                    <?php foreach ($recentPosts as $post): ?>
                        <li class="list-group-item"><a href="<?= $post['slug'] ?>"><?= $post['title'] ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</main>

<footer class="footer">

    <div class="p-3 bg-dark text-white text-center">
        <p>&copy; Copyright <?= date('Y') ?></p>
    </div>
</footer>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>