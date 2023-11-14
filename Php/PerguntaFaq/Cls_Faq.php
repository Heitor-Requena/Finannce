<?php
class ClsFaq
{
    private $Nome_Usuario;
    private $Email_Usuario;
    private $Pergunta;

    //------------------------------
    public function getNome_Usuario()
    {
        return $this->Nome_Usuario;
    }

    public function setNome_Usuario($nome)
    {
        $this->Nome_Usuario = $nome;
    }

    //------------------------------
    public function getEmail_Usuario()
    {
        return $this->Email_Usuario;
    }

    public function setEmail_Usuario($email)
    {
        $this->Email_Usuario = $email;
    }

    //------------------------------
    public function getPergunta()
    {
        return $this->Pergunta;
    }

    public function setPergunta($pergunta)
    {
        $this->Pergunta = $pergunta;
    }

    //-----------------------------
    public function CadastrarPergunta()
    {
        include_once "../conexao.php";

        try {
            $Comando = $conexao->prepare("INSERT INTO tb_perguntasFaq (NOME_USUARIO, EMAIL_USUARIO, PERGUNTA) VALUES (?, ?, ?);");
            $Comando->bindParam(1, $this->Nome_Usuario);
            $Comando->bindParam(2, $this->Email_Usuario);
            $Comando->bindParam(3, $this->Pergunta);

            if ($Comando->execute()) {
                $Retorno = json_encode("Pergunta enviada com sucesso");
            } else {
                $Retorno = json_encode("Não foi possível enviar sua pergunta");
            }
        } catch (PDOException $Erro) {
            $Retorno = "ERRO: " . $Erro->getMessage();
        }

        return $Retorno;
    }

    //------------------------------
    public function CarregarPerguntas()
    {
        include_once "../conexao.php";

        try {
            $Comando = $conexao->prepare("SELECT NOME_USUARIO, EMAIL_USUARIO, PERGUNTA, RESPOSTA FROM tb_perguntasFaq WHERE RESPOSTA IS NOT NULL;");
            $Comando->execute();

            $Matriz  = $Comando->fetchALL();
            $Retorno = json_encode($Matriz);
        } catch (PDOException $Erro) {
            $Retorno = "ERRO: " . $Erro->getMessage();
        }

        return $Retorno;
    }
}
