<?php
    session_start();
    include_once "Cls_InfopessCliente.php";

    $ID_Cliente          = $_SESSION["id"];
    $Nome_Cliente        = filter_input(INPUT_GET, "", FILTER_SANITIZE_NUMBER_INT);
    $Email_Cliente       = filter_input(INPUT_GET, "", FILTER_SANITIZE_STRING);
    $CPF_Cliente         = filter_input(INPUT_GET, "", );
    $RG_Cliente          = filter_input(INPUT_GET, "", FILTER_SANITIZE_STRING);
    $Data_Nascimento     = filter_input(INPUT_GET, "", );
    $CEP                 = filter_input(INPUT_GET, "", FILTER_SANITIZE_STRING);
    $Rua                 = filter_input(INPUT_GET, "", );
    $Bairro              = filter_input(INPUT_GET, "", FILTER_SANITIZE_STRING);
    $Numero_Casa         = filter_input(INPUT_GET, "", FILTER_SANITIZE_NUMBER_INT);
    $Complemento_Cliente = filter_input(INPUT_GET, "", FILTER_SANITIZE_STRING);
    $Cidade              = filter_input(INPUT_GET, "", );
    $Estado              = filter_input(INPUT_GET, "", FILTER_SANITIZE_STRING);

    $Dados = new Cls_InfopessCliente();

    $Dados->setID_Cliente($ID_Cliente);


    if(isset($_GET["CarregarDados"])){
        $Retorno = $Dados->CarregarDados();
        echo $Retorno;
    }

    /*
    else if(isset($_GET[""])){
        $Retorno = $Dados->();
        echo $Retorno;
    }
    */
?>