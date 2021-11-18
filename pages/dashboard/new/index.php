<?php
    require_once("../../../class/Auth.class.php");
    require_once("../../../class/CRUD.class.php");
    $auth = new Auth;
    $crud = new CRUD;
    $name = $auth->get('name');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Novo Usuário - Projeto Meeta</title>
    
    <!-- CSS library -->
    <link rel="stylesheet" href="/assets/css/style.css">
    
    <!-- Bootstrap library -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <!-- Bootstrap Icons library -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    
    <!-- JS Library-->
    <script src="/assets/js/script.js"></script>
    
    <!-- jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- ValidateForm library -->
    <script src="/assets/js/validateForm.js" defer></script>
    <script src="/assets/js/jquery.validate.min.js"></script>
    <script src="/assets/js/messages_pt_BR.js"></script>

    <!-- SweetAlert2 library -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <?php
        if(!$auth->isLogged('id')) {
            echo "<div class='container'>";
            require '../../partials/header.php';
            echo "<div class='bg-light p-5 rounded text-center border'>";
            echo "Você <span class='text-danger'>NÃO TEM</span> acesso a essa página.<br>";
            echo "Entre na sua conta para acessar o conteúdo!<br><br>";
            echo "<a class='btn btn-outline-primary' href='../../login/'>Entrar</a>";
            echo "</div>";
            require '../../partials/footer.php';
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
                echo "<a href='../../profile/' class='perfil-menu'><h5><i class='bi bi-person-circle'></i> $name</h5></a>";
                ?>
            </div>

            <div class="col-md-3 text-end">
                <a href="/" class="btn btn-primary" id="btn_new">Dashboard</a>
                <a href="../../logout/" class="btn btn-outline-danger">Sair</a>
            </div>
        </header>
        <main>
            <form onsubmit="return false" id="form">
                <h2 class="mb-4 text-center">Cadastrar Novo Usuário</h2>
                <label for="name">Nome <span class="required">*</span></label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Digite seu nome" required><br>
                <label for="email">E-mail <span class="required">*</span></label>
                <input type="email" class="form-control" name="email" id="email" placeholder="nome@exemplo.com" required><br>
                <label for="password">Senha <span class="required">*</span></label>
                <input type="password" class="form-control" name="password" id="password" placeholder="********" required><br>
                <label for="birthDT">Data de nascimento <span class="required">*</span></label>
                <input type="date" class="form-control" name="birthDT" id="birthDT" required><br>
                <input type="hidden" name="action" value="cadastrar">
                <button class="w-100 btn btn-lg btn-primary" type="submit" onclick="send(this.closest('form'))">Cadastrar</button><br>
            </form>
        </main>
        <footer class="py-3 my-4">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                <li class="nav-item"><a href="/" class="nav-link px-2 text-muted">Home</a></li>
                <li class="nav-item"><a href="../../logout/" class="nav-link px-2 text-muted">Sair</a></li>
            </ul>
            <p class="text-center text-muted">Projeto Meeta &copy; 2021</p>
            <p class="text-center text-muted">Criado por <a href="https://github.com/gabrielgianni/" target="_blank" class="text-decoration-none">Gabriel Gianni</a></p>
        </footer>
    </div>
    <script>
        const send = form => {
            fetch("/actions/", {
                method: "POST",
                body: new URLSearchParams(new FormData(form)),
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                }
            }).then(resp => {
                resp.json().then(text => {
                    modal(text.title, text.message, text.type);
                    clearForm();
                })
            })
        }
        $(function() {
            $("#form").validate();
        })
    </script>
</body>
</html>