<?php
session_start();
include_once "Cls_FeedBackConsultor.php";

$feedback = new Cls_FeedBackConsultor();

$Nome  = $_SESSION["nome"];
$Email = $_SESSION["email"];

$feedback->setEmail_Consultor($Email);
$feedback->setNome_Consultor($Nome);

if(isset($_GET["btn_FeedBack"])){
    $Retorno = $feedback->TodosFeedBacks();
    echo $Retorno;
}

?>