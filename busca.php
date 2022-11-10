<?php 
require_once 'login.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!--===============================================================================================-->  
  <link rel="icon" type="image/png" href="images/icons/buscaicon.ico"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <script src="https://kit.fontawesome.com/c65d405071.js" crossorigin="anonymous"></script>
<!--===============================================================================================-->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Busca</title>
  </head>
  <body>

<!-- CABEÇALHO PADRÃO -->
<!--===============================================================================================-->
<div class="sticky-top">
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand font-weight-bold" style="color: #FFFFFF;">Achados e Perdidos</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="busca.php">Home <span class="sr-only">(página atual)</span></a>
      </li>
    </ul>
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="session/logout.php"><i class="fa-solid fa-arrow-right-from-bracket" style="color:white; text-decoration: none;"></i></a>
      </li>
    </ul>
  </div>    

      <!--<li class="nav-item">
        <a class="nav-link" href="perfil.html">Meu Perfil</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="#">Solicitar B.O</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="cadastro_item.html">Reportar Objeto</a>
      </li>-->
  
</nav>

  <div id="dropDownSelect1"></div>
</div>

<!-- CORPO BUSCA -->
<!--===============================================================================================-->
<form method="GET" action="resultado.php">
    <div class="container-busca border-bottom">
      <div class="wrap-busca shadow p-3 mb-5 bg-white rounded">
        <div class="align-center">
          <div class="text-center">
            <h1 class="font-weight-bold">Qual objeto deseja encontrar?</h1>
            <p>Digite as características do objeto perdido no campo abaixo.</p>
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
          <input type="text" name="search" class="form-control" placeholder="Buscar..." aria-label="Busca" aria-describedby="basic-addon1">
          </div>
        </div>
      </div>
    </div>
</form>

    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
  <footer class="text-center">
    <p>Todos os direitos reservados a Henderson Felipe Alves Castro, Carlos Eduardo Eduardo Guedes e Beatriz Rodrigues Barbosa®</p>
  </footer>
</html>