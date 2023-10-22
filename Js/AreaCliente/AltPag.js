function alterarPag(pagName) {
  if (pagName === "Home") {
    document.querySelector("#section").innerHTML =
      `<h1 class="text-center align-middle">Seja bem vindo, Usuário</h1>`;
    document.querySelector("#result").innerHTML =
      ``;
  }
  // Perfil Cliente--------------------------------------------------------------------------------------------------------
  else if (pagName === "InfoPess") {
    document.querySelector("#section").innerHTML = `<h1 class="text-center mt-3">Meus Dados</h1>
        <p class="text-center">Se quiser fazer alguma alteração apenas mude os campos e clique no botão "Salvar"</p>
          
        <form class="container mt-5" action="" method="get">
          <h4 class="text-start">Informações pessoais</h4>
          <div class="row">
            <div class="col-6">
              <input type="text" name="Nome" id="Nome" class="form-control m-2" placeholder="Nome">
            </div>
            <div class="col-6">
              <input type="text" name="Sobrenome" id="Sobrenome" class="form-control m-2" placeholder="Sobrenome">
            </div>
          </div>
      
          <div class="row">
              <div class="col">
                <input type="email" name="Email" id="Email" class="form-control m-2" placeholder="Email">
              </div>
          </div>
              
          <div class="row">
            <div class="col-7">
              <input type="text" name="CPF" id="CPF" class="form-control m-2" placeholder="CPF - 000.000.000-00" pattern="[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}">
            </div>
            <div class="col-5">
              <input type="text" name="RG" id="RG" class="form-control m-2" placeholder="RG - 00.000.000-0" pattern="[0-9]{2}.[0-9]{3}.[0-9]{3}-[0-9]{1}">
            </div>
          </div>
      
          <div class="row">
            <label for="Nasc" class="col-sm-2 col-form-label text-center" >Data de Nascimento: </label>
            <div class="col-sm-10">
              <input type="date" class="form-control" id="Nasc" placeholder="Senha" min="2005-01-01">
            </div>
          </div>
      
          <div class="text-center">
            <button type="button" id="iframe-submit-btn1" class="iframe-btn btn m-3 col-6 btn-outline-light">Salvar</button>
          </div>
        </form>
      
        <form action="" method="get" class="container mt-5">
          <h4 class="text-start">Endereço</h4>
      
          <div class="row">
            <div class="col-4">
              <input type="number" name="CEP" id="CEP" class="form-control m-2" placeholder="CEP" pattern="[0-9]{9}">
            </div>
            <div class="col-4">
              <input type="text" name="Rua" id="Rua" class="form-control m-2" placeholder="Rua">
            </div>
            <div class="col-4">
              <input type="text" name="Bairro" id="Bairro" class="form-control m-2" placeholder="Bairro">
            </div>
          </div>
      
          <div class="row">
            <div class="col-3">
              <input type="number" name="Numero" id="Numero" class="form-control m-2" placeholder="Número">
            </div>
            <div class="col-9">
              <input type="text" name="Complemento" id="Complemento" class="form-control m-2" placeholder="Complemento">
            </div>
          </div>
      
          <div class="row">
            <div class="col-6">
              <input type="text" name="Cidade" id="Cidade" class="form-control m-2" placeholder="Cidade">
            </div>
            <div class="col-6">
              <input type="text" name="Estado" id="Estado" class="form-control m-2" placeholder="Estado">
            </div>
          </div>
      
          <div class="text-center">
            <button type="button" id="iframe-submit-btn2" class="iframe-btn btn m-3 col-6 btn-outline-light">Salvar</button>
          </div>
        </form>
  `;
    document.querySelector("#result").innerHTML =
      ``;
  }

  // Perfil Cliente--------------------------------------------------------------------------------------------------------
  else if (pagName === "MeusGastos") {
    document.querySelector("#section").innerHTML = `<h1>Meus Gastos</h1>
    <br>
    <div class="container">

      <div class="row">
        <button onclick="GraficoRosca(event)" class="col-4 iframe-btn btn btn-outline-light">Gráfico de Gastos Recentes</button><br>
        <button onclick="TabelaRosca(event)" class="col-4 iframe-btn btn btn-outline-light">Tabela de Gastos Recentes</button>
      </div>

      <br><br>

      <div class="row">
        <div id="GraficoRosca" style="width: 400px; height: 300px;" class="col-6"></div>
        
        <div class="col-6">
          
          <div class="row">
            <div id="TabelaGraficoRosca" class="col-12"></div>
          </div>

          <div class="row">
            <div id="secaoForm" class="col-12 center">
              <form action="ControleGrafico-Cliente.php" id="frm_Grafico" method="get" class="container mt-12">
            
                <div class="row">
                  <div class="col-12">
                    <input type="text" name="NomeGasto" id="NomeGasto" class="form-control m-2  col-9" placeholder="Nome do Gasto">
                  </div>
                </div>
            
                <div class="row">
                  <div class="col-12">
                    <input type="number" name="ValorGasto" id="ValorGasto" min=0 step=0.1 class="form-control m-2  col-9" placeholder="Valor">
                  </div>
                </div>

                <div class="row">
                  <div class="col-12">
                    <input type="number" name="Id_Gasto" id="Id_Gasto"  min=0 class="form-control m-2 col-9" placeholder="Número">
                  </div>
                </div>

                <div class="row">
                  <div class="col-12 text-center">
                    <input type="submit" id="btn_AdicionarGasto" name="btn_AdicionarGasto" class="iframe-btn btn m-1 col-6 btn-outline-light" value="Adicionar" onclick="AdicionarGasto(event)">
                    <input type="submit" id="btn_ExcluirGasto" name="btn_ExcluirGasto" class="iframe-btn btn m-1 col-6 btn-outline-light" value="Excluir" onclick="ExcluirGasto(event)">
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <button onclick="TabelaColuna(event), GraficoColuna(event)" class="col-4 iframe-btn btn btn-outline-light">Todos Gastos</button><br>
      </div>

      <div class="row">
        <div id="GraficoColuna" class="col-12"></div>
      </div>

      <div class="row">
        <div id="TabelaGraficoColuna" class="col-12"></div>
      </div>

      <div class="row">
        <form action="ControleGrafico-Cliente.php" id="frm_Grafico" method="get">
          <input type="submit" id="btn_Relatorio" name="btn_Relatorio" class="col-4 iframe-btn btn btn-outline-light" value="Relatorio">
        </form>
      </div>

    </div>
    `;
    document.querySelector("#result").innerHTML = ``;
  }

  // Perfil Cliente--------------------------------------------------------------------------------------------------------
  else if (pagName === "Configuracoes") {
    document.querySelector("#section").innerHTML = `<h1>Configurações</h1>`
    document.querySelector("#result").innerHTML = ``;
  }

  // Perfil Cliente--------------------------------------------------------------------------------------------------------
  else if (pagName === "Consultores") {
    document.querySelector("#section").innerHTML = `<h1>Consultores</h1>`
    document.querySelector("#result").innerHTML = ``;
  }
}