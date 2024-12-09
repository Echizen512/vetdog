<?php
require('fpdf186/fpdf.php');

// Conexión a la base de datos
$conn = new mysqli('localhost', 'root', '', 'vetdog');
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$id_due = $_GET['id_due'] ?? null;
$id_animal = $_GET['id_animal'] ?? null;

if (!$id_due || !$id_animal) {
    die('Datos insuficientes para generar el certificado.');
}

// Consultar datos del dueño
$query_owner = "SELECT nom_due, ape_due, dni_due, direc FROM owner WHERE id_due = ?";
$stmt = $conn->prepare($query_owner);
$stmt->bind_param("i", $id_due);
$stmt->execute();
$result_owner = $stmt->get_result();
$owner = $result_owner->fetch_assoc();

// Consultar datos de la mascota
$query_animal = "SELECT nombre FROM animales WHERE id_animal = ?";
$stmt = $conn->prepare($query_animal);
$stmt->bind_param("i", $id_animal);
$stmt->execute();
$result_animal = $stmt->get_result();
$mascota = $result_animal->fetch_assoc();

$stmt->close();
$conn->close();

if (!$owner || !$mascota) {
    die('Datos no encontrados.');
}

// Crear una nueva clase para personalizar el PDF
class PDF extends FPDF
{
    // Agregar fuentes personalizadas
    function Header()
    {
        $this->Ln(10);
        
        // Título principal
        $this->SetFont('Arial', 'B', 14);
        $this->SetTextColor(0); // Negro
        $this->Cell(0, 12, 'Veterinaria Beatriz Fagundez', 0, 1, 'C'); // Cambié 0 a 1 en el segundo parámetro para crear un salto de línea
        
        // Subtítulo
        $this->SetFont('Arial', 'B', 12);
        $this->SetTextColor(33, 97, 140); // Azul oscuro
        $this->Cell(0, 10, utf8_decode('Certificado Oficial de Adopción - Vetdog'), 0, 1, 'C');
        
        // Mensaje
        $this->SetFont('Arial', 'I', 10);
        $this->SetTextColor(80); // Gris
        $this->Cell(0, 10, utf8_decode('Por un mundo donde todos los animales encuentren un hogar'), 0, 1, 'C');
        
        $this->Ln(10);
    }

    function Footer()
    {
        $this->Image('./icon2.png', 10, 5, 35, 35);
        $this->SetY(-30);
        $this->SetFont('Arial', '', 9);
        $this->SetTextColor(80);
        $this->Cell(0, 10, utf8_decode('“El amor por los animales eleva el nivel cultural del pueblo” - Vetdog'), 0, 1, 'C');
        $this->SetFont('Arial', 'I', 8);
        $this->SetTextColor(128);
        $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . utf8_decode(' | Vetdog - Todos los derechos reservados'), 0, 0, 'C');
    }
}

// Crear el PDF
$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);

// Título
$pdf->SetTextColor(33, 97, 140); // Azul oscuro
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, utf8_decode('Certificado de Adopción'), 0, 1, 'C');
$pdf->Ln(10);

// Texto principal
$pdf->SetFont('Arial', '', 12);
$pdf->SetTextColor(0);
$texto = "Vetdog tiene el honor de certificar que la solicitud de adopción realizada por:\n\n";
$texto .= "Sr./Sra. {$owner['nom_due']} {$owner['ape_due']}, portador(a) de la Cédula de Identidad N.º {$owner['dni_due']},\n";
$texto .= "residente en {$owner['direc']}, ha sido formalmente aprobada.\n\n";
$texto .= "Con base en esta solicitud, se autoriza la adopción de la mascota llamada '{$mascota['nombre']}'.\n\n";
$texto .= "Este certificado refleja el compromiso y la responsabilidad del adoptante de ofrecer un hogar lleno de amor, cuidado y protección a su nueva mascota, promoviendo los valores de respeto hacia los animales y el bienestar de los mismos.\n\n";
$texto .= "En nombre de Vetdog y de todo nuestro equipo, agradecemos profundamente su gesto y confianza. ¡Gracias por adoptar!";
$pdf->MultiCell(0, 10, utf8_decode($texto), 0, 'J');

// Detalles adicionales
$pdf->SetFont('Arial', 'I', 11);
$pdf->SetTextColor(100);
$pdf->MultiCell(0, 10, utf8_decode("Este certificado es emitido como constancia oficial del proceso de adopción realizado bajo las políticas de Vetdog.\nGracias por apoyar nuestra misión de transformar vidas."), 0, 'C');
$pdf->Ln(10);

// Fecha
$pdf->SetFont('Arial', '', 10);
$pdf->SetTextColor(128);
$pdf->Cell(0, 10, utf8_decode("Fecha de emisión: " . date('d/m/Y')), 0, 1, 'C');

// Salida
$pdf->Output('I', 'certificado.pdf');
?>
