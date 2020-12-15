<?php
require('fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Arial bold 15
    $this->SetFont('Arial','B',12);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    $this->Cell(70,10,utf8_decode('Reporte de Notas'),0,0,'C');
    // Salto de línea
    $this->Ln(20);

    $this->Cell(13,10, "Id", 1, 0, "C", 0);
    $this->Cell(20, 10, "NIE", 1, 0, "C", 0);
    $this->Cell(39, 10, utf8_decode("1° Trimestre"), 1, 0, "C", 0);
    $this->Cell(39, 10, utf8_decode("2° Trimestre"), 1, 0, "C", 0);
    $this->Cell(39, 10, utf8_decode("3° Trimestre"), 1, 0, "C", 0);
    $this->Cell(39, 10, "Nota Final", 1, 1, "C", 0);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}
require "consultareporte.php";

$consulta1 = "SELECT idnotas, nie, primerTrimestre, segundoTrimestre, tercerTrimestre, notaFinal FROM notas";
$res = $mysqli->query($consulta1);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);

while ($row = $res->fetch_assoc()){
    $pdf->Cell(13,10, $row["idnotas"], 1, 0, "C", 0);
    $pdf->Cell(20,10, $row["nie"], 1, 0, "C", 0);
    $pdf->Cell(39, 10, $row["primerTrimestre"], 1, 0, "C", 0);
    $pdf->Cell(39, 10, $row["segundoTrimestre"], 1, 0, "C", 0);
    $pdf->Cell(39, 10, $row["tercerTrimestre"], 1, 0, "C", 0);
    $pdf->Cell(39, 10, $row["notaFinal"], 1, 1, "C", 0);
}
$pdf->Output();
?>