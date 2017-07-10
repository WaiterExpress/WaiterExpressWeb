$('#loginForm').bootstrapValidator({
    message: 'Este valor no es valido',
    feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
    },
    fields: {
        email: {
            validators: {
                notEmpty: {
                    message: 'El correo electrónico es requerido'
                },
                emailAddress: {
                    message: 'La entrada no es una dirección de correo electrónico válida'
                },
                regexp: {
                    regexp: /^[a-zA-Z0-9_.@]+$/,
                    message: 'El correo contiene caractes no validos'
                }
            }
        },
        clave: {
            validators: {
                notEmpty: {
                    message: 'La contrase&ntilde;a es requerida'
                },
                stringLength: {
                    min: 3,
                    message: 'La clave debe contener al menos 8 caracteres'
                }
            }
        }
    }
});