function detalleConAjaxPorCodigo(idSeccion, codigo, url, method, cache, asincrono)
{
    $("#"+idSeccion).css({'display' : 'inline-block'});
    $("#"+idSeccion).html("<div style='width: 100%;text-align:center;'><div id='divLoadingSuperior'></div></div>");
    $.ajax(
    {
        url: url,
        type: method,
        data: {codigo : codigo},
        cache: cache,
        async: asincrono
    }).done(function(pagina) 
    {
        $("#"+idSeccion).html(pagina);
    });
}

function dialogoUrl(idDialogo, anchoDialogo, modal, titulo, posicion, url, method, cache, asincrono)
{
$("#"+idDialogo).html("<div style='width: 100%;text-align:center;'><div id='divLoadingSuperior'></div></div>");
$.ajax(
{
    url: url,
    type: method,
    cache: cache,
    async: asincrono
}).done(function(pagina) 
{
    $("#"+idDialogo).html(pagina);
});

$( "#"+idDialogo ).dialog(
{
    width: anchoDialogo,
    modal: modal,
    title: titulo,
    position: {at: posicion}
});
}

function dialogoPorCodigo(idDialogo, anchoDialogo, modal, titulo, posicion, codigo, url, method, cache, asincrono)
{
    $("#"+idDialogo).html("<div style='width: 100%;text-align:center;'><div id='divLoadingSuperior'></div></div>");
    $.ajax(
    {
        url: url,
        type: method,
        data: {codigo : codigo},
        cache: cache,
        async: asincrono
    }).done(function(pagina) 
    {
        $("#"+idDialogo).html(pagina);
    });

    $( "#"+idDialogo ).dialog(
    {
        width: anchoDialogo,
        modal: modal,
        title: titulo,
        position: {at: posicion}
    });
}

function paginaConAjaxPorCodigo(idSeccion, codigo, url, method, preFunction, postFunction, cache, asincrono)
{
    if((typeof preFunction)=='function')
    {
        preFunction();
    }

    $("#"+idSeccion).html("<div style='width: 100%;text-align:center;'><div id='divLoadingSuperior'></div></div>");
    $.ajax(
    {
        url: url,
        type: method,
        data: {codigo : codigo},
        cache: cache,
        async: asincrono
    }).done(function(pagina) 
    {
        $("#"+idSeccion).html(pagina);

        if((typeof postFunction)=='function')
        {
            postFunction();
        }
    });
}

function paginaConAjax(idSeccion, url, method, cache, asincrono)
{
    $("#"+idSeccion).html("<div style='width: 100%;text-align:center;'><div id='divLoadingSuperior'></div></div>");
    $.ajax(
    {
        url: url,
        type: method,
        cache: cache,
        async: asincrono
    }).done(function(pagina) 
    {
        $("#"+idSeccion).html(pagina);
    });
}