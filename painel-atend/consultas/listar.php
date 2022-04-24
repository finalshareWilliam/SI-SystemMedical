<?php 

require_once("../../conexao.php");
$pagina = 'consultas';

$txtbuscar = @$_POST['txtbuscar'];


if($txtbuscar == ''){
	$res = $pdo->query("SELECT * from consultas where data = curDate() order by hora asc LIMIT $limite, $itens_por_pagina");
}else{
	$txtbuscar = @$_POST['txtbuscar'];
	$res = $pdo->query("SELECT * from consultas where data = '$txtbuscar'  order by hora asc");

}

$dados = $res->fetchAll(PDO::FETCH_ASSOC);
if(@count($dados) > 0){

echo '
<table class="table table-sm mt-3 tabelas">
<thead class="thead-light">
<tr>
<th scope="col">Paciente</th>
<th scope="col">Hora</th>
<th scope="col">Atendimento</th>
<th scope="col">Médico</th>
<th scope="col">Valor</th>
<th scope="col">Já Pago</th>

<th scope="col">Ações</th>
</tr>
</thead>
<tbody>';

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


	echo '
	<tr>


	<td>'.$nome_paciente.'</td>
	<td>'.$hora.'</td>
	<td>'.$atendimento.'</td>
	<td>'.$nome_medico.'</td>
	<td>'.$valor.'</td>
	<td>'.$pgto_confirmado.'</td>

	<td>

	<a href="index.php?acao='.$pagina.'&funcao=editar&id='.$id.'"><i class="fas fa-edit text-info"></i></a>
	<a href="index.php?acao='.$pagina.'&funcao=excluir&id='.$id.'"><i class="far fa-trash-alt text-danger"></i></a>
	</td>
	</tr>';

}

echo  '
</tbody>
</table> ';

	
}else{
	echo 'Não existem consultas para essa data!';
}




?>