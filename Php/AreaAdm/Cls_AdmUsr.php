<?php
    class ClsAdmUsr{
        private $Id;
        private $Email;
        private $Senha;

        /*----------------------------------*/
        public function setIdUsr($ID_Usr){
            $this->Id = $ID_Usr;
        }
        public function getIDUsr(){
            return $this->Id;
        }
        /*----------------------------------*/
        public function setEmailUsr($Email_Usr){
            $this->Email = $Email_Usr;
        }
        public function getEmailUsr(){
            return $this->Email;
        }
        /*----------------------------------*/
        public function setSenhaUsr($Senha_Usr){
            $this->Senha = $Senha_Usr;
        }
        public function getSenhaUsr(){
            return $this->Senha;
        }

        // Consultar Usuário
        public function ConsultarUsr(){   
            include_once "../conexao.php";
            
            try
            {   
                $Comando = $conexao->prepare("SELECT ID_CLIENTE, NOME_CLIENTE, EMAIL_CLIENTE, FONE_CLIENTE, DATA_ENTRADA FROM tb_cliente WHERE ID_CLIENTE = ?;");
                $Comando->bindParam(1, $this->Id);
                $Comando->execute();

                $Matriz  = $Comando->fetchALL();
                $Retorno = json_encode($Matriz);
            }
            catch(PDOException $Erro)
            {
                $Retorno = json_encode("Erro" . $Erro->getMessage());
            }
            return $Retorno;
        }
        
        // Listar Todos Usuários
        public function ListarUsr(){
            include_once "../conexao.php";

            try
            {   
                $Comando = $conexao->prepare("SELECT ID_CLIENTE, NOME_CLIENTE, EMAIL_CLIENTE, FONE_CLIENTE, DATA_ENTRADA FROM tb_cliente");
                $Comando->execute();

                $Matriz  =  $Comando->fetchALL();
                $Retorno = json_encode($Matriz);
            }
            catch(PDOException $Erro)
            {
                $Retorno = json_encode("Erro" . $Erro->getMessage());
            }
            return $Retorno;
        }

        // Alterar Login do Usuário
        public function AlterarLoginUsr(){
            include_once "../conexao.php";
            
            try
            {
                $Comando = $conexao->prepare("UPDATE tb_cliente SET EMAIL_CLIENTE = ?, SENHA_CLIENTE = ? WHERE ID_CLIENTE = ?;");
                $Comando->bindParam(1, $this->Email);
                $Comando->bindParam(2, $this->Senha);
                $Comando->bindParam(3, $this->Id);
                
                if($Comando->execute()){
                    $Retorno = json_encode("Alterado com Sucesso");
                }
                else{
                    $Retorno = json_encode("Não foi possível Alterar");
                }
            }
            catch(PDOException $Erro)
            {
                $Retorno = json_encode("Erro" . $Erro->getMessage());
            }
            return $Retorno;
        }

        // Deletar Usuário
        public function DeletarUsr(){
            include_once "../conexao.php";

            try
            {
                $Comando = $conexao->prepare("DELETE FROM tb_cliente WHERE ID_CLIENTE = ?;");
                $Comando->bindParam(1, $this->Id);

                if($Comando->execute()){
                    $Retorno = json_encode("Deletado com Sucesso");
                }
                else{
                    $Retorno = json_encode("Não foi possível deletar");
                }
            }
            catch (PDOException $Erro)
            {
                $Retorno = json_encode("Erro" . $Erro->getMessage());
            }
            return $Retorno;
        }

}