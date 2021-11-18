<?php
    require_once("../../class/Auth.class.php");
    require_once("../../class/CRUD.class.php");
    $auth = new Auth;
    $crud = new CRUD;
    $id = $auth->get('id');
    $name = $auth->get('name');
    $content = $crud->get($id);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $name; ?> - Projeto Meeta</title>

    <!-- CSS library -->
    <link rel="stylesheet" href="/assets/css/style.css">
    
    <!-- Bootstrap library -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <!-- Bootstrap Icons library -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
</head>
<body>
    <?php
        if(!$auth->isLogged('id')) {
            echo "<div class='container'>";
            require '../partials/header.php';
            echo "<div class='bg-light p-5 rounded text-center border'>";
            echo "Você <span class='text-danger'>NÃO TEM</span> acesso a essa página.<br>";
            echo "Entre na sua conta para acessar o conteúdo:<br><br>";
            echo "<a class='btn btn-outline-primary' href='../login/'>Entrar</a>";
            echo "</div>";
            require '../partials/footer.php';
            echo "</div>";
            die();
        }
    ?>
    <div class="container">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                <span class="fs-4">Projeto Meeta</span>
            </a>

            <div class="col-md-auto">
                <?php
                echo "<a href='../profile/' class='perfil-menu'><h5><i class='bi bi-person-circle'></i> $name</h5></a>";
                ?>
            </div>

            <div class="col-md-3 text-end">
                <a href="/" class="btn btn-primary" id="btn_new">Dashboard</a>
                <a href="../logout/" class="btn btn-outline-danger"><i class="bi bi-box-arrow-in-right"></i> Sair</a>
            </div>
        </header>
        <main>
            <h2 class="mb-3">Perfil: <?php echo $content['name'] ?></h2>
            <?php
                echo "Olá, " . $content['name'] . "! <br>";
                echo "Seu e-mail é: " . $content['email'] . ".<br>";
                echo "Sua data de nascimento é: " . date('d/m/Y', strtotime($content['birthDT'])) . ".<br>";
            ?>
        </main>
        <footer class="py-3 my-4">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                <li class="nav-item"><a href="/" class="nav-link px-2 text-muted">Home</a></li>
                <li class="nav-item"><a href="../logout/" class="nav-link px-2 text-muted">Sair</a></li>
            </ul>
            <p class="text-center text-muted">Projeto Meeta &copy; 2021</p>
            <p class="text-center text-muted">Criado por <a href="https://github.com/gabrielgianni/" target="_blank" class="text-decoration-none">Gabriel Gianni</a></p>
        </footer>
</body>
</html>