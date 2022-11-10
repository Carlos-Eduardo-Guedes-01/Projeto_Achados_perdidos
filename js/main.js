
(function ($) {
    "use strict";


    /*==================================================================
    [ Focus input ]*/
    $('.input100').each(function(){
        $(this).on('blur', function(){
            if($(this).val().trim() != "") {
                $(this).addClass('has-val');
            }
            else {
                $(this).removeClass('has-val');
            }
        })    
    })
  
  /*==================================================================
    [ Upload ]*/

let drop_ = document.querySelector('.area-upload #upload-file');
drop_.addEventListener('dragenter', function(){
    document.querySelector('.area-upload .label-upload').classList.add('highlight');
});
drop_.addEventListener('dragleave', function(){
    document.querySelector('.area-upload .label-upload').classList.remove('highlight');
});
drop_.addEventListener('drop', function(){
    document.querySelector('.area-upload .label-upload').classList.remove('highlight');
});

function validarArquivo(file){
    console.log(file);
    // Tipos permitidos
    var mime_types = [ 'image/jpeg', 'image/png' ];
    
    // Validar os tipos
    if(mime_types.indexOf(file.type) == -1) {
        return {"error" : "O arquivo " + file.name + " não permitido"};
    }

    // Apenas 2MB é permitido
    if(file.size > 2*1024*1024) {
        return {"error" : file.name + " ultrapassou limite de 2MB"};
    }

    // Se der tudo certo
    return {"success": "Enviando: " + file.name};
}

function enviarArquivo(indice, barra){
    var data = new FormData();
    var request = new XMLHttpRequest();
    
    //Adicionar arquivo
    data.append('file', document.querySelector('#upload-file').files[indice]);
    
    // AJAX request finished
    request.addEventListener('load', function(e) {
        // Resposta
        if(request.response.status == "success"){
            barra.querySelector(".text").innerHTML = "<a href=\"" + request.response.path + "\" target=\"_blank\">" + request.response.name + "</a> <i class=\"fas fa-check\"></i>";
            barra.classList.add("complete");
        }else{
            barra.querySelector(".text").innerHTML = "Erro ao enviar: " + request.response.name;
            barra.classList.add("error");
        }
    });
    
    // Calcular e mostrar o progresso
    request.upload.addEventListener('progress', function(e) {
        var percent_complete = (e.loaded / e.total)*100;
        
        barra.querySelector(".fill").style.minWidth = percent_complete + "%"; 
    });
    
    //Resposta em JSON
    request.responseType = 'json';
    
    // Caminho
    request.open('post', 'upload.php'); 
    request.send(data);
}

document.querySelector('#upload-file').addEventListener('change', function() {
var files = this.files;
for(var i = 0; i < files.length; i++){
var info = validarArquivo(files[i]);
    //Criar barra
    var barra = document.createElement("div");
    var fill = document.createElement("div");
    var text = document.createElement("div");
    barra.appendChild(fill);
    barra.appendChild(text);

    barra.classList.add("barra");
    fill.classList.add("fill");
    text.classList.add("text");

    if(info.error == undefined){
        text.innerHTML = info.success;
        enviarArquivo(i, barra); //Enviar
    }else{
        text.innerHTML = info.error;
        barra.classList.add("error");
    }

    //Adicionar barra
    document.querySelector('.lista-uploads').appendChild(barra);
};
});

    /*==================================================================
    [ Validate ]*/
    var input = $('.validate-input .input100');

    $('.validate-form').on('submit',function(){
        var check = true;

        for(var i=0; i<input.length; i++) {
            if(validate(input[i]) == false){
                showValidate(input[i]);
                check=false;
            }
        }

        return check;
    });


    $('.validate-form .input100').each(function(){
        $(this).focus(function(){
           hideValidate(this);
        });
    });

    function validate (input) {
        if($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
            if($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                return false;
            }
        }
        else {
            if($(input).val().trim() == ''){
                return false;
            }
        }
    }

    function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }
    
    /*==================================================================
    [ Show pass ]*/
    var showPass = 0;
    $('.btn-show-pass').on('click', function(){
        if(showPass == 0) {
            $(this).next('input').attr('type','text');
            $(this).find('i').removeClass('zmdi-eye');
            $(this).find('i').addClass('zmdi-eye-off');
            showPass = 1;
        }
        else {
            $(this).next('input').attr('type','password');
            $(this).find('i').addClass('zmdi-eye');
            $(this).find('i').removeClass('zmdi-eye-off');
            showPass = 0;
        }
        
    });


})(jQuery);
