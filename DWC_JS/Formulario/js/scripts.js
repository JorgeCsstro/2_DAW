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

function quitarErrorCheckPass() {

    let quitarErrorIP = document.getElementById("errorIP");
    if (quitarErrorIP) {
        quitarErrorIP.remove();
    }
}


function validarNombre() {

    let elNombre = document.getElementById("nombre");
    let textoNombre = document.getElementById("espacioErrorNombre");
    let nomReg = /^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ]*$/

    if (!nomReg.test(elNombre.value)) {

        let errorNode = document.createElement("p");
        let errorSimbolos = document.createTextNode("No se pueden los simbolos (. , ; etc) o numeros (1234567890)");
        errorNode.appendChild(errorSimbolos);

        errorNode.className = "errores";
        errorNode.id = "errorNombre";

        textoNombre.appendChild(errorNode);
    }
}

function validarApellido() {

    let elApellido = document.getElementById("apellidos");
    let textoApellido = document.getElementById("espacioErrorApellido");
    let nomReg = /^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ]*$/

    if (!nomReg.test(elApellido.value.trim())) {

        let errorNode = document.createElement("p");
        let errorSimbolos = document.createTextNode("No se pueden los simbolos (. , ; etc) o numeros (1234567890)");
        errorNode.appendChild(errorSimbolos);

        errorNode.className = "errores";
        errorNode.id = "errorApellido";

        textoApellido.appendChild(errorNode);
    }
}

function validarEmail() {

    let elEmail = document.getElementById("email");
    let textoEmail = document.getElementById("espacioErrorEmail");

    var emailReg = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,6}$/;
    //console.log(correoValid);

    if (emailReg.test(elEmail.value)) {

        return true;

    } else {
        let errorNode = document.createElement("p");
        let errorSimbolos = document.createTextNode("Correo invalido: ex. tucorreo@algo.com");
        errorNode.appendChild(errorSimbolos);

        errorNode.className = "errores";
        errorNode.id = "errorEmail";

        textoEmail.appendChild(errorNode);
        return false;
    }
}

function validarDNI() {

    let elDNI = document.getElementById("dni");
    let textoDNI = document.getElementById("espacioErrorDNI");

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

                textoDNI.appendChild(errorNode);
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
                return true;

            } else {
                let errorNode = document.createElement("p");
                let errorSimbolos = document.createTextNode("Última letra incorrecta: ex. 12345678Z");
                errorNode.appendChild(errorSimbolos);

                errorNode.className = "errores";
                errorNode.id = "errorDNI";

                textoDNI.appendChild(errorNode);
            }

        } else {
            let errorNode = document.createElement("p");
            let errorSimbolos = document.createTextNode("El último caracter no es una letra: ex. 12345678Z");
            errorNode.appendChild(errorSimbolos);

            errorNode.className = "errores";
            errorNode.id = "errorDNI";

            textoDNI.appendChild(errorNode);
        }

    } else {
        let errorNode = document.createElement("p");
        let errorSimbolos = document.createTextNode("Cadena de characteres incorrecta: ex. 12345678Z");
        errorNode.appendChild(errorSimbolos);

        errorNode.className = "errores";
        errorNode.id = "errorDNI";

        textoDNI.appendChild(errorNode);
    }
}

function validarPass() {

    let elPass = document.getElementById("pass");
    let textoPass = document.getElementById("espacioErrorPass");

    var regexPass = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&#.$($)$-$_])[A-Za-z\d$@$!%*?&#.$($)$-$_]{8,16}$/;

    if (!regexPass.test(elPass.value)) {

        let errorNode = document.createElement("p");
        let errorSimbolos = document.createTextNode("Password debe tener entre 8 y 16 caracteres, minimo 1 numero, 1 letra minuscula, 1 letra maysucula y 1 simbolo");
        errorNode.appendChild(errorSimbolos);

        errorNode.className = "errores";
        errorNode.id = "errorPass";

        textoPass.appendChild(errorNode);
        
    }else{

        

    }


}

