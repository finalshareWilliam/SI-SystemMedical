<?php 

require_once("../../conexao.php");

$medico = $_POST['medico'];
$data = $_POST['data'];
$hora = $_POST['hora'];


$id = $_POST['id'];





		//VERIFICAR SE O HORARIO, DATA E MEDICO ESTAO DISPONIVEIS
	$res_c = $pdo->query("select * from consultas where data = '$data' and hora = '$hora' and medico = '$medico'");
	$dados_c = $res_c->fetchAll(PDO::FETCH_ASSOC);
	$linhas = count($dados_c);

	if($linhas != 0){

		echo "Esse horário não está Disponível";
		exit();
	}







$res = $pdo->prepare("UPDATE consultas set data = :data, hora = :hora, medico = :medico  where id = :id ");

$res->bindValue(":data", $data);
$res->bindValue(":hora", $hora);
$res->bindValue(":medico", $medico);

$res->bindValue(":id", $id);

$res->execute();


echo "Editado com Sucesso!!";





?>