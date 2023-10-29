<?php

class Cls_PerfilCons{
    private $Nome_Consultor;
    private $Email_Consultor;
    private $Senha_Consultor;  
    private $Fone_Consultor;
    private $Avatar_Consutor;
    private $Anexo_Consultor;
    private $Status_Consultor;
    private $Avaliaçao_consultor;
    private $Data_Entrada;
    private $Publico;
    private $Modalidade;
    private $Formacao;
    private $Experiencia ;
    private $Habilidade;
    private $Duracao_Cons;

    //--------------------------------
    public function getNome_Consultor(){
        return $this->Nome_Consultor;
    }

    public function setNome_Consultor($nome_con){
        $this->Nome_Consultor = $nome_con;
    }
    //------------------------------
    public function getEmail_Consultor(){
        return $this->Email_Consultor;
    }

    public function setEmail_Consultor($email){
        $this->Email_Consultor = $email;
    }

    //------------------------------
    public function getSenha_Consultor(){
        return $this->Senha_Consultor;
    }

    public function setSenha_Consultor($senha){
        $this->Senha_Consultor = $senha;
    }
     
    //------------------------------
    public function getFone_Consultor(){
        return $this->Fone_Consultor;
    }

    public function setFone_Consultor($fone){
        $this->Fone_Consultor = $fone;
    }

    //-----------------------------
    public function getAvatar_Consultor(){
        return $this->Avatar_Consutor;
    }

    public function setAvatar_Consultor($avatar){
        $this->Avatar_Consutor = $avatar;
    }

    //-----------------------------
    public function getStatus_Consultor(){
        return $this->Status_Consultor;
    }

    public function setStatus_Consultor($status){
        $this->Status_Consultor = $status;
    }


    //-----------------------------
    public function getAnexo_Consultor(){
        return $this->Anexo_Consultor;
    }

    public function setAnexo_Consultor($anexo){
        $this->Anexo_Consultor = $anexo;
    }

    //-----------------------------
    public function getAvaliaçao_consultor(){
        return $this->Avaliaçao_consultor;
    }

    public function setAvaliaçao_consultor($avalia){
        $this->Avaliaçao_consultor = $avalia;
    }
    //-----------------------------
     
    public function getData_Entrada(){
        return $this->Data_Entrada;
    }

    public function setData_Entrada($dt_entrada){
        $this->Data_Entrada = $dt_entrada;
    }

      //--------------------------

      public function getPublico(){
        return $this->Publico;
    }

    public function setPublico($publi){
        $this->Publico = $publi;
    }
    //------------------------------

    public function getModalidade(){
        return $this->Modalidade;
    }

    public function setModalidade($modali){
        $this->Modalidade = $modali;
    }
  
    //---------------------------------
    public function getFormacao(){
        return $this->Formacao;
    }

    public function setFormacao($formac){
        $this->Formacao = $formac;
    }
    //---------------------------------
    public function getExperiencia(){
        return $this->Experiencia;
    }

    public function setExperiencia($experi){
        $this->Experiencia = $experi;
    }

    //---------------------------------
    public function getHabilidade(){
        return $this->Habilidade;
    }

    public function setHabilidade($habil){
        $this->Habilidade = $habil;
    }

    //-------------------------
      public function getDuracao_Cons(){
        return $this->Duracao_Cons;
    }

    public function setDuracao_Cons($duracao){
        $this->Duracao_Cons = $duracao;
    }
    //----------------------------------


    public function EntrarConsultor(){
        include_once "../conexao.php";

        try
        {
            $Comando = $conexao->prepare("SELECT * FROM tb_consultor WHERE EMAIL_Consultor = ? AND SENHA_Consultor = ?;");
            $Comando->bindParam(1, $this->Email_Consultor);
            $Comando->bindParam(2, $this->Senha_Consultor);

            if($Comando->execute())
            {
                if($Comando->rowCount() == 1)
                {
                    session_start();
                    $_SESSION["email"] = $this->Email_Consultor;
                    header('Location: http://localhost/Finannce/Php/AreaConsultor/indexConsultor.php');
                }
            }
            else
            {   
                $Retorno = "<script>alert('Usúario incorreto. Parte 1')</script>";
            }
        }
        catch (PDOException $Erro)
        {
            $Retorno = "ERRO: " . $Erro->getMessage();
        }
        
        return $Retorno;
    }

    //---------------------------------
    public function CadastrarConsultor(){
        include_once "../conexao.php";

        try
        {
            $Comando = $conexao->prepare("INSERT INTO tb_Consultor(NOME_CONSULTOR, EMAIL_CONSULTOR, SENHA_CONSULTOR, CPF_CONSULTOR, RG_CONSULTOR, FONE_CONSULTOR, CEP_CONSULTOR, RUA_CONSULTOR, BAIRRO_CONSULTOR, NUMERO_CASA_CONSULTOR, COMPLEMENTO_CONSULTOR, CIDADE_CONSULTOR, ESTADO_CONSULTOR, AVATAR_CONSULTOR, ANEXO_CONSULTOR, STATUS_CONSULTOR, AVALIAÇAO_CONSULTOR, MODALIDADE, PUBLICO_ALVO, FORMACAO, EXPERIENCIA, HABILIDADE, DURACAO_CONS) WHERE ID = ? VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
            $Comando->bindParam(1, $this->Nome_Consultor);
            $Comando->bindParam(1, $this->Nome_Consultor);
            $Comando->bindParam(2, $this->Email_Consultor);
            $Comando->bindParam(3, $this->Senha_Consultor);
            $Comando->bindParam(4, $this->Fone_Consultor);
            $Comando->bindParam(5, $this->$Avatar_Consutor);
            $Comando->bindParam(6, $this->$Anexo_Consultor);
            $Comando->bindParam(7, $this->$Status_Consultor);
            $Comando->bindParam(8, $this->$Avaliaçao_consultor);
            $Comando->bindParam(9, $this->$Data_Entrada);
            $Comando->bindParam(10, $this->$Modalidade);
            $Comando->bindParam(11, $this->$Publico);
            $Comando->bindParam(12, $this->$Formacao);
            $Comando->bindParam(13, $this->$Experiencia );
            $Comando->bindParam(14, $this->$Habilidade);
            $Comando->bindParam(15, $this->$Duracao_Cons);

           

            if($Comando->execute())
            {
                session_start();
                $_SESSION["email"] = $this->Email_Consultor;
                $_SESSION["nome"]  = $this->Nome_Consultor;
                header('Location: http://localhost/Finannce/Php/AreaConsultor/indexConsultor.php');
            }
            else
            {   
                $Retorno = "<script>alert('ERRO NO CADASTRO')</script>";
            }
        }
        catch (PDOException $Erro)
        {
            $Retorno = "ERRO: " . $Erro->getMessage();
        }
        
        return $Retorno;
    }


   

}




?>