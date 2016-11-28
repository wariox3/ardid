/// Abre una ventana nueva ventana
function abrirVentana(url, Alto, Ancho)
{
    window.open(url,"","toolbar=0,width=" + Ancho + ", height=" + Alto + ",location=0,status=1,menubar=0,scrollbars=1,resizable=0");
}
                
/// Abre una ventana nueva con un nombre especifico, esto con el fin de que no se creen varias ventanas iguales.
function abrirVentana3(url, Nombre, Alto, Ancho) {
    windowObjectReference2 = window.open(url , Nombre , "toolbar=0, width=" + Ancho + ", height=" + Alto + ",location=0,status=1,menubar=0,scrollbars=1,resizable=0");
    windowObjectReference2.focus();
}        


// Selecciona o quita la seleccion de todos los checkbox dentro de una tabla
function ChequearTodos(chkbox) {
    for (var i=0;i < document.forms[0].elements.length;i++)  {
        var elemento = document.forms[0].elements[i];
        if (elemento.name == "ChkSeleccionar[]") {
            elemento.checked = chkbox.checked
        }
    }
}

function ChequearTodosTabla(chkbox, nombre) {
    for (var i=0;i < document.forms[0].elements.length;i++)  {
        var elemento = document.forms[0].elements[i];
        if (elemento.name == nombre) {
            elemento.checked = chkbox.checked
        }
    }
}

$(document).ready(function(){        
        $('a').click(
            function(){
                var value = $(this).attr('id');                
                $('#ventanamodal').load(value);
            }
        );        
});