<?php
session_start();
require_once("Routes.class.php");
require_once("CRUD.class.php");
class Auth extends CRUD
{
    public function entrar($user = array()) {
        if(empty($user[0]) || empty($user[1])) {
            return $this->json($this->error("Campos vazios, digite seu e-mail e senha corretamente!"));
        }
        $user[1] = sha1($user[1]);
        $sql = $this->conn->prepare("SELECT * FROM users WHERE email=? AND password=?");
        $sql->execute($user);
        $row = $sql->fetch(PDO::FETCH_ASSOC);
        if($sql->rowCount() >= 1) {
            $this->set('id', $row['id']);
            $this->set('name', $row['name']);
            $this->set('email', $row['email']);
            $this->set('password', $row['password']);
            $this->set('birthDT', $row['birthDT']);
            return $this->json($this->success("Login válido!"));
        } else {
            return $this->json($this->error("Login inválido!"));
        }
    }

    public function set($user, $value)
    {
        $_SESSION[$user] = $value;
    }

    public function get($user)
    {
        if (isset($_SESSION[$user])) {
            return $_SESSION[$user];
        }
    }

    public function isLogged($user)
    {
        return isset($_SESSION[$user]);
    }

    public function destroy()
    {
        $req = new Routes;
        session_start();
        session_unset();
        session_destroy();
        $req->redirect("/pages/login/");
    }
}
