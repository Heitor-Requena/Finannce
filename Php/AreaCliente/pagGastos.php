<!DOCTYPE html>
<html lang="en" data-bs-theme="dark" style="height: 100vh;">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <title>Area Cliente</title>
</head>

<body>
    <style>
        *{
            padding: 0;
            margin: 0;
            /* border: 1px solid red; */
        }
    </style>
    <?php
    session_start();

    if ((!isset($_SESSION["id"]) == true) and (!isset($_SESSION["nome"]) == true) and (!isset($_SESSION["email"]) == true)) {
        unset($_SESSION["id"]);
        unset($_SESSION["id"]);
        unset($_SESSION["id"]);
        header('location: ../../index.html');
    } else {
        $Nome = $_SESSION["nome"];
    }
    ?>
    
    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#" id="alterarLogo"><img src="../../Img/logo branca finannce.png" alt="" style="height: 56px;"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <a class="navbar-brand" href="#" id="alterarLogo"><img src="../../Img/logo branca finannce.png" alt="" style="height: 56px;"></a>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="indexCliente.php" name="Home"><i class="bi bi-house"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="pagGastos.php" name="MeusGastos"><strong>MEUS GASTOS</strong></a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="pagConsultores.php" name="MeusGastos">Consultores</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#" name="MeusGastos" onclick="alterarPag('FeedBack')">FeedBack's</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="infopess.php" name="MeusGastos">Meus Dados</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active text-danger" aria-current="page" href="../../index.html" name="Sair"><i class="bi bi-box-arrow-right"></i></a>
            </li>
            </li>
          </ul>                 
        </div>
      </div>
    </div>
  </nav>


    <section id="section" style="margin-top: 100px; height: 100vh; width: 70%; margin: 0 auto;" class="d-flex justify-content-center flex-column">
        <h1 class="text-center m-5">Meus Gastos</h1>

        <div class="row d-flex justify-content-around">
            <div class=" container d-flex justify-content-around flex-column">
                    <button onclick="GraficoRosca(event)" class="iframe-btn btn btn-outline-light m-2">Gráfico de Gastos Recentes</button>
                    <button onclick="TabelaRosca(event)" class="iframe-btn btn btn-outline-light m-2">Tabela de Gastos Recentes</button>
                    <button onclick="TabelaColuna(event), GraficoColuna(event)" class="iframe-btn btn btn-outline-light m-2">Todos Gastos</button>
                    <div id="GraficoColuna" class="col-12"></div>
                    <div id="TabelaGraficoColuna" class="col-12"></div>
                    <form action="ControleGrafico-Cliente.php" id="frm_Grafico" method="get" class="row d-flex justify-content-around" style="width: 99%; margin: 0 auto;">
                        <input type="submit" id="btn_Relatorio" name="btn_Relatorio" class="iframe-btn btn btn-outline-light m-2" value="Relatorio">
                    </form>
            </div>
            <div class="  container d-flex justify-content-around flex-column">
                <div class="row d-flex justify-content-around m-3" >
                    <div id="GraficoRosca" class=""></div>
                    <div id="TabelaGraficoRosca" class=""></div>
                </div>

                <div class="row d-flex justify-content-around m-3">
                    <div id="secaoForm" class=" center m-3">
                        <form action="ControleGrafico-Cliente.php" id="frm_Grafico" method="get" class="container mt-12">

                            <div class="row">
                                <div class="">
                                    <input type="text" name="NomeGasto" id="NomeGasto" class="form-control m-2  " placeholder="Nome do Gasto">
                                </div>
                            </div>

                            <div class="row">
                                <div class="">
                                    <input type="number" name="ValorGasto" id="ValorGasto" min=0 step=0.1 class="form-control m-2  " placeholder="Valor">
                                </div>
                            </div>

                                <input type="number" name="Id_Gasto" id="Id_Gasto" min=0 class="form-control m-2 " placeholder="Número" style="display: none;">

                                <div class="row">
                                    <div class="2 text-center">
                                        <input type="submit" id="btn_AdicionarGasto" name="btn_AdicionarGasto" class="iframe-btn btn m-1  btn-outline-light" value="Adicionar" onclick="AdicionarGasto(event)">
                                        <input type="submit" id="btn_ExcluirGasto" name="btn_ExcluirGasto" class="iframe-btn btn m-1  btn-outline-light" value="Excluir" onclick="ExcluirGasto(event)">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
            
        </div>

        <!-- <div class="container d-flex justify-content-around flex-column">

            <div class="row d-flex justify-content-around m-3">
                <button onclick="GraficoRosca(event)" class="col-4 iframe-btn btn btn-outline-light">Gráfico de Gastos Recentes</button><br>
                <button onclick="TabelaRosca(event)" class="col-4 iframe-btn btn btn-outline-light">Tabela de Gastos Recentes</button>
            </div>

            <div class="row">
                <div id="GraficoRosca" style="width: 400px; height: 300px;" class="col-6"></div>

                <div class="col-6">

                    <div class="row d-flex justify-content-around m-3" >
                        <div id="TabelaGraficoRosca" class="col-12"></div>
                    </div>

                    <div class="row d-flex justify-content-around m-3">
                        <div id="secaoForm" class="col-12 center m-3">
                            <form action="ControleGrafico-Cliente.php" id="frm_Grafico" method="get" class="container mt-12">

                                <div class="row">
                                    <div class="col-12">
                                        <input type="text" name="NomeGasto" id="NomeGasto" class="form-control m-2  col-9" placeholder="Nome do Gasto">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <input type="number" name="ValorGasto" id="ValorGasto" min=0 step=0.1 class="form-control m-2  col-9" placeholder="Valor">
                                    </div>
                                </div>

                                <input type="number" name="Id_Gasto" id="Id_Gasto" min=0 class="form-control m-2 col-9" placeholder="Número" style="display: none;">

                                <div class="row">
                                    <div class="col-12 text-center">
                                        <input type="submit" id="btn_AdicionarGasto" name="btn_AdicionarGasto" class="iframe-btn btn m-1 col-6 btn-outline-light" value="Adicionar" onclick="AdicionarGasto(event)">
                                        <input type="submit" id="btn_ExcluirGasto" name="btn_ExcluirGasto" class="iframe-btn btn m-1 col-6 btn-outline-light" value="Excluir" onclick="ExcluirGasto(event)">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <button onclick="TabelaColuna(event), GraficoColuna(event)" class="col-4 iframe-btn btn btn-outline-light">Todos Gastos</button><br>
            </div>

            <div class="row">
                <div id="GraficoColuna" class="col-12"></div>
            </div>

            <div class="row">
                <div id="TabelaGraficoColuna" class="col-12"></div>
            </div>

            <div class="row">
                <form action="ControleGrafico-Cliente.php" id="frm_Grafico" method="get">
                    <input type="submit" id="btn_Relatorio" name="btn_Relatorio" class="col-4 iframe-btn btn btn-outline-light" value="Relatorio">
                </form>
            </div>

        </div> -->
    </section>

    <section id="result"></section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="../../Js/AreaCliente/AltPag.js"></script>
    <script src="../../Js/AreaCliente/RespostaGrafico-Cliente.js"></script>
    <script src="../../Js/AreaCliente/RespostaConsultores-Cliente.js"></script>
    <script src="../../Js/AreaCliente/RespostaFeedBack-Cliente.js"></script>

</body>

</html>