<?php 
if(@$pag == 'externa'){
	$pagina_ajax = '../painel-atend/pacientes';
}else{
	$pagina_ajax = 'pacientes';
}

$pagina = 'pacientes';
?>


<div class="row botao-novo">
	<div class="col-md-12">
		
		<a id="btn-novo" data-toggle="modal" data-target="#modal"></a>
		<a href="index.php?acao=<?php echo $pagina ?>&funcao=novo"  type="button" class="btn btn-secondary">Novo Paciente</a>

	</div>
</div>

<div class="row mt-4">
	<div class="col-md-6 col-sm-12">
		<div class="float-left">
			<form method="post">
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
			</form>
		</div>

	</div>


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

	?>
	

	<div class="col-md-6 col-sm-12">

		<div class="float-right mr-4">
			<form id="frm" class="form-inline my-2 my-lg-0" method="post">

				<input type="hidden" id="pag"  name="pag" value="<?php echo @$_GET['pagina'] ?>">

				<input type="hidden" id="itens"  name="itens" value="<?php echo @$itens_por_pagina; ?>">

				<input class="form-control form-control-sm mr-sm-2" type="search" placeholder="Nome ou CPF" aria-label="Search" name="txtbuscar" id="txtbuscar">
				<button class="btn btn-outline-secondary btn-sm my-2 my-sm-0" name="btn-buscar" id="btn-buscar"><i class="fas fa-search"></i></button>
			</form>
		</div>
		
	</div>

	
</div>


<div id="listar">
	
</div>









<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"><?php if(@$_GET['funcao'] == 'editar'){

					$nome_botao = 'Editar';
					$id_reg = $_GET['id'];

					//BUSCAR DADOS DO REGISTRO A SER EDITADO
					$res = $pdo->query("select * from pacientes where id = '$id_reg'");
					$dados = $res->fetchAll(PDO::FETCH_ASSOC);
					$nome = $dados[0]['nome'];
					$cpf = $dados[0]['cpf'];
					$rg = $dados[0]['rg'];
					$telefone = $dados[0]['telefone'];
					$email = $dados[0]['email'];
					$data = $dados[0]['data_nasc'];
					$idade = $dados[0]['idade'];
					$civil = $dados[0]['civil'];
					$sexo = $dados[0]['sexo'];
					$endereco = $dados[0]['endereco'];
					$obs = $dados[0]['obs'];


					echo 'Edição de Paciente';
				}else{
					$nome_botao = 'Salvar';
					echo 'Cadastro de Paciente';
				} ?>
			</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">


			<form method="post">

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">

							<input type="hidden" id="id"  name="id" value="<?php echo @$id_reg ?>" required>

							<input type="hidden" id="campo_antigo"  name="campo_antigo" value="<?php echo @$cpf ?>" required>


							<label for="exampleFormControlInput1">Nome</label>
							<input type="text" class="form-control" id="nome" placeholder="Insira o Nome " name="nome" value="<?php echo @$nome ?>" required>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label for="exampleFormControlInput1">CPF</label>
							<input type="text" class="form-control" id="cpf" placeholder="Insira o CPF " name="cpf" value="<?php echo @$cpf ?>" required>
						</div>
					</div>

				</div>



				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="exampleFormControlInput1">RG</label>
							<input type="text" class="form-control" id="rg" placeholder="Insira o RG " name="rg" value="<?php echo @$rg ?>" required>
						</div>

					</div>

					<div class="col-md-4">
						<div class="form-group">
							<label for="exampleFormControlInput1">Telefone</label>
							<input type="text" class="form-control" id="telefone" placeholder="Insira o Telefone " name="telefone" value="<?php echo @$telefone ?>" required>
						</div>
					</div>

					<div class="col-md-4">
						<div class="form-group">
							<label for="exampleFormControlInput1">Email</label>
							<input type="email" class="form-control" id="telefone" placeholder="Insira o Email " name="email" value="<?php echo @$email ?>" required>
						</div>
					</div>

				</div>




				
				
				<div class="row">
					<div class="col-md-4">
						<label for="exampleFormControlSelect1">Estado Civil</label>
						<select class="form-control" id="" name="civil">

							<?php 
							if(@$_GET['funcao'] == 'editar'){
								echo '<option value="'.$civil.'">'.$civil.'</option>';
							}
							?>

							<?php if($civil != 'Solteiro') echo '<option value="Solteiro">Solteiro</option>'; ?>

							<?php if($civil != 'Casado') echo '<option value="Casado">Casado</option>'; ?>

							<?php if($civil != 'Viúvo') echo '<option value="Viúvo">Viúvo</option>'; ?>



						</select>
					</div>

					<div class="col-md-4">
						<label for="exampleFormControlSelect1">Sexo</label>
						<select class="form-control" id="" name="sexo">

							<?php 
							if(@$_GET['funcao'] == 'editar'){
								echo '<option value="'.$sexo.'">'.$sexo.'</option>';
							}
							?>

							<?php if($sexo != 'Feminino') echo '<option value="Feminino">Feminino</option>'; ?>

							<?php if($sexo != 'Masculino') echo '<option value="Masculino">Masculino</option>'; ?>





						</select>

					</div>

					<div class="col-md-4">
							<div class="form-group">
							<label for="exampleFormControlInput1">Data Nascimento</label>
							<input type="date" class="form-control" id="data" name="data" value="<?php echo @$data ?>" required>
						</div>
						</div>



				</div>

				



				<div class="form-group">
							<label for="exampleFormControlInput1">Endereço</label>
							<input type="text" class="form-control" id="endereco" placeholder="Insira o Endereço " name="endereco" value="<?php echo @$endereco ?>" required>
						</div>


							<div class="form-group">
							<label for="exampleFormControlInput1">Observações</label>
							<textarea  class="form-control" id="obs" name="obs" maxlength="350"><?php echo 	@$obs; ?></textarea>
						</div>








				<div id="mensagem" class="">

				</div>

			</div>
			<div class="modal-footer">
				<button id="btn-fechar" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

				<button type="submit" name="<?php echo $nome_botao ?>" id="<?php echo $nome_botao ?>" class="btn btn-primary"><?php echo $nome_botao ?></button>

			</div>
		</form>
	</div>
</div>
</div>





<!--CHAMADA DA MODAL NOVO -->
<?php 
if(@$_GET['funcao'] == 'novo' && @$item_paginado == ''){ 
	
	?>
	<script>$('#btn-novo').click();</script>
<?php } ?>


<!--CHAMADA DA MODAL EDITAR -->
<?php 
if(@$_GET['funcao'] == 'editar' && @$item_paginado == ''){ 
	
	?>
	<script>$('#btn-novo').click();</script>
<?php } ?>





<!--CHAMADA DA MODAL DELETAR -->
<?php 
if(@$_GET['funcao'] == 'excluir' && @$item_paginado == ''){ 
	$id = $_GET['id'];
	?>

	<div class="modal" id="modal-deletar" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Excluir Registro</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

					<p>Deseja realmente Excluir este Registro?</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn-cancelar-excluir">Cancelar</button>
					<form method="post">
						<input type="hidden" id="id"  name="id" value="<?php echo @$id ?>" required>

						<button type="button" id="btn-deletar" name="btn-deletar" class="btn btn-danger">Excluir</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	
<?php } ?>






<!--CHAMADA DA MODAL RESP -->
<?php 
if(@$_GET['funcao'] == 'resp' && @$item_paginado == ''){ 
	
	?>

<!-- Modal -->
<div class="modal fade" id="modalResp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"><?php 

				$id_reg = $_GET['id'];

				$res = $pdo->query("select * from pacientes where id = '$id_reg'");
					$dados = $res->fetchAll(PDO::FETCH_ASSOC);
					$nome_pac = $dados[0]['nome'];
			
					//BUSCAR DADOS DO REGISTRO A SER EDITADO
					$res = $pdo->query("select * from responsaveis where paciente = '$id_reg'");
					$dados = $res->fetchAll(PDO::FETCH_ASSOC);
					if(count($dados) > 0){
						$nome_resp = $dados[0]['nome'];
					$cpf_resp = $dados[0]['cpf'];
					$data_nasc_resp = $dados[0]['data_nasc'];
					$id_resp = $dados[0]['id'];
					}
					


					?>
					Responsável do Paciente : <?php echo $nome_pac ?>
			</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">


			<form method="post">

				<div class="row">
					<div class="col-md-4">
						<div class="form-group">

							<input type="hidden" id="id"  name="id" value="<?php echo @$id_reg ?>" required>

							<input type="hidden" id="id-resp"  name="id-resp" value="<?php echo @$id_resp ?>" required>

							<input type="hidden" id="campo_antigo"  name="campo_antigo" value="<?php echo @$cpf ?>" required>


							<label for="exampleFormControlInput1">Nome</label>
							<input type="text" class="form-control" id="nome_resp" placeholder="Insira o Nome " name="nome" value="<?php echo @$nome_resp ?>" required>
						</div>
					</div>

					<div class="col-md-4">
						<div class="form-group">
							<label for="exampleFormControlInput1">CPF</label>
							<input type="text" class="form-control" id="cpf_resp" placeholder="Insira o CPF " name="cpf" value="<?php echo @$cpf_resp ?>" required>
						</div>
					</div>


					<div class="col-md-4">
							<div class="form-group">
							<label for="exampleFormControlInput1">Data Nascimento</label>
							<input type="date" class="form-control" id="data" name="data" value="<?php echo @$data_nasc_resp ?>" required>
						</div>
						</div>


				</div>


				


				<div id="mensagem_resp" class="">

				</div>

			</div>
			<div class="modal-footer">
				<button id="btn-fechar_resp" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

				<button type="submit" name="btn-resp" id="btn-resp" class="btn btn-primary">Salvar</button>

			</div>
		</form>
	</div>
</div>
</div>



<?php } ?>

<script>$('#modalResp').modal("show");</script>


<script>$('#modal-deletar').modal("show");</script>


<!--MASCARAS -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

<script src="../js/mascaras.js"></script>





<!--AJAX PARA INSERÇÃO DOS DADOS -->
<script type="text/javascript">
	$(document).ready(function(){
		var pag = "<?=$pagina_ajax?>";
		$('#Salvar').click(function(event){
			event.preventDefault();
			
			$.ajax({
				url: pag + "/inserir.php",
				method: "post",
				data: $('form').serialize(),
				dataType: "text",
				success: function(mensagem){

					$('#mensagem').removeClass()

					if(mensagem == 'Cadastrado com Sucesso!!'){
						
						$('#mensagem').addClass('mensagem-sucesso')

						$('#nome').val('')
						$('#cpf').val('')
						$('#telefone').val('')
						$('#crm').val('')
						$('#email').val('')

						$('#txtbuscar').val('')
						$('#btn-buscar').click();

						//$('#btn-fechar').click();




					}else{
						
						$('#mensagem').addClass('mensagem-erro')
					}
					
					$('#mensagem').text(mensagem)

				},
				
			})
		})
	})
</script>



<!--AJAX PARA BUSCAR OS DADOS -->
<script type="text/javascript">
	$(document).ready(function(){

		var pag = "<?=$pagina_ajax?>";
		$('#btn-buscar').click(function(event){
			event.preventDefault();	
			
			$.ajax({
				url: pag + "/listar.php",
				method: "post",
				data: $('form').serialize(),
				dataType: "html",
				success: function(result){
					$('#listar').html(result)
					
				},
				

			})

		})

		
	})
</script>








<!--AJAX PARA LISTAR OS DADOS -->
<script type="text/javascript">
	$(document).ready(function(){
		
		var pag = "<?=$pagina_ajax?>";

		$.ajax({
			url: pag + "/listar.php",
			method: "post",
			data: $('#frm').serialize(),
			dataType: "html",
			success: function(result){
				$('#listar').html(result)

			},

			
		})
	})
</script>



<!--AJAX PARA BUSCAR OS DADOS PELA TXT -->
<script type="text/javascript">
	$('#txtbuscar').keyup(function(){
		$('#btn-buscar').click();
	})
</script>




<!--AJAX PARA EDIÇÃO DOS DADOS -->
<script type="text/javascript">
	$(document).ready(function(){
		var pag = "<?=$pagina_ajax?>";
		$('#Editar').click(function(event){
			event.preventDefault();
			
			$.ajax({
				url: pag + "/editar.php",
				method: "post",
				data: $('form').serialize(),
				dataType: "text",
				success: function(mensagem){

					$('#mensagem').removeClass()

					if(mensagem == 'Editado com Sucesso!!'){
						
						$('#mensagem').addClass('mensagem-sucesso')

						
						$('#txtbuscar').val('')
						$('#btn-buscar').click();

						$('#btn-fechar').click();




					}else{
						
						$('#mensagem').addClass('mensagem-erro')
					}
					
					$('#mensagem').text(mensagem)

				},
				
			})
		})
	})
</script>



<!--AJAX PARA EXCLUSÃO DOS DADOS -->
<script type="text/javascript">
	$(document).ready(function(){
		var pag = "<?=$pagina_ajax?>";
		$('#btn-deletar').click(function(event){
			event.preventDefault();
			
			$.ajax({
				url: pag + "/excluir.php",
				method: "post",
				data: $('form').serialize(),
				dataType: "text",
				success: function(mensagem){

					$('#txtbuscar').val('')
					$('#btn-buscar').click();
					$('#btn-cancelar-excluir').click();

				},
				
			})
		})
	})
</script>






<!--AJAX PARA INSERÇÃO DOS DADOS -->
<script type="text/javascript">
	$(document).ready(function(){
		var pag = "<?=$pagina_ajax?>";
		$('#btn-resp').click(function(event){
			event.preventDefault();
			
			$.ajax({
				url: pag + "/inserir-resp.php",
				method: "post",
				data: $('form').serialize(),
				dataType: "text",
				success: function(mensagem){

					$('#mensagem').removeClass()

					if(mensagem == 'Cadastrado com Sucesso!!'){
						
						$('#mensagem_resp').addClass('mensagem-sucesso')

						$('#nome').val('')
						$('#cpf').val('')
						
						$('#txtbuscar').val('')
						$('#btn-buscar').click();

						$('#btn-fechar_resp').click();




					}else{
						
						$('#mensagem_resp').addClass('mensagem-erro')
					}
					
					$('#mensagem_resp').text(mensagem)

				},
				
			})
		})
	})
</script>
