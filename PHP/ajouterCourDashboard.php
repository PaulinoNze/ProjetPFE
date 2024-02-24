<?php
// Aquí iría la lógica para agregar el curso a la base de datos del estudiante
// Configuración de la conexión a la base de datos
/*$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "projectpfp";
// Crear conexión
$conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Supongamos que has recibido el ID del curso a agregar desde el frontend
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se ha recibido el ID del curso a través de una solicitud POST
    if (isset($_POST['Cours_inscrits'])) {
        $Cours_inscrits = $_POST['Cours_inscrits'];

        // Conectar a la base de datos (debes completar esta parte con tus credenciales de conexión)
        $db_server = "localhost";
        $db_user = "root";
        $db_pass = "";
        $db_name = "projectpfp";

        $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

        // Verificar la conexión
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        // Consulta SQL para insertar el ID del curso en la base de datos del estudiante
        $sql = "INSERT INTO étudiant (Cours_inscrits) VALUES ('$Cours_inscrits')";

        if ($conn->query($sql) === TRUE) {
            // Si la inserción es exitosa, retornar un mensaje JSON de éxito
            echo json_encode(array("success" => true));
            header("Location: ../etudiantDashboard/etudiantDashboard.php");
        } else {
            // En caso de error en la inserción, retornar un mensaje JSON de error
            echo json_encode(array("success" => false, "error" => "Error al insertar en la base de datos: " . $conn->error));
        }

        // Cerrar la conexión a la base de datos
        $conn->close();
    } else {
        // Si no se proporciona el ID del curso, retornar un mensaje JSON de error
        echo json_encode(array("success" => false, "error" => "ID del curso no proporcionado"));
    }
} else {
    // Si la solicitud no es de tipo POST, retornar un mensaje JSON de error
    echo json_encode(array("success" => false, "error" => "Método no permitido"));
}

// Recuperar el email y la contraseña ingresados por el estudiante desde el formulario
$email = $_POST['Email'];
$mot_de_passe = $_POST['Mot_de_passe'];

// Consulta SQL para verificar las credenciales del estudiante en la base de datos
$sql = "SELECT * FROM étudiant WHERE Email = '$email' AND Mot_de_passe = '$mot_de_passe'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Credenciales válidas - El estudiante está autenticado correctamente
    echo "¡Inicio de sesión exitoso!"; // Puedes realizar acciones adicionales aquí
} else {
    // Credenciales inválidas - Mostrar un mensaje de error
    echo "Credenciales incorrectas. Por favor, inténtelo nuevamente.";
}*/

session_start();
    include "../database.php";

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if (isset($_POST['Cours_inscrits'])) {
        $cours_inscrits = $_POST['Cours_inscrits'];
        $sql = "INSERT INTO étudiant (Cours_inscrits) VALUES ('$Cours_inscrits')";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if ($conn->query($sql) === TRUE) {
                // Si la inserción es exitosa, retornar un mensaje JSON de éxito
                echo json_encode(array("success" => true));
                header("Location: ../etudiantDashboard/etudiantDashboard.php");
            } else {
                // En caso de error en la inserción, retornar un mensaje JSON de error
                echo json_encode(array("success" => false, "error" => "Error al insertar en la base de datos: " . $conn->error));
            }
        } else {
                // Si no se proporciona el ID del curso, retornar un mensaje JSON de error
                echo json_encode(array("success" => false, "error" => "ID del curso no proporcionado"));
            }
        } else {
            // Si la solicitud no es de tipo POST, retornar un mensaje JSON de error
            echo json_encode(array("success" => false, "error" => "Método no permitido"));
        }
        $email = $_POST['username'];
        $mot_de_passe = $_POST['password'];

// Consulta SQL para verificar las credenciales del estudiante en la base de datos
$sql = "SELECT * FROM étudiant WHERE Email = '$email' AND Mot_de_passe = '$mot_de_passe'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Credenciales válidas - El estudiante está autenticado correctamente
    header("Location: ../etudiantDashboard/etudiantDashboard.php"); // Puedes realizar acciones adicionales aquí
} else {
    // Credenciales inválidas - Mostrar un mensaje de error
    echo "<script>alert('Credenciales incorrectas. Por favor, inténtelo nuevamente.'); window.history.back();</script>";
}
?>
