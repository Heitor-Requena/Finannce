<?php
include_once "Cls_LoginAdm.php";

$Email_Adm = filter_input(INPUT_GET, "Email_Adm", FILTER_SANITIZE_EMAIL);
$Senha_Adm = filter_input(INPUT_GET, "Senha_Adm");

$login = new Cls_LoginAdm();

$login->setEmail_Adm($Email_Adm);
$login->setSenha_Adm($Senha_Adm);

if(isset($_GET["btn_EntrarAdm"])){
    echo $login->EntrarAdm();
}
?>