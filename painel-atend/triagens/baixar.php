<?php 

require_once("../../conexao.php");

$id = $_POST['id'];

$res = $pdo->prepare("UPDATE triagens SET finalizada = 'Sim' where id = :id ");

$res->bindValue(":id", $id);

$res->execute();


?>