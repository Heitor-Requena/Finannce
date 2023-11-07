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
            if (dadosPHP.trim() === "[]") {
                document.getElementById("result").innerHTML = "<h2>Nenhum feedback encontrado</h2>";
            }
            else {
                var feedBack = JSON.parse(dadosPHP);

                var Tabela = '';
                Tabela += "<div class='table-responsive'><table class='table table-bordered table-striped table-dark ml-5'";

                Tabela += "<tr><th scope='col' class='text-center'>ID Feedback</th><th scope='col' class='text-center'>Nome Cliente</th><th scope='col' class='text-center'>Email</th><th scope='col' class='text-center'>Avaliação</th><th scope='col' class='text-center'>Nota</th><th scope='col' class='text-center'>Data de Avaliação</th>"
                for (i = 0; i < feedBack.length; i++){
                    Tabela += "<tr>";
                    Tabela += "<td class='text-center align-middle'>" + feedBack[i].ID_FEEDBACK + "</td>";
                    Tabela += "<td class='text-center align-middle'>" + feedBack[i].NOME_CLIENTE + "</td>";
                    Tabela += "<td class='text-center align-middle'>" + feedBack[i].EMAIL_CLIENTE + "</td>";
                    Tabela += "<td class='text-center align-middle'>" + feedBack[i].AVALIACAO + "</td>";
                    Tabela += "<td class='text-center align-middle'>" + feedBack[i].NOTA_CONSULTOR + "</td>";
                    Tabela += "<td class='text-center align-middle'>" + feedBack[i].DATA_INCLUSAO + "</td>";  
                    Tabela += "</tr>"
                }
    
                $("#result").append(Tabela);
            }
        })

        .fail(function () {
            alert("DEU ERRADO A CONSULTA");
        })

    return false;
}