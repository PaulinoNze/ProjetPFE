<?php
include "../../database.php";
require ('../../fpdf/fpdf.php');
$font = "C:/xampp/htdocs/ProjetPFE/MBaskerville-SemiBoldItalic.otf";
$etudId = $_GET['etudId'];
$coursId = $_GET['coursId'];
$sql = "SELECT e.nom, e.prenom, c.nomCours
FROM coursinscrit ci
JOIN etudiant e ON ci.etudId = e.etudId
JOIN cours c ON ci.coursId = c.coursId
WHERE ci.etudId = $etudId AND ci.coursId = $coursId";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_array($result)) {
        $image = imagecreatefrompng("../../Img/certificate.png");
        $color = imagecolorallocate($image, 19, 21, 22);
        $name = $row['nom']. " ". $row['prenom'];
        $cours = $row['nomCours'];
        imagettftext($image, 90, 0, 690, 800, $color, $font, $name);

        // Adjusted code for `$cours` to appear in the red circle area
        // The font size is a guess; you'll need to adjust it to match the existing text
        $fontSize = 50; // Hypothetical font size to match the preceding text size
        $xPos = 900; // X coordinate for the `$cours` text, adjust as necessary
        $yPos = 950; // Y coordinate for the `$cours` text, adjust as necessary
        imagettftext($image, $fontSize, 0, $xPos, $yPos, $color, $font, $cours);
        
        // Save the modified image to a temporary file in JPEG format
        $tempImagePath = tempnam(sys_get_temp_dir(), 'certificate_') . '.jpg'; // Specify the file extension
        imagejpeg($image, $tempImagePath);
        
        // Get image dimensions
        $imageWidth = imagesx($image);
        $imageHeight = imagesy($image);
        
        // Create a PDF with dimensions matching the image
        $pdf = new FPDF('L', 'pt', array($imageWidth, $imageHeight));
        $pdf->AddPage();
        
        // Output the certificate image as a PDF
        $pdf->Image($tempImagePath, 0, 0, $imageWidth, $imageHeight);
        
        // Output the PDF directly to the browser
        $pdf->Output('D', 'certificate.pdf');
        
        // Cleanup
        imagedestroy($image);
        unlink($tempImagePath); // Delete the temporary image file
        $pdf->Close();
    }
}
?>
