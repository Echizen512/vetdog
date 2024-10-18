<?php
require_once './../../assets/fpdf/fpdf.php';
require_once './../../assets/db/connectionMysql.php';

session_start();

if (!$_SESSION['owner_id'] || !$_SESSION['quotesID']) { ?>
  <script>location.href = './nuevo.php'</script>
<?php }

// * Get info the BD 
$owner_id = $_SESSION['owner_id'];
$quotesID = $_SESSION['quotesID'];

$sql = "SELECT dni_due,nom_due,ape_due,movil,correo,direc FROM owner WHERE id_due = '$owner_id'";
$resultsUser = mysqli_query($conn, $sql);

$sql = "SELECT number_quote,attended,cost,start,end,dateCreation FROM quotes WHERE quotesID = '$quotesID'";
$resultsQuotes = mysqli_query($conn, $sql);

global $resultsQuotes;

class PDF extends FPDF
{
  function Header()
  {
    // Logo
    $this->AddFont('GreatVibes-Regular', '');
    $this->Cell(35, 35, '', 0);
    $this->Image('./../../assets/img/icon2.png', 10, 5, 35, 35);
    $this->SetFont('GreatVibes-Regular', '', 26);
    // Move to the right
    $this->Cell(10, 0, '', 0);
    // Title
    $this->Cell(110, 12, 'Veterinaria Beatriz Fagundez', 0, 0, 'C');
    // Line break
    $this->Ln(18);

    $this->Cell(140, 0, '', 0);
    $this->SetFont('Helvetica', 'B', 12);
    $this->Cell(20, 10, utf8_decode('N° Factura:'), 0, 0, 'C');
    $this->SetFont('Helvetica', 'B', 12);

    foreach ($GLOBALS['resultsQuotes'] as $row) {
      $this->Cell(30, 10, $row['number_quote'], 0, 0, 'C');
    }
    $this->Ln(7);

    $this->Cell(160);
    $this->Ln(14);
  }
}

$pdf = new PDF();
$pdf->AddPage();

$pdf->SetFont('Helvetica', 'B', 12);
foreach ($resultsUser as $row) {

  $pdf->Cell(100, 0, 'Nombres y apellidos: ' . $row['nom_due'] . ' ' . $row['ape_due'], 0, 0);
  $pdf->Ln(2);

  $pdf->Cell(45, 0, '', 0, 0, 'C');
  $pdf->Cell(70, 0, '', 1);
  $pdf->Ln(8);

  $pdf->Cell(100, 0, utf8_decode('Teléfono: ') . $row['movil'], 0, 0);
  $pdf->Ln(2);

  $pdf->Cell(22, 0, '', 0, 0, 'C');
  $pdf->Cell(28, 0, '', 1);
  $pdf->Ln(10);

  $pdf->Cell(0, 10, 'Servicios de la consulta', 0, 0, '');
  $pdf->Ln();

  $pdf->SetFillColor(224, 235, 255);
  $pdf->Cell(30, 8, utf8_decode('N°'), 'B', 0, 'C', true);
  $pdf->Cell(80, 8, 'Nombre del servicio', 'B', 0, 'C', true);
  $pdf->Cell(60, 8, 'Cantidad ', 'B', 0, 'C', true);
  $pdf->Cell(0, 8, 'Precio', 'B', 0, 'C', true);
  $pdf->Ln();

  $sql = "SELECT s.nomser,qs.price FROM quotes_services as qs JOIN service AS s WHERE qs.serviceID = s.id_servi AND qs.quotesID = '$quotesID'";
  $resultsQuotesServices = mysqli_query($conn, $sql);

  $sql = "SELECT COUNT(*) as TotalPets FROM quotes_pets as qp JOIN pet AS p JOIN pet_type AS pt ON qp.petsID = p.id_pet AND p.id_tiM = pt.id_tiM AND qp.quotesID = '$quotesID'";
  $resultsQuotesPets = mysqli_query($conn, $sql);

  foreach ($resultsQuotesServices as $key => $row) {
    $pdf->Cell(30, 8, $key + 1, 'B', 0, 'C');
    $pdf->Cell(80, 8, utf8_decode($row['nomser']), 'B', 0, 'C');
    foreach ($resultsQuotesPets as $key => $row2) {
      $pdf->Cell(60, 8, $row2['TotalPets'], 'B', 0, 'C');
    }
    $pdf->Cell(0, 8, $row['price'] . '$', 'B', 0, 'C');
    $pdf->Ln();
  }

  $sql = "SELECT SUM(qs.priceTotal) as priceTotal FROM quotes_services as qs JOIN service AS s WHERE qs.serviceID = s.id_servi AND qs.quotesID = '$quotesID'";
  $resultsQuotesServices = mysqli_query($conn, $sql);

  //Resumen the consult
  foreach ($resultsQuotesServices as $key => $row1) {
    $pdf->SetFillColor(164, 193, 253);
    $pdf->Cell(100, 8, '', 0, 0, 'C');
    $pdf->Cell(70, 8, 'Total Servicios:', 'B', 0, 'C');
    $pdf->Cell(0, 8, $row1['priceTotal'] . '$', 'B', 0, 'C');
    $pdf->Ln();

    foreach ($resultsQuotes as $row2) {
      $pdf->Cell(100, 8, '', 0, 0, 'C');
      $pdf->Cell(70, 8, 'Consulta:', 'B', 0, 'C');
      $pdf->Cell(0, 8, $row2['cost'] . '$', 'B', 0, 'C');
      $pdf->Ln();

      $pdf->SetFillColor(164, 193, 253);
      $pdf->Cell(100, 8, '', 0, 0, 'C');
      $pdf->Cell(70, 8, 'Total:', 'B', 0, 'C');
      $pdf->Cell(0, 8, $row2['cost'] + $row1['priceTotal'] . '$', 'B', 0, 'C', true);
    }
  }
  $pdf->Ln();
  $pdf->Ln();

  $pdf->Cell(0, 10, 'Mascotas atendidas', 0, 0, '');
  $pdf->Ln();

  $pdf->SetFillColor(224, 235, 255);
  $pdf->Cell(30, 8, utf8_decode('N°'), 'B', 0, 'C', true);
  $pdf->Cell(60, 8, 'Nombre de mascota', 'B', 0, 'C', true);
  $pdf->Cell(60, 8, 'Tipo de mascota', 'B', 0, 'C', true);
  $pdf->Cell(0, 8, 'Sexo', 'B', 0, 'C', true);
  $pdf->Ln();

  $sql = "SELECT * FROM quotes_pets as qp JOIN pet AS p JOIN pet_type AS pt ON qp.petsID = p.id_pet AND p.id_tiM = pt.id_tiM AND qp.quotesID = '$quotesID'";
  $resultsQuotesPets = mysqli_query($conn, $sql);

  foreach ($resultsQuotesPets as $key => $row) {
    $pdf->Cell(30, 8, $key + 1, 'B', 0, 'C');
    $pdf->Cell(60, 8, utf8_decode($row['nomas']), 'B', 0, 'C');
    $pdf->Cell(60, 8, utf8_decode($row['noTiM']), 'B', 0, 'C');
    $pdf->Cell(0, 8, $row['sexo'], 'B', 0, 'C');
    $pdf->Ln();
  }
  $pdf->Ln();

  // foreach ($resultsQuotes as $row) {
//   $pdf->MultiCell(0,8,utf8_decode('Diagnóstico: '.$row['diagnosis']),0,0,'');
// }
  $pdf->Ln(4);

  foreach ($resultsQuotes as $row) {
    $pdf->Cell(100, 0, utf8_decode('Atendido por: ') . $row['attended'], 0, 0);
    $pdf->Ln(2);

    $pdf->Cell(30, 0, '', 0, 0, 'C');
    $pdf->Cell(55, 0, '', 1);
  }
  $pdf->Ln(2);

  foreach ($resultsQuotes as $row) {
    $pdf->Cell(100, 10, utf8_decode('Factura válida desde: ') . date("d/m/Y", strtotime($row['start'])) . ' Hasta: ' . date("d/m/Y", strtotime($row['end'])), 0, 0, '');
    $pdf->Ln(7);

    $pdf->Cell(46, 0, '', 0, 0);
    $pdf->Cell(21, 0, '', 1);
    $pdf->Cell(15, 0, '', 0, 0);
    $pdf->Cell(21, 0, '', 1);
  }
  $pdf->Ln(20);

}

ob_start();
$pdf->Output();
// $buffer = ob_get_clean();

// // Descargar el PDF directamente
// header('Content-Type: application/pdf');
// header('Content-Disposition: attachment; filename="archivo.pdf"');
// echo $buffer;
?>