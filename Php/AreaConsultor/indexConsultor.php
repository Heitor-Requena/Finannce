<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  <title>Area Consultor</title>
</head>

<body>

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
      $Nome = $_SESSION["nome"];
      $Email = $_SESSION["email"];
      $ID = $_SESSION["id"];
    }
  ?>

  <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="#" id="alterarLogo"><img src="../../Img/logo branca finannce.png" alt="" style="height: 56px;"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <a href="#" class="navbar-brand" id="alterarLogo2"><img src="../../Img/logo branca finannce.png" alt="" style="height: 56px;"></a>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#" name="Home" onclick="alterarPag('Home')">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#" name="FeedBack" onclick="alterarPag('FeedBack')">FeedBack's</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" onclick="alterarPag('Configuracoes')">
                Configurações
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="infopess.php">Meus Dados</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
            <li class="nav-item">
              <a class="nav-link active text-danger" aria-current="page" href="../../index.html" name="Sair">Sair</a>
            </li>
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
  <script src="../../Js/AreaConsultor/AltPag.js"></script>
  <script src="../../Js/AreaConsultor/RespostaFeedBack-Consultor.js"></script>
  <script src="../../Js/AreaConsultor/InfoPess.php"></script>
</body>

</html>