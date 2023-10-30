<?php
class Cls_InfopessCliente{
    private $Id_Cliente;

    //-------------------------------------
    public function getID_Cliente(){
        return $this->Id_Cliente;
    }

    public function setID_Cliente($id){
        $this->Id_Cliente = $id;
    }

    //----------------------------------------
    public function CarregarDados(){
        include_once "../conexao.php";

        try
        {
            $Comando = $conexao->prepare("SELECT * FROM tb_cliente WHERE ID_CLIENTE = ?;");
            $Comando->bindParam(1, $this->Id_Cliente);

            if($Comando->execute())
            {
                $Matriz  = $Comando->fetchALL(PDO::FETCH_OBJ);
                $Retorno = json_encode($Matriz);
            }
            else
            {   
                $Retorno = json_encode('Erro na query. Parte 1');
            }
        }
        catch (PDOException $Erro)
        {
            $Retorno = json_encode("ERRO: " . $Erro->getMessage());
        }
        
        return $Retorno;
    }

    /*
    public function SalvarDados(){
        include_once "../conexao.php";

        try
        {
            $Comando = $conexao->prepare("INSERT INTO tb_cliente(NOME_CLIENTE, EMAIL_CLIENTE, CPF_CLIENTE, RG_CLIENTE, DTA_NASC_CLIENTE, CEP_CLIENTE, RUA_CLIENTE, BAIRRO_CLIENTE, NUMERO_CASA_CLIENTE, COMPLEMENTO_CLIENTE, CIDADE_CLIENTE, ESTADO_CLIENTE) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
            $Comando->bindParam(1, $this->Id_Cliente);
            $Comando->bindParam(2, $this->);
            $Comando->bindParam(3, $this->);
            $Comando->bindParam(4, $this->);
            $Comando->bindParam(5, $this->);
            $Comando->bindParam(6, $this->);
            $Comando->bindParam(7, $this->);
            $Comando->bindParam(8, $this->);
            $Comando->bindParam(9, $this->);
            $Comando->bindParam(10, $this->);
            $Comando->bindParam(11, $this->);
            $Comando->bindParam(12, $this->);            
            

            if($Comando->execute())
            {
                $Matriz  = $Comando->fetchALL(PDO::FETCH_OBJ);
                $Retorno = json_encode($Matriz);
            }
            else
            {   
                $Retorno = json_encode('Erro na query. Parte 1');
            }
        }
        catch (PDOException $Erro)
        {
            $Retorno = json_encode("ERRO: " . $Erro->getMessage());
        }
        
        return $Retorno;
    }*/

}
?>