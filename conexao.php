<?php 

require_once("config.php");

date_default_timezone_set('America/Sao_Paulo');

try {
	$pdo = new PDO("mysql:dbname=$banco;host=$host", "$usuario", "$senha");

	//conexao mysql para o backyp
	$conn = mysqli_connect($host, $usuario, $senha, $banco);
} catch (Exception $e) {
	echo "Erro ao conectar com o banco de dados! ".$e;
}

 ?>