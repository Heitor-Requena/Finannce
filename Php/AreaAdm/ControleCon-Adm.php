<?php
include_once "Cls_AdmCon.php";

$Adm = new ClsAdmCon;

$ID_Con     = filter_input(INPUT_GET, "IdCon", FILTER_SANITIZE_NUMBER_INT);
$Email_Con  = filter_input(INPUT_GET, "EmailCon", FILTER_SANITIZE_EMAIL);
$Senha_Con  = filter_input(INPUT_GET, "SenhaCon");

$Adm->setIdCon($ID_Con);
$Adm->setEmailCon($Email_Con);
$Adm->setSenhaCon($Senha_Con);

if (isset($_GET["btn_ConsultarCon"])) {
    $Retorno = $Adm->ConsultarCon();
    echo $Retorno;
} else if (isset($_GET["btn_ListarCon"])) {
    $Retorno = $Adm->ListarCon();
    echo $Retorno;
} else if (isset($_GET["btn_ConsultoresAtivados"])) {
    $Retorno = $Adm->ListarConA();
    echo $Retorno;
} else if (isset($_GET["btn_ConsultoresDesativados"])) {
    $Retorno = $Adm->ListarConD();
    echo $Retorno;
} else if (isset($_GET["btn_DesativarConsultor"])) {
    $Retorno = $Adm->DesatCon();
    echo $Retorno;
}  else if(isset($_GET["btn_AtivarConsultor"])) {
    $Retorno = $Adm->AtvCon();
    echo $Retorno;
    $Adm->EnvioEmail();
}
else if (isset($_GET["btn_AltLogCon"])) {
    $Retorno = $Adm->AlterarLoginCon();
    echo $Retorno;
} else if (isset($_GET["btn_DeletarCon"])) {
    $Retorno = $Adm->DeletarCon();
    echo $Retorno;
}
