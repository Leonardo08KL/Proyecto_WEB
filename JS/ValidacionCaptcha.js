function validarCaptcha() {
    // Obtener los valores del captcha
    var respuesta = document.getElementById("respuesta").value;
    var captcha_result = document.getElementById("captcha_result").value;

    // Validar la respuesta del usuario
    if (respuesta == captcha_result) {
        return true;
    } else {
        alert("La respuesta ingresada es incorrecta");
        return false;
    }
}