<?php
session_start();
include_once "Cls_RecSenhaAdm.php";

$RecSenha = new Cls_RecSenha();

$Email = filter_input(INPUT_GET, "Email");
$Senha = filter_input(INPUT_GET, "NovaSenha");

$RecSenha->setEmail($Email);
$RecSenha->setNovaSenha($Senha);

if (isset($_GET["btn_RecSenha"])) {
    $Retorno = $RecSenha->RecSenha();
    echo $Retorno;
} else if (isset($_GET["btn_AltSenha"])) {
    $Retorno = $RecSenha->AltSenha();
    echo $Retorno;
}
