<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<!-- Declaração de tema dark -->

<head>
  <!-- Metadados da página -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Inclusão do CSS do Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="..." crossorigin="anonymous">

  <!-- Inclusão do arquivo de ícones do Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

  <!-- Inclusão do JavaScript do Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="..." crossorigin="anonymous"></script>

  <!-- Inclusão do CSS personalizado -->
  <link rel="stylesheet" href="../../Css/Acessos/Adm/indexAdm.css">

  <!-- Título da página -->
  <title>Adm</title>
</head>

<body>
  <?php
  // Inicia a sessão
  session_start();

  // Verifica se as variáveis de sessão não estão definidas
  if ((!isset($_SESSION["id"]) == true) and (!isset($_SESSION["nome"]) == true) and (!isset($_SESSION["email"]) == true)) {
    unset($_SESSION["id"]);
    unset($_SESSION["id"]);
    unset($_SESSION["id"]);
    // Remove essas variáveis de sessão
    header('location: ../../index.html');
    // Redireciona para o arquivo index.html
  } else {
    // Atribui o valor da variável de sessão "nome" à variável local $Nome
    $Nome = $_SESSION["nome"];
  }
  ?>

  <!-- Barra de navegação -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
    <div class="container-fluid ml-2">
      <!-- Logo -->
      <a class="navbar-brand" href="#" id="alterarLogo"><img src="../../Img/Logo/logo branca finannce.png" alt="" style="height: 56px;"></a>

      <!-- Botão de navegação para telas pequenas -->
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Offcanvas para telas pequenas -->
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <!-- Logo para telas pequenas -->
          <a href="#" class="navbar-brand" id="alterarLogo2"><img src="../../Img/Logo/logo branca finannce.png" alt="" style="height: 56px;"></a>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <!-- Links de navegação -->
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <!-- Links para diferentes páginas -->
            <li class="nav-item">
              <a class="nav-link active fw-bold text-uppercase" aria-current="page" href="pagUsr.php" name="Usuário">Usuário</a>
            </li>
              <a class="nav-link active" aria-current="page" href="pagCons.php" name="Consultor">Consultor</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="pagAdm.php" name="Adm">Adm</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="pagRecSenha.php" name="RecSenha">Recuperação de Senha</a>
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
    <div class="btn-group">
      <!-- Botões de ação -->
      <a href="#" class="btn btn-outline-light" id="btn_cons"  onclick="alterarPag('ConsUsr')">Consultar</a>
      <a href="#" class="btn btn-outline-light" id="btn_del"    onclick="alterarPag('DelUsr')">Deletar</a>
    </div>
  </div>

  <!-- Seção principal da página -->
  <section id="section" style="margin-top: 100px;">
    <h1 class="text-center align-middle mt-5"></h1>
  </section>

  <!-- Seção para resultados -->
  <section id="result"></section>

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
