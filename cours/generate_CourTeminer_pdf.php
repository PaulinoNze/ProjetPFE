<?php
session_start();
require('../fpdf/fpdf.php'); // Include FPDF library

// Database connection
include '../database.php'; // Assuming you have a separate file for database connection

// Create new PDF document
$pdf = new FPDF('L');
$pdf->AddPage();

// Set font
$pdf->SetFont('Arial', 'B', 12);

// Add a cell with a table title
$pdf->Cell(40, 10, 'Cours Terminer');

// Add a line break
$pdf->Ln(10);

$etudId = $_SESSION['userid'];

$sql = "SELECT c.coursId, c.nomCours, c.description, ci.note
FROM cours c
JOIN coursinscrit ci ON c.coursId = ci.coursId
JOIN etudiant e ON ci.etudId = e.etudId
WHERE e.etudId = $etudId AND ci.note IS NOT NULL";
$result = mysqli_query($conn, $sql);

// Check if there are any rows returned
if (mysqli_num_rows($result) > 0) {
    // Table header
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(30, 10, 'Nom du Cours', 1);
    $pdf->Cell(100, 10, 'Description', 1);
    $pdf->Ln();

    // Set font for data rows
    $pdf->SetFont('Arial', '', 10);

    // Fetch and add data rows
    while ($row = mysqli_fetch_assoc($result)) {
        $pdf->Cell(30, 10, $row['nomCours'], 1);
        $pdf->Cell(100, 10, $row['description'], 1);
        $pdf->Ln();
    }
} else {
    // No rows returned from the database
    $pdf->Cell(0, 10, 'Aucun Cours', 1, 1, 'C');
}

// Close and output PDF document
$pdf->Output('Cour Terminer.pdf', 'D');
?>
