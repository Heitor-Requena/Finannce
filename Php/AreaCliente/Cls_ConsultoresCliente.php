<?php 
class Cls_ConsultoresCliente{
    private $ID_Consultor;
    private $Nome_Consultor;    

    //---------------------------------------
    public function getID_Consultor(){
        return $this->ID_Consultor;
    }
    public function setID_Consultor($id){
        $this->ID_Consultor = $id;
    }

    //---------------------------------------
    public function getNome_Consultor(){
        return $this->Nome_Consultor;
    }
    public function setNome_Consultor($nome){
        $this->Nome_Consultor = $nome;
    }

    //---------------------------------------
    public function TodosConsultores(){
        include_once "../conexao.php";

        try
        {
            $Comando = $conexao->prepare("SELECT * FROM tb_consultor WHERE SITUACAO = 'A';");

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

    //----------------------------------------
    public function ConsultoresAnuncio(){
        include_once "../conexao.php";

        try
        {
            $Comando = $conexao->prepare("SELECT * FROM `tb_consultor` WHERE NOME_CONSULTOR LIKE '%?%';");
            $Comando->bindParam(1, $this->Nome_Consultor);

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
    
    //----------------------------------------
    public function PesquisaConsultorNome(){
        include_once "../conexao.php";

        try
        {
            $Comando = $conexao->prepare("SELECT * FROM tb_consultor WHERE SITUACAO = 'P';");

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
}
?>