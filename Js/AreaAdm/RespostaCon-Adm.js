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
        document.getElementById("result").innerHTML = "";
        if (dadosPHP.trim() === ""){
            console.log("Resposta vazia do servidor.");
        }
        else{
            var Consultores = JSON.parse(dadosPHP);
    
            // CONSULTA EM Tabela
            var Tabela = '';
            Tabela += "<table class='table table-bordered table-striped table-dark ml-5'";

            Tabela += "<tr><th scope='col' class='text-center'>ID</th><th scope='col' class='text-center'>Nome</th><th scope='col' class='text-center'>Email</th><th scope='col' class='text-center'>Data de Cadastro</th>"
            for (i=0; i<Consultores.length; i++){
                Tabela += "<tr>";
                    Tabela += "<td class='text-center align-middle'>" + Consultores[i].ID_CONSULTOR     +  "</td>";
                    Tabela += "<td class='text-center align-middle'>" + Consultores[i].NOME_CONSULTOR   +  "</td>";
                    Tabela += "<td class='text-center align-middle'>" + Consultores[i].EMAIL_CONSULTOR  +  "</td>";
                    Tabela += "<td class='text-center align-middle'>" + Consultores[i].DATA_ENTRADA     +  "</td>";
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
        document.getElementById("result").innerHTML = "";
        if (dadosPHP.trim() === ""){
            console.log("Resposta vazia do servidor.");
        }
        else{
            var Consultores = JSON.parse(dadosPHP);
    
           // CONSULTA EM Tabela
           var Tabela = '';
           Tabela += "<table class='table table-bordered table-striped table-dark ml-5'";

           Tabela += "<tr><th scope='col' class='text-center'>ID</th><th scope='col' class='text-center'>Nome</th><th scope='col' class='text-center'>Email</th><th scope='col' class='text-center'>Data de Cadastro</th>"
           for (i=0; i<Consultores.length; i++){
               Tabela += "<tr>";
                   Tabela += "<td class='text-center align-middle'>" + Consultores[i].ID_CONSULTOR     +  "</td>";
                   Tabela += "<td class='text-center align-middle'>" + Consultores[i].NOME_CONSULTOR   +  "</td>";
                   Tabela += "<td class='text-center align-middle'>" + Consultores[i].EMAIL_CONSULTOR  +  "</td>";
                   Tabela += "<td class='text-center align-middle'>" + Consultores[i].DATA_ENTRADA     +  "</td>";
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
