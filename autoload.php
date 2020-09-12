<?php


use controllers\App;

spl_autoload_register(function ($className) {
    $file = __DIR__ . DIRECTORY_SEPARATOR . str_replace('\\', '/', $className) . '.php';
    if (! file_exists($file)) {
        App::redirect('/site/error');
    }
    require $file;
});
