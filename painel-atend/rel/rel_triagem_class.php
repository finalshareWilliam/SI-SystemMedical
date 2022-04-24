<?php 

include('../../conexao.php');



//CARREGAR DOMPDF
require_once '../../dompdf/autoload.inc.php';
use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options();
$options->set('isRemoteEnabled', true);
$pdf = new DOMPDF($options);


$id = $_GET['id'];

//ALIMENTAR OS DADOS NO RELATÓRIO
$html = utf8_encode(file_get_contents($url_sistema."/painel-atend/rel/rel_triagem.php?id=".$id));



//Definir o tamanho do papel e orientação da página
$pdf->set_paper('A4', 'portrait');

//CARREGAR O CONTEÚDO HTML
$pdf->load_html(utf8_decode($html));

//RENDERIZAR O PDF
$pdf->render();

//NOMEAR O PDF GERADO
$pdf->stream(
'relatorioTriagem.pdf',
array("Attachment" => false)
);


