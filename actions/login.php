<?php
$user = array(
  $req->body()->email,
  $req->body()->password
);

$resq = $auth->entrar($user);
print_r($resq); // Retorna parâmetros para o modal()