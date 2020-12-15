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
    $this->Cell(70,10,utf8_decode('Reporte de Matrículas'),0,0,'C');
    // Salto de línea
    $this->Ln(20);

    $this->Cell(13,10, "Id", 1, 0, "C", 0);
    $this->Cell(20, 10, "NIE", 1, 0, "C", 0);
    $this->Cell(40, 10, "Nombres", 1, 0, "C", 0);
    $this->Cell(40, 10, "Apellidos", 1, 0, "C", 0);
    $this->Cell(35, 10, "Fecha", 1, 0, "C", 0);
    $this->Cell(45, 10, "Id Grado Docente", 1, 1, "C", 0);
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

$consulta = "SELECT matricula.idmatricula, estudiante.nie, estudiante.nombres, estudiante.apellidos, matricula.fecha, matricula.idgradoDocente
FROM estudiante INNER JOIN matricula WHERE matricula.nie = estudiante.nie";
$res = $mysqli->query($consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);

while ($row = $res->fetch_assoc()){
    $pdf->Cell(13,10, $row["idmatricula"], 1, 0, "C", 0);
    $pdf->Cell(20,10, $row["nie"], 1, 0, "C", 0);
    $pdf->Cell(40,10, $row["nombres"], 1, 0, "C", 0);
    $pdf->Cell(40,10, $row["apellidos"], 1, 0, "C", 0);
    $pdf->Cell(35, 10, $row["fecha"], 1, 0, "C", 0);
    $pdf->Cell(45, 10, $row["idgradoDocente"], 1, 1, "C", 0);
}
$pdf->Output();
?>