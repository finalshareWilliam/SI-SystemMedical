<?php $pagina = 'usuarios'; ?>

<div class="row botao-novo">
	<div class="col-md-12">
		<a id="btn-novo" data-toggle="modal" data-target="#modal"></a>
		<a href="index.php?acao=<?php echo $pagina ?>&funcao=novo"  type="button" class="btn btn-secondary">Novo Usuário</a>
	</div>
</div>

<div class="row mt-4">
	<div class="col-md-6 col-sm-12">
		<form method="post">
		<div class="float-left">
			
						
				<select onChange="submit();" class="form-control-sm" id="exampleFormControlSelect1" name="itens-pagina">

					<?php 

						if(isset($_POST['itens-pagina'])){
							$item_paginado = $_POST['itens-pagina'];
						}elseif(isset($_GET['itens'])){
							$item_paginado = $_GET['itens'];
						}

					 ?>

					<option value="<?php echo @$item_paginado ?>"><?php echo @$item_paginado ?> Registros</option>

					<?php if(@$item_paginado != $opcao1){ ?> 
						<option value="<?php echo $opcao1 ?>"><?php echo $opcao1 ?> Registros</option>
						<?php } ?>

						<?php if(@$item_paginado != $opcao2){ ?> 
						<option value="<?php echo $opcao2 ?>"><?php echo $opcao2 ?> Registros</option>
						<?php } ?>

						<?php if(@$item_paginado != $opcao3){ ?> 
						<option value="<?php echo $opcao3 ?>"><?php echo $opcao3 ?> Registros</option>
						<?php } ?>

					
					

				</select>
			
			
		</div>
		</form>
	</div>
	

	<div class="col-md-6 col-sm-12">

		<div class="float-right mr-4">
			<form class="form-inline my-2 my-lg-0">
				<input class="form-control form-control-sm mr-sm-2" type="search" placeholder="Buscar Nome" aria-label="Search" name="txtbuscar">
				<button class="btn btn-outline-secondary btn-sm my-2 my-sm-0" type="submit" name="<?php echo $pagina; ?>"><i class="fas fa-search"></i></button>
			</form>
		</div>
		
	</div>

	
</div>


<table class="table table-sm mt-3">
	<thead class="thead-light">
		<tr>
			<th scope="col">Nome</th>
			<th scope="col">Usuário</th>
			<th scope="col">Senha</th>
			<th scope="col">Nível</th>
			<th scope="col">Ações</th>
		</tr>
	</thead>
	<tbody>

		<?php

		//DEFINIR O NUMERO DE ITENS POR PÁGINA
		if(isset($_POST['itens-pagina'])){
			$itens_por_pagina = $_POST['itens-pagina'];
			@$_GET['pagina'] = 0;
		}elseif(isset($_GET['itens'])){
			$itens_por_pagina = $_GET['itens'];
		}
		else{
			$itens_por_pagina = $opcao1;

		}

		//PEGAR A PÁGINA ATUAL
		$pagina_pag = intval(@$_GET['pagina']);
		$limite = $pagina_pag * $itens_por_pagina;

		//CAMINHO DA PAGINAÇÃO
		$caminho_pag = 'index.php?acao='.$pagina.'&';
		

		if(isset($_GET[$item4]) and $_GET['txtbuscar'] != ''){
			$nome_buscar = '%'.$_GET['txtbuscar'].'%';
			$res = $pdo->prepare("SELECT * from usuarios where nome LIKE :nome order by nome asc");
			$res->bindValue(":nome", $nome_buscar);
			$res->execute();
		}else{
			$res = $pdo->query("SELECT * from usuarios order by id desc LIMIT $limite, $itens_por_pagina");
		}

		
		
		$dados = $res->fetchAll(PDO::FETCH_ASSOC);

		//TOTALIZAR OS REGISTROS PARA PAGINAÇÃO
		$res_todos = $pdo->query("SELECT * from usuarios");
		$dados_total = $res_todos->fetchAll(PDO::FETCH_ASSOC);
		$num_total = count($dados_total);

		//DEFINIR O TOTAL DE PAGINAS
		$num_paginas = ceil($num_total/$itens_por_pagina);



		for ($i=0; $i < count($dados); $i++) { 
			foreach ($dados[$i] as $key => $value) {
			}

			$id = $dados[$i]['id'];	
			$nome = $dados[$i]['nome'];
			$usuario = $dados[$i]['usuario'];
			$senha = $dados[$i]['senha'];
			$senha_original = $dados[$i]['senha_original'];
			$nivel = $dados[$i]['nivel'];



			$linhas = count($dados);

			?>

			<tr>

				<td><?php echo $nome ?></td>
				<td><?php echo $usuario ?></td>
				<td><?php echo $senha_original ?></td>
				<td><?php echo $nivel ?></td>
				<td>
					<a href="index.php?acao=<?php echo $pagina; ?>&funcao=editar&id=<?php echo $id ?>"><i class="fas fa-edit text-info"></i></a>
					<a href="index.php?acao=<?php echo $pagina; ?>&funcao=excluir&id=<?php echo $id ?>"><i class="far fa-trash-alt text-danger"></i></a>
				</td>
			</tr>

		<?php } ?>

	</tbody>

</table>


<?php 
//MOSTRAR A PÁGINAÇÃO SÓ SE NÃO HOUVER BUSCA
if(!isset($_GET[$pagina])){ ?>

<!--ÁREA DA PÁGINAÇÃO -->
<nav class="paginacao" aria-label="Page navigation example">
          <ul class="pagination">
            <li class="page-item">
              <a class="btn btn-outline-dark btn-sm mr-1" href="<?php echo $caminho_pag; ?>pagina=0&itens=<?php echo $itens_por_pagina ?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
              </a>
            </li>
            <?php 
            for($i=0;$i<$num_paginas;$i++){
            $estilo = "";
            if($pagina_pag == $i)
              $estilo = "active";
            ?>
             <li class="page-item"><a class="btn btn-outline-dark btn-sm mr-1 <?php echo $estilo; ?>" href="<?php echo $caminho_pag; ?>pagina=<?php echo $i; ?>&itens=<?php echo $itens_por_pagina ?>"><?php echo $i+1; ?></a></li>
          <?php } ?>
            
            <li class="page-item">
              <a class="btn btn-outline-dark btn-sm" href="<?php echo $caminho_pag; ?>pagina=<?php echo $num_paginas-1; ?>&itens=<?php echo $itens_por_pagina ?>" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
              </a>
            </li>
          </ul>
</nav>
<?php } ?>


<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">
					<?php if(@$_GET['funcao'] == 'editar'){

						$nome_botao = 'Editar';
						$id_usuario = $_GET['id'];

					//BUSCAR DADOS DO REGISTRO A SER EDITADO
						$res = $pdo->query("select * from usuarios where id = '$id_usuario'");
						$dados = $res->fetchAll(PDO::FETCH_ASSOC);
						$nome_usuario = $dados[0]['nome'];
						$email_usuario = $dados[0]['usuario'];
						$senha_usuario = $dados[0]['senha_original'];
						$email_usuario_rec = $dados[0]['usuario'];


						echo 'Edição de Usuários';
					}else{
						$nome_botao = 'Salvar';
						echo 'Cadastro de Usuários';
					} ?>
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">


				<form method="post">
					

					<div class="form-group">
						<label for="exampleFormControlInput1">Nome</label>
						<input type="text" class="form-control" id="" placeholder="Insira o Nome" name="nome" value="<?php echo @$nome_usuario ?>">
					</div>



					<div class="form-group">
						<label for="exampleFormControlInput1">Email</label>
						<input type="email" class="form-control" id="" name="usuario" placeholder="Insira o Email" value="<?php echo @$email_usuario ?>">
					</div>


					
					<div class="form-group">
						<label for="exampleFormControlInput1">Senha</label>
						<input type="text" class="form-control" id="" placeholder="Insira a Senha" name="senha" value="<?php echo @$senha_usuario ?>">
					</div>
					
					
					
					
					
					


				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

					<button type="submit" name="<?php echo $nome_botao ?>" class="btn btn-primary"><?php echo $nome_botao ?></button>
				</form>
			</div>
		</div>
	</div>
</div>


<!--CÓDIGO DO BOTÃO NOVO -->
<?php 
if(@$_GET['funcao'] == 'novo' && @$item_paginado == ''){ 
	
	?>
	<script>$('#btn-novo').click();</script>
<?php } ?>


<!--CÓDIGO DO BOTÃO SALVAR -->
<?php 
if(isset($_POST['Salvar'])){
	$nome = $_POST['nome'];
	$usuario = $_POST['usuario'];
	$senha = $_POST['senha'];
	$senha_cript = md5($senha);

	//VERIFICAR SE O USUÁRIO JÁ ESTÁ CADASTRADO
	$res_c = $pdo->query("select * from usuarios where usuario = '$usuario'");
	$dados_c = $res_c->fetchAll(PDO::FETCH_ASSOC);
	$linhas = count($dados_c);
	if($linhas == 0){
		$res = $pdo->prepare("INSERT into usuarios (nome, usuario, senha, senha_original, nivel) values (:nome, :usuario, :senha, :senha_original, :nivel) ");

		$res->bindValue(":nome", $nome);
		$res->bindValue(":usuario", $usuario);
		$res->bindValue(":senha", $senha_cript);
		$res->bindValue(":senha_original", $senha);
		$res->bindValue(":nivel", 'admin');

		$res->execute();

		
		echo "<script language='javascript'>window.location='index.php?acao=$pagina'; </script>";

	}else{
		echo "<script language='javascript'>window.alert('Este usuário já está cadastrado!!'); </script>";
	}

	

}

?>



<!--CÓDIGO DO BOTÃO EDITAR -->
<?php 
if(@$_GET['funcao'] == 'editar' && @$item_paginado == ''){
	
	?>


	<script>$('#btn-novo').click();</script>

	<?php 
	if(isset($_POST['Editar'])){
		$nome = $_POST['nome'];
		$usuario = $_POST['usuario'];
		$senha = $_POST['senha'];
		$senha_cript = md5($senha);

	//VERIFICAR SE O USUÁRIO JÁ ESTÁ CADASTRADO SOMENTE SE FOR TROCADO O USUÁRIO
		if($email_usuario_rec != $usuario){
			$res_c = $pdo->query("select * from usuarios where usuario = '$usuario'");
			$dados_c = $res_c->fetchAll(PDO::FETCH_ASSOC);
			$linhas = count($dados_c);
			if($linhas != 0){

				echo "<script language='javascript'>window.alert('Este usuário já está cadastrado!!'); </script>";
				exit();
			}
		}


		$res = $pdo->prepare("UPDATE usuarios set nome = :nome, usuario = :usuario, senha = :senha_cript, senha_original = :senha where id = :id ");

		$res->bindValue(":nome", $nome);
		$res->bindValue(":usuario", $usuario);
		$res->bindValue(":senha", $senha);
		$res->bindValue(":senha_cript", $senha_cript);
		$res->bindValue(":id", $id_usuario);
		

		$res->execute();

		
		echo "<script language='javascript'>window.location='index.php?acao=$pagina'; </script>";





	}

	?>

<?php } ?>





<!--CÓDIGO DO BOTÃO EXCLUIR -->
<?php 
if(@$_GET['funcao'] == 'excluir'){
	$id_usuario = $_GET['id'];
	$res = $pdo->query("DELETE from usuarios where id = '$id_usuario'");
	echo "<script language='javascript'>window.alert('Registro Excluído!!'); </script>";
	echo "<script language='javascript'>window.location='index.php?acao=$pagina'; </script>";
}
?>





<!--MASCARAS -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

<script src="../js/mascaras.js"></script>

