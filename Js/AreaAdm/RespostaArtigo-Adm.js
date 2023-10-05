// Excluir Artigo
function ExcluirArtigo(event) {
    event.preventDefault();
    var DadosForm = $('#frm_Artigo2').serialize()

    $.ajax({
        method: 'GET',
        url: 'ControleArtigo-Adm?btn_ExcluirArtigo',
        data: DadosForm,
    })
        .done(function (dadosPHP) {
            var Resposta = JSON.parse(dadosPHP);
            var Bloco = "<h3 class='text-center m-0'><strong class='text-center m-0'>" + Resposta + "</strong></h3>";

            $("#resultArtigo").html(Bloco);
        })

        .fail(function () {
            alert("DEU ERRADO O CADASTRO");
        })

    return false
}


function AdicionarArtigo(event) {
    event.preventDefault()
    var DadosForm = $('#frm_Artigo').serialize()
    console.log(DadosForm)

    $.ajax({
        method: 'GET',
        url: 'ControleArtigo-Adm.php?btn_AdicionarArtigo',
        data: DadosForm,
    })
        .done(function (dadosPHP) {
            var Resposta = JSON.parse(dadosPHP);
            var Bloco = "<h3 class='text-center m-0'><strong class='text-center m-0'>" + Resposta + "</strong></h3>";

            $("#resultArtigo").html(Bloco);
        })

        .fail(function () {
            alert("DEU ERRADO O CADASTRO");
        })

    return false
}


function ConsultarArtigo(event) {
    event.preventDefault()
    var DadosForm = $('#frm_Artigo2').serialize()
    console.log(DadosForm)

    $.ajax({
        method: 'GET',
        url: 'ControleArtigo-Adm.php?btn_ConsultarArtigo',
        data: DadosForm,

        beforeSend: function () {
            console.log("DAdos enviados")
        }
    })

        .done(function (dadosPHP) {
            document.getElementById("result").innerHTML = "";

            if (dadosPHP.trim() === '') {
                console.log("ARTIGO Não Encontrado");
            }

            console.log("PARTE ANTES DO DADOS PHP")
            var Artigo = JSON.parse(dadosPHP);
            console.log(Artigo)

            // CONSULTA EM Tabela
            var Tabela = '';
            Tabela += "<table class='table table-bordered table-striped table-dark ml-5'";

            Tabela += "<tr><th scope='col' class='text-center'>ID</th><th scope='col' class='text-center'>Título</th><th scope='col' class='text-center'>Artigo</th><th scope='col' class='text-center'>Autor</th><th scope='col' class='text-center'>Data de Publicação</th>"
            for (i = 0; i < Artigo.length; i++) {
                Tabela += "<tr>";
                Tabela += "<td class='text-center align-middle'>" + Artigo[i].ID_ARTIGO + "</td>";
                Tabela += "<td class='text-center align-middle'>" + Artigo[i].TITULO_ARTIGO + "</td>";
                Tabela += "<td class='text-center align-middle'>" + Artigo[i].ARTIGO + "</td>";
                Tabela += "<td class='text-center align-middle'>" + Artigo[i].AUTOR_ARTIGO + "</td>";
                Tabela += "<td class='text-center align-middle'>" + Artigo[i].DATA_PUBLICACAO + "</td>";
                Tabela += "</tr>"
            }

            $("#result").append(Tabela);
        })

        .fail(function () {
            alert("DEU ERRADO A CONSULTA");
        })

    return false;

}

function ListarArtigo(event) {
    document.getElementById("result").innerHTML = "";
    event.preventDefault()
    var DadosForm = $('#frm_Artigo2').serialize()
    console.log(DadosForm)

    $.ajax({
        method: 'GET',
        url: 'ControleArtigo-Adm.php?btn_ListarArtigo',
        data: DadosForm,

        beforeSend: function () {
            console.log("DAdos enviados")
        }
    })

        .done(function (dadosPHP) {
            var Artigo = JSON.parse(dadosPHP);
            console.log(Artigo)

            // CONSULTA EM Tabela
            var Tabela = '';
            Tabela += "<table class='table table-bordered table-striped table-dark ml-5'";

            Tabela += "<tr><th scope='col' class='text-center'>ID</th><th scope='col' class='text-center'>Título</th><th scope='col' class='text-center'>Artigo</th><th scope='col' class='text-center'>Autor</th><th scope='col' class='text-center'>Data de Publicação</th>"
            for (i = 0; i < Artigo.length; i++) {
                Tabela += "<tr>";
                Tabela += "<td class='text-center align-middle'>" + Artigo[i].ID_ARTIGO + "</td>";
                Tabela += "<td class='text-center align-middle'>" + Artigo[i].TITULO_ARTIGO + "</td>";
                Tabela += "<td class='text-center align-middle'>" + Artigo[i].ARTIGO + "</td>";
                Tabela += "<td class='text-center align-middle'>" + Artigo[i].AUTOR_ARTIGO + "</td>";
                Tabela += "<td class='text-center align-middle'>" + Artigo[i].DATA_PUBLICACAO + "</td>";
                Tabela += "</tr>"
            }

            $("#result").append(Tabela);
        })

        .fail(function () {
            alert("DEU ERRADO A CONSULTA");
        })

    return false;

}