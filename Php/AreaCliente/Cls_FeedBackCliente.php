<?php 
class Cls_FeedBack{
    private $Nome_Consultor;
    private $Email_Consultor;
    private $ID_Cliente;
    private $Avaliacao;
    private $Nota;
    private $ID_FeedBack;

    //---------------------------------------
    public function getID_Cliente(){
        return $this->ID_Cliente;
    }
    public function setID_Cliente($id){
        $this->ID_Cliente = $id;
    }

    //---------------------------------------
    public function getNome_Consultor(){
        return $this->Nome_Consultor;
    }
    public function setNome_Consultor($nome){
        $this->Nome_Consultor = $nome;
    }

    //---------------------------------------
    public function getEmail_Consultor(){
        return $this->Email_Consultor;
    }
    public function setEmail_Consultor($Email){
        $this->Email_Consultor = $Email;
    }

    //---------------------------------------
    public function getAvaliacao(){
        return $this->Avaliacao;
    }
    public function setAvaliacao($avaliacao){
        $this->Avaliacao = $avaliacao;
    }

    //---------------------------------------
    public function getNota(){
        return $this->Nota;
    }
    public function setNota($nota){
        $this->Nota = $nota;
    }

    //---------------------------------------
    public function getID_FeedBack(){
        return $this->ID_FeedBack;
    }
    public function setID_FeedBack($id){
        $this->ID_FeedBack = $id;
    }

    //---------------------------------------
    public function CadastrarFeedBack(){
        include_once "../conexao.php";

        try
        {
            $Comando = $conexao->prepare("INSERT INTO tb_feedback(ID_CLIENTE, NOME_CONSULTOR, EMAIL_CONSULTOR, AVALIACAO, NOTA_CONSULTOR, DATA_INCLUSAO) VALUES (?, ?, ?, ?, ?, NOW())");
            $Comando->bindParam(1, $this->ID_Cliente);
            $Comando->bindParam(2, $this->Nome_Consultor);
            $Comando->bindParam(3, $this->Email_Consultor);
            $Comando->bindParam(4, $this->Avaliacao);
            $Comando->bindParam(5, $this->Nota);

            if($Comando->execute())
            {
                $Comando = $conexao->prepare("UPDATE tb_consultor SET AVALIAÇAO_CONSULTOR = (SELECT AVG(NOTA_CONSULTOR) FROM tb_feedback WHERE NOME_CONSULTOR = ? AND EMAIL_CONSULTOR = ?) WHERE NOME_CONSULTOR = ? AND EMAIL_CONSULTOR = ?;");
                
                $Comando->bindParam(1, $this->Nome_Consultor);
                $Comando->bindParam(2, $this->Email_Consultor);
                $Comando->bindParam(3, $this->Nome_Consultor);
                $Comando->bindParam(4, $this->Email_Consultor);

                if($Comando->execute()){
                    $Retorno = json_encode('Avaliação enviada com sucesso');
                }
                else{
                    $Retorno = json_encode('Erro na query. Parte 2');

                }
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
    public function ExcluirFeedBack(){
        include_once "../conexao.php";

        try
        {
            $Comando = $conexao->prepare("DELETE FROM tb_feedback WHERE ID_CLIENTE = ? AND ID_FEEDBACK = ?;");
            $Comando->bindParam(1, $this->ID_Cliente);
            $Comando->bindParam(2, $this->ID_FeedBack);

            if($Comando->execute())
            {
                $Comando = $conexao->prepare("UPDATE tb_consultor SET AVALIAÇAO_CONSULTOR = (SELECT AVG(NOTA_CONSULTOR) FROM tb_feedback WHERE NOME_CONSULTOR = ? AND EMAIL_CONSULTOR = ?) WHERE NOME_CONSULTOR = ? AND EMAIL_CONSULTOR = ?;");
                
                $Comando->bindParam(1, $this->Nome_Consultor);
                $Comando->bindParam(2, $this->Email_Consultor);
                $Comando->bindParam(3, $this->Nome_Consultor);
                $Comando->bindParam(4, $this->Email_Consultor);

                if($Comando->execute()){
                    $Retorno = json_encode('Exclusão feita com sucesso');
                }
                else{
                    $Retorno = json_encode('Erro na query. Parte 2');

                }
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
    public function ListarFeedBack(){
        include_once "../conexao.php";

        try
        {
            $Comando = $conexao->prepare("SELECT * FROM tb_feedback WHERE ID_CLIENTE = ?;");
            $Comando->bindParam(1, $this->ID_Cliente);

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