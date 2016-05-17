<?php

// Autoload des class
function __autoload($class_name) {
    include 'services/'.$class_name . '.class.php';
}

// On récupérela méthode, la classe et les paramétres
$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['REQUEST_URI'],'/'));
array_shift($request);

// On appel la méthode de redirection
$class = ucfirst($request[0]);
$service = new $class();
$requete = $method. $request[0];

switch($method){
    case 'GET' : $requete =  $method. $request[0]."";break;
    case 'POST' : $params = $_REQUEST; break;
    case 'PUT' : $params = $_REQUEST; break;
    case 'DELETE' : $requete = $method. $request[0]."";break;
}

$result = $service->$requete($params);

// Print result in JSON
export_json($result);

// Fonction qui retourne le resultat au format json
function export_json($result){
    header('Content-Type: application/json');
    echo json_encode($result);
}
