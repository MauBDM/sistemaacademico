<?php
require('fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Arial bold 15
    $this->SetFont('Arial','B',9);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    $this->Cell(70,10,utf8_decode('Reporte de Año Lectivo'),0,0,'C');
    // Salto de línea
    $this->Ln(20);

    $this->Cell(18,10, "Id Docente", 1, 0, "C", 0);
    $this->Cell(12, 10, utf8_decode("Año"), 1, 0, "C", 0);
    $this->Cell(17,10, "Turno", 1, 0, "C", 0);
    $this->Cell(25, 10, "Tipo", 1, 0, "C", 0);
    $this->Cell(12,10, utf8_decode("Guía"), 1, 0, "C", 0);
    $this->Cell(17, 10, "Id Grado", 1, 0, "C", 0);
    $this->Cell(18,10, "Id Estado", 1, 0, "C", 0);
    $this->Cell(30, 10, "Nombre Docente", 1, 0, "C", 0);
    $this->Cell(30,10, "Grado", 1, 1, "C", 0);

    #$this->Cell(39, 10, utf8_decode("1° Trimestre"), 1, 0, "C", 0);
    #$this->Cell(39, 10, utf8_decode("2° Trimestre"), 1, 0, "C", 0);
    #$this->Cell(39, 10, utf8_decode("3° Trimestre"), 1, 0, "C", 0);
    #$this->Cell(39, 10, "Nota Final", 1, 1, "C", 0);
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

$consulta = "SELECT docente_grado.*,docente.nombres as docenteNombres, grado.nombre as gradoNombre FROM docente_grado inner join docente on docente_grado.guia=docente.iddocente inner join grado on docente_grado.idgrado=grado.idgrado Where docente_grado.año = '2020'";
$res = $mysqli->query($consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',8);

while ($row = $res->fetch_assoc()){
    $pdf->Cell(18,10, $row["iddocente_grado"], 1, 0, "C", 0);
    $pdf->Cell(12,10, $row["año"], 1, 0, "C", 0);
    $pdf->Cell(17, 10, $row["turno"], 1, 0, "C", 0);
    $pdf->Cell(25, 10, utf8_decode($row["tipo"]), 1, 0, "C", 0);
    $pdf->Cell(12, 10, $row["guia"], 1, 0, "C", 0);
    $pdf->Cell(17, 10, $row["idgrado"], 1, 0, "C", 0);
    $pdf->Cell(18, 10, $row["idestado"], 1, 0, "C", 0);
    $pdf->Cell(30, 10, $row["docenteNombres"], 1, 0, "C", 0);
    $pdf->Cell(30, 10, $row["gradoNombre"], 1, 1, "C", 0);
}
$pdf->Output();
?>