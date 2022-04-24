<?php 

require_once("../../conexao.php");

$consultorio = $_POST['consultorio'];
$id = $_POST['id'];



$res = $pdo->prepare("UPDATE medicos set consultorio = :consultorio where id = :id ");

$res->bindValue(":consultorio", $consultorio);
$res->bindValue(":id", $id);

$res->execute();


echo "Editado com Sucesso!!";





?>