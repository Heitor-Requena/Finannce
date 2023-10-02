// Consultar Usuário
function ConsultarUsr(event){
        event.preventDefault();
        var DadosForm = $('#frm_ConListUsr').serialize();
        console.log(DadosForm);

        $.ajax({
            method: 'GET',
            url: '../AreaAdm/ControleUsr-Adm.php?btn_ConsultarUsr',
            data: DadosForm
        })

        .done(function(dadosPHP){
            if (dadosPHP.trim() === ""){
                console.log("Usuário Não Encontrado");
            }
            else{
                var Usuarios = JSON.parse(dadosPHP);
    
                // CONSULTA EM BLOCO
                var Bloco = '';
                for (i=0; i<Usuarios.length; i++){
                    Bloco += "<hr><p class='text-center m-0'><strong class='text-center m-0'>ID: </strong>"             +Usuarios[i].ID_CLIENTE     +  "</p><br>";
                    Bloco += "<p class='text-center m-0'><strong class='text-center m-0'>Nome: </strong>"               +Usuarios[i].NOME_CLIENTE   +  "</p><br>";
                    Bloco += "<p class='text-center m-0'><strong class='text-center m-0'>Email: </strong>"              +Usuarios[i].EMAIL_CLIENTE  +  "</p><br>";
                    Bloco += "<p class='text-center m-0'><strong class='text-center m-0'>Telefone: </strong>"           +Usuarios[i].FONE_CLIENTE   +  "</p><br>";
                    Bloco += "<p class='text-center m-0'><strong class='text-center m-0'>Data de Cadastro: </strong>"   +Usuarios[i].DATA_ENTRADA   +  "</p><br>";
                }
        
                $("#result").html(Bloco);
            }
            
        })

        .fail(function(){
            alert("falha");
        })

        return false;
    
}

// Listar Todos Usuários
function ListarUsr(event){
    event.preventDefault();
    var DadosForm = $("#frm_ConListUsr").serialize();
    console.log(DadosForm);

    $.ajax({
        method: 'GET',
        url: '../AreaAdm/ControleUsr-Adm.php?btn_ListarUsr',
        data: DadosForm
    })

    .done(function(dadosPHP){
        if (dadosPHP.trim() === ""){
            console.log("Nenhum Usuário Encontrado");
        }
        else{
            var Usuarios = JSON.parse(dadosPHP);

            // CONSULTA EM BLOCO
            var Bloco = '';
            for (i=0; i<Usuarios.length; i++){
                Bloco += "<hr><p class='text-center m-0'><strong class='text-center m-0'>ID: </strong>"             +Usuarios[i].ID_CLIENTE     +  "</p><br>";
                Bloco += "<p class='text-center m-0'><strong class='text-center m-0'>Nome: </strong>"               +Usuarios[i].NOME_CLIENTE   +  "</p><br>";
                Bloco += "<p class='text-center m-0'><strong class='text-center m-0'>Email: </strong>"              +Usuarios[i].EMAIL_CLIENTE  +  "</p><br>";
                Bloco += "<p class='text-center m-0'><strong class='text-center m-0'>Telefone: </strong>"           +Usuarios[i].FONE_CLIENTE   +  "</p><br>";
                Bloco += "<p class='text-center m-0'><strong class='text-center m-0'>Data de Cadastro: </strong>"   +Usuarios[i].DATA_ENTRADA   +  "</p><br>";
            }

        $("#result").html(Bloco);
        }
    })

    .fail(function(){
        alert("falha")
    })

    return false;
}

// Alterar Login
function AltLogUsr(event){
    event.preventDefault();
    var DadosForm = $("#frm_AltUsr").serialize();
    console.log(DadosForm);

    $.ajax({
        method: 'GET',
        url: '../AreaAdm/ControleUsr-Adm.php?btn_AltLogUsr',
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

// Deletar Usr
function DelUsr(event){
    event.preventDefault();
    var DadosForm = $("#frm_DelUsr").serialize();
    console.log(DadosForm);

    $.ajax({
        method: 'GET',
        url: '../AreaAdm/ControleUsr-Adm.php?btn_DeletarUsr',
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

