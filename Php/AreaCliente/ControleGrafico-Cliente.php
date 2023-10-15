<?php 
    include_once "Cls_GraficoCliente.php";
    require_once '../dompdf/autoload.inc.php';
    use Dompdf\Dompdf;

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

    else if(isset($_GET["btn_AdicionarGasto"])){
        $Retorno = $data->AdicionarGasto();
        echo $Retorno;
    }

    else if(isset($_GET["btn_ExcluirGasto"])){
        $Retorno = $data->ExcluirGasto();
        echo $Retorno;
    }

    else if(isset($_GET["GerarGraficoColuna"])){
        $Retorno = $data->GerarGraficoColuna();
        echo $Retorno;
    }

    else if(isset($_GET["GerarTabelaColuna"])){
        $Retorno = $data->GerarTabelaColuna();
        echo $Retorno;
    }

    else if(isset($_GET["btn_Relatorio"])){
        $Retorno = $data->GerarRelatorio();

        echo $Retorno;

        $dompdf = new Dompdf();

        $dompdf->load_Html('<h1 style="text-aling: center;">Relatorio de Gastos</h1>'. $Retorno);

        $dompdf->setPaper('A4', 'portrait');

        $dompdf->render();

        $dompdf->stream("relatorio.pdf", array("Attachment" => false));
    }
?>