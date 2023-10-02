function alterarPag(pagName) {
    if (pagName === "Home") {
        document.querySelector("#section").innerHTML = 
        `<h1 class="text-center align-middle">Seja bem vindo, Administrador</h1>`;
        document.querySelector("#result").innerHTML =
        ``;
    } 
    // Artigos--------------------------------------------------------------------------------------------------------
    else if (pagName === "Artigos") {
        document.querySelector("#section").innerHTML = ` <h1 class="text-center mt-3">Artigos</h1>

        <div class="d-flex justify-content-around">
            <div class="flex row col-4 m-5">
                <form action="ControleArtigo-Adm.php" method="get" id="frm_Artigo" class="container mt-5">
                    <h4 class="text-start">Publicar</h4>
            
                    <div class="row">
                        <input type="text" name="TituloArtigo" id="TituloArtigo" class="form-control m-2" placeholder="Título Artigo">
                    </div>
                    <div class="row">
                        <input type="text" name="AutorArtigo" id="AutorArtigo" class="form-control m-2" placeholder="Autor do Artigo">
                    </div>
                    <div class="row">
                        <textarea class="form-control m-2" name="Artigo" id="Artigo" rows="15" placeholder="Digite aqui o artigo"></textarea>
                    </div>
                    <div class="text-center">
                        <input type="submit" id="btn_AdicionarArtigo" name="btn_AdicionarArtigo" class="iframe-btn btn m-3 col-6 btn-outline-light" value="Adicionar" onclick="AdicionarArtigo(event)">
                    </div>
                </form>
            </div>
        
            <div class="flex row col-4 m-5 justify-content-around">
                <form action="ControleArtigo-Adm.php" method="get" id="frm_Artigo2" class="container mt-5">
                    <div class="row">
                        <input type="number" name="IdArtigo" id="IdArtigo" class="form-control m-2" placeholder="Id do Artigo" min="1" max-length="999999">
                    </div>
                    <div class="text-center">
                        <input type="submit" id="btn_ListarArtigo" name="btn_ListarArtigo" class="iframe-btn btn m-3 col-6 btn-outline-light" value="Ver Todos" onclick="ListarArtigo(event)">
                        <input type="submit" id="btn_ConsultarArtigo" name="btn_ConsultarArtigo" class="iframe-btn btn m-3 col-6 btn-outline-light" value="Consultar" onclick="ConsultarArtigo(event)">
                        <input type="submit" id="btn_ExcluirArtigo" name="btn_ExcluirArtigo" class="iframe-btn btn m-3 col-6 btn-outline-light" value="Excluir" onclick="ExcluirArtigo(event)">
                    </div>
                </form>

                <section id="resultArtigo"></section>
            </div>
        </div>`;
        document.querySelector("#result").innerHTML =
        ``;
    }

    // Usuário--------------------------------------------------------------------------------------------------------
    else if (pagName === "ConsUsr"){
        document.querySelector("#section").innerHTML = 
        `<h1 class="text-center mt-3">Consultar Usuário</h1>
        <h2></h2>

        <form action="ControleUsr-Adm.php" method="get" class="container mt-5" id="frm_ConListUsr">
            <div class="row">
                <div class="col">
                    <label for="IdUsr"></label>
                    <input type="number" name="IdUsr" id="IdUsr" class="form-control m-2" placeholder="ID Usuário">
                </div>
            </div>
            <div class="text-center">
                <input type="submit" id="btn_ConsultarUsr" name="btn_ConsultarUsr" class="iframe-btn btn m-3 col-6 btn-outline-light" value="Consultar" onclick="ConsultarUsr(event)">
                <input type="submit" id="btn_ListarUsr"    name="btn_ListarUsr"    class="iframe-btn btn m-3 col-6 btn-outline-light" value="Ver Todos Usuários" onclick="ListarUsr(event)">
            </div>
        </form>`;
        document.querySelector("#result").innerHTML =
        ``;
    }
    else if (pagName === "AltUsr"){
        document.querySelector("#section").innerHTML = `<h1 class="text-center mt-3">Alterar Login Usuário</h1>

        <form action="ControleUsr-Adm.php" method="get" class="container mt-5" id="frm_AltUsr">
            <div class="row">
                <div class="col">
                    <input type="number" name="IdUsr" id="IdUsr" class="form-control m-2" placeholder="ID Usuário">
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <input type="email" name="EmailUsr" id="EmailUsr" class="form-control m-2" placeholder="Email">
                </div>
                <div class="col-6">
                    <input type="password" name="SenhaUsr" id="SenhaUsr" class="form-control m-2" placeholder="Senha">
                </div>
            </div>
            <div class="text-center">
                <input type="submit"  id="btn_AltLogUsr" name="btn_AltLogUsr" class="iframe-btn btn m-3 col-6 btn-outline-light" value="Alterar" onclick="AltLogUsr(event)">
            </div>
        </form>`;
        document.querySelector("#result").innerHTML =
        ``;
    }
    else if (pagName === "DelUsr"){
        document.querySelector("#section").innerHTML = `<h1 class="text-center mt-3">Deletar Usuário</h1>

        <form action="ControleUsr-Adm.php" method="get" class="container mt-5" id="frm_DelUsr">
            <div class="row">
                <div class="col">
                    <input type="number" name="IdUsr" id="IdUsr" class="form-control m-2" placeholder="ID Usuário">
                </div>
            </div>
            <div class="text-center">
                <input type="submit" id="btn_DeletarUsr" name="btn_DeletarUsr" class="iframe-btn btn m-3 col-6 btn-outline-light" value="Deletar" onclick="DelUsr(event)">
            </div>
        </form>`;
        document.querySelector("#result").innerHTML =
        ``;
    }

    // Consultor--------------------------------------------------------------------------------------------------------
    else if (pagName === "ConsCon"){
        document.querySelector("#section").innerHTML = `<h1 class="text-center mt-3">Consultar Consultor</h1>

        <form action="ControleCon-Adm.php" method="get" class="container mt-5" id="frm_ConListCon">
            <div class="row">
                <div class="col">
                    <input type="number" name="IdCon" id="IdCon" class="form-control m-2" placeholder="ID Consultor">
                </div>
            </div>
            <div class="text-center">
                <input type="submit" id="btn_ConsultarCon"  name="btn_ConsultarCon"     class="iframe-btn btn m-3 col-6 btn-outline-light" value="Consultar" onclick="ConsultarCon(event)">
                <input type="submit" id="btn_ListarCon"     name="btn_ListarCon"        class="iframe-btn btn m-3 col-6 btn-outline-light" value="Ver Todos Consultores" onclick="ListarCon(event)">
            </div>
        </form>`;
        document.querySelector("#result").innerHTML =
        ``;
    }
    else if (pagName === "AltCon"){
       document.querySelector("#section").innerHTML = `<h1 class="text-center mt-3">Alterar Login Consultor</h1>

       <form action="ControleCon-Adm.php" method="get" class="container mt-5" id="frm_AltCon">
           <div class="row">
               <div class="col">
                   <input type="number" name="IdCon" id="IdCon" class="form-control m-2" placeholder="ID Consultor">
               </div>
           </div>
           <div class="row">
               <div class="col-6">
                   <input type="email" name="EmailCon" id="EmailCon" class="form-control m-2" placeholder="Email">
               </div>
               <div class="col-6">
                   <input type="password" name="SenhaCon" id="SenhaCon" class="form-control m-2" placeholder="Senha">
               </div>
           </div>
           <div class="text-center">
                <input type="submit" id="btn_AltLogCon" name="btn_AltLogCon" class="iframe-btn btn m-3 col-6 btn-outline-light" value="Alterar" onclick="AltLogCon(event)">
           </div>
       </form>`;
        document.querySelector("#result").innerHTML =
        ``;
    }
    else if (pagName === "DelCon"){
       document.querySelector("#section").innerHTML = `<h1 class="text-center mt-3">Deletar Consultor</h1>

       <form action="ControleCon-Adm.php" method="get" class="container mt-5" id="frm_DelCon">
           <div class="row">
               <div class="col">
                   <input type="number" name="IdCon" id="IdCon" class="form-control m-2" placeholder="ID Consultor">
               </div>
           </div>
           <div class="text-center">
                <input type="submit" id="btn_DeletarCon" name="btn_DeletarCon" class="iframe-btn btn m-3 col-6 btn-outline-light" value="Deletar" onclick="DelCon(event)">
           </div>
       </form>`;
        document.querySelector("#result").innerHTML =
        ``;
    }

    // Adm--------------------------------------------------------------------------------------------------------
    else if (pagName === "CadAdm") {
        document.querySelector("#section").innerHTML = `<h1 class="text-center mt-3">Cadastrar Administrador</h1>

        <form action="ControleAdm-Adm.php" method="get" class="container mt-5" id="frm_CadAdm">
            <div class="row">
                <div class="col-6">
                    <input type="text" name="NomeAdm" id="NomeAdm" class="form-control m-2 col-6" placeholder="Nome">
                </div>
                <div class="col-6">
                    <input type="email" name="EmailAdm" id="EmailAdm" class="form-control m-2 col-6" placeholder="Email - xxxx@finannce.com">
                </div>
            </div>
            
            <div class="row">
              <div class="col-7">
                <input type="text" name="CPFAdm" id="CPFAdm" class="form-control m-2" placeholder="CPF - 000.000.000-00" pattern="[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}">
              </div>
              <div class="col-5">
                <input type="text" name="RGAdm" id="RGAdm" class="form-control m-2" placeholder="RG - 00.000.000-0" pattern="[0-9]{2}.[0-9]{3}.[0-9]{3}-[0-9]{1}">
              </div>
            </div>
            <div class="row">
                <div class="col">
                    <input type="text" name="SenhaAdm" id="SenhaAdm" class="form-control m-2" placeholder="Senha">
                </div>
            </div>
            <div class="text-center">
                <input type="submit" id="btn_CadAdm" name="btn_CadAdm" class="iframe-btn btn m-3 col-6 btn-outline-light" value="Cadastrar" onclick="CadAdm(event)">
            </div>
        </form>`;
        document.querySelector("#result").innerHTML =
        ``;
    }
    else if (pagName === "ConsAdm") {
        document.querySelector("#section").innerHTML = `<h1 class="text-center mt-3">Consultar Administrador</h1>

        <form action="ControleAdm-Adm.php" method="get" class="container mt-5" id="frm_ConsAdm">
            <div class="row">
                <div class="col">
                    <input type="number" name="IdAdm" id="IdAdm" class="form-control m-2" placeholder="ID Adm">
                </div>
            </div>
            <div class="text-center">
                <input type="submit" id="btn_ConsAdm" name="btn_ConsAdm" class="iframe-btn btn m-3 col-6 btn-outline-light" value="Consultar"  onclick="ConsultarAdm(event)">
                <input type="submit" id="btn_ListAdm" name="btn_ListAdm" class="iframe-btn btn m-3 col-6 btn-outline-light" value="Ver Todos Administradores" onclick="ListarAdm(event)">
            </div>
        </form>`;
        document.querySelector("#result").innerHTML =
        ``;
    }
    else if (pagName === "AltLogAdm") {
        document.querySelector("#section").innerHTML = `<h1 class="text-center mt-3">Alterar Administrador</h1>

        <form action="ControleAdm-Adm.php" method="get" class="container mt-5" id="frm_AltLogAdm">
            <div class="row">
                <div class="col">
                    <input type="number" name="IdAdm" id="IdAdm" class="form-control m-2 col-6" placeholder="ID Adm">
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <input type="email" name="EmailAdm" id="EmailAdm" class="form-control m-2 col-6" placeholder="Email - xxxx@finannce.com">
                </div>
                <div class="col-6">
                    <input type="text" name="SenhaAdm" id="SenhaAdm" class="form-control m-2" placeholder="Senha">
                </div>
            </div>
            <div class="text-center">
                <input type="submit" id="btn_AltLogAdm" name="btn_AltLogAdm" class="iframe-btn btn m-3 col-6 btn-outline-light" value="Alterar" onclick="AltLogAdm(event)">
            </div>
        </form>`;
        document.querySelector("#result").innerHTML =
        ``;
    }
    else if (pagName === "DelAdm") {
        document.querySelector("#section").innerHTML = `<h1 class="text-center mt-3">Deletar Administrador</h1>

        <form action="ControleAdm-Adm.php" method="get" class="container mt-5" id="frm_DelAdm">
            <div class="row">
                <div class="col">
                    <input type="number" name="IdAdm" id="IdAdm" class="form-control m-2" placeholder="ID Adm">
                </div>
            </div>
            <div class="text-center">
                <input type="submit" id="btn_DelAdm" name="btn_DelAdm" class="iframe-btn btn m-3 col-6 btn-outline-light" value="Deletar"  onclick="DelAdm(event)">
            </div>
        </form>`;
        document.querySelector("#result").innerHTML =
        ``;
    }

    // FAQ--------------------------------------------------------------------------------------------------------
    else if(pagName === "RespFAQ") {
        document.querySelector('#section').innerHTML=`<h1 class="text-center mt-3">Resposta</h1>
        <form action="ControleFAQ-Adm.php" id="frm_PerguntaResposta" method="get" class="container mt-5">
            <div class="row">
                <div class="col">
                    <input type="number" name="Id_Pergunta" id="Id_Pergunta" class="form-control m-2" placeholder="ID da pergunta">
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <textarea class="form-control m-2" name="Resposta" id="Resposta" rows="15" placeholder="Responda Aqui"></textarea>
                </div>
            </div>

            <div class="text-center">
                <input type="submit" value="Responder" id="btn_ResponderPergunta" name="btn_ResponderPergunta" class="iframe-btn btn m-3 col-6 btn-outline-light" onclick="EnviarResposta(event)">
                <input type="submit" value="Consultar" id="btn_ConsultarPergunta" name="btn_ConsultarPergunta" class="iframe-btn btn m-3 col-6 btn-outline-light" onclick="ConsultarPergunta(event)">
                <input type="submit" value="Ver todas Perguntas" id="btn_ListarPergunta" name="btn_ListarPergunta" class="iframe-btn btn m-3 col-6 btn-outline-light" onclick="ListarPergunta(event)">
            </div>
        </form>`;
        
        document.querySelector("#result").innerHTML =
        ``;
    }
}