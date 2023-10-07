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
            let campo = [["Gasto", "valor"]];
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

                var chart = new google.visualization.PieChart(document.getElementById('graficoRosca'));
                chart.draw(data, options);
            }
        })

        .fail(function () {
            alert("DEU ERRADO A CONSULTA");
        })

    return false;


}


