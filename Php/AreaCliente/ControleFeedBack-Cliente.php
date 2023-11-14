<?php 
session_start();

include_once "Cls_FeedBackCliente.php";

$ID_Cliente      = $_SESSION["id"];
$ID_FeedBack     = filter_input(INPUT_GET, "ID_FeedBack", FILTER_VALIDATE_INT);
$Nome_Consultor  = filter_input(INPUT_GET, "Nome_Consultor", FILTER_SANITIZE_STRING);
$Email_Consultor = filter_input(INPUT_GET, "Email_Consultor", FILTER_VALIDATE_EMAIL);
$Avaliacao       = filter_input(INPUT_GET, "Avaliacao");
$Nota            = filter_input(INPUT_GET, "Nota_Consultor", FILTER_VALIDATE_INT);

$feedback = new Cls_FeedBack();

if(isset($_GET["btn_CadastrarFeedBack"])){
    $feedback->setID_Cliente($ID_Cliente);
    $feedback->setNome_Consultor($Nome_Consultor);
    $feedback->setEmail_Consultor($Email_Consultor);
    $feedback->setAvaliacao($Avaliacao);
    $feedback->setNota($Nota);

    $Retorno = $feedback->CadastrarFeedBack();
    echo $Retorno;
}

else if(isset($_GET["btn_ExcluirFeedBack"])){
    $feedback->setID_FeedBack($ID_FeedBack);

    $Retorno = $feedback->ExcluirFeedBack();
    echo $Retorno;
}

else if(isset($_GET["btn_ListarFeedBack"])){
    $feedback->setID_Cliente($ID_Cliente);

    $Retorno = $feedback->ListarFeedBack();
    echo $Retorno;
}

?>