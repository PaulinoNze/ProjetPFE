<?php
session_start();

// Vérification de l'authentification du professeur
if (!isset($_SESSION['profId']) || !isset($_SESSION['nom'])) {
    header("Location: index.php");
    exit();
}

// Inclusion du fichier de configuration de la base de données
include "../database.php";

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Requête SQL pour récupérer les cours du professeur depuis la base de données
$sql_cours = "SELECT * FROM cours WHERE professeur_id = " . $_SESSION['profId'];
$result_cours = $conn->query($sql_cours);

$cours = array();

if ($result_cours->num_rows > 0) {
    // Parcourir les résultats de la requête et les stocker dans un tableau
    while($row = $result_cours->fetch_assoc()) {
        $cours[] = $row;
    }
}

// Requête SQL pour récupérer les étudiants inscrits aux cours du professeur depuis la base de données
$sql_etudiants = "SELECT * FROM etudiants WHERE cours_id IN (SELECT id FROM cours WHERE professeur_id = " . $_SESSION['profId'] . ")";
$result_etudiants = $conn->query($sql_etudiants);

$etudiants = array();

if ($result_etudiants->num_rows > 0) {
    // Parcourir les résultats de la requête et les stocker dans un tableau
    while($row = $result_etudiants->fetch_assoc()) {
        $etudiants[] = $row;
    }
}

// Fermeture de la connexion à la base de données
$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord du professeur</title>
</head>
<body>
    <h1>Tableau de bord du professeur</h1>
    
    <h2>Cours ajoutés</h2>
    <table border="1">
        <tr>
            <th>Titre</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
        <?php foreach ($cours as $cours) { ?>
            <tr>
                <td><?php echo $cours["titre"]; ?></td>
                <td><?php echo $cours["description"]; ?></td>
                <td><a href="voir_cours.php?id=<?php echo $cours["id"]; ?>">Voir les fichiers</a></td>
            </tr>
        <?php } ?>
    </table>

    <h2>Étudiants inscrits</h2>
    <table border="1">
        <tr>
            <th>Nom</th>
            <th>Email</th>
        </tr>
        <?php foreach ($etudiants as $etudiant) { ?>
            <tr>
                <td><?php echo $etudiant["nom"]; ?></td>
                <td><?php echo $etudiant["email"]; ?></td>
            </tr>
        <?php } ?>
    </table>

    <br>
    <a href="deconnexion.php">Se déconnecter</a> <!-- Lien pour permettre au professeur de se déconnecter -->
</body>
</html>
