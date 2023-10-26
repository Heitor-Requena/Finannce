<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  <title>Area Cliente</title>
</head>

<body>

  <?php
    session_start();

    if ((!isset($_SESSION["id"]) == true) and (!isset($_SESSION["nome"]) == true) and (!isset($_SESSION["email"]) == true))
    {
      unset($_SESSION["id"]);
      unset($_SESSION["nome"]);
      unset($_SESSION["email"]);
      header('location: ../../index.html');
    } 
    else{
      $Nome = $_SESSION["nome"];
      $Email = $_SESSION["email"];
      $ID = $_SESSION["id"];
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
              <a class="nav-link active" aria-current="page" href="indexConsultor.php" name="Home" onclick="alterarPag('Home')">Home</a>
            </li>
           
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Configurações
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#" onclick="alterarPag('InfoPess')">Meus Dados</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
            <li class="nav-item">
              <a class="nav-link active text-danger" aria-current="page" href="../../index.html" name="Sair">Sair</a>
            </li>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>

  <section id="section" style="margin-top: 100px;">
  <h1 class="text-center align-middle mt-5">Seja bem vindo, <?php echo $Nome ?></h1>
    </section>



    <h2 class="text-center mt-3">Meus Dados</h2>
               
               <form class="container mt-5" action="" method="POST">
                 <h4 class="text-start">Informações pessoais</h4>
                 <div class="row">
                   <div class="col-6">
                     <input type="text" name="Nome" id="Nome" class="form-control m-2" placeholder="Nome">
                   </div>
                   <div class="col-6">
                     <input type="text" name="Sobrenome" id="Sobrenome" class="form-control m-2" placeholder="Sobrenome">
                   </div>
                 </div>
             
                 <div class="row">
                     <div class="col-6">
                       <input type="email" name="Email" id="Email" class="form-control m-2" placeholder="Email">
                 </div>
       
                  
                 <div class="col-6">
                     <input type="text" name="Tel:" id="Tel:" class="form-control m-2" placeholder="Contato: (00) 00000-0000">
                   </div>
                 </div>
                
                 
                 <div class="row">
                   <div class="col-6">
                     <input type="text" name="CPF" id="CPF" class="form-control m-2" placeholder="CNPJ - 000.000/0000-00" pattern="[0-9]{3}.[0-9]{3}/[0-9]{4}-[0-9]{2}">
                   </div>
                   <div class="col-6">
                     <input type="text" name="RG" id="RG" class="form-control m-2" placeholder="RG - 00.000.000-0" pattern="[0-9]{2}.[0-9]{3}.[0-9]{3}-[0-9]{1}">
                   </div>
                 </div>

                 <div class="row">
                   <label for="Nasc" class="col-sm-2 col-form-label text-center "><h6>Data de Nascimento: </h6></label>
                   <div class="col-md-4">
                     <input type="date" class="form-control" id="Nasc" min="2005-01-01">
                   </div>
                 </div> <br>

                <!--ANEXOS-->

                 <div class="row">
                    <div class="col-6">
                      <label class="col-form-label" for="Avatar_Consultor"><h5>Foto de Perfil</h5></label><br>
                      <input type="file" name="Avatar_Consultor" id="Avatar_Consultor" placeholder="Insira seu Arquivo" accept=" image/jpeg, image/jpg, image/png">
                    </div>
                    
                    <div class="col-6">
                      <label class="col-form-label" for="Anexo_Consultor"><h5>Anexo Adicionais</h5></label><br>
                      <input type="file" name="Anexo_Consultor" id="Anexo_Consultor" placeholder="Insira seu Arquivo" accept=" .jpeg, .jpg, .png, .doc">
                    </div>
                   </div>
                   
                   <hr>
                   <br>


                  <!--MAIS DADOS-->

                  <h4 class="text-start">Endereço</h4>
      
                  <div class="row">
                    <div class="col-4">
                      <input type="number" name="CEP" id="CEP" class="form-control m-2" placeholder="CEP (Sem traço)" pattern="[0-9]{9}">
                    </div>
                    <div class="col-4">
                      <input type="text" name="Rua" id="Rua" class="form-control m-2" placeholder="Rua">
                    </div>
                    <div class="col-4">
                      <input type="text" name="Bairro" id="Bairro" class="form-control m-2" placeholder="Bairro">
                    </div>
                  </div>
              
                  <div class="row">
                    <div class="col-3">
                      <input type="number" name="Numero" id="Numero" class="form-control m-2" placeholder="Número">
                    </div>
                    <div class="col-9">
                      <input type="text" name="Complemento" id="Complemento" class="form-control m-2" placeholder="Complemento">
                    </div>
                  </div>
              
                  <div class="row">
                    <div class="col-6">
                      <input type="text" name="Cidade" id="Cidade" class="form-control m-2" placeholder="Cidade">
                    </div>
                    <div class="col-6">
                      <input type="text" name="Estado" id="Estado" class="form-control m-2" placeholder="Estado">
                    </div>
                  </div>

                  <br>
                  
       
                 <!--MAIS DADOS-->
                
               <div class="row">
                       <div class="col-sm-5 col-md-6">
                         <label for="Modalidade"><h5>Modalidade:</h5></label> <br>
                         
                         <input type="radio" name="Modalidade" id="R"> Remoto <br>
       
                         <input type="radio" name="Modalidade" id="P" > Presencial <br>

                         <input type="radio" name="Modalidade" id="H" > Híbrido <br>

                         
                       </div>
       
       
                       <div class="col-sm-5 col-md-6">
                         <label for="PubAlvo"><H5>Público Alvo:</H5></label> <br>
                         <input type="radio" name="PubAlvo" id="Adultos"> Adultos <br>
       
                         <input type="radio" name="PubAlvo" id="Adolescentes"> Adolescentes
                       </div>
               </div>
               <br>
         
             
                    <div class="">
                      <label for="Formacao"  class=" col-form-label  "><h5>Formação: </h5></label>
                       <textarea name="Formacao" id="Formacao"  rows="3" class="form-control" placeholder="Falculdades, cursos técnicos..."></textarea>
                    </div>

                   <br>
       
                   <div class="mb-3">
                     <label for="Experiencia" class=" col-form-label  "><h5>Fale um pouco sobre suas Experiências:</h5></label>
                     <textarea class="form-control" name="Experiencia" id="Experiencia" rows="3" placeholder="Ex: trabalhos anteriores, vivências, tabalhos voluntários..."></textarea></div>  

                     <div class="mb-3">
                     <label for="Habilidade" class=" col-form-label  "><h5>Escreva sobre suas Habilidades:</h5></label>
                     <textarea class="form-control" name="Habilidade" id="Habilidade" rows="3" placeholder="Habilidades profissionais adquiridas ao longo da vida"></textarea></div>  
          
       
                   <div class="row">
                   <div class="col-6">
                     <label class="col-form-label "for="TempCons"><h5>Duração da Consultoria (Em Horas)</h5></label>
                     <input type="time" name="TempCons" id="TempCons" class="form-control m-2" placeholder="TempCons">
                   </div>
                   </div>
       
                   <div class="text-center">
                   <button type="button" id="iframe-submit-btn2" class="iframe-btn btn m-3 col-6 btn-outline-light">Salvar</button>
                 </div>
       
             


               </form>

  </section>

  <section id="result"></section>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script src="../../Js/AreaCliente/AltPag.js"></script>
  <script src="../../Js/AreaCliente/Js-InfoPess.js"></script>
  <script src="../../Js/AreaCliente/RespostaGrafico-Cliente.js"></script>
</body>

</html>