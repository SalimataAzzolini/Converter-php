<?php


$onekm = 1609;


$units = [
    "distance" => ["km", "mile"],
    "temperature" => ["celcius", "farenheit"]
];


$json = file_get_contents('php://input');
$post = json_decode($json, TRUE);

$r = $post;

    $distance = 0;

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
