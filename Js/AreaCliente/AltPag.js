function alterarPag(pagName) {
  if (pagName === "Home") {
    document.querySelector("#section").innerHTML =
      `<h1 class="text-center align-middle">Seja bem vindo, Usuário</h1>`;
    document.querySelector("#result").innerHTML =
      ``;
  }
  
  // Perfil Cliente--------------------------------------------------------------------------------------------------------
  else if (pagName === "Configuracoes") {
    document.querySelector("#section").innerHTML = `<h1>Configurações</h1>`;
    document.querySelector("#result").innerHTML = ``;
  }


  // Parte para Fazer feedBack's--------------------------------------------------------------------------------------------------------
  else if (pagName === "FeedBack") {
    document.querySelector("#section").innerHTML = `<h1>FeedBack</h1>
    <div>
      <form action="ControleFeedBack-Cliente.php" method="get" class="">
        <input type="text" name="Nome_Consultor" id="Nome_Consultor" class="" placeholder="Nome Consultor">

        <input type="email" name="Email_Consultar" id="Email_Consultar" class="" placeholder="Email Consultor">

        <textarea name="Avaliacao" id="Avaliacao" cols="30" rows="10" placeholder="Avaliação do Consultor"></textarea>

        <input type="number" name="Nota_Consultor" id="Nota_Consultor" placeholder="Nota" step="1" min="0" max="5">
        <input type="number" name="ID_FeedBack" id="ID_FeedBack" placeholder="Id FeedBack" step="1" min="1">

        <button id="btn_CadastrarFeedBack" name="btn_CadastrarFeedBack" class="" onclick="CadastrarFeedBack()">Adicionar</button>
        <button id="btn_ExcluirFeedback" name="btn_ExcluirFeedback" class="" onclick="ExcluirFeedBack()">Excluir</button>
        <button id="btn_ListarFeedBack" name="btn_ListarFeedBack" class="" onclick="ListarFeedBack()">Listar</button>

      </form>
    </div>
    `;
    document.querySelector("#result").innerHTML = ``;
  }
}