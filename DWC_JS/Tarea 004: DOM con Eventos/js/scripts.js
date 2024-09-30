
var nombreCorrecto = false;
var emailCorrecto = false;
var dniCorrecto = false;
let elNombre = document.getElementById("nombre");
let elEmail = document.getElementById("email");
let elDNI = document.getElementById("dni");

function validarNombre() {
    
    let nomReg = /^([a-zA-ZáéíóúüÁÉÍÓÚÜñÑ]{2,60}[\,\-\.]{0,1}[\s]{0,1}){1,3}$/

    if (nomReg.test(elNombre.value)) {

        nombreCorrecto = true;

    } else {

        nombreCorrecto = false;

    }
}

function validarEmail() {

    var emailReg = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,6}$/;

    if (emailReg.test(elEmail.value)) {

        emailCorrecto = true;

    } else {

        emailCorrecto = false;
    }
}

function validarDNI() {

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

                dniCorrecto = false;

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
                dniCorrecto = true;

            } else {

                dniCorrecto = false;

            }

        } else {

            dniCorrecto = false;
        }

    } else {

        dniCorrecto = false;

    }
}

function validarFormulario() {

    let textoAlert = ""

    if (nombreCorrecto == true) {



    } else {



    }

    if (emailCorrecto == true) {



    } else {



    }

    if (dniCorrecto == true) {



    } else {



    }

    let contenedor = document.querySelector('.info');
    let p = document.createElement('p');
    p.innerText = elNombre.innerHTML + " con DNI " + elDNI.innerHTML + " e e-mail " + elEmail.innerHTML;
    contenedor.appendChild(p);



}

