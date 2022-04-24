<?php 

require_once("../../conexao.php");

$id = $_POST['id'];



//BUSCAR O EMAIL DO REGISTRO PARA TAMBÉM DELETAR NA TABELA DE USUÁRIOS
$res_excluir = $pdo->query("select * from funcionarios where id = '$id'");
$dados_excluir = $res_excluir->fetchAll(PDO::FETCH_ASSOC);
$email= $dados_excluir[0]['email'];


//EXCLUIR NA TABELA DE USUÁRIOS
$res_usu = $pdo->prepare("DELETE from usuarios where usuario = :usu ");

$res_usu->bindValue(":usu", $email);

$res_usu->execute();


$res = $pdo->prepare("DELETE from funcionarios where id = :id ");

$res->bindValue(":id", $id);

$res->execute();

?>