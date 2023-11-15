function CarregarArtigos(event){
    event.preventDefault();
    console.log("CHAMOU");
    var dados = "";

    $.ajax({
        method: "GET",
        url: "ControleArtigo-Cliente.php?CarregarArtigos",
        data: dados,

        beforeSend: function () {
        console.log("DAdos enviados");
        },
    })

        .done(function (dadosPHP) {
        console.log(dadosPHP);
        var Artigos = JSON.parse(dadosPHP);

        var Bloco = "";

        for (i = 0; i < Artigos.length; i++) {
            Bloco += "<div class='row";
                Bloco += "<div class='col-12'>";
                    Bloco += "<h2 class='text-center'>" + Artigos[i].TITULO_ARTIGO + "<h2>";
                Bloco += "</div>";
            Bloco += "</div>";

                
            Bloco += "<div class='row'>";
                Bloco += "<div class='col-12 text-justify'>";
                    Bloco += "<p class='text-justify'>" + Artigos[i].ARTIGO + "</p>";
                Bloco += "</div>";
            Bloco += "</div>";

            Bloco += "<div class='row'>";
                Bloco += "<div class='col-12'>";
                    Bloco += "Data Publicação: " + Artigos[i].DATA_PUBLICACAO;
                    Bloco += " | Escrito por " + Artigos[i].AUTOR_ARTIGO;
                Bloco += "</div>";
            Bloco += "</div>";
            Bloco += "<br><hr><br><br>";
        }

        $("#Artigos").html(Bloco);
        })

        .fail(function () {
            alert("DEU ERRADO A CONSULTA");
        });

    return false;
}

function ProcurarArtigo(event) {
    event.preventDefault();
    document.querySelector("#Titulo")
    console.log("CHAMOU");
    var TituloArtigo = $("#Titulo").val();

    $.ajax({
    method: "GET",
    url: "ControleArtigo-Cliente.php",
    data: { Titulo: TituloArtigo, btn_PesquisaTitulo: true },
    beforeSend: function () {
        console.log("Dados enviados");
    }

    })

    .done(function (dadosPHP) {
        console.log("Depois do done");
        console.log(dadosPHP);
        var Artigos = JSON.parse(dadosPHP);
        var Bloco = "";

        for (i = 0; i < Artigos.length; i++) {
            console.log('DENTRO DO LOOP');
            Bloco += "<div class='row";
                Bloco += "<div class='col-12'>";
                    Bloco += "<h2 class='text-center'>" + Artigos[i].TITULO_ARTIGO + "<h2>";
                Bloco += "</div>";
            Bloco += "</div>";

                
            Bloco += "<div class='row'>";
                Bloco += "<div class='col-12 text-justify'>";
                    Bloco += "<p class='text-justify'>" + Artigos[i].ARTIGO + "</p>";
                Bloco += "</div>";
            Bloco += "</div>";

            Bloco += "<div class='row'>";
                Bloco += "<div class='col-12'>";
                    Bloco += "Data Publicação: " + Artigos[i].DATA_PUBLICACAO;
                    Bloco += " | Escrito por " + Artigos[i].AUTOR_ARTIGO;
                Bloco += "</div>";
            Bloco += "</div>";
            Bloco += "<br><br><br>";
        }
        console.log('SAIU DO LOOP');

        $("#Artigos").html(Bloco);
    }) 

    .fail(function () {
        alert("DEU ERRADO A CONSULTA");
    });

    return false;
}
