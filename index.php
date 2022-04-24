<?php 

require_once("conexao.php");
require_once("config.php");






	//VERIFICAR SE EXISTE REGISTRO NA TABELA USUARIOS E SE NÃO EXISTIR CRIAR
	$senha = '123';
	$senha_cript = md5($senha);
	$res_usuarios = $pdo->query("SELECT * from usuarios");
	$dados_usuarios = $res_usuarios->fetchAll(PDO::FETCH_ASSOC);
	$total_usuarios = count($dados_usuarios);

	if($total_usuarios == 0){
		$res_insert = $pdo->query("INSERT into usuarios (nome, usuario, senha, senha_original, nivel) values ('Administrador', '$email_adm', '$senha_cript', '$senha', 'admin')");
	}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>HOSPITAL UNIVERSITARIO</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<link rel="stylesheet" href="css/login.css">



	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>



</head>
<body>

	<div class="login-form">
		<form action="autenticar.php" method="post">
			<div class="logo">
				<img src="img/logo_furg.png" alt="FURG">
			</div>
			<h2 class="text-center">
				Entre no Sistema
			</h2>
			<div class="form-group">
				<input class="form-control" type="email" name="usuario" placeholder="Insira seu Email!" required>
			</div>

			<div class="form-group">
				<input class="form-control" type="password" name="senha" placeholder="Insira sua senha!" required>
			</div>

			<div class="form-group">
				<button class="btn btn-primary btn-lg btn-block" type="submit" name="btn-login">LOGIN</button>	
			</div>

			<div class="clearfix">
				<label class="float-left checkbox-inline">
					<input type="checkbox">
					Lembrar-me
				</label>
				
			</div>



		</form>
	</div>

</body>
</html>

?>