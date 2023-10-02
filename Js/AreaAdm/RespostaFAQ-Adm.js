function EnviarResposta(event){
    event.preventDefault();
    var DadosForm = $('#frm_PerguntaResposta').serialize()
    console.log(DadosForm)

    $.ajax({
        method: 'GET',
        url: 'ControleFAQ-Adm.php?btn_ResponderPergunta',
        data: DadosForm,
    })
    .done(function(dadosPHP){
        var Resposta = JSON.parse(dadosPHP);
        var Bloco = "<h3 class='text-center m-0'><strong class='text-center m-0'>" + Resposta + "</strong></h3>";

        $("#result").html(Bloco);
    })
        
    .fail(function(){
        alert("Não foi poossível responder a pergunta");
    })

    return false
}

function ListarPergunta(event){
    event.preventDefault();
    var DadosForm = $('#frm_PerguntaResposta').serialize();
    console.log(DadosForm);

    $.ajax({
        method: 'GET',
        url: 'ControleFAQ-Adm.php?btn_ListarPergunta',
        data: DadosForm
    })

    .done(function(dadosPHP){
        if (dadosPHP.trim() === ""){
            console.log("Resposta vazia do servidor.");
        }
        else{
            var Pergunta = JSON.parse(dadosPHP);
    
            // CONSULTA EM BLOCO
            var Bloco = '';
            for (i=0; i<Pergunta.length; i++){
                Bloco += "<hr><p class='text-center m-0'><strong class='text-center m-0'>ID Pergunta: </strong>" +Pergunta[i].ID_PERGUNTA   +  "</p><br>";
                Bloco += "<p class='text-center m-0'><strong class='text-center m-0'>Nome Usuario: </strong>"   +Pergunta[i].NOME_USUARIO  +  "</p><br>";
                Bloco += "<p class='text-center m-0'><strong class='text-center m-0'>Email Usuario: </strong>"  +Pergunta[i].NOME_USUARIO  +  "</p><br>";
                Bloco += "<p class='text-center m-0'><strong class='text-center m-0'>Pergunta: </strong>"       +Pergunta[i].PERGUNTA      +  "</p><br>";
            }
    
            $("#result").html(Bloco);
        }
    })

    .fail(function(){
        alert("falha");
    })

    return false;
}

function ConsultarPergunta(event){
    event.preventDefault();
    var DadosForm = $('#frm_PerguntaResposta').serialize();
    console.log(DadosForm);

    $.ajax({
        method: 'GET',
        url: 'ControleFAQ-Adm.php?btn_ConsultarPergunta',
        data: DadosForm
    })

    .done(function(dadosPHP){
        if (dadosPHP.trim() === ""){
            console.log("Resposta vazia do servidor.");
        }
        else{
            var Pergunta = JSON.parse(dadosPHP);
    
            // CONSULTA EM BLOCO
            var Bloco = '';
            for (i=0; i<Pergunta.length; i++){
                Bloco += "<hr><p class='text-center m-0'><strong class='text-center m-0'>ID Pergunta: </strong>"             +Pergunta[i].ID_PERGUNTA   +  "</p><br>";
                Bloco += "<p class='text-center m-0'><strong class='text-center m-0'>Nome Usuario: </strong>"               +Pergunta[i].NOME_USUARIO  +  "</p><br>";
                Bloco += "<p class='text-center m-0'><strong class='text-center m-0'>Email Usuario: </strong>"              +Pergunta[i].NOME_USUARIO +  "</p><br>";
                Bloco += "<p class='text-center m-0'><strong class='text-center m-0'>Pergunta: </strong>"   +Pergunta[i].PERGUNTA      +  "</p><br>";
            }
    
            $("#result").html(Bloco);
        }
    })

    .fail(function(){
        alert("falha");
    })

    return false;
}

