function GraficoRosca(event){
    document.getElementById("GraficoColuna").innerHTML = "";
    document.getElementById("TabelaGraficoColuna").innerHTML = "";
    document.getElementById("TabelaGraficoRosca").innerHTML = "";
    console.log("CHAMOU");
    var DadosForm = $("#frm_Grafico2").serialize();
    console.log(DadosForm);

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
    document.getElementById("GraficoColuna").innerHTML = "";
    document.getElementById("TabelaGraficoColuna").innerHTML = "";
    document.getElementById("GraficoRosca").innerHTML = "";
    console.log("CHAMOU")
    var DadosForm = $("#frm_Grafico2").serialize()
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

            Tabela += "</table>";
            $("#TabelaGraficoRosca").html(Tabela);
        })

        .fail(function () {
            alert("DEU ERRADO A CONSULTA");
        })

    return false;
}

function AdicionarGasto(event) {
    event.preventDefault();
    var DadosForm = $("#frm_Grafico2").serialize();

    $.ajax({
        method: 'GET',
        url: 'ControleGrafico-Cliente.php?btn_AdicionarGasto',
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

function ExcluirGasto(event) {
    event.preventDefault();
    var DadosForm = $('#frm_Grafico2').serialize();

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

function GraficoColuna(event){
    document.getElementById("TabelaGraficoRosca").innerHTML = "";
    document.getElementById("TabelaGraficoColuna").innerHTML = "";
    document.getElementById("GraficoRosca").innerHTML = "";
    console.log("CHAMOU")
    var DadosForm = $("#frm_Grafico2").serialize()

    $.ajax({
        method: 'GET',
        url: 'ControleGrafico-Cliente.php?GerarGraficoColuna',
        data: DadosForm,

        beforeSend: function () {
            console.log("DAdos enviados")
        }
    })

        .done(function (dadosPHP) {
            var GASTO = JSON.parse(dadosPHP);
            let campo = [['Ano', 'Valor', { role: 'annotation' }]];
            let cores = ['#2F4F4F', '#00FA9A', '#00FF7F	', '#98FB98', '#90EE90', '#8FBC8F', '#3CB371', '#2E8B57', '#006400', '#008000', '#228B22', '#32CD32', '#00FF00', '#7CFC00', '	#7FFF00', '#ADFF2F', '#9ACD32', '#6B8E23', '#556B2F', '#808000', '#BDB76B', '#DAA520', '#B8860B', '#BC8F8F'];

            //google.charts.load('current', {'packages':['bar']});
            google.charts.load("current", {packages:["corechart"]});
            google.charts.setOnLoadCallback(drawChart);

            for (i = 0; i < GASTO.length; i++){
                campo.push([GASTO[i].DATA_INCLUSAO, parseFloat(GASTO[i].VALOR_GASTO),GASTO[i].NOME_GASTO]);
            }

            console.log(campo)

            function drawChart() {
                var data = google.visualization.arrayToDataTable(campo);
                
                var view = new google.visualization.DataView(data);
                view.setColumns([0, 1,
                    { calc: "stringify",
                        sourceColumn: 1,
                        type: "string",
                        role: "annotation" },
                    2]);

                var options = {
                    title: "Todos os seus Gastos",
                    subtitle: 'Periodo de login até o dia atual',
                    width: 900,
                    height: 500,
                    bar: {groupWidth: "70%"},
                    legend: { position: 'top', maxLines: 3 },                
                };

                var chart = new google.visualization.BarChart(document.getElementById("GraficoColuna"));
                chart.draw(view, options);
            }
        })

        .fail(function () {
            alert("DEU ERRADO A CONSULTA");
        })

    return false;
}

function TabelaColuna(event){
    document.getElementById("TabelaGraficoRosca").innerHTML = "";
    document.getElementById("TabelaGraficoColuna").innerHTML = "";
    document.getElementById("GraficoColuna").innerHTML = "";
    var DadosForm = $("#frm_Grafico").serialize()

    $.ajax({
        method: 'GET',
        url: 'ControleGrafico-Cliente.php?GerarTabelaColuna',
        data: DadosForm,

        beforeSend: function () {
            console.log("DAdos enviados tabela")
        }
    })

        .done(function (dadosPHP) {
            var GASTO = JSON.parse(dadosPHP);

            var Tabela = "";
            Tabela += "<table class='col-12 text-center table table-dark table-striped'>";

            Tabela += "<tr> <th>#</th> <th>Gasto</th> <th>Valor</th> <th>Data Do Gasto</th></tr>";
            for (i = 0; i < GASTO.length; i++){
                Tabela += "<tr>";
                Tabela += "<td>" + i + "</td>";
                Tabela += "<td>" + GASTO[i].NOME_GASTO + "</td>";
                Tabela += "<td>" + GASTO[i].VALOR_GASTO + "</td>";
                Tabela += "<td>" + GASTO[i].DATA_INCLUSAO + "</td>";
                Tabela += "</tr>"
            }

            Tabela += "</table>";
            $("#TabelaGraficoColuna").html(Tabela);
        })

        .fail(function () {
            alert("DEU ERRADO A CONSULTA");
        })

    return false;
}