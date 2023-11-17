<?php 
    include_once "Cls_FAQAdm.php";

    $ID_Pergunta    = filter_input(INPUT_GET, "Id_Pergunta");
    $Resposta       = filter_input(INPUT_GET, "Resposta");
    $Nome           = filter_input(INPUT_GET, "nome");   
    $Email          = filter_input(INPUT_GET, "email");   
    $Pergunta       = filter_input(INPUT_GET, "Pergunta");

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
        $Retorno = $Adm->EnvioEmailResposta($ID_Pergunta);
        echo $Retorno;
    }    
    
    if(isset($_GET["btn_ListarPergunta"])){
        $Retorno = $Adm->ListarPerguntas();
        echo $Retorno;
    }

    if(isset($_GET["btn_cadPergunta"])){
        $Adm->setNome($Nome);
        $Adm->setEmail($Email);
        $Adm->setPergunta($Pergunta);

        $Retorno = $Adm->CadPergunta();
        echo $Retorno;
        $Retorno = $Adm->EmailPergunta();
    }
