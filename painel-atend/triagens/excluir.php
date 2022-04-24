<?php 

require_once("../../conexao.php");

$id = $_POST['id'];


$res = $pdo->prepare("DELETE from triagens where id = :id ");

$res->bindValue(":id", $id);

$res->execute();


?>