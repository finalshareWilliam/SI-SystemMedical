<?php 

require_once("../../conexao.php");
@session_start();

$paciente = $_POST['cb-paciente'];
$obs = $_POST['obs'];
$urgencia = $_POST['urgencia'];
$id = $_POST['id'];

if($paciente == ''){
	echo "Preencha o Paciente!!";
	exit();
}

if($obs == ''){
	echo "Preencha a Observação!";
	exit();
}


	$res = $pdo->prepare("UPDATE triagens set paciente = :paciente, obs = :obs, urgencia = :urgencia where id = '$id'");

	$res->bindValue(":paciente", $paciente);
	$res->bindValue(":obs", $obs);
	$res->bindValue(":urgencia", $urgencia);
	
	$res->execute();


	echo "Editado com Sucesso!!";



?>