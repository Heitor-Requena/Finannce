function ConsultoresAnuncio(){
    console.log("CHAMOU");
    var dados = '';

    $.ajax({
        method: 'GET',
        url: 'ControleConsultor-Cliente.php?ConsultorAnuncio',
        data: dados,

        beforeSend: function () {
            console.log("DAdos enviados")
        }
    })

        .done(function (dadosPHP) {
            console.log("Depois do done");
            console.log(dadosPHP);
            var Consultores = JSON.parse(dadosPHP);

            var Bloco = "";

            for (i = 0; i < Consultores.length; i++){
                Bloco += "<div class=''>";
                    Bloco += "Imagem";
                    Bloco += "Nome";
                    Bloco += "Email";
                    Bloco += "";
                    Bloco += "";
                    Bloco += "";
                Bloco += "</div>";
            }

            $("#ConsultoresAnunciantes").html(Bloco);
        })

        .fail(function () {
            alert("DEU ERRADO A CONSULTA");
        })

    return false;
}

function TodosConsultores(){
    console.log("CHAMOU");
    var dados = '';

    $.ajax({
        method: 'GET',
        url: 'ControleConsultor-Cliente.php?TodosConsultores',
        data: dados,

        beforeSend: function () {
            console.log("DAdos enviados")
        }
    })

        .done(function (dadosPHP) {
            console.log("Depois do done");
            console.log(dadosPHP);
            var Consultores = JSON.parse(dadosPHP);

            var Bloco = "";

            for (i = 0; i < Consultores.length; i++){
                Bloco += "<div class=''>";
                    Bloco += "";
                    Bloco += "";
                    Bloco += "";
                    Bloco += "";
                    Bloco += "";
                    Bloco += "";
                Bloco += "</div>";

            }

            $("#Consulotes-resposta").html(Bloco);
        })

        .fail(function () {
            alert("DEU ERRADO A CONSULTA");
        })

    return false;
}

function ConsultorPesquisa(){
    console.log("CHAMOU");
    var dados = '';

    $.ajax({
        method: 'GET',
        url: 'ControleConsultor-Cliente.php?btn_ConsultorNome',
        data: dados,

        beforeSend: function () {
            console.log("DAdos enviados")
        }
    })

        .done(function (dadosPHP) {
            console.log("Depois do done");
            console.log(dadosPHP);
            var Consultores = JSON.parse(dadosPHP);

            var Bloco = "";

            for (i = 0; i < Consultores.length; i++){
                Bloco += "<div>";
                    Bloco += "";
                    Bloco += "";
                    Bloco += "";
                    Bloco += "";
                    Bloco += "";
                    Bloco += "";
                Bloco += "</div>";
            }

            $("#Consulotes-resposta").html(Bloco);
        })

        .fail(function () {
            alert("DEU ERRADO A CONSULTA");
        })

    return false;
}