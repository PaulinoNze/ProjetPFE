<?php
require('../fpdf/fpdf.php'); // Include FPDF library

// Database connection
include '../database.php'; // Assuming you have a separate file for database connection

// Create new PDF document
$pdf = new FPDF('L');
$pdf->AddPage();

// Set font
$pdf->SetFont('Arial', 'B', 12);

// Add a cell with a table title
$pdf->Cell(40, 10, 'Demandes Des Professeurs');

// Add a line break
$pdf->Ln(10);

// Fetch data from the etudiant table
$sql = "SELECT * FROM professeur WHERE statut = '0'";
$result = mysqli_query($conn, $sql);

// Check if there are any rows returned
if (mysqli_num_rows($result) > 0) {
    // Table header
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(30, 10, 'Nom', 1);
    $pdf->Cell(30, 10, 'Prenom', 1);
    $pdf->Cell(30, 10, 'Email', 1);
    $pdf->Cell(30, 10, 'Telephone', 1);
    $pdf->Cell(40, 10, 'Date de Naissance', 1);
    $pdf->Ln();

    // Set font for data rows
    $pdf->SetFont('Arial', '', 10);

    // Fetch and add data rows
    while ($row = mysqli_fetch_assoc($result)) {
        $pdf->Cell(30, 10, $row['nom'], 1);
        $pdf->Cell(30, 10, $row['prenom'], 1);
        $pdf->Cell(30, 10, $row['email'], 1);
        $pdf->Cell(30, 10, $row['telephone'], 1);
        $pdf->Cell(40, 10, $row['date_naissance'], 1);
        $pdf->Ln();
    }
} else {
    // No rows returned from the database
    $pdf->Cell(0, 10, 'Aucun professeur', 1, 1, 'C');
}

// Close and output PDF document
$pdf->Output('Demandes Des Professeurs.pdf', 'D');
?>
