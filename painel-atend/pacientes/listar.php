<?php 

require_once("../../conexao.php");
$pagina = 'pacientes';

$txtbuscar = @$_POST['txtbuscar'];


echo '
<table class="table table-sm mt-3">
	<thead class="thead-light">
		<tr>
			<th scope="col">Nome</th>
			<th scope="col">CPF</th>
			<th scope="col">Telefone</th>
			<th scope="col">Idade</th>
			
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
		$res = $pdo->query("SELECT * from pacientes order by id desc LIMIT $limite, $itens_por_pagina");
	}else{
		$txtbuscar = '%'.@$_POST['txtbuscar'].'%';
		$res = $pdo->query("SELECT * from pacientes where nome LIKE '$txtbuscar' or cpf LIKE '$txtbuscar' order by id desc");

	}
	
	$dados = $res->fetchAll(PDO::FETCH_ASSOC);


	//TOTALIZAR OS REGISTROS PARA PAGINAÇÃO
		$res_todos = $pdo->query("SELECT * from pacientes");
		$dados_total = $res_todos->fetchAll(PDO::FETCH_ASSOC);
		$num_total = count($dados_total);

		//DEFINIR O TOTAL DE PAGINAS
		$num_paginas = ceil($num_total/$itens_por_pagina);


	for ($i=0; $i < count($dados); $i++) { 
			foreach ($dados[$i] as $key => $value) {
			}

			$id = $dados[$i]['id'];	
			$nome = $dados[$i]['nome'];
			$cpf = $dados[$i]['cpf'];
			$telefone = $dados[$i]['telefone'];
			$idade = $dados[$i]['idade'];


			$res_todos2 = $pdo->query("SELECT * from responsaveis where paciente = '$id'");
			$dados_total2 = $res_todos2->fetchAll(PDO::FETCH_ASSOC);
			if(count($dados_total2) > 0){
				$classe_resp = 'text-info';
			}else{
				$classe_resp = 'text-muted';
			}



			$res_todos2 = $pdo->query("SELECT * from triagens where paciente = '$id' order by id desc");
			$dados_total2 = $res_todos2->fetchAll(PDO::FETCH_ASSOC);
			if(count($dados_total2) > 0){
				$id_triagem = $dados_total2[0]['id'];
				$classe_rel = '';
			}	
			else{
				$classe_rel = 'd-none';
			}
			


echo '
		<tr>

			
			<td>'.$nome.'</td>
			<td>'.$cpf.'</td>
			<td>'.$telefone.'</td>
			<td>'.$idade.'</td>
			
			<td>
				<a title="Marcar Consulta" href="index.php?acao=marcacoes&funcao=pacientes&id='.$id.'&cpf='.$cpf.'"><i class="fas fa-check-circle text-warning"></i></a>
				<a href="index.php?acao='.$pagina.'&funcao=editar&id='.$id.'"><i class="fas fa-edit text-info"></i></a>
				<a href="index.php?acao='.$pagina.'&funcao=excluir&id='.$id.'"><i class="far fa-trash-alt text-danger"></i></a>
				<a target="_blank" title="Ficha de Paciente" href="../painel-atend/rel/rel_ficha_class.php?id='.$id.'"><i class="fas fa-book text-info"></i></a>

				<a target="_blank" title="Consultas Anteriores" href="../painel-atend/rel/rel_ficha_consulta_class.php?id='.$id.'"><i class="fas fa-calendar text-secondary"></i></a>

				<a target="_blank" href="http://api.whatsapp.com/send?1=pt_BR&phone=55'.$telefone.'" title="'.$telefone.'"><i class="fab fa-whatsapp text-success"></i></a>

				<a title="Cadastrar Responsável" href="index.php?acao='.$pagina.'&funcao=resp&id='.$id.'"><i class="fas fa-user '.$classe_resp.'"></i></a>


				<a class="'.$classe_rel.'" target="_blank" title="Última Triagem" href="../painel-atend/rel/rel_triagem_class.php?id='.@$id_triagem.'"><i class="fas fa-book text-secondary"></i></a>
				
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