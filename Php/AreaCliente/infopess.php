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

<body onload="CarregarDadosForm()">
  <?php
    session_start();

    if ((!isset($_SESSION["id"]) == true) and (!isset($_SESSION["nome"]) == true) and (!isset($_SESSION["email"]) == true))
    {
      unset($_SESSION["id"]);
      unset($_SESSION["nome"]);
      unset($_SESSION["email"]);
      header('location: ../../index.html');
    } 
    else{
      $Nome  = $_SESSION["nome"];
      $Email = $_SESSION["email"];
      $ID    = $_SESSION["id"];
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
              <a class="nav-link active" aria-current="page" href="indexCliente.php" name="Home"><i class="bi bi-house"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="pagGastos.php" name="MeusGastos">Meus Gastos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="pagConsultores.php" name="MeusGastos">Consultores</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="pagFeedback.php" name="MeusGastos">FeedBack's</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="infopess.php" name="MeusGastos"><strong>MEUS DADOS</strong></a>
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

  <section id="section" style="margin-top: 100px;">
    <h1 class="text-center mt-3">Meus Dados</h1>
        <p class="text-center">Se quiser fazer alguma alteração apenas mude os campos e clique no botão "Salvar".</p>
          
        <form class="container mt-5" action="ControleInfopess-Cliente.php" id="frm_InfopesDados" method="get">
          <h4 class="text-start">Informações pessoais</h4>
          <div class="row">
            <div class="col">
              <input type="text" name="Nome" id="Nome" class="form-control m-2" placeholder="Nome">
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
              <input type="date" class="form-control" name="Nasc" id="Nasc" placeholder="Senha" min="2005-01-01">
            </div>
          </div>

          <br>
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
            <input type="submit" value="Salvar" class="iframe-btn btn m-3 col-6 btn-outline-light" name="Salvar" id="Salvar" onclick="SalvarDados(event)">
            <!-- <button type="button" id="iframe-submit-btn2" class="iframe-btn btn m-3 col-6 btn-outline-light" name="Salvar" id="Salvar" onclick="SalvarDados()">Salvar</button> -->
          </div>
        </form>
  </section>

  <section id="result"></section>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script src="../../Js/AreaCliente/AltPag.js"></script>
  <script src="../../Js/AreaCliente/Js-InfoPess.js"></script>
  <script src="../../Js/AreaCliente/RespostaGrafico-Cliente.js"></script>
</body>

</html>