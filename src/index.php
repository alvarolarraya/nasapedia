<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nasapedia</title>
    <link rel="stylesheet" href="index.css">
    <meta name="description" content="Home page to welcome all visitors and present posible links">
</head>
<body>
    <?php
        require_once '../vendor/autoload.php';
        $dotenv = Dotenv\Dotenv::createImmutable('..');
        $dotenv->load();
        include $_ENV['SRCPATH'].'/navbar.php';
    ?><br>
    <h1 class="display-1"><div id="titleText">Welcome to Nasapedia</div></h1>
    <div class="mainText"><p>In this web you'll find information about the solar system, pictures and interactive gadgets.</p></div>
    <div class="mainText"><p>We hope you have fun :)</p></div>
    <footer><p>Authors: Álvaro Larraya, Eugen Hamuraru, Rodrigo Andrés</p></footer>
</body>
</html>