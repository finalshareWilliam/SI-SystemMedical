<?php 

require_once("../../conexao.php");

$descricao = $_POST['descricao'];
$valor = $_POST['valor'];
$valor = str_replace(',', '.', $valor);

$id = $_POST['id'];
$campo_antigo = $_POST['campo_antigo'];


if($campo_antigo != $descricao){

		//VERIFICAR SE O MÉDICO JÁ ESTÁ CADASTRADO
	$res_c = $pdo->query("select * from atendimentos where descricao = '$descricao'");
	$dados_c = $res_c->fetchAll(PDO::FETCH_ASSOC);
	$linhas = count($dados_c);

	if($linhas != 0){

		echo "Este Registro já está cadastrado!!";
		exit();
	}

}





$res = $pdo->prepare("UPDATE atendimentos set descricao = :descricao, valor = :valor  where id = :id ");

$res->bindValue(":descricao", $descricao);
$res->bindValue(":valor", $valor);
$res->bindValue(":id", $id);

$res->execute();


echo "Editado com Sucesso!!";





?>