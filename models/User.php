<?php


namespace models;


class User extends DB
{
    private $login;
    private $authentication;

    // login: Terry Tao
    // password: 17 July 1975

    public function __construct($login = null, $passwordHash = null)
    {
        $this->login = $_SESSION['user']['login'] ?? null;
        $this->authentication = $_SESSION['user']['authentication'] ?? false;
        if ($login && $passwordHash) {
            if ($this->isRegistred($login, $passwordHash)) {
                if (! ($this->authentication || $this->login)) {
                    $_SESSION['user']['login'] = $login;
                    $_SESSION['user']['authentication'] = true;
                    $this->login = $login;
                    $this->authentication = true;
                }
            }
        }
        parent::__construct();
    }

    private function isExists($login)
    {
        $sql = 'SELECT login FROM user WHERE login=:login';
        return $this->query($sql, [':login' => $login]) ? true : false;
    }

    private function isRegistred($login, $passwordHash)
    {
        $sql = 'SELECT password FROM user WHERE login=:login';
        if ($this->isExists($login) && $passwordHash === $this->query($sql, [':login' => $login])['password']) {
            return true;
        } else {
            return false;
        }
    }

    public function checkPassword($login, $password)
    {
        $sql = 'SELECT password FROM user WHERE login=:login';
        if ($this->isExists($login)) {
            $passwordHash = $this->query($sql, [':login' => $login])['password'];
            if (password_verify($password, $passwordHash)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function getAuthentication()
    {
        return $this->authentication;
    }
}
