<?php
    class ClsCrono{
        private $Nome;
        private $Atv;
        private $Semana;

        /*----------------------------------*/ 
        public function setNome($nome){
            $this->Nome = $nome;
        }
        public function getNome(){
            return $this->Nome;
        }
        /*----------------------------------*/ 
        public function setAtv($atv){
            $this->Atv = $atv;
        }
        public function getAtv(){
            return $this->Atv;
        }
        /*----------------------------------*/ 
        public function setSmn($semana){
            $this->Semana = $semana;
        }
        public function getSmn(){
            return $this->Semana;
        }


        /*Inserir no Banco----------------------------------*/
        public function Inserir(){
            include_once "../../Php/conexao.php";

            try
            {
                $Comando = $conexao->prepare("insert into tb_cronograma (NOME,ATIVIDADE,SEMANA) values (?,?,?)");
                $Comando->bindParam(1, $this->Nome);
                $Comando->bindParam(2, $this->Atv);
                $Comando->bindParam(3, $this->Semana);

                if($Comando->execute()){
                    $Retorno = "Inserido com sucesso";
                }
                else{
                    $Retorno = "Não foi possível inserir";
                }
            }
            catch (PDOException $Erro) 
            {
                $Retorno = "Erro " . $Erro->getMessage();
            }
            return $Retorno;
        }

        /*Excuir do Banco----------------------------------*/
        public function Excluir(){
            include_once "../../Php/conexao.php";

            try
            {
                $Comando = $conexao->prepare("delete from tb_cronograma where NOME = ? and SEMANA = ?;");
                $Comando->bindParam(1, $this->Nome);
                $Comando->bindParam(2, $this->Semana);

                if($Comando->execute()){
                    $Retorno = "Excluir com sucesso";
                }
                else{
                    $Retorno = "Não foi possível excluir";
                }
            }
            catch (PDOException $Erro) 
            {
                $Retorno = "Erro " . $Erro->getMessage();
            }
            return $Retorno;
        }

        /*Pesquisar Semana----------------------------------*/
        public function Pesquisar(){
            include_once "../../Php/conexao.php";

            try
            {
                $Comando = $conexao->prepare("select NOME,ATIVIDADE,SEMANA from tb_cronograma where SEMANA = ?;");
                $Comando->bindParam(1, $this->Semana);

                $Comando->execute();
                $Retorno = $Comando->fetchAll(PDO::FETCH_OBJ);
            }
            catch(PDOException $Erro)
            {
                $Retorno = "Erro" . $Erro->getMessage();
            }
            return $Retorno;
        }

        /*Listar Tudo----------------------------------*/
        public function Listar(){
            include_once "../../Php/conexao.php";

            try
            {
                $Comando = $conexao->prepare("select NOME,ATIVIDADE,SEMANA from tb_cronograma order by SEMANA;");

                $Comando->execute();
                $Retorno = $Comando->fetchAll(PDO::FETCH_OBJ);
            }
            catch(PDOException $Erro)
            {
                $Retorno = "Erro" . $Erro->getMessage();
            }
            return $Retorno;
        }

        /*Alterar dado no Banco----------------------------------*/
        public function Alterar(){
            include_once "../../Php/conexao.php";

            try
            {
                $Comando = $conexao->prepare("UPDATE tb_cronograma SET ATIVIDADE = ? WHERE NOME = ?;");
                $Comando->bindParam(1, $this->Atv);
                $Comando->bindParam(2, $this->Nome);

                if($Comando->execute()){
                    $Retorno = "Alterado com sucesso";
                }
                else{
                    $Retorno = "Não foi possível alterar";
                }
            }
            catch (PDOException $Erro) 
            {
                $Retorno = "Erro " . $Erro->getMessage();
            }
            return $Retorno;
        }
    }
?>
