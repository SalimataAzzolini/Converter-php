<?php

    $onekm = 1609;
    
    $units = [
        "distance" => ["km", "mile"],
        "temperature" => ["celcius", "farenheit"]
    ];
    
    $json = file_get_contents('php://input');
    $post = json_decode($json, TRUE);
    $r = $post;
    
    $temperature = 0;

    switch ($r["unit"]) {
        case 'celcius':
        $r["convertTo"] === "farenheit" ?  $temperature = ( ( ($r['value'] * 9 ) / 5) + 32 ): null;
                break;
            case 'farenheit':
        $r["convertTo"] === "celcius" ?  $temperature = ( ( ($r['value'] - 32) * 5) / 9 ) : null;
                break;
        default:
            $temperature = 0;
            break;
    }


    echo json_encode([
        "result" => $temperature
    ]);


?>
