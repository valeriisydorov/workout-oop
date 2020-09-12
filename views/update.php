<?php

/* @var $article \models\Article */

use controllers\App;

?>

<div class="row mt-5">
    <div class="col-12">
        <form action="<?= App::BASE_PATH ?>/site/update" method="post">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="<?= $article->getTitle() ?>">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea name="content" id="content" class="form-control" rows="8"><?= $article->getContent() ?></textarea>
            </div>
            <div class="mt-4">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>
