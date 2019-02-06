/**
 * Created by Symva on 15/06/2018.
 */

function fnGotoUrl(url)
{
    window.location = url;
}

function fnStoreUsuario(frm)
{
    var url = frm.attr('action');
    var data = frm.serialize();

    $.post(url, data, function(response){
        alert(response.msg);
        if(response.msgId == 200){
            window.location = response.url;
        }
    });
}

function fnStorePersona(frm)
{
    var url = frm.attr('action');
    var data = frm.serialize();

    $.post(url,data,function(response){
        alert(response.msg);
        if(response.msgId == 200){
            window.location = response.url;
        }
    })
}

function fnStoreEntidad(frm)
{
    var url = frm.attr('action');
    var data = frm.serialize();

    $.post(url,data,function(response){
        alert(response.msg);
        if(response.msgId == 200){
            window.location = response.url;
        }
    })
}

function fnStoreObra(frm)
{
    var url = frm.attr('action');
    var data = frm.serialize();

    $.post(url,data,function(response){
        alert(response.msg);
        if(response.msgId == 200){
            window.location = response.url;
        }
    })
}

function fnAddContact(frm)
{
    var url = frm.attr('action');
    var data = frm.serialize();

    $.post(url,data,function(response){
        alert(response.msg);
        if(response.msgId == 200){
            window.location = response.url;
        }
    })
}

function fnStoreEvent(frm)
{
    var url = frm.attr('action');
    var data = frm.serialize();

    $.post(url,data,function(response){
        alert(response.msg);
        if(response.msgId == 200){
            window.location = response.url;
        }
    })
}

function adjuntarImagen(frm)
{
    var frmData = new FormData(frm);

    $.ajax({
        type: 'post',
        url: '../evento/uploadicon',
        data: frmData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(response){
            alert(response.msg);
            $('#mdlAttachFile').modal('hide');
            if(response.msgId === 200){
                //mostrar_cronograma(response.pyId, response.ptId, response.url);
                window.location = response.url;
            }
        },
        xhr: function(){
            var myXhr = $.ajaxSettings.xhr();
            if(myXhr.upload){
                myXhr.upload.addEventListener('progress', function(ev){
                    if(ev.lengthComputable){
                        $('progress').attr({
                            value: ev.loaded,
                            max: ev.total,
                        });
                    }
                }, false);
            }
            return myXhr;
        },
    });
}

function findInDirectory(value, field)
{
    $.post('directorio/encontrar',{value: value, field: field}, function(data){
        $('#contentDirectorio').html(data);
    });
}

function fnCloneRowTable(row, table)
{
    $(row).find('.slcPasajero').select2('destroy');
    var tbody = table.getElementsByTagName('tbody')[0];
    var clone = row.cloneNode(true);
    clone.id = '';
    clone.style.display = '';
    tbody.appendChild(clone);
    $('select.slcPasajero').select2();
}

function fnDeleteRowTable(row)
{
    row.parentNode.removeChild(row);
}

function fnAddRowTable(table)
{
    console.log(table.rows.length);
    var row = table.insertRow(table.rows.length);
    for(i=0; i<table.rows[0].cells.length; i++){
        fnCreateCell(row.insertCell(i), i, 'row');
    }
}

function fnCreateCell(cell, text, style)
{
    var div = document.createElement('div'),
        txt = document.createTextNode(text);

    div.appendChild(txt);
    div.setAttribute('class', style);
    div.setAttribute('className', style);
    cell.appendChild(div);
}

function fnStoreHojaviaje(frm)
{
    var url = frm.attr('action');
    var data = frm.serialize();

    $.post(url, data, function(response){
        alert(response.msg);
        if(response.msgId == 200){
            window.location = response.url;
        }
    });
}

function fnUpdateHojaviaje(frm)
{
    var url = frm.attr('action');
    var data = frm.serialize();

    $.post(url, data, function(response){
        alert(response.msg);
        if(response.msgId == 200){
            window.location = response.url;
        }
    })
}