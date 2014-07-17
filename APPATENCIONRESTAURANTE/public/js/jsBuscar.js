function quitarTildes(texto)
{
    var expresionRegular;
    var tildes="ÀÁÈÉÌÍÒÓÙÚàáèéìíòóùú";
    var silabasNormales="AAEEIIOOUUaaeeiioouu";
    
    for(var i=0; i<tildes.length; i++)
    {
        expresionRegular=new RegExp(tildes.charAt(i),"g");
        texto=texto.replace(expresionRegular, silabasNormales.charAt(i));
    }

    return texto;
}

function buscarEnClass(nombreClass, valor)
{
    var nombreClass=$('.'+nombreClass);
    valor=quitarTildes(valor.replace(/\s/g,''));
    var expresionRegular=new RegExp(valor, 'i');
    nombreClass.find('.elementoBuscar').each(function(index, elemento) 
    {
        if(expresionRegular.test(quitarTildes($(elemento).text().replace(/\s/g,'')))) 
        {
            $(elemento).show();
        }
        else
        {
            $(elemento).hide();
        }
    });
}

function buscarEnTabla(columna, valor, classTabla) 
{
    var tabla=$('.'+classTabla);
    valor=quitarTildes(valor.replace(/\s/g,''));
    var expresionRegular=new RegExp(valor, 'i');
    tabla.find('tr').each(function(indexTr, tr)
    {
        var celdas = $(tr).find('td');
        if(celdas.length > 0)
        {
            if(expresionRegular.test(quitarTildes($(celdas[columna]).text().replace(/\s/g,''))))
            {
                $(tr).show();
            }
            else
            {
                $(tr).hide();
            }
        }
    });
}

function cargarColumnasTabla(classTabla, menosFinales, classCombo)
{
    var tabla=$("."+classTabla);
    tabla.find('tr').each(function(indexTr, tr) 
    {
        var celdas=$(tr).find('th');
        if(celdas.length>0) 
        {
            celdas.each(function(indexTh, th) 
            {
                if(indexTh>=celdas.length-menosFinales){return;}
                $("."+classCombo).append("<option value='"+indexTh+"'>"+$(th).text()+"</option>");
            });
        }
    });
}