<?php

    $satellites_names = ["ISS","CENTAURI-2","CENTAURI-3","CENTAURI-1","PROXIMA I","PROXIMA II",
    "NOAA 19","NOAA 18","NOAA 15","ROBUSTA 1B","ZHUHAI-1 02 (CAS-4B)","KKS-1 (KISEKI)","ITASAT 1","NAYIF-1 (EO-88)","NORSAT 2",
    "AISSAT 1","WARP-01","NORSAT 3","NORSAT 1","AISSAT 2"];
    // $satellites_names = ["ISS"];

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

    foreach ($satellites_names as $satellite_name) {
        $curl = curl_init();
        echo $satellite_name;
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://images-api.nasa.gov/search?q='.$satellite_name,
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
        $i = 0;
        do{
            $image = $json->items[$i]->links[$i]->href;
            $description = $json->items[$i]->data[$i]->description;
            $i++;
        }while(strcmp(substr($image, -3),".jpg") == 0 && strcmp(substr($image, -3),".jpeg") == 0);
        $description = str_replace("'", "", $description);
        $query = "INSERT INTO Satellites (name, image, description) VALUES ('$satellite_name', '$image', '$description')";
        if (!mysqli_query($conn, $query)) {
            // echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    }

    mysqli_close($conn);
?>