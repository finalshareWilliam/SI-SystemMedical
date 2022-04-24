<?php 	

//verficações para o Login
require_once("../conexao.php");
require_once("../config.php");

@session_start();
if(!isset($_SESSION['nome_usuario']) || $_SESSION['nivel_usuario'] != 'Recepcionista'){
	header("location:../index.php");
}


$notificacoes = 3;

//VARIÁVEIS DOS MENUS
$item1 = 'home';
$item2 = 'pacientes';
$item3 = 'consultas';
$item4 = 'marcacoes';
$item5 = 'triagens';

//VERIFICAR QUAL O MENU CLICADO E PASSAR A CLASSE ATIVO
if(@$_GET['acao'] == $item1){
	$item1ativo = 'active';
}elseif(@$_GET['acao'] == $item2){
	$item2ativo = 'active';
}elseif(@$_GET['acao'] == $item3){
	$item3ativo = 'active';
}elseif(@$_GET['acao'] == $item4){
	$item4ativo = 'active';
}elseif(@$_GET['acao'] == $item5){
	$item5ativo = 'active';
}else{
	$item1ativo = 'active';
}


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Painel Recepcionista</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<link rel="stylesheet" href="../css/painel.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>




</head>
<body>

	<nav class="navbar navbar-light bg-light">
		<div class="col-md-12">
			<img class="float-left" src="../img/logo_furg.png">
			<li class="float-right nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Recepcionista - <?php echo $_SESSION['nome_usuario']; ?>
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="../logout.php">Sair</a>
					<a class="dropdown-item" data-toggle="modal" data-target="#modal">Alterar Senha</a>
				</div>
			</li>


		</div>
	</nav>

	<div class="container-fluid mt-4">
		<div class="row">
			<div class="col-md-3 col-sm-12 mb-4">
				<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
					<a class="nav-link <?php echo @$item1ativo ?>" id="v-pills-home-tab" href="index.php?acao=<?php echo $item1 ?>" role="tab" aria-controls="v-pills-home" aria-selected="true"><i class="fas fa-home mr-1"></i>Home</a>
					<a class="nav-link <?php echo @$item2ativo ?>"  id="link-medicos"  href="index.php?acao=<?php echo $item2 ?>" role="tab" aria-controls="v-pills-profile"  aria-selected="false"><i class="fas fa-user-md mr-1"></i>Cadastro de Pacientes</a>


					<a class="nav-link <?php echo @$item5ativo ?>" id="v-pills-messages-tab"  href="index.php?acao=<?php echo $item5 ?>" role="tab" aria-controls="v-pills-messages" aria-selected="false"><i class="far fa-user mr-1"></i>Triagem</a>
					
					<a class="nav-link <?php echo @$item3ativo ?>" id="v-pills-messages-tab"  href="index.php?acao=<?php echo $item3 ?>" role="tab" aria-controls="v-pills-messages" aria-selected="false"><i class="far fa-user mr-1"></i>Gestão de Consultas</a>


					<a class="nav-link <?php echo @$item4ativo ?>" id="v-pills-messages-tab"  href="index.php?acao=<?php echo $item4 ?>" role="tab" aria-controls="v-pills-messages" aria-selected="false"><i class="far fa-user mr-1"></i>Marcações</a>




					
				</div>
			</div>
			<div class="col-md-9 col-sm-12">
				<div class="tab-content" id="v-pills-tabContent">

					
					<div class="tab-pane fade show active"  role="tabpanel">
						<?php if(@$_GET['acao'] == $item1){
							include_once($item1.".php"); 
						}elseif(@$_GET['acao'] == $item2){
							include_once($item2.".php"); 
						}elseif(@$_GET['acao'] == $item3){
							include_once($item3.".php"); 
						}elseif(@$_GET['acao'] == $item4){
							include_once($item4.".php");
						}elseif(@$_GET['acao'] == $item5){
							include_once($item5.".php"); 
						
						}else{
							include_once($item1.".php"); 
						}
						?>
					</div>

					

				</div>
			</div>
		</div>
	</div>


</body>
</html>





<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">
					Alterar Senha
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">


				<form method="post">
					

					
					
					<div class="form-group">
						<label for="exampleFormControlInput1">Senha</label>
						<input type="password" class="form-control" id="" placeholder="Insira a Senha" name="senha" >
					</div>

					<div class="form-group">
						<label for="exampleFormControlInput1">Confirmar Senha</label>
						<input type="password" class="form-control" id="" placeholder="Insira a Senha" name="confirmar-senha">
					</div>
					
					


				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

					<button type="submit" name="btn-senha" class="btn btn-primary">Alterar</button>
				</form>
			</div>
		</div>
	</div>
</div>




<!--CÓDIGO DO BOTÃO SALVAR -->
<?php 
if(isset($_POST['btn-senha'])){
	$senha = $_POST['senha'];
	$confirmar_senha = $_POST['confirmar-senha'];



	$email_usuario = $_SESSION['email_usuario'];


	$res_usuario = $pdo->query("SELECT * from usuarios where usuario = '$email_usuario'");
	$dados_usuario = $res_usuario->fetchAll(PDO::FETCH_ASSOC);
    $id_adm = $dados_usuario[0]['id'];	
								
   

    if($senha == $confirmar_senha){
	

		$res = $pdo->prepare("UPDATE usuarios SET senha = :senha, senha_original = :senha_original where id = :id");

		$res->bindValue(":senha", md5($senha));
		$res->bindValue(":senha_original", $senha);
		$res->bindValue(":id", $id_adm);

		$res->execute();

		
		echo "<script language='javascript'>window.location='../index.php'; </script>";

	}else{
		echo "<script language='javascript'>window.alert('As senhas não coincidem!!'); </script>";
	}

	

}

?>

