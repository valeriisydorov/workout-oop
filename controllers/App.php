<?php


namespace controllers;


class App
{
    private $routeArr;
    private $layout = 'main.php';

    const BASE_PATH = '';

    public function __construct()
    {
        $this->routeArr = explode('/', trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'));
    }

    private function getRoute()
    {
        return $this->routeArr;
    }

    private function getControllerRoute()
    {
        return $this->getRoute()[0] ?? null;
    }

    public function getController()
    {
        switch ($this->getControllerRoute()) {
            case null:
            case '':
            case 'app':
            case 'index':
                return '\controllers\Site';
            default:
                if (class_exists('\controllers\\' . $this->getControllerRoute(), true)) {
                    return '\controllers\\' . ucfirst($this->getControllerRoute());
                } else {
                    return false;
                }
        }
    }

    private function getActionRoute()
    {
        return $this->getRoute()[1] ?? null;
    }

    public function getAction()
    {
        switch ($this->getActionRoute()) {
            case null:
            case '':
                return 'Index';
            default:
                return ucfirst($this->getActionRoute());
        }
    }

    protected function setMetatitle($value)
    {
        $_SESSION['app']['metatitle'] = $value;
    }

    public function getLayout()
    {
        return $this->layout;
    }

    public function run()
    {
        if ($this->getController()) {
            $className = $this->getController();
            $methodName = 'action' . $this->getAction();
            if ($this->getAction() && method_exists($className, $methodName)) {
                $controller = new $className();
                return $controller->$methodName();
            } else {
                self::redirect('/site/error');
            }
        }
    }

    public static function redirect($route)
    {
        $protocol = stripos($_SERVER['SERVER_PROTOCOL'],'https') === 0 ? 'https://' : 'http://';
        header('Location: ' . $protocol . $_SERVER['HTTP_HOST'] . $route);
        exit();
    }
}
