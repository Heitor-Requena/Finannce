<?php
include_once "Cls_LoginCliente.php";

$Email_Cliente = filter_input(INPUT_GET, "Email_Cliente", FILTER_SANITIZE_EMAIL);
$Senha_Cliente = filter_input(INPUT_GET, "Senha_Cliente");

$EmailCadastro_Cliente = filter_input(INPUT_GET, "EmailCadastro_Cliente", FILTER_SANITIZE_EMAIL);
$NomeCadastro_Cliente = filter_input(INPUT_GET, "Nome_Cliente", FILTER_SANITIZE_STRING);
$SenhaCadastro_Cliente = filter_input(INPUT_GET, "SenhaCadastro_Cliente");
$FoneCadastro_Cliente = filter_input(INPUT_GET, "Fone_Cliente");

$login = new Cls_LoginCliente();

if(isset($_GET["btn_EntrarCliente"])){
    $login->setEmail_Cliente($Email_Cliente);
    $login->setSenha_Cliente($Senha_Cliente);
    echo $login->EntrarCliente();
}

if(isset($_GET["btn_CadastrarCliente"])){
    $login->setEmail_Cliente($EmailCadastro_Cliente);
    $login->setSenha_Cliente($SenhaCadastro_Cliente);
    $login->setNome_Cliente($NomeCadastro_Cliente);
    $login->setFone_Cliente($FoneCadastro_Cliente);
    echo $login->CadastrarCliente();
}

?>