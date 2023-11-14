<?php
class Cls_InfopessConsultor{
    private $Id_Consultor;
    private $Nome_Consultor;
    private $Email_Consultor;
    private $Tel_Consultor;
    private $CPF_Consultor;
    private $RG_Consultor;
    private $Nasc_Consultor;
    private $CEP_Consultor;
    private $Rua_Consultor;
    private $Bairro_Consultor;
    private $NCasa_Consultor;
    private $Complemento_Consultor;
    private $Cidade_Consultor;
    private $Estado_Consultor;
    private $Modalidade_Consultor;
    private $PubAlvo_Consultor;
    private $Formacao_Consultor;
    private $Experiencia_Consultor;
    private $Habilidade_Consultor;
    private $TempCons_Consultor;
    private $Link_Consultor;

    //-------------------------------------
    public function getID_Consultor(){
        return $this->Id_Consultor;
    }
    
    public function setID_Consultor($id){
        $this->Id_Consultor = $id;
    }
    //-------------------------------------
    public function getNomeConsultor(){
        return $this->Nome_Consultor;
    }

    public function setNomeConsultor($Nome){
        $this->Nome_Consultor = $Nome;
    }
    //-------------------------------------
    public function getEmailConsultor(){
        return $this->Email_Consultor;
    }

    public function setEmailConsultor($Email){
        $this->Email_Consultor = $Email;
    }
    //-------------------------------------
    public function getTelConsultor(){
        return $this->Tel_Consultor;
    }       

    public function setTelConsultor($Tel){
        $this->Tel_Consultor = $Tel;
    }
    //-------------------------------------
    public function getCPFConsultor(){
        return $this->CPF_Consultor;
    }

    public function setCPFConsultor($CPF){
        $this->CPF_Consultor = $CPF;
    }
    //-------------------------------------
    public function getRGConsultor(){
        return $this->RG_Consultor;
    }

    public function setRGConsultor($RG){
        $this->RG_Consultor = $RG;
    }
    //-------------------------------------
    public function getDataNasc(){
        return $this->Nasc_Consultor;
    }

    public function setDataNasc($Nasc){
        $this->Nasc_Consultor = $Nasc;
    }
    //-------------------------------------
    public function getCEPConsultor(){
        return $this->CEP_Consultor;
    }

    public function setCEPConsultor($CEP){
        $this->CEP_Consultor = $CEP;
    }
    //-------------------------------------
    public function getRuaConsultor(){
        return $this->Rua_Consultor;
    }

    public function setRuaConsultor($Rua){
        $this->Rua_Consultor = $Rua;
    }
    //-------------------------------------
    public function getBairroConsultor(){
        return $this->Bairro_Consultor;
    }

    public function setBairroConsultor($Bairro){
        $this->Bairro_Consultor = $Bairro;
    }
    //-------------------------------------
    public function getNumeroCasaConsultor(){
        return $this->NCasa_Consultor;
    }

    public function setNumeroCasaConsultor($NCasa){
        $this->NCasa_Consultor = $NCasa;
    }
    //-------------------------------------
    public function getComplementoConsultor(){
        return $this->Complemento_Consultor;
    }

    public function setComplementoConsultor($Complemento){
        $this->Complemento_Consultor = $Complemento;
    }
    //-------------------------------------
    public function getCidadeConsultor(){
        return $this->Cidade_Consultor;
    }

    public function setCidadeConsultor($Cidade){
        $this->Cidade_Consultor = $Cidade;
    }
    //-------------------------------------
    public function getEstadoConsultor(){
        return $this->Estado_Consultor;
    }       

    public function setEstadoConsultor($Estado){
        $this->Estado_Consultor = $Estado;
    }
    //-------------------------------------
    public function getModalidadeConsultor(){
        return $this->Modalidade_Consultor;
    }       

    public function setModalidadeConsultor($Modalidade){
        $this->Modalidade_Consultor = $Modalidade;
    }
    //-------------------------------------
    public function getPubAlvoConsultor(){
        return $this->PubAlvo_Consultor;
    }       

    public function setPubAlvoConsultor($PubAlvo){
        $this->PubAlvo_Consultor = $PubAlvo;
    }
    //-------------------------------------
    public function getFormacaoConsultor(){
        return $this->Formacao_Consultor;
    }       

    public function setFormacaoConsultor($Formacao){
        $this->Formacao_Consultor = $Formacao;
    }
    //-------------------------------------
    public function getExperienciaConsultor(){
        return $this->Experiencia_Consultor;
    }       

    public function setExperienciaConsultor($Experiencia){
        $this->Experiencia_Consultor = $Experiencia;
    }
    //-------------------------------------
    public function getHabilidadeConsultor(){
        return $this->Habilidade_Consultor;
    }       

    public function setHabilidadeConsultor($Habilidade){
        $this->Habilidade_Consultor = $Habilidade;
    }
    //-------------------------------------
    public function getTempConsConsultor(){
        return $this->TempCons_Consultor;
    }       

    public function setTempConsConsultor($TempCons){
        $this->TempCons_Consultor = $TempCons;
    }
    //-------------------------------------
    public function getLinkConsultor(){
        return $this->Link_Consultor;
    }       

    public function setLinkConsultor($Link){
        $this->Link_Consultor = $Link;
    }

    //----------------------------------------
    public function CarregarDados(){
        include_once "../conexao.php";

        try
        {
            $Comando = $conexao->prepare("SELECT * FROM tb_Consultor WHERE ID_CONSULTOR = ?;");
            $Comando->bindParam(1, $this->Id_Consultor);

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
            $Comando = $conexao->prepare("UPDATE tb_consultor SET NOME_CONSULTOR = ?, 	EMAIL_CONSULTOR = ?, FONE_CONSULTOR = ?, CPF_CONSULTOR = ?, RG_CONSULTOR = ?, DTA_NASC_CONSULTOR = ?, CEP_CONSULTOR = ?, RUA_CONSULTOR = ?, BAIRRO_CONSULTOR = ?, NUMERO_CASA_CONSULTOR = ?, COMPLEMENTO_CONSULTOR = ?, CIDADE_CONSULTOR = ?, ESTADO_CONSULTOR = ?, MODALIDADE = ?, PUBLICO_ALVO = ?, FORMACAO = ?, EXPERIENCIA = ?, HABILIDADE = ?, DURACAO_CONS = ?, LINK_CONSULTOR = ? WHERE ID_CONSULTOR = ?;");
            $Comando->bindParam(1, $this->Nome_Consultor);
            $Comando->bindParam(2, $this->Email_Consultor);
            $Comando->bindParam(3, $this->Tel_Consultor);
            $Comando->bindParam(4, $this->CPF_Consultor);
            $Comando->bindParam(5, $this->RG_Consultor);
            $Comando->bindParam(6, $this->Nasc_Consultor);
            $Comando->bindParam(7, $this->CEP_Consultor);
            $Comando->bindParam(8, $this->Rua_Consultor);
            $Comando->bindParam(9, $this->Bairro_Consultor);
            $Comando->bindParam(10, $this->NCasa_Consultor);
            $Comando->bindParam(11, $this->Complemento_Consultor);
            $Comando->bindParam(12, $this->Cidade_Consultor);
            $Comando->bindParam(13, $this->Estado_Consultor);
            $Comando->bindParam(14, $this->Modalidade_Consultor);
            $Comando->bindParam(15, $this->PubAlvo_Consultor);
            $Comando->bindParam(16, $this->Formacao_Consultor);
            $Comando->bindParam(17, $this->Experiencia_Consultor);
            $Comando->bindParam(18, $this->Habilidade_Consultor);
            $Comando->bindParam(19, $this->TempCons_Consultor);
            $Comando->bindParam(20, $this->Link_Consultor);
            $Comando->bindParam(21, $this->Id_Consultor);
            

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