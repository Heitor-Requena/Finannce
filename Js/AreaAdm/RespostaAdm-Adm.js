// Cadastrar Adm
function CadAdm(event) {
    event.preventDefault();
    var DadosForm = $("#frm_CadAdm").serialize();
    console.log(DadosForm);

    $.ajax({
        method: 'GET',
        url: 'ControleAdm-Adm.php?btn_CadAdm',
        data: DadosForm
    })

        .done(function (dadosPHP) {
            var Resposta = JSON.parse(dadosPHP);
            var Bloco = "<h3 class='text-center m-0'><strong class='text-center m-0'>" + Resposta + "</strong></h3>";

            $("#result").html(Bloco);
        })

        .fail(function () {
            alert("falha")
        })

    return false;
}

// Consultar Adm
function ConsultarAdm(event) {
    event.preventDefault();
    var DadosForm = $('#frm_ConsAdm').serialize();
    console.log(DadosForm);

    $.ajax({
        method: 'GET',
        url: 'ControleAdm-Adm.php?btn_ConsAdm',
        data: DadosForm
    })

        .done(function (dadosPHP) {
            document.getElementById("result").innerHTML = "";

            if (dadosPHP.trim() === '') {
                console.log("Administrador Não Encontrado");
            }
            else {
                var Administradores = JSON.parse(dadosPHP);

                // CONSULTA EM Tabela
                var Tabela = '';
                Tabela += "<div class='table-responsive'><table class='table table-bordered table-striped table-dark ml-5'";

                Tabela += "<tr><th scope='col' class='text-center'>ID</th><th scope='col' class='text-center'>Nome</th><th scope='col' class='text-center'>Email</th><th scope='col' class='text-center'>CPF</th><th scope='col' class='text-center'>RG</th><th scope='col' class='text-center'>Data de Entrada</th>"
                for (i = 0; i < Administradores.length; i++) {
                    Tabela += "<tr>";
                    Tabela += "<td class='text-center'>" + Administradores[i].ID_ADM + "</td>";
                    Tabela += "<td class='text-center'>" + Administradores[i].NOME_ADM + "</td>";
                    Tabela += "<td class='text-center'>" + Administradores[i].EMAIL_ADM + "</td>";
                    Tabela += "<td class='text-center'>" + Administradores[i].CPF_ADM + "</td>";
                    Tabela += "<td class='text-center'>" + Administradores[i].RG_ADM + "</td>";
                    Tabela += "<td class='text-center'>" + Administradores[i].DATA_ENTRADA + "</td>";
                    Tabela += "</tr>"
                }

                $("#result").append(Tabela);
            }
        })

        .fail(function () {
            alert("falha");
        })

    return false;
}

// Listar Todos Adm
function ListarAdm(event) {
    event.preventDefault();
    var DadosForm = $('#frm_ConsAdm').serialize();
    console.log(DadosForm);

    $.ajax({
        method: 'GET',
        url: 'ControleAdm-Adm.php?btn_ListAdm',
        data: DadosForm
    })

        .done(function (dadosPHP) {
            document.getElementById("result").innerHTML = "";
            if (dadosPHP.trim() === '') {
                console.log("Administrador Não Encontrado");
            }
            else {
                var Administradores = JSON.parse(dadosPHP);

                // CONSULTA EM Tabela
                var Tabela = '';
                Tabela += "<div class='table-responsive'><table class='table table-bordered table-striped table-dark ml-5'";

                Tabela += "<tr><th scope='col' class='text-center'>ID</th><th scope='col' class='text-center'>Nome</th><th scope='col' class='text-center'>Email</th><th scope='col' class='text-center'>CPF</th><th scope='col' class='text-center'>RG</th><th scope='col' class='text-center'>Data de Entrada</th>"
                for (i = 0; i < Administradores.length; i++) {
                    Tabela += "<tr>";
                    Tabela += "<td class='text-center'>" + Administradores[i].ID_ADM + "</td>";
                    Tabela += "<td class='text-center'>" + Administradores[i].NOME_ADM + "</td>";
                    Tabela += "<td class='text-center'>" + Administradores[i].EMAIL_ADM + "</td>";
                    Tabela += "<td class='text-center'>" + Administradores[i].CPF_ADM + "</td>";
                    Tabela += "<td class='text-center'>" + Administradores[i].RG_ADM + "</td>";
                    Tabela += "<td class='text-center'>" + Administradores[i].DATA_ENTRADA + "</td>";
                    Tabela += "</tr>"
                }

                $("#result").append(Tabela);
            }
        })

        .fail(function () {
            alert("falha");
        })

    return false;

}

// Alterar Login Adm
function AltLogAdm(event) {
    event.preventDefault();
    var DadosForm = $("#frm_AltLogAdm").serialize();
    console.log(DadosForm);

    $.ajax({
        method: 'GET',
        url: 'ControleAdm-Adm.php?btn_AltLogAdm',
        data: DadosForm
    })

        .done(function (dadosPHP) {
            var Resposta = JSON.parse(dadosPHP);
            var Bloco = "<h3 class='text-center m-0'><strong class='text-center m-0'>" + Resposta + "</strong></h3>";

            $("#result").html(Bloco);
        })

        .fail(function () {
            alert("falha")
        })

    return false;
}

// Deletar Adm
function DelAdm(event) {
    event.preventDefault();
    var DadosForm = $("#frm_DelAdm").serialize();
    console.log(DadosForm);

    $.ajax({
        method: 'GET',
        url: 'ControleAdm-Adm.php?btn_DelAdm',
        data: DadosForm
    })

        .done(function (dadosPHP) {
            var Resposta = JSON.parse(dadosPHP);
            var Bloco = "<h3 class='text-center m-0'><strong class='text-center m-0'>" + Resposta + "</strong></h3>";

            $("#result").html(Bloco);
        })

        .fail(function () {
            alert("falha")
        })

    return false;
}