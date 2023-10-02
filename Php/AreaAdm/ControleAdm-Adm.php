<?php
    include_once "Cls_AdmAdm.php";

    $Adm = new ClsAdmAdm;

    $Id_Adm     = filter_input(INPUT_GET, "IdAdm", FILTER_SANITIZE_NUMBER_INT);
    $Nome_Adm   = filter_input(INPUT_GET, "NomeAdm");
    $Email_Adm  = filter_input(INPUT_GET, "EmailAdm", FILTER_SANITIZE_EMAIL);
    $Cpf_Adm    = filter_input(INPUT_GET, "CPFAdm");
    $Rg_Adm     = filter_input(INPUT_GET, "RGAdm");
    $Senha_Adm  = filter_input(INPUT_GET, "SenhaAdm");

    $Adm->setIdAdm($Id_Adm);
    $Adm->setNomeAdm($Nome_Adm);
    $Adm->setEmailAdm($Email_Adm);
    $Adm->setCpfAdm($Cpf_Adm);
    $Adm->setRgAdm($Rg_Adm);
    $Adm->setSenhaAdm($Senha_Adm);

    if (isset($_GET["btn_CadAdm"])){
        $Retorno = $Adm->CadAdm();
        echo $Retorno;
    }
    else if(isset($_GET["btn_ConsAdm"])){
        $Retorno = $Adm->ConsAdm();
        echo $Retorno;
    }
    else if(isset($_GET["btn_ListAdm"])){
        $Retorno = $Adm->ListAdm();
        echo $Retorno;
    }
    else if (isset($_GET["btn_AltLogAdm"])){
        $Retorno = $Adm->AltLogAdm();
        echo $Retorno;
    }
    else if (isset($_GET["btn_DelAdm"])){
        $Retorno = $Adm->DelAdm();
        echo $Retorno;
    }