<?php $pagina = 'triagens';
$agora = date('Y-m-d'); ?>

<div class="row botao-novo">
	<div class="col-md-12">
		
		<a id="btn-novo" data-toggle="modal" data-target="#modal"></a>
		<a href="index.php?acao=<?php echo $pagina ?>&funcao=novo"  type="button" class="btn btn-secondary">Novo Triagem</a>

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

				<input class="form-control form-control-sm mr-sm-2" type="date" name="txtbuscar" id="txtbuscar" value="<?php echo $agora ?>">

				<button class="btn btn-outline-secondary btn-sm my-2 my-sm-0" name="btn-buscar" id="btn-buscar"><i class="fas fa-search"></i></button>
			</form>
		</div>
		
	</div>

	
</div>


<div id="listar">
	
</div>









<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"><?php if(@$_GET['funcao'] == 'editar'){

					$nome_botao = 'Editar';
					$id_reg = $_GET['id'];

					//BUSCAR DADOS DO REGISTRO A SER EDITADO
					$res = $pdo->query("select * from triagens where id = '$id_reg'");
					$dados = $res->fetchAll(PDO::FETCH_ASSOC);
					$paciente = $dados[0]['paciente'];
					$obs = $dados[0]['obs'];
					$urgencia = $dados[0]['urgencia'];




					echo 'Edição de Triagem';
				}else{
					$nome_botao = 'Salvar';
					echo 'Cadastro de Triagem';
				} ?>
			</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">


			<form method="post">


				<input type="hidden" id="id"  name="id" value="<?php echo @$id_reg ?>" required>


				<div class="row">
					<div class="col-md-8">
						<div class="form-group">
							<label class="mr-1" for="exampleFormControlSelect1"><small>Paciente</small></label>
							<select data-width="100%" class="form-control form-control-sm mr-2 sel2" name="cb-paciente" id="cb-paciente">

								<option value="">Selecione o Paciente</option>

								<?php 


								//TRAZER TODOS OS REGISTROS DE MÉDICOS
								$res = $pdo->query("SELECT * from pacientes order by nome asc");
								$dados = $res->fetchAll(PDO::FETCH_ASSOC);

								for ($i=0; $i < count($dados); $i++) { 
									foreach ($dados[$i] as $key => $value) {
									}

									$cpf = $dados[$i]['cpf'];	
									$nome = $dados[$i]['nome'];
									$id = $dados[$i]['id'];

									$cpf_get = @$_GET['cpf'];

									if($paciente == $id){
										$selec = 'selected';
									}else{
										$selec = '';
									}


									echo '<option '.$selec.' value="'.$id.'">'.$nome.' - '.$cpf.'</option>';





								}
								?>
							</select>
						</div>
					</div>

					<div class="col-md-4">
						<div class="form-group">
							<label class="mr-1" for="exampleFormControlSelect1"><small>Urgência</small></label>
							<select data-width="100%" class="form-control form-control-sm mr-2 sel2u" name="urgencia" id="urgencia">

								<option <?php if(@$urgencia == 'Baixa'){ echo 'selected';} ?> value="Baixa">Baixa</option>
								<option <?php if(@$urgencia == 'Média'){ echo 'selected';} ?> value="Média">Média</option>
								<option <?php if(@$urgencia == 'Alta'){ echo 'selected';} ?> value="Alta">Alta</option>
								<option <?php if(@$urgencia == 'Altíssima'){ echo 'selected';} ?> value="Altíssima">Altíssima</option>
							</select>
						</div>
					</div>
				</div>



				<div class="form-group">
					<label for="exampleFormControlInput1">Observações</label>
					<textarea type="text" class="form-control" id="obs" placeholder="Descreva a Triagem" name="obs" required><?php echo @$obs ?></textarea>
				</div>




				<div id="mensagem" class="">

				</div>

			</div>
			<div class="modal-footer">
				<button id="btn-fechar" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

				<button name="<?php echo $nome_botao ?>" id="<?php echo $nome_botao ?>" class="btn btn-primary"><?php echo $nome_botao ?></button>

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



<script>$('#modal-deletar').modal("show");</script>






	<!--CHAMADA DA MODAL BAIXAR O PAGAMENTO-->
	<?php 
	if(@$_GET['funcao'] == 'baixar' && @$item_paginado == ''){ 
		$id = $_GET['id'];
		?>

		<div class="modal" id="modal-baixar" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Confirmar Pagamento</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">

						<p>Deseja realmente Baixar este Pagamento?</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn-cancelar-baixar">Cancelar</button>
						<form method="post">
							<input type="hidden" id="id"  name="id" value="<?php echo @$id ?>" required>

							<button type="button" id="btn-baixar" name="btn-baixar" class="btn btn-success">Baixar</button>
						</form>
					</div>
				</div>
			</div>
		</div>


	<?php } ?>



	<script>$('#modal-baixar').modal("show");</script>





<!--MASCARAS -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

<script src="../js/mascaras.js"></script>






<!--AJAX PARA INSERÇÃO DOS DADOS -->
<script type="text/javascript">
	$(document).ready(function(){
		var pag = "<?=$pagina?>";
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




<!--AJAX PARA BUSCAR OS DADOS -->
<script type="text/javascript">
	$(document).ready(function(){

		var pag = "<?=$pagina?>";
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

		var pag = "<?=$pagina?>";

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
		var pag = "<?=$pagina?>";
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
		var pag = "<?=$pagina?>";
		$('#btn-deletar').click(function(event){
			event.preventDefault();

			$.ajax({
				url: pag + "/excluir.php",
				method: "post",
				data: $('form').serialize(),
				dataType: "text",
				success: function(mensagem){


					$('#btn-buscar').click();
					$('#btn-cancelar-excluir').click();

				},

			})
		})
	})
</script>



<!--AJAX PARA BUSCAR OS DADOS PELA TXT -->
<script type="text/javascript">
	$('#txtbuscar').change(function(){
		$('#btn-buscar').click();
	})
</script>






	<!--AJAX PARA BAIXAR O PAGAMENTO -->
	<script type="text/javascript">
		$(document).ready(function(){
			var pag = "<?=$pagina?>";
			$('#btn-baixar').click(function(event){
				event.preventDefault();

				$.ajax({
					url: pag + "/baixar.php",
					method: "post",
					data: $('form').serialize(),
					dataType: "text",
					success: function(mensagem){

						
						$('#btn-buscar').click();
						$('#btn-cancelar-baixar').click();

					},

				})
			})
		})
	</script>





<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
	$(document).ready(function() {
		$('.sel2').select2({
			placeholder: "Selecione um Paciente",
		});

		$('.sel2u').select2({
			
		});

	});
</script>



