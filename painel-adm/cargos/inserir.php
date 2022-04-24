<?php 

require_once("../../conexao.php");

$nome = $_POST['nome'];


	//VERIFICAR SE O CARGO JÁ ESTÁ CADASTRADO
$res_c = $pdo->query("select * from cargos where nome = '$nome'");
$dados_c = $res_c->fetchAll(PDO::FETCH_ASSOC);
$linhas = count($dados_c);


if($nome == ''){
	echo "Preencha o Nome!!";
	exit();
}

if($linhas == 0){
	$res = $pdo->prepare("INSERT into cargos (nome) values (:nome)");

	$res->bindValue(":nome", $nome);
	

	$res->execute();


	echo "Cadastrado com Sucesso!!";

}else{
	echo "Registro já cadastrado!!";
}

?>