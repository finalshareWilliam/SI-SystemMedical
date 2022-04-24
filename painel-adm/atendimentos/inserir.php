<?php 

require_once("../../conexao.php");

$descricao = $_POST['descricao'];
$valor = $_POST['valor'];
$valor = str_replace(',', '.', $valor);


	//VERIFICAR SE O MÉDICO JÁ ESTÁ CADASTRADO
$res_c = $pdo->query("select * from atendimentos where descricao = '$descricao'");
$dados_c = $res_c->fetchAll(PDO::FETCH_ASSOC);
$linhas = count($dados_c);


if($descricao == ''){
	echo "Preencha a Descrição!!";
	exit();
}

if($linhas == 0){
	$res = $pdo->prepare("INSERT into atendimentos (descricao, valor) values (:descricao, :valor)");

	$res->bindValue(":descricao", $descricao);
	$res->bindValue(":valor", $valor);
	

	$res->execute();


	echo "Cadastrado com Sucesso!!";

}else{
	echo "Este Registro já está cadastrado!!";
}

?>