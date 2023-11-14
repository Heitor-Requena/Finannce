<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<!-- Declaração de tema dark -->
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="..." crossorigin="anonymous">
  <!-- Inclusão do CSS do Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <!-- Inclusão do arquivo de ícones do Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="..." crossorigin="anonymous"></script>
  <!-- Inclusão do JavaScript do Bootstrap -->
  <link rel="stylesheet" href="../../Css/Acessos/Adm/indexAdm.css">
  <title>Adm</title>
</head>
<body>
  <?php
  session_start();
  // Inicia a sessão

  if ((!isset($_SESSION["id"]) == true) and (!isset($_SESSION["nome"]) == true) and (!isset($_SESSION["email"]) == true)) {
    // Se as variáveis de sessão não estiverem definidas
    unset($_SESSION["id"]);
    unset($_SESSION["id"]);
    unset($_SESSION["id"]);
    // Remove essas variáveis de sessão 
    header('location: ../../index.html');
    // Redireciona para o arquivo index.html
  } else {
    $Nome = $_SESSION["nome"];
    // Atribui o valor da variável de sessão "nome" à variável local $Nome
  }
  ?>

  <!-- Estrutura da barra de navegação -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
    <!-- Barra de navegação -->
    <div class="container-fluid ml-2">
      <a class="navbar-brand" href="#" id="alterarLogo"><img src="../../Img/Logo/logo branca finannce.png" alt="" style="height: 56px;"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <a href="#" class="navbar-brand" id="alterarLogo2"><img src="../../Img/Logo/logo branca finannce.png" alt="" style="height: 56px;"></a>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item">
              <a class="nav-link active fw-bold text-uppercase" aria-current="page" href="pagUsr.php" name="Usuário">Usuário</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="pagCons.php" name="Consultor">Consultor</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="pagAdm.php" name="Adm">Adm</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="pagArtigos.php" name="Artigos">FAQ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="pagArtigos.php" name="Artigos">Artigos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="indexAdm.php" name="Home" title="Home"><i class="bi bi-house"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link active text-danger" aria-current="page" href="../../index.html" name="Sair" title="Sair"><i class="bi bi-box-arrow-right"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>

  <!-- Botões de ação na interface -->
  <div class="nav2-align text-center">
    <!-- Div com classe de alinhamento -->
    <div class="btn-group">
      <!-- Botões de Ação -->
      <a href="#" class="btn btn-outline-light" id="btn_cons"  onclick="alterarPag('ConsUsr')">Consultar</a>
      <a href="#" class="btn btn-outline-light" id="btn_altlog"   onclick="alterarPag('AltUsr')">Alterar Login</a>
      <a href="#" class="btn btn-outline-light" id="btn_del"    onclick="alterarPag('DelUsr')">Deletar</a>
    </div>
  </div>

  <section id="section" style="margin-top: 100px;">
  
    <h1 class="text-center align-middle mt-5"></h1>
  </section>

  <section id="result"></section>
  <!-- Seção para resultados -->

  <!-- Inclusão do jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <!-- Inclusão de scripts locais -->
  <script src="../../Js/AreaAdm/AltPag.js"></script>
  <script src="../../Js/AreaAdm/RespostaUsr-Adm.js"></script>
  <script src="../../Js/AreaAdm/RespostaCon-Adm.js"></script>
  <script src="../../Js/AreaAdm/RespostaAdm-Adm.js"></script>
  <script src="../../Js/AreaAdm/RespostaArtigo-Adm.js"></script>
  <script src="../../Js/AreaAdm/RespostaFAQ-Adm.js"></script>
</body>
</html>