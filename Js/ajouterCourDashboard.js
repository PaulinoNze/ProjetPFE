$(document).ready(function(){
    // Cargar los cours existentes en el Dashboard del estudiante al cargar la página
    chargerCours();

    // Manejar el evento click en el botón "Agregar Curso"
    $('#add-course-btn').click(function(){
        // Obtener el ID del cour desde el atributo data-cour-id del botón
        var curso_id = $(this).data('Cours_inscrits');

        // Enviar una solicitud AJAX para agregar el cour
        $.ajax({
            url: 'agregar_curso.php',
            type: 'POST',
            data: {curso_id: curso_id},
            dataType: 'json',
            success: function(response){
                if(response.success){
                    // Si la inserción es exitosa, cargar nuevamente la list de cours
                    chargerCours();
                } else {
                    // Manejar cualquier error si es necesario
                    console.log("Error al agregar el cour.");
                }
            },
            error: function(xhr, status, error){
                console.error(xhr.responseText);
            }
        });
    });

    // Función para cargar la lista de cursos en el dashboard del estudiante
    function chargerCours(){
        // Array de cursos predefinidos con sus respectivos IDs
        var cours = [
            { id: 1, nombre: "Curso 1" },
            { id: 2, nombre: "Curso 2" },
            { id: 3, nombre: "Curso 3" },
            { id: 4, nombre: "Curso 4" },
            { id: 5, nombre: "Curso 5" },
            { id: 6, nombre: "Curso 6" }
        ];

        // Limpiar la lista de cursos antes de volver a cargarla
        $('#cours-list').empty();

        // Agregar cada curso a la lista
        cours.forEach(function(curso){
            $('#cours-list').append('<div class="card" data-Cours_inscrits="' + curso.id + '"><div class="card-body">' + curso.nombre + '</div></div>');
        });
    }
});


// Controlar el evento click en el botón "Ajouter Cours"
$('#add-course-btn').click(function(){
    // Mostrar el modal de inicio de sesión al hacer clic en el botón
    $('#loginModal').modal('show');
});

// Manejar el envío del formulario de inicio de sesión
$('#loginForm').submit(function(event){
    event.preventDefault();
    
    // Aquí puedes agregar lógica para verificar las credenciales del estudiante
    // Si las credenciales son válidas, puedes agregar el curso al dashboard
    // De lo contrario, puedes mostrar un mensaje de error o redirigir al estudiante a la página de inicio de sesión
    // Ejemplo:
    var username = $('#username').val();
    var password = $('#password').val();

    if(username === 'Email' && password === 'Mot_de_passe'){
        // Agregar lógica para agregar el curso al dashboard
        window.location.href = 'etudiantDashboard.php';
        // Aquí puedes llamar a la función para agregar el curso al dashboard
    } else {
        alert('Credenciales incorrectas. Por favor, intente nuevamente.');
    }
});


function addCourseToDashboard() {
    // Supongamos que obtienes el ID del curso de alguna manera, como un formulario o una variable
    var curso_id = getCourseID();

    // Enviar una solicitud AJAX para agregar el curso al dashboard
    $.ajax({
        url: 'agregar_curso.php',
        type: 'POST',
        data: { curso_id: curso_id },
        dataType: 'json',
        success: function (response) {
            if (response.success) {
                // Si la inserción es exitosa, puedes realizar alguna acción adicional si es necesario
                console.log('Curso agregado al dashboard exitosamente.');
            } else {
                // Manejar cualquier error si es necesario
                console.log('Error al agregar el curso al dashboard.');
            }
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
}

function getCourseID() {
    // Obtener el ID del curso del atributo data-Cours_inscrits del botón "Ajouter Cours"
    var cursoID = $('#add-course-btn').data('Cours_inscrits');
    
    // Retornar el ID del curso obtenido
    return cursoID;
}