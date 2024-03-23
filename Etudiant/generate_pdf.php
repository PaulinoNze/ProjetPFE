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
$pdf->Cell(40, 10, 'Tous Mes Cours');

// Add a line break
$pdf->Ln(10);

$etudId = $_SESSION['userid'];

$sql = "SELECT  c.nomCours, c.description
        FROM cours c
        JOIN coursinscrit ci ON c.coursId = ci.coursId
        JOIN etudiant e ON ci.etudId = e.etudId
        WHERE e.etudId = $etudId AND ci.note IS NULL";
$result = mysqli_query($conn, $sql);

// Check if there are any rows returned
if (mysqli_num_rows($result) > 0) {
    // Set font for table header
    $pdf->SetFont('Arial', 'B', 10);

    // Define cell widths
    $cellWidth = 30;
    $descriptionWidth = 170;

    // Table header
    $pdf->Cell($cellWidth, 10, 'Nom du Cours', 1);
    $pdf->Cell($descriptionWidth, 10, 'Description', 1);
    $pdf->Ln();

    // Set font for data rows
    $pdf->SetFont('Arial', '', 10);

    // Fetch and add data rows
    while ($row = mysqli_fetch_assoc($result)) {
        // Calculate the number of lines in the description
        $numLines = ceil($pdf->GetStringWidth($row['description']) / $descriptionWidth);

        // Calculate the height of the Description cell based on the number of lines
        $descriptionHeight = 10 * $numLines;

        // Nom du Cours cell (with adjusted height)
        $pdf->Cell($cellWidth, $descriptionHeight, $row['nomCours'], 1);

        // Description cell (multi-line)
        $pdf->MultiCell($descriptionWidth, 10, $row['description'], 1);

        // Add empty cell to align with the first column
        $pdf->Cell($cellWidth, $descriptionHeight, '', 'LRB');
        $pdf->Cell($descriptionWidth, 0, '', 'LRB');
        $pdf->Ln();
    }
} else {
    // No rows returned from the database
    $pdf->Cell(0, 10, 'Aucun Cours', 1, 1, 'C');
}

// Close and output PDF document
$pdf->Output('Tous Mes Cours.pdf', 'D');
?>
