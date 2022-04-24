<?php 

require_once("../../conexao.php");
@session_start();

$paciente = $_POST['cb-paciente'];
$obs = $_POST['obs'];
$urgencia = $_POST['urgencia'];

if($paciente == ''){
	echo "Preencha o Paciente!!";
	exit();
}

if($obs == ''){
	echo "Preencha a Observação!";
	exit();
}


	$res = $pdo->prepare("INSERT into triagens (paciente, data, hora, obs, urgencia, finalizada) values (:paciente, curDate(), curTime(), :obs, :urgencia, 'Não')");

	$res->bindValue(":paciente", $paciente);
	$res->bindValue(":obs", $obs);
	$res->bindValue(":urgencia", $urgencia);
	
	$res->execute();


	echo "Cadastrado com Sucesso!!";



?>