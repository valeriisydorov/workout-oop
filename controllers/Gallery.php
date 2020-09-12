<?php


namespace controllers;


use models\Image;
use models\User;
use models\Upload;
use models\View;

class Gallery extends App
{
    public function actionIndex()
    {
        $view = new View();

        $this->setMetatitle('Gallery');

        $model = new Image();

        $user = new User();

        $view->assign([
            'user' => $user,
            'images' => $model
        ]);

        return $view->render('gallery.php');
    }

    public function actionUpload()
    {
        $user = new User();

        if (! $user->getAuthentication()) {
            App::redirect('/site/error');
        } elseif (isset($_FILES['picture'])) {
            for ($i = 0; $i < count($_FILES[array_keys($_FILES)[0]]['tmp_name']); $i++) {
                $uploadPictures = new Upload(array_keys($_FILES)[0], $i);
                if ($uploadPictures->isUploaded()) {
                    $uploadPictures->upload();
                }
            }

            App::redirect('/gallery');
        }
    }
}
