<?php
session_start();

include_once "Cls_ArtigoCliente.php";

$Palavra = filter_input(INPUT_GET, "Titulo");

$Artigos = new Cls_ArtigoCliente();

if(isset($_GET["CarregarArtigos"])){
    $Retorno = $Artigos->CarregarArtigos();
    echo $Retorno;
}

else if(isset($_GET["ProcurarArtigo"])){
    $Artigos->setPalavraChave($Palavra);
    $Dados = $Artigos->ProcurarArtigo();

    foreach ($Dados as $Dd){
        echo $Dd->EMAIL_CLIENTE;
         echo $Dd->NOME_CLIENTE;
        echo $Dd->ID_CLIENTE;
    }    
}