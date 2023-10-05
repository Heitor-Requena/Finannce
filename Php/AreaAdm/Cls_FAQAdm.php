<?php 
class ClsFAQAdm{
    private $ID_Pergunta;
    private $Resposta;

    //----------------------------------
    public function getID_Pergunta(){
        return $this->ID_Pergunta;
    }

    public function setID_Pergunta($id){
        $this->ID_Pergunta = $id;
    }
    //----------------------------------
    public function getResposta(){
        return $this->Resposta;
    }

    public function setResposta($resposta){
        $this->Resposta = $resposta;

    }

    //----------------------------------
    public function CadastrarResposta(){
        include_once "../conexao.php";

        try{
            $Comando = $conexao->prepare("UPDATE tb_perguntasFaq SET RESPOSTA = ? WHERE ID_PERGUNTA = ?;");
            $Comando->bindParam(1, $this->Resposta);
            $Comando->bindParam(2, $this->ID_Pergunta);

            //TODO: Enviar email avisando que a pergunta foi respondida

            if ($Comando->execute())
            {
                $Retorno = json_encode("Pergunta respondida com Sucesso");
            }
            else{
                $Retorno = json_encode("Não foi possível responder a pergunta");
            }
        }
        catch (PDOException $Erro)
        {
            $Retorno = json_encode("ERRO: " . $Erro->getMessage());
        }

        return $Retorno;
    }

    //----------------------------------
    public function ConsultarPergunta(){
        include_once "../conexao.php";
        
        try
        {   
            $Comando = $conexao->prepare("SELECT ID_PERGUNTA, NOME_USUARIO, EMAIL_USUARIO, PERGUNTA FROM tb_perguntasFaq WHERE ID_PERGUNTA = ?;");
            $Comando->bindParam(1, $this->ID_Pergunta);
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
    //----------------------------------
    public function ListarPerguntas(){
        include_once "../conexao.php";
        
        try
        {   
            $Comando = $conexao->prepare("SELECT ID_PERGUNTA, NOME_USUARIO, EMAIL_USUARIO, PERGUNTA FROM tb_perguntasFaq WHERE RESPOSTA IS NULL;");
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
}
