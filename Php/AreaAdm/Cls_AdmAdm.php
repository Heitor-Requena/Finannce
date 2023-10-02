<?php
    class ClsAdmAdm{
        private $Id;
        private $Nome;
        private $Email;
        private $Cpf;
        private $Rg;
        private $Senha;

        /*----------------------------------*/
        public function setIdAdm($Id_Adm){
            $this->Id = $Id_Adm;
        }
        public function getIdAmd(){
            return $this->Id;
        }
        /*----------------------------------*/
        public function setNomeAdm($Nome_Adm){
            $this->Nome = $Nome_Adm;
        }
        public function getNomeAdm(){
            return $this->Nome;
        }
        /*----------------------------------*/
        public function setEmailAdm($Email_Adm){
            $this->Email = $Email_Adm;
        }
        public function getEmailAdm(){
            return $this->Email;
        }
        /*----------------------------------*/
        public function setCpfAdm($Cpf_Adm){
            $this->Cpf = $Cpf_Adm;
        }
        public function getCpfAdm(){
            return $this->Cpf;
        }
        /*----------------------------------*/
        public function setRgAdm($Rg_Adm){
            $this->Rg = $Rg_Adm;
        }
        public function getRgAdm(){
            return $this->Rg;
        }
        /*----------------------------------*/
        public function setSenhaAdm($Senha_Adm){
            $this->Senha = $Senha_Adm;
        }
        public function getSenhaAdm(){
            return $this->Senha;
        }

        // Cadastrar Adm
        public function CadAdm(){
            include_once "../conexao.php";

            try
            {
                $Comando = $conexao->prepare("INSERT INTO tb_administrador (NOME_ADM,EMAIL_ADM,SENHA_ADM,CPF_ADM,RG_ADM) VALUES (?,?,?,?,?);");
                $Comando->bindParam(1, $this->Nome);
                $Comando->bindParam(2, $this->Email);
                $Comando->bindParam(3, $this->Senha);
                $Comando->bindParam(4, $this->Cpf);
                $Comando->bindParam(5, $this->Rg);

                if($Comando->execute()){
                    $Retorno = json_encode("Cadastrado com sucesso");
                }
                else{
                    $Retorno = json_encode("Não foi possível cadastrar");
                }
            }
            catch(PDOException $Erro)
            {
                $Retorno = json_encode("Erro" . $Erro->getMessage());
            }
            return $Retorno;
        }

        // Consultar Adm
        public function ConsAdm(){
            include_once "../conexao.php";

            try
            {
                $Comando = $conexao->prepare("SELECT ID_ADM,NOME_ADM, EMAIL_ADM, CPF_ADM, RG_ADM, DATA_ENTRADA FROM tb_administrador WHERE ID_ADM = ?");
                $Comando->bindParam(1, $this->Id);
                $Comando->execute();

                $Matriz = $Comando->fetchAll();
                $Retorno= json_encode($Matriz);

            }
            catch(PDOException $Erro){
                $Retorno = json_encode("Erro" . $Erro->getMessage());
            }
            return $Retorno;
        }

        // Listar Todos Adm
        public function ListAdm(){
            include_once "../conexao.php";

            try
            {
                $Comando = $conexao->prepare("SELECT ID_ADM,NOME_ADM, EMAIL_ADM, CPF_ADM, RG_ADM, DATA_ENTRADA FROM tb_administrador");
                $Comando->execute();

                $Matriz = $Comando->fetchAll();
                $Retorno= json_encode($Matriz);

            }
            catch(PDOException $Erro){
                $Retorno = json_encode("Erro" . $Erro->getMessage());
            }
            return $Retorno;
        }

        // Alterar Informações do Adm
        public function AltLogAdm(){
            include_once "../conexao.php";

            try
            {
                $Comando = $conexao->prepare("UPDATE tb_administrador SET EMAIL_ADM = ?, SENHA_ADM = ? WHERE ID_ADM = ?");
                $Comando->bindParam(1, $this->Email);
                $Comando->bindParam(2, $this->Senha);
                $Comando->bindParam(3, $this->Id);

                if($Comando->execute()){
                    $Retorno = json_encode("Login Alterado com Sucesso");
                }
                else{
                    $Retorno = json_encode("Não foi possível alterar");
                }
            }
            catch(PDOException $Erro)
            {
                $Retorno = json_encode("Erro" . $Erro->getMessage());
            }
            return $Retorno;
        }

        public function DelAdm(){
            include_once "../conexao.php";

            try
            {
                $Comando = $conexao->prepare("DELETE FROM tb_administrador WHERE ID_ADM = ?;");
                $Comando->bindParam(1, $this->Id);

                if($Comando->execute()){
                    $Retorno = json_encode("Deletado com Sucesso");
                }
                else{
                    $Retorno = json_encode("Não foi possível deletar");
                }
            }
            catch (PDOException $Erro){
                $Retorno = json_encode("Erro");
            }
            return $Retorno;
        }
    }
