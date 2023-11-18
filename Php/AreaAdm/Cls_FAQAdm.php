<?php 
ob_start();

require_once('src/PHPMailer.php');
require_once('src/SMTP.php');
require_once('src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class ClsFAQAdm{
    private $ID_Pergunta;
    private $Resposta;
    private $Nome;
    private $Email;
    private $Pergunta;

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
    public function getNome(){
        return $this->Nome;
    }

    public function setNome($Nome){
        $this->Nome = $Nome;

    }
    //----------------------------------
    public function getEmail(){
        return $this->Email;
    }

    public function setEmail($Email){
        $this->Email = $Email;

    }
    //----------------------------------
    public function getPergunta(){
        return $this->Pergunta;
    }

    public function setPergunta($Pergunta){
        $this->Pergunta = $Pergunta;

    }


    //----------------------------------
    public function CadPergunta(){
        include_once "../conexao.php";

        try{
            $Comando = $conexao->prepare("INSERT INTO tb_perguntasFaq (NOME_USUARIO, EMAIL_USUARIO, PERGUNTA) VALUES (?,?,?);");
            $Comando->bindParam(1, $this->Nome);
            $Comando->bindParam(2, $this->Email);
            $Comando->bindParam(3, $this->Pergunta);

            if ($Comando->execute())
            {
                $Retorno = "<script>window.alert('Pergunta enviada, você receberá um e-mail com a resposta em breve'); location.href='../../Html/Home/faqsac.html'</script>;";
            }
            else{
                $Retorno = json_encode("Não foi possível responder a pergunta");
            }
            
        }
        catch(PDOException $Erro)
        {
            $Retorno = "<script>window.alert('Não foi possível enviar sua pergunta, tente novamente em instantes'); location.href='../../Html/Home/faqsac.html'</script>;";
        }
        return $Retorno;
    }

    //----------------------------------
    public function EmailPergunta(){
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
            $mail->Subject = 'Recebemos sua pergunta';
            $mail->Body = '<div style="margin: 0 auto; text-align: center; font-family: `poppins`, sans-serif;">
                                <img src="https://www.bing.com/images/blob?bcid=Tg5aB40pW1IG1nURUgpcJyyDTb8A.....4o" alt="" width="40%">
                                <h2>Olá ' . $this->Nome . ', Recebemos sua pergunta.</h2>
                                <h2>Pergunta: ' . $this->Pergunta . '</h2>
                                <h2>Você receberá um e-mail com a resposta em breve</h2>
                            </div>';
            $mail->AltBody = 'Olá ' . $this->Nome . ', Recebemos sua pergunta. Pergunta: ' . $this->Pergunta .' - Você receberá uma resposta via e-mail em breve. ';

            if($mail->send()) {
                $Retorno = true;
            } else {
                $Retorno = 'Email nao enviado';
            }
        } catch (Exception $e) {
            $Retorno = "Erro ao enviar mensagem: {$mail->ErrorInfo}";
        }
    }

    //----------------------------------
    public function CadastrarResposta(){
        include_once "../conexao.php";

        try{
            $Comando = $conexao->prepare("UPDATE tb_perguntasFaq SET RESPOSTA = ? WHERE ID_PERGUNTA = ? ORDER BY tb_perguntasFaq.ID_PERGUNTA ASC;");
            $Comando->bindParam(1, $this->Resposta);
            $Comando->bindParam(2, $this->ID_Pergunta);

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

    //----------------------------------
    public function DadosEnvioEMail(){
        include "../conexao.php";

        try{
            $Comando = $conexao->prepare("SELECT NOME_USUARIO, EMAIL_USUARIO, PERGUNTA, RESPOSTA FROM tb_perguntasFaq WHERE ID_PERGUNTA = ?;");
            $Comando->bindParam(1, $this->ID_Pergunta);

            if($Comando->execute()){
                $Retorno = $Comando->fetchALL(PDO::FETCH_OBJ);
            }
            else{
                $Retorno = false;
            }
        }
        catch(PDOException $Erro)
        {
            $Retorno = json_encode("Erro" . $Erro->getMessage());
        }

        return $Retorno;
    }
    //---------------------------------
    public function EnvioEmailResposta($Nome, $Email, $Pergunta, $Resposta){
        include_once "../conexao.php";

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
            $mail->addAddress($Email);

            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';
            $mail->Subject = 'Resposta a sua pergunta';
            $mail->Body = '<div style="margin: 0 auto; text-align: center; font-family: `poppins`, sans-serif;">
                                <img src="https://www.bing.com/images/blob?bcid=Tg5aB40pW1IG1nURUgpcJyyDTb8A.....4o" alt="" width="40%">
                                <h2>Olá ' . $Nome . ', Recebemos sua pergunta.</h2>
                                <h2>Pergunta: ' . $Pergunta . '</h2>
                                <h2>Resposta: ' . $Resposta . '</h2>
                            </div>';
            $mail->AltBody = 'Olá ' . $Nome . ', Recebemos sua pergunta. Pergunta: ' . $Pergunta .'Resposta: ' . $Resposta;

            if($mail->send()) {
                $Retorno = "<script>window.alert('Responda enviada'); location.href='pagFAQ.php'</script>;";;
            } else {
                $Retorno = "<script>window.alert('Responda não enviada'); location.href='pagFAQ.php'</script>;";;
            }
        } 
        catch (Exception $e) {
            $Retorno = "Erro ao enviar mensagem: {$mail->ErrorInfo}";
        }
        return $Retorno;
    }
}