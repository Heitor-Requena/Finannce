<?php
    session_start();
    include_once "Cls_InfopessCliente.php";

    $ID_Cliente          = $_SESSION["id"];
    $Nome_Cliente        = filter_input(INPUT_GET, "Nome", FILTER_SANITIZE_NUMBER_INT);
    $Email_Cliente       = filter_input(INPUT_GET, "Email", );
    $CPF_Cliente         = filter_input(INPUT_GET, "CPF", );
    $RG_Cliente          = filter_input(INPUT_GET, "RG", );
    $Data_Nascimento     = filter_input(INPUT_GET, "Nasc", );
    $CEP                 = filter_input(INPUT_GET, "CEP", );
    $Rua                 = filter_input(INPUT_GET, "Rua", );
    $Bairro              = filter_input(INPUT_GET, "Bairro", );
    $Numero_Casa         = filter_input(INPUT_GET, "Numero", FILTER_SANITIZE_NUMBER_INT);
    $Complemento_Cliente = filter_input(INPUT_GET, "Complemento", );
    $Cidade              = filter_input(INPUT_GET, "Cidade", );
    $Estado              = filter_input(INPUT_GET, "Estado", );

    $Dados = new Cls_InfopessCliente();

    $Dados->setID_Cliente($ID_Cliente);
    $Dados->setNomeCliente($Nome_Cliente);
    $Dados->setEmailCliente($Email_Cliente);
    $Dados->setCPFCliente($CPF_Cliente);
    $Dados->setRGCliente($RG_Cliente);
    $Dados->setDataNasc($Data_Nascimento);
    $Dados->setCEPCliente($CEP);
    $Dados->setRuaCliente($Rua);
    $Dados->setBairroCliente($Bairro);
    $Dados->setNumeroCasaCliente($Numero_Casa);
    $Dados->setComplementoCliente($Complemento_Cliente);
    $Dados->setCidadeCliente($Cidade);
    $Dados->setEstadoCliente($Estado);


    if(isset($_GET["CarregarDados"])){
        $Retorno = $Dados->CarregarDados();
        echo $Retorno;
    }

    else if(isset($_GET["Salvar"])){
        $Retorno = $Dados->SalvarDados();
        echo $Retorno;
    }
    
?>