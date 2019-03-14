/**
 * Created by Symva on 15/06/2018.
 */

 
$(document).ready(function() {

    
    $('#blogCarousel').carousel({
        interval: 30000
    });

	  
    var numItems = $('li.fancyTab1').length;
		
	
			  if (numItems == 12){
					$("li.fancyTab1").width('8.3%');
				}
			  if (numItems == 11){
					$("li.fancyTab1").width('9%');
				}
			  if (numItems == 10){
					$("li.fancyTab1").width('10%');
				}
			  if (numItems == 9){
					$("li.fancyTab1").width('11.1%');
				}
			  if (numItems == 8){
					$("li.fancyTab1").width('12.5%');
				}
			  if (numItems == 7){
					$("li.fancyTab1").width('14.2%');
				}
			  if (numItems == 6){
					$("li.fancyTab1").width('16.666666666666667%');
				}
			  if (numItems == 5){
					$("li.fancyTab1").width('20%');
				}
			  if (numItems == 4){
					$("li.fancyTab1").width('25%');
				}
			  if (numItems == 3){
					$("li.fancyTab1").width('33.3%');
				}
			  if (numItems == 2){
					$("li.fancyTab1").width('50%');
				}
		});

function show5(){
    if (!document.layers&&!document.all&&!document.getElementById)
        return

    var Digital=new Date()
    var hours=Digital.getHours()
    var minutes=Digital.getMinutes()
    var seconds=Digital.getSeconds()

    var dn="PM"
    if (hours<12)
        dn="AM"
    if (hours>12)
        hours=hours-12
    if (hours==0)
        hours=12

    if (minutes<=9)
        minutes="0"+minutes
    if (seconds<=9)
        seconds="0"+seconds
    
    myclock=""+hours+":"+minutes+":"+seconds+" "+dn+""
    
    if (document.layers){
        document.layers.liveclock.document.write(myclock)
        document.layers.liveclock.document.close()
    }
    else if (document.all)
        liveclock.innerHTML=myclock
    else if (document.getElementById)
        document.getElementById("liveclock").innerHTML=myclock
    
    setTimeout("show5()",1000)
}

window.onload=show5

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