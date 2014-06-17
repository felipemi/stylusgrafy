$(document).ready(function() {
    $('#contact_form').validate({
        rules: {
            nome: {
                required: true,
                minlength: 3
            },
            email: {
                required: true,
                email: true
            },
            telefone: {
                required: true
            },
            assunto: {
                required: true
            },
            mensagem: {
                required: true
            }
        },
        messages: {
            nome: {
                required: "O campo nome é obrigatório.",
                minlength: "O campo nome deve conter no mínimo 3 caracteres."
            },
            email: {
                required: "O campo email é obrigatório.",
                email: "O campo email deve conter um email válido."
            },
            telefone: {
                required: "O campo telefone é obrigatório."
            },
            assunto: {
                required: "O campo assunto é obrigatório."
            },
            mensagem: {
              required: "O campo mensagem é obrigatório."  
            }
        }

    });
});


