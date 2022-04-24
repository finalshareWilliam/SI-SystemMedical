
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

			
		
		<hr>

			

						
		<br><br>

		


		<table class="table">
			<tr bgcolor="#f9f9f9">
				<td style="font-size:12px"> <b>Observações</b> </td>
				
				
				
			</tr>
			

				
		 

                <tr>
				<td style="font-size:12px"> <?php echo $obs; ?> </td>
			
				
				
				</tr>

			
		</table>

	


		<hr>
		

		<hr>

					
			

	
</div>


<div class="footer">
 <p style="font-size:12px" align="center"><?php echo $texto_rodape ?></p> 
</div>


