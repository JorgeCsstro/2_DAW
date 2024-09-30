
var todoCorrecto = false;

function quitarErrorNombre() {

    let quitarErrorNombre = document.getElementById("errorNombre");
    if (quitarErrorNombre) {
        quitarErrorNombre.remove(); // Eliminar el error si existe
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

function validarFormulario() {

    if (todoCorrecto == true) {

        alert("Todo correcto :D");

    }else{

        alert("Revisa el formulario >:c");

    }
}

