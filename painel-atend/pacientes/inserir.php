<?php 

require_once("../../conexao.php");

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$telefone = $_POST['telefone'];
$rg = $_POST['rg'];
$email = $_POST['email'];
$data_nascimento = $_POST['data'];
$civil = $_POST['civil'];
$sexo = $_POST['sexo'];
$endereco = $_POST['endereco'];
$obs = $_POST['obs'];

//CALCULAR A IDADE COM BASE NA DATA SELECIONADA

if($data_nascimento != ''){
	// separando yyyy, mm, ddd
	list($ano, $mes, $dia) = explode('-', $data_nascimento);

    // data atual
	$hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
    // Descobre a unix timestamp da data de nascimento do fulano
	$nascimento = mktime( 0, 0, 0, $mes, $dia, $ano);

    // cálculo
	$idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);
}else{
	$idade = 0;
}

     




	//VERIFICAR SE O MÉDICO JÁ ESTÁ CADASTRADO
$res_c = $pdo->query("select * from pacientes where cpf = '$cpf'");
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
	$res = $pdo->prepare("INSERT into pacientes (nome, cpf, rg, telefone, email, data_nasc, idade, civil, sexo, endereco, obs) values (:nome, :cpf, :rg, :telefone, :email, :data_nasc, :idade, :civil, :sexo, :endereco, :obs)");

	$res->bindValue(":nome", $nome);
	$res->bindValue(":cpf", $cpf);
	$res->bindValue(":telefone", $telefone);
	$res->bindValue(":rg", $rg);
	$res->bindValue(":email", $email);
	$res->bindValue(":data_nasc", $data_nascimento);
	$res->bindValue(":idade", $idade);
	$res->bindValue(":civil", $civil);
	$res->bindValue(":sexo", $sexo);
	$res->bindValue(":endereco", $endereco);
	$res->bindValue(":obs", $obs);
	

	$res->execute();




	echo "Cadastrado com Sucesso!!";

}else{
	echo "Paciente já cadastrado!!";
}



?>