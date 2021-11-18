// Início de validação de formulário
$("#form").validate({
    rules: {
        name: {
            required: true,
            minlength: 3
        },
        email: {
            required: true,
            email: true
        },
        password: {
            required: true,
            minlength: 5
        },
        birthDT: {
            required: true
        }
    },
    messages: {
        name: {
            required: "Por favor, informe seu nome",
            minlength: "O nome deve ter pelo menos 3 caracteres"
        },
        email: {
            required: "É necessário informar um e-mail"
        },
        password: {
            required: "A senha não pode ficar em branco",
            minlength: "A senha deve ter pelo menos 5 caracteres"
        },
        birthDT: {
            required: "Por favor, insira a sua data de nascimento"
        }
    }
});
// Fim de validação de formulário