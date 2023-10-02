// Excluir Artigo
function ExcluirArtigo(event){
    event.preventDefault();
    var DadosForm = $('#frm_Artigo2').serialize()

    $.ajax({
        method: 'GET',
        url: 'ControleArtigo-Adm?btn_ExcluirArtigo',
        data: DadosForm,
    })
    .done(function(dadosPHP){
        var Resposta = JSON.parse(dadosPHP);
        var Bloco = "<h3 class='text-center m-0'><strong class='text-center m-0'>" + Resposta + "</strong></h3>";

        $("#resultArtigo").html(Bloco);
    })

    .fail(function(){
        alert("DEU ERRADO O CADASTRO");
    })

    return false
}


function AdicionarArtigo(event){
    event.preventDefault()
    var DadosForm = $('#frm_Artigo').serialize()
    console.log(DadosForm)

    $.ajax({
        method: 'GET',
        url: 'ControleArtigo-Adm.php?btn_AdicionarArtigo',
        data: DadosForm,
    })
    .done(function(dadosPHP){
        var Resposta = JSON.parse(dadosPHP);
        var Bloco = "<h3 class='text-center m-0'><strong class='text-center m-0'>" + Resposta + "</strong></h3>";

        $("#resultArtigo").html(Bloco);
    })

    .fail(function(){
        alert("DEU ERRADO O CADASTRO");
    })

    return false
}


function ConsultarArtigo(event){
    event.preventDefault()
    var DadosForm = $('#frm_Artigo2').serialize()
    console.log(DadosForm)

    $.ajax({
        method: 'GET',
        url: 'ControleArtigo-Adm.php?btn_ConsultarArtigo',
        data: DadosForm,

        beforeSend: function(){
            console.log("DAdos enviados")
        }
    })

    .done(function(dadosPHP){
        if (dadosPHP.trim() === ''){
            console.log ("ARTIGO Não Encontrado");
        }

        console.log("PARTE ANTES DO DADOS PHP")
        var Artigo = JSON.parse(dadosPHP);
        console.log(Artigo)
    
        var Bloco = '';
        for (i = 0 ; i < Artigo.length; i++){
            Bloco += "<hr><p class='text-center m-0'><strong class='text-center m-0'>ID Artigo: </strong>"   + Artigo[i].ID_ARTIGO      +  "</p><br>";
            Bloco += "<p class='text-center m-0'><strong class='text-center m-0'>Título: </strong>"          + Artigo[i].TITULO_ARTIGO  +  "</p><br>";
            Bloco += "<p class='text-center m-0'><strong class='text-center m-0'>Conteudo Artigo: </strong>" + Artigo[i].ARTIGO         +  "</p><br>";
            Bloco += "<p class='text-center m-0'><strong class='text-center m-0'>Autor Artigo: </strong>"    + Artigo[i].AUTOR_ARTIGO   +  "</p><br>";
        }

        $("#result").html(Bloco); 
    })

    .fail(function(){
        alert("DEU ERRADO A CONSULTA");
    })

    return false;

}

function ListarArtigo(event){
    event.preventDefault()
    var DadosForm = $('#frm_Artigo2').serialize()
    console.log(DadosForm)

    $.ajax({
        method: 'GET',
        url: 'ControleArtigo-Adm.php?btn_ListarArtigo',
        data: DadosForm,

        beforeSend: function(){
            console.log("DAdos enviados")
        }
    })

    .done(function(dadosPHP){
        var Artigo = JSON.parse(dadosPHP);
        console.log(Artigo)
    
        var Bloco = '';
        for (i = 0 ; i < Artigo.length; i++){
            Bloco += "<hr><p class='text-center m-0'><strong class='text-center m-0'>ID Artigo: </strong>"      + Artigo[i].ID_ARTIGO       +  "</p><br>";
            Bloco += "<p class='text-center m-0'><strong class='text-center m-0'>Título: </strong>"             + Artigo[i].TITULO_ARTIGO   +  "</p><br>";
            Bloco += "<p class='text-center m-0'><strong class='text-center m-0'>Conteudo Artigo: </strong>"    + Artigo[i].ARTIGO          +  "</p><br>";
            Bloco += "<p class='text-center m-0'><strong class='text-center m-0'>Autor Artigo: </strong>"       + Artigo[i].AUTOR_ARTIGO    +  "</p><br>";
            Bloco += "<p class='text-center m-0'><strong class='text-center m-0'>Data de publicação: </strong>" + Artigo[i].DATA_PUBLICACAO +  "</p><br>";

        }

        $("#result").html(Bloco); 
    })

    .fail(function(){
        alert("DEU ERRADO A CONSULTA");
    })

    return false;

}