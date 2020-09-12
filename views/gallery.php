<?php

/* @var $images \models\Image */
/* @var $user \models\User */

use controllers\App;

?>

<div class="px-3 py-3 pt-md-5 pb-md-4 mx-auto">
    <h1 class="display-4 mb-5">Gallery</h1>
    <?php if ($user->getAuthentication()): ?>
    <div class="mb-4">
        <form action="<?= App::BASE_PATH ?>/gallery/upload" method="post" enctype="multipart/form-data">
            <input type="file" name="picture[]" multiple>
            <button type="submit" class="btn btn-outline-primary">Upload</button>
        </form>
    </div>
    <?php endif; ?>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <?php foreach ($images->getImages() as $image): ?>
        <div class="col">
            <div class="card shadow-sm">
                <img class="img-fluid" src="<?= App::BASE_PATH . '/images/' . $image ?>">
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
