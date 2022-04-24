<?php 

include('../../conexao.php');

date_default_timezone_set('America/Sao_Paulo');


//CARREGAR DOMPDF
require_once '../../dompdf/autoload.inc.php';
use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options();
$options->set('isRemoteEnabled', true);
$pdf = new DOMPDF($options);


$id_consulta = $_GET['id'];



//ALIMENTAR OS DADOS NO RELATÓRIO
$html = utf8_encode(file_get_contents($url_sistema."/painel-medico/rel/rel_atestado.php?id=".$id_consulta));


//Definir o tamanho do papel e orientação da página
$pdf->set_paper('A4', 'portrait');

//CARREGAR O CONTEÚDO HTML
$pdf->load_html(utf8_decode($html));

//RENDERIZAR O PDF
$pdf->render();

//NOMEAR O PDF GERADO
$pdf->stream(
'relatorioAtestado.pdf',
array("Attachment" => false)
);


