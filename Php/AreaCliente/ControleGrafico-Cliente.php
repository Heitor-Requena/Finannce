<?php 
    include_once "Cls_GraficoCliente.php";

    session_start();
    $ID_Cliente  = $_SESSION["id"];
    $Nome_Gasto  = filter_input(INPUT_GET, "");
    $Valor_Gasto = filter_input(INPUT_GET, "");

    $data = new Cls_GraficoCliente();

    $data->setID_Cliente($ID_Cliente);
    $data->setNome_Gasto($Nome_Gasto);
    $data->setValor_Gasto($Valor_Gasto);


    if(isset($_GET["GerarGraficoRosca"])){
        $Retorno = $data->GerarGraficoRosca();
        echo $Retorno;
    }
    
    if(isset($_GET["GerarGraficoBarra"])){
        $Retorno = $data->GerarGraficoBarra();
        echo $Retorno;
    }

    if(isset($_GET["GerarGraficoLinha"])){
        $Retorno = $data->GerarGraficoLinha();
        echo $Retorno;
    }

    if(isset($_GET["btn_AdicionarGasto"])){
        $Retorno = $data->AdicionarGasto();
        echo $Retorno;
    }

    if(isset($_GET["btn_ExcluirGasto"])){
        $Retorno = $data->ExcluirGasto();
        echo $Retorno;
    }
?>