<?php
class Cls_InfopessCliente{
    private $Id_Cliente;
    private $Nome_Cliente;
    private $Email_Cliente;
    private $CPF_Cliente;
    private $RG_Cliente;
    private $Nasc_Cliente;
    private $CEP_Cliente;
    private $Rua_Cliente;
    private $Bairro_Cliente;
    private $NCasa_Cliente;
    private $Complemento_Cliente;
    private $Cidade_Cliente;
    private $Estado_Cliente;

    //-------------------------------------
    public function getID_Cliente(){
        return $this->Id_Cliente;
    }
    
    public function setID_Cliente($id){
        $this->Id_Cliente = $id;
    }
    //-------------------------------------
    public function getNomeCliente(){
        return $this->Nome_Cliente;
    }

    public function setNomeCliente($Nome){
        $this->Nome_Cliente = $Nome;
    }
    //-------------------------------------
    public function getEmailCliente(){
        return $this->Email_Cliente;
    }

    public function setEmailCliente($Email){
        $this->Email_Cliente = $Email;
    }
    //-------------------------------------
    public function getCPFCliente(){
        return $this->CPF_Cliente;
    }

    public function setCPFCliente($CPF){
        $this->CPF_Cliente = $CPF;
    }
    //-------------------------------------
    public function getRGCliente(){
        return $this->RG_Cliente;
    }

    public function setRGCliente($RG){
        $this->RG_Cliente = $RG;
    }
    //-------------------------------------
    public function getDataNasc(){
        return $this->Nasc_Cliente;
    }

    public function setDataNasc($Nasc){
        $this->Nasc_Cliente = $Nasc;
    }
    //-------------------------------------
    public function getCEPCliente(){
        return $this->CEP_Cliente;
    }

    public function setCEPCliente($CEP){
        $this->CEP_Cliente = $CEP;
    }
    //-------------------------------------
    public function getRuaCliente(){
        return $this->Rua_Cliente;
    }

    public function setRuaCliente($Rua){
        $this->Rua_Cliente = $Rua;
    }
    //-------------------------------------
    public function getBairroCliente(){
        return $this->Bairro_Cliente;
    }

    public function setBairroCliente($Bairro){
        $this->Bairro_Cliente = $Bairro;
    }
    //-------------------------------------
    public function getNumeroCasaCliente(){
        return $this->NCasa_Cliente;
    }

    public function setNumeroCasaCliente($NCasa){
        $this->NCasa_Cliente = $NCasa;
    }
    //-------------------------------------
    public function getComplementoCliente(){
        return $this->Complemento_Cliente;
    }

    public function setComplementoCliente($Complemento){
        $this->Complemento_Cliente = $Complemento;
    }
    //-------------------------------------
    public function getCidadeCliente(){
        return $this->Cidade_Cliente;
    }

    public function setCidadeCliente($Cidade){
        $this->Cidade_Cliente = $Cidade;
    }
    //-------------------------------------
    public function getEstadoCliente(){
        return $this->Estado_Cliente;
    }       

    public function setEstadoCliente($Estado){
        $this->Estado_Cliente = $Estado;
    }

    //----------------------------------------
    public function CarregarDados(){
        include_once "../conexao.php";

        try
        {
            $Comando = $conexao->prepare("SELECT * FROM tb_cliente WHERE ID_CLIENTE = ?;");
            $Comando->bindParam(1, $this->Id_Cliente);

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

    
    public function SalvarDados(){
        include_once "../conexao.php";

        try
        {
            $Comando = $conexao->prepare("UPDATE tb_cliente SET NOME_CLIENTE = ?, 	EMAIL_CLIENTE = ?, CPF_CLIENTE = ?, RG_CLIENTE = ?, DTA_NASC_CLIENTE = ?, CEP_CLIENTE = ?, RUA_CLIENTE = ?, BAIRRO_CLIENTE = ?, NUMERO_CASA_CLIENTE = ?, COMPLEMENTO_CLIENTE = ?, CIDADE_CLIENTE = ?, ESTADO_CLIENTE = ? WHERE ID_CLIENTE = ?;");
            $Comando->bindParam(1, $this->Nome_Cliente);
            $Comando->bindParam(2, $this->Email_Cliente);
            $Comando->bindParam(3, $this->CPF_Cliente);
            $Comando->bindParam(4, $this->RG_Cliente);
            $Comando->bindParam(5, $this->Nasc_Cliente);
            $Comando->bindParam(6, $this->CEP_Cliente);
            $Comando->bindParam(7, $this->Rua_Cliente);
            $Comando->bindParam(8, $this->Bairro_Cliente);
            $Comando->bindParam(9, $this->NCasa_Cliente);
            $Comando->bindParam(10, $this->Complemento_Cliente);
            $Comando->bindParam(11, $this->Cidade_Cliente);
            $Comando->bindParam(12, $this->Estado_Cliente);
            $Comando->bindParam(13, $this->Id_Cliente);
            

            if($Comando->execute())
            {
                $Retorno = "<script>window.alert('Salvo com sucesso'); location.href='infopess.php'</script>;";
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