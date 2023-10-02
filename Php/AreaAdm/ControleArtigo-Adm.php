<?php
    include_once "Cls_ArtigoAdm.php";

    $ID_Artigo     = filter_input(INPUT_GET, "IdArtigo", FILTER_SANITIZE_NUMBER_INT);
    $Titulo_Artigo = filter_input(INPUT_GET, "TituloArtigo");
    $Autor_Artigo  = filter_input(INPUT_GET, "AutorArtigo");
    $Texto_Artigo  = filter_input(INPUT_GET, "Artigo");

    $Adm = new ClsArtigoAdm();

    if(isset($_GET["btn_ConsultarArtigo"])){
        $Adm->setID_Artigo($ID_Artigo);
        $Retorno = $Adm->ConsultarArtigo();
        echo $Retorno;
    }

    if(isset($_GET["btn_AdicionarArtigo"])){
        $Adm->setTitulo_Artigo($Titulo_Artigo);
        $Adm->setTexto_Artigo($Texto_Artigo);
        $Adm->setAutor_Artigo($Autor_Artigo);
        $Retorno = $Adm->CadastrarArtigo();
        echo $Retorno;
    }

    if(isset($_GET["btn_ExcluirArtigo"])){
        $Adm->setID_Artigo($ID_Artigo);
        $Retorno = $Adm->ExcluirArtigo();
        echo $Retorno;
    }

    if(isset($_GET["btn_ListarArtigo"])){
        $Adm->setID_Artigo($ID_Artigo);
        $Retorno = $Adm->ListarArtigo();
        echo $Retorno;
    }
?>
