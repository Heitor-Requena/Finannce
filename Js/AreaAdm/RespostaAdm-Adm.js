// Cadastrar Adm
function CadAdm(event){
    event.preventDefault();
    var DadosForm = $("#frm_CadAdm").serialize();
    console.log(DadosForm);

    $.ajax({
        method: 'GET',
        url: 'ControleAdm-Adm.php?btn_CadAdm',
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

// Consultar Adm
function ConsultarAdm(event){
    event.preventDefault();
    var DadosForm = $('#frm_ConsAdm').serialize();
    console.log(DadosForm);

    $.ajax({
        method: 'GET',
        url: 'ControleAdm-Adm.php?btn_ConsAdm',
        data: DadosForm
    })

    .done(function(dadosPHP){
        if (dadosPHP.trim() === ''){
            console.log ("Administrador Não Encontrado");
        }
        else{
            var Administradores = JSON.parse(dadosPHP);
    
            // CONSULTA EM BLOCO
            var Bloco = '';
            for (i=0; i<Administradores.length; i++){
                Bloco += "<hr><p class='text-center m-0'><strong class='text-center m-0'>ID: </strong>"             +Administradores[i].ID_ADM      +  "</p><br>";
                Bloco += "<p class='text-center m-0'><strong class='text-center m-0'>Nome: </strong>"               +Administradores[i].NOME_ADM    +  "</p><br>";
                Bloco += "<p class='text-center m-0'><strong class='text-center m-0'>Email: </strong>"              +Administradores[i].EMAIL_ADM   +  "</p><br>";
                Bloco += "<p class='text-center m-0'><strong class='text-center m-0'>CPF: </strong>"                +Administradores[i].CPF_ADM     +  "</p><br>";
                Bloco += "<p class='text-center m-0'><strong class='text-center m-0'>RG: </strong>"                 +Administradores[i].RG_ADM      +  "</p><br>";
                Bloco += "<p class='text-center m-0'><strong class='text-center m-0'>Data de Cadastro: </strong>"   +Administradores[i].DATA_ENTRADA+  "</p><br>";
            }
    
            $("#result").html(Bloco); 
        }
    })

    .fail(function(){
        alert("falha");
    })

    return false;
}

// Listar Todos Adm
function ListarAdm(event){
    event.preventDefault();
    var DadosForm = $('#frm_ConsAdm').serialize();
    console.log(DadosForm);

    $.ajax({
        method: 'GET',
        url: 'ControleAdm-Adm.php?btn_ListAdm',
        data: DadosForm
    })

    .done(function(dadosPHP){
        if (dadosPHP.trim() === ''){
            console.log ("Administrador Não Encontrado");
        }
        else{
            var Administradores = JSON.parse(dadosPHP);
    
            // CONSULTA EM BLOCO
            var Bloco = '';
            for (i=0; i<Administradores.length; i++){
                Bloco += "<hr><p class='text-center m-0'><strong class='text-center m-0'>ID: </strong>"             +Administradores[i].ID_ADM      +  "</p><br>";
                Bloco += "<p class='text-center m-0'><strong class='text-center m-0'>Nome: </strong>"               +Administradores[i].NOME_ADM    +  "</p><br>";
                Bloco += "<p class='text-center m-0'><strong class='text-center m-0'>Email: </strong>"              +Administradores[i].EMAIL_ADM   +  "</p><br>";
                Bloco += "<p class='text-center m-0'><strong class='text-center m-0'>CPF: </strong>"                +Administradores[i].CPF_ADM     +  "</p><br>";
                Bloco += "<p class='text-center m-0'><strong class='text-center m-0'>RG: </strong>"                 +Administradores[i].RG_ADM      +  "</p><br>";
                Bloco += "<p class='text-center m-0'><strong class='text-center m-0'>Data de Cadastro: </strong>"   +Administradores[i].DATA_ENTRADA+  "</p><br>";
            }
    
            $("#result").html(Bloco); 
        }
    })

    .fail(function(){
        alert("falha");
    })

    return false;
    
}

// Alterar Login Adm
function AltLogAdm(event){
    event.preventDefault();
    var DadosForm = $("#frm_AltLogAdm").serialize();
    console.log(DadosForm);

    $.ajax({
        method: 'GET',
        url: 'ControleAdm-Adm.php?btn_AltLogAdm',
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

// Deletar Adm
function DelAdm(event){
    event.preventDefault();
    var DadosForm = $("#frm_DelAdm").serialize();
    console.log(DadosForm);

    $.ajax({
        method: 'GET',
        url: 'ControleAdm-Adm.php?btn_DelAdm',
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