<?php 

require_once("../../conexao.php");

$id = $_POST['id'];


$res = $pdo->prepare("DELETE from atendimentos where id = :id ");

$res->bindValue(":id", $id);

$res->execute();

?>