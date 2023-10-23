<?php 
    session_start();
    include "Cls_ConsultoresCliente.php";

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
        $Retorno = $Consultor->PesquisaConsultorNome();
        echo $Retorno;
    }

?>