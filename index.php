<?php
    require_once("class/Auth.class.php");
    $auth = new Auth;
    if($auth->isLogged('email')) {
        header('Location: pages/dashboard/');
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Início - Projeto Meeta</title>

    <!-- CSS library -->
    <link rel="stylesheet" href="/assets/css/style.css">
    
    <!-- Bootstrap library -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <?php require 'pages/partials/header.php'; ?>
        <main>
            <div class="bg-light p-5 rounded text-center border">
                <h1 class="text-center mb-5">Projeto Meeta</h1>
                <a class="btn btn-lg btn-outline-secondary" href="pages/login/">Entrar</a>
                <a class="btn btn-lg btn-outline-primary" href="pages/register/">Cadastrar</a>
            </div>
        </main>
        <?php require 'pages/partials/footer.php'; ?>
    </div>
</body>
</html>