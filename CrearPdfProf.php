<?php

require('./libs/fpdf.php');
require('./clases/Conexion.php');
require('./clases/Horarios.php');

class PDF extends FPDF
{
	// Cabecera de página
	function Header()
	{
		// Logo
		$this->Image('./imagenes/logo/logo.png', 15, 2, 30);
		$this->SetFont('Arial', 'B', 13);
		// Move to the right
		$this->Cell(80);
		// Title
		$this->Cell(95, 10, 'Lista Alumnos', 1, 0, 'C');
		// Line break
		$this->Ln(30);
	}

	// Pie de página
	function Footer()
	{
		// Posición: a 1,5 cm del final
		$this->SetY(-15);
		// Arial italic 8
		$this->SetFont('Arial', 'I', 8);
		// Número de página
		$this->Cell(0, 10, "Spartan Academy-Ismael Rubio  Copyright © 2021   Page" . $this->PageNo() . '/{nb}', 0, 0, 'C');
	}
}

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 13);
$pdf->SetLineWidth(0.8);


$cabecera = false;
// $conexion= new mysqli("localhost","root","","spartan-academy");
$result = Horarios::mostrarListadeAlumnosListados($_GET['codHorario']);
while ($fila = $result->fetch_assoc()) {
	if (!$cabecera) {

		foreach ($fila as $indice => $valor) {

			$pdf->cell(56, 10, strtoupper($indice), 1, '', 'C');
		}
		$pdf->cell(23, 10, 'ASISTIDO', 1, '', 'C');
		$cabecera = true;
		$pdf->Ln(10);
	}
	$pdf->SetFont('Arial', '', 13);
	$pdf->SetLineWidth(0.2);
	$pdf->SetDrawColor(187,185,185);

	foreach ($fila as $indice => $valor) {

		$pdf->cell(56, 10, $valor,1);
	}
	$pdf->cell(23, 10,'',1);
	$pdf->Ln(10);
}
$result->free();
// $conexion->close();

$pdf->Output();
