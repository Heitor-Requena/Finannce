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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artigos</title>
    <link rel="stylesheet" href="../../Css/Home/bootstrap.min.css">
    <link rel="stylesheet" href="../../Css/Home/style.css">
</head>

<body style="background-color: #051225;">

    <!-- ÁREA NAVLIST -->

    <nav class="navbar navbar-expand-lg bs-primary-bg-subtle">
        <div class="container-fluid ">
            <a class="navbar-brand " href="#"></a>
            <img src="../../img/logo branca finannce.png" alt="Bootstrap" width="250" height="100">
            <button class="navbar-toggler btn btn-outline-light" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item ">
                        <a class="nav-link active text-white" aria-current="page" href="../../index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="sobrenos.html">Sobre Nós</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-white" href="faqsac.html">Faq/Sac</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-white" href="/Html/Home/Area-Consultor 1.6/area-consultor.html">Consultores</a>
                    </li>



                </ul>
                <a class=" text-white btn btn-outline-light" href="login.html">Login</a>
            </div>
        </div>
    </nav>

    <!-- MAIN -->

    <!--COTAÇÕES-->
    <div class="container text-center">
  <div class="row">
    <div class="col">
      Column
    </div>
    <div class="col">
      Column
    </div>
    <div class="col">
      Column
    </div>
  </div>
</div>


<div>
<h4>
  <?php 
    echo "Dolar: R$" . (number_format($dados['currencies']['USD']['buy'], 2 , ',' , '.'));
  ?>
</h4>
<h4>
  <?php 
    echo "Euro: R$" . (number_format($dados['currencies']['EUR']['buy'], 2 , ',' , '.'));
  ?>
</h4>
<h4>
  <?php 
    echo "Libras Esterlinas: R$" . (number_format($dados['currencies']['GBP']['buy'], 2 , ',' , '.'));
  ?>
</h4>
<h4>
  <?php 
    echo "Peso Argentino`: R$" . (number_format($dados['currencies']['ARS']['buy'], 2 , ',' , '.'));
  ?>
</h4>
<h4>
  <?php 
    echo "Dolar Canadense: R$" . (number_format($dados['currencies']['CAD']['buy'], 2 , ',' , '.'));
  ?>
</h4>
<h4>
  <?php 
    echo "Dolar Autraliano: R$" . (number_format($dados['currencies']['AUD']['buy'], 2 , ',' , '.'));
  ?>
</h4>
<h4>
  <?php 
    echo "Iene: R$" . (number_format($dados['currencies']['JPY']['buy'], 2 , ',' , '.'));
  ?>
</h4>
<h4>
  <?php 
    echo "Yuan Chinês: R$" . (number_format($dados['currencies']['CNY']['buy'], 2 , ',' , '.'));
  ?>
</h4>
<h4>
  <?php 
    echo "Bitcoin: R$" . (number_format($dados['currencies']['BTC']['buy'], 2 , ',' , '.'));
  ?>
</h4>
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


    <!-- FOOTER -->
    <br><br><br>
    <div class="container-fluid">
        <div class="card border-none">
            <style>
                .card {
                    background-color: transparent;
                    /* Remove o fundo do card */
                }
            </style>
            <div class="card-header bg-transparent border-white text-white">
                <h5>Contato</h5>
            </div>
            <div class="card-body">
                <blockquote class=" text-white mb-0">
                    <p>E-mail Suporte: queroajuda@finannce.com.br</p>
                    <p>Telefone: (11)9999-9999</p>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-instagram" viewBox="0 0 16 16">
                        <path
                            d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                    </svg>
                    <i class="bi bi-instagram">Instagram</i>
                    <br>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-facebook" viewBox="0 0 16 16">
                        <path
                            d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                    </svg>
                    <i class="bi bi-facebook">Facebook</i>
                    <footer class="blockquote-footer text-white"> <cite title="Source Title"></cite></footer>
                </blockquote>
            </div>
        </div>



        <script src="../../Js/Home/bootstrap.bundle.min.js"></script>
</body>

</html>