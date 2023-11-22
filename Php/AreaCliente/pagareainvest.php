<?php


include 'hg_finance.php';

// Primeiro parametro do construtor recebe a chave da API
$HGFinance = new HGFinance('4ba65def');

// Metodo para obter os todos dados

$dados = $HGFinance->get();
$dadosEMBR = $HGFinance->get('stock_price', array( 'symbol' => 'EMBR3'));
$dadosITSA = $HGFinance->get('stock_price', array( 'symbol' => 'ITSA4'));


// Verificando a autenticacao da chave
if($HGFinance->valid_key()){
  echo 'CHAVE VALIDA';
} else {
  echo 'CHAVE INVALIDA';
}

?>


<?php

// Retorno dos resultados da API
//pr($HGFinance->data);

?>


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

<body onload="ConsultorPesquisa(event)">
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
              <a class="nav-link active" aria-current="page" href="pagArtigos.php" name="Artigos">Artigos</a>
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
  <!-- Carroussel -->
  <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
    <div class="container text-center">
  <div class="row">
    <div class="col">
    <h4>
  <?php 
    echo "Dolar: R$" . (number_format($dados['currencies']['USD']['buy'], 2 , ',' , '.'));
  ?>
</h4>
    </div>
    <div class="col">
    <h4>
  <?php 
    echo "Euro: R$" . (number_format($dados['currencies']['EUR']['buy'], 2 , ',' , '.'));
  ?>
</h4>
    </div>
    <div class="col">
    <h4>
  <?php 
    echo "Libras Esterlinas: R$" . (number_format($dados['currencies']['GBP']['buy'], 2 , ',' , '.'));
  ?>
</h4>
    </div>
  </div>
</div>
    </div>
    <div class="carousel-item">
    <div class="container text-center">
  <div class="row">
    <div class="col">
    <h4>
  <?php 
    echo "Peso Argentino: R$" . (number_format($dados['currencies']['ARS']['buy'], 2 , ',' , '.'));
  ?>
</h4>
    </div>
    <div class="col">
    <h4>
  <?php 
    echo "Dolar Canadense: R$" . (number_format($dados['currencies']['CAD']['buy'], 2 , ',' , '.'));
  ?>
</h4>
    </div>
    <div class="col">
    <h4>
  <?php 
    echo "Dolar Autraliano: R$" . (number_format($dados['currencies']['AUD']['buy'], 2 , ',' , '.'));
  ?>
</h4>
    </div>
  </div>
</div>
    </div>
    <div class="carousel-item">
    <div class="container text-center">
  <div class="row">
    <div class="col">
    <h4>
  <?php 
    echo "Iene: R$" . (number_format($dados['currencies']['JPY']['buy'], 2 , ',' , '.'));
  ?>
</h4>
    </div>
    <div class="col">
    <h4>
  <?php 
    echo "Yuan Chinês: R$" . (number_format($dados['currencies']['CNY']['buy'], 2 , ',' , '.'));
  ?>
</h4>
    </div>
    <div class="col">
    <h4>
  <?php 
    echo "Bitcoin: R$" . (number_format($dados['currencies']['BTC']['buy'], 2 , ',' , '.'));
  ?>
</h4>
    </div>
  </div>
</div>
    </div>
  </div>
  
</div>

  <!-- Carroussel -->
  <div>



</div>

<!--BOLSA DE VALORES-->
<?php foreach($dados['stocks'] as $key => $value) : ?>
  <h1><?php echo $value['name']?></h1>
  <h2><?php echo $value['location']?></h2>
  <h2><?php echo $value['points']?></h2>
  <h2><?php echo $value['variation']?></h2>
<?php endforeach; ?>


<!--AÇÔES-->
<?php $aesb3 = $dadosITSA['ITSA4']['name']; ?>
<h5><?php echo "Nome: " . $aesb3?></h5>

<?php $aesb3 = $dadosEMBR['EMBR3']['company_name']; ?>
<h5><?php echo "Nome: " . $aesb3?></h5>

<?php $aesb3 = $dadosEMBR['EMBR3']['price']; ?>
<h5><?php echo "Preço: R$" . (number_format($aesb3, 2, ',', '.'))?></h5>

<?php $aesb3 = $dadosEMBR['EMBR3']['change_price']; ?>
<h5><?php echo "Nome: " . $aesb3?></h5>

<?php $aesb3 = $dadosEMBR['EMBR3'] ['market_cap']; ?>
<h5><?php echo "Preço: R$" . (number_format($aesb3, 2 , ',', '.'))?></h5>

  <section id="result"></section>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script src="../../Js/AreaCliente/AltPag.js"></script>
  <script src="../../Js/AreaCliente/RespostaConsultores-Cliente.js"></script>
</body>

</html>