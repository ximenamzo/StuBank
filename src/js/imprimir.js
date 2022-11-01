function printDiv(div=col-md-9) {
    var contenido= document.getElementById("col-md-9").innerHTML;
    var contenidoOriginal= document.body.innerHTML;

    document.body.innerHTML = contenido;

    window.print();

    document.body.innerHTML = contenidoOriginal;
}