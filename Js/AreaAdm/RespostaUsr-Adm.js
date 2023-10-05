// Consultar Usuário
function ConsultarUsr(event) {
    event.preventDefault();
    var DadosForm = $('#frm_ConListUsr').serialize();
    console.log(DadosForm);

    $.ajax({
        method: 'GET',
        url: '../AreaAdm/ControleUsr-Adm.php?btn_ConsultarUsr',
        data: DadosForm
    })

        .done(function (dadosPHP) {
            document.getElementById("result").innerHTML = "";

            if (dadosPHP.trim() === "") {
                console.log("Usuário Não Encontrado");
            }
            else {
                var Usuarios = JSON.parse(dadosPHP);

                // CONSULTA EM Tabela
                var Tabela = '';
                Tabela += "<table class='table table-bordered table-striped table-dark table-striped ml-5 table-sm'";

                Tabela += "<tr><th scope='col' class='text-center'>ID</th><th scope='col' class='text-center'>Nome</th><th scope='col' class='text-center'>Email</th><th scope='col' class='text-center'>Telefone</th><th scope='col' class='text-center'>Data de Entrada</th>"
                for (i = 0; i < Usuarios.length; i++) {
                    Tabela += "<tr>";
                    Tabela += "<td class='text-center'>" + Usuarios[i].ID_CLIENTE + "</td>";
                    Tabela += "<td class='text-center'>" + Usuarios[i].NOME_CLIENTE + "</td>";
                    Tabela += "<td class='text-center'>" + Usuarios[i].EMAIL_CLIENTE + "</td>";
                    Tabela += "<td class='text-center'>" + Usuarios[i].FONE_CLIENTE + "</td>";
                    Tabela += "<td class='text-center'>" + Usuarios[i].DATA_ENTRADA + "</td>";
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

// Listar Todos Usuários
function ListarUsr(event) {
    event.preventDefault();
    var DadosForm = $("#frm_ConListUsr").serialize();
    console.log(DadosForm);

    $.ajax({
        method: 'GET',
        url: '../AreaAdm/ControleUsr-Adm.php?btn_ListarUsr',
        data: DadosForm
    })

        .done(function (dadosPHP) {
            document.getElementById("result").innerHTML = "";
            if (dadosPHP.trim() === "") {
                console.log("Nenhum Usuário Encontrado");
            }
            else {
                var Usuarios = JSON.parse(dadosPHP);

                // CONSULTA EM Tabela
                var Tabela = '';
                Tabela += "<table class='table table-bordered table-striped table-dark table-striped ml-5 table-sm'";

                Tabela += "<tr><th scope='col' class='text-center'>ID</th><th scope='col' class='text-center'>Nome</th><th scope='col' class='text-center'>Email</th><th scope='col' class='text-center'>Telefone</th><th scope='col' class='text-center'>Data de Entrada</th>"
                for (i = 0; i < Usuarios.length; i++) {
                    Tabela += "<tr>";
                    Tabela += "<td class='text-center'>" + Usuarios[i].ID_CLIENTE + "</td>";
                    Tabela += "<td class='text-center'>" + Usuarios[i].NOME_CLIENTE + "</td>";
                    Tabela += "<td class='text-center'>" + Usuarios[i].EMAIL_CLIENTE + "</td>";
                    Tabela += "<td class='text-center'>" + Usuarios[i].FONE_CLIENTE + "</td>";
                    Tabela += "<td class='text-center'>" + Usuarios[i].DATA_ENTRADA + "</td>";
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

// Alterar Login
function AltLogUsr(event) {
    event.preventDefault();
    var DadosForm = $("#frm_AltUsr").serialize();
    console.log(DadosForm);

    $.ajax({
        method: 'GET',
        url: '../AreaAdm/ControleUsr-Adm.php?btn_AltLogUsr',
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

// Deletar Usr
function DelUsr(event) {
    event.preventDefault();
    var DadosForm = $("#frm_DelUsr").serialize();
    console.log(DadosForm);

    $.ajax({
        method: 'GET',
        url: '../AreaAdm/ControleUsr-Adm.php?btn_DeletarUsr',
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

