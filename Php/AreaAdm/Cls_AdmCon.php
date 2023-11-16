<?php
ob_start();

require_once('src/PHPMailer.php');
require_once('src/SMTP.php');
require_once('src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class ClsAdmCon
{
    private $Id;
    private $Email;
    private $Senha;

    /*----------------------------------*/
    public function setIdCon($ID_Con)
    {
        $this->Id = $ID_Con;
    }
    public function getIdCon()
    {
        return $this->Id;
    }
    /*----------------------------------*/
    public function setEmailCon($Email_Con)
    {
        $this->Email = $Email_Con;
    }
    public function getEmailCon()
    {
        return $this->Email;
    }
    /*----------------------------------*/
    public function setSenhaCon($Senha_Con)
    {
        $this->Senha = $Senha_Con;
    }
    public function getSenhaCon()
    {
        return $this->Senha;
    }

    // Consultar Consultor
    public function ConsultarCon()
    {
        include_once "../conexao.php";

        try {
            $Comando = $conexao->prepare("SELECT * FROM tb_consultor WHERE ID_CONSULTOR = ?;");
            $Comando->bindParam(1, $this->Id);
            $Comando->execute();

            $Matriz     = $Comando->fetchAll();
            $Retorno    = json_encode($Matriz);
        } catch (PDOException $Erro) {
            $Retorno = json_encode("Erro" . $Erro->getMessage());
        }
        return $Retorno;
    }

    // Listar todos Consultores
    public function ListarCon()
    {
        include_once "../conexao.php";

        try {
            $Comando = $conexao->prepare("SELECT * FROM tb_consultor ORDER BY tb_consultor.ID_CONSULTOR ASC");
            $Comando->execute();

            $Matriz     = $Comando->fetchAll();
            $Retorno    = json_encode($Matriz);
        } catch (PDOException $Erro) {
            $Retorno = json_encode("Erro" . $Erro->getMessage());
        }
        return $Retorno;
    }

    // Listar Consultores Ativados
    public function ListarConA()
    {
        include_once "../conexao.php";

        try {
            $Comando = $conexao->prepare("SELECT * FROM tb_consultor WHERE STATUS_CONSULTOR = 'A' ORDER BY tb_consultor.ID_CONSULTOR ASC;");
            $Comando->execute();

            $Matriz     = $Comando->fetchAll();
            $Retorno    = json_encode($Matriz);
        } catch (PDOException $Erro) {
            $Retorno = json_encode("Erro" . $Erro->getMessage());
        }
        return $Retorno;
    }

    // Listar Consultores Desativados
    public function ListarConD()
    {
        include_once "../conexao.php";

        try {
            $Comando = $conexao->prepare("SELECT * FROM tb_consultor WHERE STATUS_CONSULTOR = 'D' ORDER BY tb_consultor.ID_CONSULTOR ASC;");
            $Comando->execute();

            $Matriz     = $Comando->fetchAll();
            $Retorno    = json_encode($Matriz);
        } catch (PDOException $Erro) {
            $Retorno = json_encode("Erro" . $Erro->getMessage());
        }
        return $Retorno;
    }

    // Desativar Consultor
    public function DesatCon()
    {
        include_once "../conexao.php";

        try {
            $Comando = $conexao->prepare("  UPDATE tb_consultor SET STATUS_CONSULTOR = 'D' WHERE ID_CONSULTOR = ?;");
            $Comando->bindParam(1, $this->Id);

            if ($Comando->execute()) {
                $Retorno = "<script>window.alert('Desativado com sucesso'); location.href='pagCons.php'</script>;";
            } else {
                $Retorno = "<script>window.alert('Não foi possível desativar'); location.href='pagCons.php'</script>;";
            }
        } catch (PDOException $Erro) {
            $Retorno = "Erro" . $Erro->getMessage();
        }

        return $Retorno;
    }

    // Ativar Consultor
    public function AtvCon(){
        include_once "../conexao.php";

        try {
            $Comando = $conexao->prepare("  UPDATE tb_consultor SET STATUS_CONSULTOR = 'A' WHERE ID_CONSULTOR = ?;");
            $Comando->bindParam(1, $this->Id);

            if ($Comando->execute()) {
                $Retorno = "<script>window.alert('Ativado com sucesso'); location.href='pagCons.php'</script>;";
            } else {
                $Retorno = "<script>window.alert('Não foi possível ativar'); location.href='pagCons.php'</script>;";
            }
        } catch (PDOException $Erro) {
            $Retorno = "Erro" . $Erro->getMessage();
        }

        return $Retorno;
    }

    // Alterar Login do Consultor
    public function AlterarLoginCon()
    {
        include_once "../conexao.php";

        try {
            $Comando = $conexao->prepare("UPDATE tb_consultor SET EMAIL_CONSULTOR = ?, SENHA_CONSULTOR = ? WHERE ID_CONSULTOR = ?;");
            $Comando->bindParam(1, $this->Email);
            $Comando->bindParam(2, $this->Senha);
            $Comando->bindParam(3, $this->Id);

            if ($Comando->execute()) {
                $Retorno = json_encode("Alterado com Sucesso");
            } else {
                $Retorno = json_encode("Não foi possível Alterar");
            }
        } catch (PDOException $Erro) {
            $Retorno = json_encode(("Erro" . $Erro->getMessage()));
        }
        return $Retorno;
    }

    // Deletar Consultor
    public function DeletarCon()
    {
        include_once "../conexao.php";

        try {
            $Comando = $conexao->prepare("DELETE FROM tb_consultor WHERE ID_CONSULTOR = ?;");
            $Comando->bindParam(1, $this->Id);

            if ($Comando->execute()) {
                $Retorno = json_encode("Deletado com Sucesso");
            } else {
                $Retorno = json_encode("Não foi possível deletar");
            }
        } catch (PDOException $Erro) {
            $Retorno = json_encode(("Erro" . $Erro->getMessage()));
        }
        return $Retorno;
    }

    // Envio de e-mail de ativaçãp
    public function EnvioEmail()
    {
        
        $mail = new PHPMailer(true);

        try {
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->Host = 'smtp.office365.com'; // Altere para o host do Outlook
            $mail->SMTPAuth = true;
            $mail->Username = 'finannce.contato@outlook.com'; // Altere para o seu email do Outlook
            $mail->Password = 'W3HjVxK!9hk6W::'; // Altere para a sua senha do Outlook
            $mail->SMTPSecure = 'tls'; // Use 'tls'
            $mail->Port = 587; // Porta para TLS/STARTTLS

            $mail->setFrom('finannce.contato@outlook.com');
            $mail->addAddress($this->Email);

            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';
            $mail->Subject = 'Cadastro Consultor ativado do Finannce';
            $mail->Body = '<div style="margin: 0 auto; text-align: center; font-family: `poppins`, sans-serif;">
                                <img src="https://www.bing.com/images/blob?bcid=Tg5aB40pW1IG1nURUgpcJyyDTb8A.....4o" alt="" width="40%">
                                <h2>Parabéns, seu cadastro foi ativado. Você já pode entrar no site, finalizar o cadastro e aproveitar a plataforma</h2>
                            </div>';
            $mail->AltBody = 'Parabéns, seu cadastro foi ativado. Você já pode entrar no site, finalizar o cadastro e aproveitar a plataforma';

            if($mail->send()) {
                echo 'Email enviado com sucesso';
            } else {
                echo 'Email nao enviado';
            }
        } catch (Exception $e) {
            echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
        }

    }
}
