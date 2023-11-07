<?php 
    session_start();
    include "Cls_ConsultoresCliente.php";

    $Nome_Consultor = filter_input(INPUT_GET,"Nome_Consultor");

    $Consultor = new Cls_ConsultoresCliente();

    if(isset($_GET["TodosConsultores"])){
        $Retorno = $Consultor->TodosConsultores();
        echo $Retorno;
    }

    else if(isset($_GET["ConsultorAnuncio"])){
        $Retorno = $Consultor->ConsultoresAnuncio();
        echo $Retorno;
    }

    else if(isset($_GET["btn_ConsultorNome"])){
        $Consultor->setNome_Consultor($Nome_Consultor);
        $Retorno = $Consultor->PesquisaConsultorNome();
        echo $Retorno;
    }
