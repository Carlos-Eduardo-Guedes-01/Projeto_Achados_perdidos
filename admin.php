<?php 
require_once 'login.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Página do Administrador</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/cadastroicon.ico"/>
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
</head>
<body>
<!-- CABEÇALHO PADRÃO -->
<!--===============================================================================================-->
<div class="sticky-top">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand font-weight-bold" style="color: #FFFFFF;">Achados e Perdidos</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
  </button>
  
  <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="admin.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="usuario.php">Usuários</a>
      </li>
    </ul>
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="session/logout.php"><i class="fa-solid fa-arrow-right-from-bracket" style="color:white; text-decoration: none;"></i></a>
      </li>
    </ul>
	</nav>
</div>

<!-- CORPO DA PÁGINA -->
<!--===============================================================================================-->

<div class="container-admin">
	     <div class="wrap-bv">
           <h1 class="font-weight-bold text-center" style="color: #fff">Bem vindo, Administrador</h1>
        </div>

<!-- CARD DE BOTÕES -->
<div class="limiter-adm">

<div class="row">

	<!-- CADASTRAR USUÁRIO -->
  <div class="col-sm-3">
    <div class="card">
    	<h5 class="card-header font-weight-bold ">Cadastrar Usuário</h5>
      <div class="card-body">
        <p class="card-text">Insira as informações do usuário para que ele possa logar e buscar pelo objeto perdido.</p>
        <a href="cadastro.php" class="btn btn-primary">Acessar</a>
      </div>
    </div>
  </div>

	<!-- CADASTRAR ITEM -->
  <div class="col-sm-3">
    <div class="card">
    	<h5 class="card-header font-weight-bold">Cadastrar Item</h5>
      <div class="card-body">
        <p class="card-text">Cadastre objetos que foram deixados na instituição para que o dono possa encontrar e assim ter de volta o seu pertence.</p>
        <a href="cadastro_item.php" class="btn btn-primary">Acessar</a>
      </div>
    </div>
  </div>

  <!-- OBJETOS PERDIDOS -->
  <div class="col-sm-3">
    <div class="card">
    	<h5 class="card-header font-weight-bold">Objetos em Análise</h5>
      <div class="card-body">        
        <p class="card-text">Veja os objetos em análise e devolva.</p>
        <a href="objeto_perdido.php" class="btn btn-primary">Acessar</a>
      </div>
    </div>
  </div>

  <!-- OBJETOS DEVOLVIDOS -->
  <div class="col-sm-3">
    <div class="card">
    	<h5 class="card-header font-weight-bold">Objetos Devolvidos</h5>
      <div class="card-body">        
        <p class="card-text">Veja os objetos que foram devolvidos e para quem foi devolvido.</p>
        <a href="objeto_devolvido.php" class="btn btn-primary">Acessar</a>
      </div>
    </div>
  </div>
   	</div>

</div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
<!--===============================================================================================-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
	<footer class="text-center">
		<p>Todos os direitos reservados a Henderson Felipe Alves Castro, Carlos Eduardo Eduardo Guedes e Beatriz Rodrigues Barbosa®</p>
	</footer>
</html>