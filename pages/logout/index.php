<?php
    require_once '../../class/Auth.class.php';
    $logout = new Auth;
    $logout->destroy();
?>