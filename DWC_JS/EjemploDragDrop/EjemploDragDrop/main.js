/* 
    En la carga de la web establecemos los listeners
*/
window.onload = function() {

    // Seleccionamos los divs
    let divs = document.querySelectorAll("div");

    // Añadimos los listeners con la funcion a la que se llama
    for(div of divs) {

        // Se lanzará la función "drop", con el evento "drop"
        div.addEventListener("drop", drop);

        // Se lanzará la función "allowDrop", con el evento "dragover"
        div.addEventListener("dragover", allowDrop);
    }
    
    // Seleccionamos la imagen
    drag1=document.getElementById("drag1");
    // Le indicamos que la imagen es arrastrable
    drag1.draggable = true;
    // Llamada a la función a la que se llama cuando empieza el arrastre
    drag1.addEventListener("dragstart", drag);
}

function allowDrop(ev) {
    /*
        Por defecto no se pueden arrastrar elementos dentro de otros.
        Cambiamos este comportamiento en los divs
    */
  ev.preventDefault();
}

// Funcion que coge el ID del elemento arratrado
function drag(ev) {
    // Nos guardamos la información del "id" en un campo llamada "id"
  ev.dataTransfer.setData("id", this.id);
}


function drop(ev) {
  ev.preventDefault();

  // Cogemos el dato del id guardado en el campo arrastrado "id"
  var idElement = ev.dataTransfer.getData("id");

  // Añadimos el objeto arrastrado como hijo de nuestro div, accediendo con su id
  this.appendChild(document.getElementById(idElement));
}