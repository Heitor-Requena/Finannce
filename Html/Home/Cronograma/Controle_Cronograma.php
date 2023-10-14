
                <?php

                include_once "Cls_Cronograma.php";

                $Crono = new ClsCrono();

                $Nome       = filter_input(INPUT_GET, "Nome");
                $Atv        = filter_input(INPUT_GET, "Atividade");
                $Semana     = filter_input(INPUT_GET, "Semana");

                $Crono->setNome($Nome);
                $Crono->setAtv($Atv);
                $Crono->setSmn($Semana);

                if (isset($_GET["Inserir"])) {
                    echo $Crono->Inserir();
                } else if (isset($_GET["Excluir"])) {
                    echo $Crono->Excluir();
                }

                if (isset($_GET["Alterar"])) {
                    echo $Crono->Alterar();
                } else if (isset($_GET["Pesquisar"])) {
                    $Dados = $Crono->Pesquisar();

                    if (empty($Dados)) {
                        echo "Nenhum registro encontrado";
                    } else {
                        foreach ($Dados as $Dd) {
                            echo "<strong>Nome:         </strong> {$Dd->NOME}       <br>";
                            echo "<strong>Atividade:    </strong> {$Dd->ATIVIDADE}  <br>";
                            echo "<strong>Semana:       </strong> {$Dd->SEMANA}     <br>";
                            echo "<hr><br>";
                        }
                    }
                } else if (isset($_GET["List-Tudo"])) {
                    $Dados = $Crono->Listar();

                    if (empty($Dados)) {
                        echo "Nenhum registro encontrado";
                    } else {
                        foreach ($Dados as $Dd) {
                            echo "<strong>Nome:         </strong> {$Dd->NOME}       <br>";
                            echo "<strong>Atividade:    </strong> {$Dd->ATIVIDADE}  <br>";
                            echo "<strong>Semana:       </strong> {$Dd->SEMANA}     <br>";
                            echo "<hr><br>";
                        }
                    }
                }

                ?>
