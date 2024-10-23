window.onload = init;
function init(){
    document.querySelector(".jugar").addEventListener("click",cronometrar);
    m = 0;
    s = 0;
    document.getElementById("ms").innerHTML="00:00";
    document.getElementById("buenas").innerHTML="0";
    document.getElementById("malas").innerHTML="0";
}         
function cronometrar(){
    escribir();
    id = setInterval(escribir,1000);
    document.querySelector(".jugar").removeEventListener("click",cronometrar);
}
function escribir(){
    var mAux, sAux;
    s++;
    if (s>59){m++;s=0;}

    if (s<10){sAux="0"+s;}else{sAux=s;}
    if (m<10){mAux="0"+m;}else{mAux=m;}

    document.getElementById("ms").innerHTML = mAux + ":" + sAux; 
}

/*function parar(){
    clearInterval(id);
    document.querySelector(".start").addEventListener("click",cronometrar);

}
function reiniciar(){
    clearInterval(id);
    document.getElementById("ms").innerHTML="00:00";
    h=0;m=0;s=0;
    document.querySelector(".start").addEventListener("click",cronometrar);
}*/