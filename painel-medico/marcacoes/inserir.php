<?php 

require_once("../../conexao.php");

$data = $_POST['data'];
$hora = $_POST['hora'];
$paciente = $_POST['txtid'];
$tipo_atendimento = $_POST['atendimentos'];
$medico = $_POST['medico'];


$res_valor = $pdo->query("SELECT * from atendimentos where id = '$tipo_atendimento'");
$dados_valor = $res_valor->fetchAll(PDO::FETCH_ASSOC);
$linhas = count($dados_valor);

if($linhas > 0){

	$valor = $dados_valor[0]['valor'];	

}



$res = $pdo->prepare("INSERT into consultas (data, hora, paciente, tipo_atendimento, medico, valor, pgto_confirmado) values (:data, :hora, :paciente, :tipo_atendimento, :medico, :valor, :pgto_confirmado)");


$res->bindValue(":data", $data);
$res->bindValue(":hora", $hora);
$res->bindValue(":paciente", $paciente);
$res->bindValue(":tipo_atendimento", $tipo_atendimento);
$res->bindValue(":medico", $medico);
$res->bindValue(":valor", $valor);
$res->bindValue(":pgto_confirmado", 'Não');


$res->execute();


//TRAZER O ULTIMO ID DA CONSULTA MARCADA
$res_id = $pdo->query("select * from consultas order by id desc limit 1");
$dados_id = $res_id->fetchAll(PDO::FETCH_ASSOC);
$id_consulta= $dados_id[0]['id'];



//INSERIR DADOS TAMBÉM NA TABELA DE CONTAS A RECEBER
$res_c = $pdo->prepare("INSERT into contas_receber (descricao, valor, vencimento, id_consulta) values (:descricao, :valor, :vencimento, :id_consulta)");

$res_c->bindValue(":descricao", $tipo_atendimento);
$res_c->bindValue(":valor", $valor);
$res_c->bindValue(":vencimento", $data);
$res_c->bindValue(":id_consulta", $id_consulta);

$res_c->execute();




echo "Cadastrado com Sucesso!!";




?>