<?php
$user = array(
  $req->body()->name,
  $req->body()->email,
  $req->body()->password,
  $req->body()->birthDT
);

$resq = $crud->create($user);

print_r($resq); // Quando o user for criado retorna {"success":true,"message":"Cadastro realizado com sucesso!","type":"success"} que será utilizado como parâmetro pelo modal()