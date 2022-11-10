<?php
#========================================================================================================
#Cadastro de Item
#========================================================================================================
#trazendo a session para valida o login
#========================================================================================================

require_once 'login.php';
#========================================================================================================
#trazendo a conexão
#========================================================================================================
require_once 'conexao/conecta.php';
#========================================================================================================
#verifica existência do formulário de cadastro
#========================================================================================================
if(isset($_POST['Cadastrar_Item']) && isset($_FILES['img'])){
	$nome=$_POST['nome'];
	$descricao=$_POST['descricao'];
	$arquivo=$_FILES['img'];
	$situacao='Perdido';
	$desc_tot=$nome.' '.$descricao;
	$nome_arq=$arquivo['name'];
	$pasta1="images/";
	$pasta2="itens/";
	$novo_nome=uniqid();
	$extencao=strtolower(pathinfo($nome_arq, PATHINFO_EXTENSION));
	$deu_certo=move_uploaded_file($arquivo["tmp_name"], $pasta1 . $pasta2 . $novo_nome . '.' . $extencao);
	$path=$pasta1.$pasta2.$novo_nome.'.'.$extencao;
	if($deu_certo){
#========================================================================================================
#inserindo os dados no banco de dados
#========================================================================================================
	$sql2="insert into item(nome ,descricao,img) values ('$nome','$desc_tot','$path')";
	mysqli_query($conexao,$sql2);
	$row1=mysqli_affected_rows($conexao);
#========================================================================================================
#avisa ao usuário se o cadastro foi realizado ou não
#========================================================================================================
		if($row1>0){
			echo '<center><p style="color:green;">Cadastrado Com Sucesso!</p></center>';
		}
		else{
			echo '<center><p style="color:red;">Algo de Errado no Código!</p></center>';
		}
}
#========================================================================================================
#Caso o Usuário esqueça de clicar no botão de cadastrar
#========================================================================================================
	else{
		echo '<center><p style="color:red;">Imagem não carregada!</p></center>';
	}
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Cadastrar item - Admin</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/caditemicon.ico"/>
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
        <a class="nav-link" href="admin.php">Home</a></li>

      <!--<li class="nav-item">
        <a class="nav-link" href="#">Solicitar B.O</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="cadastro_item.html">Reportar Objeto</a>
      </li>-->
   </ul>
   <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="session/logout.php"><i class="fa-solid fa-arrow-right-from-bracket" style="color:white; text-decoration: none;"></i></a>
      </li>
    </ul>
  	</div>
	</nav>
</div>

<!-- CORPO DA PÁGINA -->
<!--===============================================================================================-->

<div class="container-cadastro1">
	<div class="wrap-cadastro1">
		<form method="POST" action="" enctype="multipart/form-data">
			<div class="text-center">
            <h1 class="font-weight-bold">Cadastrar Item</h1>
            <p>Digite as características do objeto encontrado no campo abaixo.</p>
          </div>
			<div>
				<label for="input-text">Nome do Objeto*</label>
				<input class="form-control" name="nome" type="text" placeholder="Nome do Objeto" required>
			</div>

			<div>
				<label for="input-text">Descrição do Objeto*</label>
				<input class="form-control" name="descricao" type="text" placeholder="Cor, formato, textura, marca, etc.." required>
			</div>

			<div class="area-upload">
				<label for="upload-file" class="label-upload">
				<i class="fas fa-cloud-upload-alt"></i>
				<div class="texto">Clique ou arraste o arquivo</div>
				</label>
				<input type="file" name="img" accept="image/*" id="upload-file"/>
			
			<div class="lista-uploads"></div>
			</div>

			<input type="submit" name="Cadastrar_Item"class="btn btn-outline-success my-2 my-sm-0">
		</form>
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
	<footer class="text-center">
		<p>Todos os direitos reservados a Henderson Felipe Alves Castro, Carlos Eduardo Eduardo Guedes e Beatriz Rodrigues Barbosa®</p>
	</footer>
</html>