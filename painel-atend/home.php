<?php 


$res_pend = $pdo->query("select * from consultas where pgto_confirmado != 'Sim' ");
$dados_pend = $res_pend->fetchAll(PDO::FETCH_ASSOC);
$valor_pend = count($dados_pend);


$res_hoje = $pdo->query("select * from consultas where data = curDate() and pgto_confirmado = 'Sim'");
$dados_hoje = $res_hoje->fetchAll(PDO::FETCH_ASSOC);
$valor_hoje = count($dados_hoje);


$res_aguar = $pdo->query("select * from consultas where data = curDate() and status = 'Aguardando' ");
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


			







			<div class="mt-4">
				<span class="text-muted"></span>
				

				<?php 

				echo "<small><div class='row mt-2'>";

$query = $pdo->query("SELECT * from consultas where data = curDate() and status = 'Aguardando' order by hora asc limit 9 ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
for($i=0; $i < @count($res); $i++){
	foreach ($res[$i] as $key => $value){	}
		$paciente = $res[$i]['paciente'];
		$data = $res[$i]['data'];
		$hora = $res[$i]['hora'];
		$atendimento = $res[$i]['tipo_atendimento'];
		$medico = $res[$i]['medico'];
		$id_con = $res[$i]['id'];

		$query2 = $pdo->query("SELECT * FROM pacientes where id = '$paciente'");
		$res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
		$nome_pac = $res2[0]['nome'];
		
		$query2 = $pdo->query("SELECT * FROM atendimentos where id = '$atendimento'");
		$res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
		$nome_atend = $res2[0]['descricao'];

		$query2 = $pdo->query("SELECT * FROM medicos where id = '$medico'");
		$res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
		$nome_med = $res2[0]['nome'];



		echo "<div class='col-lg-4 col-md-6 col-sm-12 mb-2'>";
			echo "<div class='card shadow h-100'>";
				echo "<div class='card-body '>";
					echo "<div class='row no-gutters align-items-center py-2'>";
						echo "<div class='col mr-2'>";
							echo "<div class='text-xs font-weight-bold  text-primary text-uppercase'>".$nome_pac."</div>";
							echo "<div class='text-xs text-secondary'>".$nome_atend." </div>";
							echo "<div class='text-xs text-info'>Doutor(a) ".$nome_med." </div>";
						echo "</div>";
						echo "<div class='col-auto' align='center'>
							<i class='far fa-calendar-alt fa-2x  text-primary'></i><br><span class='text-xs text-dark'><small>".$hora."</small></span>";
						echo "</div>";
					echo "</div>";
				echo "</div>";
			echo "</div>";
		echo "</div>";

		}

	echo "</div></small>";


?>

			</div>

		</div>