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

    if ((!isset($_SESSION["id"]) == true) and (!isset($_SESSION["nome"]) == true) and (!isset($_SESSION["email"]) == true))
    {
      unset($_SESSION["id"]);
      unset($_SESSION["id"]);
      unset($_SESSION["id"]);
      header('location: ../../index.html');
    } 
    else{
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
              <a class="nav-link active" aria-current="page" href="pagConsultores.php" name="MeusGastos">Consulotres</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#" name="MeusGastos"><strong>FEEDBACK</strong></a>
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


  <section id="section" style="width: 80%; margin: 100px auto;" class="d-flex justify-content-around flex-column">
    <h1 class="text-center">FeedBack</h1>
    <div>
      <form action="ControleFeedBack-Cliente.php" method="get" class="form-control m-2 d-flex justify-content-around flex-column">
        <input type="text" name="Nome_Consultor" id="Nome_Consultor" class="form-control m-2" placeholder="Nome Consultor">

        <input type="email" name="Email_Consultar" id="Email_Consultar" class="form-control m-2" placeholder="Email Consultor">

        <textarea name="Avaliacao" id="Avaliacao" cols="30" rows="10" placeholder="Avaliação do Consultor" class="form-control m-2"></textarea>

        <input type="number" name="Nota_Consultor" id="Nota_Consultor" placeholder="Nota" step="1" min="0" max="5" class="form-control m-2">
        <input type="number" name="ID_FeedBack" id="ID_FeedBack" placeholder="Id FeedBack" step="1" min="1" class="form-control m-2">

        <button id="btn_CadastrarFeedBack" name="btn_CadastrarFeedBack" class="iframe-btn btn m-3 btn-outline-light" onclick="CadastrarFeedBack()">Adicionar</button>
        <button id="btn_ExcluirFeedback" name="btn_ExcluirFeedback" class="iframe-btn btn m-3 btn-outline-light" onclick="ExcluirFeedBack()">Excluir</button>
        <button id="btn_ListarFeedBack" name="btn_ListarFeedBack" class="iframe-btn btn m-3 btn-outline-light" onclick="ListarFeedBack()">Listar</button>

      </form>
    </div>
  </section>

  <section id="result"></section>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script src="../../Js/AreaCliente/AltPag.js"></script>
  <script src="../../Js/AreaCliente/Js-InfoPess.js"></script>
  <script src="../../Js/AreaCliente/RespostaGrafico-Cliente.js"></script>
  <script src="../../Js/AreaCliente/RespostaConsultores-Cliente.js"></script>
  <script src="../../Js/AreaCliente/RespostaFeedBack-Cliente.js"></script>

</body>
</html>