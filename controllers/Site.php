<?php


namespace controllers;


use models\Article;
use models\User;
use models\View;

class Site extends App
{
    public function actionIndex()
    {
        $view = new View();

        $this->setMetatitle('About me');

        $model = new Article();
        $id = 1;
        $article = $model->find($id);

        $user = new User();

        $view->assign([
            'article' => $article,
            'user' => $user
        ]);

        return $view->render('index.php');
    }

    public function actionLogin()
    {
        $view = new View();

        $user = new User();

        $message = '';

        if ($user->getAuthentication()) {
            App::redirect('/');
        } elseif (isset($_POST)) {
            if (isset($_POST['login']) && $_POST['login'] != false && isset($_POST['password']) && $_POST['password'] != false) {
                if ($user->checkPassword($_POST['login'], $_POST['password'])) {
                    $_SESSION['user']['authentication'] = true;
                    $_SESSION['user']['login'] = $_POST['login'];
                    App::redirect('/');
                } else {
                    $message = 'Wrong login or password';
                }
            }
        }

        $this->setMetatitle('Sign in');

        $view->assign([
            'message' => $message,
        ]);

        return $view->render('login.php');
    }

    public function actionUpdate()
    {
        $view = new View();

        $user = new User();

        $model = new Article();
        $id = 1;
        $article = $model->find($id);

        if (! $user->getAuthentication()) {
            App::redirect('/');
        } elseif (isset($_POST)) {
            if (isset($_POST['title']) && isset($_POST['content'])) {
                $newModel = new Article($id, trim($_POST['title']), trim($_POST['content']));
                $newModel->update();

                App::redirect('/');
            }
        }

        $this->setMetatitle('Update');

        $view->assign([
            'article' => $article
        ]);

        return $view->render('update.php');
    }

    public function actionError()
    {
        $this->setMetatitle('404');

        $view = new View();

        return $view->render('error.php');
    }
}





