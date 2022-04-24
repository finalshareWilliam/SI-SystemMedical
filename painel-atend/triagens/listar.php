<?php 

require_once("../../conexao.php");
$pagina = 'triagens';

$txtbuscar = @$_POST['txtbuscar'];


echo '
<table class="table table-sm mt-3 tabelas">
<thead class="thead-light">
<tr>
<th scope="col">Paciente</th>
<th scope="col">Data</th>
<th scope="col">Hora</th>
<th scope="col">Obs</th>
<th scope="col">Urgência</th>

<th scope="col">Ações</th>
</tr>
</thead>
<tbody>';


$itens_por_pagina = $_POST['itens'];

	//PEGAR A PÁGINA ATUAL
$pagina_pag = intval(@$_POST['pag']);

$limite = $pagina_pag * $itens_por_pagina;

		//CAMINHO DA PAGINAÇÃO
$caminho_pag = 'index.php?acao='.$pagina.'&';

if($txtbuscar == ''){
	$res = $pdo->query("SELECT * from triagens where finalizada != 'Sim' order by id asc LIMIT $limite, $itens_por_pagina");
}else{
	$txtbuscar = @$_POST['txtbuscar'];
	$res = $pdo->query("SELECT * from triagens where data = '$txtbuscar' and finalizada != 'Sim' order by id asc");

}

$dados = $res->fetchAll(PDO::FETCH_ASSOC);


	//TOTALIZAR OS REGISTROS PARA PAGINAÇÃO
$res_todos = $pdo->query("SELECT * from triagens where finalizada != 'Sim'");
$dados_total = $res_todos->fetchAll(PDO::FETCH_ASSOC);
$num_total = count($dados_total);

		//DEFINIR O TOTAL DE PAGINAS
$num_paginas = ceil($num_total/$itens_por_pagina);


for ($i=0; $i < count($dados); $i++) { 
	foreach ($dados[$i] as $key => $value) {
	}

	$id = $dados[$i]['id'];	
	$paciente = $dados[$i]['paciente'];
	$data = $dados[$i]['data'];
	$hora = $dados[$i]['hora'];
	$obs = $dados[$i]['obs'];
	$urgencia = $dados[$i]['urgencia'];

	$data = implode('/', array_reverse(explode('-', $data)));
	

	//BUSCAR O NOME DO PAC
	$res_excluir = $pdo->query("select * from pacientes where id = '$paciente'");
	$dados_excluir = $res_excluir->fetchAll(PDO::FETCH_ASSOC);
	$nome_pac = $dados_excluir[0]['nome'];

	if($urgencia == 'Baixa'){
		$cor = 'text-success';
	}else if($urgencia == 'Média'){
		$cor = 'text-primary';
	}else if($urgencia == 'Alta'){
		$cor = 'text-warning';
	}else if($urgencia == 'Altíssima'){
		$cor = 'text-danger';
	}



	echo '
	<tr>


	<td><i class="fas fa-square '.$cor.' mr-1"></i>'.$nome_pac.'</td>
	<td>'.$data.'</td>
	<td>'.$hora.'</td>
	<td>'.$obs.'</td>
	<td>'.$urgencia.'</td>
	
	<td>
				<a href="index.php?acao='.$pagina.'&funcao=editar&id='.$id.'"><i class="fas fa-edit text-info"></i></a>
				<a href="index.php?acao='.$pagina.'&funcao=excluir&id='.$id.'"><i class="far fa-trash-alt text-danger"></i></a>

				<a title="Dar Baixa no Triagem" href="index.php?acao='.$pagina.'&funcao=baixar&id='.$id.'"><i class="fas fa-check-square text-success"></i></a>


				<a target="_blank" title="Relatório Triagem" href="rel/rel_triagem_class.php?id='.$id.'"><i class="fas fa-book text-info"></i></a>
			</td>

	</tr>';


	

}

echo  '
</tbody>
</table> ';


if($txtbuscar == ''){


	echo '
	<!--ÁREA DA PÁGINAÇÃO -->
	<nav class="paginacao" aria-label="Page navigation example">
	<ul class="pagination">
	<li class="page-item">
	<a class="btn btn-outline-dark btn-sm mr-1" href="'.$caminho_pag.'pagina=0&itens='.$itens_por_pagina.'" aria-label="Previous">
	<span aria-hidden="true">&laquo;</span>
	<span class="sr-only">Previous</span>
	</a>
	</li>';

	for($i=0;$i<$num_paginas;$i++){
		$estilo = "";
		if($pagina_pag == $i)
			$estilo = "active";

		echo '
		<li class="page-item"><a class="btn btn-outline-dark btn-sm mr-1 '.$estilo.'" href="'.$caminho_pag.'pagina='.$i.'&itens='.$itens_por_pagina.'">'.($i+1).'</a></li>';
	} 

	echo '<li class="page-item">
	<a class="btn btn-outline-dark btn-sm" href="'.$caminho_pag.'pagina='.($num_paginas-1).'&itens='.$itens_por_pagina.'" aria-label="Next">
	<span aria-hidden="true">&raquo;</span>
	<span class="sr-only">Next</span>
	</a>
	</li>
	</ul>
	</nav>




	';

}


?>