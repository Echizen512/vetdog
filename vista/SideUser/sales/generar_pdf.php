<?php
require('./fpdf186/fpdf.php');

$id_venta = $_GET['id_venta'];

$conn = new mysqli('localhost', 'root', '', 'vetdog');

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$query = "SELECT * FROM venta WHERE id_venta = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id_venta);
$stmt->execute();
$result = $stmt->get_result();
$venta = $result->fetch_assoc();

$stmt->close();
$conn->close();

$pdf = new FPDF();
$pdf->AddPage();

$pdf->SetFont('Arial', 'B', 16);
$pdf->SetTextColor(0, 51, 102); 
$pdf->Cell(0, 10, 'Factura de Compra', 0, 1, 'C');
$pdf->Ln(5);

$pdf->SetFont('Arial', 'I', 12);
$pdf->Cell(0, 10, 'Veterinaria Vetdog', 0, 1, 'C');
$pdf->Cell(0, 10, 'Urb. Las Mercedes Sector 4 C.2 Casa N.6.', 0, 1, 'C');
$pdf->Cell(0, 10, 'Telf: 0412-4773077', 0, 1, 'C');
$pdf->Ln(10);

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetFillColor(200, 220, 255); 
$pdf->Cell(0, 10, 'Detalles de la Venta', 0, 1, 'C', true);
$pdf->Ln(5);

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(40, 10, 'ID Venta:', 0);
$pdf->Cell(0, 10, utf8_decode($venta['id_venta']), 0, 1);
$pdf->Cell(40, 10, 'Fecha:', 0);
$pdf->Cell(0, 10, utf8_decode(date("d-m-Y", strtotime($venta['fecha']))), 0, 1);
$pdf->Cell(40, 10, 'Numero de Factura:', 0);
$pdf->Cell(0, 10, utf8_decode($venta['numfact']), 0, 1);
$pdf->Cell(40, 10, 'Estado:', 0);
$pdf->Cell(0, 10, utf8_decode($venta['estado']), 0, 1);
$pdf->Cell(40, 10, 'Total:', 0);
$pdf->Cell(0, 10, utf8_decode($venta['total'] . ' $'), 0, 1);

$pdf->Ln(10);
$pdf->SetFillColor(230, 230, 230); 
$pdf->Cell(0, 10, 'Detalles del Pago', 0, 1, 'C', true);
$pdf->Ln(5);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(40, 10, 'Tipo de Pago:', 0);
$pdf->Cell(0, 10, utf8_decode($venta['tipopa']), 0, 1);
$pdf->Cell(40, 10, 'Comprobante:', 0);
$pdf->Cell(0, 10, utf8_decode($venta['tipoc']), 0, 1);
$pdf->Ln(20);

$pdf->SetY(-40);
$pdf->SetFont('Arial', 'I', 10);
$pdf->Cell(0, 10, 'Gracias por su compra. Esperamos volver a verle pronto.', 0, 1, 'C');

$pdf->Output('D', 'Factura_' . $venta['numfact'] . '.pdf');
?>
