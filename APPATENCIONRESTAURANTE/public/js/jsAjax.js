function detalleAjax(idSeccion, data, url, method, preFunction, postFunction, cache, asincrono)
{
    if((typeof preFunction)=='function')
    {
        preFunction();
    }

    $("#"+idSeccion).css({'display' : 'inline-block'});
    $("#"+idSeccion).html("<div style='width: 100%;text-align:center;'><div id='divLoadingSuperior'></div></div>");
    $.ajax(
    {
        url: url,
        type: method,
        data: data,
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

function dialogoAjax(idDialogo, anchoDialogo, modal, titulo, posicion, data, url, method, preFunction, postFunction, cache, asincrono)
{
    if((typeof preFunction)=='function')
    {
        preFunction();
    }

    $("#"+idDialogo).html("<div style='width: 100%;text-align:center;'><div id='divLoadingSuperior'></div></div>");
    $.ajax(
    {
        url: url,
        type: method,
        data: data,
        cache: cache,
        async: asincrono
    }).done(function(pagina) 
    {
        $("#"+idDialogo).html(pagina);

        if((typeof postFunction)=='function')
        {
            postFunction();
        }
    });

    $( "#"+idDialogo ).dialog(
    {
        width: anchoDialogo,
        modal: modal,
        title: titulo,
        position: {at: posicion}
    });
}

function paginaAjax(idSeccion, data, url, method, preFunction, postFunction, cache, asincrono)
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
        data: data,
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