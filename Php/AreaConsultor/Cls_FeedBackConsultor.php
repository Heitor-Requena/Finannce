<?php
class Cls_FeedBackConsultor{
    private $Nome;
    private $Email;

    //---------------------------------------

    public function getEmail_Consultor(){
        return $this->Email;
    }
    public function setEmail_Consultor($email){
        $this->Email = $email;
    }
    //---------------------------------------
    public function getNome_Consultor(){
        return $this->Nome;
    }
    public function setNome_Consultor($nome){
        $this->Nome = $nome;
    }


    public function TodosFeedBacks(){
        include_once "../conexao.php";

        try
        {
            $Comando = $conexao->prepare("SELECT ID_FEEDBACK, NOME_CLIENTE, EMAIL_CLIENTE, AVALIACAO, NOTA_CONSULTOR, DATA_INCLUSAO FROM tb_feedback INNER JOIN tb_cliente ON tb_feedback.ID_CLIENTE = tb_cliente.ID_CLIENTE WHERE NOME_CONSULTOR = ? AND EMAIL_CONSULTOR = ?;");
            $Comando->bindParam(1, $this->Nome);
            $Comando->bindParam(2, $this->Email);

            $Comando->execute();

            $Matriz = $Comando->fetchALL();
            $Retorno = json_encode($Matriz);
        }
        catch (PDOException $Erro)
        {
            $Retorno = "ERRO: " . $Erro->getMessage();
        }

        return $Retorno;
    }
}

?>