<?php 
require_once 'login.php';
require_once 'conexao/conecta.php';
$data=date("Y-m-d");
$query_data=$conexao->query("select*from usuario_item where data_expirar<='$data' and situacao='Em Análise';");
$num=mysqli_affected_rows($conexao);
if($num>0){
  while($l=$query_data->fetch_assoc()){
  $id=$l['id_pertence'];
  $delete=$conexao->query("delete from usuario_item where id_pertence='$id';");
  }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <?php 
    $busca=$_GET['search'];
  ?>
  <title>Resultados</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/main.css">
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
        <a class="nav-link" href="busca.php">Home <span class="sr-only">(página atual)</span></a>
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
    <?php # echo"<a class='btn btn-primary' href='devolve_objeto.php?id=$id'>Devolver</a>";?>
    <?php # echo"<a class='btn btn-primary' href='devolve_objeto.php?id=$id'>Devolver</a>";?>
    <?php ?>
    <form class="form-inline my-2 my-lg-0" method="GET" action="">
      <input class="form-control mr-sm-2" name="search" type="search" value="<?php echo $busca?>" placeholder="Buscar..." aria-label="Busca">
      <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Buscar</button>
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
<div class="card-deck">
<?php 
#========================================================================================================
#trazendo a conexão
#========================================================================================================
require_once 'conexao/conecta.php';
#========================================================================================================
$sql_query_lista=$conexao->query("SELECT * FROM item where descricao like '%$busca%' ORDER BY nome");
while($l=$sql_query_lista->fetch_assoc()){
  $id=$l['id'];
  mysqli_query($conexao,"select * from usuario_item where id_item='$id'");
  $lin=mysqli_affected_rows($conexao);
  if($lin==0){

?>

  <div class="col-sm-3">
    <div class="card">
      <img class="card-img-top" src="<?php echo $l['img'];?>" alt="Imagem de capa do card">
      <div class="card-body">
      
        <h5 class="card-title font-weight-bold"><?php echo $l['nome'];?> <p class="card-text"><?php echo $l['descricao'];?></p></h5>
        <input style="display: none;" type="text" name="id" value="<?php echo $l['id'];?>" readonly>
        OBS:Ao clicar terá que ir buscar o pertence!
        <br>
        <?php echo"<a class='btn btn-primary' href='codigo.php?id=$id'>Revindicar</a>";?>
      </div>
      <div class="card-footer">
        <small class="text-muted">Situação: <p style="color: #FF0000">Perdido!</small>
        <small class="text-muted"><p style="color: #FF0000">OBS:Ao clicar terá que ir buscar o pertence!</p></small>
      </div>
    </div>
  </div>
  
<?php }
else{
}} ?>
</div>

<?php

?>

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