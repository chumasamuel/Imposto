<?php
ob_start();
session_start();

include_once("ligar.php");
require_once('TCPDF/tcpdf.php');

$today = date('d/m/Y');
$pdf = new TCPDF();

$pdf->SetPrintHeader(false);
$pdf->SetPrintFooter(false);
$pdf->AddPage();

$imageFile = 'assets/img/logop.JPG';
$imageWidth = 30;
$pageWidth = $pdf->getPageWidth();
$imageX = ($pageWidth - $imageWidth) / 2;

$pdf->Image($imageFile, $imageX, 10, $imageWidth, '', 'JPEG', '', 'T', false, 300);

$html = '<h1 style="text-align:center;">República de Moçambique</h1>';
$html .= '<h2 style="text-align:center;"><strong>Província de Gaza</strong></h2>';
$html .= '<h3 style="text-align:center;">Distrito de Chongoene</h3>';

$pdf->SetY(50);

$html .= '<h4 style="text-align:left; margin-left: 30px;"><strong>Contribuintes com o imposto não pago</strong></h4>';

$html .= '<table border="1" style="width: 100%;">';
$html .= '<thead>';
$html .= '<tr style="background-color: #b3e0ff;">';
$html .= '<th style="width: 10%;">Id</th>';
$html .= '<th>Nome</th>';
$html .= '<th>Bairro</th>';
$html .= '<th>Gênero</th>';
$html .= '<th>Nuit</th>';
$html .= '<th>Situação</th>';
$html .= '</tr>';
$html .= '</thead>';
$html .= '<tbody>';

$NaoRegularizada = "SELECT * from contribuinte WHERE status = 0";
$resultado_nao_regularizada = mysqli_query($conectar, $NaoRegularizada);

while ($row_nao_regularizada = mysqli_fetch_assoc($resultado_nao_regularizada)) {
    $html .= '<tr>';
    $html .= '<td style="width: 10%;">' . $row_nao_regularizada['id'] . '</td>';
    $html .= '<td>' . $row_nao_regularizada['nome'] . '</td>';
    $html .= '<td>' . $row_nao_regularizada['bairro'] . '</td>';
    $html .= '<td>' . $row_nao_regularizada['genero'] . '</td>';
    $html .= '<td>' . $row_nao_regularizada['nuit'] . '</td>';
    $html .= '<td style="color:red;">Não Regularizada</td>';
    $html .= '</tr>';
}

$html .= '</tbody>';
$html .= '</table>';
$html .= '<br>';
$html .= '<br>';
$html .= '<br>';
$html .= '<br>';
$html .= '<br>';
$html .= '<div class="date" style="text-align:center; margin-bottom: 5px;">Chongoene, Aos ' . $today . '</div>';
$html .= '<br>';
$html .= '<br>';
$footerWidth = "20px";
$footerFontSize = "12px";
$footerVerticalMargin = "8px";
$footerHorizontalMargin = "5px";

$html .= '<div class="footer" style="width:' . $footerWidth . '; font-size:' . $footerFontSize . '; margin:' . $footerVerticalMargin . ' ' . $footerHorizontalMargin . ';"><hr>';
$html .= '<span style="float:right;">Página ' . $pdf->getAliasNumPage() . ' de ' . $pdf->getAliasNbPages() . '</span>';
$html .= '</div>';

$pdf->writeHTML($html, true, false, true, false, '');
ob_end_clean();

$pdf->Output("NaoRegularizada.pdf", "I");
?>
