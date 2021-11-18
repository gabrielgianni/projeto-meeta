<?php
    require_once("../../class/Request.class.php");
    require_once("../../class/Auth.class.php");
    require_once('../../class/CRUD.class.php');
    $req = new Request;
    $auth = new Auth;
    $crud = new CRUD;
    if (!$auth->isLogged('email')) {
        $req->redirect('/');
    }
    $id = $_GET['id'];
    if(isset($id)) {
        $crud->delete($id);
        if ($id == $auth->get('id')) {
            $auth->destroy();
        }
    }
