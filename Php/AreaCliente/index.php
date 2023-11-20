
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



<!--COTAÇÕES-->
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



