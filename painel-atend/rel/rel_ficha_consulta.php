
<?php 


include('../../conexao.php');

$id = $_GET['id'];

?>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


<style>

	@page {
		margin: 0px;

	}

	body{
		font-family:Times, "Times New Roman", Georgia, serif;
		padding-top:10px;
	}

	.footer {
		position:absolute;
		bottom:0;
		width:100%;
		background-color: #ebebeb;
		padding:10px;
	}

	.cabecalho {    
		background-color: #ebebeb;
		padding-top:15px;
		margin-bottom:30px;
		margin-top:-10px;
	}

	.titulo{
		margin:0;
	}

	.areaTotais{
		border : 0.5px solid #bcbcbc;
		padding: 15px;
		border-radius: 5px;
		margin-right:25px;
	}

	.areaTotal{
		border : 0.5px solid #bcbcbc;
		padding: 15px;
		border-radius: 5px;
		margin-right:25px;
		background-color: #f9f9f9;
		margin-top:2px;
	}

	.pgto{
		margin:1px;
	}




	.area-tab{

		display:block;
		width:100%;
		height:30px;

	}



	.coluna{
		margin: 0px;
		float:left;
		height:30px;
	}


	

</style>


<div class="cabecalho">
	
	<div class="row">
		<div class="col-sm-4" style="margin-left:8px">	
			
		</div>
		<div class="col-sm-6" align="right">	
			<span class="titulo"><b><big><?php echo mb_strtoupper($nome_empresa) ?></big></b></span><br>
			<span class="titulo"><small><?php echo $endereco_empresa ?></small></span>
		</div>
	</div>

</div>

<div class="container">

	<?php

	$res = $pdo->query("SELECT * from pacientes where id = '$id' order by nome asc");
	$dados = $res->fetchAll(PDO::FETCH_ASSOC);

	for ($i=0; $i < count($dados); $i++) { 
		foreach ($dados[$i] as $key => $value) {
		}

		$id = $dados[$i]['id'];	
		$nome = $dados[$i]['nome'];
		$cpf = $dados[$i]['cpf'];
		$rg = $dados[$i]['rg'];
		$telefone = $dados[$i]['telefone'];
		$email = $dados[$i]['email'];
		$idade = $dados[$i]['idade'];
		$civil = $dados[$i]['civil'];
		$sexo = $dados[$i]['sexo'];
		$endereco = $dados[$i]['endereco'];
		$obs = $dados[$i]['obs'];
		
	}             



	?>


	<div class="row">
		<div class="col-sm-3">	
			<?php 
			if($sexo == 'Masculino'){
				echo '<img src="'.$url_sistema.'img/homem.jpg" width="150px">';
			}else{
				echo '<img src="'.$url_sistema.'img/mulher.jpg" width="150px">';
			}
			?>

		</div>


		<div class="col-sm-9">	
			<big><big><?php echo strtoupper($nome) ?></big></big><br>
			<span class="dados">Telefone: <?php echo $telefone ?> &nbsp; &nbsp; Email: <?php echo $email ?> </span><br>
			<span class="dados">R. Visc. de Paranaguá Nº 102, Centro - Rio Grande - RS - CEP 96200-190 </span><br>
			<span class="dados">CPF: <?php echo $cpf ?> &nbsp; &nbsp; RG: <?php echo $rg ?> </span><br>
			<span class="dados">Idade: <?php echo $idade ?> &nbsp; &nbsp; Sexo: <?php echo $sexo ?> &nbsp; &nbsp; Estado Cívil: <?php echo $civil ?> </span><br>
		</div>


	</div>






	<span style="font-size:11px;"> ÚLTIMAS CONSULTAS </span>

	<div style="border-bottom: solid 1px #0340a3">
	</div>

	<br>



		<small><small><small>


		<section class="area-tab" style="background-color: #f5f5f5;">

			<div style="padding-top: 8px;padding-left: 8px;">
				<div class="coluna" style="width:25%">DATA</div>
				<div class="coluna" style="width:25%">ATENDIMENTO</div>
				<div class="coluna" style="width:25%">MÉDICO</div>
				<div class="coluna" style="width:25%">STATUS</div>

			</div>

		</section>

		</small>
		
		<div class="mb-1" style="border-bottom: solid 1px #e3e3e3;">
		</div>


		<?php 

	$res = $pdo->query("SELECT * from consultas where paciente = '$id' order by data desc");
	$dados = $res->fetchAll(PDO::FETCH_ASSOC);
	if(count($dados) > 0){
	for ($i=0; $i < count($dados); $i++) { 
		foreach ($dados[$i] as $key => $value) {
		}

		$id_consulta = $dados[$i]['id'];
		$data_consulta = $dados[$i]['data'];	
		$atendimento = $dados[$i]['tipo_atendimento'];	
		$medico = $dados[$i]['medico'];	
		$status = $dados[$i]['status'];

		if($status == ""){
			$status = 'Pendente';
			$cor = 'text-danger';
		}else if($status == "Aguardando"){
			$cor = 'text-primary';
		}else if($status == "Finalizada"){
			$cor = 'text-success';
		}else if($status == "Consultando"){
			$cor = 'text-warning';
		}	

		$data_consulta = implode('/', array_reverse(explode('-', $data_consulta)));	

		$res2 = $pdo->query("SELECT * from atendimentos where id = '$atendimento'");
		$dados2 = $res2->fetchAll(PDO::FETCH_ASSOC);
		$nome_atend = $dados2[0]['descricao'];

		$res2 = $pdo->query("SELECT * from medicos where id = '$medico'");
		$dados2 = $res2->fetchAll(PDO::FETCH_ASSOC);
		$nome_medico = $dados2[0]['nome'];
		 ?>


		<hr style="margin:0; padding:0">

		<section class="area-tab">

			<div class="<?php echo $cor ?>" style="padding-top: 8px;padding-left: 8px;">
				<div class="coluna" style="width:25%"><?php echo $data_consulta ?></div>
				<div class="coluna" style="width:25%"><?php echo $nome_atend ?></div>
				<div class="coluna" style="width:25%"><?php echo $nome_medico ?></div>
				<div class="coluna" style="width:25%"><?php echo $status ?></div>

			</div>

		</section>
		

		<div class="mb-1" style="border-bottom: solid 1px #e3e3e3; width:100%">
		</div>

		<?php 
	}
	}else{
		echo '<p>Este Paciente ainda não tem nenhuma consulta!</p>';
	} 

	?>

		</small></small>

		




	</div>


	<div class="footer">
		<p style="font-size:12px" align="center"><?php echo $texto_rodape ?></p> 
	</div>


