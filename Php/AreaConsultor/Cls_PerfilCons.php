<?php

class Cls_PerfilCons{
    private $ID_Consultor;
    private $Nome_Consultor;
    private $Email_Consultor;
    private $Telefone_Consultor;
    private $CPF_Consultor;
    private $RG_Consultor;
    private $Foto_Consultor;
    private $Anexo_Consultor;
    private $CEP;
    private $Rua;
    private $Bairro;
    private $Numero;
    private $Complemento;
    private $Cidade;
    private $Estado;
    private $Modalidade;
    private $Publico;
    private $Formacao;
    private $Experiencia;
    private $Habilidades;
    private $Duracao_Cons;

    //--------------------------------
    public function getID_Consultor(){
        return $this->ID_Consultor;
    }

    public function setID_Consultor($ID){
        $this->ID_Consultor = $ID;
    }
    //--------------------------------
    public function getNome_Consultor(){
        return $this->Nome_Consultor;
    }

    public function setNome_Consultor($nome_con){
        $this->Nome_Consultor = $nome_con;
    }
    
    //--------------------------------
    public function getEmail_Consultor(){
        return $this->Email_Consultor;
    }

    public function setEmail_Consultor($email){
        $this->Email_Consultor = $email;
    }
    //--------------------------------
    public function getTelefone_Consultor(){
        return $this->Telefone_Consultor;
    }

    public function setTelefone_Consultor($telefone){
        $this->Telefone_Consultor = $telefone;
    }

    //--------------------------------
    public function getCPF_Consultor(){
        return $this->CPF_Consultor;
    }

    public function setCPF_Consultor($cpf){
        $this->CPF_Consultor = $cpf;
    }
    //--------------------------------
    public function getRG_Consultor(){
        return $this->RG_Consultor;
    }

    public function setRG_Consultor($rg){
        $this->RG_Consultor = $rg;
    }
    //--------------------------------
    public function getFoto_Consultor(){
        return $this->Foto_Consultor;
    }

    public function setFoto_Consultor($foto){
        $this->Foto_Consultor = $foto;
    }
    //--------------------------------
    public function getAnexo_Consultor(){
        return $this->Anexo_Consultor;
    }

    public function setAnexo_Consultor($anexo){
        $this->Anexo_Consultor = $anexo;
    }
    //--------------------------------
    public function getCEP_Consultor(){
        return $this->CEP;
    }

    public function setCEP_Consultor($cep){
        $this->CEP = $cep;
    }
    //--------------------------------
    public function getRua_Consultor(){
        return $this->Rua;
    }

    public function setRua_Consultor($rua){
        $this->Rua = $rua;
    }
    //--------------------------------
    public function getBairro_Consultor(){
        return $this->Bairro;
    }

    public function setBairro_Consultor($bairro){
        $this->Bairro = $bairro;
    }
    //--------------------------------
    public function getNumero_Consultor(){
        return $this->Numero;
    }

    public function setNumero_Consultor($numero){
        $this->Numero = $numero;
    }
    //--------------------------------
    public function getComplemento_Consultor(){
        return $this->Complemento;
    }

    public function setComplemento_Consultor($complemento){
        $this->Complemento = $complemento;
    }
    //--------------------------------
    public function getCidade_Consultor(){
        return $this->Cidade;
    }

    public function setCidade_Consultor($cidade){
        $this->Cidade = $cidade;
    }
    //--------------------------------
    public function getEstado_Consultor(){
        return $this->Estado;
    }

    public function setEstado_Consultor($estado){
        $this->Estado = $estado;
    }
    //--------------------------------
    public function getModalidade_Consultor(){
        return $this->Modalidade;
    }

    public function setModalidade_Consultor($modalidade){
        $this->Modalidade = $modalidade;
    }
    //--------------------------------
    public function getPublicoAlvo_Consultor(){
        return $this->Publico;
    }

    public function setPublicoAlvo_Consultor($publico){
        $this->Publico = $publico;
    }
    //--------------------------------
    public function getFormacao_Consultor(){
        return $this->Formacao;
    }

    public function setFormacao_Consultor($formacao){
        $this->Formacao = $formacao;
    }
    //--------------------------------
    public function getExperiencia_Consultor(){
        return $this->Experiencia;
    }

    public function setExperiencia_Consultor($experiencia){
        $this->Experiencia = $experiencia;
    }
    //--------------------------------
    public function getHabilidades_Consultor(){
        return $this->Habilidades;
    }

    public function setHabilidades_Consultor($habilidades){
        $this->Habilidades = $habilidades;
    }
    //--------------------------------
    public function getDuracao_Consultoria(){
        return $this->Duracao_Cons;
    }

    public function setDuracao_Consultoria($duracao){
        $this->Duracao_Cons = $duracao;
    }
    

    //---------------------------------
    public function SalvarDadosConsultor(){
        include_once "../conexao.php";

        try
        {
            $Comando = $conexao->prepare("UPDATE tb_consultor SET NOME_CONSULTOR = ?, EMAIL_CONSULTOR = ?, CPF_CONSULTOR = ?, RG_CONSULTOR = ?, FONE_CONSULTOR = ?, CEP_CONSULTOR = ?, RUA_CONSULTOR = ?, BAIRRO_CONSULTOR = ?, NUMERO_CASA_CONSULTOR = ?, COMPLEMENTO_CONSULTOR = ?, CIDADE_CONSULTOR = ?, ESTADO_CONSULTOR = ?, AVATAR_CONSULTOR = ?, ANEXO_CONSULTOR = ?, MODALIDADE = ?, PUBLICO_ALVO = ?, FORMACAO = ?, EXPERIENCIA = ?, HABILIDADE = ?, DURACAO_CONS = ? WHERE  ID_CONSULTOR = ?;");

            $Comando->bindParam(1, $this->Nome_Consultor);
            $Comando->bindParam(2, $this->Email_Consultor);
            $Comando->bindParam(3, $this->CPF_Consultor);
            $Comando->bindParam(4, $this->RG_Consultor);
            $Comando->bindParam(5, $this->Telefone_Consultor);
            $Comando->bindParam(6, $this->CEP);
            $Comando->bindParam(7, $this->Rua);
            $Comando->bindParam(8, $this->Bairro);
            $Comando->bindParam(9, $this->Numero);
            $Comando->bindParam(10, $this->Complemento);
            $Comando->bindParam(11, $this->Cidade);
            $Comando->bindParam(12, $this->Estado);
            $Comando->bindParam(13, $this->Foto_Consultor);
            $Comando->bindParam(14, $this->Anexo_Consultor);
            $Comando->bindParam(15, $this->Modalidade);
            $Comando->bindParam(16, $this->Publico);
            $Comando->bindParam(17, $this->Formacao);
            $Comando->bindParam(18, $this->Experiencia);
            $Comando->bindParam(19, $this->Habilidades);
            $Comando->bindParam(20, $this->Duracao_Cons);
            $Comando->bindParam(21, $this->ID_Consultor);
            
            if($Comando->execute())
            {
                $Retorno = json_encode("Dados salvos com sucesso!");
            }
            else
            {   
                $Retorno = json_encode("Não foi possível salvar os dados.");
            }
        }
        catch (PDOException $Erro)
        {
            $Retorno = json_encode("ERRO: " . $Erro->getMessage());
        }
        
        return $Retorno;
    }

    //---------------------------------
    public function CarregarDados(){
        include_once "../conexao.php";

        try
        {
            $Comando = $conexao->prepare("SELECT * FROM tb_consultor WHERE ID_CONSULTOR = ?;");
            $Comando->bindParam(1, $this->ID_Consultor);

            if($Comando->execute())
            {
                $Matriz  = $Comando->fetchALL();
                $Retorno = json_encode($Matriz);
            }
            else
            {   
                $Retorno = json_encode("Não foi possível carregar os dados para formulario.");
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