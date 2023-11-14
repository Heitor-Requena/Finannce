<?php
    include_once "Cls_AdmUsr.php";

    $Adm = new ClsAdmUsr;

    $ID_Usr     = filter_input(INPUT_GET, "IdUsr", FILTER_SANITIZE_NUMBER_INT);
    $Email_Usr  = filter_input(INPUT_GET, "EmailUsr", FILTER_SANITIZE_EMAIL);
    $Senha_Usr  = filter_input(INPUT_GET, "SenhaUsr");

    $Adm->setIdUsr($ID_Usr);
    $Adm->setEmailUsr($Email_Usr);
    $Adm->setSenhaUsr($Senha_Usr);

    if(isset($_GET["btn_ConsultarUsr"])){
        $Retorno = $Adm->ConsultarUsr();
        echo $Retorno;
    } 
    else if(isset($_GET["btn_ListarUsr"])){
        $Retorno = $Adm->ListarUsr();
        echo $Retorno;
    }
    else if(isset($_GET["btn_AltLogUsr"])){
        $Retorno = $Adm->AlterarLoginUsr();
        echo $Retorno;
    }
    else if(isset($_GET["btn_DeletarUsr"])){
        $Retorno = $Adm->DeletarUsr();
        echo $Retorno;
    }
