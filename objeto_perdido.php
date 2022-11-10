<?php 
require_once 'login.php';
?><!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Objetos Perdidos - Admin</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<!--===============================================================================================-->  
  <link rel="icon" type="image/png" href="images/icons/resultadoicon.ico"/>
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
      <!--<li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>-->
      <!--<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Outros Itens
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Solicitar B.O</a>
          <a class="dropdown-item" href="cadastro_item.html">Reportar Objeto</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="perfil.html">Meu perfil</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Solicitar B.O</a>
      </li>-->
    </ul>
    <form class="form-inline my-2 my-lg-0" method="GET" action="busca_codigo.php">
      <input name="search" class="form-control mr-sm-2" type="search" placeholder="Buscar..." aria-label="Busca">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
    </form>
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="session/logout.php"><i class="fa-solid fa-arrow-right-from-bracket" style="color:white; text-decoration: none;"></i></a>
      </li>
    </ul>
  </div>
</nav>

  <div id="dropDownSelect1"></div>
</div>

<!-- EXIBINDO RESULTADOS DOS ITENS -->
<!--===============================================================================================-->
<div class="card-deck bg-resultado">
<?php 
#========================================================================================================
#trazendo a session para valida o login
require_once 'login.php';
#========================================================================================================
#trazendo a conexão
#========================================================================================================
require_once 'conexao/conecta.php';
#========================================================================================================
$sql_query_lista=$conexao->query("SELECT ui.id_pertence,i.nome,i.descricao, u.email,i.img,ui.id_item,ui.situacao,ui.id_usuario FROM usuario_item ui, item i,usuario u where ui.situacao='Em Análise' and u.id=ui.id_usuario and i.id=ui.id_item;");
while($l=$sql_query_lista->fetch_assoc()){
  $id_item=$l['id_item'];
  $id_usuario=$l['id_usuario'];
  $email=$l['email'];
  $id_pertence=$l['id_pertence'];
?>
  <div class="col-sm-3">
  <div class="card">
    <img class="card-img-top" src="<?php echo $l['img'];?>" alt="Imagem de capa do card">
    <div class="card-body">
      <h5 class="card-title font-weight-bold"><?php echo $l['nome'];?> <p class="card-text"><?php echo $l['descricao'];?></p></h5>
      <?php echo"<a class='btn btn-primary' href='devolve_objeto.php?id=$id_pertence'>Devolver</a>";?>
    </div>
    <div class="card-footer">
      <small class="text-muted">Situação: <p style="color: #FF0000"><?php echo $l['situacao']?><br></p></small>
      <small class="text-muted">Reivindicado por: <p style="color: #189C1B"><?php echo $email?></p></small>
    </div>
  </div>
  </div>
<?php }?>
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
  <footer class="text-center">
    <p>Todos os direitos reservados a Henderson Felipe Alves Castro, Carlos Eduardo Eduardo Guedes e Beatriz Rodrigues Barbosa®</p>
  </footer>
</html>