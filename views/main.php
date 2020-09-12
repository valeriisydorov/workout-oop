<?php

/* @var $content string */

use controllers\App;

$metatitle = $_SESSION['app']['metatitle'] ?? null;

?>

<!doctype html>
<html lang="en" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Terry Tao's personal site - <?= $metatitle ?></title>
    <link rel="stylesheet" href="<?= App::BASE_PATH ?>/assets/css/bootstrap.min.css">
    <script src="<?= App::BASE_PATH ?>/assets/js/bs-custom-file-input.min.js"></script>
</head>
<body class="d-flex flex-column h-100">
<header class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal">Terry Tao</h5>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="<?= App::BASE_PATH ?>/">About me</a>
        <a class="p-2 text-dark" href="<?= App::BASE_PATH ?>/gallery">Gallery</a>
        <a class="p-2 text-dark" href="<?= App::BASE_PATH ?>/review">Reviews</a>
    </nav>
    <a class="btn btn-outline-primary" href="<?= App::BASE_PATH ?>/site/login">Sign in</a>
</header>
<main class="d-flex flex-column flex-shrink-0 flex-grow-1">
    <div class="container">
        <?= $content ?>
    </div>
</main>
<footer class="py-3 bg-light">
    <div class="container">
        <small class="text-muted">© Terry Tao. All right reserved. <?= date('Y') ?></small>
    </div>
</footer>
</body>
</html>
