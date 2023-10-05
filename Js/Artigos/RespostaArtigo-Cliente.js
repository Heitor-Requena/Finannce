function CarregarArtigos(event) {
    console.log("TA ACIONANDO A FUNCAO");

    $.ajax({
        method: 'GET',
        url: '../../Php/AreaCliente/ControleArtigo-Cliente.php?CarregarArtigos',
    })

        .done(function (dadosPHP) {
            console.log("OLHA2");
            var Artigo = JSON.parse(dadosPHP);
            console.log(Artigo);
            var Bloco = "<div class='container'>";

            for (i = 0; i < Artigo.length; i++) {

                Bloco += "<div class='row justify-content-md-center artigo'>";
                Bloco += "<div class='col-md-8 '>";
                Bloco += "<h2 class='text-center'>" + Artigo[i].TITULO_ARTIGO + "</h2>";
                Bloco += "<p class='text-justify'>" + Artigo[i].ARTIGO + "</p>";
                Bloco += "<p class='text-end fw-bolder'>" + Artigo[i].AUTOR_ARTIGO + " | " + Artigo[i].DATA_PUBLICACAO + "</p>";
                Bloco += "</div>";
                Bloco += "</div>";

            }

            Bloco += "</div>";

            $("#result").html(Bloco);
        })

        .fail(function () {
            alert("falha");
        })

    return false;
}
