<?php
class Model
{
    public function __construct()
    {
        require_once 'BBDDConnectionSingleton.php';
    }
}

class cuerpoCeleste extends Model
{
    public $ID;
    public $nombre;
    public $descripcion;
    public $imagen;
    public float $radio;
    public function __construct($ID, $nombre, $imagen, $descripcion,$radio=0.0)
    {
        $this->ID = $ID;
        $this->nombre = $nombre;
        $this->imagen = $imagen;
        $this->descripcion = $descripcion;
        $this->radio = $radio;
    }
}

class cuerposCelesteModule extends model
{

    public function obtenerPlanetas()
    {
        $conn = DatabaseConnSingleton::getConn();
        // preparo la query 
        $query = "select * from Planets";
        $listaPlanetas = array();
        //lanzo la query y devuelvo su resultado
        if ($res = $conn->query("$query")) {
            while ($row = $res->fetch_assoc()) {
                array_push($listaPlanetas, new cuerpoCeleste($row["id"], $row["name"], $row["image"], $row["description"]));
            }
            $res->free();
            return $listaPlanetas;
        }
    }

    public function obtenerSatelites()
    {
        $conn = DatabaseConnSingleton::getConn();
        // Inicializo mi lista de productos
        $listaSatelites = array();
        // preparo la query 
        $query = "select * from Satellites";
        //lanzo la query y devuelvo su resultado
        if ($res = $conn->query("$query")) {
            while ($row = $res->fetch_assoc()) {
                array_push($listaSatelites, new cuerpoCeleste($row["id"], $row["name"], $row["image"], $row["description"]));
            }
            $res->free();
            return $listaSatelites;
        }
    }

    public function obtenerRadioYNombrePlanetas()
    {
        $conn = DatabaseConnSingleton::getConn();
        // preparo la query 
        $query = "select * from Planets";
        $listaPlanetas = array();
        //lanzo la query y devuelvo su resultado
        if ($res = $conn->query("$query")) {
            while ($row = $res->fetch_assoc()) {
                array_push($listaPlanetas, new cuerpoCeleste($row["id"], $row["name"], null,null,$row["radius"]));
            }
            $res->free();
            return $listaPlanetas;
        }
    }

    public function buscarCuerpoCelestePorNombre($nombre)
    {
        //Llamada a la API para buscar un cuerpo celeste por su nombre. 
    }
}

function getPhotoOfTheDay($date)
{

    $arrContextOptions = array(
        "ssl" => array(
            "verify_peer" => false,
            "verify_peer_name" => false,
        ),
    );
    $apiKey = 'Mqxg9H0fdCkOsbq5H1cLy7qzz2Imn5KgPvoGhDLb';
    $url = "https://api.nasa.gov/planetary/apod?api_key={$apiKey}&date={$date}";

    // hacer la solicitud HTTP GET a la API de la NASA
    $response = file_get_contents($url, false, stream_context_create($arrContextOptions));
    $data = json_decode($response, true);

    return [
        'url' => $data['url'],
        'explanation' => $data['explanation']
    ];
}

?>