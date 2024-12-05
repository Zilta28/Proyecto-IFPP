// Escuchar los clics en las celdas truncadas
var celdasTruncadas = document.querySelectorAll('.truncado');
celdasTruncadas.forEach(function(celda) {
    celda.addEventListener('click', function() {
        // Obtener el texto completo de la celda
        var textoCompleto = this.textContent.trim();
        // Mostrar el texto completo en una ventana emergente o cuadro de diálogo
        alert(textoCompleto);
    });
});
