<!doctype html>
<html lang="en">
<head>
  <base href="<?= PATH ?>">
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
      <a class="navbar-brand" href="/">INDEX</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about">About</a>
          </li>
            <?php if (check_auth()): ?>
              <li class="nav-item">
                <a class="nav-link" href="posts/create">New Post</a>
              </li>
            <?php endif; ?>
        </ul>

        <ul class="navbar-nav mb-2 align-items-center mb-lg-0">
            <?php if (check_auth()): ?>
              <li class="nav-link">
                <img class="avatar" src="<?= $_SESSION['auth']['avatar'] ?>" alt="avatar">
                  <?= $_SESSION['auth']['name'] ?></li>
              <li class="nav-item">
                <a class="nav-link" href="logout">Logout</a>
              </li>
            <?php else: ?>
              <li class="nav-item">
                <a class="nav-link" href="register">Register</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="login">Login</a>
              </li>
            <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>
</header>

<?php get_alerts(); ?>