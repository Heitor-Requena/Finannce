<?php
class ClsAdmUsr
{
    // Propriedades privadas para armazenar dados do usuário
    private $Id;
    private $Email;
    private $Senha;

    /*----------------------------------*/
    // Métodos para configurar e obter o ID do usuário
    public function setIdUsr($ID_Usr)
    {
        $this->Id = $ID_Usr;
    }
    public function getIDUsr()
    {
        return $this->Id;
    }
    /*----------------------------------*/
    // Métodos para configurar e obter o email do usuário
    public function setEmailUsr($Email_Usr)
    {
        $this->Email = $Email_Usr;
    }
    public function getEmailUsr()
    {
        return $this->Email;
    }
    /*----------------------------------*/
    // Métodos para configurar e obter a senha do usuário
    public function setSenhaUsr($Senha_Usr)
    {
        $this->Senha = $Senha_Usr;
    }
    public function getSenhaUsr()
    {
        return $this->Senha;
    }

    // Método para consultar informações do usuário
    public function ConsultarUsr()
    {
        include_once "../conexao.php";

        try {
            // Preparação da consulta SQL
            $Comando = $conexao->prepare("SELECT * FROM tb_cliente WHERE ID_CLIENTE = ?;");
            $Comando->bindParam(1, $this->Id);
            $Comando->execute();

            // Obtenção dos resultados e conversão para JSON
            $Matriz  = $Comando->fetchAll();
            $Retorno = json_encode($Matriz);
        } catch (PDOException $Erro) {
            $Retorno = json_encode("Erro" . $Erro->getMessage());
        }
        return $Retorno;
    }

    // Método para listar todos os usuários
    public function ListarUsr()
    {
        include_once "../conexao.php";

        try {
            // Preparação da consulta SQL
            $Comando = $conexao->prepare("SELECT * FROM tb_cliente ORDER BY tb_cliente.ID_CLIENTE ASC");
            $Comando->execute();

            // Obtenção dos resultados e conversão para JSON
            $Matriz  = $Comando->fetchAll();
            $Retorno = json_encode($Matriz);
        } catch (PDOException $Erro) {
            $Retorno = json_encode("Erro" . $Erro->getMessage());
        }
        return $Retorno;
    }

    // Método para alterar o login do usuário
    public function AlterarLoginUsr()
    {
        include_once "../conexao.php";

        try {
            // Preparação da consulta SQL
            $Comando = $conexao->prepare("UPDATE tb_cliente SET EMAIL_CLIENTE = ?, SENHA_CLIENTE = ? WHERE ID_CLIENTE = ?;");
            $Comando->bindParam(1, $this->Email);
            $Comando->bindParam(2, $this->Senha);
            $Comando->bindParam(3, $this->Id);

            // Execução da atualização e retorno do resultado
            if ($Comando->execute()) {
                $Retorno = json_encode("Alterado com Sucesso");
            } else {
                $Retorno = json_encode("Não foi possível Alterar");
            }
        } catch (PDOException $Erro) {
            $Retorno = json_encode("Erro" . $Erro->getMessage());
        }
        return $Retorno;
    }

    // Método para deletar o usuário
    public function DeletarUsr()
    {
        include_once "../conexao.php";

        try {
            // Preparação da consulta SQL
            $Comando = $conexao->prepare("DELETE FROM tb_cliente WHERE ID_CLIENTE = ?;");
            $Comando->bindParam(1, $this->Id);

            // Execução da exclusão e retorno do resultado
            if ($Comando->execute()) {
                $Retorno = json_encode("Deletado com Sucesso");
            } else {
                $Retorno = json_encode("Não foi possível deletar");
            }
        } catch (PDOException $Erro) {
            $Retorno = json_encode("Erro" . $Erro->getMessage());
        }
        return $Retorno;
    }
}
?>
