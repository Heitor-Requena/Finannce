<?php     
ob_start();

require_once('src/PHPMailer.php');
require_once('src/SMTP.php');
require_once('src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

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

    // Envio de e-mail com nova senha
    public function EnvioEmail()
    {
        
        $mail = new PHPMailer(true);

        try {
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->Host = 'smtp.office365.com'; 
            $mail->SMTPAuth = true;
            $mail->Username = 'finannce.contato@outlook.com'; 
            $mail->Password = 'W3HjVxK!9hk6W::'; 
            $mail->SMTPSecure = 'tls'; // Use 'tls'
            $mail->Port = 587; // Porta para TLS/STARTTLS

            $mail->setFrom('finannce.contato@outlook.com');
            $mail->addAddress($this->Email);

            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';
            $mail->Subject = 'Nova senha do Finannce';
            $mail->Body = '<div style="margin: 0 auto; text-align: center; font-family: `poppins`, sans-serif;">
                                <img src="https://www.bing.com/images/blob?bcid=Tg5aB40pW1IG1nURUgpcJyyDTb8A.....4o" alt="" width="40%">
                                <h2>Recebemos uma requisição de nova senha, sua nova senha é:</h2>
                                <h1>' . $this->Senha . '</h1>
                            </div>';
            $mail->AltBody = 'Como solicitado, sua nova senha é'. $this->Senha;

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
