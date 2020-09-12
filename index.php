<?php
session_start();

use controllers\App;
use models\View;

require __DIR__ . DIRECTORY_SEPARATOR . 'autoload.php';

$app = new App();

$view = new View();

$view->assign([
    'content' => $app->run()
]);

echo $view->render($app->getLayout());
