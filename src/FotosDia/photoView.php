<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Astronomy Picture of the Day</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="bg-dark">
    <?php
    require_once '../../vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::createImmutable('../..');
    $dotenv->load();
    include $_ENV['SRCPATH'] . '/navbar.php';
    ?>

    <div class="p-3 mb-2 text-white main">

        <div class="">
            <h1>Astronomy Picture of the Day</h1>
        </div>

        <div class="contenedorFormulario">
            <form action="photoDayChooserController.php" method="GET">
                <label for="date">Select a date:</label>
                <input tabindex=0 type="date" id="date" name="date" min="1995-06-20" max="<?php echo date('Y-m-d'); ?>" required>
                <button type="submit" class="btn btn-info">Get Image</button>
            </form>
        </div>

        <div class="contenedorImagen">
            <?php if (!empty($photo)): ?>
                <img id="apod-image" src="<?php echo $photo['url']; ?>" alt="">
            </div>
            
            <p class="contenedorDescripcion">
                <button class="btn " type="button" data-toggle="collapse" data-target="#' . $collapseId . '"
                    aria-expanded="false" aria-controls="' . $collapseId . '">
                    Ver Descripcion
                </button>
            </p>
            <div class="collapse" id="' . $collapseId . '">
                <div class="card card-body p-3 mb-2 bg-info text-white">
                    <?php echo $photo['explanation']; ?>
                </div>
            </div>

        <?php endif; ?>


       
    </div>
</body>

</html>