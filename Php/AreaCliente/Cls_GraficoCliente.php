<?php 
    class Cls_GraficoCliente{
        private $Id_Cliente;
        private $Nome_Gasto;
        private $Valor_Gastos;

        //-------------------------------------
        public function getID_Cliente(){
            return $this->Id_Cliente;
        }

        public function setID_Cliente($id){
            $this->Id_Cliente = $id;
        }

        //-------------------------------------
        public function getNome_Gasto(){
            return $this->Nome_Gasto;
        }

        public function setNome_Gasto($nome){
            $this->Nome_Gasto = $nome;
        }

        //-------------------------------------
        public function getValor_Gasto(){
            return $this->Valor_Gastos;
        }

        public function setValor_Gasto($valor){
            $this->Valor_Gastos = $valor;
        }

        //----------------------------------------
        public function GerarGraficoRosca(){
            include_once "../conexao.php";

            try
            {
                $Comando = $conexao->prepare("SELECT NOME_GASTO, VALOR_GASTO FROM tb_gastos WHERE ID_CLIENTE = ? AND SITUACAO = 'Ativo';");
                $Comando->bindParam(1, $this->Id_Cliente);

                if($Comando->execute())
                {
                    $Matriz  = $Comando->fetchALL(PDO::FETCH_OBJ);
                    $Retorno = json_encode($Matriz);
                }
                else
                {   
                    $Retorno = json_encode('Não foi possível Carregar o grafico/Erro na query. Parte 1');
                }
            }
            catch (PDOException $Erro)
            {
                $Retorno = json_encode("ERRO: " . $Erro->getMessage());
            }
            
            return $Retorno;
        }

        //----------------------------------------
        public function AdicionarGasto(){
            include_once "../conexao.php";

            try
            {
                $Comando = $conexao->prepare("INSERT INTO tb_gastos (ID_CLIENTE, NOME_GASTO, VALOR_GASTO, SITUACAO) VALUES (?, ?, ?, 'Ativo');");
                $Comando->bindParam(1, $this->Id_Cliente);
                $Comando->bindParam(2, $this->Nome_Gasto);
                $Comando->bindParam(2, $this->Valor_Gastos);
    
                if($Comando->execute())
                {
                    $Retorno = json_encode("Gasto Cadastrado");
                }
                else
                {   
                    $Retorno = json_encode('Não foi possível cadastrar o gasto. Parte 1');
                }
            }
            catch (PDOException $Erro)
            {
                $Retorno = json_encode("ERRO: " . $Erro->getMessage());
            }
            
            return $Retorno;
        }

        //----------------------------------------
        public function ExcluirGasto(){
            include_once "../conexao.php";

            try
            {
                $Comando = $conexao->prepare("UPDATE tb_gastos SET SITUACAO = 'DESATIVADO' WHERE NOME_GASTO = ? AND ID_CLIENTE = ?;");
                $Comando->bindParam(1, $this->Nome_Gasto);
                $Comando->bindParam(2, $this->Id_Cliente);

                if($Comando->execute())
                {
                    $Retorno = json_encode("Gasto Excluido");
                }
                else
                {   
                    $Retorno = json_encode('Não foi possível excluir o gasto. Parte 1');
                }
            }
            catch (PDOException $Erro)
            {
                $Retorno = json_encode("ERRO: " . $Erro->getMessage());
            }
            
            return $Retorno;
        }

        //----------------------------------------
        public function GerarGraficoLinha(){
            include_once "../conexao.php";

            try
            {
                $Comando = $conexao->prepare("SELECT NOME_GASTO, VALOR_GASTO, DATA_CRIACAO FROM tb_gastos WHERE ID_CLIENTE = ?;");
                $Comando->bindParam(1, $this->Id_Cliente);

                if($Comando->execute())
                {
                    $Matriz  = $Comando->fetchALL(PDO::FETCH_OBJ);
                    $Retorno = json_encode($Matriz);
                }
                else
                {   
                    $Retorno = json_encode('Não foi possível Carregar o grafico/Erro na query. Parte 1');
                }
            }
            catch (PDOException $Erro)
            {
                $Retorno = json_encode("ERRO: " . $Erro->getMessage());
            }
            
            return $Retorno;
        }

        //----------------------------------------
        public function GerarGraficoBarra(){
            include_once "../conexao.php";

            try
            {
                $Comando = $conexao->prepare("SELECT NOME_GASTO, VALOR_GASTO, DATA_CRIACAO FROM tb_gastos WHERE ID_CLIENTE = ?;");
                $Comando->bindParam(1, $this->Id_Cliente);

                if($Comando->execute())
                {
                    $Matriz  = $Comando->fetchALL(PDO::FETCH_OBJ);
                    $Retorno = json_encode($Matriz);
                }
                else
                {   
                    $Retorno = json_encode('Não foi possível Carregar o grafico/Erro na query. Parte 1');
                }
            }
            catch (PDOException $Erro)
            {
                $Retorno = json_encode("ERRO: " . $Erro->getMessage());
            }
            
            return $Retorno;
        }
    }
?>