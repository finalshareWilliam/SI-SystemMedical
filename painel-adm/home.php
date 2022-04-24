 
<?php 


$res_1 = $pdo->query("SELECT * from medicos ");
$dados_1 = $res_1->fetchAll(PDO::FETCH_ASSOC);
$valor_1 = count($dados_1);


//TOTALIZAR AS MOVIMENTAÇÕES
$mes_atual = Date('m');
$ano_atual = Date('Y');
$data_inicial = $ano_atual.'-'.$mes_atual.'-01';


$res_3 = $pdo->query("SELECT * from consultas where status = 'Finalizada' and (data >= '$data_inicial' and data <= curDate() ) ");
$dados_3 = $res_3->fetchAll(PDO::FETCH_ASSOC);
$valor_3 = count($dados_3);


$res_4 = $pdo->query("SELECT * from funcionarios ");
$dados_4 = $res_4->fetchAll(PDO::FETCH_ASSOC);
$valor_4 = count($dados_4);


$res_6 = $pdo->query("SELECT * from consultas where pgto_confirmado != 'Sim' ");
$dados_6 = $res_6->fetchAll(PDO::FETCH_ASSOC);
$valor_6 = count($dados_6);

 ?>


<div class="area_cards">
	<div class="row">

		<div class="col-lg-4 col-md-6 col-sm-6 mb-4 card-adm">
			<div class="card card-stats">
				<div class="card-body ">
					<div class="row">
						<div class="col-5 col-md-4">
							<div class="icone-card text-center text-info">
								<i class="fas fa-user-md"></i>
							</div>
						</div>
						<div class="col-7 col-md-8">
							<div class="numbers">
								<p class="titulo-card">Total de Médicos</p>
								<p class="subtitulo-card"><?php echo $valor_1 ?><p>
								</div>
							</div>
						</div>
					</div>
					<div class="card-footer rodape-card">
						Total de Médicos Cadastrados

					</div>
				</div>
			</div>


			<div class="col-lg-4 col-md-6 col-sm-6 mb-4 card-adm">
			<div class="card card-stats">
				<div class="card-body ">
					<div class="row">
						<div class="col-5 col-md-4">
							<div class="icone-card text-center icon-warning">
								<i class="fas fa-user-nurse"></i>
							</div>
						</div>
						<div class="col-7 col-md-8">
							<div class="numbers">
								<p class="titulo-card">Total de Funcionários</p>
								<p class="subtitulo-card"><?php echo $valor_4 ?><p>
								</div>
							</div>
						</div>
					</div>
					<div class="card-footer rodape-card">
						Total de Funcionários Cadastrados

					</div>
				</div>
			</div>

			<div class="col-lg-4 col-md-6 col-sm-6 mb-4 card-adm">
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
								<p class="titulo-card">Consultas Agendadas</p>
								<p class="subtitulo-card"><?php echo $valor_6 ?><p>
								</div>
							</div>
						</div>
					</div>
					<div class="card-footer rodape-card">
						Total de Consultas Agendadas

					</div>
				</div>
			</div>




		</div>
	</div>