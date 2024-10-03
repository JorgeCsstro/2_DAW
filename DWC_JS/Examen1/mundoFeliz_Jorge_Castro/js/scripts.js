
var numIni = 1;
var cant = 3;
var cont = 0;
var iteraciones = 0;
var interacionesMas1 = false;
var contador = 0;

function numFeliz(numInicial) {
    // inicializamos varias variables
    let continuar = true;
    parseInt(numInicial);
    let numSeparado = numInicial.toString().split("").map(Number);
    let numOriginal = numInicial;
    let cont = 0;
    iteraciones = 0;
    numIni = numInicial;

    // si ya ha pasado alguna vez, se sumara 1 iteracion para que sea correcto
    if (interacionesMas1) {
        iteraciones++;
    }

    // bucle hasta encontrar el numero feliz
    while (continuar == true) {

        cont = cont + 1;

        let num2 = 0;

        // operaciones del numero feliz
        for (let i = 0; i <= numSeparado.length; i++) {

            let numCuadrado = numSeparado.shift();

            num2 = num2 + numCuadrado * numCuadrado;

        }

        numSeparado = num2.toString().split("").map(Number);

        // si el num2 es igual a 1 será numero feliz
        if (num2 == 1) {

            // creamos los divs con los numeros felices
            continuar = false;
            let numFelicesDiv = document.querySelector('#numFelices');
            let iteracionFinalDiv = document.querySelector('#iteracionFinal');

            let div = document.createElement('div');
            div.innerText = numIni;
            div.id = "numero" + contador;
            div.className="estiloNum";

            // event te pondra el id del numero en el console.log
            div.addEventListener("click", e => {
                const id = e.target.getAttribute("id");
                console.log("Se ha clickeado el id "+id);
                let numText = document.getElementById(id);
                let numClickeado = document.getElementById("numClick");

                // intento de cojer el texto del id pero no se ha podido
                //numClickeado.innerText = numText.innerText;
              });
            numFelicesDiv.appendChild(div);

            let div2 = document.createElement('div');
            div2.innerText = iteraciones;
            div2.id = "numero" + contador;
            div2.className="estiloNum";

            // event te pondra el id del numero en el console.log
            div2.addEventListener("click", e => {
                const id = e.target.getAttribute("id");
                console.log("Se ha clickeado el id "+id);
                let numText = document.getElementById(id);
                let numClickeado = document.getElementById("numClick");

                // intento de cojer el texto del id pero no se ha podido
                //numClickeado.innerText = numText.innerText;
              });
            iteracionFinalDiv.appendChild(div2);
            interacionesMas1 = true;

            // añadimos +1 al id (es decir, el primer div tendra id "numero0" y los demas 1,2...)
            contador++;


        // Si no es numero feliz volverá al bucle añadiendo 1 al numero introducido y añadir +1 a las iteraciones
        } else if (num2 = numOriginal && cont == 8) {

            numInicial++;
            iteraciones++;
            numInicial = parseInt(numInicial);
            numSeparado = numInicial.toString().split("").map(Number);
            numOriginal = numInicial;
            numIni = numInicial
            cont = 0;

        }
    }
}

// IDEA NO FUNCIONAL
// function clickNum(){
// 
//     let numClickeado = document.getElementById("numClick");
//     let numeroC = document.getElementById()
//     numClickeado.innerText = numeroC.innerText;
// }

// No utilizado por errores que o borraba todo sin mostrar lo que tenía antes, o solo uno
function clearDivs() {

    const nFeliz = document.getElementById("numFelices");
    const iFinal = document.getElementById("iteracionFinal");
    const child = document.getElementById("numero");
    const quitarNFeliz = nFeliz.removeChild(child);
    const quitarIFinal = iFinal.removeChild(child);



}

// Funcion cuando se vaya del input y ponga los numeros felizes en el div
function cambioNumIni() {

    //clearDivs();

    numIni = document.getElementById("numIni").value;

    cant = document.getElementById("cant").value;

    for (let i = 0; i < cant; i++) {

        numFeliz(numIni);
        numIni++;

    }

    interacionesMas1 = false;

}

// Funcion cuando se vaya del input y ponga los numeros felizes en el div
function cambioCant() {

    //clearDivs();

    cant = document.getElementById("cant").value;

    numIni = document.getElementById("numIni").value;

    for (let i = 0; i < cant; i++) {

        numFeliz(numIni);
        numIni++;

    }

    interacionesMas1 = false;

}