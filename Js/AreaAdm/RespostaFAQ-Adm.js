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
        document.getElementById("result").innerHTML = "";
        if (dadosPHP.trim() === ""){
            console.log("Resposta vazia do servidor.");
        }
        else{
            var Pergunta = JSON.parse(dadosPHP);
    
            // CONSULTA EM Tabela
            var Tabela = '';
            Tabela += "<table class='table table-bordered table-striped table-dark ml-5'";

            Tabela += "<tr><th scope='col' class='text-center'>ID</th><th scope='col' class='text-center'>Nome</th><th scope='col' class='text-center'>Email</th><th scope='col' class='text-center'>Pergunta</th>"
            for (i=0; i<Pergunta.length; i++){
                Tabela += "<tr>";
                    Tabela += "<td class='text-center'>" + Pergunta[i].ID_PERGUNTA  +  "</td>";
                    Tabela += "<td class='text-center'>" + Pergunta[i].NOME_USUARIO +  "</td>";
                    Tabela += "<td class='text-center'>" + Pergunta[i].EMAIL_USUARIO +  "</td>";
                    Tabela += "<td class='text-center'>" + Pergunta[i].PERGUNTA     +  "</td>";
                Tabela+= "</tr>"
            }
    
            $("#result").append(Tabela); 
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
        document.getElementById("result").innerHTML = "";

        if (dadosPHP.trim() === ""){
            console.log("Resposta vazia do servidor.");
        }
        else{
            var Pergunta = JSON.parse(dadosPHP);
    
            // CONSULTA EM Tabela
            var Tabela = '';
            Tabela += "<table class='table table-bordered table-striped table-dark ml-5'";

            Tabela += "<tr><th scope='col' class='text-center'>ID</th><th scope='col' class='text-center'>Nome</th><th scope='col' class='text-center'>Email</th><th scope='col' class='text-center'>Pergunta</th>"
            for (i=0; i<Pergunta.length; i++){
                Tabela += "<tr>";
                    Tabela += "<td class='text-center'>" + Pergunta[i].ID_PERGUNTA  +  "</td>";
                    Tabela += "<td class='text-center'>" + Pergunta[i].NOME_USUARIO +  "</td>";
                    Tabela += "<td class='text-center'>" + Pergunta[i].EMAIL_USUARIO +  "</td>";
                    Tabela += "<td class='text-center'>" + Pergunta[i].PERGUNTA     +  "</td>";
                Tabela+= "</tr>"
            }
    
            $("#result").append(Tabela); 
        }
    })

    .fail(function(){
        alert("falha");
    })

    return false;
}

