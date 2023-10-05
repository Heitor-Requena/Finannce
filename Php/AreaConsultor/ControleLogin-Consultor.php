<?php
include_once "Cls_LoginConsultor.php";

$Email_Consultor = filter_input(INPUT_GET, "Email_Consultor", FILTER_SANITIZE_EMAIL);
$Senha_Consultor = filter_input(INPUT_GET, "Senha_Consultor");

$EmailCadastro_Consultor = filter_input(INPUT_GET, "EmailCadastro_Consultor", FILTER_SANITIZE_EMAIL);
$NomeCadastro_Consultor  = filter_input(INPUT_GET, "Nome_Consultor", FILTER_SANITIZE_STRING);
$SenhaCadastro_Consultor = filter_input(INPUT_GET, "SenhaCadastro_Consultor");

$login = new Cls_LoginConsultor();

if(isset($_GET["btn_EntrarConsultor"])){
    $login->setEmail_Consultor($Email_Consultor);
    $login->setSenha_Consultor($Senha_Consultor);

    $Dados = $login->EntrarConsultor();
    
    foreach ($Dados as $Dd){
        session_start();
        $_SESSION["email"] = $Dd->EMAIL_ADM;
        $_SESSION["nome"] = $Dd->NOME_ADM;
        $_SESSION["id"] = $Dd->ID_ADM;
        header('Location: indexConsultor.php');
    }
}

if(isset($_GET["btn_CadastrarConsultor"])){
    $login->setEmail_Consultor($EmailCadastro_Consultor);
    $login->setSenha_Consultor($SenhaCadastro_Consultor);
    $login->setNome_Consultor($NomeCadastro_Consultor);
    echo $login->CadastrarConsultor();
}
