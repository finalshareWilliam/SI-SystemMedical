<?php
 $pagina = 'consultorio'; 
$agora = date('Y-m-d');
@session_start();
 ?>


<!--CHAMADA DA MODAL EDITAR -->
<?php 

	
	//	TRAZER O CONSULTÓRIO ATENDIDO PELO MÉDICO
	$email_medico = $_SESSION['email_usuario'];
	$res_espec = $pdo->query("SELECT * from medicos where email = '$email_medico'");
							$dados_espec = $res_espec->fetchAll(PDO::FETCH_ASSOC);

							for ($i=0; $i < count($dados_espec); $i++) { 
								foreach ($dados_espec[$i] as $key => $value) {
								}

								$id = $dados_espec[$i]['id'];	
								$consultorio = $dados_espec[$i]['consultorio'];

							}

	?>

	<div class="modal" id="modal-editar" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Editar Consultório</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form method="post">
				<div class="modal-body">
					



						<div class="form-group">
						<label for="exampleFormControlSelect1">Consultório</label>
							<input class="form-control" type="text" name="consultorio" id="consultorio" value="<?php echo @$consultorio ?>">


						</div>

						<input type="hidden" name="id" id="id" value="<?php echo @$id ?>">

						<div id="mensagem" class="">

					</div>
						
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn-fechar">Cancelar</button>
					
						
						<button type="button" id="btn-editar" name="btn-editar" class="btn btn-success">Editar</button>
					
				</div>
				</form>
			</div>
		</div>
	</div>

	





<script>$('#modal-editar').modal("show");</script>


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
						
					
						




					}else{
						
						$('#mensagem').addClass('mensagem-erro')
					}
					
					$('#mensagem').text(mensagem)

				},
				
			})
		})
	})
</script>

