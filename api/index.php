<?php

function __autoload($class_name) {
    include 'services/'.$class_name . '.class.php';
}

// On récupérela méthode, la classe et les paramétres
$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['REQUEST_URI'],'/'));
array_shift($request);
var_dump($request);

// On appel la méthode de redirection
$class = ucfirst($request[0]);
$service = new $class();
$requete = $method. $request[0];

switch($method){
    case 'GET' : $requete =  $method. $request[0]; if($request[1]){$params = $request[1];}else{$params = "";}break;
    case 'POST' : $params = $_REQUEST; break;
    case 'PUT' : $params = $_REQUEST; break;
    case 'DELETE' : $requete = $method. $request[0];if(sizeof($request) == 2){$params = $request[1];}else{$params = NULL;}break;
}

$result = $service->$requete($params);
export_json($result);



function export_json($result){
    echo json_encode($result);
}
