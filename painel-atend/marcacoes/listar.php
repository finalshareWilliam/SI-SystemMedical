<?php 

require_once("../../conexao.php");
$pagina = 'marcacoes';

$txtbuscar = @$_POST['txtbuscar'];
$cbmedicos = @$_POST['cbmedicos'];

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


$classebtn = 'btn-success';

echo '
<div class="quadro">';

$res_h = $pdo->query("SELECT * from horarios order by horario asc");
$dados_h = $res_h->fetchAll(PDO::FETCH_ASSOC);
$linhas_h = count($dados_h);
for($i=0; $i < $linhas_h; $i++){
foreach ($dados_h[$i] as $key => $value){	}
$hora = $dados_h[$i]['horario'];

//CONSULTAR NO BANCO DE DADOS SE O HORÁRIO ESTÁ DISPONÍVEL
	$res_valor = $pdo->query("SELECT * from consultas where data = '$txtbuscar' and medico = '$cbmedicos' and hora = '$hora'");
	$dados_valor = $res_valor->fetchAll(PDO::FETCH_ASSOC);
	$linhas = count($dados_valor);

	if($linhas > 0){

		$classebtn = 'btn-danger';
		$disabled = 'disabled';

	}else{
		$classebtn = 'btn-success';
		$disabled = '';
	}


	$horaF = explode(':', $hora);

	echo '<button class="btn '.$classebtn.' mr-2 mb-2" id="btn-hora" '.$disabled.' onclick="hora('.$horaF[0].', '.$horaF[1].', '.$horaF[2].')">'.$horaF[0].':'.$horaF[1].'</button>';

}

echo '
</div>
';




?>



<script >
	function hora(h, m, s) {
		
		var hora = h+':'+m+':'+s;

		document.getElementById('hora').value = hora;

		var id_pac = document.getElementById("txtidpac").value;
		var id = document.getElementById("id").value;
		var data = document.getElementById("txtbuscar").value;
		var medico = document.getElementById("cbmedicos").value;


			document.getElementById('data').value = data;
			document.getElementById('medico').value = medico;

			if(id_pac == ''){
				document.getElementById('txtid').value = id;
			}else{
				document.getElementById('txtid').value = id_pac;
			}
			



			if (id == '' && id_pac == ''){
				alert('Escolha o Paciente');
			}else{
				$("#modal").modal("show");
				document.getElementById("mensagem").style.display = "none";
			}
		
	}
</script>




