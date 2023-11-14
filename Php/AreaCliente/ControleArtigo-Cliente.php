<?php
session_start();

include_once "Cls_ArtigoCliente.php";

$Palavra = filter_input(INPUT_GET, "Titulo");

$Artigos = new Cls_ArtigoCliente();

if(isset($_GET["CarregarArtigos"])){
    $Retorno = $Artigos->CarregarArtigos();
    echo $Retorno;
}

else if(isset($_GET["btn_PesquisaTitulo"])){
    $Artigos->setPalavraChave($Palavra);
    $Retorno = $Artigos->ProcurarArtigo();
    echo $Retorno;
}
?>