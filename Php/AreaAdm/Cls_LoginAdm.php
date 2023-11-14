<?php
class Cls_LoginAdm{
    private $Email_Adm;
    private $Senha_Adm;
    
    //------------------------------
    public function getEmail_Adm(){
        return $this->Email_Adm;
    }

    public function setEmail_Adm($email){
        $this->Email_Adm = $email;
    }

    //------------------------------
    public function getSenha_Adm(){
        return $this->Senha_Adm;
    }

    public function setSenha_Adm($senha){
        $this->Senha_Adm = $senha;
    }

    //-----------------------------
    public function EntrarAdm(){
        include_once "../conexao.php";

        try
        {
            $Comando = $conexao->prepare("SELECT * FROM tb_administrador WHERE EMAIL_ADM = ? AND SENHA_ADM = ? ORDER BY tb_administrador.ID_ADM ASC;");
            $Comando->bindParam(1, $this->Email_Adm);
            $Comando->bindParam(2, $this->Senha_Adm);

            if($Comando->execute())
            {
                if($Comando->rowCount() == 1)
                {
                    $Retorno = $Comando->fetchALL(PDO::FETCH_OBJ);
                }
            }
            else
            {   
                $Retorno = "<script>alert('Usuário incorreto')</script>";
            }
        }
        catch (PDOException $Erro)
        {
            $Retorno = "ERRO: " . $Erro->getMessage();
        }
        
        return $Retorno;
    }
}
