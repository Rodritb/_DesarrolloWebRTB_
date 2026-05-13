    // validar.js
    var reglas = {
        nombre: /^[a-zA-ZáéíóúÁÉÍÓÚ\s]{3,50}$/,
        email: /[\w-.]{3,}@([\w-]{2,}\.)+[\w-]{2,4}/,
        pass: /(?!^[0-9]*$)(?!^[a-zA-Z]*$)^([a-zA-Z0-9]{8,10})$/,
        telefono: /^[67]\d{7}$/
    };

    function validarCampo(id, regex, msg) {
        var campo = document.getElementById(id);
        var error = document.getElementById('err_' + id);
        if (!regex.test(campo.value.trim())) {
        campo.style.borderColor = '#DC2626'; // rojo
        error.textContent = msg;
        error.style.display = 'block';
        return false;
        }
        campo.style.borderColor = '#16A34A'; // verde
        error.style.display = 'none';
        return true;
    }

    // Validación en blur (campo por campo)
    document.getElementById('nombre')
    .addEventListener('blur', function() {
    validarCampo('nombre', reglas.nombre, 'Minimo 3 caracteres');
    });

    document.getElementById('email')
    .addEventListener('blur', function() {
    validarCampo('email', reglas.email, 'Formato inválido: usuario@dominio.ext');
    });

    // Validación al enviar el formulario
    document.getElementById('miForm')
    .addEventListener('submit', function(e) {
    e.preventDefault(); // evita recarga de página
    var ok =
    validarCampo('nombre', reglas.nombre, 'Nombre inválido') &&
    validarCampo('email', reglas.email, 'Email inválido') &&
    validarCampo('pass', reglas.pass, 'Contraseña débil') &&
    validarCampo('telefono', reglas.telefono, 'Teléfono inválido');
    if (ok) alert('Formulario válido. Enviando...');
    });