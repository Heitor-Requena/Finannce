function RecSenha() {
    document.getElementById("result").innerHTML = ``;
    console.log("CHAMOU");
    var dados = '';

    $.ajax({
        method: 'GET',
        url: 'ControleRecSenha-Adm.php?btn_RecSenha',
        data: dados
    })

        .done(function (dadosPHP) {
            console.log("Depois do done");
            console.log(dadosPHP);
            if (dadosPHP.trim() === "[]") {
                document.getElementById("result").innerHTML = "<h2>Nenhum feedback encontrado</h2>";
            }
            else {
                var Dado = JSON.parse(dadosPHP);

                var Tabela = '';
                Tabela += "<div class='table-responsive'><table class='table table-bordered table-striped table-dark'";

                Tabela += "<tr><th scope='col' class='text-center'>Email</th><th scope='col' class='text-center'>Data</th><th scope='col' class='text-center'>Alterar Senha</th>"
                for (i = 0; i < Dado.length; i++) {
                    // Gerar uma senha aleatória para cada linha
                    var senhaAleatoria = gerarSenhaAleatoria();
                    Tabela += "<tr>";
                    Tabela += "<td class='text-center align-middle'>" + Dado[i].EMAIL + "</td>";
                    Tabela += "<td class='text-center align-middle'>" + Dado[i].DATA_REQUISICAO + "</td>";
                    Tabela += "<td class='text-center align-middle'><form action='ControleRecSenha-Adm.php' method='get' id='frm_RecSenha'> <input style='display: none' type='email' name='Email' id='Email' class='form-control m-2' value=" + Dado[i].EMAIL + "><input type='text' name='NovaSenha' id='NovaSenha' class='NovaSenha form-control m-2' placeholder='Nova Senha' value='" + senhaAleatoria + "'><input type='submit' id='btn_AltSenha' name='btn_AltSenha' class='iframe-btn btn m-3 btn-outline-light' value='Alterar'></form></td>";
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

// Função para gerar uma senha aleatória
function gerarSenhaAleatoria() {
    var caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    var senha = "";
    for (var i = 0; i < 8; i++) {
        senha += caracteres.charAt(Math.floor(Math.random() * caracteres.length));
    }
    return senha;
}
