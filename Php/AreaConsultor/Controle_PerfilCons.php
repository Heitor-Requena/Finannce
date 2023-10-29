<?php
    session_start();
    include_once "Cls_PerfilCons.php";

    /*Imagem*/
    /*
    echo 'Você enviou o arquivo: '. $_FILES[ 'Arquivo' ][ 'name' ]. '<br/>';
    echo 'Este arquivo é do tipo: '. $_FILES[ 'Arquivo' ][ 'type' ]. '<br/>';
    echo 'Este arquivo tem a extensão: '. pathinfo($_FILES[ 'Arquivo' ][ 'name' ], PATHINFO_EXTENSION) . '<br/>';
    echo 'Temporariamente foi salvo em: '. $_FILES[ 'Arquivo' ][ 'tmp_name' ]. '<br/>';
    echo 'Seu tamanho é: '. $_FILES[ 'Arquivo' ][ 'size' ]. 'Bytes<br/><br/>';
    */

    /*Variaveis para cadastro do perfil consultor*/
    $Id_Consultor        = $_SESSION['id'];
    $Nome_Consultor      = filter_input(INPUT_POST, "Nome", FILTER_SANITIZE_STRING);
    $Email_Consultor     = filter_input(INPUT_POST, "Email", FILTER_SANITIZE_EMAIL);
    $Tefone              = filter_input(INPUT_POST, "Tel");
    $Cpf_Consultor       = filter_input(INPUT_POST, "CNPJ");
    $RG_Consultor        = filter_input(INPUT_POST, "RG");

    //FOTO PERFIl
    $Avatar_Consultor = $_FILES[ 'Avatar_Consultor' ][ 'name' ];
    $Avatar_Consultor_temp = $_FILES[ 'Avatar_Consultor' ][ 'tmp_name' ];
    $Destino =  'Img/'.$Avatar_Consultor;

    $Anexo_Consultor      = $_FILES[ 'Anexo_Consultor' ][ 'name' ];
    $Anexo_Consultor_temp = $_FILES[ 'Anexo_Consultor' ][ 'tmp_name' ];
    $Destino =  'Img/'.$Anexo_Consultor;

    $CEP          = filter_input(INPUT_POST, "CEP");
    $Rua          = filter_input(INPUT_POST, "Rua");
    $Bairro       = filter_input(INPUT_POST, "Bairro");
    $Numero       = filter_input(INPUT_POST, "Numero");
    $Complemento  = filter_input(INPUT_POST, "Complemento");
    $Cidade       = filter_input(INPUT_POST, "Cidade");
    $Estado       = filter_input(INPUT_POST, "Estado");
    $Modalidade   = filter_input(INPUT_POST, "Modalidade");
    $Publico_Alvo = filter_input(INPUT_POST, "PubAlvo");
    $Formacao     = filter_input(INPUT_POST, "Formacao");
    $Experiencia  = filter_input(INPUT_POST, "Experiencia");
    $Habilidades  = filter_input(INPUT_POST, "Habilidades");
    $Duracao_Cons = filter_input(INPUT_POST, "TempCons");

    $Cad = new Cls_PerfilCons();

    $Cad->setID_Consultor($Id_Consultor);
    $Cad->setNome_Consultor($Nome_Consultor);
    $Cad->setEmail_Consultor($Email_Consultor);
    $Cad->setTelefone_Consultor($Telefone);
    $Cad->setCPF_Consultor($Cpf_Consultor);
    $Cad->setRG_Consultor($RG_Consultor);
    $Cad->setFoto_Consultor($Avatar_Consultor);
    $Cad->setAnexo_Consultor($Anexo_Consultor);
    $Cad->setCEP_Consultor($CEP);
    $Cad->setRua_Consultor($Rua);
    $Cad->setBairro_Consultor($Bairro);
    $Cad->setNumero_Consultor($Numero);
    $Cad->setComplemento_Consultor($Complemento);
    $Cad->setCidade_Consultor($Cidade);
    $Cad->setEstado_Consultor($Estado);
    $Cad->setModalidade_Consultor($Modalidade);
    $Cad->setPublicoAlvo_Consultor($Publico_Alvo);
    $Cad->setFormacao_Consultor($Formacao);
    $Cad->setExperiencia_Consultor($Experiencia);
    $Cad->setHabilidades_Consultor($Habilidades);
    $Cad->setDuracao_Consultoria($Duracao_Cons);

    if(isset($_GET["btn_EnviarInfo"])){
        $Retorno = $Cad->SalvarDadosConsultor();
        echo $Retorno;
    }

    else if(isset($_GET["CarregarDados"])){
        $Retorno = $Cad->CarregarDados();
        echo $Retorno;
    }
?> 