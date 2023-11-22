<?php
    class Cls_GraficoCliente{
        private $Id_Cliente;
        private $Id_Gasto;
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
        public function getID_Gasto(){
            return $this->Id_Gasto;
        }

        public function setID_Gasto($id){
            $this->Id_Gasto = $id;
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
        public function GerarTabelaRosca(){
            include_once "../conexao.php";

            try
            {
                $Comando = $conexao->prepare("SELECT ID_GASTO, NOME_GASTO, VALOR_GASTO FROM tb_gastos WHERE ID_CLIENTE = ? AND SITUACAO = 'Ativo';");
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
                $Comando = $conexao->prepare("INSERT INTO tb_gastos (ID_CLIENTE, NOME_GASTO, VALOR_GASTO, SITUACAO, DATA_INCLUSAO) VALUES (?, ?, ?, 'Ativo', NOW());");
                $Comando->bindParam(1, $this->Id_Cliente);
                $Comando->bindParam(2, $this->Nome_Gasto);
                $Comando->bindParam(3, $this->Valor_Gastos);

    
                if($Comando->execute())
                {
                    $Retorno = json_encode("Gasto Cadastrado");
                }
                else
                {   
                    $Retorno = json_encode("Não foi possível cadastrar o gasto. Parte 1");
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
                $Comando = $conexao->prepare("UPDATE tb_gastos SET SITUACAO = 'Desativado' WHERE ID_GASTO = ? AND ID_CLIENTE = ?;");
                $Comando->bindParam(1, $this->Id_Gasto);
                $Comando->bindParam(2, $this->Id_Cliente);

                if($Comando->execute())
                {
                    $Retorno = json_encode("Gasto Excluido");
                }
                else
                {   
                    $Retorno = json_encode("Não foi possível excluir o gasto. Parte 1");
                }
            }
            catch (PDOException $Erro)
            {
                $Retorno = json_encode("ERRO: " . $Erro->getMessage());
            }
            
            return $Retorno;
        }

        //----------------------------------------
        public function GerarGraficoColuna(){
            include_once "../conexao.php";

            try
            {
                $Comando = $conexao->prepare("SELECT NOME_GASTO, VALOR_GASTO, DATA_INCLUSAO FROM `tb_gastos` WHERE ID_CLIENTE = ? ORDER BY `tb_gastos`.`DATA_INCLUSAO` DESC;");
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
        public function GerarTabelaColuna(){
            include_once "../conexao.php";

            //TENTAR FAZER UM DE COLUNA

            try
            {
                $Comando = $conexao->prepare("SELECT NOME_GASTO, VALOR_GASTO, DATA_INCLUSAO FROM `tb_gastos` WHERE ID_CLIENTE = ? ORDER BY `tb_gastos`.`DATA_INCLUSAO` DESC;");
                $Comando->bindParam(1, $this->Id_Cliente);

                if($Comando->execute())
                {
                    $Matriz  = $Comando->fetchALL(PDO::FETCH_OBJ);
                    $Retorno = json_encode($Matriz);
                }
                else
                {   
                    $Retorno = json_encode('Não foi possível Carregar a Tabela/Erro na query. Parte 1');
                }
            }
            catch (PDOException $Erro)
            {
                $Retorno = json_encode("ERRO: " . $Erro->getMessage());
            }
            
            return $Retorno;
        }

        //----------------------------------------
        public function GerarRelatorio(){
            include_once "../conexao.php";

            try
            {
                $Comando = $conexao->prepare("SELECT `ID_GASTO`, `NOME_GASTO`, `VALOR_GASTO`, `SITUACAO`, `DATA_INCLUSAO` FROM `tb_gastos` WHERE ID_CLIENTE = ?;");
                $Comando->bindParam(1, $this->Id_Cliente);

                $Comando->execute();

                $Relat = '';
                $Relat .= '<table>';
                $Relat .= '<tr>';
                $Relat .= '<th>ID do Gasto</th>';
                $Relat .= '<th>Nome Gasto</th>';
                $Relat .= '<th>Valor</th>';
                $Relat .= '<th>Situacao</th>';
                $Relat .= '<th>Data de Inclusao</th>';
                $Relat .= '</tr>';

                $Linha = $Comando->fetchALL(PDO::FETCH_OBJ);

                foreach ($Linha as $L)
                {
                    $Relat .= '<tr>';
                        $Relat .= '<td>' . $L->ID_GASTO . '</td>';
                        $Relat .= '<td>' . $L->NOME_GASTO . '</td>';
                        $Relat .= '<td>' . $L->VALOR_GASTO . '</td>';
                        $Relat .= '<td>' . $L->SITUACAO . '</td>';
                        $Relat .= '<td>' . $L->DATA_INCLUSAO . '</td>';
                    $Relat .= '</tr>';
                }
                  $Relat .= '</table>';

                $Relat .= '<br><table><tr>';
                $Relat .= '<th>Maior Valor</th>';
                $Relat .= '<th>Menor Valor</th>';
                $Relat .= '<th>Soma dos Valores</th>';
                $Relat .= '<th>Média dos Valores</th>';
                $Relat .= '</tr>';

                $Comando = $conexao->prepare("SELECT MAX(VALOR_GASTO) AS MAIOR, MIN(VALOR_GASTO) AS MINIMO, SUM(VALOR_GASTO) AS SOMA, TRUNCATE(AVG(VALOR_GASTO), 2) AS MEDIA FROM `tb_gastos` WHERE ID_CLIENTE = ?;");
                $Comando->bindParam(1, $this->Id_Cliente);
                $Comando->execute();

                $Linha = $Comando->fetchALL(PDO::FETCH_OBJ);

                foreach ($Linha as $L)
                {
                    $Relat .= '<tr>';
                        $Relat .= '<td>' . $L->MAIOR . '</td>';
                        $Relat .= '<td>' . $L->MINIMO . '</td>';
                        $Relat .= '<td>' . $L->SOMA . '</td>';
                        $Relat .= '<td>' . $L->MEDIA. '</td>';
                    $Relat .= '</tr>';
                }
                $Relat .= '</table>';

                $Retorno = $Relat;
            }
            catch (PDOException $Erro)
            {
                $Retorno =  "ERRO: " . $Erro->getMessage();
            }
            
            return $Retorno;
        }
    }
?>