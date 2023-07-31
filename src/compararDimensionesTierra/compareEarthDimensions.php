<!-- to have better SEO -->
<head>
  <meta name="description" content="Page to show comparisons between Earth´s dimensions and other Solar System´s planets´ dimensions">
  <meta name="viewport" content= "width=device-width, initial-scale=1.0">
</head>
<?php
    include '../core/model.php';
    include 'view.php';

    require_once '../../vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::createImmutable('../..');
    $dotenv->load();
    include $_ENV['SRCPATH'].'/navbar.php';

    $model = new cuerposCelesteModule();
    $planetsList = $model->obtenerRadioYNombrePlanetas();
    $view = new View($planetsList);
    $view->showHtml();
?>