<?php 
    include_once "Cls_FAQAdm.php";

    $ID_Pergunta = filter_input(INPUT_GET, "Id_Pergunta");
    $Resposta    = filter_input(INPUT_GET, "Resposta");

    $Adm = new ClsFAQAdm();

    if(isset($_GET["btn_ConsultarPergunta"])){
        $Adm->setID_Pergunta($ID_Pergunta);
        $Retorno = $Adm->ConsultarPergunta();
        echo $Retorno;
    }

    if(isset($_GET["btn_ResponderPergunta"])){
        $Adm->setID_Pergunta($ID_Pergunta);
        $Adm->setResposta($Resposta);
        $Retorno = $Adm->CadastrarResposta();
        echo $Retorno;
        $Adm->EnvioEmailResposta($ID_Pergunta);
    }

    if(isset($_GET["btn_ListarPergunta"])){
        $Retorno = $Adm->ListarPerguntas();
        echo $Retorno;
    }
