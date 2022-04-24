<?php 

require_once("../../conexao.php");

$nome = $_POST['nome'];
$especialidade = $_POST['especialidade'];
$crm = $_POST['crm'];
$cpf = $_POST['cpf'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$turno = $_POST['turno'];

	//VERIFICAR SE O MÉDICO JÁ ESTÁ CADASTRADO
$res_c = $pdo->query("select * from medicos where cpf = '$cpf'");
$dados_c = $res_c->fetchAll(PDO::FETCH_ASSOC);
$linhas = count($dados_c);
if($linhas == 0){
	$res = $pdo->prepare("INSERT into medicos (nome, especialidade, crm, cpf, telefone, email, turno) values (:nome, :especialidade, :crm, :cpf, :telefone, :email, :turno) ");

	$res->bindValue(":nome", $nome);
	$res->bindValue(":especialidade", $especialidade);
	$res->bindValue(":crm", $crm);
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
	$cpf_sem_tracos = preg_replace('/[^0-9]/', '', $cpf);

	$res->bindValue(":senha", md5($cpf_sem_tracos));
	$res->bindValue(":senha_original", $cpf_sem_tracos);
	$res->bindValue(":nivel", 'Médico');
	

	$res->execute();



	//SALVAR TAMBÉM NA TABELA DE FUNCIONÁRIOS

	$res = $pdo->prepare("INSERT into funcionarios (nome, cpf, telefone, email, cargo) values (:nome, :cpf, :telefone, :email, :cargo)");

	$res->bindValue(":nome", $nome);
	$res->bindValue(":cpf", $cpf);

	$res->bindValue(":telefone", $telefone);
	$res->bindValue(":email", $email);
	$res->bindValue(":cargo", 'Medico');
	

	$res->execute();


	echo "Cadastrado com Sucesso!!";

}else{
	echo "Este Médico já está cadastrado!!";
}

?>