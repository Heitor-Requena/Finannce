<?php
include_once "Cls_Faq.php";

$Nome     = filter_input(INPUT_GET, "Nome_Usuario", FILTER_SANITIZE_STRING);
$Email    = filter_input(INPUT_GET, "Email_Usuario", FILTER_SANITIZE_EMAIL);
$Pergunta = filter_input(INPUT_GET, "Pergunta_Usuario");

$Faq = new ClsFaq();

if(isset($_GET["btn_EnviarPergunta"])){
    $Faq->setNome_Usuario($Nome);
    $Faq->setEmail_Usuario($Email);
    $Faq->setPergunta($Pergunta);
    $Retorno = $Faq->CadastrarPergunta();
    echo $Retorno;
}

else if(isset($_GET["CarregarPerguntas"])){
    $Retorno = $Faq->CarregarPerguntas();
    echo $Retorno;
}
?>