<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  <title>Area Cliente</title>
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

  <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#" id="alterarLogo"><img src="../../Img/logo branca finannce.png" alt="" style="height: 56px;"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <a class="navbar-brand" href="#" id="alterarLogo"><img src="../../Img/logo branca finannce.png" alt="" style="height: 56px;"></a>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#" name="Home"><i class="bi bi-house"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="pagGastos.php" name="MeusGastos">Meus Gastos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#" name="MeusGastos"><strong>CONSULTORES</strong></a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="pagFeedback.php" name="MeusGastos">FeedBack's</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="infopess.php" name="MeusGastos">Meus Dados</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active text-danger" aria-current="page" href="../../index.html" name="Sair"><i class="bi bi-box-arrow-right"></i></a>
            </li>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>


  <section id="section" style="margin-top: 100px;" class="d-flex justify-content-around flex-column">
    <h1 class="text-center m-5">Consultores</h1>
    <div class='container' onload="TodosConsultores(), ConsultoresAnuncio()">
      <div id="ConsultoresAnunciantes">

      </div>

      <div>
        <form action="ControleConsultor-Cliente.php" method="get" id="frm_PesquisaConsultor" class="d-flex justify-content-around flex-column">
          <input type="text" name="Nome_Consultor" id="Nome_Consultor" class="form-control m-2" placeholder="Nome Consultor" required>
          <button type="button" onclick="ConsultorPesquisa(event)" id="btnPesquisar" class="iframe-btn btn m-3 btn-outline-light">Pesquisar</button>
          <input type="submit" value="Ver Todos" onclick="ConsultorPesquisa(event)" id="TodosConsultores" name="TodosConsultores" class="iframe-btn btn m-3 btn-outline-light">
        </form>
      </div>

      <!-- Área onde os consultores serão exibidos -->
      <div id='Consultores-resposta' class="d-flex justify-content-around flex-wrap">
        <!-- Aqui os cards dos consultores serão inseridos dinamicamente -->
      </div>
    </div>
  </section>

  <!-- Adicione o modal fora do loop dos consultores -->
  <div class='modal fade' id='modalExemplo' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
    <div class='modal-dialog' role='document'>
      <!-- Conteúdo do modal -->
    </div>
  </div>

  <section id="result"></section>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script src="../../Js/AreaCliente/AltPag.js"></script>
  <script src="../../Js/AreaCliente/RespostaGrafico-Cliente.js"></script>
  <script src="../../Js/AreaCliente/RespostaConsultores-Cliente.js"></script>
  <script src="../../Js/AreaCliente/RespostaFeedBack-Cliente.js"></script>

</body>

</html>