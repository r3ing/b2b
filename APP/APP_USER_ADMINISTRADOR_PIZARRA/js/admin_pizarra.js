'use strict'

function showForms(url, op, params){
    if(op == 1){
        $('#tablePizarra').hide()
        $('#loading').show();
        var data = '';
    }else{
        //$('#tablePizarra').hide()
        //$('#loading').show();
        //var data = '';
    }
    $.ajax({
        type: 'POST',
        url: url,
        data: data,
        success: function(data) {
            $('#forms').html(data);
        },
        complete: function(){
            $('#loading').hide();
            $('#forms').fadeIn('slow');
            window.scrollTo(0, document.body.scrollHeight);
            $("html, body").animate({ scrollTop: 0 }, "slow");

        }
    })
}

function deletePizarra(param){
alert(param)
}

function cancel(){
    $('#forms').hide();
    $('#result').hide();
    $('#tablePizarra').fadeIn('slow');
}

function validateForm(){
    var form = false;

    if (document.getElementById('cliente').value == '')
    {
        $('#msgCliente').fadeIn(1000).html("<span style='color:#FF0000;'>Seleccione Cliente.</span>");
        form = false;
    }
    else {
        $('#msgCliente').fadeIn(1000).html("&nbsp;");
        form = true;
    }

    if (document.getElementById('titulo').value == '')
    {
        $('#msgTitulo').fadeIn(1000).html("<span style='color:#FF0000;'>Ingrese T&iacute;tulo.</span>");
        form = false;
    }
    else{
        if(!validaAlfanumerico(document.getElementById('titulo').value)){
            $('#msgTitulo').fadeIn(1000).html("<span style='color:#FF0000;'>T&iacute;tulo Inv&aacute;lido.</span>");
            form = false;
        }
        else{
            $('#msgTitulo').fadeIn(1000).html("&nbsp;");
            form = true;
        }
    }

    if (document.getElementById('descripcion').value == '')
    {
        $('#msgDescripcion').fadeIn(1000).html("<span style='color:#FF0000;'>Ingrese Descripci&oacute;n.</span>");
        form = false;
    }
    else{
        $('#msgDescripcion').fadeIn(1000).html("&nbsp;");
        form = true;
    }

    if (document.getElementById('email').value == '')
    {
        $('#msgEmail').fadeIn(1000).html("<span style='color:#FF0000;'>Ingrese E-mail.</span>");
        form = false;
    }
    else {
        if(!email(document.getElementById('email').value)){
            $('#msgEmail').fadeIn(1000).html("<span style='color:#FF0000;'>E-mail Inv&aacute;lido.</span>");
            form = false;
        }
        else{
            $('#msgEmail').fadeIn(1000).html("&nbsp;");
            form = true;
        }
    }

    if (document.getElementById('phone').value == '')
    {
        $('#msgPhone').fadeIn(1000).html("<span style='color:#FF0000;'>Ingrese Tel&eacute;fono.</span>");
        form = false;
    }
    else {
        if(!phone(document.getElementById('phone').value)){
            $('#msgPhone').fadeIn(1000).html("<span style='color:#FF0000;'>Tel&eacute;fono Inv&aacute;lido.</span>");
            form = false;
        }else{
            $('#msgPhone').fadeIn(1000).html("&nbsp;");
            form = true;
        }
    }

    if (document.getElementById('file1').value == '' && document.getElementById('file2').value == '')
    {
        $('#msgFile').fadeIn(1000).html("<span style='color:#FF0000;'>Seleccione un Archivo.</span>");
        form = false;
    }
    else {
        $('#msgFile').fadeIn(1000).html("&nbsp;");
        form = true;
    }

    return form;
}


