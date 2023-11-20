 <?php
    // Inclusão do arquivo que contém a classe ClsAdmUsr
    include_once "Cls_AdmUsr.php";

    // Instanciação do objeto ClsAdmUsr
    $Adm = new ClsAdmUsr;

    // Obtenção e filtragem dos parâmetros da requisição
    $ID_Usr     = filter_input(INPUT_GET, "IdUsr", FILTER_SANITIZE_NUMBER_INT);
    $Email_Usr  = filter_input(INPUT_GET, "EmailUsr", FILTER_SANITIZE_EMAIL);
    $Senha_Usr  = filter_input(INPUT_GET, "SenhaUsr");

    // Configuração dos atributos do objeto ClsAdmUsr
    $Adm->setIdUsr($ID_Usr);
    $Adm->setEmailUsr($Email_Usr);
    $Adm->setSenhaUsr($Senha_Usr);

    // Verificação das ações a serem realizadas com base nos parâmetros da requisição
    if(isset($_GET["btn_ConsultarUsr"])){
        // Chamada do método ConsultarUsr e exibição do retorno
        $Retorno = $Adm->ConsultarUsr();
        echo $Retorno;
    } 
    else if(isset($_GET["btn_ListarUsr"])){
        // Chamada do método ListarUsr e exibição do retorno
        $Retorno = $Adm->ListarUsr();
        echo $Retorno;
    }
    else if(isset($_GET["btn_AltLogUsr"])){
        // Chamada do método AlterarLoginUsr e exibição do retorno
        $Retorno = $Adm->AlterarLoginUsr();
        echo $Retorno;
    }
    else if(isset($_GET["btn_DeletarUsr"])){
        // Chamada do método DeletarUsr e exibição do retorno
        $Retorno = $Adm->DeletarUsr();
        echo $Retorno;
    }
?>
