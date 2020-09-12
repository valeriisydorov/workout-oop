<?php

/* @var $article \models\Article */
/* @var $user \models\User */

use controllers\App;

?>

<div class="px-3 py-3 pt-md-5 pb-md-4 mx-auto">
    <?php if ($article): ?>
        <h1 class="display-4 mb-4"><?= $article->getTitle() ?></h1>
        <p class="lead" style="text-align: justify;"><?= $article->getContent() ?></p>
    <?php endif; ?>
    <?php if ($user->getAuthentication()): ?>
        <p class="pt-3">
            <a class="btn btn-outline-primary" href="<?= App::BASE_PATH ?>/site/update">Update</a>
        </p>
    <?php endif; ?>
</div>
