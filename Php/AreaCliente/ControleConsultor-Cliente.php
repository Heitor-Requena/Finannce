<?php 
    session_start();
    include "Cls_ConsultoresCliente.php";

    $Consultor = new Cls_ConsultoresCliente();

    if(isset($_GET[""])){
        $Retorno = $Consultor->TodosConsultores();
        echo $Retorno;
    }

    else if(isset($_GET[""])){
        $Retorno = $Consultor->PesquisaConsultorNome();
        echo $Retorno;
    }

?>