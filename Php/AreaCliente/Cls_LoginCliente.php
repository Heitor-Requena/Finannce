<?php
    class Cls_LoginCliente{
        private $Email_Cliente;
        private $Senha_Cliente;
        private $Nome_Cliente;
        private $Fone_Cliente;
        
        //------------------------------
        public function getEmail_Cliente(){
            return $this->Email_Cliente;
        }
    
        public function setEmail_Cliente($email){
            $this->Email_Cliente = $email;
        }
    
        //------------------------------
        public function getSenha_Cliente(){
            return $this->Senha_Cliente;
        }
    
        public function setSenha_Cliente($senha){
            $this->Senha_Cliente = $senha;
        }
        //------------------------------
        public function getNome_Cliente(){
            return $this->Senha_Cliente;
        }
    
        public function setNome_Cliente($nome){
            $this->Nome_Cliente = $nome;
        }
        //------------------------------
        public function getFone_Cliente(){
            return $this->Senha_Cliente;
        }
    
        public function setFone_Cliente($fone){
            $this->Fone_Cliente = $fone;
        }
    
        //-----------------------------
        public function EntrarCliente(){
            include_once "../conexao.php";
    
            try
            {
                $Comando = $conexao->prepare("SELECT * FROM tb_cliente WHERE EMAIL_CLIENTE = ? AND SENHA_CLIENTE = ?;");
                $Comando->bindParam(1, $this->Email_Cliente);
                $Comando->bindParam(2, $this->Senha_Cliente);
    
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
        public function CadastrarCliente(){
            include_once "../conexao.php";
    
            try
            {
                $Comando = $conexao->prepare("INSERT INTO tb_cliente(NOME_CLIENTE, EMAIL_CLIENTE, SENHA_CLIENTE, FONE_CLIENTE) VALUES (?, ?, ?, ?);");
                $Comando->bindParam(1, $this->Nome_Cliente);
                $Comando->bindParam(2, $this->Email_Cliente);
                $Comando->bindParam(3, $this->Senha_Cliente);
                $Comando->bindParam(4, $this->Fone_Cliente);
    
                if($Comando->execute())
                {
                    session_start();
                    $_SESSION["email"] = $this->Email_Cliente;
                    $_SESSION["nome"]  = $this->Nome_Cliente;
                    header('Location: ../../Html/Home/login.html');
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

        // ------------------------------------
        public function RecuperarSenha(){
            include_once "../conexao.php";
        
            try{
                $Comando = $conexao->prepare("INSERT INTO tb_recsenha(EMAIL) SELECT EMAIL_CLIENTE FROM tb_cliente WHERE EMAIL_CLIENTE = ?");
                $Comando->bindParam(1, $this->Email_Cliente);
        
                if($Comando->execute())
                {
                    if($Comando->rowCount() == 1)
                    {
                        $Retorno = "<script>alert('Você receberá uma nova senha por e-mail em até 3 dias'); location.href='../../index.html'</script>";
                    }
                    else
                    {
                        $Retorno = "<script>alert('Email não encontrado'); location.href='../../Html/Home/login.html'</script>";
                    }
                }
                else
                {
                    $Retorno = "<script>alert('Erro ao executar a consulta'); location.href='../../index.html'</script>";
                }
            }
            catch (PDOException $Erro)
            {
                $Retorno = "ERRO: " . $Erro->getMessage();
            }
        
            return $Retorno;
        }
        
    }