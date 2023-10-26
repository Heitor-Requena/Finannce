// Consultar Consultor
function ConsultarCon(event) {
    event.preventDefault();
    var DadosForm = $('#frm_ConListCon').serialize();
    console.log(DadosForm);

    $.ajax({
        method: 'GET',
        url: 'ControleCon-Adm.php?btn_ConsultarCon',
        data: DadosForm
    })

        .done(function (dadosPHP) {
            document.getElementById("result").innerHTML = "";
            document.getElementById("tableCon").innerHTML = "";
            if (dadosPHP.trim() === "") {
                console.log("Resposta vazia do servidor.");
            }
            else {
                var Consultores = JSON.parse(dadosPHP);

                // CONSULTA EM Tabela
                var Tabela = '';
                Tabela += "<div class='table-responsive'><table class='table table-bordered table-striped table-dark ml-x'";

                Tabela += "<tr><th scope='col' class='text-center'>ID</th><th scope='col' class='text-center'>Nome</th><th scope='col' class='text-center'>CPF</th><th scope='col' class='text-center'>Email</th><th scope='col' class='text-center'>Telefone</th><th scope='col' class='text-center'>Data de Cadastro</th><th scope='col' class='text-center'>Status</th>"
                for (i = 0; i < Consultores.length; i++) {
                    Tabela += "<tr>";
                    Tabela += "<td class='text-center align-middle'>" + Consultores[i].ID_CONSULTOR + "</td>";
                    Tabela += "<td class='text-center align-middle'>" + Consultores[i].NOME_CONSULTOR + "</td>";
                    Tabela += "<td class='text-center align-middle'>" + Consultores[i].CPF_CONSULTOR + "</td>";
                    Tabela += "<td class='text-center align-middle'>" + Consultores[i].EMAIL_CONSULTOR + "</td>";
                    Tabela += "<td class='text-center align-middle'>" + Consultores[i].FONE_CONSULTOR + "</td>";
                    Tabela += "<td class='text-center align-middle'>" + Consultores[i].DATA_ENTRADA + "</td>";
                    Tabela += "<td class='text-center align-middle'>" + Consultores[i].STATUS_CONSULTOR + "</td>";
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

// Listar Todos Consultores
function ListarCon(event) {
    event.preventDefault();
    var DadosForm = $('#frm_ConListCon').serialize();
    console.log(DadosForm);

    $.ajax({
        method: 'GET',
        url: 'ControleCon-Adm.php?btn_ListarCon',
        data: DadosForm
    })

        .done(function (dadosPHP) {
            document.getElementById("result").innerHTML = "";
            document.getElementById("tableCon").innerHTML = "";
            if (dadosPHP.trim() === "") {
                console.log("Resposta vazia do servidor.");
            }
            else {
                var Consultores = JSON.parse(dadosPHP);

                // CONSULTA EM Tabela
                var Tabela = '';
                Tabela += "<div class='table-responsive'><table class='table table-bordered table-striped table-dark ml-5'";

                Tabela += "<tr><th scope='col' class='text-center'>ID</th><th scope='col' class='text-center'>Nome</th><th scope='col' class='text-center'>CPF</th><th scope='col' class='text-center'>Email</th><th scope='col' class='text-center'>Telefone</th><th scope='col' class='text-center'>Data de Cadastro</th><th scope='col' class='text-center'>Status</th>"
                for (i = 0; i < Consultores.length; i++) {
                    Tabela += "<tr>";
                    Tabela += "<td class='text-center align-middle'>" + Consultores[i].ID_CONSULTOR + "</td>";
                    Tabela += "<td class='text-center align-middle'>" + Consultores[i].NOME_CONSULTOR + "</td>";
                    Tabela += "<td class='text-center align-middle'>" + Consultores[i].CPF_CONSULTOR + "</td>";
                    Tabela += "<td class='text-center align-middle'>" + Consultores[i].EMAIL_CONSULTOR + "</td>";
                    Tabela += "<td class='text-center align-middle'>" + Consultores[i].FONE_CONSULTOR + "</td>";
                    Tabela += "<td class='text-center align-middle'>" + Consultores[i].DATA_ENTRADA + "</td>";
                    Tabela += "<td class='text-center align-middle'>" + Consultores[i].STATUS_CONSULTOR + "</td>";
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

// Listar Consltores Ativados
function ConsultoresAtivados(event) {
    event.preventDefault();
    var DadosForm = $('#frm_ConListCon').serialize();
    console.log(DadosForm);

    $.ajax({
        method: 'GET',
        url: 'ControleCon-Adm.php?btn_ConsultoresAtivados',
        data: DadosForm
    })

        .done(function (dadosPHP) {
            document.querySelector("#infoCon").setAttribute("class", "");
            document.querySelector("#infoCon").innerHTML = "";
            document.getElementById("result").innerHTML = "";
            document.getElementById("tableCon").innerHTML = "";
            if (dadosPHP.trim() === "") {
                console.log("Resposta vazia do servidor.");
            }
            else {
                var Consultores = JSON.parse(dadosPHP);

                // CONSULTA EM Tabela
                var Tabela = '';
                Tabela += "<div class='table-responsive'><table class='table table-bordered table-striped table-dark";

                Tabela += "<tr><th scope='col' class='text-center'></th><th scope='col' class='text-center'>ID</th><th scope='col' class='text-center'>Nome</th><th scope='col' class='text-center'>CPF</th><th scope='col' class='text-center'>Email</th><th scope='col' class='text-center'>Telefone</th><th scope='col' class='text-center'>Data de Cadastro</th><th scope='col' class='text-center'>Status</th><th scope='col' class='text-center'></th>"
                for (i = 0; i < Consultores.length; i++) {
                    Tabela += "<tr>";
                    Tabela += "<td class='text-center align-middle'>" + Consultores[i].ID_CONSULTOR + "</td>";
                    Tabela += "<td class='text-center align-middle'>" + Consultores[i].NOME_CONSULTOR + "</td>";
                    Tabela += "<td class='text-center align-middle'>" + Consultores[i].CPF_CONSULTOR + "</td>";
                    Tabela += "<td class='text-center align-middle'>" + Consultores[i].EMAIL_CONSULTOR + "</td>";
                    Tabela += "<td class='text-center align-middle'>" + Consultores[i].FONE_CONSULTOR + "</td>";
                    Tabela += "<td class='text-center align-middle'>" + Consultores[i].DATA_ENTRADA + "</td>";
                    Tabela += "<td class='text-center align-middle'>" + Consultores[i].STATUS_CONSULTOR + "</td>";
                    Tabela += "<td class='text-center align-middle'><form action='ControleCon-Adm.php' method='get' id='frm_DestvCon'> <input style='display: none' type='number' name='IdCon' id='IdCon' class='form-control m-2' value=" + Consultores[i].ID_CONSULTOR + "><input type='submit' id='btn_DesativarConsultor' name='btn_DesativarConsultor' class='iframe-btn btn m-3 btn-outline-light' value='Desativar'></form></td>";
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

// Listar Consultores Desativados
function ConsultoresDesativados(event) {
    event.preventDefault();
    var DadosForm = $('#frm_ConListCon').serialize();
    console.log(DadosForm);

    $.ajax({
        method: 'GET',
        url: 'ControleCon-Adm.php?btn_ConsultoresDesativados',
        data: DadosForm
    })

        .done(function (dadosPHP) {
            document.getElementById("result").innerHTML = "";
            document.getElementById("tableCon").innerHTML = "";
            if (dadosPHP.trim() === "") {
                console.log("Resposta vazia do servidor.");
            }
            else {
                var Consultores = JSON.parse(dadosPHP);

                // CONSULTA EM Tabela
                var Tabela = '';
                Tabela += "<div class='table-responsive'><table class='table table-bordered table-striped table-dark ml-5'";

                Tabela += "<tr><th scope='col' class='text-center'>ID</th><th scope='col' class='text-center'>Nome</th><th scope='col' class='text-center'>CPF</th><th scope='col' class='text-center'>Email</th><th scope='col' class='text-center'>Telefone</th><th scope='col' class='text-center'>Data de Cadastro</th><th scope='col' class='text-center'>Status</th><th scope='col' class='text-center'></th>"
                for (i = 0; i < Consultores.length; i++) {
                    Tabela += "<tr>";
                    Tabela += "<td class='text-center align-middle'>" + Consultores[i].ID_CONSULTOR + "</td>";
                    Tabela += "<td class='text-center align-middle'>" + Consultores[i].NOME_CONSULTOR + "</td>";
                    Tabela += "<td class='text-center align-middle'>" + Consultores[i].CPF_CONSULTOR + "</td>";
                    Tabela += "<td class='text-center align-middle'>" + Consultores[i].EMAIL_CONSULTOR + "</td>";
                    Tabela += "<td class 'text-center align-middle'>" + Consultores[i].FONE_CONSULTOR + "</td>";
                    Tabela += "<td class='text-center align-middle'>" + Consultores[i].DATA_ENTRADA + "</td>";
                    Tabela += "<td class='text-center align-middle'>" + Consultores[i].STATUS_CONSULTOR + "</td>";
                    Tabela += "<td class='text-center align-middle'><button class='iframe-btn btn m-3 btn-outline-light' data-idcon='" + Consultores[i].ID_CONSULTOR + "' onclick='verinfo(event)'>Visualizar</button></td>";
                    Tabela += "</tr>"
                }

                $("#tableCon").append(Tabela);
            }
        })

        .fail(function () {
            alert("falha");
        })

    return false;
}


function verinfo(event) {
    event.preventDefault();
    var consultorId = event.currentTarget.dataset.idcon; // Obtém o ID do atributo de dados

    var url = 'ControleCon-Adm.php?btn_ConsultarCon&IdCon=' + consultorId;
    var DadosForm = $('#frm_ConCon').serialize();
    console.log(DadosForm);

    $.ajax({
        method: 'GET',
        url: url,
        data: DadosForm
    })

        .done(function (dadosPHP) {
            document.getElementById("result").innerHTML = "";
            document.getElementById("infoCon").innerHTML = "";
            document.querySelector("#infoCon").setAttribute("class", "border border-light rounded text-center mx-5 my-3");
            if (dadosPHP.trim() === "") {
                console.log("Resposta vazia do servidor.");
            }
            else {
                var Consultores = JSON.parse(dadosPHP);

                // CONSULTA EM Tabela
                var Bloco = '';
                for (i = 0; i < Consultores.length; i++) {
                    if (Consultores[i].ID_CONSULTOR === consultorId) {
                    Bloco += "<h2><u>Informações Pessoais</u></h2>";
                    Bloco += "<strong>ID: </strong>"                        + Consultores[i].ID_CONSULTOR       + "<br>";
                    Bloco += "<strong>Nome: </strong>"                      + Consultores[i].NOME_CONSULTOR     + "<br>";
                    Bloco += "<strong>CPF: </strong>"                       + Consultores[i].CPF_CONSULTOR      + "<br>";
                    Bloco += "<strong>RG: </strong>"                        + Consultores[i].RG_CONSULTOR       + "<br>";
                    Bloco += "<strong>Email: </strong>"                     + Consultores[i].EMAIL_CONSULTOR    + "<br>";
                    Bloco += "<strong>Telefone: </strong>"                  + Consultores[i].FONE_CONSULTOR     + "<br>";
                    Bloco += "<strong>Data de Solicitação: </strong>"       + Consultores[i].DATA_ENTRADA       + "<br>";
                    Bloco += "<h2><u>Informações de Trabalho</u></h2>";
                    Bloco += "<strong>Formação: </strong>"                  + Consultores[i].FORMACAO           + "<br>";
                    Bloco += "<strong>Experiência: </strong>"               + Consultores[i].EXPERIENCIA        + "<br>";
                    Bloco += "<strong>Habilidade: </strong>"                + Consultores[i].HABILIDADE         + "<br>";
                    Bloco += "<strong>Anexo: </strong>"                     + Consultores[i].ANEXO_CONSULTOR    + "<br>";
                    Bloco += "<strong>Modalidade: </strong>"                + Consultores[i].MODALIDADE         + "<br>";
                    Bloco += "<strong>Publico Alvo: </strong>"              + Consultores[i].PULICO_ALVO        + "<br>";
                    Bloco += "<strong>Duração de Consultoria: </strong>"    + Consultores[i].DURACAO_CONS       + "<br>";
                    Bloco += "<h2><u>Localização</u></h2>";
                    Bloco += "<strong>Cidade: </strong>"                    + Consultores[i].CIDADE_CONSULTOR   + "<br>";
                    Bloco += "<strong>Estado: </strong>"                    + Consultores[i].ESTADO_CONSULTOR   + "<br>";
                    Bloco += "<form action='ControleCon-Adm.php' method='get' id='frm_AtvCon'> <input style='display: none' type='number' name='IdCon' id='IdCon' class='form-control m-2' value=" + Consultores[i].ID_CONSULTOR + "><input type='submit' id='btn_AtivarConsultor' name='btn_AtivarConsultor' class='iframe-btn btn m-3 btn-outline-light' value='Ativar'></form>"
                }}

                $("#infoCon").append(Bloco);
            }
        })

        .fail(function () {
            alert("falha");
        })

    return false;
}


// Alterar Login do Consultor
function AltLogCon(event) {
    event.preventDefault();
    var DadosForm = $("#frm_AltCon").serialize();
    console.log(DadosForm);

    $.ajax({
        method: 'GET',
        url: 'ControleCon-Adm.php?btn_AltLogCon',
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

// Deletar Consultor
function DelCon(event) {
    event.preventDefault();
    var DadosForm = $("#frm_DelCon").serialize();
    console.log(DadosForm);

    $.ajax({
        method: 'GET',
        url: 'ControleCon-Adm.php?btn_DeletarCon',
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
