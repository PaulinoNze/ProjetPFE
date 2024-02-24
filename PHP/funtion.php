<?php


function conectBaseDeDonnee() {
    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "projectpfp";

    try {
        $conn = new mysqli($db_server, $db_user, $db_pass, $db_name);
        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }
        return $conn;
    } catch (Exception $e) {
        echo "Error al conectar a la base de datos: " . $e->getMessage();
    }
}

// Para utilizar la función y obtener la conexión a la base de datos
$conn = conectBaseDeDonnee();

// Función para añadir un curso
function ajouterCours($id_curso,$nombre,$descripcion,$imagen) {
   
    $query = "INSERT INTO cursos (id_curso,nombre,descripcion,imagen) VALUES ('$id_curso','$nombre','$descripcion','$imagen')";
    $conn->query($query);
}

// Función para modificar un curso
function modifierCours($idCurso, $nombreCurso, $descripcion) {

     $query = "UPDATE cursos SET id_curso='$id_curso', nombre='$nombre', descripcion='$descripcion', imagen='$imagen' WHERE id_curso=$id_curso";
     $conn->query($query);
}

// Función para eliminar un curso
function supprimerCours($id_curso) {

     $query = "DELETE FROM cursos WHERE id_curso=$id_curso";
     $conn->query($query);
}

// Función para mostrar todos los cursos
/*
function mostrarCursos() {

     $query = "SELECT * FROM cursos";
     $result = $conn->query($query);
    
    // Muestra los cursos
      while ($row = $result->fetch_assoc()) {
         echo "id_curso: " . $row['$id_curso'] . " - nombre: " . $row['$nombre'] . " - descripcion: " . $row['$descripcion'] . " - imagen: " . $row['$imagen'] . "<br>";
      }
}*/

//--------------------------------------------

// Función para mostrar todos los cursos
function afficherCours() {
    // Suponiendo que obtienes los cursos de una base de datos
    $cursos = obtenerCursosDesdeBaseDeDatos();

    // Iterar sobre cada curso y mostrarlos en forma de ítems
    foreach ($cursos as $curso) {
        echo '<div class="col">';
        echo '<div class="card shadow-sm">';
        echo '<img src="' . $curso['imagen'] . '" class="card-img-top" alt="Imagen del curso">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $curso['id_curso'] . '</h5>';
        echo '<h5 class="card-title">' . $curso['nombre'] . '</h5>';
        echo '<p class="card-text">' . $curso['descripcion'] . '</p>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
}


// Ejemplo de estructura de datos de un curso (puedes adaptarla a tu caso)
function getCoursesFromDatabase() {
    // Aquí puedes simular que obtienes los cursos de una base de datos
    $cursos = array(
        array(
            'nombre' => 'Curso de PHP',
            'descripcion' => 'Aprende PHP desde cero',
            'imagen' => 'ruta/imagen_curso_php.jpg'
        ),
        array(
            'nombre' => 'Curso de HTML',
            'descripcion' => 'Domina HTML y CSS',
            'imagen' => 'ruta/imagen_curso_html.jpg'
        ),
        // Puedes agregar más cursos aquí
    );

    return $cursos;
}
