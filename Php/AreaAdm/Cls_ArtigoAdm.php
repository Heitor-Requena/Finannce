<?php
    class  ClsArtigoAdm{
        private $ID_Artigo;
        private $Titulo_Artigo;
        private $Autor_Artigo;
        private $Texto_Artigo;

        //----------------------------------
        public function getID_Artigo(){
            return $this->ID_Artigo;
        }

        public function setID_Artigo($id){
            $this->ID_Artigo = $id;

        }
        //----------------------------------
        public function getTitulo_Artigo(){
            return $this->Titulo_Artigo;
        }

        public function setTitulo_Artigo($titulo){
            $this->Titulo_Artigo = $titulo;

        }
        //----------------------------------
        public function getAutor_Artigo(){
            return $this->Autor_Artigo;
        }

        public function setAutor_Artigo($autor){
            $this->Autor_Artigo = $autor;

        }
        //----------------------------------
        public function getTexto_Artigo(){
            return $this->Texto_Artigo;
        }

        public function setTexto_Artigo($texto){
            $this->Texto_Artigo = $texto;
        }

        //----------------------------------
        public function CadastrarArtigo(){
            include_once "../conexao.php";

            try{
                $Comando = $conexao->prepare("INSERT INTO tb_artigo (TITULO_ARTIGO, ARTIGO, AUTOR_ARTIGO) VALUES (?,?,?)");
                $Comando->bindParam(1, $this->Titulo_Artigo);
                $Comando->bindParam(2, $this->Texto_Artigo);
                $Comando->bindParam(3, $this->Autor_Artigo);

                if ($Comando->execute())
                {
                    $Retorno = json_encode("Artigo Cadastrado com Sucesso");
                }
                else{
                    $Retorno = json_encode("Artigo não Cadastrado");
                }
            }
            catch (PDOException $Erro)
            {
                $Retorno = json_encode("ERRO: " . $Erro->getMessage());

            }

            return $Retorno;
        }
        //----------------------------------
        public function ExcluirArtigo(){
            include_once "../conexao.php";

            try
            {
                $Comando = $conexao->prepare("DELETE FROM tb_artigo WHERE ID_ARTIGO = ?;");
                $Comando->bindParam(1, $this->ID_Artigo);

                if($Comando->execute()){
                    $Retorno  = json_encode("Excluído com sucesso");
                }
                else{
                    $Retorno = json_encode("Não foi possível excluir");
                }
            }
            catch (PDOException $Erro) 
            {
                $Retorno = json_encode("Erro " . $Erro->getMessage());
            }
            return $Retorno;
        }
        //----------------------------------
        public function ConsultarArtigo(){
            include_once "../conexao.php";
            
            try
            {   
                $Comando = $conexao->prepare("SELECT ID_ARTIGO, TITULO_ARTIGO, ARTIGO, AUTOR_ARTIGO FROM tb_artigo WHERE ID_ARTIGO = ?;");
                $Comando->bindParam(1, $this->ID_Artigo);
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
        public function ListarArtigo(){
            include_once "../conexao.php";
            
            try
            {   
                $Comando = $conexao->prepare("SELECT * FROM tb_artigo;");
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
    }
