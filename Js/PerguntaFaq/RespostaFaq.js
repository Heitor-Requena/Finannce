function EnviarPergunta(event) {
    event.preventDefault();
    console.log("BOTAO TA FUNCIONANDO");
    var DadosForm = $("#frm_UsuarioPergunta").serialize();
    console.log(DadosForm);

    $.ajax({
        method: 'GET',
        url: '../Php/PerguntaFaq/ControleFaq.php?btn_EnviarPergunta',
        data: DadosForm
    })

        .done(function (dadosPHP) {
            console.log(JSON.parse(dadosPHP));
            var Resposta = JSON.parse(dadosPHP);
            alert(Resposta);
        })

        .fail(function () {
            alert("falha");
        })

    return false;
}

function CarregarPerguntas(event) {
    console.log("TA ACIONANDO A FUNCAO");
    var DadosForm = $("#frm_UsuarioPergunta").serialize();
    console.log("OLHA");

    $.ajax({
        method: 'GET',
        url: '../Php/PerguntaFaq/ControleFaq.php?CarregarPerguntas',
        data: DadosForm
    })

        .done(function (dadosPHP) {
            console.log("OLHA2");
            var Resposta = JSON.parse(dadosPHP);
            console.log(Resposta)
            var Bloco = "";

            for (i = 0; i < Resposta.length; i++) {
                Bloco += "<div><h3>" + Resposta[i].NOME_USUARIO + " ";
                Bloco += "| " + Resposta[i].EMAIL_USUARIO + "</h3>";
                Bloco += "<p><strong>Pergunta:</strong></p>";
                Bloco += "<p class=''>" + Resposta[i].PERGUNTA + "</p>";
                Bloco += "<p class=''>R: " + Resposta[i].RESPOSTA + "</p><div>";
            }

            $("#resposta-perguntas").html(Bloco);
        })

        .fail(function () {
            alert("falha");
        })

    return false;
}

