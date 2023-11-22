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
    var consultorId = event.currentTarget.dataset.idcon;

    abrirModalInfo(consultorId);
}

function abrirModalInfo(consultorId) {
    var url = 'ControleCon-Adm.php?btn_ConsultarCon&IdCon=' + consultorId;

    $.ajax({
        method: 'GET',
        url: url,
        data: $('#frm_ConCon').serialize(),
    })

        .done(function (dadosPHP) {
            $('#result').html('');
            $('#infoConModal').html(''); // Limpa o conteúdo anterior do modal

            if (dadosPHP.trim() === "") {
                console.log("Resposta vazia do servidor.");
            } else {
                var Consultores = JSON.parse(dadosPHP);

                // Construir o conteúdo do modal
                var modalContent = '';
                for (var i = 0; i < Consultores.length; i++) {
                    if (Consultores[i].ID_CONSULTOR === consultorId) {
                        modalContent += "<h4>Informações Pessoais</h4>";
                        modalContent += "<strong>ID: </strong>"                             + Consultores[i].ID_CONSULTOR + "<br>";
                        modalContent += "<strong>Nome: </strong>"                           + Consultores[i].NOME_CONSULTOR + "<br>";
                        modalContent += "<strong>CPF: </strong>"                            + Consultores[i].CPF_CONSULTOR + "<br>";
                        modalContent += "<strong>RG: </strong>"                             + Consultores[i].RG_CONSULTOR + "<br>";
                        modalContent += "<strong>Email: </strong>"                          + Consultores[i].EMAIL_CONSULTOR + "<br>";
                        modalContent += "<strong>Telefone: </strong>"                       + Consultores[i].FONE_CONSULTOR + "<br>";
                        modalContent += "<strong>Data de Solicitação: </strong>"            + Consultores[i].DATA_ENTRADA + "<br>";
                        modalContent += "<br><h4>Informações de Trabalho</h4>";
                        modalContent += "<strong>Formação: </strong>"                       + Consultores[i].FORMACAO           + "<br>";
                        modalContent += "<br><strong>Experiência: </strong>"                + Consultores[i].EXPERIENCIA        + "<br>";
                        modalContent += "<br><strong>Habilidade: </strong>"                 + Consultores[i].HABILIDADE         + "<br>";
                        modalContent += "<br><strong>Anexo: </strong>"                      + Consultores[i].ANEXO_CONSULTOR    + "<br>";
                        modalContent += "<br><strong>Modalidade: </strong>"                 + Consultores[i].MODALIDADE         + "<br>";
                        modalContent += "<br><strong>Publico Alvo: </strong>"               + Consultores[i].PUBLICO_ALVO        + "<br>";
                        modalContent += "<br><strong>Duração de Consultoria: </strong>"     + Consultores[i].DURACAO_CONS       + "<br>";
                        modalContent += "<br><h4>Localização</h4>";
                        modalContent += "<strong>Cidade: </strong>"                         + Consultores[i].CIDADE_CONSULTOR   + "<br>";
                        modalContent += "<strong>Estado: </strong>"                         + Consultores[i].ESTADO_CONSULTOR   + "<br>";
                        document.getElementById("btn_atv").innerHTML = `<form action='ControleCon-Adm.php' method='get' id='frm_AtvCon'> <input style='display: none' type='email' name='EmailCon' id='EmailCon' class='form-control m-2' value="`+Consultores[i].EMAIL_CONSULTOR+`"><input style='display: none' type='number' name='IdCon' id='IdCon' class='form-control m-2' value="` + Consultores[i].ID_CONSULTOR + `"><input type='submit' id='btn_AtivarConsultor' name='btn_AtivarConsultor' class='iframe-btn btn m-3 btn-outline-light' value='Ativar'></form>`;
                    }
                }

                // Atualizar o conteúdo do modal
                $('#infoConModal').html(modalContent);

                // Exibir o modal
                $('#modalExemplo').modal('show');
            }
        })

        .fail(function () {
            alert("Falha ao obter informações do consultor.");
        });

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
