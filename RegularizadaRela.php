<?php
ob_start(); // Inicie o buffer de saída

// Evite saídas ou erros antes de session_start()
session_start();

include_once("ligar.php");
require_once('TCPDF/tcpdf.php'); // Inclua a biblioteca TCPDF

$today = date('d/m/Y');

$pdf = new TCPDF(); // Crie uma instância do TCPDF

$pdf->SetPrintHeader(false); // Desative o cabeçalho
$pdf->SetPrintFooter(false); // Desative o rodapé

$pdf->AddPage(); // Adicione uma página ao PDF

// Adicione o logotipo no cabeçalho com margem inferior
$imageFile = 'assets/img/logop.JPG'; // Substitua pelo caminho real do seu logotipo

// Calcule a posição X para centralizar a imagem
$imageWidth = 30; // Largura da imagem
$pageWidth = $pdf->getPageWidth();
$imageX = ($pageWidth - $imageWidth) / 2;

$pdf->Image($imageFile, $imageX, 10, $imageWidth, '', 'JPEG', '', 'T', false, 300);

$html = '<h1 style="text-align:center;">República de Moçambique</h1>';
$html .= '<h2 style="text-align:center;"><strong>Província de Gaza</strong></h2>';
$html .= '<h3 style="text-align:center;">Distrito de Chongoene</h3>'; // Adiciona o subtítulo

// Adicione espaço para o logotipo
$pdf->SetY(50); // Mova a posição Y para baixo para criar espaço para o logotipo

// Desloque e alinhe o título "Contribuintes Cadastrados" à esquerda
$html .= '<h4 style="text-align:left; margin-left: 30px;"><strong>Contribuintes com o imposto pago</strong></h4>';

$html .= '<table border="1" style="width: 100%;">';
$html .= '<thead>';
$html .= '<tr style="background-color: #b3e0ff;">'; // Adicione o estilo de fundo azul claro aqui
$html .= '<th style="width: 10%;">Id</th>'; // Largura da coluna "Id" diminuída
$html .= '<th>Nome</th>';
$html .= '<th>Bairro</th>';
$html .= '<th>Gênero</th>';
$html .= '<th>Nuit</th>';
$html .= '<th>Situação</th>'; // Defina a cor azul escuro (#0000AA)
$html .= '</tr>';
$html .= '</thead>';
$html .= '<tbody>';

// Modifique a consulta SQL para selecionar apenas os registros com status diferente de 0
$TodosContribuintes = "SELECT * from contribuinte WHERE status <> 0";
$resultado_trasacoes = mysqli_query($conectar, $TodosContribuintes);

while ($row_contribuinte = mysqli_fetch_assoc($resultado_trasacoes)) {
    $html .= '<tr>';
    $html .= '<td style="width: 10%;">' . $row_contribuinte['id'] . '</td>';
    $html .= '<td>' . $row_contribuinte['nome'] . '</td>';
    $html .= '<td>' . $row_contribuinte['bairro'] . '</td>';
    $html .= '<td>' . $row_contribuinte['genero'] . '</td>';
    $html .= '<td>' . $row_contribuinte['nuit'] . '</td>';
    $html .= '<td><span style="color: #0000AA;">Regularizada</span></td>'; // Pinte o texto "Regularizada" de azul escuro
    $html .= '</tr>';
}

$html .= '</tbody>';
$html .= '</table>';
$html .= '<br>';
$html .= '<br>';
$html .= '<br>';
$html .= '<br>';
$html .= '<br>';
$html .= '<div class="date" style="text-align:center; margin-bottom: 5px;">Chongoene, Aos ' . $today . '</div>'; // Ajuste da margem inferior
$html .= '<br>';
$html .= '<br>';
$footerWidth = "20px";      // Largura do footer em pixels
$footerFontSize = "8px";    // Tamanho da fonte em pixels
$footerVerticalMargin = "8px"; // Margem vertical em pixels
$footerHorizontalMargin = "100px"; // Margem horizontal em pixels

$html .= '<div class="footer" style="width:' . $footerWidth . '; font-size:' . $footerFontSize . '; margin:' . $footerVerticalMargin . ' ' . $footerHorizontalMargin . ';"><hr></div>';

$pdf->writeHTML($html, true, false, true, false, '');

ob_end_clean(); // Limpe o buffer de saída

$pdf->Output("Regularizada.pdf", "I"); // Exibe o PDF no navegador
?>
