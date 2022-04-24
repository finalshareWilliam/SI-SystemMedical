<?php 

@session_start();
include('../conexao.php');

$result_tabela = "SHOW TABLES";
$resultado_tabela = mysqli_query($conn, $result_tabela);
while($row_tabela = mysqli_fetch_row($resultado_tabela)){
    $tabelas[] = $row_tabela[0];
}
//var_dump($tabelas);
$xml_file = 'backup/backup.xml';
$doc = new DOMDocument('1.0', 'utf-8');
$doc->format_output = true;
$root = $doc->createElement('Backup');

foreach($tabelas as $tabela){
    $node = $doc->createElement($tabela);
    $query = "SELECT * FROM " . $tabela;
    $res = mysqli_query($conn, $query);

    $values = $res->fetch_all(MYSQLI_ASSOC);

    foreach($values as $value){
        $columns = array();
        $entry_node = $doc->createElement("registro");
        if(!empty($values)){
            $columns = array_keys($values[0]);
        }
        foreach($columns as $column){
            $column_node = $doc->createElement($column, $value[$column]);
            $entry_node->appendChild($column_node);
        }
        $node->appendChild($entry_node);
    }

    $root->appendChild($node);
}

$doc->appendChild($root);
$doc->save($xml_file);

//Adicionar o header para download
if(file_exists($xml_file)){
    header("Pragma: public");
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Cache-Control: private", false);
    header("Content-Type: application/force-download");
    header("Content-Disposition: attachment; filename=\"" . basename($xml_file) . "\";");
    header("Content-Transfer-Encoding: binary");
    header("Content-Length: " . filesize($xml_file));
    readfile($xml_file);
    
    $_SESSION['msg'] = "<span style='color: green;'>Exportado BD com sucesso</span>";
}else{
    $_SESSION['msg'] = "<span style='color: red;'>Erro ao exportar o BD</span>";
}





?>










