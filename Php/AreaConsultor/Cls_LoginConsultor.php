<?php
    class Cls_LoginConsultor{
        private $Email_Consultor;
        private $Senha_Consultor;
        private $Nome_Consultor;
        
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
    
        public function setNome_Consultor($nome){
            $this->Nome_Consultor = $nome;
        }
        //-----------------------------
        public function getFone_Consultor(){
            return $this->Fone_Consultor;
        }

        public function setFone_Consultor($Fone){
            $this->tFone_Consultor = $Fone;
        }
        //-----------------------------
        public function EntrarConsultor(){
            include_once "../conexao.php";
    
            try
            {
                $Comando = $conexao->prepare("SELECT * FROM tb_consultor WHERE EMAIL_CONSULTOR = ? AND SENHA_CONSULTOR = ?;");
                $Comando->bindParam(1, $this->Email_Consultor);
                $Comando->bindParam(2, $this->Senha_Consultor);
    
                if($Comando->execute())
                {
                    if($Comando->rowCount() == 1)
                    {
                        $Retorno = $Comando->fetchALL(PDO::FETCH_OBJ);
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
                $Comando = $conexao->prepare("INSERT INTO tb_consultor (NOME_CONSULTOR, EMAIL_CONSULTOR, SENHA_CONSULTOR, FONE_CONSULTOR) VALUES (?, ?, ?, ?);");
                $Comando->bindParam(1, $this->Nome_Consultor);
                $Comando->bindParam(2, $this->Email_Consultor);
                $Comando->bindParam(3, $this->Senha_Consultor);
                $Comando->bindParam(4, $this->Fone_Consultor);
    
                if($Comando->execute())
                {
                    session_start();
                    $_SESSION["email"] = $this->Email_Consultor;
                    $_SESSION["nome"]  = $this->Nome_Consultor;
                    header('Location: infopess.php');
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
