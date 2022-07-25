<?php


$onekm = 1609;


$units = [
    "distance" => ["km", "mile"],
    "temperature" => ["celcius", "farenheit"]
];


//Recupération post avec php://input un flux en lecture seule pour
//  lecture des données brutes du coprs de la requête
$json = file_get_contents('php://input');

// décodage pour transfomer en tableau
$post = json_decode($json, TRUE);

// simplification $post en $r
$r = $post;

// Déclare $temperature à 0;
    $distance = 0;

// Traitement du contenu de la clé unit
//si la clé "convertTo" est l'opposé de "unit" on convertit sinon non

    switch ($r["unit"]) {
        case 'km':
            $r["convertTo"] === "mile" ?  $distance = ($r['value'] * $onekm) : null;
            break;
        case 'mile':
            $r["convertTo"] === "km" ?  $distance = ($r['value'] / $onekm) : null;
            break;

        default:
            $distance = 0;
            break;
    }


    echo json_encode([
        "result" => $distance
    ]);


?>
