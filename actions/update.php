<?php
$user = array(
  $req->body()->name,
  $req->body()->email,
  $req->body()->password,
  $req->body()->birthDT
);

$id = $req->body()->id;

$resq = $crud->update($id, $user);

print_r($resq);