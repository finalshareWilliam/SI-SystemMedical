<?php 

require_once("../../conexao.php");

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];

//VERIFICAR SE O Laboratorio JÁ ESTÁ CADASTRADO
$res_c = $pdo->query("select * from lab where cpf = '$cpf'");
$dados_c = $res_c->fetchAll(PDO::FETCH_ASSOC);
$linhas = count($dados_c);
if($linhas == 0){
	$res = $pdo->prepare("INSERT into lab (nome, cpf, telefone, email) values (:nome, :cpf, :telefone, :email) ");

	$res->bindValue(":nome", $nome);
	$res->bindValue(":cpf", $cpf);
	$res->bindValue(":telefone", $telefone);
	$res->bindValue(":email", $email);


	$res->execute();

	echo "Cadastrado com Sucesso!!";

}else{
	echo "Este Laboratorio já está cadastrado!!";
}

?>