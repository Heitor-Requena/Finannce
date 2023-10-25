<?php
   

    include_once "Cls_PerfilCons.php";

    /*Variaveis para logar*/
    $Email_Consultor          = filter_input(INPUT_GET, "Email_Consultor ", FILTER_SANITIZE_EMAIL);
    $Senha_Consultor          = filter_input(INPUT_GET, "Senha_Consultor ", );


    /*Variaveis para cadastro do perfil consultor*/
    $Data_Entrada = filter_input(INPUT_POST, "Data_Entrada", );
    $Modalidade = filter_input(INPUT_POST, "Modalidade");
    $Publico = filter_input(INPUT_POST, "Publico");
    $Duracao_Cons = filter_input(INPUT_POST, "Duracao_Cons");
    $Valor = filter_input(INPUT_POST, "Valor");
    $Formacao = filter_input(INPUT_POST, "Formacao");
    $Experiencia = filter_input(INPUT_POST, "Experiencia");
    $Habilidade = filter_input(INPUT_POST, "Habilidade");
    $Avaliacao = filter_input(INPUT_POST, "Avaliacao");
    $Anexo_Cons= filter_input(INPUT_POST, "Anexo_Cons");
    

    /*Envio dos dados para a classe*/
    $Cad->setData_entrada($Data_Entrada);
    $Cad->setModalidade($Modalidade);
    $Cad->setPublico($Publico);
    $Cad->setDuracao_Cons($Duracao_Cons);
    $Cad->setFormacao($Formacao);
    $Cad->setExperiencia ($Experiencia);
    $Cad->setHabilidade ($Habilidades);
    $Cad->setAnexo_Cons($Anexo_Cons);


    if(isset($_GET["btn_CadastrarConsultor"])){
        $login->setEmail_Consultor($EmailCadastro_Consultor);
        $login->setNome_Consultor($NomeCadastro_Consultor);
        $login->setSenha_Consultor($SenhaCadastro_Consultor);

    echo $login->CadastrarConsultor();
}

/*Chama a função para logar como colaborador ou Adm*/
    if(isset($_GET["EntrarColab"]))
    {
        echo $Cad->EntrarColab();
    }

?> 