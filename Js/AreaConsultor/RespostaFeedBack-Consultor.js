function FeedBack(){
    console.log("CHAMOU");
    var dados = '';

    $.ajax({
        method: 'GET',
        url: 'ControleFeedBack-Consultor.php?btn_FeedBack',
        data: dados,

        beforeSend: function () {
            console.log("DAdos enviados")
        }
    })

        .done(function (dadosPHP) {
            console.log("Depois do done");
            console.log(dadosPHP);
            var feedBack = JSON.parse(dadosPHP);

            var Bloco = "";

            for (i = 0; i < feedBack.length; i++){
                Bloco += "<p><strong>ID_FEEDBACK: </strong>" + feedBack[i].ID_FEEDBACK + "</p><br>";
                Bloco += "<p><strong>Nome CLiente: </strong>" + feedBack[i].NOME_CLIENTE + "</p><br>";
                Bloco += "<p><strong>Email Cliente: </strong>" + feedBack[i].EMAIL_CLIENTE + "</p><br>";
                Bloco += "<p><strong>Avaliação: </strong>" + feedBack[i].AVALIACAO + "</p><br>";
                Bloco += "<p><strong>Nota: </strong>" + feedBack[i].NOTA_CONSULTOR + "</p><br>";
                Bloco += "<p><strong>Data inclusão: </strong>" + feedBack[i].DATA_INCLUSAO + "</p><br>";                
            }

            $("#result").html(Bloco);
        })

        .fail(function () {
            alert("DEU ERRADO A CONSULTA");
        })

    return false;
}