<?php
require_once(__DIR__ . "/../config.php");
require_once(__DIR__ . "/../class/Routes.class.php");
require_once(__DIR__ . "/../class/CRUD.class.php");
require_once(__DIR__ . "/../class/Auth.class.php");

$req = new Routes;
$crud = new CRUD;
$auth = new Auth;

if ($req->method == "GET") {
    $req->redirect("/");
}
if ($req->method == "POST") {
    if ($req->body()->action == "cadastrar") { // Se no input hidden do form tiver o name="action" e value="cadastrar" executa register.php
        require('register.php');
    } elseif ($req->body()->action == "entrar") {
        require('login.php');
    } elseif ($req->body()->action == "update") {
        require('update.php');
    }
}