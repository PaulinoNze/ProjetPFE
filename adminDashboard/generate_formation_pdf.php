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
$pdf->Cell(40, 10, 'Formations');

// Add a line break
$pdf->Ln(10);

// Fetch data from the etudiant table
$sql = "SELECT * FROM formation";
$result = mysqli_query($conn, $sql);

// Check if there are any rows returned
if (mysqli_num_rows($result) > 0) {
    // Table header
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(70, 10, 'Nom de la Formation', 1);
    $pdf->Cell(30, 10, 'Date Publish', 1);
    $pdf->Cell(30, 10, 'Statut', 1);
    $pdf->Ln();

    // Set font for data rows
    $pdf->SetFont('Arial', '', 10);

    // Fetch and add data rows
    while ($row = mysqli_fetch_assoc($result)) {
        $pdf->Cell(70, 10, $row['titre'], 1);
        $pdf->Cell(30, 10, $row['datePublish'], 1);
        $pdf->Cell(30, 10, $row['statut'], 1);
        $pdf->Ln();
    }
} else {
    // No rows returned from the database
    $pdf->Cell(0, 10, 'Aucun formation', 1, 1, 'C');
}

// Close and output PDF document
$pdf->Output('Formations.pdf', 'D');
?>
