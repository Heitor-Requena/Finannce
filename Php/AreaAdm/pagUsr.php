<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../../Css/Acessos/Adm/indexAdm.css">

  <title>Adm</title>
</head>

<body>
  <?php
  session_start();

  if ((!isset($_SESSION["id"]) == true) and (!isset($_SESSION["nome"]) == true) and (!isset($_SESSION["email"]) == true)) {
    unset($_SESSION["id"]);
    unset($_SESSION["id"]);
    unset($_SESSION["id"]);
    header('location: ../../index.html');
  } else {
    $Nome = $_SESSION["nome"];
  }
  ?>

<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
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
              <a class="nav-link active" aria-current="page" href="#" name="Artigos" onclick="alterarPag('RespFAQ')">FAQ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#" name="Artigos" onclick="alterarPag('Artigos')">Artigos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="indexAdm.php" name="Home" onclick="alterarPag('Home')">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active text-danger" aria-current="page" href="../../index.html" name="Sair">Sair</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  
  <div class="nav2-align">
    <nav class="nav nav-pills nav-fill mt-5">
        <a class="nav-item active " href="#">
            <button id="btn_cons" class="btn btn-outline-light " onclick="alterarPag('ConsUsr')">Consultar</button>
        </a>
        <a class="nav-item active" href="#">
            <button id="btn_alt" class="btn btn-outline-light" onclick="alterarPag('AltUsr')">Alterar Login</button>
        </a>
        <a class="nav-item active" href="#">
            <button id="btn_del" class="btn btn-outline-light" onclick="alterarPag('DelUsr')">Deletar</button>
        </a>
    </nav>
    
  </div>
  <section id="section" style="margin-top: 100px;">
    <h1 class="text-center align-middle mt-5"></h1>
  </section>


  <section id="result"></section>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="../../Js/AreaAdm/AltPag.js"></script>
  <script src="../../Js/AreaAdm/RespostaUsr-Adm.js"></script>
  <script src="../../Js/AreaAdm/RespostaCon-Adm.js"></script>
  <script src="../../Js/AreaAdm/RespostaAdm-Adm.js"></script>
  <script src="../../Js/AreaAdm/RespostaArtigo-Adm.js"></script>
  <script src="../../Js/AreaAdm/RespostaFAQ-Adm.js"></script>

</html>