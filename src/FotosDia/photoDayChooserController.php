<head>
  <meta name="description" content="Page to show the APOD (Astronomy Photo of the Day)">
</head>
<?php
include_once '../core/model.php';

// Acción por defecto del controlador
function index()
{
    // Obtener la fecha seleccionada (puedes recibirlo a través de un formulario o parámetro GET)
    $selectedDate = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');

    // Validar que la fecha esté dentro del rango válido
    $minDate = '1995-06-20';
    $maxDate = date('Y-m-d');
    if ($selectedDate < $minDate || $selectedDate > $maxDate) {
        echo 'Please select a date between June 20, 1995 and today.';
        return;
    }

    // Obtener la foto del día utilizando el modelo
    $photo = getPhotoOfTheDay($selectedDate);
   
    // Incluir la vista
    include_once 'photoView.php';
}

// Llamar a la acción por defecto
index();
?>