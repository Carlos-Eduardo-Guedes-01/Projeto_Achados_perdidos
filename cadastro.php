<?php /*
=========================================================================================================
Cadastro de usuario
=========================================================================================================
trazendo a session para valida o login*/
require_once 'login.php';
#========================================================================================================
#trazendo a conexão
#========================================================================================================
require_once 'conexao/conecta.php';
#========================================================================================================
#verifica existência do formulário de cadastro
#========================================================================================================
if(isset($_POST['cadastrar'])){
#========================================================================================================
#verifica se a senha é a mesma da confirma senha
#========================================================================================================	
	if($_POST['senha']==$_POST['confirma']){
		$senha=$_POST['senha'];
		$email=$_POST['email'];
#========================================================================================================
#verifica se há uma senha ou e-mail iguais já cadastrada
#========================================================================================================
		$sql1="select*from usuario where senha='$senha'";
		$sql3="select*from usuario where email='$email'";
		mysqli_query($conexao,$sql1);
		$rowSenha=mysqli_affected_rows($conexao);
		mysqli_query($conexao,$sql3);
		$rowEmail=mysqli_affected_rows($conexao);
		if($rowSenha==0 && $rowEmail==0){
			$nome=$_POST['nome'];
			$profissao=$_POST['profissao'];
			$cidade=$_POST['cidade'];
			$estado=$_POST['estado'];
			$cep=$_POST['cep'];
			$endereco=$_POST['endereco'];
			$telefone=$_POST['telefone'];
#========================================================================================================
#inserindo os dados no banco de dados
#========================================================================================================
			$sql2="insert into usuario(nome_usuario ,email ,senha, profissao, cidade, estado, cep, endereco, telefone)
			values('$nome','$email','$senha','$profissao','$cidade','$estado','$cep','$endereco','$telefone')";
			mysqli_query($conexao,$sql2);
			$row1=mysqli_affected_rows($conexao);
#========================================================================================================
#avisa ao usuário se o cadastro foi realizado ou não
#========================================================================================================
			if($row1>0){
				echo '<center><p style="color:green;">Cadastrado com sucesso!</p></center>';
			}
			else{
				echo '<center><p style="color:red;">algo de errado no código!</p></center>';
			}
	}
#========================================================================================================
#Caso a senha ou e-mail já exista
#========================================================================================================
	else{
		echo '<center><p style="color:red;">E-mail ou senha já existe!</p></center>';
	}
	}
	else{
		echo '<center><p style="color:red;">Clique no botão de cadastrar!</p></center>';
	}
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Cadastro - Admin</title>
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

<div class="container-cadastro">
	<div class="wrap-cadastro">

	<div class="align-center">
        <div class="text-center">
           <h1 class="font-weight-bold">Cadastrar-se</h1>
           <p>Preencha os campos abaixo com os dados do Usuário</p>
        </div>
    </div>

	<form method="POST" action="" enctype="multipart/form-data">
  		<div class="form-row">
  				<div class="col-md-6">
    		<label for="inputName">Nome*</label>
      		<input type="text" name="nome" class="form-control" id="inputnome" placeholder="Nome completo" required>
    	</div>

    		<div class="form-group col-md-6">
      			<label for="inputEmail4">Email*</label>
      			<input type="email" name="email" class="form-control" id="inputEmail4" placeholder="exemplo@hotmail.com" required>
    		</div>

    		<div class="form-group col-md-6">
      			<label for="inputPassword4">Senha*</label>
      			<input type="password" name="senha" class="form-control" id="inputPassword4" placeholder="Senha" required>
      			<small id="passwordHelpInline" class="text-muted">
      			Deve ter entre 8 e 20 caracteres.
    			</small>
    		</div>

    		<div class="form-group col-md-6">
      			<label for="inputPassword4">Confirme sua senha*</label>
      			<input type="password" name="confirma" class="form-control" id="inputPassword4" placeholder="Confirme sua Senha" required>
      			<small id="passwordHelpInline" class="text-muted">
      			Deve corresponder ao campo anterior.
    			</small>
    		</div>
  		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
      			<label for="input-text">Profissão</label>
      			<input type="text" name="profissao" class="form-control" id="inputprofissao" placeholder="Advogado, Estudante, Professor, Designer, etc...">
    		</div>
  			
  			<!--<div class="form-group col-md-3">
      			<label for="input-text">Instagram</label>
      			<input type="text" class="form-control" id="inputlinkinsta" placeholder="www.instagram.com/usuario">
    		</div>

    		<div class="form-group col-md-3">
      			<label for="input-text">Facebook</label>
      			<input type="text" class="form-control" id="inputlinkface" placeholder="www.facebook.com/usuario">
    		</div>-->

    		<div class="form-group col-md-6">
      			<label for="inputCity">Cidade*</label>
      			<input type="text" name="cidade" class="form-control" id="inputCity" placeholder="São Paulo, Rio de Janeiro, Corrente, etc..." required>
    		</div>

    		    	<div class="form-group col-md-4">
      		<label for="inputEstado">Estado*</label>
      		<select id="inputEstado" name="estado" class="form-control" required>
        	<option selected>Escolher...</option>
        	<option>Acre-AC</option>
        	<option>Alagoas-AL</option>
        	<option>Amapá-AP</option>
        	<option>Amazonas-AM</option>
        	<option>Bahia-BA</option>
        	<option>Ceará-CE</option>
        	<option>Distrito Federal-DF</option>
        	<option>Espírito Santo-ES</option>
        	<option>Goiás-GO</option>
        	<option>Maranhão-MA</option>
        	<option>Mato Grosso-MT</option>
        	<option>Mato Grosso do Sul-MS</option>
        	<option>Minas Gerais-MG</option>
        	<option>Pará-PA</option>
        	<option>Paraíba-PB</option>
        	<option>Paraná-PR</option>
        	<option>Pernambuco-PE</option>
        	<option>Piauí-PI</option>
        	<option>Rio de Janeiro-RJ</option>
        	<option>Rio Grande do Norte-RN</option>
        	<option>Rio Grande do Sul-RS</option>
        	<option>Rondônia-RO</option>
        	<option>Roraima-RR</option>
        	<option>Santa Catarina-SC</option>
      		</select>
    	</div>

    	<div class="form-group col-md-2">
      		<label for="inputCEP">CEP*</label>
      		<input type="text" name="cep" class="form-control" id="inputCEP" placeholder="00.000-000" onkeypress="$(this).mask('00.000-000')" required>
    	</div>

    		<div class="form-group col-md-6">
    			<label for="inputAddress">Endereço*</label>
    			<input type="text" name="endereco" class="form-control" id="inputAddress" placeholder="Rua dos Bobos, nº 0" required>
  			</div>

    		<div class="form-group col-md-6">
      			<label for="inputCity">Telefone*</label>
      			<input type="text" name="telefone" class="form-control" id="inputphone" placeholder="(99) 9 9999-9999" onkeypress="$(this).mask('(00) 0 0000-0000')" required>
    		</div>

    		

    		


  		</div>

  		<button type="submit" name="cadastrar" class="btn btn-primary">Cadastrar</button>
  			
  			<!--<div class="text-center">
						<span class="txt1">
							Já tem uma conta?
						</span>

						<a class="txt2" href="index.html">
							Fazer Login
						</a>
			</div>-->

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