function CadastrarFeedBack(event){
    event.preventDefault();
    console.log("CHAMOU");
    var DadosForm = $("#frm_feedback").serialize();

    $.ajax({
        method: 'GET',
        url: 'ControleFeedBack-Cliente.php?btn_CadastrarFeedBack',
        data: DadosForm,
    })

        .done(function (dadosPHP) {
            console.log("Depois do done");
            var Resposta = JSON.parse(dadosPHP);
            var msg = Resposta;
            alert(msg);
        })

        .fail(function () {
            alert("Não foi possível enviar o FeedBack");
        })

    return false
}

function ExcluirFeedBack(event){
    event.preventDefault();
    console.log("CHAMOU");
    var DadosForm = $("#frm_feedback").serialize();

    $.ajax({
        method: 'GET',
        url: 'ControleFeedBack-Cliente.php?btn_ExcluirFeedBack',
        data: DadosForm,
    })

        .done(function (dadosPHP) {
            console.log("Depois do done");
            var Resposta = JSON.parse(dadosPHP);
            var msg = Resposta;
            alert(msg);
        })

        .fail(function () {
            alert("Não foi possível enviar o FeedBack");
        })

    return false;
}

function ListarFeedBack(event){
    event.preventDefault();
    console.log("CHAMOU");
    var DadosForm = "";

    $.ajax({
        method: 'GET',
        url: 'ControleFeedBack-Cliente.php?btn_ListarFeedBack',
        data: DadosForm,
    })

    .done(function (dadosPHP) {
        console.log(dadosPHP);
        var feedBack = JSON.parse(dadosPHP);
        var Tabela = "";

        Tabela += "<div class='table-responsive m-5'><table class='table table-bordered table-striped table-dark ml-5'";
        Tabela += "<tr><th  scope='col' class='text-center'>Id_Feedback</th> <th  scope='col' class='text-center'>Nome Consultor</th> <th  scope='col' class='text-center'>Email Consultor</th> <th  scope='col' class='text-center'>Avaliação</th> <th  scope='col' class='text-center'>Nota</th> <th  scope='col' class='text-center'>Data de Envio</th></tr>";

        for (i = 0; i < feedBack.length; i++){
            Tabela += "<tr>";
                Tabela += "<td  class='text-center align-middle'>" + feedBack[i].ID_FEEDBACK     + "</td>";
                Tabela += "<td  class='text-center align-middle'>" + feedBack[i].NOME_CONSULTOR  + "</td>";
                Tabela += "<td  class='text-center align-middle'>" + feedBack[i].EMAIL_CONSULTOR + "</td>";
                Tabela += "<td  class='text-center align-middle'>" + feedBack[i].AVALIACAO       + "</td>";
                Tabela += "<td  class='text-center align-middle'>" + feedBack[i].NOTA_CONSULTOR  + "</td>";
                Tabela += "<td  class='text-center align-middle'>" + feedBack[i].DATA_INCLUSAO   + "</td>";
            Tabela += "</tr>";
        }

        Tabela += "</table>";

        $("#FeedBack").html(Tabela);
    })

    .fail(function () {
        alert("DEU ERRADO A CONSULTA");
    })

    return false;
}