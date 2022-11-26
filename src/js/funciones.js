/*function myFunction() { // Buscador de tabla por COLUMNAS
    // Declarar variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");

    // Loop por las filas de la tabla, esconde las que no coinciden con la búsqueda
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}*/

function printDivStyle() { // ELEGIDO...
    var divContents = document.getElementById("GFG").innerHTML;
    var a = window.open('', '', 'height=auto, width=auto');
    a.document.write('<html><head><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous"><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css"><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script></head>');
    a.document.write('<body><h1>Tabla de Amortización</h1><div style="color:blue;"><h6>Pusla las teclas "ctrl" + "p" para imprimir esta página.</h6></div>');
    a.document.write(divContents);
    a.document.write('</body></html>');
    a.document.print();
}

function printDivNoStyle() {
    var divContents = document.getElementById("GFG").innerHTML;
    var a = window.open('', '', 'height=500, width=500');
    a.document.write('<html>');
    a.document.write('<body><h1>Tabla de Amortización<br>');
    a.document.write(divContents);
    a.document.write('</body></html>');
    a.document.close();
    a.print();
}

function printWindow() {
    window.print();
}

function printForm() {
	printJS({
    printable: 'form1',
    type: 'html',
    targetStyles: ['*'],
    header: 'PrintJS - Print Form With Customized Header'
 })
}