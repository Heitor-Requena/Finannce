function CadastrarFeedBack(){
    console.log("CHAMOU");
    var dados = '';

    $.ajax({
        method: 'GET',
        url: 'ControleFeedBack-Cliente.php?btn_CadastrarFeedBack',
        data: dados,

        beforeSend: function () {
            console.log("DAdos enviados")
        }
    })

        .done(function (dadosPHP) {
            console.log("Depois do done");
            var feedBack = JSON.parse(dadosPHP);

            alert(feedBack);
        })

        .fail(function () {
            alert("Não foi possível enviar o FeedBack");
        })

    return false;
}

function ExcluirFeedBack(){
    console.log("CHAMOU");
    var dados = '';

    $.ajax({
        method: 'GET',
        url: 'ControleFeedBack-Cliente.php?btn_ExcluirFeedBack',
        data: dados,

        beforeSend: function () {
            console.log("DAdos enviados")
        }
    })

        .done(function (dadosPHP) {
            console.log("Depois do done");
            var feedBack = JSON.parse(dadosPHP);

            alert(feedBack);
        })

        .fail(function () {
            alert("Não foi possível enviar o FeedBack");
        })

    return false;
}

function ListarFeedBack(){
    console.log("CHAMOU");
    var dados = '';

    $.ajax({
        method: 'GET',
        url: 'ControleFeedBack-Cliente.php?btn_ListarFeedBack',
        data: dados,

        beforeSend: function () {
            console.log("DAdos enviados")
        }
    })

        .done(function (dadosPHP) {
            console.log("Depois do done");
            console.log(dadosPHP);
            var feedBack = JSON.parse(dadosPHP);
            var Tabela = "";

            Tabela += "<table>";
            Tabela += "<tr><th>Id_Feedback</th> <th>Nome Consultor</th> <th>Email Consultor</th> <th>Avaliação</th> <th>Nota</th> <th>Data de Envio</th></tr>";

            for (i = 0; i < feedBack.length; i++){
                Tabela += "<tr>";
                    Tabela += "<td>" + feedBack[i].ID_FEEDBACK     + "</td>";
                    Tabela += "<td>" + feedBack[i].NOME_CONSULTOR  + "</td>";
                    Tabela += "<td>" + feedBack[i].EMAIL_CONSULTOR + "</td>";
                    Tabela += "<td>" + feedBack[i].AVALIACAO       + "</td>";
                    Tabela += "<td>" + feedBack[i].NOTA_CONSULTOR  + "</td>";
                    Tabela += "<td>" + feedBack[i].DATA_INCLUSAO   + "</td>";
                Tabela += "</tr>";
            }

            Tabela += "</table>";

            $("#result").html(Tabela);
        })

        .fail(function () {
            alert("DEU ERRADO A CONSULTA");
        })

    return false;
}