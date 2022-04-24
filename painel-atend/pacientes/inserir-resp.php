<?php 

require_once("../../conexao.php");

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$data_nascimento = $_POST['data'];
$id_pac = $_POST['id'];
$id_resp = $_POST['id-resp'];

if($nome == ''){
	echo "Preencha o Nome!!";
	exit();
}

if($cpf == ''){
	echo "Preencha o CPF!!";
	exit();
}

if($id_resp == ""){
	$res = $pdo->prepare("INSERT into responsaveis (paciente, nome, cpf, data_nasc) values (:paciente, :nome, :cpf, :data_nasc)");

}else{
	$res = $pdo->prepare("UPDATE responsaveis SET paciente = :paciente, nome = :nome, cpf = :cpf, data_nasc = :data_nasc where id = '$id_resp'");

}

$res->bindValue(":nome", $nome);
$res->bindValue(":cpf", $cpf);
$res->bindValue(":paciente", $id_pac);
$res->bindValue(":data_nasc", $data_nascimento);
$res->execute();

echo "Cadastrado com Sucesso!!";

?>