<?php 

require_once("../../conexao.php");

$nome = $_POST['nome'];

$id = $_POST['id'];
$campo_antigo = $_POST['campo_antigo'];


if($campo_antigo != $nome){

		//VERIFICAR SE O MÉDICO JÁ ESTÁ CADASTRADO
	$res_c = $pdo->query("select * from especializacoes where nome = '$nome'");
	$dados_c = $res_c->fetchAll(PDO::FETCH_ASSOC);
	$linhas = count($dados_c);

	if($linhas != 0){

		echo "Esta Especialização já está cadastrada!!";
		exit();
	}

}





$res = $pdo->prepare("UPDATE especializacoes set nome = :nome  where id = :id ");

$res->bindValue(":nome", $nome);
$res->bindValue(":id", $id);

$res->execute();


echo "Editado com Sucesso!!";





?>