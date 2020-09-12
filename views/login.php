<?php

use controllers\App;

?>

<div class="row justify-content-center mt-5">
    <div class="col-12 col-sm-10 col-md-8 col-lg-5">
        <form action="<?= App::BASE_PATH ?>/site/login" method="post">
            <div class="mb-3">
                <label for="login" class="form-label">Login</label>
                <input type="text" name="login" id="login" class="form-control">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control">
                <div class="invalid-feedback d-block"><?= $message ?? ''; ?></div>
            </div>
            <div class="mt-4">
                <button type="submit" class="btn btn-block btn-primary">Sign in</button>
            </div>
        </form>
    </div>
</div>
