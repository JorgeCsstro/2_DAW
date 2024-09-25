function carga ()
{
    let miTitulo = document.getElementById("titulo");

    miTitulo.innerHTML="doos";


}

function cambio (){
    let miTitulo = document.getElementById("titulo");

    miTitulo.innerHTML = "Tres";

    let lista = document.getElementById("lista");

    let nuevoNodo = document.createElement("p");
    let texto = document.createTextNode("Nodo 3");
    nuevoNodo.appendChild(texto);

    nuevoNodo.id="nodo3";

    lista.appendChild(nuevoNodo);

}