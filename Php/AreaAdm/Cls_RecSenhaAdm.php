<?php
class Cls_RecSenha
{
    private $Email;
    private $Senha;

    /*----------------------------------*/
    public function setEmail($Email)
    {
        $this->Email = $Email;
    }
    public function getEmail()
    {
        return $this->Email;
    }
    /*----------------------------------*/
    public function setNovaSenha($Senha)
    {
        $this->Senha = $Senha;
    }
    public function getNovaSenha()
    {
        return $this->Senha;
    }

    // Listar Solicitações de Recuperação de Senha
    public function RecSenha()
    {
        include_once "../conexao.php";

        try {
            $Comando = $conexao->prepare("SELECT * from tb_recsenha order by DATA_REQUISICAO DESC;");

            $Comando->execute();

            $Matriz = $Comando->fetchALL();
            $Retorno = json_encode($Matriz);
        } catch (PDOException $Erro) {
            $Retorno = "ERRO: " . $Erro->getMessage();
        }

        return $Retorno;
    }

    // Alterar Senha
    public function AltSenha()
    {
        include_once "../conexao.php";

        try {
            //Se cliente
            $Comando_Cliente = $conexao->prepare("UPDATE tb_cliente SET SENHA_CLIENTE = ? WHERE EMAIL_CLIENTE = ?");
            $Comando_Cliente->bindParam(1, $this->Senha);
            $Comando_Cliente->bindParam(2, $this->Email);
            $Comando_Cliente->execute();

            //Se consultor
            $Comando_Consultor = $conexao->prepare("UPDATE tb_consultor SET SENHA_CONSULTOR = ? WHERE EMAIL_CONSULTOR = ?");
            $Comando_Consultor->bindParam(1, $this->Senha);
            $Comando_Consultor->bindParam(2, $this->Email);
            $Comando_Consultor->execute();

            // Excluir a requisição de recuperação de senha
            $Comando_ExcluirRecSenha = $conexao->prepare("DELETE FROM tb_recsenha WHERE EMAIL = ?");
            $Comando_ExcluirRecSenha->bindParam(1, $this->Email);
            $Comando_ExcluirRecSenha->execute();

            $Retorno = "<script>window.alert('Senha alterada com sucesso'); location.href='pagRecSenha.php'</script>;";
        } catch (PDOException $Erro) {
            $Retorno = "ERRO: " . $Erro->getMessage();
        }

        return $Retorno;
    }
}
