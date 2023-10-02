// Consultar Consultor
function ConsultarCon(event){
    event.preventDefault();
    var DadosForm = $('#frm_ConListCon').serialize();
    console.log(DadosForm);

    $.ajax({
        method: 'GET',
        url: 'ControleCon-Adm.php?btn_ConsultarCon',
        data: DadosForm
    })

    .done(function(dadosPHP){
        if (dadosPHP.trim() === ""){
            console.log("Resposta vazia do servidor.");
        }
        else{
            var Consultores = JSON.parse(dadosPHP);
    
            // CONSULTA EM BLOCO
            var Bloco = '';
            for (i=0; i<Consultores.length; i++){
                Bloco += "<hr><p class='text-center m-0'><strong class='text-center m-0'>ID: </strong>"             +Consultores[i].ID_CONSULTOR     +  "</p><br>";
                Bloco += "<p class='text-center m-0'><strong class='text-center m-0'>Nome: </strong>"               +Consultores[i].NOME_CONSULTOR   +  "</p><br>";
                Bloco += "<p class='text-center m-0'><strong class='text-center m-0'>Email: </strong>"              +Consultores[i].EMAIL_CONSULTOR  +  "</p><br>";
                Bloco += "<p class='text-center m-0'><strong class='text-center m-0'>Data de Cadastro: </strong>"   +Consultores[i].DATA_ENTRADA     +  "</p><br>";
            }
    
            $("#result").html(Bloco);
        }
    })

    .fail(function(){
        alert("falha");
    })

    return false;

}

// Listar Todos Consultores
function ListarCon(event){
    event.preventDefault();
    var DadosForm = $('#frm_ConListCon').serialize();
    console.log(DadosForm);

    $.ajax({
        method: 'GET',
        url: 'ControleCon-Adm.php?btn_ListarCon',
        data: DadosForm
    })

    .done(function(dadosPHP){
        if (dadosPHP.trim() === ""){
            console.log("Resposta vazia do servidor.");
        }
        else{
            var Consultores = JSON.parse(dadosPHP);
    
            // CONSULTA EM BLOCO
            var Bloco = '';
            for (i=0; i<Consultores.length; i++){
                Bloco += "<hr><p class='text-center m-0'><strong class='text-center m-0'>ID: </strong>"             +Consultores[i].ID_CONSULTOR     +  "</p><br>";
                Bloco += "<p class='text-center m-0'><strong class='text-center m-0'>Nome: </strong>"               +Consultores[i].NOME_CONSULTOR   +  "</p><br>";
                Bloco += "<p class='text-center m-0'><strong class='text-center m-0'>Email: </strong>"              +Consultores[i].EMAIL_CONSULTOR  +  "</p><br>";
                Bloco += "<p class='text-center m-0'><strong class='text-center m-0'>Data de Cadastro: </strong>"   +Consultores[i].DATA_ENTRADA     +  "</p><br>";
            }
    
            $("#result").html(Bloco);
        }
    })

    .fail(function(){
        alert("falha");
    })

    return false;

}

// Alterar Login do Consultor
function AltLogCon(event){
    event.preventDefault();
    var DadosForm = $("#frm_AltCon").serialize();
    console.log(DadosForm);

    $.ajax({
        method: 'GET',
        url: 'ControleCon-Adm.php?btn_AltLogCon',
        data: DadosForm
    })

    .done(function(dadosPHP){
        var Resposta = JSON.parse(dadosPHP);
        var Bloco = "<h3 class='text-center m-0'><strong class='text-center m-0'>" + Resposta + "</strong></h3>";

        $("#result").html(Bloco);
        
    })

    .fail(function(){
        alert("falha")
    })

    return false;
}

// Deletar Consultor
function DelCon(event){
    event.preventDefault();
    var DadosForm = $("#frm_DelCon").serialize();
    console.log(DadosForm);

    $.ajax({
        method: 'GET',
        url: 'ControleCon-Adm.php?btn_DeletarCon',
        data: DadosForm
    })

    .done(function(dadosPHP){
            var Resposta = JSON.parse(dadosPHP);
            var Bloco = "<h3 class='text-center m-0'><strong class='text-center m-0'>" + Resposta + "</strong></h3>";

        $("#result").html(Bloco);
        
    })

    .fail(function(){
        alert("falha")
    })

    return false;
}
