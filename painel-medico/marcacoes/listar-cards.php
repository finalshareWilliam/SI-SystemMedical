<?php 

require_once("../../conexao.php");
$pagina = 'marcacoes';

$txtbuscar = @$_POST['data'];
$cbmedicos = @$_POST['medico'];

if($txtbuscar == ''){
	$txtbuscar = date('Y-m-d');

}

if($cbmedicos == ''){
	$res = $pdo->query("SELECT * from medicos order by nome asc");
	$dados = $res->fetchAll(PDO::FETCH_ASSOC);
	$linhas = count($dados);
	if($linhas > 0){
	$cbmedicos = $dados[0]['id'];;
	}

}




echo "<div class='row mx-1'>";

$query = $pdo->query("SELECT * from consultas where data = '$txtbuscar' and medico = '$cbmedicos' order by hora asc");
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



		echo "<div class='col-lg-6 col-md-6 col-sm-12 mb-2'>";
			echo "<div class='card shadow h-100'>";
				echo "<div class='card-body '>";
				echo "<button onclick='deletarConsulta(".$id_con.")' type='button' class='close' data-dismiss='modal' aria-label='Close'>
				<span aria-hidden='true'><small>&times;</small></span>
			</button>";
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

	echo "</div>";


?>