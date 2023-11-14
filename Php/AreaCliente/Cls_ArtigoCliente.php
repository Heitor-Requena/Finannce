<?php
class Cls_ArtigoCliente{
    private $Palavra;

    public function getPalavraChave(){
        return $this->Palavra;
    }
    public function setPalavraChave($palavra){
        $this->Palavra = $palavra;
    }

    //------------------------------------------
    public function CarregarArtigos(){
        include_once "../conexao.php";

        try
        {
            $Comando = $conexao->prepare("SELECT DATA_PUBLICACAO, TITULO_ARTIGO, ARTIGO, AUTOR_ARTIGO FROM tb_artigo ORDER BY `tb_artigo`.`DATA_PUBLICACAO` DESC;");
            $Comando->execute();

            $Matriz  = $Comando->fetchALL(PDO::FETCH_OBJ);
            $Retorno = json_encode($Matriz);
        }
        catch (PDOException $Erro)
        {
            $Retorno = "ERRO: " . $Erro->getMessage();
        }

        return $Retorno;
    }

    //-----------------------------------------
    public function ProcurarArtigo(){
        include_once "../conexao.php";

        try
        {
            $Comando = $conexao->prepare("SELECT DATA_PUBLICACAO, TITULO_ARTIGO, ARTIGO, AUTOR_ARTIGO FROM tb_artigo WHERE TITULO_ARTIGO LIKE ?;");
            $PalavraChave = "%" . $this->Palavra . "%";
            $Comando->bindParam(1, $PalavraChave);

            if($Comando->execute()){
                $Matriz  = $Comando->fetchALL(PDO::FETCH_OBJ);
                $Retorno = json_encode($Matriz);
            } else {
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
