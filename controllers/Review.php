<?php


namespace controllers;


use models\Reviews;
use models\User;
use models\View;

class Review extends App
{
    public function actionIndex()
    {
        $view = new View();

        $this->setMetatitle('Reviews');

        $model = new Reviews();

        $user = new User();

        $view->assign([
            'reviews' => $model,
            'user' => $user
        ]);

        return $view->render('reviews.php');
    }

    public function actionDelete()
    {
        $user = new User();

        if (! $user->getAuthentication()) {
            App::redirect('/site/error');
        } elseif (isset($_GET) && isset($_GET['id'])) {
            $id = $_GET['id'];
            $model = new \models\Review();

            if ($model->find($id)) {
                $model->delete($id);
            }

            App::redirect('/review');
        }
    }
}
