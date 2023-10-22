function FeedBack(){
    console.log("CHAMOU");
    var dados = '';

    $.ajax({
        method: 'GET',
        url: '.php?',
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
            
            }

            $("#result").html(Bloco);
        })

        .fail(function () {
            alert("DEU ERRADO A CONSULTA");
        })

    return false;
}