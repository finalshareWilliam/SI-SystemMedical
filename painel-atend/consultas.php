<?php
 $pagina = 'consultas'; 
$agora = date('Y-m-d');
 ?>

<div class="row botao-novo">
	<div class="col-md-12">
		
		
	</div>
</div>

<div class="row mt-4">
	<div class="col-md-6 col-sm-12">
		<div class="float-left">
			
		</div>

	</div>



	

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




<!--CHAMADA DA MODAL EDITAR -->
<?php 
if(@$_GET['funcao'] == 'editar'){ 
	$id_con = $_GET['id'];

	//BUSCAR O ID DO MÉDICO
	$res_med = $pdo->query("SELECT * from consultas where id = '$id_con'");
	$dados_med = $res_med->fetchAll(PDO::FETCH_ASSOC);
	$linhas = count($dados_med);

	if($linhas > 0){

		$id_medico = $dados_med[0]['medico'];	
		$data = $dados_med[0]['data'];	
		$hora = $dados_med[0]['hora'];	

	}


	//EXTRAINDO INFORMAÇÕES DO MÉDITO (NOME E ID)

	$res_espec = $pdo->query("SELECT * from medicos where id = '$id_medico'");
							$dados_espec = $res_espec->fetchAll(PDO::FETCH_ASSOC);

							for ($i=0; $i < count($dados_espec); $i++) { 
								foreach ($dados_espec[$i] as $key => $value) {
								}

								$id_med = $dados_espec[$i]['id'];	
								$nome_med = $dados_espec[$i]['nome'];

							}

	?>

	<div class="modal" id="modal-editar" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Editar Consulta</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form method="post">
				<div class="modal-body">
					



						<div class="form-group">
						<label for="exampleFormControlSelect1">Médico</label>
						<select class="form-control" id="medico" name="medico">



							<?php 
								//SE EXISTIR EDIÇÃO DOS DADOS, TRAZER COMO PRIMEIRO REGISTRO A ESPECIALIZAÇÃO DO MÉDICO
								

									


									echo '<option value="'.$id_med.'">'.$nome_med.'</option>';
								
								


								//TRAZER TODOS OS REGISTROS DE ESPECIALIZAÇÕES
								$res = $pdo->query("SELECT * from medicos order by nome asc");
								$dados = $res->fetchAll(PDO::FETCH_ASSOC);

								for ($i=0; $i < count($dados); $i++) { 
									foreach ($dados[$i] as $key => $value) {
									}

									$id = $dados[$i]['id'];	
									$nome = $dados[$i]['nome'];

									if($nome_med != $nome){
										echo '<option value="'.$id.'">'.$nome.'</option>';
									}

									
								}
								?>
							</select>
						</div>

						<div class="row">
							<div class="col-md-6">
								<input class="form-control form-control-sm mr-sm-2" type="date" name="data" id="data" value="<?php echo $data ?>">
							</div>

							<div class="col-md-6">
								<input class="form-control form-control-sm mr-sm-2" type="time" name="hora" id="hora" value="<?php echo $hora ?>">
							</div>
						</div>

						<div id="mensagem" class="">

					</div>
						
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn-fechar">Cancelar</button>
					
						<input type="hidden" id="id"  name="id" value="<?php echo @$id_con ?>" required>

						<button type="button" id="btn-editar" name="btn-editar" class="btn btn-success">Editar</button>
					
				</div>
				</form>
			</div>
		</div>
	</div>

	
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
<script>$('#modal-editar').modal("show");</script>


<!--MASCARAS -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

<script src="../js/mascaras.js"></script>






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
	$('#txtbuscar').change(function(){
		$('#btn-buscar').click();
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




<!--AJAX PARA EDIÇÃO DOS DADOS -->
<script type="text/javascript">
	$(document).ready(function(){
		var pag = "<?=$pagina?>";
		$('#btn-editar').click(function(event){
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
						$('#btn-fechar').click();
						$('#btn-buscar').click();
						




					}else{
						
						$('#mensagem').addClass('mensagem-erro')
					}
					
					$('#mensagem').text(mensagem)

				},
				
			})
		})
	})
</script>

