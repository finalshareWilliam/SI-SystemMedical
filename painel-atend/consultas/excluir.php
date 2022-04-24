<?php 

require_once("../../conexao.php");

$id = $_POST['id'];


$res = $pdo->prepare("DELETE from consultas where id = :id ");

$res->bindValue(":id", $id);

$res->execute();


$res_c = $pdo->prepare("DELETE from contas_receber where id_consulta = :id ");

$res_c->bindValue(":id", $id);

$res_c->execute();

?>