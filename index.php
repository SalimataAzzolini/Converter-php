<?php

// déclaration Header pour envoyer du JSON
header('Content-type: application/json');

// Récupère le contenu de la requête passée sur le serveur
$temp_url = trim($_SERVER["REQUEST_URI"], "/");

// Découpage tableau pour récupérer les valeurs
$url = explode("/", $temp_url);

// si longueur du tableau $url est inférieur à 2, visiteur est à la racine.
if (sizeof($url) < 2) {
  //  header("Location: doc.php"); on rédirige vers la documentation et sort du fichier index
   exit();
}elseif (sizeof($url) < 3) { // si la longueur est égale à 2 renvoie getUnits
    $action = $url[1]; // On recupère le premier élem du tableau et verif si methode get === "units"
    if ($_SERVER["REQUEST_METHOD"] === "GET" && $action === "units") {
     require "getUnits.php";
     exit();
    }
}
else { // sinon le tableau est égale à 3 au moins en longueur
   $action = $url[ sizeof($url) - 1]; // l'action demandée est en dernière position du tableau
   $pos = strpos($action, "?");
   if ($pos) {
    $temp = explode("?",$action);
    $action = $temp[0];

   }

   if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (in_array($action, ["temperature", "distance"])) {
      require "convert".ucwords($action).".php";  // si la condition est vraie on renvoie dans le fichier de l'action
      exit();
    }
  }



}


 ?>
