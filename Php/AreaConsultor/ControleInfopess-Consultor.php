<?php
    session_start();
    include "Cls_InfopessConsultor.php";

    $ID_Consultor           = $_SESSION["id"];
    $Nome_Consultor         = filter_input(INPUT_GET, "Nome");
    $Email_Consultor        = filter_input(INPUT_GET, "Email");
    $Tel_Consultor          = filter_input(INPUT_GET, "Tel");
    $CPF_Consultor          = filter_input(INPUT_GET, "CPF");
    $RG_Consultor           = filter_input(INPUT_GET, "RG");
    $Data_Nascimento        = filter_input(INPUT_GET, "Nasc");
    $CEP                    = filter_input(INPUT_GET, "CEP");
    $Rua                    = filter_input(INPUT_GET, "Rua");
    $Bairro                 = filter_input(INPUT_GET, "Bairro");
    $Numero_Casa            = filter_input(INPUT_GET, "Numero");
    $Complemento_Consultor  = filter_input(INPUT_GET, "Complemento");
    $Cidade                 = filter_input(INPUT_GET, "Cidade");
    $Estado                 = filter_input(INPUT_GET, "Estado");
    $Modalidade             = filter_input(INPUT_GET, "Modalidade");
    $PubAlvo                = filter_input(INPUT_GET, "PubAlvo");
    $Formacao               = filter_input(INPUT_GET, "Formacao");
    $Experiencia            = filter_input(INPUT_GET, "Experiencia");
    $Habilidade             = filter_input(INPUT_GET, "Habilidade");
    $TempCons               = filter_input(INPUT_GET, "TempCons");
    $Link                   = filter_input(INPUT_GET, "Link");
 
    
    $Dados = new Cls_InfopessConsultor();

    if(isset($_GET["CarregarDados"])){
        $Dados->setID_Consultor($ID_Consultor);
        $Retorno = $Dados->CarregarDados();
        echo $Retorno;
    }

    else if(isset($_GET["Salvar"])){
        $Dados->setID_Consultor($ID_Consultor);
        $Dados->setNomeConsultor($Nome_Consultor);
        $Dados->setEmailConsultor($Email_Consultor);
        $Dados->setTelConsultor($Tel_Consultor);
        $Dados->setCPFConsultor($CPF_Consultor);
        $Dados->setRGConsultor($RG_Consultor);
        $Dados->setDataNasc($Data_Nascimento);
        $Dados->setCEPConsultor($CEP);
        $Dados->setRuaConsultor($Rua);
        $Dados->setBairroConsultor($Bairro);
        $Dados->setNumeroCasaConsultor($Numero_Casa);
        $Dados->setComplementoConsultor($Complemento_Consultor);
        $Dados->setCidadeConsultor($Cidade);
        $Dados->setEstadoConsultor($Estado);
        $Dados->setModalidadeConsultor($Modalidade);
        $Dados->setPubAlvoConsultor($PubAlvo);
        $Dados->setFormacaoConsultor($Formacao);
        $Dados->setExperienciaConsultor($Experiencia);
        $Dados->setHabilidadeConsultor($Habilidade);
        $Dados->setTempConsConsultor($TempCons);
        $Dados->setLinkConsultor($Link);

        $Retorno = $Dados->SalvarDados();
        echo $Retorno;
    }

    else if (isset($_POST["SalvarAnexo"])){  
        $Dados->setID_Consultor($ID_Consultor);
        
        $ArquivoAtual   = $_FILES['Avatar_Consultor']['name'];
        $ArquivoTmp     = $_FILES['Avatar_Consultor']['tmp_name'];
        $Destino        = 'Imagens/' . $ArquivoAtual;

        
        move_uploaded_file($ArquivoTmp, $Destino);
        
        $Imagem = file_get_contents("http://localhost/finannce/PHP/AreaConsultor/Imagens/" . $ArquivoAtual);
        $Dados->setImagem($Imagem);

        $Retorno = $Dados->SalvarAnexo();
        echo $Retorno;
    }

    else if (isset($_POST["ConsultarAnexo"])){
        $Dados->setID_Consultor($ID_Consultor);
        $Retorno = $Dados->VerFotoPerfil();
        echo $Retorno;
    }
    
?>