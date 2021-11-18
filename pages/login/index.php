<?php
    require_once("../../class/Request.class.php");
    require_once("../../class/Auth.class.php");
    $auth = new Auth;
    $req = new Request;
    if($auth->isLogged('email')) {
        $req->redirect('../dashboard/');
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrar - Projeto Meeta</title>

    <!-- CSS library -->
    <link rel="stylesheet" href="/assets/css/style.css">

    <!-- Bootstrap library -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- JS Library -->
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
    <div class="container">
    <?php require '../partials/header.php'; ?>
        <main>
            <form onsubmit="return false" id="form">
                <h1 class="mb-2 text-center">Entrar</h1>
                <label for="email">E-mail <span class="required">*</span></label>
                <input type="email" class="form-control" name="email" id="email" placeholder="nome@exemplo.com" required><br>
                <label for="password">Senha <span class="required">*</span></label>
                <input type="password" class="form-control" name="password" id="password" placeholder="********" required><br>
                <input type="hidden" name="action" value="entrar">
                <button class="w-100 btn btn-lg btn-primary" type="submit" onclick="send(this.closest('form'))">Entrar</button><br>
                <p>Não tem uma conta? <a href="../register/">Cadastre-se</a>.</p>
            </form>
        </main>
        <?php require '../partials/footer.php'; ?>
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
                    if(text.success) {
                        modal(text.title, text.message, text.type);
                        setTimeout(()=> window.location.href = "/pages/dashboard/", 1500);
                    } else {
                        modal(text.title, text.message, text.type);
                    }
                })
            })
        }
        $(function() {
            $("#form").validate();
        })
    </script>
</body>
</html>