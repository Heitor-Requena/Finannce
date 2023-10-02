<?php
include_once "Cls_ArtigoCliente.php";

$Artigos = new Cls_ArtigoCliente();

if(isset($_GET["CarregarArtigos"])){
    $Retorno = $Artigos->CarregarArtigos();
    echo $Retorno;
}
?>