<?php
class Cls_ArtigoCliente{
    public function CarregarArtigos(){
        include_once "../conexao.php";

        try
        {
            $Comando = $conexao->prepare("SELECT DATA_PUBLICACAO, TITULO_ARTIGO, ARTIGO, AUTOR_ARTIGO FROM tb_artigo ORDER BY `tb_artigo`.`DATA_PUBLICACAO` DESC;");
            $Comando->execute();

            $Matriz  = $Comando->fetchALL();
            $Retorno = json_encode($Matriz);
        }
        catch (PDOException $Erro)
        {
            $Retorno = "ERRO: " . $Erro->getMessage();
        }

        return $Retorno;
    }
}
?>