<?php
include_once "Cls_LoginAdm.php";

$Email_Adm = filter_input(INPUT_GET, "Email_Adm", FILTER_SANITIZE_EMAIL);
$Senha_Adm = filter_input(INPUT_GET, "Senha_Adm");

$login = new Cls_LoginAdm();

$login->setEmail_Adm($Email_Adm);
$login->setSenha_Adm($Senha_Adm);

if(isset($_GET["btn_EntrarAdm"])){
    $Dados = $login->EntrarAdm();

    foreach ($Dados as $Dd){
        session_start();
        $_SESSION["email"] = $Dd->EMAIL_CONSULTOR;
        $_SESSION["nome"] = $Dd->NOME_CONSULTOR;
        $_SESSION["id"] = $Dd->ID_CONSULTOR;
        header('Location: indexAdm.php');
    }
}
?>