function buscaCep() {
    let cep = document.getElementById("CEP").value;
    console.log(cep);

    if (cep !== "") {
        let url = "https://brasilapi.com.br/api/cep/v1/" + cep;

        fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error("CEP inválido")
                }
                return response.json();
            })
            .then(data => {
                document.getElementById("Rua").value = data.street;
                document.getElementById("Bairro").value = data.neighborhood;
                document.getElementById("Cidade").value = data.city;
                document.getElementById("Estado").value = data.state;
            })
            .catch(error => {
                alert(error.message);
            });
    }
}


document.addEventListener("DOMContentLoaded", function () {
    let Cep = document.getElementById("CEP");
    Cep.addEventListener("blur", buscaCep);
});


function CarregarDadosForm(){
    console.log("CHAMOU");
    var DadosForm = $("#frm_InfopessDados").serialize();

    $.ajax({
        method: "GET",
        url: "ControleInfopess-Cliente.php?CarregarDados",
        data: DadosForm,
        beforeSend: function () {
        console.log("Dados enviados");
        },
    })

    .done(function (dadosPHP) {
        console.log("Depois do done");
        console.log(dadosPHP);
        var Dados = JSON.parse(dadosPHP);
        
        document.getElementById("Nome").value        = Dados[0].NOME_CLIENTE;
        document.getElementById("Email").value       = Dados[0].EMAIL_CLIENTE;
        document.getElementById("CPF").value         = Dados[0].CPF_CLIENTE;
        document.getElementById("RG").value          = Dados[0].RG_CLIENTE;
        document.getElementById("Nasc").value        = Dados[0].DTA_NASC_CLIENTE;
        document.getElementById("CEP").value         = Dados[0].CEP_CLIENTE;
        document.getElementById("Rua").value         = Dados[0].RUA_CLIENTE;
        document.getElementById("Bairro").value      = Dados[0].BAIRRO_CLIENTE;
        document.getElementById("Numero").value      = Dados[0].NUMERO_CASA_CLIENTE;
        document.getElementById("Complemento").value = Dados[0].COMPLEMENTO_CLIENTE;
        document.getElementById("Cidade").value      = Dados[0].CIDADE_CLIENTE;
        document.getElementById("Estado").value      = Dados[0].ESTADO_CLIENTE;
    })

    .fail(function() {
        alert("DEU ERRADO A CONSULTA");
    })

    return false;
}


function SalvarDados(){
    console.log("CHAMOU");
    var DadosForm = $("#frm_InfopessDados").serialize();

    $.ajax({
        method: "GET",
        url: "ControleInfopess-Cliente.php?Salvar",
        data: DadosForm,
        beforeSend: function () {
        console.log("Dados enviados");
        },
    })

    .done(function (dadosPHP) {
        console.log("Depois do done");
        console.log(dadosPHP);
        var Dados = JSON.parse(dadosPHP);
        var Bloco = "<h3 class='text-center m-0'><strong class='text-center m-0'>" + Dados + "</strong></h3>";

        $("#result").html(Bloco);
        
        alert(Dados);
    })

    .fail(function() {
        alert("DEU ERRADO A CONSULTA");
    })

    return false;
}
