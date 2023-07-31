<head>
  <meta name="description" content="Page to show information about Solar System´s planets">
  <meta name="viewport" content= "width=device-width, initial-scale=1.0">
</head>
<?php
include '../core/model.php';
include 'vistaCuerposCelestes.php';
require_once '../../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable('../..');
$dotenv->load();
include $_ENV['SRCPATH'].'/navbar.php';
$cuerposCelestes = new cuerposCelesteModule();

//Obtenemos las instancias del modelo
$listaPlanetas = $cuerposCelestes->obtenerPlanetas();

//Le pasamos a la vista las instancias del modelo
$vistaPlanetas = new vistaCuerposCelestes($listaPlanetas, "PLANETS");

//Pedimos a la vista que muestre la informacion
$vistaPlanetas->mostrarHTML();

?>