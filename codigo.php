<?php
require_once 'login.php';
require_once 'conexao/conecta.php';
$id=$_GET['id'];
$email=$_SESSION['email'];
$senha=$_SESSION['senha'];
$data=date("Y-m-d");
$date = new DateTime("$data");
$hoje=$date->format('Y-m-d');
$date1=$date->modify('+15 day');
$expira_format=$date1->format('Y-m-d');
$erro="select*from usuario where email='$email';";
$execute=$conexao->query($erro);
$line= mysqli_affected_rows($conexao);
if ($line>0){
  
  while($user=mysqli_fetch_assoc($execute)){
  $id_user=$user['id'];
    $sql_query=mysqli_query($conexao,"insert into usuario_item(id_usuario,id_item,data_devolucao,situacao,data_expirar) values('$id_user','$id','$hoje','Em Análise','$expira_format');");

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Seu Código</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<!--===============================================================================================-->  
  <link rel="icon" type="image/png" href="images/icons/user.ico"/>
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
<!-- CABEÇALHO RESULTADOS -->
<!--===============================================================================================-->
<div class="sticky-top bg-resultado">

  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand font-weight-bold" style="color: #FFFFFF;">Achados e Perdidos</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="busca.php">Home</a>
      </li>
    </ul>
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="session/logout.php"><i class="fa-solid fa-arrow-right-from-bracket" style="color:white; text-decoration: none;"></i></a>
      </li>
    </ul>
  </div>
</nav>

  <div id="dropDownSelect1"></div>
</div>

<!-- EXIBINDO CÓDIGO PARA RECEBER OBJETO -->
<!--===============================================================================================-->
<div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <form class="login100-form validate-form">
          <span class="login100-form-title p-b-26">
            Vá até a cordenação
            <p>Se dirija a coordenação para receber se pertence de volta.</p>
          </span>

          <div class="alert alert-primary" role="alert">
          <div class="text-center"></div>
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

</body>
  <footer class="text-center fixed-bottom">
    <p>Todos os direitos reservados a Henderson Felipe Alves Castro, Carlos Eduardo Eduardo Guedes e Beatriz Rodrigues Barbosa®</p>
  </footer>
</html>
<?php
}
}
else{
  die('Falha!') ;
}?>