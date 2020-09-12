<?php

/* @var $reviews \models\Reviews */
/* @var $user \models\User */

use controllers\App;

?>

<div class="px-3 py-3 pt-md-5 pb-md-4 mx-auto">
    <h1 class="display-4 mb-4">Reviews</h1>
    <?php if ($reviews): ?>
        <?php foreach ($reviews->getData() as $review): ?>
            <h2 class="mb-2 mt-4" style="font-weight: 300;"><?= $review->getAuthor() ?></h2>
            <p class="lead"><?= $review->getContent() ?></p>
            <?php if ($user->getAuthentication()): ?>
                <p class="pt-1">
                    <a class="btn btn-outline-primary"
                       href="<?= App::BASE_PATH ?>/review/delete?id=<?= $review->getId() ?>"
                       onclick="return confirm('Are you sure?')">
                        Delete
                    </a>
                </p>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
