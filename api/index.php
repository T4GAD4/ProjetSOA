<?php

// Autoload des class
function __autoload($class_name) {
    include 'services/'.$class_name . '.class.php';
}

// On récupérela méthode, la classe et les paramétres
$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['REQUEST_URI'],'/'));
array_shift($request);
if(sizeof($request) == 0){
    echo "Vous êtes sur l'accueil !";
    die();
}

// On appel la méthode de redirection
$class = ucfirst($request[0]);
$service = new $class();
$requete = $method. $request[0];

switch($method){
    case 'GET' : $requete =  $method. $request[0]; if(!empty($request[1])){$params = $request[1];}break;
    case 'POST' : $params = $_REQUEST; break;
    case 'PUT' : $params = $_REQUEST; break;
    case 'DELETE' : $requete = $method. $request[0];if(sizeof($request) == 2){$params = $request[1];}break;
}
if(isset($params)){
    $result = $service->$requete($params);
}else{
    $result = $service->$requete();
}
// Print result in JSON
export_json($result);

// Fonction qui retourne le resultat au format json
function export_json($result){
    header('Content-Type: application/json');
    echo json_encode($result);
}
