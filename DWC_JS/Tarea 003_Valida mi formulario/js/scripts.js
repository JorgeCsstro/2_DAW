
var todoCorrecto = false;

function quitarErrorNombre() {

    let quitarErrorNombre = document.getElementById("errorNombre");
    if (quitarErrorNombre) {
        quitarErrorNombre.remove(); // Eliminar el error si existe
    }
}

function quitarErrorApellido() {

    let quitarErrorApellido = document.getElementById("errorApellido");
    if (quitarErrorApellido) {
        quitarErrorApellido.remove();
    }
}

function quitarErrorEmail() {

    let quitarErrorEmail = document.getElementById("errorEmail");
    if (quitarErrorEmail) {
        quitarErrorEmail.remove();
    }
}

function quitarErrorDNI() {

    let quitarErrorDNI = document.getElementById("errorDNI");
    if (quitarErrorDNI) {
        quitarErrorDNI.remove();
    }
}

function quitarErrorPass() {

    let quitarErrorPass = document.getElementById("errorPass");
    if (quitarErrorPass) {
        quitarErrorPass.remove();
    }
}

function quitarErrorCheckPass() {

    let quitarErrorCheckPass = document.getElementById("errorCheckPass");
    if (quitarErrorCheckPass) {
        quitarErrorCheckPass.remove();
    }
}

function quitarErrorIP() {

    let quitarErrorIP = document.getElementById("errorIP");
    if (quitarErrorIP) {
        quitarErrorIP.remove();
    }
}


function validarNombre() {

    let elNombre = document.getElementById("nombre");
    let textoErrorNombre = document.getElementById("espacioErrorNombre");
    let nomReg = /^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ]*$/

    if (nomReg.test(elNombre.value)) {

        todoCorrecto = true;

    } else {

        let errorNode = document.createElement("p");
        let errorSimbolos = document.createTextNode("No se pueden los simbolos (. , ; etc) o numeros (1234567890)");
        errorNode.appendChild(errorSimbolos);

        errorNode.className = "errores";
        errorNode.id = "errorNombre";

        textoErrorNombre.appendChild(errorNode);

        todoCorrecto = false;

    }
}

function validarApellido() {

    let elApellido = document.getElementById("apellidos");
    let textoErrorApellido = document.getElementById("espacioErrorApellido");
    let nomReg = /^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ]*$/

    if (nomReg.test(elApellido.value.trim())) {

        todoCorrecto = true;

    } else {

        let errorNode = document.createElement("p");
        let errorSimbolos = document.createTextNode("No se pueden los simbolos (. , ; etc) o numeros (1234567890)");
        errorNode.appendChild(errorSimbolos);

        errorNode.className = "errores";
        errorNode.id = "errorApellido";

        textoErrorApellido.appendChild(errorNode);

        todoCorrecto = false;

    }
}

function validarEmail() {

    let elEmail = document.getElementById("email");
    let textoErrorEmail = document.getElementById("espacioErrorEmail");

    var emailReg = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,6}$/;
    //console.log(correoValid);

    if (emailReg.test(elEmail.value)) {

        todoCorrecto = true;

    } else {
        let errorNode = document.createElement("p");
        let errorSimbolos = document.createTextNode("Correo invalido: ex. tucorreo@algo.com");
        errorNode.appendChild(errorSimbolos);

        errorNode.className = "errores";
        errorNode.id = "errorEmail";

        textoErrorEmail.appendChild(errorNode);

        todoCorrecto = false;
    }
}

function validarDNI() {

    let elDNI = document.getElementById("dni");
    let textoErrorDNI = document.getElementById("espacioErrorDNI");

    var numReg = /^[0-9]*$/;
    var dniLetra = /^[a-zA-Z]*$/;

    let arr = elDNI.value.split("").join("");

    let arrNum = [];

    let arrLetra = ["T", "R", "W", "A", "G", "M", "Y", "F", "P", "D", "X", "B", "N", "J", "Z", "S", "Q", "V", "H", "L", "C", "K", "E"];

    if (arr.length == 9) {

        for (let i = 0; i < arr.length - 1; i++) {

            if (arr[i].match(numReg)) {

                let num = parseInt(arr[i]);
                arrNum.push(num);

            } else {
                let errorNode = document.createElement("p");
                let errorSimbolos = document.createTextNode("Apartado de numeros incorrecto: ex. 12345678Z");
                errorNode.appendChild(errorSimbolos);

                errorNode.className = "errores";
                errorNode.id = "errorDNI";

                textoErrorDNI.appendChild(errorNode);

                todoCorrecto = false;
            }
        }

        if (arr[8].match(dniLetra)) {

            let numeros = arrNum.shift().toString();

            for (let i = 0; i < 7; i++) {
                numeros = numeros + arrNum.shift().toString();

            }

            parseInt(numeros);

            let asignaLetra = numeros % 23;

            if (arr[8].match(arrLetra[asignaLetra])) {
                todoCorrecto = true;

            } else {
                let errorNode = document.createElement("p");
                let errorSimbolos = document.createTextNode("Última letra incorrecta: ex. 12345678Z");
                errorNode.appendChild(errorSimbolos);

                errorNode.className = "errores";
                errorNode.id = "errorDNI";

                textoErrorDNI.appendChild(errorNode);

                todoCorrecto = false;
            }

        } else {
            let errorNode = document.createElement("p");
            let errorSimbolos = document.createTextNode("El último caracter no es una letra: ex. 12345678Z");
            errorNode.appendChild(errorSimbolos);

            errorNode.className = "errores";
            errorNode.id = "errorDNI";

            textoError.appendChild(errorNode);
            todoCorrecto = false;
        }

    } else {
        let errorNode = document.createElement("p");
        let errorSimbolos = document.createTextNode("Cadena de characteres incorrecta: ex. 12345678Z");
        errorNode.appendChild(errorSimbolos);

        errorNode.className = "errores";
        errorNode.id = "errorDNI";

        textoErrorDNI.appendChild(errorNode);
        todoCorrecto = false;
    }
}

function validarPass() {

    let elPass = document.getElementById("pass");
    let textoErrorPass = document.getElementById("espacioErrorPass");

    var regexPass = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&#.$($)$-$_])[A-Za-z\d$@$!%*?&#.$($)$-$_]{8,16}$/;

    if (regexPass.test(elPass.value)) {

        todoCorrecto = true;

    } else {

        let errorNode = document.createElement("p");
        let errorSimbolos = document.createTextNode("Password debe tener entre 8 y 16 caracteres, minimo 1 numero, 1 letra minuscula, 1 letra maysucula y 1 simbolo");
        errorNode.appendChild(errorSimbolos);

        errorNode.className = "errores";
        errorNode.id = "errorPass";

        textoErrorPass.appendChild(errorNode);

        todoCorrecto = false;
    }
}

function validarCheckPass() {

    let elPass = document.getElementById("pass");
    let elCheckPass = document.getElementById("checkPass");
    let textoErrorCheckPass = document.getElementById("espacioErrorCheckPass");

    if (elPass.value == elCheckPass.value) {

        todoCorrecto = true;

    } else {

        let errorNode = document.createElement("p");
        let errorCheck = document.createTextNode("Repetir Password no es igual");
        errorNode.appendChild(errorCheck);

        errorNode.className = "errores";
        errorNode.id = "errorCheckPass";

        textoErrorCheckPass.appendChild(errorNode);

        todoCorrecto = false;
    }
}

function validarIP() {

    let laIP = document.getElementById("ip");
    let textoErrorIP = document.getElementById("espacioErrorIP");

    var ipReg = /^([0-9]{1,3}).([0-9]{1,3}).([0-9]{1,3}).([0-9]{1,3})$/;

    if (ipReg.test(laIP.value)) {

        todoCorrecto = true;

    } else {
        let errorNode = document.createElement("p");
        let errorCheck = document.createTextNode("IP no valida (ex. 192.168.1.1)");
        errorNode.appendChild(errorCheck);

        errorNode.className = "errores";
        errorNode.id = "errorIP";

        textoErrorIP.appendChild(errorNode);

        todoCorrecto = false;
    }
}

function validarFormulario() {

    if (todoCorrecto == true) {

        alert("Todo correcto :D");

    }else{

        alert("Revisa el formulario >:c");

    }
}

