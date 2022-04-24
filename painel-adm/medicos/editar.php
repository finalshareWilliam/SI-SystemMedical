<?php 

require_once("../../conexao.php");

$nome = $_POST['nome'];
$especialidade = $_POST['especialidade'];
$crm = $_POST['crm'];
$cpf = $_POST['cpf'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$id = $_POST['id'];
$cpf_antigo = $_POST['cpf_antigo'];
$turno = $_POST['turno'];


$cpf_limpo = preg_replace('/[^0-9]/', '', $cpf_antigo);

if($cpf_antigo != $cpf){

		//VERIFICAR SE O MÉDICO JÁ ESTÁ CADASTRADO
	$res_c = $pdo->query("select * from medicos where cpf = '$cpf'");
	$dados_c = $res_c->fetchAll(PDO::FETCH_ASSOC);
	$linhas = count($dados_c);

	if($linhas != 0){

		echo "Este Médico já está cadastrado!!";
		exit();
	}

}





$res = $pdo->prepare("UPDATE medicos set nome = :nome, especialidade = :esp, crm = :crm, cpf = :cpf, telefone = :telefone, email = :email, turno = :turno where id = :id ");

$res->bindValue(":nome", $nome);
$res->bindValue(":esp", $especialidade);
$res->bindValue(":crm", $crm);
$res->bindValue(":cpf", $cpf);
$res->bindValue(":telefone", $telefone);
$res->bindValue(":email", $email);
$res->bindValue(":turno", $turno);
$res->bindValue(":id", $id);


$res->execute();



//EDITAR TAMBÉM NA TABELA DE USUÁRIOS
$res = $pdo->prepare("UPDATE usuarios set nome = :nome, usuario = :usuario, senha = :senha, senha_original = :senha_original, nivel = :nivel where senha_original = :cpf ");

	$res->bindValue(":nome", $nome);
	$res->bindValue(":usuario", $email);

	//preg replace mantem os valores definidos e remove quaisquer outros, nesse caso pontos e traços do cpf, só vai ficar numeros de 0 a 9
	$cpf_sem_traco = preg_replace('/[^0-9]/', '', $cpf);

	$res->bindValue(":senha", md5($cpf_sem_traco));
	$res->bindValue(":senha_original", $cpf_sem_traco);
	$res->bindValue(":nivel", 'Medico');
	$res->bindValue(":cpf", $cpf_limpo);

$res->execute();



//EDITAR TAMBÉM NA TABELA DE FUNCIONÁRIOS
$res = $pdo->prepare("UPDATE funcionarios set nome = :nome,  cpf = :cpf, telefone = :telefone, email = :email, cargo = :cargo where cpf = :cpf_antigo ");

$res->bindValue(":nome", $nome);
$res->bindValue(":cpf", $cpf);
$res->bindValue(":telefone", $telefone);
$res->bindValue(":email", $email);
$res->bindValue(":cargo", 'Medico');
$res->bindValue(":cpf_antigo", $cpf_antigo);
	


$res->execute();







echo "Editado com Sucesso!!";





?>