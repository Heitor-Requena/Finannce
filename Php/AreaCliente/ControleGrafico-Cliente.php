<?php 
    include_once "Cls_GraficoCliente.php";

    session_start();
    $ID_Cliente  = $_SESSION["id"];
    $ID_Gasto    = filter_input(INPUT_GET, "Id_Gasto", FILTER_SANITIZE_NUMBER_INT);
    $Nome_Gasto  = filter_input(INPUT_GET, "NomeGasto", FILTER_SANITIZE_STRING);
    $Valor_Gasto = filter_input(INPUT_GET, "ValorGasto");

    $data = new Cls_GraficoCliente();

    $data->setID_Cliente($ID_Cliente);
    $data->setNome_Gasto($Nome_Gasto);
    $data->setValor_Gasto($Valor_Gasto);
    $data->setID_Gasto($ID_Gasto);


    if(isset($_GET["GerarGraficoRosca"])){
        $Retorno = $data->GerarGraficoRosca();
        echo $Retorno;
    }

    else if(isset($_GET["GerarTabelaRosca"])){
        $Retorno = $data->GerarTabelaRosca();
        echo $Retorno;
    }
    
    else if(isset($_GET["GerarGraficoBarra"])){
        $Retorno = $data->GerarGraficoBarra();
        echo $Retorno;
    }

    else if(isset($_GET["GerarGraficoLinha"])){
        $Retorno = $data->GerarGraficoLinha();
        echo $Retorno;
    }

    else if(isset($_GET["btn_AdicionarGasto"])){
        $Retorno = $data->AdicionarGasto();
        echo $Retorno;
    }

    else if(isset($_GET["btn_ExcluirGasto"])){
        $Retorno = $data->ExcluirGasto();
        echo $Retorno;
    }
?>