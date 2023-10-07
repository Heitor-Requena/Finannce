function GraficoRosca(event){
    console.log("CHAMOU")
    var DadosForm = $("#frm_Grafico").serialize()
    console.log(DadosForm)

    $.ajax({
        method: 'GET',
        url: 'ControleGrafico-Cliente.php?GerarGraficoRosca',
        data: DadosForm,

        beforeSend: function () {
            console.log("DAdos enviados")
        }
    })

        .done(function (dadosPHP) {
            console.log("Depois do done");
            var GASTO = JSON.parse(dadosPHP);
            let campo = [["Gasto", "Valor"]];
            console.log(GASTO)

            for (i = 0; i < GASTO.length; i++){
                campo.push([GASTO[i].NOME_GASTO,  parseInt(GASTO[i].VALOR_GASTO)]);
            }

            console.log(campo)

            google.charts.load("current", {packages:["corechart"]});
            google.charts.setOnLoadCallback(drawChart);
            console.log("depois dos dois comando da api da google");

            function drawChart() {
                var data = google.visualization.arrayToDataTable(campo);

                var options = {
                title: 'Seus Gastos Mais Recentes',
                legend: 'Gastos e seus respectivos valores',
                pieSliceText: 'label',
                //backgroundColor: '#f1f8e9'
                pieHole: 0.4,
                };

                var chart = new google.visualization.PieChart(document.getElementById('GraficoRosca'));
                chart.draw(data, options);
            }
        })

        .fail(function () {
            alert("DEU ERRADO A CONSULTA");
        })

    return false;
}

function TabelaRosca(event){
    console.log("CHAMOU")
    var DadosForm = $("#frm_Grafico").serialize()
    console.log(DadosForm)

    $.ajax({
        method: 'GET',
        url: 'ControleGrafico-Cliente.php?GerarTabelaRosca',
        data: DadosForm,

        beforeSend: function () {
            console.log("DAdos enviados")
        }
    })

        .done(function (dadosPHP) {
            console.log("Depois do done");
            var GASTO = JSON.parse(dadosPHP);
            console.log(GASTO)

            var Tabela = "";
            Tabela += "<table class='col-12 text-center table table-dark table-striped'>";

            Tabela += "<tr> <th>Número</th> <th>Gasto</th> <th>Valor</th> </tr>";
            for (i = 0; i < GASTO.length; i++){
                Tabela += "<tr>"; 
                Tabela += "<td>" + GASTO[i].ID_GASTO + "</td>";
                Tabela += "<td>" + GASTO[i].NOME_GASTO + "</td>";
                Tabela += "<td>" + GASTO[i].VALOR_GASTO + "</td>";
                Tabela += "</tr>"
            }

            Tabela += "<table>";
            $("#TabelaGraficoRosca").html(Tabela);
        })

        .fail(function () {
            alert("DEU ERRADO A CONSULTA");
        })

    return false;
}

function AdicionarGasto(event) {
    event.preventDefault();
    var DadosForm = $('#frm_Grafico').serialize()
    console.log(DadosForm)

    $.ajax({
        method: 'GET',
        url: 'ControleGrafico-Cliente.php?btn_AdicionarGasto',
        data: DadosForm,
    })
        .done(function (dadosPHP) {
            var Resposta = JSON.parse(dadosPHP);
            console.log(Resposta);
            var msg = Resposta;
            alert(msg);
            GraficoRosca();
            TabelaRosca();
        })

        .fail(function () {
            alert("DEU ERRADO O CADASTRO");
        })

    return false
}

function ExcluirGasto(event) {
    event.preventDefault();
    var DadosForm = $('#frm_Grafico').serialize()

    $.ajax({
        method: 'GET',
        url: 'ControleGrafico-Cliente.php?btn_ExcluirGasto',
        data: DadosForm,
    })
        .done(function (dadosPHP) {
            var Resposta = JSON.parse(dadosPHP);
            var msg = Resposta;
            alert(msg);
            GraficoRosca();
            TabelaRosca();
        })

        .fail(function () {
            alert("DEU ERRADO O CADASTRO");
        })

    return false
}