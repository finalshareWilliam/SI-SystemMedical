<?php 


$email_medico = $_SESSION['email_usuario'];


	$res_espec = $pdo->query("SELECT * from medicos where email = '$email_medico'");
							$dados_espec = $res_espec->fetchAll(PDO::FETCH_ASSOC);

							for ($i=0; $i < count($dados_espec); $i++) { 
								foreach ($dados_espec[$i] as $key => $value) {
								}

								$id_medico = $dados_espec[$i]['id'];	
								

}


$res_pend = $pdo->query("SELECT * from consultas where data = curDate() and pgto_confirmado != 'Sim' and medico = '$id_medico'");
$dados_pend = $res_pend->fetchAll(PDO::FETCH_ASSOC);
$valor_pend = count($dados_pend);


$res_hoje = $pdo->query("SELECT * from consultas where data = curDate() and pgto_confirmado = 'Sim' and medico = '$id_medico'");
$dados_hoje = $res_hoje->fetchAll(PDO::FETCH_ASSOC);
$valor_hoje = count($dados_hoje);


$res_aguar = $pdo->query("SELECT * from consultas where data = curDate() and status = 'Aguardando' and medico = '$id_medico'");
$dados_aguar = $res_aguar->fetchAll(PDO::FETCH_ASSOC);
$valor_aguar = count($dados_aguar);

?>


<div class="area_cards">
	<div class="row">

		<div class="col-sm-12 col-lg-4 col-md-6 col-sm-6 mb-4">
			<div class="card card-stats">
				<div class="card-body ">
					<div class="row">
						<div class="col-5 col-md-4">
							<div class="icone-card text-center text-warning">
								<i class="fas fa-stethoscope"></i>
							</div>
						</div>
						<div class="col-7 col-md-8">
							<div class="numbers">
								<p class="titulo-card">Consultas Pendentes</p>
								<p class="subtitulo-card"><?php echo $valor_pend ?><p>
								</div>
							</div>
						</div>
					</div>
					<div class="card-footer rodape-card">
					</div>
				</div>
			</div>



						</tr>
					</thead>
					<tbody>



						<?php 


						


						$res = $pdo->query("SELECT * from consultas where data = curDate() and pgto_confirmado = 'sim' and status = 'Aguardando' and medico = '$id_medico' order by hora asc limit 6");



						$dados = $res->fetchAll(PDO::FETCH_ASSOC);

						for ($i=0; $i < count($dados); $i++) { 
							foreach ($dados[$i] as $key => $value) {
							}

							$id = $dados[$i]['id'];	
							$paciente = $dados[$i]['paciente'];
							$hora = $dados[$i]['hora'];
							$tipo_atendimento = $dados[$i]['tipo_atendimento'];
							$medico = $dados[$i]['medico'];
							$valor = $dados[$i]['valor'];
							$pgto_confirmado = $dados[$i]['pgto_confirmado'];


							//BUSCAR O NOME DO PACIENTE
							$res_valor = $pdo->query("SELECT * from pacientes where id = '$paciente'");
							$dados_valor = $res_valor->fetchAll(PDO::FETCH_ASSOC);
							$linhas = count($dados_valor);

							if($linhas > 0){

								$nome_paciente = $dados_valor[0]['nome'];	

							}


	//BUSCAR O NOME DO MÉDICO
							$res_med = $pdo->query("SELECT * from medicos where id = '$medico'");
							$dados_med = $res_med->fetchAll(PDO::FETCH_ASSOC);
							$linhas = count($dados_med);

							if($linhas > 0){

								$nome_medico = $dados_med[0]['nome'];	

							}


	//BUSCAR O TIPO DE ATENDIMENTO
							$res_med = $pdo->query("SELECT * from atendimentos where id = '$tipo_atendimento'");
							$dados_med = $res_med->fetchAll(PDO::FETCH_ASSOC);
							$linhas = count($dados_med);

							if($linhas > 0){

								$atendimento = $dados_med[0]['descricao'];	

							}



							?>
							<tr>


								<td><?php echo $nome_paciente ?></td>
								<td><?php echo $hora ?></td>
								<td><?php echo $atendimento ?></td>
								<td><?php echo $nome_medico ?></td>



							</tr>
						<?php } ?>


					</tbody>
				</table>

			</div>

		</div>