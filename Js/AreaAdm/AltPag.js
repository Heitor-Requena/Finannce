function alterarPag(pagName) {
    // Usuário--------------------------------------------------------------------------------------------------------
    if (pagName === "ConsUsr") {
        document.querySelector("#btn_cons").setAttribute("class", "btn btn-light");
        document.querySelector("#btn_altlog").setAttribute("class", "btn btn-outline-light");
        document.querySelector("#btn_del").setAttribute("class", "btn btn-outline-light");
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
                <input type="submit" id="btn_ConsultarUsr" name="btn_ConsultarUsr" class="iframe-btn btn m-3 btn-outline-light" value="Consultar" onclick="ConsultarUsr(event)">
                <input type="submit" id="btn_ListarUsr"    name="btn_ListarUsr"    class="iframe-btn btn m-3 btn-outline-light" value="Ver Todos Usuários" onclick="ListarUsr(event)">
            </div>
        </form>`;
        document.querySelector("#result").innerHTML =
            ``;
    }
    else if (pagName === "AltUsr") {
        document.querySelector("#btn_cons").setAttribute("class", "btn btn-outline-light");
        document.querySelector("#btn_altlog").setAttribute("class", "btn btn-light");
        document.querySelector("#btn_del").setAttribute("class", "btn btn-outline-light");
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
                <input type="submit"  id="btn_AltLogUsr" name="btn_AltLogUsr" class="iframe-btn btn m-3 btn-outline-light" value="Alterar" onclick="AltLogUsr(event)">
            </div>
        </form>`;
        document.querySelector("#result").innerHTML =
            ``;
    }
    else if (pagName === "DelUsr") {
        document.querySelector("#btn_cons").setAttribute("class", "btn btn-outline-light");
        document.querySelector("#btn_altlog").setAttribute("class", "btn btn-outline-light");
        document.querySelector("#btn_del").setAttribute("class", "btn btn-light");
        document.querySelector("#section").innerHTML = `<h1 class="text-center mt-3">Deletar Usuário</h1>

        <form action="ControleUsr-Adm.php" method="get" class="container mt-5" id="frm_DelUsr">
            <div class="row">
                <div class="col">
                    <input type="number" name="IdUsr" id="IdUsr" class="form-control m-2" placeholder="ID Usuário">
                </div>
            </div>
            <div class="text-center">
                <input type="submit" id="btn_DeletarUsr" name="btn_DeletarUsr" class="iframe-btn btn m-3 btn-outline-light" value="Deletar" onclick="DelUsr(event)">
            </div>
        </form>`;
        document.querySelector("#result").innerHTML =
            ``;
    }

    // Consultor--------------------------------------------------------------------------------------------------------
    else if (pagName === "ConsCon") {
        document.querySelector("#btn_cons").setAttribute("class", "btn btn-light active");
        document.querySelector("#btn_alt").setAttribute("class", "btn btn-outline-light");
        document.querySelector("#btn_del").setAttribute("class", "btn btn-outline-light");
        document.querySelector("#section").innerHTML = `
        <h1 class="text-center mt-3">Consultar Consultores</h1>

        <form action="ControleCon-Adm.php" method="get" class="container mt-5" id="frm_ConListCon">
            <div class="row">
                <div class="col">
                    <input type="number" name="IdCon" id="IdCon" class="form-control m-2" placeholder="ID Consultor">
                </div>
            </div>
            <div class="text-center">
                <input type="submit" id="btn_ConsultarCon"              name="btn_ConsultarCon"             class="iframe-btn btn m-2  btn-outline-light" value="Consultar"     onclick="ConsultarCon(event)">
                <input type="submit" id="btn_ListarCon"                 name="btn_ListarCon"                class="iframe-btn btn m-2  btn-outline-light" value="Ver Todos"     onclick="ListarCon(event)"> <br>
                <input type="submit" id="btn_ConsultoresAtivados"       name="btn_ConsultoresAtivados"      class="iframe-btn btn m-2  btn-outline-light" value="Ativados"      onclick="ConsultoresAtivados(event)">
                <input type="submit" id="btn_ConsultoresDesativados"    name="btn_ConsultoresDesativados"   class="iframe-btn btn m-2  btn-outline-light" value="Desativados"   onclick="ConsultoresDesativados(event)">
            </div>
        </form><br>
        <div class="row mx-1 d-flex justify-content-around">
            <div class="mb-3 col-xl-6 col-sm-2" id="infoCon"></div>
            <div class="" id="tableCon"></div>
        </div>`;
        document.querySelector("#result").innerHTML =    ``;
        document.getElementById("tableCon").innerHTML = "";
    }
    else if (pagName === "AltCon") {
        document.getElementById("tableCon").innerHTML = "";
        document.querySelector("#infoCon").setAttribute("class", "col-6 border border-light rounded");
        document.querySelector("#btn_cons").setAttribute("class", "btn btn-outline-light");
        document.querySelector("#btn_alt").setAttribute("class", "btn btn-light active");
        document.querySelector("#btn_del").setAttribute("class", "btn btn-outline-light");
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
                <input type="submit" id="btn_AltLogCon" name="btn_AltLogCon" class="iframe-btn btn m-3  btn-outline-light" value="Alterar" onclick="AltLogCon(event)">
           </div>
       </form>`;
        document.querySelector("#result").innerHTML =
            ``;
    }
    else if (pagName === "DelCon") {
        document.querySelector("#btn_cons").setAttribute("class", "btn btn-outline-light");
        document.querySelector("#btn_alt").setAttribute("class", "btn btn-outline-light");
        document.querySelector("#btn_del").setAttribute("class", "btn btn-light active");
        document.querySelector("#section").innerHTML = `<h1 class="text-center mt-3">Deletar Consultor</h1>

       <form action="ControleCon-Adm.php" method="get" class="container mt-5" id="frm_DelCon">
           <div class="row">
               <div class="col">
                   <input type="number" name="IdCon" id="IdCon" class="form-control m-2" placeholder="ID Consultor">
               </div>
           </div>
           <div class="text-center">
                <input type="submit" id="btn_DeletarCon" name="btn_DeletarCon" class="iframe-btn btn m-3  btn-outline-light" value="Deletar" onclick="DelCon(event)">
           </div>
       </form>`;
        document.querySelector("#result").innerHTML =
            ``;
    }

    // Adm--------------------------------------------------------------------------------------------------------
    else if (pagName === "CadAdm") {
        document.querySelector("#btn_cad").setAttribute("class", "btn btn-light")
        document.querySelector("#btn_con").setAttribute("class", "btn btn-outline-light")
        document.querySelector("#btn_altlog").setAttribute("class", "btn btn-outline-light")
        document.querySelector("#btn_del").setAttribute("class", "btn btn-outline-light")
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
                <input type="submit" id="btn_CadAdm" name="btn_CadAdm" class="iframe-btn btn m-3  btn-outline-light" value="Cadastrar" onclick="CadAdm(event)">
            </div>
        </form>`;
        document.querySelector("#result").innerHTML =
            ``;
    }
    else if (pagName === "ConsAdm") {
        document.querySelector("#btn_cad").setAttribute("class", "btn btn-outline-light")
        document.querySelector("#btn_con").setAttribute("class", "btn btn-light")
        document.querySelector("#btn_altlog").setAttribute("class", "btn btn-outline-light")
        document.querySelector("#btn_del").setAttribute("class", "btn btn-outline-light")
        document.querySelector("#section").innerHTML = `<h1 class="text-center mt-3">Consultar Administrador</h1>

        <form action="ControleAdm-Adm.php" method="get" class="container mt-5" id="frm_ConsAdm">
            <div class="row">
                <div class="col">
                    <input type="number" name="IdAdm" id="IdAdm" class="form-control m-2" placeholder="ID Adm">
                </div>
            </div>
            <div class="text-center">
                <input type="submit" id="btn_ConsAdm" name="btn_ConsAdm" class="iframe-btn btn m-3 btn-outline-light" value="Consultar"  onclick="ConsultarAdm(event)">
                <input type="submit" id="btn_ListAdm" name="btn_ListAdm" class="iframe-btn btn m-3 btn-outline-light" value="Ver Todos Administradores" onclick="ListarAdm(event)">
            </div>
        </form>`;
        document.querySelector("#result").innerHTML =
            ``;
    }
    else if (pagName === "AltLogAdm") {
        document.querySelector("#btn_cad").setAttribute("class", "btn btn-outline-light")
        document.querySelector("#btn_con").setAttribute("class", "btn btn-outline-light")
        document.querySelector("#btn_altlog").setAttribute("class", "btn btn-light")
        document.querySelector("#btn_del").setAttribute("class", "btn btn-outline-light")
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
                <input type="submit" id="btn_AltLogAdm" name="btn_AltLogAdm" class="iframe-btn btn m-3 btn-outline-light" value="Alterar" onclick="AltLogAdm(event)">
            </div>
        </form>`;
        document.querySelector("#result").innerHTML =
            ``;
    }
    else if (pagName === "DelAdm") {
        document.querySelector("#btn_cad").setAttribute("class", "btn btn-outline-light")
        document.querySelector("#btn_con").setAttribute("class", "btn btn-outline-light")
        document.querySelector("#btn_altlog").setAttribute("class", "btn btn-outline-light")
        document.querySelector("#btn_del").setAttribute("class", "btn btn-light")
        document.querySelector("#section").innerHTML = `<h1 class="text-center mt-3">Deletar Administrador</h1>

        <form action="ControleAdm-Adm.php" method="get" class="container mt-5" id="frm_DelAdm">
            <div class="row">
                <div class="col">
                    <input type="number" name="IdAdm" id="IdAdm" class="form-control m-2" placeholder="ID Adm">
                </div>
            </div>
            <div class="text-center">
                <input type="submit" id="btn_DelAdm" name="btn_DelAdm" class="iframe-btn btn m-3 btn-outline-light" value="Deletar"  onclick="DelAdm(event)">
            </div>
        </form>`;
        document.querySelector("#result").innerHTML =
            ``;
    }
}