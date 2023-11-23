<?php


include 'hg_finance.php';

// Primeiro parametro do construtor recebe a chave da API
$HGFinance = new HGFinance('4ba65def');

// Metodo para obter os todos dados

$dados = $HGFinance->get();
$dadosEMBR = $HGFinance->get('stock_price', array('symbol' => 'EMBR3'));
$dadosITSA = $HGFinance->get('stock_price', array('symbol' => 'ITSA4'));
$dadosPETR = $HGFinance->get('stock_price', array('symbol' => 'PETR4'));
$dadosPSSA = $HGFinance->get('stock_price', array('symbol' => 'PSSA3'));
$dadosCRFB = $HGFinance->get('stock_price', array('symbol' => 'CRFB3'));

//Mudar cor de acordo com a variação da cotação
$variationDolar = ($dados['currencies']['USD']['variation'] < 0) ? 'bg-danger' : 'bg-success';
$variationEUR = ($dados['currencies']['EUR']['variation'] <= 0) ? 'bg-danger' : 'bg-success';
$variationGBP = ($dados['currencies']['GBP']['variation'] <= 0) ? 'bg-danger' : 'bg-success';
$variationARS = ($dados['currencies']['ARS']['variation'] <= 0) ? 'bg-danger' : 'bg-success';
$variationCAD = ($dados['currencies']['CAD']['variation'] <= 0) ? 'bg-danger' : 'bg-success';
$variationAUD = ($dados['currencies']['AUD']['variation'] <= 0) ? 'bg-danger' : 'bg-success';
$variationJPY = ($dados['currencies']['JPY']['variation'] <= 0) ? 'bg-danger' : 'bg-success';
$variationCNY = ($dados['currencies']['CNY']['variation'] <= 0) ? 'bg-danger' : 'bg-success';
$variationBTC = ($dados['currencies']['BTC']['variation'] <= 0) ? 'bg-danger' : 'bg-success';

//Mudar cor de acordo com a variação da bolsa de valores
// $variationStock = ($dados['stocks']['variation'] < 0) ? 'bg-danger' : 'bg-success';

//Mudar cor de acordo com a variação da ação
$variationEMBR = ($dadosEMBR['EMBR3']['change_percent'] < 0) ? 'bg-danger' : 'bg-success';
$variationITSA = ($dadosITSA['ITSA4']['change_percent'] < 0) ? 'bg-danger' : 'bg-success';
$variationPETR = ($dadosPETR['PETR4']['change_percent'] < 0) ? 'bg-danger' : 'bg-success';
$variationPSSA = ($dadosPSSA['PSSA3']['change_percent'] < 0) ? 'bg-danger' : 'bg-success';
$variationCRFB = ($dadosCRFB['CRFB3']['change_percent'] < 0) ? 'bg-danger' : 'bg-success';


// Verificando a autenticacao da chave
//if($HGFinance->valid_key()){
//echo 'CHAVE VALIDA';
//} else {
// echo 'CHAVE INVALIDA';
//}

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
  <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">-->

  <style>
    .img-quote {
      width: 50px;
      height: 50px;
    }
  </style>
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
              <a class="nav-link active" aria-current="page" href="indexCliente.php" name="Home"><i class="bi bi-house"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="pagGastos.php" name="MeusGastos">Meus Gastos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="pagArtigos.php" name="Artigos">Artigos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#" name="MeusGastos"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link active fw-bold text-uppercase" aria-current="page" href="pagareainvest.php" name="Home">Investimentos</i></a>
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
                <h5>
                  <span class="badge text-<?php echo ($variationDolar); ?>">
                    <?php echo "Dolar: R$" . (number_format($dados['currencies']['USD']['buy'], 2, ',', '.')); ?>
                    <?php echo "(" . $dados['currencies']['USD']['variation'] . ")" ?>
                  </span>
                </h5>
              </div>

              <div class="col">
                <h5><span class="badge text-<?php echo ($variationEUR); ?>">
                    <?php echo "Euro: R$" . (number_format($dados['currencies']['EUR']['buy'], 2, ',', '.')); ?>
                    <?php echo "(" . $dados['currencies']['EUR']['variation'] . ")" ?>
                  </span></h5>
              </div>

              <div class="col">
                <h5><span class="badge text-<?php echo ($variationGBP); ?>">
                    <?php echo "GBP: R$" . (number_format($dados['currencies']['GBP']['buy'], 2, ',', '.')); ?>
                    <?php echo "(" . $dados['currencies']['GBP']['variation'] . ")" ?>
                  </span></h5>
              </div>


            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="container text-center">
            <div class="row">
              <div class="col">
                <h5><span class="badge text-<?php echo ($variationARS); ?>">
                    <?php echo "ARS: R$" . (number_format($dados['currencies']['ARS']['buy'], 2, ',', '.')); ?>
                    <?php echo "(" . $dados['currencies']['ARS']['variation'] . ")" ?>
                  </span></h5>
              </div>

              <div class="col">
                <h5><span class="badge text-<?php echo ($variationCAD); ?>">
                    <?php echo "CAD: R$" . (number_format($dados['currencies']['CAD']['buy'], 2, ',', '.')); ?>
                    <?php echo "(" . $dados['currencies']['CAD']['variation'] . ")" ?>
                  </span></h5>
              </div>

              <div class="col">
                <h5><span class="badge text-<?php echo ($variationAUD); ?>">
                    <?php echo "AUD: R$" . (number_format($dados['currencies']['AUD']['buy'], 2, ',', '.')); ?>
                    <?php echo "(" . $dados['currencies']['AUD']['variation'] . ")" ?>
                  </span></h5>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="container text-center">
            <div class="row">
              <div class="col">
                <h5><span class="badge text-<?php echo ($variationJPY); ?>">
                    <?php echo "JPY: R$" . (number_format($dados['currencies']['JPY']['buy'], 2, ',', '.')); ?>
                    <?php echo "(" . $dados['currencies']['JPY']['variation'] . ")" ?>
                  </span></h5>
              </div>
              <div class="col">
                <h5><span class="badge text-<?php echo ($variationCNY); ?>">
                    <?php echo "CNY: R$" . (number_format($dados['currencies']['CNY']['buy'], 2, ',', '.')); ?>
                    <?php echo "(" . $dados['currencies']['CNY']['variation'] . ")" ?>
                  </span></h5>
              </div>
              <div class="col">
                <h5><span class="badge text-<?php echo ($variationCNY); ?>">
                    <?php echo "BTC: R$" . (number_format($dados['currencies']['BTC']['buy'], 2, ',', '.')); ?>
                    <?php echo "(" . $dados['currencies']['BTC']['variation'] . ")" ?>
                  </span></h5>
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
    <div class="d-flex justify-content-around flex-wrap mt-3 text-center">
      <?php foreach ($dados['stocks'] as $key => $value) : ?>

        <div class="card d-flex d-flex align-content-around flex-wrap m-2 " style="width: 18rem;">
          <div class="card-body">
            <h5 class="card-title"><?php echo $value['name'] ?></h5>
            <p class="card-text"><?php echo $value['location'] ?></p>
            <span>
              <?php echo (number_format($value['points'], 2, ',', '.')) . "BRL" ?>
              <?php echo "(" . $value['variation'] . ")" ?>
            </span>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <!--AÇÔES-->
    <h1 class="text-center mt-4">Ações</h1>
    <div class="acoes d-flex justify-content-around flex-wrap mt-3 text-center">
      <div class="ITSA card m-2" style="width: 18rem;">
        <img src="https://assets.hgbrasil.com/finance/companies/big/itausa.png" alt="" class="card-img-top">
        <div class="card-body">

          <p class="card-text text-center fw-bold">
            <?php $ITSA = $dadosITSA['ITSA4']['name']; ?>
            <?php echo $ITSA ?>
          </p><!--Itau-->
          <p class="card-text text-center">
            <?php $ITSA = $dadosITSA['ITSA4']['company_name'] ?>
            <?php echo $ITSA ?>
          </p>
          <p class="card-text text-center">
            <?php $ITSA = $dadosITSA['ITSA4']['document'] ?>
            <?php echo $ITSA ?>
          </p>
          <p class="card-text text-center">
            <?php $ITSA = $dadosITSA['ITSA4']['website'] ?>
            <a href="<?php echo $ITSA ?>" target="_blank"><?php echo $ITSA ?></a>
          </p>
          <p class="card-text text-center"> <strong>Setor: </strong> <br>
            <?php $ITSA = $dadosITSA['ITSA4']['sector'] ?>
            <?php echo $ITSA ?>
          </p>
          <p class="card-text text-center"> <strong>Market Cap: </strong> <br>
            <?php $ITSA = $dadosITSA['ITSA4']['market_cap'] ?>
            <?php echo (number_format($ITSA, 0, ',', '.')) . 'B' ?>
          </p>
          <p class="badge text-<?php echo ($variationITSA); ?>">
            <?php $ITSA = $dadosITSA['ITSA4']['price'] ?>
            <?php echo "Preço: " . (number_format($ITSA, 2, ',', '.')) . ' BRL' ?>
            <?php $ITSA = $dadosITSA['ITSA4']['change_percent'] ?>
            <?php echo "(" . (number_format($ITSA, 2, ',', '.')) . "%)" ?>
          </p>
          <p class="card-text text-center"><strong>Atualizado em: </strong><br>
            <?php $ITSA = $dadosITSA['ITSA4']['updated_at'] ?>
            <?php echo $ITSA ?>
          </p>
        </div>
      </div>

      <div class="EMBR4 card m-2" style="width: 18rem;">
        <img src="https://assets.hgbrasil.com/finance/companies/big/embraer.png" alt="" class="card-img-top">
        <div class="card-body">
          <p class="card-text text-center fw-bold">
            <?php $EMBR = $dadosEMBR['EMBR3']['name']; ?>
            <?php echo $EMBR ?>
          </p><!--Itau-->
          <p class="card-text text-center">
            <?php $EMBR = $dadosEMBR['EMBR3']['company_name'] ?>
            <?php echo $EMBR ?>
          </p>
          <p class="card-text text-center">
            <?php $EMBR = $dadosEMBR['EMBR3']['document'] ?>
            <?php echo $EMBR ?>
          </p>
          <p class="card-text text-center">
            <?php $EMBR = $dadosEMBR['EMBR3']['website'] ?>
            <a href="<?php echo $EMBR ?>" target="_blank"><?php echo $EMBR ?></a>
          </p>
          <p class="card-text text-center"><strong>Setor: </strong><br>
            <?php $EMBR = $dadosEMBR['EMBR3']['sector'] ?>
            <?php echo $EMBR ?>
          </p>
          <p class="card-text text-center"> <strong>Market Cap: </strong><br>
            <?php $EMBR = $dadosEMBR['EMBR3']['market_cap'] ?>
            <?php echo (number_format($EMBR, 0, ',', '.')) . 'B' ?>
          </p>
          <p class="badge text-<?php echo ($variationEMBR); ?>">
            <?php $EMBR = $dadosEMBR['EMBR3']['price'] ?>
            <?php echo "Preço: " . (number_format($EMBR, 2, ',', '.')) . ' BRL' ?>
            <?php $EMBR = $dadosEMBR['EMBR3']['change_percent'] ?>
            <?php echo "(" . (number_format($EMBR, 2, ',', '.')) . "%)" ?>
          </p>
          <p class="card-text text-center"> <strong>Atualizado em: </strong><br>
            <?php $EMBR = $dadosEMBR['EMBR3']['updated_at'] ?>
            <?php echo $EMBR ?>
          </p>
        </div>
      </div>

      <div class="PETR4 card m-2" style="width: 18rem;">
        <img src="https://assets.hgbrasil.com/finance/companies/big/petrobras.png" alt="" class="card-img-top">
        <div class="card-body">
          <p class="card-text text-center fw-bold">
            <?php $PETR4 = $dadosPETR['PETR4']['name']; ?>
            <?php echo $PETR4 ?>
          </p><!--Itau-->
          <p class="card-text text-center">
            <?php $PETR4 = $dadosPETR['PETR4']['company_name'] ?>
            <?php echo $PETR4 ?>
          </p>
          <p class="card-text text-center">
            <?php $PETR4 = $dadosPETR['PETR4']['document'] ?>
            <?php echo $PETR4 ?>
          </p>
          <p class="card-text text-center">
            <?php $PETR4 = $dadosPETR['PETR4']['website'] ?>
            <a href="<?php echo $PETR4 ?>" target="_blank"><?php echo $PETR4 ?></a>
          </p>
          <p class="card-text text-center"> <strong>Setor: </strong><br>
            <?php $PETR4 = $dadosPETR['PETR4']['sector'] ?>
            <?php echo $PETR4 ?>
          </p>
          <p class="card-text text-center"> <strong>Market Cap: </strong><br>
            <?php $PETR4 = $dadosPETR['PETR4']['market_cap'] ?>
            <?php echo (number_format($PETR4, 0, ',', '.')) . 'B' ?>
          </p>
          <p class="badge text-<?php echo ($variationPETR); ?>">
            <?php $PETR4 = $dadosPETR['PETR4']['price'] ?>
            <?php echo "Preço: " . (number_format($PETR4, 2, ',', '.')) . ' BRL' ?>
            <?php $PETR4 = $dadosPETR['PETR4']['change_percent'] ?>
            <?php echo "(" . (number_format($PETR4, 2, ',', '.')) . "%)" ?>
          </p>
          <p class="card-text text-center"> <strong>Atualizado em:</strong><br>
            <?php $PETR4 = $dadosPETR['PETR4']['updated_at'] ?>
            <?php echo $PETR4 ?>
          </p>
        </div>

      </div>

      <div class="PSSA3 card m-2" style="width: 18rem;">
        <img src="https://assets.hgbrasil.com/finance/companies/big/porto-seguro.png" alt="" class="card-img-top">
        <div class="card-body">
          <p class="card-text text-center fw-bold">
            <?php $PSSA3 = $dadosPSSA['PSSA3']['name']; ?>
            <?php echo $PSSA3 ?>
          </p><!--Itau-->
          <p class="card-text text-center">
            <?php $PSSA3 = $dadosPSSA['PSSA3']['company_name'] ?>
            <?php echo $PSSA3 ?>
          </p>
          <p class="card-text text-center">
            <?php $PSSA3 = $dadosPSSA['PSSA3']['document'] ?>
            <?php echo $PSSA3 ?>
          </p>
          <p class="card-text text-center">
            <?php $PSSA3 = $dadosPSSA['PSSA3']['website'] ?>
            <a href="<?php echo $PSSA3 ?>" target="_blank"><?php echo $PSSA3 ?></a>
          </p>
          <p class="card-text text-center"> <strong>Setor: </strong><br>
            <?php $PSSA3 = $dadosPSSA['PSSA3']['sector'] ?>
            <?php echo $PSSA3 ?>
          </p>
          <p class="card-text text-center"> <strong>Market Cap: </strong> <br>
            <?php $PSSA3 = $dadosPSSA['PSSA3']['market_cap'] ?>
            <?php echo (number_format($PSSA3, 0, ',', '.')) . 'B' ?>
          </p>
          <p class="badge text-<?php echo ($variationPSSA); ?>">
            <?php $PSSA3 = $dadosPSSA['PSSA3']['price'] ?>
            <?php echo "Preço: " . (number_format($PSSA3, 2, ',', '.')) . ' BRL' ?>
            <?php $PSSA3 = $dadosPSSA['PSSA3']['change_percent'] ?>
            <?php echo "(" . (number_format($PSSA3, 2, ',', '.')) . "%)" ?>
          </p>
          <p class="card-text text-center"> <strong>Atualizado em: </strong><br>
            <?php $PSSA3 = $dadosPSSA['PSSA3']['updated_at'] ?>
            <?php echo  $PSSA3 ?>
          </p>
        </div>

      </div>

      <div class="CRFB3 card m-2" style="width: 18rem;">
        <img src="https://assets.hgbrasil.com/finance/companies/big/carrefour-br.png" alt="" class="card-img-top">
        <div class="card-body">
          <p class="card-text text-center fw-bold">
            <?php $CRFB3 = $dadosCRFB['CRFB3']['name']; ?>
            <?php echo $CRFB3 ?>
          </p><!--Itau-->
          <p class="card-text text-center">
            <?php $CRFB3 = $dadosCRFB['CRFB3']['company_name'] ?>
            <?php echo $CRFB3 ?>
          </p>
          <p class="card-text text-center">
            <?php $CRFB3 = $dadosCRFB['CRFB3']['document'] ?>
            <?php echo $CRFB3 ?>
          </p>
          <p class="card-text text-center">
            <?php $CRFB3 = $dadosCRFB['CRFB3']['website'] ?>
            <a href="<?php echo $CRFB3 ?>" target="_blank"><?php echo $CRFB3 ?></a>
          </p>
          <p class="card-text text-center"><strong>Setor: </strong><br>
            <?php $CRFB3 = $dadosCRFB['CRFB3']['sector'] ?>
            <?php echo $CRFB3 ?>
          </p>
          <p class="card-text text-center"> <strong>Market Cap: </strong><br>
            <?php $CRFB3 = $dadosCRFB['CRFB3']['market_cap'] ?>
            <?php echo (number_format($CRFB3, 0, ',', '.')) . 'B' ?>
          </p>
          <p class="badge text-<?php echo ($variationCRFB); ?>">
            <?php $CRFB3 = $dadosCRFB['CRFB3']['price'] ?>
            <?php echo "Preço: " . (number_format($CRFB3, 2, ',', '.')) . ' BRL' ?>
            <?php $CRFB3 = $dadosCRFB['CRFB3']['change_percent'] ?>
            <?php echo "(" . (number_format($CRFB3, 2, ',', '.')) . "%)" ?>
          </p>
          <p class="card-text text-center"> <strong>Atualizado em: </strong><br>
            <?php $CRFB3 = $dadosCRFB['CRFB3']['updated_at'] ?>
            <?php echo $CRFB3 ?>
          </p>
        </div>

      </div>
    </div>

    <section id="result"></section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</body>

</html>