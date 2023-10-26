<?php

class Cls_PerfilCons{
    private $Email_Consultor;
    private $Senha_Consultor;
    private $Nome_Consultor;
    private $Fone_Consultor;
    private $Data_Entrada;
    private $Modalidade;
    private $Publico;
    private $Duracao_Cons;
    private $Formacao;
    private $Avaliacao;
    private $Anexo_Cons;
    
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
    public function getNome_Consultor(){
        return $this->Senha_Consultor;
    }

    public function setNome_Consultor($nome_con){
        $this->Nome_Consultor = $nome_con;
    }
    //------------------------------
    public function getFone_Consultor(){
        return $this->Senha_Consultor;
    }

    public function setFone_Consultor($fone){
        $this->Fone_Consultor = $fone;
    }

    //-----------------------------
    public function getData_Entrada(){
        return $this->Data_Entrada;
    }

    public function setData_Entrada($dt_entrada){
        $this->Data_Entrada = $dt_entrada;
    }


    //------------------------------

    public function getModalidade(){
        return $this->Modalidade;
    }

    public function setModalidade($modali){
        $this->Modalidade = $modali;
    }
    //--------------------------

    public function getPublico(){
        return $this->Publico;
    }

    public function setPublico($publi){
        $this->Publico = $publi;
    }
    //-------------------------
    public function getDuracao_Cons(){
        return $this->Duracao_Cons;
    }

    public function setDuracao_Cons($duracao){
        $this->Duracao_Cons = $duracao;
    }
    //---------------------------------
    public function getFormacao(){
        return $this->Formacao;
    }

    public function setFormacao($formac){
        $this->Formacao = $formac;
    }
    //----------------------------------
    public function getAnexo_Cons(){
        return $this->Anexo_Cons;
    }
    public function setAnexo_Cons($anexo){
        $this->Anexo_Cons = $anexo;
    }
    //---------------------------------



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
            $Comando = $conexao->prepare("INSERT INTO tb_Consultor(NOME_CONSULTOR, EMAIL_CONSULTOR, SENHA_CONSULTOR, CEL_CONSULTOR, DATA_ENTRADA, MODALIDADE, PUBLICO, DURACAO_CONS, FORMACAO, EXPERIENCIA, HABILIDADE, ANEXO_CONSULTOR) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
            $Comando->bindParam(1, $this->Nome_Consultor);
            $Comando->bindParam(2, $this->Email_Consultor);
            $Comando->bindParam(3, $this->Senha_Consultor);
            $Comando->bindParam(4, $this->Fone_Consultor);
            $Comando->bindParam(5, $this->Data_Entrada);
            $Comando->bindParam(6, $this->Modalidade);
            $Comando->bindParam(7, $this->Publico);
            $Comando->bindParam(8, $this->Duracao_Cons);
            $Comando->bindParam(9, $this->Formacao);
            $Comando->bindParam(10, $this->Experiencia );
            $Comando->bindParam(11, $this->Habilidade);
            $Comando->bindParam(13, $this->Anexo_Cons);
           

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