<?php 

require_once("../../conexao.php");

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$telefone = $_POST['telefone'];
$turno = $_POST['turno'];
$email = $_POST['email'];




	//VERIFICAR SE O MÉDICO JÁ ESTÁ CADASTRADO
$res_c = $pdo->query("select * from recepcionistas where cpf = '$cpf'");
$dados_c = $res_c->fetchAll(PDO::FETCH_ASSOC);
$linhas = count($dados_c);


if($nome == ''){
	echo "Preencha o Nome!!";
	exit();
}

if($cpf == ''){
	echo "Preencha o CPF!!";
	exit();
}

if($linhas == 0){
	$res = $pdo->prepare("INSERT into recepcionistas (nome, cpf, telefone, email, turno) values (:nome, :cpf, :telefone, :email, :turno)");

	$res->bindValue(":nome", $nome);
	$res->bindValue(":cpf", $cpf);
	$res->bindValue(":telefone", $telefone);
	$res->bindValue(":email", $email);
	$res->bindValue(":turno", $turno);
	

	$res->execute();


	//SALVAR TAMBÉM NA TABELA DE USUÁRIOS

	$res = $pdo->prepare("INSERT into usuarios (nome, usuario, senha, senha_original, nivel) values (:nome, :usuario, :senha, :senha_original, :nivel)");

	$res->bindValue(":nome", $nome);
	$res->bindValue(":usuario", $email);

	//preg replace mantem os valores definidos e remove quaisquer outros, nesse caso pontos e traços do cpf, só vai ficar numeros de 0 a 9
	$cpf_sem_traco = preg_replace('/[^0-9]/', '', $cpf);

	$res->bindValue(":senha", md5($cpf_sem_traco));
	$res->bindValue(":senha_original", $cpf_sem_traco);
	$res->bindValue(":nivel", 'Recepcionista');
	

	$res->execute();



	
	//SALVAR TAMBÉM NA TABELA DE FUNCIONÁRIOS

	$res = $pdo->prepare("INSERT into funcionarios (nome, cpf, telefone, email, cargo) values (:nome, :cpf, :telefone, :email, :cargo)");

	$res->bindValue(":nome", $nome);
	$res->bindValue(":cpf", $cpf);

	$res->bindValue(":telefone", $telefone);
	$res->bindValue(":email", $email);
	$res->bindValue(":cargo", 'Recepcionista');
	

	$res->execute();



	echo "Cadastrado com Sucesso!!";

}else{
	echo "Recepcionista já cadastrado!!";
}

?>