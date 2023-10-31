function ConsultoresAnuncio() {
  console.log("CHAMOU");
  var dados = "";

  $.ajax({
    method: "GET",
    url: "ControleConsultor-Cliente.php?ConsultorAnuncio",
    data: dados,

    beforeSend: function () {
      console.log("DAdos enviados");
    },
  })

    .done(function (dadosPHP) {
      console.log("Depois do done");
      console.log(dadosPHP);
      var Consultores = JSON.parse(dadosPHP);

      var Bloco = "";

      for (i = 0; i < Consultores.length; i++) {
        Bloco += "<div class='col-3'>";
        Bloco += "Nome: " + Consultores[i].NOME_CONSULTOR;
        Bloco += "Email: " + Consultores[i].EMAIL_CONSULTOR;
        Bloco += "</div>";
      }

      $("#ConsultoresAnunciantes").html(Bloco);
    })

    .fail(function () {
      alert("DEU ERRADO A CONSULTA");
    });

  return false;
}


function ConsultorPesquisa(event) {
  document.querySelector("#Nome_Consultor")
  event.preventDefault();
  console.log("CHAMOU");
  var NomeConsultor = $("#Nome_Consultor").val();

  $.ajax({
    method: "GET",
    url: "ControleConsultor-Cliente.php",
    data: { Nome_Consultor: NomeConsultor, btn_ConsultorNome: true },
    beforeSend: function () {
      console.log("Dados enviados");
    },
  })

    .done(function (dadosPHP) {
      console.log("Depois do done");
      console.log(dadosPHP);
      var Consultores = JSON.parse(dadosPHP);
      var Bloco = "";

      for (i = 0; i < Consultores.length; i++) {
        Bloco +=
          "<div class='card text-center m-2' style='width: 18rem;'><div class='card-body'>";
        Bloco +=
          "<h5 class='card-title text-center'>" +
          Consultores[i].NOME_CONSULTOR +
          "</h5>";
        Bloco +=
          "<p class='card-text text-center'>" +
          Consultores[i].EMAIL_CONSULTOR +
          "</p>";
        Bloco +=
          "<button type='button' class='btn btn-outline-light' id='openModal" +
          i +
          "'>Entrar em Contato</button>";
        Bloco += "</div></div>";

        // Modais para cada consultor
        Bloco +=
          "<div class='modal fade' id='modalExemplo" +
          i +
          "' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>";
        Bloco += "<div class='modal-dialog' role='document'>";
        Bloco += "    <div class='modal-content'>";
        Bloco += "    <div class='modal-header'>";
        Bloco +=
          "        <h5 class='modal-title' id='exampleModalLabel'>" +
          Consultores[i].NOME_CONSULTOR +
          "</h5>";
        Bloco +=
          "        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Fechar'></button>";
        Bloco += "    </div>";
        Bloco += "    <div class='modal-body'>";
        Bloco +=
          " <p><strong>Email: </strong> " +
          Consultores[i].EMAIL_CONSULTOR +
          "</p>";
        Bloco +=
          " <p><strong>Localização: </strong> " +
          Consultores[i].CIDADE_CONSULTOR +
          ", " +
          Consultores[i].ESTADO_CONSULTOR +
          "</p>";
        Bloco +=
          " <p><strong>Avaliação: </strong> " +
          Consultores[i].AVALIACAO_CONSULTOR +
          "</p>";
        Bloco +=
          " <p><strong>Publico Alvo: </strong> " +
          Consultores[i].PUBLICO_ALVO +
          "</p>";
        Bloco +=
          " <p><strong>Formação: </strong> " + Consultores[i].FORMACAO + "</p>";
        Bloco +=
          " <p><strong>Experiência: </strong> " +
          Consultores[i].EXPERIENCIA +
          "</p>";
        Bloco +=
          " <p><strong>Habilidades: </strong> " +
          Consultores[i].HABILIDADE +
          "</p>";
        Bloco +=
          " <p><strong>Duração de Consulta: </strong> " +
          Consultores[i].DURACAO_CONS +
          "</p>";
        Bloco += "    </div>";
        Bloco += "    <div class='modal-footer'>";
        Bloco +=
          "        <button type='button' class='btn btn-outline-light' data-bs-dismiss='modal'>Fechar</button>";
        Bloco += "    </div>";
        Bloco += "    </div>";
        Bloco += "</div>";
        Bloco += "</div>";
      }

      $("#Consultores-resposta").html(Bloco);

      // Ativar modais ao clicar no botão "Entrar em Contato"
      for (i = 0; i < Consultores.length; i++) {
        $("#openModal" + i).on("click", { index: i }, function (event) {
          event.preventDefault();
          $("#modalExemplo" + event.data.index).modal("show");
        });
      }
    })

    .fail(function () {
      alert("DEU ERRADO A CONSULTA");
    });

    const idNome = document.querySelector("#Nome_Consultor")
    idNome.value = ""

  return false;
}
