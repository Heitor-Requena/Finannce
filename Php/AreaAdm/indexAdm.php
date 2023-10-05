<?php
session_start();
$Nome = $_SESSION["nome"];
?>

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
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Usuário
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#" onclick="alterarPag('ConsUsr')">Consultar</a></li>
                <li><a class="dropdown-item" href="#" onclick="alterarPag('AltUsr')">Alterar Login</a></li>
                <li><a class="dropdown-item" href="#" onclick="alterarPag('DelUsr')">Deletar</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Consultor
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#" onclick="alterarPag('ConsCon')">Consultar</a></li>
                <li><a class="dropdown-item" href="#" onclick="alterarPag('AltCon')">Alterar Login</a></li>
                <li><a class="dropdown-item" href="#" onclick="alterarPag('DelCon')">Deletar</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Adm
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#" onclick="alterarPag('CadAdm')">Cadastrar</a></li>
                <li><a class="dropdown-item" href="#" onclick="alterarPag('ConsAdm')">Consultar</a></li>
                <li><a class="dropdown-item" href="#" onclick="alterarPag('AltLogAdm')">Alterar Login</a></li>
                <li><a class="dropdown-item" href="#" onclick="alterarPag('DelAdm')">Deletar</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#" name="Artigos" onclick="alterarPag('RespFAQ')">FAQ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#" name="Artigos" onclick="alterarPag('Artigos')">Artigos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#" name="Home" onclick="alterarPag('Home')">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active text-danger" aria-current="page" href="../../index.html" name="Sair">Sair</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>

  <section id="section" style="margin-top: 100px;">
    <h1 class="text-center align-middle mt-5">Seja bem vindo, <?php echo $Nome ?></h1>
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