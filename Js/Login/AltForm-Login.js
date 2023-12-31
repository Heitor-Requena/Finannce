// Login Usuário
function Cadastro_Cliente() {
    document.querySelector(".container2").innerHTML =
        `<h2><i class="bi bi-person-circle"></i>Cadastre-se</h2>
    <form action="../../Php/AreaCliente/ControleLogin-Cliente.php" method="get" id="">
        <div class="inpt-box">
            <label for="Nome_Cliente"></label>
            <i class="bi bi-person"></i><input type="text" name="Nome_Cliente" id="Nome_Cliente" placeholder="Nome" class="inpt">
        </div>
        <br>

        <div class="inpt-box">
            <label for="EmailCadastro_Cliente"></label>
            <i class="bi bi-envelope-at"></i><input type="email" name="EmailCadastro_Cliente" id="EmailCadastro_Cliente" placeholder="Email" class="inpt">
        </div>
        <br>

        <div class="inpt-box">
            <label for="SenhaCadastro_Cliente"></label>
            <i class="bi bi-lock"></i><input type="password" name="SenhaCadastro_Cliente" id="SenhaCadastro_Cliente" placeholder="Senha" class="inpt">
        </div>
        <br>

        <div class="inpt-box">
            <label for="Fone_Cliente"></label>
            <i class="bi bi-telephone"></i><input type="tel" name="Fone_Cliente" id="Fone_Cliente" placeholder="Telefone" class="inpt">
        </div>
        <br>
    
        <input type="submit" name="btn_CadastrarCliente" id="btn_CadastrarCliente" value="Cadastrar">
    </form>
    <div class="link-form">
        <p>Já possui uma conta? <a onclick="Login_Cliente()" href="#">Clique Aqui</a></p>
        <a onclick="Cadastro_Consultor()" href="#" class="a2"><i class="bi bi-briefcase"></i>Sou Consultor</a>
    </div>`
}

function Login_Cliente() {
    document.querySelector("#header").innerHTML =
        `<ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item ">
            <a class="nav-link active text-white" aria-current="page" href="../../index.html">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="sobrenos.html">Sobre Nós</a>
        </li>

        <li class="nav-item">
            <a class="nav-link text-white" href="faqsac.html">Faq/Sac</a>
        </li>

        <li class="nav-item">
            <a class="nav-link text-white"
                href="/Html/Home/Area-Consultor 1.6/area-consultor.html">Consultores</a>
        </li>

        <li class="nav-item">
            <a class="nav-link text-white" href="/Html/Home/artigos.html">Artigos</a>
        </li>
    </ul>
    <a class="btn-lgn text-white btn btn-outline-light" href="#" onclick="Login_Adm()">
        <i class="bi bi-person-gear"></i>Área Restrita
    </a>`

    document.querySelector(".container2").innerHTML =
        `<h2><i class="bi bi-person-circle"></i>Login</h2>
    <form action="../../Php/AreaCliente/ControleLogin-Cliente.php" method="get">
        <div class="inpt-box">
            <label for="Email_Cliente"></label>
            <i class="bi bi-envelope-at"></i><input type="email" name="Email_Cliente" id="Email_Cliente" placeholder="Email" class="inpt">
        </div>
        <br>

        <div class="inpt-box">
            <label for="Senha_Cliente"></label>
            <i class="bi bi-lock"></i><input type="password" name="Senha_Cliente" id="Senha_Cliente" placeholder="Senha" class="inpt">
        </div>
        <a onclick="RecuperarSenha_Cliente()" href="#" class="fgtPasslink">Esqueceu a senha?</a>
        <br>

        <input type="submit" name="btn_EntrarCliente" id="btn_EntrarCliente" value="Entrar">
    </form>
    <div class="link-form">
        <p>Não possui uma conta? <a onclick="Cadastro_Cliente()" href="#">Clique aqui</a></p>
        <a onclick="Login_Consultor()" href="#" class="a2"><i class="bi bi-briefcase"></i>Sou Consultor</a>
    </div>`
}

function RecuperarSenha_Cliente() {
    document.querySelector(".container2").innerHTML =
        `<h2 id="title"><i class="bi bi-person-circle"></i>Recuperar Senha</h2>
    <form action="../../Php/AreaCliente/ControleLogin-Cliente.php" method="get" class="frmEsqSenha">
        <div class="inpt-box">
            <label for="Email_Cliente"></label>
            <i class="bi bi-envelope-at"></i><input type="email" name="Email_Cliente" id="Email_Cliente" class="inpt2 inpt" placeholder="Email">
        </div>
        <br>
        <input type="submit" value="Enviar" class="inpt3 RecuperarSenha" name="RecuperarSenha" id="RecuperarSenha">
    </form>
    <div class="link-form">
        <a onclick="Login_Cliente()" href="#">Lembrou a senha?</a>
    </div>`
}

// Login Consultor
function Cadastro_Consultor() {
    document.querySelector(".container2").innerHTML =
        `<h2><i class="bi bi-briefcase"></i>Cadastro Consultor</h2>
    <form action="../../Php/AreaConsultor/ControleLogin-Consultor.php" method="get">
        <div class="inpt-box">
            <label for="Nome_Consultor"></label>
            <i class="bi bi-person"></i><input type="text" name="Nome_Consultor" id="Nome_Consultor" placeholder="Nome" class="inpt">
        </div>
        <br>
        
        <div class="inpt-box">
            <label for="EmailCadastro_Consultor"></label>
            <i class="bi bi-envelope-at"></i><input type="email" name="EmailCadastro_Consultor" id="EmailCadastro_Consultor" placeholder="Email" class="inpt">
        </div>
        <br>

        <div class="inpt-box">
            <label for="FoneCadastro_Consultor"></label>
            <i class="bi bi-telephone"></i><input type="tel" name="FoneCadastro_Consultor" id="FoneCadastro_Consultor" placeholder="Telefone" class="inpt">
        </div>
        <br>

        <div class="inpt-box">
            <label for="SenhaCadastro_Consultor"></label>
            <i class="bi bi-lock"></i><input type="password" name="SenhaCadastro_Consultor" id="SenhaCadastro_Consultor" placeholder="Senha" class="inpt" max=11111111>
        </div>
        <br>

        <input type="submit" value="Cadastrar" id="btn_CadastrarConsultor" name="btn_CadastrarConsultor">
    </form>
    <div class="link-form">
        <p>Já possui uma conta? <a onclick="Login_Consultor()" href="#">Clique Aqui</a></p>
        <a onclick="Login_Cliente()" href="#" class="a2"><i class="bi bi-person-circle"></i>Não Sou Consultor</a>
    </div>`
}

function Login_Consultor() {
    document.querySelector(".container2").innerHTML =
        `<h2><i class="bi bi-briefcase"></i>Login Consultor</h2>
    <form action="../../Php/AreaConsultor/ControleLogin-Consultor.php" method="get">
        <div class="inpt-box">
            <label for="Email_Consultor"></label>
            <i class="bi bi-envelope-at"></i><input type="email" name="Email_Consultor" id="Email_Consultor" placeholder="Email" class="inpt">
        </div>
        <br>
    
        <div class="inpt-box">
            <label for="Senha_Consultor"></label>
            <i class="bi bi-lock"></i><input type="password" name="Senha_Consultor" id="Senha_Consultor" placeholder="Senha" class="inpt">
        </div>
        <a onclick="RecuperarSenha_Consultor()" href="#" class="fgtPasslink">Esqueceu a senha?</a>  
        <br>

        <input type="submit" name="btn_EntrarConsultor" id="btn_EntrarConsultor" value="Entrar">
    </form>
    <div class="link-form">              
        <p>Não possui uma conta? <a onclick="Cadastro_Consultor()" href="#">Clique aqui</a></p>
        <a onclick="Login_Cliente()" href="#" class="a2"><i class="bi bi-person-circle"></i>Não Sou Consultor</a>
    </div>`
}

function RecuperarSenha_Consultor() {
    document.querySelector(".container2").innerHTML =
        `<h2 id="title"><i class="bi bi-briefcase"></i>Recuperar Senha</h2>
    <form action="../../Php/AreaConsultor/ControleLogin-Consultor.php" method="get" class="frmEsqSenha">
        <div class="inpt-box">
            <label for="Email_Consultor"></label>
            <i class="bi bi-envelope-at"></i><input type="email" name="Email_Consultor" id="Email_Consultor" class="inpt2 inpt" placeholder="Email">
        </div>
        <br>
        <input type="submit" value="Enviar" class="inpt3 RecuperarSenha" name="RecuperarSenha" id="RecuperarSenha">
    </form>
    <div class="link-form">
        <a onclick="Login_Consultor()" href="#">Lembrou a senha?</a>
    </div>`
}

// Adm
function Login_Adm() {
    document.querySelector("#header").innerHTML = `
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item ">
            <a class="nav-link active text-white" aria-current="page" href="../../index.html">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="sobrenos.html">Sobre Nós</a>
        </li>

        <li class="nav-item">
            <a class="nav-link text-white" href="faqsac.html">Faq/Sac</a>
        </li>

        <li class="nav-item">
            <a class="nav-link text-white"
                href="/Html/Home/Area-Consultor 1.6/area-consultor.html">Consultores</a>
        </li>

        <li class="nav-item">
            <a class="nav-link text-white" href="/Html/Home/artigos.html">Artigos</a>
        </li>
    </ul>
    <a class="btn-lgn text-white btn btn-outline-light" href="#" onclick="Login_Cliente()">
        <i class="bi bi-person-circle"></i>Login
    </a>`

    document.querySelector(".container2").innerHTML =
        `<h2><i class="bi bi-person-gear"></i>Login Adm</h2>
    <form action="../../Php/AreaAdm/ControleLogin-Adm.php" method="get" id="frmDiv_Adm">
        <div class="inpt-box">
            <label for="Email_Adm"></label>
            <i class="bi bi-envelope-at"></i><input type="email" name="Email_Adm" id="Email_Adm" maxlength="80" class="inpt" placeholder="Email">
        </div>
        <br>
        <div class="inpt-box">
            <label for="Senha_Adm"></label>
            <i class="bi bi-lock"></i><input type="password" name="Senha_Adm" id="Senha_Adm" maxlength="8" class="inpt" placeholder="Senha">
            </div>
            <a  class="fgtPasslink">Esqueceu a senha? Contate seu superior</a>
        <br>
        <input type="submit" name="btn_EntrarAdm" id="btn_EntrarAdm" value="Entrar" class="inpt">
    </form>`
}