
document.addEventListener('keydown', function(event) {
    var key = event.key;

    if (!isNaN(key) || operadores.includes(key)) {
        ponOperandos(key);

    } else if (key === 'Enter') {
        operar();
        
    } else if (key === 'Backspace') {
        borrarUno();

    } else if (key === 'Escape') {
        borrarTodo();

    } else if (key === '(' || key === ')') {
        ponParentesis();

    } else if (key === '.') {
        ponOperandos('.');

    }
});