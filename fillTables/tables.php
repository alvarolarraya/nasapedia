<?php
    $planets_names=["Mercury","Venus","Earth","Mars","Jupiter","Saturn","Uranus","Neptune"];
    // $planets_names=["Mercury"];

    $servername = "localhost:3307";
    $database = "IW";
    $username = "root";
    $password = "";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    echo "Connected successfully";

    foreach ($planets_names as $planet_name) {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://images-api.nasa.gov/search?q='.$planet_name,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $json = json_decode($response)->collection;
        $image = $json->items[0]->links[0]->href;
        $description = $json->items[0]->data[0]->description;
        $query = "INSERT INTO Planets (name, image, description) VALUES (\"$planet_name\", \"$image\", \"$description\")";
        if (!mysqli_query($conn, $query)) {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    }

    mysqli_close($conn);
?>